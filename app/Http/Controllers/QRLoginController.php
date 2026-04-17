<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Label;
use App\Models\Piclabel;
use App\Models\Qcpass;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Spatie\Browsershot\Browsershot;
use Rawilk\Printing\Facades\Printing;
use Illuminate\Support\Facades\Http;
use Rawilk\Printing\Api\PrintNode\Client;


class QRLoginController extends Controller
{
    /**
     * PrintNode settings (BasicAuth: apiKey as username, empty password).
     * NOTE: Keeping api key here because requested, but prefer env/config in production.
     */
    private string $printNodeApiKey = 'spLeDN1F5mFTKVung_lBvyrTZS4f0bn-1qfavRugXsg';
    private string $printNodeApiPassword = '';

    /**
     * Check if user is authenticated via session
     */
    private function isAuthenticated()
    {
        return session('user_logged_in') && session('user_data');
    }

    /**
     * Build a preconfigured HTTP client for PrintNode requests.
     */
    private function printNodeHttpClient()
    {
        $apiKey = (string) session('printnode_api_key', '');
        if ($apiKey === '') {
            $apiKey = $this->printNodeApiKey ?: (string) config('printing.drivers.printnode.api_key', '');
        }
        $apiPassword = $this->printNodeApiPassword ?: (string) env('PRINTNODE_PASSWORD', '');

        return Http::withBasicAuth($apiKey, $apiPassword)
            ->timeout(60)
            ->connectTimeout(30)
            ->retry(3, 500);
    }

    /**
     * Fetch printers list from PrintNode and return only id + name.
     *
     * @return array{printers: array<int, array{id:int, name:string}>, defaultPrinterId: int|null}
     */
    private function fetchPrintNodePrinters(): array
    {
        try {
            $response = $this->printNodeHttpClient()->get('https://api.printnode.com/printers');

            if (! $response->successful()) {
                Log::warning('Failed to fetch PrintNode printers', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
                return ['printers' => [], 'defaultPrinterId' => null];
            }

            $printers = $response->json();
            if (! is_array($printers)) {
                return ['printers' => [], 'defaultPrinterId' => null];
            }

            $mapped = [];
            $defaultPrinterId = null;
            foreach ($printers as $printer) {
                if (! is_array($printer)) {
                    continue;
                }
                if (! array_key_exists('id', $printer) || ! array_key_exists('name', $printer)) {
                    continue;
                }

                // PrintNode includes a `default: true` flag on the default printer.
                if ($defaultPrinterId === null && array_key_exists('default', $printer) && $printer['default'] === true) {
                    $defaultPrinterId = (int) $printer['id'];
                }

                $mapped[] = [
                    'id' => (int) $printer['id'],
                    'name' => (string) $printer['name'],
                ];
            }

            return ['printers' => $mapped, 'defaultPrinterId' => $defaultPrinterId];
        } catch (\Throwable $e) {
            Log::error('Exception while fetching PrintNode printers', [
                'message' => $e->getMessage(),
            ]);
            return ['printers' => [], 'defaultPrinterId' => null];
        }
    }
    
    /**
     * Get current user data from session
     */
    private function getCurrentUser()
    {
        return session('user_data');
    }

    /**
     * Part yang membutuhkan pilihan TMMIN Export vs local/ADM.
     */
    private function isTmminSelectablePart(?Label $label): bool
    {
        if (! $label || $label->part_no === null || $label->part_no === '') {
            return false;
        }
        $p = (string) $label->part_no;

        return in_array($p, ['67407-BZ190-00', '67408-BZ190-00'], true);
    }

    /**
     * Qty tampilan/cetak: Export = 15, selain itu dari database.
     */
    private function effectiveLabelQty(?Label $label): int
    {
        if (! $label) {
            return 0;
        }
        $fromDb = (int) $label->qty;
        if ($this->isTmminSelectablePart($label) && session('tmmin_market') === 'export') {
            return 15;
        }

        return $fromDb;
    }
    public function index(){
        // Check if user is logged in via session
        if($this->isAuthenticated()){
            return redirect()->route('print');
        }
        return view('pages.landing');
    }

    public function printIndex(){
        // User is already authenticated by middleware
        $userData = $this->getCurrentUser();
        $username = $userData['name'];
        $qc_pass = Qcpass::all();
        // Get label data from session
        $label = session('label_data');
        
        // Get QC Pass from session
        $qcPass = session('qc_pass');
        $shift = session('shift');
        $qr_value = session('qr_value');
        $labelTemplate = session('label_template', 'new'); // Default to 'new' template

        // Printers list for UI selection
        $printersData = $this->fetchPrintNodePrinters();
        $printers = $printersData['printers'] ?? [];
        $printNodeDefaultPrinterId = $printersData['defaultPrinterId'] ?? null;
        $selectedPrinterId = session('printer_id');
        $defaultPrinterId = (int) config('printing.default_printer_id', 0);
        $hasPrintNodeApiKey = (string) session('printnode_api_key', '') !== '';

        // If session not set yet, prefer PrintNode's `default: true` printer.
        if (empty($selectedPrinterId) && ! empty($printNodeDefaultPrinterId)) {
            $selectedPrinterId = (int) $printNodeDefaultPrinterId;
            session(['printer_id' => (int) $printNodeDefaultPrinterId]);
        }

        // Otherwise fall back to app default_printer_id if it exists in PrintNode list.
        if (empty($selectedPrinterId) && $defaultPrinterId > 0) {
            foreach ($printers as $p) {
                if ((int) ($p['id'] ?? 0) === $defaultPrinterId) {
                    $selectedPrinterId = $defaultPrinterId;
                    session(['printer_id' => $defaultPrinterId]);
                    break;
                }
            }
        }

        $showTmminMarket = $label && $this->isTmminSelectablePart($label);
        $tmminMarket = session('tmmin_market', 'local_adm');
        $labelDisplayQty = $this->effectiveLabelQty($label);
        
        return view('pages.print', compact(
            'qc_pass',
            'username',
            'label',
            'qcPass',
            'shift',
            'qr_value',
            'labelTemplate',
            'printers',
            'selectedPrinterId',
            'hasPrintNodeApiKey',
            'showTmminMarket',
            'tmminMarket',
            'labelDisplayQty'
        ));
    }

    public function updatePrintNodeApiKey(Request $request)
    {
        // User is already authenticated by middleware
        $validated = $request->validate([
            // allow empty string to clear
            'api_key' => ['nullable', 'string', 'max:255'],
        ]);

        $apiKey = trim((string) ($validated['api_key'] ?? ''));

        if ($apiKey === '') {
            session()->forget('printnode_api_key');
            // printer list depends on key; clear selected printer too
            session()->forget('printer_id');
            return redirect()->route('print');
        }

        session(['printnode_api_key' => $apiKey]);
        // reset selected printer so default:true can apply under new account/key
        session()->forget('printer_id');

        return redirect()->route('print');
    }

    public function updatePrinter(Request $request)
    {
        // User is already authenticated by middleware
        $validated = $request->validate([
            'printer_id' => ['required', 'integer', 'min:1'],
        ]);

        session(['printer_id' => (int) $validated['printer_id']]);

        return redirect()->route('print');
    }

    public function store(Request $request){
        $input = trim($request->input('barcode'));
        // dd($input);
        $explodedInput = explode('#',$input);
        // dd($explodedInput,count($explodedInput));
        if(count($explodedInput)==4){
            if($explodedInput[0]=="QC"){
                $isUserExist = Piclabel::where('uniqueCode',$explodedInput[3])->first();
                // dd($isUserExist);
                if(!$isUserExist){
                    return redirect()->back()->withErrors('User belum terdaftar');
                }
                
                // Store user data in session instead of database
                session([
                    'user_logged_in' => true,
                    'user_data' => [
                        'name' => $isUserExist->name,
                        'npk' => $isUserExist->npk,
                        'uniqueCode' => $isUserExist->uniqueCode,
                        'login_time' => now(),
                        'session_id' => session()->getId()
                    ]
                ]);
                
                // Regenerate session ID for security
                session()->regenerate();
                
                return redirect()->route('print');
            }else{
                return redirect()->back()->withErrors('Format tidak sesuai, silahkan scan ulang dengan format yang sesuai !');
            }
        }else{
            return redirect()->back()->withErrors('Format tidak sesuai, silahkan scan ulang dengan format yang sesuai !');
        }
        // 'QC#ABYAN TAHTA FAUZTA ARYANA PUTRA#18240489#'
    }

    public function findLabel(Request $request){
        // User is already authenticated by middleware
        // Format wajib: part_no#job_no#seq#lot_no
        $input = trim($request->input('barcode'));
        $parts = array_map('trim', explode('#', $input));

        if (count($parts) !== 4) {
            return redirect()->back()->withErrors('Format tidak sesuai, silahkan scan ulang dengan format yang sesuai !');
        }

        if ($parts[0] === '' || $parts[1] === '' || $parts[2] === '' || $parts[3] === '') {
            return redirect()->back()->withErrors('Format tidak sesuai, silahkan scan ulang dengan format yang sesuai !');
        }

        // QR login QC memakai pemisah # berbeda (QC#...) — tolak agar tidak tertukar
        if (strtoupper($parts[0]) === 'QC') {
            return redirect()->back()->withErrors('Format tidak sesuai, silahkan scan ulang dengan format yang sesuai !');
        }

        $partNo = $parts[0];
        $isLabelExist = Label::where('part_no', $partNo)->first();
        if (! $isLabelExist) {
            return redirect()->back()->withErrors('Label tidak ditemukan');
        }

        $label = $isLabelExist;
        $qrValue = $partNo;

        if ($this->isTmminSelectablePart($label)) {
            session(['tmmin_market' => 'local_adm']);
        } else {
            session()->forget('tmmin_market');
        }

        // Save label data to session
        session(['label_data' => $label]);
        session(['qr_value' => $qrValue]);
        // session(['lotNo' => $lotNo]);
        
        return redirect()->route('print');
    }

    public function resetSession(){
        // User is already authenticated by middleware
        session()->forget('label_data');
        session()->forget('qc_pass');
        session()->forget('qr_value');
        session()->forget('shift');
        session()->forget('print_quantity');
        session()->forget('print_data');
        session()->forget('tmmin_market');
        // Note: label_template is intentionally NOT reset so user keeps their preference
        return redirect()->route('print');
    }

    public function updateQcPass(Request $request){
        // User is already authenticated by middleware
        $qcPass = $request->input('qc_pass');
        session(['qc_pass' => $qcPass]);
        return redirect()->route('print');
    }

    public function updateShift(Request $request){
        // User is already authenticated by middleware
        $shift = $request->input('shift');
        session(['shift' => $shift]);
        return redirect()->route('print');
    }

    public function updateTmminMarket(Request $request){
        $validated = $request->validate([
            'tmmin_market' => ['required', 'string', 'in:export,local_adm'],
        ]);
        session(['tmmin_market' => $validated['tmmin_market']]);

        return redirect()->route('print');
    }

    public function updateTemplate(Request $request){
        // User is already authenticated by middleware
        $template = $request->input('label_template');
        session(['label_template' => $template]);
        return redirect()->route('print');
    }

    public function printLabel(Request $request){
        // User is already authenticated by middleware
        try {
            $quantity = $request->input('quantity');
            $label = session('label_data');
            $qcPass = session('qc_pass');
            $shift = session('shift');
            $printerId = (int) session('printer_id', (int) config('printing.default_printer_id', 0));
            
            if (!$label) {
                return redirect()->back()->withErrors('No label data found. Please scan a label first.');
            }

            if ($printerId <= 0) {
                return redirect()->back()->withErrors('Please select a printer first.');
            }
            
            if (!$quantity || $quantity <= 0) {
                return redirect()->back()->withErrors('Please enter a valid quantity.');
            }
            
            // Store quantity in session for display
            session(['print_quantity' => $quantity]);
            
            // Find QC Pass ID by username
            $qcPassRecord = Qcpass::where('qc_username', $qcPass)->first();
            if (!$qcPassRecord) {
                return redirect()->back()->withErrors('QC Pass not found.');
            }
            
            // Generate lot number
            $lotNo = $shift ? now()->format('ymd') : '-';
            
            // Get current user for tracking who printed from session
            $userData = $this->getCurrentUser();
            $printedBy = $userData ? $userData['name'] : 'Unknown';
            
            // Save history record
            $historyRecord = History::create([
                'qcpass_id' => $qcPassRecord->id,
                'label_id' => $label->id,
                'lot_no' => $shift.$lotNo,
                'quantity' => $quantity,
                'printed_by' => $printedBy,
                'shift' => $shift,
                'print_status' => 'pending'
            ]);
            
            // Generate QR codes — format standar: part_no#job_no#seq#lot_no
            $qrCodes = [];
            $lotSegment = $shift ? $shift . now()->format('ymd') : '-';
            for ($i = 0; $i < $quantity; $i++) {
                $seq = str_pad($i + 1, 3, '0', STR_PAD_LEFT);
                $qrPayload = $label->part_no . '#' . $label->job_no . '#' . $seq . '#' . $lotSegment;
                $qrCodes[] = \SimpleSoftwareIO\QrCode\Facades\QrCode::format('svg')->size(100)->generate($qrPayload);
            }
            
            $printData = [
                'label' => $label,
                'quantity' => $quantity,
                'displayQty' => $this->effectiveLabelQty($label),
                'qcPass' => $qcPass,
                'shift' => $shift,
                'printDate' => now()->format('d/m/Y'),
                'lotNo' => $shift ? now()->format('ymd') : '-',
                'qrCodes' => $qrCodes,
            ];
            
            // Generate PDF with Spatie Laravel PDF
            $filename = 'labels_' . $label->job_no . '_' . now()->format('Y-m-d_H-i-s') . '.pdf';
            // 1. Make sure the target folder exists
            \Illuminate\Support\Facades\Storage::disk('public')->makeDirectory('labels');
            
            // 2. Select template based on session (old or new)
            $labelTemplate = session('label_template', 'new');
            $pdfView = $labelTemplate === 'old' ? 'pages.print-label-pdf' : 'pages.rev-print-label-pdf';
            
            // 3. Generate PDF with selected template
            Browsershot::html(view($pdfView, compact('printData'))->render())
                ->timeout(60000)
                ->paperSize(130, 90, 'mm') // 144x89mm in millimeters
                ->margins(0, 0, 0, 0) // No margins
                ->dismissDialogs() // Dismiss any browser dialogs
                ->waitUntilNetworkIdle() // Wait for network to be idle
                ->emulateMedia('print') // Emulate print media
                ->showBackground() // Show background colors and images
                ->savePdf(storage_path("app/public/labels/label-print.pdf"));

                
                $httpClient = $this->printNodeHttpClient();
                $pdfBase64 = base64_encode(file_get_contents(storage_path("app/public/labels/label-print.pdf")));

                $response = $httpClient
                    ->post('https://api.printnode.com/printjobs', [
                        'printerId' => $printerId,
                        'title' => 'Label Print',
                        'contentType' => 'pdf_base64',
                        'content' => $pdfBase64,
                        'source' => 'LaravelApp',
                        'options' => [
                            'fit_to_page' => false, // Prevent scaling
                            'scale' => 100, // 100% scale - no scaling
                            'auto_rotate' => false, // Prevent auto rotation
                            'auto_center' => false, // Prevent auto centering
                        ],
                    ]);

                if ($response->successful()) {
                    // Update history record with success status
                    $historyRecord->update([
                        'print_status' => 'success'
                    ]);
                    return redirect()->back()->with('print_status', 'success');
                }

                // Update history record with error status
                $historyRecord->update([
                    'print_status' => 'error',
                    'error_message' => 'PrintNode API Error: ' . $response->status() . ' - ' . $response->body()
                ]);

                Log::error('PrintNode error response', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
                return redirect()->back()->with('print_status', 'error');

        } 
        catch (\Exception $e) {
            // Update history record with error status if it exists
            if (isset($historyRecord)) {
                $historyRecord->update([
                    'print_status' => 'error',
                    'error_message' => 'PDF Generation Error: ' . $e->getMessage()
                ]);
            }
            
            Log::error('PDF Generation Error: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return redirect()->back()->withErrors('Error generating PDF: ' . $e->getMessage());
        }
    }

    public function history(){
        // User is already authenticated by middleware
        // Get all history records with related data
        $histories = History::with(['qcpass', 'label'])
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('pages.history', compact('histories'));
    }

    public function logout(){
        // Clear all session data and regenerate session ID for security
        session()->flush();
        session()->regenerate();
        return redirect()->route('index')->with('success', 'You have been logged out successfully.');
    }
    //
}

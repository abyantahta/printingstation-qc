<?php

namespace App\Http\Controllers;

use App\Models\CurrentUser;
use App\Models\History;
use App\Models\Label;
use App\Models\Piclabel;
use App\Models\Qcpass;
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
    public function index(){
        $isCurrentUser = CurrentUser::first();
        if($isCurrentUser){
            return redirect()->route('print');
        }
        return view('pages.landing');
    }

    public function printIndex(){
        $isCurrentUser = CurrentUser::first();
        if(!$isCurrentUser){
            return redirect()->route('index');
        }
        $username = $isCurrentUser->name;
        $qc_pass = Qcpass::all();
        // Get label data from session
        $label = session('label_data');
        
        // Get QC Pass from session
        $qcPass = session('qc_pass');
        $shift = session('shift');
        $qr_value = session('qr_value');
        
        return view('pages.print', compact('qc_pass','username', 'label', 'qcPass','shift','qr_value'));
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
                CurrentUser::create([
                    'name'=>$isUserExist->name,
                    'npk'=>$isUserExist->npk,
                ]);
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
        $input = trim($request->input('barcode'));
        $label = null;
        $qrValue = null;
        if(strlen($input) == 8 ||strlen($input) == 9 ||strlen($input) == 10 ||strlen($input) == 11){
            
            $jobNo = substr($input,0,strlen($input)-4);
            $isLabelExist = Label::where('job_no',$jobNo)->first();
            if(!$isLabelExist){
                // dd('halo');
                return redirect()->back()->withErrors('Label tidak ditemukan');
            }
            $label = $isLabelExist;
            $qrValue = $jobNo;
        }
        else if(strlen($input)==17||strlen($input)==18||strlen($input)==17||strlen($input)==20){
            $partNo = substr($input,0,strlen($input)-3);
            $isLabelExist = Label::where('part_no',$partNo)->first();
            if(!$isLabelExist){
                return redirect()->back()->withErrors('Label tidak ditemukan');
            }
            $label = $isLabelExist;
            $qrValue = $partNo;
        }
        else{
            // dd('halo2');
            return redirect()->back()->withErrors('Format tidak sesuai, silahkan scan ulang dengan format yang sesuai !');
        }
        
        // Save label data to session
        session(['label_data' => $label]);
        session(['qr_value' => $qrValue]);
        
        return redirect()->route('print');
    }

    public function resetSession(){
        session()->forget('label_data');
        session()->forget('qc_pass');
        session()->forget('qr_value');
        session()->forget('shift');
        session()->forget('print_quantity');
        session()->forget('print_data');
        return redirect()->route('print');
    }

    public function updateQcPass(Request $request){
        $qcPass = $request->input('qc_pass');
        session(['qc_pass' => $qcPass]);
        return redirect()->route('print');
    }

    public function updateShift(Request $request){
        $shift = $request->input('shift');
        session(['shift' => $shift]);
        return redirect()->route('print');
    }

    public function printLabel(Request $request){
        try {
            $quantity = $request->input('quantity');
            $label = session('label_data');
            $qcPass = session('qc_pass');
            $shift = session('shift');
            $qr_value = session('qr_value');
            
            if (!$label) {
                return redirect()->back()->withErrors('No label data found. Please scan a label first.');
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
            
            // Save history record
            History::create([
                'qcpass_id' => $qcPassRecord->id,
                'label_id' => $label->id,
                'lot_no' => $shift.$lotNo,
                'quantity' => $quantity
            ]);
            
            // Generate QR codes for each label using SVG format (no ImageMagick required)
            $qrCodes = [];
            $qr = null;
            for ($i = 0; $i < $quantity; $i++) {
                $qrValue = null;
                if($qr_value == $label->job_no){
                    $qr = $label->job_no;
                    $qrValue = $label->job_no . "-" . str_pad($i + 1, 3, '0', STR_PAD_LEFT);
                }else if($qr_value == $label->part_no){
                    $qr = $label->part_no;
                    $qrValue = $label->part_no . str_pad($i + 1, 3, '0', STR_PAD_LEFT);
                }
                $qrCodes[] = \SimpleSoftwareIO\QrCode\Facades\QrCode::format('svg')->size(100)->generate($qrValue);
            }
            
            // Generate print data
            $printData = [
                // 'label' => $label,
                'label' => $label,
                'quantity' => $quantity,
                'qcPass' => $qcPass,
                'shift' => $shift,
                'printDate' => now()->format('d/m/Y'),
                'lotNo' => $shift ? now()->format('ymd') : '-',
                'qrCodes' => $qrCodes,
                'qrValue' => $qr
            ];
            
            // Generate PDF with Spatie Laravel PDF
            $filename = 'labels_' . $label->job_no . '_' . now()->format('Y-m-d_H-i-s') . '.pdf';
            // 1. Make sure the target folder exists
            $savePath = storage_path('app/public/test.pdf');
// before ->savePdf(...)
                \Illuminate\Support\Facades\Storage::disk('public')->makeDirectory('labels', 0775, true);
            // 2. Try with a very simple HTML snippet
                Browsershot::html(view('pages.print-label-pdf', compact('printData'))->render())
                ->timeout(60000)
                ->paperSize(130, 85, 'mm') // 144x89mm in millimeters
                // ->margins(0, 0, 0, 0) // No margins
                ->dismissDialogs() // Dismiss any browser dialogs
                ->waitUntilNetworkIdle() // Wait for network to be idle
                ->savePdf(storage_path("app/public/labels/label-print.pdf"));

                // $pdfUrl = Storage::disk('public')->url("labels/{$filename}");
                // $pdfUrl = "http://printingstation-qc.test:8080/storage/labels/{$filename}";
                // dd($pdfUrl);
                // return redirect()->route('auto.print', ['file' => $pdfUrl]);
                
                $printerId = 7470256   ; // atau ID printer dari NodePrint/PrintNode
                // $printerId = 74702562   ; // atau ID printer dari NodePrint/PrintNode
                // $printers = Printing::printers(); // ini akan return Collection of Printer objects


// $client = new Client('2zPogBrB_NqpGugpRZ8lcRXqCEYqwfebxzuk6i0PoKI');
// $printers = $client->printers();



                $apiKey = '2zPogBrB_NqpGugpRZ8lcRXqCEYqwfebxzuk6i0PoKI';
                $response = Http::withBasicAuth($apiKey, 'printnode')->get('https://api.printnode.com/printers');

                // dd($response->json());

                // dd($printers);
                
                // Printing::newPrintTask()
                //     ->printer($printerId)
                //     ->file(storage_path("app/public/labels/label-print.pdf"))
                //     ->send();

                $pdfBase64 = base64_encode(file_get_contents(storage_path("app/public/labels/label-print.pdf")));

// $response = Http::withBasicAuth($apiKey, '')
//     ->post('https://api.printnode.com/printjobs', [
//         'printerId' => $printerId,
//         'title' => 'Label Print',
//         'contentType' => 'pdf_base64',
//         'content' => $pdfBase64,
//         'source' => 'LaravelApp',
//     ]);
$response = Http::withBasicAuth($apiKey, '')
    ->post('https://api.printnode.com/printjobs', [
        'printerId' => $printerId,
        'title' => 'Label Print',
        'contentType' => 'pdf_base64',
        'content' => $pdfBase64,
        'source' => 'LaravelApp',
        'options' => [
            'fit_to_page' => false, // Prevent scaling
            // 'paper' => 'Custom.100x89mm', // Custom paper size
            'scale' => 100, // 100% scale - no scaling
            'auto_rotate' => false, // Prevent auto rotation
            'auto_center' => false, // Prevent auto centering
        ],
    ]);

                if ($response->successful()) {
                    return redirect()->back()->with('print_status', 'success');
                }

                Log::error('PrintNode error response', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);
                return redirect()->back()->with('print_status', 'error');


            // return Pdf::view('pages.print-label-pdf', compact('printData'))
            //     ->withBrowsershot(fn (Browsershot $browsershot)=>
            //     $browsershot->paperSize(width: 130, height: 85)
            //     )
            //     ->download($filename);
        } catch (\Exception $e) {
            Log::error('PDF Generation Error: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());
            return redirect()->back()->withErrors('Error generating PDF: ' . $e->getMessage());
        }
    }



    public function logout(){
        CurrentUser::query()->delete();
        return redirect()->route('index');
    }
    //
}

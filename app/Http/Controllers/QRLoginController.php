<?php

namespace App\Http\Controllers;

use App\Models\CurrentUser;
use App\Models\Label;
use App\Models\Piclabel;
use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;
use Illuminate\Support\Facades\Log;
use Spatie\Browsershot\Browsershot;

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
        
        // Get label data from session
        $label = session('label_data');
        
        // Get QC Pass from session
        $qcPass = session('qc_pass');
        $shift = session('shift');
        $qr_value = session('qr_value');
        
        return view('pages.print', compact('username', 'label', 'qcPass','shift','qr_value'));
    }

    public function store(Request $request){
        $input = trim($request->input('barcode'));
        // dd($input);
        $explodedInput = explode('#',$input);
        // dd($explodedInput,count($explodedInput));
        if(count($explodedInput)==4){
            if($explodedInput[0]=="QC" && $explodedInput[3]=="Poporemo"){
                $isUserExist = Piclabel::where('name',$explodedInput[1])->where('npk',$explodedInput[2])->first();
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
        if(strlen($input) == 11){
            $jobNo = substr($input,0,7);
            $isLabelExist = Label::where('job_no',$jobNo)->first();
            if(!$isLabelExist){
                return redirect()->back()->withErrors('Label tidak ditemukan');
            }
            $label = $isLabelExist;
            $qrValue = $jobNo;
        }
        else if(strlen($input)==17){
            $partNo = substr($input,0,14);
            $isLabelExist = Label::where('part_no',$partNo)->first();
            if(!$isLabelExist){
                return redirect()->back()->withErrors('Label tidak ditemukan');
            }
            $label = $isLabelExist;
            $qrValue = $partNo;
        }
        else{
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
            
            // Generate QR codes for each label using SVG format (no ImageMagick required)
            $qrCodes = [];
            for ($i = 0; $i < $quantity; $i++) {
                $qrValue = null;
                if($qr_value == $label->job_no){
                    $qrValue = $label->job_no . "-" . str_pad($i + 1, 3, '0', STR_PAD_LEFT);
                }else if($qr_value == $label->part_no){
                    $qrValue = $label->part_no . str_pad($i + 1, 3, '0', STR_PAD_LEFT);
                }
                $qrCodes[] = \SimpleSoftwareIO\QrCode\Facades\QrCode::format('svg')->size(100)->generate($qrValue);
            }
            
            // Generate print data
            $printData = [
                'label' => $label,
                'quantity' => $quantity,
                'qcPass' => $qcPass,
                'shift' => $shift,
                'printDate' => now()->format('d/m/Y'),
                'lotNo' => $shift ? now()->format('ymd') : '-',
                'qrCodes' => $qrCodes,
                'qrValue' => $qrValue
            ];
            
            // Generate PDF with Spatie Laravel PDF
            $filename = 'labels_' . $label->job_no . '_' . now()->format('Y-m-d_H-i-s') . '.pdf';
            return Pdf::view('pages.print-label-pdf', compact('printData'))
                // ->format('A4') // We'll set custom size in the view with @page CSS
                ->withBrowsershot(fn (Browsershot $browsershot)=>
                $browsershot->paperSize(width: 130, height: 85) // width and height in pixels
                )
                ->download($filename);
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

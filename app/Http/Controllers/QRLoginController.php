<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRLoginController extends Controller
{
    public function store(Request $request){
        $input = trim($request->input('barcode'));
        // dd($input);
        $explodedInput = explode('#',$input);
        dd($explodedInput);
        if(count($explodedInput)==3){
            if($explodedInput[0]=="QC_PATROL" && $explodedInput[3]=="Sankei2025..!"){

            }else{
                return redirect()->back()->withErrors('Format tidak sesuai, silahkan scan ulang dengan format yang sesuai !');
            }
        }else{
            return redirect()->back()->withErrors('Format tidak sesuai, silahkan scan ulang dengan format yang sesuai !');
        }
        // 'QC#ABYAN TAHTA FAUZTA ARYANA PUTRA#18240489#'
    }
    //
}

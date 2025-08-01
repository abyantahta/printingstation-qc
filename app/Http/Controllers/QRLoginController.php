<?php

namespace App\Http\Controllers;

use App\Models\CurrentUser;
use App\Models\Piclabel;
use Illuminate\Http\Request;

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
        return view('pages.print',compact('username'));
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

    public function logout(){
        CurrentUser::query()->delete();
        return redirect()->route('index');
    }
    //
}

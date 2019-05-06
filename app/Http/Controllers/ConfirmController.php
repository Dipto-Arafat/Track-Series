<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ConfirmController extends Controller
{
    public function index(Request $req){
        $user = User::where('mail', $req->cmail)
        ->first();

        if($user->approved == '1'){
            session()->flash('msg','Account Has Already Been Activated!Simply Log In Now!');
            return redirect()->route('tsrm.login');
        }
        else{
            if($user->token == $req->ctoken){
                $xuser = User::where('mail',$req->cmail)->first();
                $xuser->approved = '1';
                $xuser->token = '';
                $xuser->save();

                session()->flash('msg','Mail Verification is Complete!Log In Now');
                return redirect()->route('tsrm.login');

            }
            else{
                session()->flash('msg','Try Logging In!If you face any problem please contact support!');
                return redirect()->route('tsrm.login');
            }
        }
    }
}

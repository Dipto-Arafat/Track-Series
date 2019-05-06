<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\LogInRequest;
use Illuminate\Support\Facades\Hash;
use App\User;

class LogInController extends Controller
{
    public function index(Request $req){
        return view('login.index');
    }
    
    public function verify(LogInRequest $req){
        
        $user = User::where('mail', $req->mail)
            ->first();
       
        if($user){
            if (Hash::check($req->pass,$user->pass)) {
                if($user->approved=='0'){
                    session()->flash('msg','Please Confirm Your Account To Log In Track Series!');
                    return redirect()->route('tsrm.login');
                }
                else if($user->approved=='1'){
                    if($user->type=='1'){
                        $req->session()->put('xuser',$user);
                        $req->session()->put('xpass',$req->pass);

                        return redirect()->route('user.home');

                    }
                    else if($user->type=='2'){
                        echo 'Admin Logged In';
                    }
                }
                else if($user->approved=='2'){
                    session()->flash('msg','Your Account has been banned!Contact Support To Resolve This Issue!');
                    return redirect()->route('tsrm.login');
                }
                else{
                    session()->flash('msg','Something Went Wrong!Try Again!');
                    return redirect()->route('tsrm.login');
                }
            }
            else{
                session()->flash('msg','Invalid Mail or Password!');
                return redirect()->route('tsrm.login');
            }
        }
        else{
            session()->flash('msg','Invalid Mail or Password!');
            return redirect()->route('tsrm.login');
        }   
    }
}

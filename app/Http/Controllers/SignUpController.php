<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignUpRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendMail;
use App\User;

class SignUpController extends Controller
{
    public function index(Request $req){
        return view('signup.index');
    }

    public function store(SignUpRequest $req){

        $pool = '0123456789abcdefghijklmnopqrstuvwxyz*#()%$@!ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = substr(str_shuffle(str_repeat($pool, 5)), 0,8);
        $hashedPassword = Hash::make($req->pass, [
            'rounds' => 12
        ]);

        $data = array(
            'fname' => $req->fname,
            'lname' => $req->lname,
            'mail' => $req->mail,
            'token' => $token
        );
        
        Mail::to($req->mail)->send(new SendMail($data));

        $user = new User;
    	$user->fname = $req->fname;
    	$user->lname = $req->lname;
    	$user->mail = $req->mail;
        $user->pass = $hashedPassword;
        $user->type = '1';
        $user->approved = '0';
        $user->token = $token;
        $user->save();
        
        return redirect()->route('tsrm.login');
    }
}

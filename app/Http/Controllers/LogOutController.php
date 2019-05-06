<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogOutController extends Controller
{
    public function logout(Request $req){
        $req->session()->flush();
        return redirect()->route('tsrm.login');
    }
}

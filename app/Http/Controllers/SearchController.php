<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Movie_Series;

class SearchController extends Controller
{
    public function handle(Request $req){
        $text = $req->text;
        $option = $req->id;
       // echo $option;
       
       if($option == '1'){
        $user = DB::table('user')->where('fname','like','%'.$text.'%')
                        ->orWhere('lname','like','%'.$text.'%')                   
                        ->get();
        
        $ms = DB::table('movie_series')->where('ms_name','like','%'.$text.'%')
                    ->get();
                                
        return response()->json(['msdata' => $ms,'userdata' => $user,'rflag' => '1']);
        
        }

        if($option == '2'){
            $user = DB::table('user')->where('fname','like','%'.$text.'%')
                        ->orWhere('lname','like','%'.$text.'%')            
                        ->get();
            
        return response()->json(['userdata' => $user,'rflag' => '2']);
        }

        if($option == '3'){
            $ms = DB::table('movie_series')->where('ms_name','like','%'.$text.'%')
                        ->where('mstype','1')
                        ->get();
            
        return response()->json(['msdata' => $ms,'rflag' => '3']);
        }

        if($option == '4'){
            $ms = DB::table('movie_series')->where('ms_name','like','%'.$text.'%')
                        ->where('mstype','2')
                        ->get();
            
        return response()->json(['msdata' => $ms,'rflag' => '4']);
        }
    }
}

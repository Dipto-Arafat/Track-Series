<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Review;
use App\FollowMS;
use App\FollowUser;

class UserProfileController extends Controller
{
    public function show(Request $req){
        
        $userinfo = User::where('user_id',$req->id)
                        ->first();

        $userreview = DB::table('reviews')
                          ->join('movie_series','reviews.review_ms_id','=','movie_series.ms_id')
                          ->where('reviews.reviewer_id',$req->id)
                          ->get();

        $userfollow =FollowUser::where('uwho',$req->session()->get('xuser')->user_id)
                                  ->where('uwhom',$req->id)
                                  ->first();
        if($userfollow){
            $flag = true;
        }
        else{
            $flag = false;
        }
       return view('userprofile.userprof')->with('userinfo',$userinfo)->with('userreview',$userreview)->with('followflag',$flag);
    }

    public function followuser(Request $req){
        $who = $req->session()->get('xuser')->user_id;
        $whom = $req->id;

        $follow = new FollowUser;
        $follow->uwho = $who;
        $follow->uwhom = $whom;
        $follow->save();

        echo 'true';
    }

    public function unfollowuser(Request $req){
        $who = $req->session()->get('xuser')->user_id;
        $whom = $req->id;

        $follow = FollowUser::where('uwho',$who)->where('uwhom',$whom)->delete();

        echo 'true';
    }


}

<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Review;
use App\Movie_Series;
use App\FollowMS;
use App\FollowUser;
use App\EpisodeMap;

class HomeController extends Controller
{
    public function index(Request $req){
        
        $alldata = DB::table('reviews')
                   ->join('movie_series','reviews.review_ms_id','=','movie_series.ms_id')
                   ->join('user','reviews.reviewer_id','=','user.user_id')
                   ->join('followuser','reviews.reviewer_id','=','followuser.uwhom')
                   ->where('followuser.uwho',$req->session()->get('xuser')->user_id)
                   ->orderBy('reviews.date','desc')
                   ->get();
       return view('user.home')->with('alldata',$alldata);
    }

    public function viewprofile(Request $req){
        $user = User::where('user_id',$req->session()->get('xuser')->user_id)
                    ->first();
        return view('user.viewprofile')->with('userinfo',$user);
    }

    public function editprofile(Request $req){
        $user = User::where('user_id',$req->session()->get('xuser')->user_id)
                    ->first();
        return view('user.editprofile')->with('userinfo',$user);
    }

    public function profilepicture(Request $req){
        if($req->hasFile('filename')){

            $file = $req->file('filename');
            $filename = time().date('Y-m-d', time()).".".$file->getClientOriginalExtension();
    		$file->move('upload/',$filename);

            $user = User::where('user_id',$req->session()->get('xuser')->user_id)->first();
            $user->picture = $filename;
            $user->save();

            return redirect()->route('user.viewprofile');
                
    	}else{
    		echo "Error !!";
    	}
    }

    public function updateprofile(ProfileUpdateRequest $req){
        
        $hashedPassword = Hash::make($req->pass, [
            'rounds' => 12
        ]);
        
        $user = User::where('user_id',$req->session()->get('xuser')->user_id)->first();
        $user->fname = $req->fname;
        $user->lname = $req->lname;
        $user->pass = $hashedPassword;
        $user->gender = $req->radio;
        $user->dob = $req->day.'/'.$req->month.'/'.$req->year;
        $user->country = $req->country;
        $user->save();

        return redirect()->route('user.viewprofile');
    }

    public function followedseries(Request $req){
        $data = DB::table('followms')
                ->join('movie_series','followms.mswhom','=','movie_series.ms_id')
                ->where('followms.mswho',$req->session()->get('xuser')->user_id)
                ->where('movie_series.mstype','2')
                ->get();
        //echo $data;
        return view('user.serieslist')->with('data',$data);        
    }

    public function unfollowseries(Request $req){
        $who = $req->session()->get('xuser')->user_id;
        $whom = $req->id;

        $follow = FollowMS::where('mswho',$who)->where('mswhom',$whom)->delete();

        return redirect()->route('user.followedseries');

    }

    public function followedmovie(Request $req){
        $data = DB::table('followms')
                ->join('movie_series','followms.mswhom','=','movie_series.ms_id')
                ->where('followms.mswho',$req->session()->get('xuser')->user_id)
                ->where('movie_series.mstype','1')
                ->get();
        //echo $data;
        return view('user.movielist')->with('data',$data);        
    }

    public function unfollowmovie(Request $req){
        $who = $req->session()->get('xuser')->user_id;
        $whom = $req->id;

        $follow = FollowMS::where('mswho',$who)->where('mswhom',$whom)->delete();

        return redirect()->route('user.followedmovie');

    }

    public function follower(Request $req){
        $data = DB::table('followuser')
                ->join('user','followuser.uwho','=','user.user_id')
                ->where('followuser.uwhom',$req->session()->get('xuser')->user_id)
                ->get();
        //echo $data;
        return view('user.follower')->with('data',$data);        
    }

    public function following(Request $req){
        $data = DB::table('followuser')
                ->join('user','followuser.uwhom','=','user.user_id')
                ->where('followuser.uwho',$req->session()->get('xuser')->user_id)
                ->get();
        //echo $data;
        return view('user.following')->with('data',$data);        
    }

    public function unfollowuser(Request $req){
        $who = $req->session()->get('xuser')->user_id;
        $whom = $req->id;

        $follow = FollowUser::where('uwho',$who)->where('uwhom',$whom)->delete();

        return redirect()->route('user.following');

    }

    public function reviews(Request $req){
        $data = DB::table('reviews')
                ->join('movie_series','reviews.review_ms_id','=','movie_series.ms_id')
                ->where('reviews.reviewer_id',$req->session()->get('xuser')->user_id)
                ->get();
        //echo $data;
        return view('user.reviews')->with('data',$data);        
    }

    
    public function deletereviews(Request $req){
        
        $who = $req->session()->get('xuser')->user_id;
        $whom = $req->id;

        $review = Review::find($whom)->delete();

        return redirect()->route('user.reviews');
    }

    public function track(Request $req){
        
        $followms = DB::table('followms')
        ->join('movie_series','followms.mswhom','=','movie_series.ms_id')
        ->where('followms.mswho',$req->session()->get('xuser')->user_id)
        ->where('movie_series.mstype','2')
        ->get();
        return view('user.track')->with('data',$followms);        
    }

    public function episodemanage(Request $req){
        $episodenumber = $req->id;
        $status = $req->status;
        if($status == 'true'){
            $episodemap = new EpisodeMap;
            $episodemap->user_idep = $req->session()->get('xuser')->user_id;
            $episodemap->ep_id = $episodenumber;
            $episodemap->save();
            echo $episodenumber.'<-->'.$status;
        }
        else{
            $episodemap = EpisodeMap::where('user_idep',$req->session()->get('xuser')->user_id)
                                    ->where('ep_id',$episodenumber)
                                    ->delete();
            echo $episodenumber.'<-->'.$status;                        
        }
    }
    
}

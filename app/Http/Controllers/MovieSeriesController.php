<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Movie_Series;
use App\Review;
use App\FollowMS;
use App\Episode;
use App\EpisodeMap;

class MovieSeriesController extends Controller
{
    public function show(Request $req){
        
        $msinfo = Movie_Series::where('ms_id',$req->id)
                        ->first();
        $msreview = Review::where('review_ms_id',$req->id)
                        ->get();
                        
        $myreview = Review::where('review_ms_id',$req->id)
                        ->where('reviewer_id',$req->session()->get('xuser')->user_id)                       
                        ->first();

        $pepreview = DB::table('reviews')
                          ->join('user','reviews.reviewer_id','=','user.user_id')
                          ->where('reviews.review_ms_id',$req->id)
                          ->get();

        $userfollow =FollowMS::where('mswho',$req->session()->get('xuser')->user_id)
                                  ->where('mswhom',$req->id)
                                  ->first();
        if($userfollow){
            $flag = true;
        }
        else{
            $flag = false;
        }

       return view('ms.msprof')->with('msinfo',$msinfo)->with('msreview',$msreview)->with('pepreview',$pepreview)->with('followflag',$flag)->with('myreview',$myreview);
    }

    public function changerating(Request $req){
        $arr = explode('*',$req->id);
        
        $whorate = $arr[0];
        $whom = $arr[1];
        $rating = $arr[2];

        $check = Review::where('review_ms_id',$whom)->where('reviewer_id',$whorate)->get();

        if(count($check)>=1){
            $review = Review::where('review_ms_id',$whom)->where('reviewer_id',$whorate)->first();
            $review->rating = $rating;
            $review->date = date('d-m-Y',time());
            $review->save();

            echo 'true';
        }
        else{

            $review = new Review;
            
            $review->reviewer_id = $whorate;
            $review->review_ms_id = $whom;
            $review->rating = $rating;
            $review->date = date('d-m-Y',time());
            $review->save();

            echo 'true';
        }
    }

    public function changecomment(Request $req){
        
        $whorate = $req->session()->get('xuser')->user_id;
        $whom = $req->id;
        $comment = $req->comment;

        $check = Review::where('review_ms_id',$whom)->where('reviewer_id',$whorate)->get();

        if(count($check)>=1){
            $review = Review::where('review_ms_id',$whom)->where('reviewer_id',$whorate)->first();
            $review->comment = $comment;
            $review->date = date('d-m-Y',time());
            $review->save();

            echo 'true';
        }
        else{

            $review = new Review;
            
            $review->reviewer_id = $whorate;
            $review->review_ms_id = $whom;
            $review->comment = $comment;
            $review->date = date('d-m-Y',time());
            $review->save();

            echo 'true';
        }
    }

    public function followms(Request $req){
        $who = $req->session()->get('xuser')->user_id;
        $whom = $req->id;

        $follow = new FollowMS;
        $follow->mswho = $who;
        $follow->mswhom = $whom;
        $follow->save();

        echo 'true';
    }

    public function unfollowms(Request $req){
        $who = $req->session()->get('xuser')->user_id;
        $whom = $req->id;

        $follow = FollowMS::where('mswho',$who)->where('mswhom',$whom)->delete();

        echo 'true';
    }

    public function allepisode(Request $req){
        $allepisodes = Episode::where('series_id',$req->id)->get();

    /*    //echo $episodes;
        foreach($allepisodes as $ep){
            echo $ep['episode_id'].'<br>';
        }
    */    
        $myseen = DB::table('episodemap')
        ->join('episode','episodemap.ep_id','=','episode.episode_id')
        ->where('episodemap.user_idep',$req->session()->get('xuser')->user_id)
        ->where('episode.series_id',$req->id)
        ->get();
    /*
        foreach($myseen as $ep){
            echo $ep->episode_id.'<br>';
        }

    */
    echo "<table class='table table-dark table-striped table-borderless table-hover table-sm'>
    <thead>
      <tr>
        <th scope='col'>EPISODES</th>
      </tr>
    </thead>";

        foreach($allepisodes as $abc){
            $seen = 0;
            foreach($myseen as $a){
                if($abc['episode_id'] == $a->episode_id){
                    //echo $abc['episode_id'].'<---------->'.'watched'.'<br>';
                    echo "<tr><td><label class='trackcontainer'>".$abc['episode_name']."
                            <input type='checkbox' id='".$abc['episode_id']."' onclick='manageEpisode(this)' checked='checked'>
                            <span class='trackmark'></span>
                        </label></td></tr>";
                    $seen = 1;
                    break;
                }
            }
            if($seen != '1'){
                //echo $abc['episode_id'].'<---------->'.'unwatched'.'<br>';
                echo "<tr><td><label class='trackcontainer'>".$abc['episode_name']."
                        <input type='checkbox' id='".$abc['episode_id']."' onclick='manageEpisode(this)'>
                        <span class='trackmark'></span>
                    </label></td></tr>";
            }
        }
        echo '</table>';                
    }

}

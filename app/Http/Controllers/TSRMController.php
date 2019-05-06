<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Movie_Series;
use App\Review;

class TSRMController extends Controller
{
    public function index(Request $req){
        $user = User:: all();
        $totalUser = count($user);

        $movies = Movie_Series:: where('mstype','1')->get();
        $totalMovie = count($movies);

        $series = Movie_Series:: where('mstype','2')->get();
        $totalSeries = count($series);

        $reviews = Review:: all();
        $totalReviews = count($reviews);

        return view('index')->withUser($totalUser)->withMovies($totalMovie)->withSeries($totalSeries)->withReviews($totalReviews);
    }
}

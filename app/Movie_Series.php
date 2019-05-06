<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie_Series extends Model
{
    protected $table = "movie_series";
    protected $primaryKey = "ms_id";
    public $timestamps = false;
}

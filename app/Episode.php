<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $table = "episode";
    protected $primaryKey = "episode_id";
    public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowMS extends Model
{
    protected $table = "followms";
    protected $primaryKey = "msfollow_id";
    public $timestamps = false;
}

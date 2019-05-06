<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FollowUser extends Model
{
    protected $table = "followuser";
    protected $primaryKey = "ufollow_id";
    public $timestamps = false;
}

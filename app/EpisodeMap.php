<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EpisodeMap extends Model
{
    protected $table = "episodemap";
    protected $primaryKey = "ep_map_id";
    public $timestamps = false;
}

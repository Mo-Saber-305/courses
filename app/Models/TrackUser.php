<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackUser extends Model
{

    protected $table = 'track_user';
    public $timestamps = false;
    protected $fillable = array('user_id', 'track_id');

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{

    protected $table = 'videos';
    public $timestamps = true;
    protected $fillable = array('course_id', 'title', 'link');

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

}

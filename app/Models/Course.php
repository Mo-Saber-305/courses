<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $table = 'courses';
    public $timestamps = true;
    protected $fillable = array('track_id', 'title', 'link', 'image', 'status', 'description');
    protected $appends = ['image_path', 'users_count'];

    public function track()
    {
        return $this->belongsTo('App\Models\Track');
    }

    public function videos()
    {
        return $this->hasMany('App\Models\Video');
    }

    public function quizzes()
    {
        return $this->hasMany('App\Models\Quiz');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function getImagePathAttribute()
    {
        return asset('dashboard/images/courses/' . $this->image);
    }

    public function getUsersCountAttribute()
    {
        return $this->users->count();
    }

}

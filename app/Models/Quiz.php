<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{

    protected $table = 'quizzes';
    public $timestamps = true;
    protected $fillable = array('course_id', 'name');

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

    protected $table = 'questions';
    public $timestamps = true;
    protected $fillable = array('title', 'answers', 'right_answer', 'score', 'quiz_id');

    public function quiz()
    {
        return $this->belongsTo('App\Models\Quiz');
    }

}

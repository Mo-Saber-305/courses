<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizUser extends Model
{

    protected $table = 'quiz_user';
    public $timestamps = false;
    protected $fillable = array('user_id', 'quiz_id');

}

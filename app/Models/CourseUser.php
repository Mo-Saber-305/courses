<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseUser extends Model
{

    protected $table = 'course_user';
    public $timestamps = false;
    protected $fillable = array('user_id', 'course_id');

}

<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'provider', 'provider_id', 'score', 'type'
    ];

    protected $appends = ['image_path', 'courses_count'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course');
    }

    public function quizzes()
    {
        return $this->belongsToMany('App\Models\Quiz');
    }

    public function tracks()
    {
        return $this->belongsToMany('App\Models\Track');
    }

    /*Attributes*/

    public function getImagePathAttribute()
    {
        return asset('dashboard/images/users/' . $this->image);
    }

    public function getCoursesCountAttribute()
    {
        return $this->courses->count();
    }
}

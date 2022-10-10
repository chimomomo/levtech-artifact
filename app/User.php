<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public function reviews()   
    {
        return $this->hasMany('App\Review');  
    }
    
    public function posts()   
    {
        return $this->hasMany('App\Post');  
    }
    
    public function recruits()   
    {
        return $this->hasMany('App\Recruit');  
    }
    
    public function bugs()   
    {
        return $this->hasMany('App\Bug');  
    }
    
    public function amendments()   
    {
        return $this->hasMany('App\Amendment');  
    }
    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

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
    
}

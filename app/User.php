<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public function getByReviewUser(int $limit_count = 5)
    {
         return $this->reviews()->with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function getByPostUser(int $limit_count = 5)
    {
         return $this->posts()->with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function getByRecruitUser(int $limit_count = 5)
    {
         return $this->recruits()->with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function getByBugUser(int $limit_count = 5)
    {
         return $this->bugs()->with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function getByAmendmentUser(int $limit_count = 5)
    {
         return $this->amendments()->with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
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
    
    public function postComments()
    {
        return $this->hasMany('App\PostComment');
    }
    
    public function postLikes()
    {
        return $this->hasMany('App\PostLike');
    }
    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email',
        'password',
        'age',
        'sex',
        'comment',
        'image_name'
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

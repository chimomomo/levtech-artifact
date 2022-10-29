<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

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
    
    public function recruitComments()
    {
        return $this->hasMany('App\RecruitComment');
    }
    
    public function amendmentComments()
    {
        return $this->hasMany('App\AmendmentComment');
    }
    
    public function amendmentLikes()
    {
        return $this->hasMany('App\AmendmentLike');
    }
    
    public function bugComments()
    {
        return $this->hasMany('App\BugComment');
    }
    
    public function bugLikes()
    {
        return $this->hasMany('App\BugLike');
    }
    
    public function followings()
    {
         return $this->belongsToMany('App\FollowUser', 'follow_users', 'user_id', 'follow_id');
    }
    
    public function followers()
    {
         return $this->belongsToMany('App\FollowUser', 'follow_users', 'follow_id', 'user_id');
    }
    
    public function is_user_follow_by_auth_user()
    {
        $id = Auth::id();
    
        $userfollows = array();
        foreach($this->userfollows as $userfollow) {
            array_push($userfollows, $userfollow->user_id);
        }
        
        if (in_array($id, $userfollow)) {
            return true;
        } else {
            return false ;
        }
    }
    
    public function follow_each(){
        $userIds = $this->followings()->pluck('users.id')->toArray();
        $follow_each = $this->followers()->whereIn('users.id', $userIds)->pluck('users.id')->toArray();
        return $follow_each;
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
        'discord_url',
        'discord_deadline',
        'image_name',
    
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

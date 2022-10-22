<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'user_id',
        'game_id',
        'body',
        'image_name',
        'video_name'
    ];
    public function game()
    {
        return $this->belongsTo('App\Game');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }
    
    public function postComments()
    {
        return $this->hasMany('App\PostComment');
    }
    
    public function postLikes()
    {
        return $this->hasMany('App\PostLike');
    }
    
    public function is_liked_by_auth_user()
    {
        $id = Auth::id();
    
        $postlikers = array();
        foreach($this->postlikes as $postlike) {
            array_push($postlikers, $postlike->user_id);
        }
    
        if (in_array($id, $postlikers)) {
            return true;
        } else {
            return false;
        }
    }
    
}

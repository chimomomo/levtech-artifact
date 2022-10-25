<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bug extends Model
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
    
    public function bugComments()
    {
        return $this->hasMany('App\BugComment');
    }
    
    public function bugLikes()
    {
        return $this->hasMany('App\BugLike');
    }
    
    public function is_bug_liked_by_auth_user()
    {
        $id = Auth::id();
    
        $buglikers = array();
        foreach($this->buglikes as $buglike) {
            array_push($buglikers, $buglike->user_id);
        }
    
        if (in_array($id, $buglikers)) {
            return true;
        } else {
            return false;
        }
    }
    
}

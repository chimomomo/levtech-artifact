<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Amendment extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'user_id',
        'game_id',
        'body',
        'image_name'
    ];
    public function game()
    {
        return $this->belongsTo('App\Game');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }
    
    public function amendmentComments()
    {
        return $this->hasMany('App\AmendmentComment');
    }
    
    public function amendmentLikes()
    {
        return $this->hasMany('App\AmendmentLike');
    }
    
    public function is_amendment_liked_by_auth_user()
    {
        $id = Auth::id();
    
        $amendmentlikers = array();
        foreach($this->amendmentlikes as $amendmentlike) {
            array_push($amendmentlikers, $amendmentlike->user_id);
        }
    
        if (in_array($id, $amendmentlikers)) {
            return true;
        } else {
            return false;
        }
    }
}

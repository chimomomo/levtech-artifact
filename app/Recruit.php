<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recruit extends Model
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
    
    public function recruitComments()
    {
        return $this->hasMany('App\RecruitComment');
    }
}

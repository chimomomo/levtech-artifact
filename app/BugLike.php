<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BugLike extends Model
{
    protected $fillable = [
        'bug_id',
        'user_id'
    ];

    public function post()
    {
        return $this->belongsTo('App/Post');
    }

    public function user()
    {
        return $this->belongsTo('App/User');
    }
}

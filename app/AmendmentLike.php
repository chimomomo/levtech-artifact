<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmendmentLike extends Model
{
    protected $fillable = [
        'amendment_id',
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

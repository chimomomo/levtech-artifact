<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function getGame(int $limit_count = 5)
    {
        return $this::with('company', 'genre')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function getByReviewGame(int $limit_count = 5)
    {
         return $this->reviews()->with('game')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }
    public function machines()
    {
        return $this->belongsToMany('App\Machine');
    }
    
    public function reviews()   
    {
        return $this->hasMany('App\Review');  
    }
}

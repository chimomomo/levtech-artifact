<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function getByReviewGame(int $limit_count = 5)
    {
         return $this->reviews()->with('game')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function getByPostGame(int $limit_count = 5)
    {
         return $this->posts()->with('game')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function getByRecruitGame(int $limit_count = 5)
    {
         return $this->recruits()->with('game')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function getByBugGame(int $limit_count = 5)
    {
         return $this->bugs()->with('game')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function getByAmendmentGame(int $limit_count = 5)
    {
         return $this->amendments()->with('game')->orderBy('updated_at', 'DESC')->paginate($limit_count);
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
}

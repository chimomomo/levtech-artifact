<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'user_id',
        'game_id',
        'machine_id',
        'stars',
        'body',
    ];
    public function game()
    {
        return $this->belongsTo('App\Game');
    }
    
    public function Machine()
    {
        return $this->belongsTo('App\Machine');
    }
    
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    
    public function getReview(int $limit_count = 5)
    {
        return $this::with('game', 'machine')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}

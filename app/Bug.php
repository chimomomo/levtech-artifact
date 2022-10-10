<?php

namespace App;

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
    ];
    public function game()
    {
        return $this->belongsTo('App\Game');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }
    
    public function getBug(int $limit_count = 5)
    {
        return $this::with('game')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}

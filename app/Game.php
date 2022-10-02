<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function getGame(int $limit_count = 5)
    {
        return $this::with('company', 'genre', 'machine')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
    public function genre()
    {
        return $this->belongsTo('App\Genre');
    }
    public function machine()
    {
        return $this->belongsTo('App\Machine');
    }
}

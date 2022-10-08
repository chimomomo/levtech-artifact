<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function games()   
    {
        return $this->hasMany('App\Game');  
    }
    
    public function getByGenre(int $limit_count = 5)
    {
         return $this->games()->with('genre')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}

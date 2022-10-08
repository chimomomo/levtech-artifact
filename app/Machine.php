<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    public function games()   
    {
        return $this->belongsToMany('App\Game');  
    }
    
    public function getByMachine(int $limit_count = 5)
    {
         return $this->games()->with('machine')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}

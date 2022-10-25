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
        //$machinename = $this->name;
        return $this->games()->with('machines')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}

//with('machine')

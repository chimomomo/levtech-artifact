<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function games()   
    {
        return $this->hasMany('App\Game');  
    }
    
    public function getByCompany(int $limit_count = 5)
    {
         return $this->games()->with('company')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}

<?php

namespace App;

use App\Chat;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public function index()
    {
        return view('chats/index');  
    }
}

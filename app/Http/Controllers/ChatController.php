<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
     public function index()
    {
        return view('chats/index');  
    }
}

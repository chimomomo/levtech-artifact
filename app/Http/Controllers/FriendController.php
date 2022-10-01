<?php

namespace App\Http\Controllers;

use app\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function index()
    {
        return view('friends/index');  
    }
    
    public function edit()
    {
        return view('friends/edit');  
    }
}

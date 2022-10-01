<?php

namespace App\Http\Controllers;

use App\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users/mypage');  
    }
    
    public function edit()
    {
        return view('users/edit');  
    }
}

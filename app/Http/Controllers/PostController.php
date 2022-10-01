<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts/index');  
    }
    
    public function show()
    {
        return view('posts/show');  
    }
    
    public function create()
    {
        return view('posts/create');  
    }
    
    public function edit()
    {
        return view('posts/edit');  
    }
}

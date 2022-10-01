<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return view('reviews/index');  
    }
    
    public function show()
    {
        return view('reviews/show');  
    }
    
    public function create()
    {
        return view('reviews/create');  
    }
    
    public function edit()
    {
        return view('reviews/edit');  
    }
}

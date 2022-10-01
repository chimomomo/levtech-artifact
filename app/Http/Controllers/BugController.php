<?php

namespace App\Http\Controllers;

use App\Bug;
use Illuminate\Http\Request;

class BugController extends Controller
{
    public function index()
    {
        return view('bugs/index');  
    }
    
    public function show()
    {
        return view('bugs/show');  
    }
    
    public function create()
    {
        return view('bugs/create');  
    }
    
    public function edit()
    {
        return view('bugs/edit');  
    }
}

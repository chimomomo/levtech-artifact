<?php

namespace App\Http\Controllers;

use App\Amendment;
use Illuminate\Http\Request;

class AmendmentController extends Controller
{
    public function index()
    {
        return view('amendments/index');  
    }
    
    public function show()
    {
        return view('amendments/show');  
    }
    
    public function create()
    {
        return view('amendments/create');  
    }
    
    public function edit()
    {
        return view('amendments/edit');  
    }
}

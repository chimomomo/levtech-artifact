<?php

namespace App\Http\Controllers;

use App\Recruit;
use Illuminate\Http\Request;

class RecruitController extends Controller
{
    public function index()
    {
        return view('recruits/index');  
    }
    
    public function show()
    {
        return view('recruits/show');  
    }
    
    public function create()
    {
        return view('recruits/create');  
    }
    
    public function edit()
    {
        return view('recruits/edit');  
    }
}

<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        return view('groups/index');  
    }
    
    public function show()
    {
        return view('groups/show');  
    }
    
    public function create()
    {
        return view('groups/create');  
    }
    
    public function edit()
    {
        return view('groups/edit');  
    }
}

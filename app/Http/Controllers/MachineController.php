<?php

namespace App\Http\Controllers;

use App\Machine;
use Illuminate\Http\Request;

class MachineController extends Controller
{
     public function listup()
    {
        return view('machines/list');  
    }
    
    public function index()
    {
        return view('machines/index');
    }
}

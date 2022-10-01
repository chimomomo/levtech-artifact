<?php

namespace App\Http\Controllers;

use App\Model;
use Illuminate\Http\Request;

class ModelController extends Controller
{
     public function listup()
    {
        return view('models/list');  
    }
    
    public function index()
    {
        return view('models/index');
    }
}

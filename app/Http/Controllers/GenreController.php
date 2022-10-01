<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function listup()
    {
        return view('genres/list');  
    }
    
    public function index()
    {
        return view('genres/index');  
    }
}

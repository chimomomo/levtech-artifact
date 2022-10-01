<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return view('games/index');  
    }
    
    public function show()
    {
        return view('games/show');  
    }
}

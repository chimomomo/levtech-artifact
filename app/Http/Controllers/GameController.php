<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Game $Game)
    {
        return view('games/index')->with(['games' => $Game->getGame()]);
    }
    
    public function show(Game $Game)
    {
        return view('games/show')->with(['game' => $Game]);
    }
}

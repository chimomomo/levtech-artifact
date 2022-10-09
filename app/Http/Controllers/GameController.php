<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Game $game)
    {
        return view('games/index')->with(['games' => $game->getGame()]);
    }
    
    public function show(Game $game)
    {
        return view('games/show')->with(['game' => $game]);
    }
    
    public function reviewIndex(Game $game)
    {
        return view('games/review_index')->with(['reviews' => $game->getByReviewGame()]);
    }
}

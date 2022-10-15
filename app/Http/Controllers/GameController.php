<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Game::query();

        if(!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('comment', 'LIKE', "%{$keyword}%");
        }

        $game = $query->with('company', 'genre')->orderBy('updated_at', 'DESC')->paginate(5);
        return view('games/index')->with(['games' => $game, 'keyword' => $keyword]);
    }
    
    public function show(Game $game)
    {
        return view('games/show')->with(['game' => $game]);
    }
    
    public function reviewIndex(Game $game)
    {
        return view('games/review_index')->with(['reviews' => $game->getByReviewGame()]);
    }
    
    public function postIndex(Game $game)
    {
        return view('games/post_index')->with(['posts' => $game->getByPostGame()]);
    }
    
    public function recruitIndex(Game $game)
    {
        return view('games/recruit_index')->with(['recruits' => $game->getByRecruitGame()]);
    }
    
    public function bugIndex(Game $game)
    {
        return view('games/bug_index')->with(['bugs' => $game->getByBugGame()]);
    }
    
    public function amendmentIndex(Game $game)
    {
        return view('games/amendment_index')->with(['amendments' => $game->getByAmendmentGame()]);
    }
}

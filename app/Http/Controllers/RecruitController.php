<?php

namespace App\Http\Controllers;

use App\Recruit;
use App\Game;
use App\User;
use Illuminate\Http\Request;
//use Illuminate\Http\Requests\RecruitRequest;

class RecruitController extends Controller
{
    public function index(Recruit $recruit)
    {
        return view('recruits/index')->with(['recruits' => $recruit->getRecruit()]);  
    }
    
    public function show(Recruit $recruit)
    {
        return view('recruits/show')->with(['recruit' => $recruit]);  
    }
    
    public function create(Game $game)
    {
        return view('/recruits/create')->with(['games' => $game->get()]);
    }
    
    public function store(Request $request, Recruit $recruit)
    {
        $input = $request['recruit'];
        $recruit->fill($input)->save();
        return redirect('/recruits/' . $recruit->id);
    }
    
    public function edit(Recruit $recruit, Game $game)
    {
        return view('recruits/edit')->with(['recruit' => $recruit, 'games' => $game->get()]);
    }
    
    public function update(Request $request, Recruit $recruit)
    {
        $input_recruit = $request['recruit'];
        $recruit->fill($input_recruit)->save();
        return redirect('/recruits/' . $recruit->id);
    }
    
    public function delete(Recruit $recruit)
    {
        $recruit->delete();
        return redirect('/');
    }  
}

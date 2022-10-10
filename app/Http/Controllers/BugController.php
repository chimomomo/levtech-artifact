<?php

namespace App\Http\Controllers;

use App\Bug;
use App\Game;
use App\User;
use Illuminate\Http\Request;
//use Illuminate\Http\Requests\BugRequest;

class BugController extends Controller
{
    public function index(Bug $bug)
    {
        return view('bugs/index')->with(['bugs' => $bug->getBug()]);  
    }
    
    public function show(Bug $bug)
    {
        return view('bugs/show')->with(['bug' => $bug]);  
    }
    
    public function create(Game $game)
    {
        return view('/bugs/create')->with(['games' => $game->get()]);
    }
    
    public function store(Request $request, Bug $bug)
    {
        $input = $request['bug'];
        $bug->fill($input)->save();
        return redirect('/bugs/' . $bug->id);
    }
    
    public function edit(Bug $bug, Game $game)
    {
        return view('bugs/edit')->with(['bug' => $bug, 'games' => $game->get()]);
    }
    
    public function update(Request $request, Bug $bug)
    {
        $input_bug = $request['bug'];
        $bug->fill($input_bug)->save();
        return redirect('/bugs/' . $bug->id);
    }
    
    public function delete(Bug $bug)
    {
        $bug->delete();
        return redirect('/');
    }  
}

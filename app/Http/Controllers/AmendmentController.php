<?php

namespace App\Http\Controllers;

use App\Amendment;
use App\Game;
use App\User;
use Illuminate\Http\Request;
//use Illuminate\Http\Requests\AmendmentRequest;

class AmendmentController extends Controller
{
    public function index(Amendment $amendment)
    {
        return view('amendments/index')->with(['amendments' => $amendment->getAmendment()]);  
    }
    
    public function show(Amendment $amendment)
    {
        return view('amendments/show')->with(['amendment' => $amendment]);  
    }
    
    public function create(Game $game)
    {
        return view('/amendments/create')->with(['games' => $game->get()]);
    }
    
    public function store(Request $request, Amendment $amendment)
    {
        $input = $request['amendment'];
        $amendment->fill($input)->save();
        return redirect('/amendments/' . $amendment->id);
    }
    
    public function edit(Amendment $amendment, Game $game)
    {
        return view('amendments/edit')->with(['amendment' => $amendment, 'games' => $game->get()]);
    }
    
    public function update(Request $request, Amendment $amendment)
    {
        $input_amendment = $request['amendment'];
        $amendment->fill($input_amendment)->save();
        return redirect('/amendments/' . $amendment->id);
    }
    
    public function delete(Amendment $amendment)
    {
        $amendment->delete();
        return redirect('/');
    }  
}

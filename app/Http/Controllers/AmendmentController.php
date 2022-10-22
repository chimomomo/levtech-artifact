<?php

namespace App\Http\Controllers;

use App\Amendment;
use App\Game;
use App\User;
use Illuminate\Http\Request;
//use Illuminate\Http\Requests\AmendmentRequest;

class AmendmentController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Amendment::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('body', 'LIKE', "%{$keyword}%");
        }

        $amendment = $query->with('game', 'user')->orderBy('updated_at', 'DESC')->paginate(5);
        return view('amendments/index')->with(['amnedments' => $amendment, 'keyword' => $keyword]);
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
        
        if($request->has('image')){
            $dir = 'amendments';
            $file_image_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $file_image_name);
            $amendment->image_name = 'storage/' . $dir . '/' . $file_image_name;
            $amendment->save();
        }
        
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
        
        if($request->has('image')){
            $dir = 'amendments';
            $file_image_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $file_image_name);
            $amendment->image_name = 'storage/' . $dir . '/' . $file_image_name;
            $amendment->save();
        }else{
            $amendment->image_name = NULL;
            $amendment->save();
        }
        
        return redirect('/amendments/' . $amendment->id);
    }
    
    public function delete(Amendment $amendment)
    {
        $amendment->delete();
        return redirect('/');
    }  
}

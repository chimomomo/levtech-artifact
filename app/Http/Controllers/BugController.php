<?php

namespace App\Http\Controllers;

use App\Bug;
use App\Game;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\BugRequest;

class BugController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Bug::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('body', 'LIKE', "%{$keyword}%");
        }

        $bug = $query->with('game', 'user')->orderBy('updated_at', 'DESC')->paginate(5);
        return view('bugs/index')->with(['bugs' => $bug, 'keyword' => $keyword]);
    }
    
    public function show(Bug $bug)
    {
        return view('bugs/show')->with(['bug' => $bug]);  
    }
    
    public function create(Game $game)
    {
        return view('/bugs/create')->with(['games' => $game->get()]);
    }
    
    public function store(BugRequest $request, Bug $bug)
    {
        $input = $request['bug'];
        $bug->fill($input)->save();
        
        if($request->has('image')){
            $dir = 'bugs';
            $file_image_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $file_image_name);
            $bug->image_name = 'storage/' . $dir . '/' . $file_image_name;
            $bug->save();
        }
        
        if($request->has('video')){
            $dir = 'bugs';
            $file_video_name = $request->file('video')->getClientOriginalName();
            $request->file('video')->storeAs('public/' . $dir, $file_video_name);
            $bug->video_name = 'storage/' . $dir . '/' . $file_video_name;
            $bug->save();
        }
        
        return redirect('/bugs/' . $bug->id);
    }
    
    public function edit(Bug $bug, Game $game)
    {
        return view('bugs/edit')->with(['bug' => $bug, 'games' => $game->get()]);
    }
    
    public function update(BugRequest $request, Bug $bug)
    {
        $input_bug = $request['bug'];
        $bug->fill($input_bug)->save();
        
        if($request->has('image')){
            $dir = 'bugs';
            $file_image_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $file_image_name);
            $bug->image_name = 'storage/' . $dir . '/' . $file_image_name;
            $bug->save();
        }else{
            $bug->image_name = NULL;
            $bug->save();
        }
        
        if($request->has('video')){
            $dir = 'bugs';
            $file_video_name = $request->file('video')->getClientOriginalName();
            $request->file('video')->storeAs('public/' . $dir, $file_video_name);
            $bug->video_name = 'storage/' . $dir . '/' . $file_video_name;
            $bug->save();
        }else{
            $bug->video_name = NULL;
            $bug->save();
        }
        
        return redirect('/bugs/' . $bug->id);
    }
    
    public function delete(Bug $bug)
    {
        $bug->delete();
        return redirect('/');
    }  
}

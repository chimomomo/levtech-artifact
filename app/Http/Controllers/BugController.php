<?php

namespace App\Http\Controllers;

use App\Bug;
use App\Game;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\BugRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

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
            $file = $request->file('image');
            $upload = Cloudinary::upload ( $file->getRealPath(), [
                "height" => 100,
                "width" => 100,
            ]);
            $bug->image_name = $update->getSecurePath();
            $bug->image_id = $update->getPublicId();
            $bug->save();
        }
        
        if($request->has('video')){
            $file = $request->file('video');
            $upload = Cloudinary::upload ( $file->getRealPath(), [
                "height" => 100,
                "width" => 100,
            ]);
            $bug->video_name = $update->getSecurePath();
            $bug->video_id = $update->getPublicId();
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
            $file = $request->file('image');
            $upload = Cloudinary::upload ( $file->getRealPath(), [
                "height" => 100,
                "width" => 100,
            ]);
            $bug->image_name = $update->getSecurePath();
            $bug->image_id = $update->getPublicId();
            $bug->save();
        }else{
            $bug->image_name = NULL;
            $bug->image_id = NULL;
            $bug->save();
        }
        
        if($request->has('video')){
            $file = $request->file('video');
            $upload = Cloudinary::upload ( $file->getRealPath(), [
                "height" => 100,
                "width" => 100,
            ]);
            $bug->video_name = $update->getSecurePath();
            $bug->video_id = $update->getPublicId();
            $bug->save();
        }else{
            $bug->video_name = NULL;
            $bug->video_id = NULL;
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

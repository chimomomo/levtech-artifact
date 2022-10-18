<?php

namespace App\Http\Controllers;

use App\Post;
use App\Game;
use App\User;
use Illuminate\Http\Request;
//use Illuminate\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts/index')->with(['posts' => $post->getPost()]);  
    }
    
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);  
    }
    
    public function create(Game $game)
    {
        return view('/posts/create')->with(['games' => $game->get()]);
    }
    
    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        
        if($request->has('image')){
            $dir = 'posts';
            $file_image_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $file_image_name);
            $post->image_name = 'storage/' . $dir . '/' . $file_image_name;
            $post->save();
        }
        
        if($request->has('video')){
            $dir = 'posts';
            $file_video_name = $request->file('video')->getClientOriginalName();
            $request->file('video')->storeAs('public/' . $dir, $file_video_name);
            $post->video_name = 'storage/' . $dir . '/' . $file_video_name;
            $post->save();
        }
        
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post, Game $game)
    {
        return view('posts/edit')->with(['post' => $post, 'games' => $game->get()]);
    }
    
    public function update(Request $request, Post $post)
    {
        if($request->has('image')){
            $dir = 'posts';
            $file_image_name = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/' . $dir, $file_image_name);
            $post->image_name = 'storage/' . $dir . '/' . $file_image_name;
            $post->save();
        }
        
        if($request->has('video')){
            $dir = 'posts';
            $file_video_name = $request->file('video')->getClientOriginalName();
            $request->file('video')->storeAs('public/' . $dir, $file_video_name);
            $post->video_name = 'storage/' . $dir . '/' . $file_video_name;
            $post->save();
        }else{
            $post->video_name = NULL;
            $post->save();
        }
        
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }

}

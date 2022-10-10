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
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post, Game $game)
    {
        return view('posts/edit')->with(['post' => $post, 'games' => $game->get()]);
    }
    
    public function update(Request $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }  
}

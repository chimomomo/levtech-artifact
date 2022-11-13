<?php

namespace App\Http\Controllers;

use App\Post;
use App\Game;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $query = Post::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('body', 'LIKE', "%{$keyword}%");
        }

        $post = $query->with('game', 'user')->orderBy('updated_at', 'DESC')->paginate(5);
        return view('posts/index')->with(['posts' => $post, 'keyword' => $keyword]);  
    }
    
    public function show(Post $post)
    {
        return view('posts/show')->with(['post' => $post]);  
    }
    
    public function create(Game $game)
    {
        return view('/posts/create')->with(['games' => $game->get()]);
    }
    
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        
        if($request->has('image')){
            $file = $request->file('image');
            $upload = Cloudinary::upload ( $file->getRealPath(), [
                "height" => 100,
                "width" => 100,
            ]);
            $post->image_name = $update->getSecurePath();
            $post->image_id = $update->getPublicId();
            $post->save();
        }
        
        if($request->has('video')){
            $file = $request->file('video');
            $upload = Cloudinary::upload ( $file->getRealPath(), [
                "height" => 100,
                "width" => 100,
            ]);
            $post->image_name = $update->getSecurePath();
            $post->image_id = $update->getPublicId();
            $post->save();
        }
        
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post, Game $game)
    {
        return view('posts/edit')->with(['post' => $post, 'games' => $game->get()]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        if($request->has('image')){
            $file = $request->file('image');
            $upload = Cloudinary::upload ( $file->getRealPath(), [
                "height" => 100,
                "width" => 100,
            ]);
            $post->image_name = $update->getSecurePath();
            $post->image_id = $update->getPublicId();
            $post->save();
        }else{
            $post->image_name = NULL;
            $post->image_id = NULL;
            $post->save();
        }
        
        if($request->has('video')){
            $file = $request->file('video');
            $upload = Cloudinary::upload ( $file->getRealPath(), [
                "height" => 100,
                "width" => 100,
            ]);
            $post->image_name = $update->getSecurePath();
            $post->image_id = $update->getPublicId();
            $post->save();
        }else{
            $post->video_name = NULL;
            $post->video_id = NULL;
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

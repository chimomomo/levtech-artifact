<?php

namespace App\Http\Controllers;

use App\PostLike;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
    
    public function like($id)
    {
        PostLike::create([
            'post_id' => $id,
            'user_id' => Auth::id(),
        ]);
    
        session()->flash('success', 'You Liked the Reply.');
    
        return redirect()->back();
    }
    
    public function unlike($id)
    {
        $Postlike = PostLike::where('post_id', $id)->where('user_id', Auth::id())->first();
        $Postlike->delete();
    
        session()->flash('success', 'You Unliked the Reply.');
    
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\BugLike;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BugLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
    
    public function like($id)
    {
        BugLike::create([
            'bug_id' => $id,
            'user_id' => Auth::id(),
        ]);
    
        session()->flash('success', 'You Liked the Reply.');
    
        return redirect()->back();
    }
    
    public function unlike($id)
    {
        $Buglike = BugLike::where('bug_id', $id)->where('user_id', Auth::id())->first();
        $Buglike->delete();
    
        session()->flash('success', 'You Unliked the Reply.');
    
        return redirect()->back();
    }
}

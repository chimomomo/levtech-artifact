<?php

namespace App\Http\Controllers;

use App\AmendmentLike;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AmendmentLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
    
    public function like($id)
    {
        AmendmentLike::create([
            'amendment_id' => $id,
            'user_id' => Auth::id(),
        ]);
    
        session()->flash('success', 'You Liked the Reply.');
    
        return redirect()->back();
    }
    
    public function unlike($id)
    {
        $Amendmentlike = AmendmentLike::where('amendment_id', $id)->where('user_id', Auth::id())->first();
        $Amendmentlike->delete();
    
        session()->flash('success', 'You Unliked the Reply.');
    
        return redirect()->back();
    }
}

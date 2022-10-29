<?php

namespace App\Http\Controllers;

use App\FollowUser;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FollowUserController extends Controller
{
    public function follow($id)
    {
        FollowUser::firstOrCreate([
            'user_id' =>  Auth::id(),
            'follow_id' => $id,
        ]);
        return redirect()->back();
    }
    
    public function unfollow($id)
    {
        $FollowUser = FollowUser::where('follow_id', $id)->where('user_id', Auth::id())->first();
        $FollowUser->delete();
        
        return redirect()->back();
    }
}

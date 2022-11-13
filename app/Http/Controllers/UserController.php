<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('users/mypage')->with(['user' => $user, 'following_users_list' => auth()->user()->follows, 'follower_users_list' => auth()->user()->followers]);
    }
    
    public function edit(User $user)
    {
        return view('users/edit')->with(['user' => $user]);
    }
    
    public function update(UserRequest $request, User $user)
    {
        if($request->has('image')){
            $file = $request->file('image');
            $upload = Cloudinary::upload ( $file->getRealPath(), [
                "height" => 100,
                "width" => 100,
            ]);
            $user->image_name = $update->getSecurePath();
            $user->image_id = $update->getPublicId();
            $user->save();
        }else{
            $user->image_name = '/images/noimage.jpg';
            $user->image_id = NULL;
            $user->save();
        }
        $input_user = $request['user'];
        $user->fill($input_user)->save();
        
        if($request->has('url')){
            $url = $request->input('url');
            $user->discord_url = $url;
            $user->save();
        } else {
            $user->discord_url = NULL;
            $user->save();
        }
        
        return redirect('/mypage/' . $user->id);
    }
    
    public function followingIndex(User $user)
    {
        return view('users/following_index')->with(['user' => $user, 'following_users_list' => $user->follows]);
    }
    
    public function followerIndex(User $user)
    {
        return view('users/follower_index')->with(['user' => $user, 'follower_users_list' => $user->followers]);
    }
    
    public function reviewIndex(User $user)
    {
        return view('users/review_index')->with(['reviews' => $user->getByReviewUser()]);
    }
    
    public function postIndex(User $user)
    {
        return view('users/post_index')->with(['posts' => $user->getByPostUser()]);
    }
    
    public function recruitIndex(User $user)
    {
        return view('users/recruit_index')->with(['recruits' => $user->getByRecruitUser()]);
    }
    
    public function bugIndex(User $user)
    {
        return view('users/bug_index')->with(['bugs' => $user->getByBugUser()]);
    }
    
    public function amendmentIndex(User $user)
    {
        return view('users/amendment_index')->with(['amendments' => $user->getByAmendmentUser()]);
    }
    
    public function discordURL(User $user)
    {
        return redirect()->away($user->discord_url);
    }
    
    public function unfollow(User $user)
    {
        auth()->user()->follows()->detach($user);
        return redirect('/mypage/' . $user->id);
    }
    
    public function follow(User $user)
    {
        auth()->user()->follows()->attach($user);
        return redirect('/mypage/' . $user->id);
    }

    //'https://www.google.com'
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
//use Illuminate\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('users/mypage')->with(['user' => $user]);
    }
    
    public function edit(User $user)
    {
        return view('users/edit')->with(['user' => $user]);
    }
    
    public function update(Request $request, User $user)
    {
        $dir = 'users';
        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/' . $dir, $file_name);
        $user->image_name = 'storage/' . $dir . '/' . $file_name;
        $user->save();
        
        $input_user = $request['user'];
        $user->fill($input_user)->save();
        return redirect('/mypage/' . $user->id);
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
}

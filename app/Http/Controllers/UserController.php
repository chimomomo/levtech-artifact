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
        $input_user = $request['user'];
        $user->fill($input_user)->save();
        return redirect('/mypage/' . $user->id);
    }
}

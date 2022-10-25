<?php

namespace App\Http\Controllers;

use App\RecruitComment;
use Illuminate\Http\Request;
use App\Http\Requests\RecruitCommentRequest;

class RecruitCommentController extends Controller
{
    public function store(RecruitCommentRequest $request)
   {
       $recruit_comment = new RecruitComment();
       $recruit_comment->comment = $request->recruitcomment;
       $recruit_comment->recruit_id = $request->recruit_id;
       $recruit_comment->user_id = $request->user_id;
       $recruit_comment->save();

       return redirect('/recruits/' . $recruit_comment->recruit_id);
   }

    public function delete(RecruitComment $recruitcomment)
    {
        $recruitcomment->delete();
        return redirect('/recruits/' . $recruitcomment->recruit_id);
    }  
}

<?php

namespace App\Http\Controllers;

use App\BugComment;
use Illuminate\Http\Request;
use App\Http\Requests\BugCommentRequest;

class BugCommentController extends Controller
{
    public function store(BugCommentRequest $request)
   {
       $bug_comment = new BugComment();
       $bug_comment->comment = $request->bugcomment;
       $bug_comment->bug_id = $request->bug_id;
       $bug_comment->user_id = $request->user_id;
       $bug_comment->save();

       return redirect('/bugs/' . $bug_comment->bug_id);
   }

    public function delete(BugComment $bugcomment)
    {
        $bugcomment->delete();
        return redirect('/bugs/' . $bugcomment->bug_id);
    }  
}

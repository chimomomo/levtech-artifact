<?php

namespace App\Http\Controllers;

use App\AmendmentComment;
use Illuminate\Http\Request;
use App\Http\Requests\AmendmentCommentRequest;

class AmendmentCommentController extends Controller
{
    public function store(AmendmentCommentRequest $request)
   {
       $amendment_comment = new AmendmentComment();
       $amendment_comment->comment = $request->amendmentcomment;
       $amendment_comment->amendment_id = $request->amendment_id;
       $amendment_comment->user_id = $request->user_id;
       $amendment_comment->save();

       return redirect('/amendments/' . $amendment_comment->amendment_id);
   }

    public function delete(AmendmentComment $amendmentcomment)
    {
        $amendmentcomment->delete();
        return redirect('/amendments/' . $amendmentcomment->amendment_id);
    }  
}

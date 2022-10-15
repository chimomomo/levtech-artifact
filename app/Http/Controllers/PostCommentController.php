<?php

namespace App\Http\Controllers;

use App\PostComment;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{

   public function store(Request $request)
   {
       $post_comment = new PostComment();
       $post_comment->comment = $request->postcomment;
       $post_comment->post_id = $request->post_id;
       $post_comment->user_id = $request->user_id;
       $post_comment->save();

       return redirect('/posts/' . $post_comment->post_id);
   }

    public function delete(PostComment $postcomment)
    {
        $postcomment->delete();
        return redirect('/posts/' . $postcomment->post_id);
    }  
}

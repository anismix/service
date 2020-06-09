<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Validator;
use Illuminate\Support\Facades\Redirect;
class CommentController extends Controller
{
    //
    public function addComment(Request $request,$id){
  $post =Post::find($id);
        $data=$request->all();
        $validator = Validator::make($data,[
            'comment'=>'required',
           ]);
      if($validator->fails()) {
        return Redirect::back()->withErrors($validator);
       }

        $commentaire = new Comment;
        $commentaire->user_id= auth()->user()->id;
        $commentaire->body= $data['comment'];
        $commentaire->post_id=$id;

       $post->comments()->save($commentaire);
     return redirect('/blog');
    }
    }


<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\Service;
use App\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    //
    public function index(){
        $categorie=Category::with('categories')->where(['parent_id'=>0])->get();
        $user=User::get();
         $comment=Comment::get();
         $post=Post::get();
         $service= Service::get();
        return view('user.forum')->with(compact('categorie','post','user','service','comment'));

    }
    public function addPost(Request $request,$id){

        $data=$request->all();
        $validator = Validator::make($data,[
            'post'=>'required|min:10',
           ]);
      if($validator->fails()) {
        return Redirect::back()->withErrors($validator);
    }
        $categorie=Category::with('categories')->where(['parent_id'=>0])->get();
        $post = new Post;
        $post->post=$data['post'];
        $post->user_id=auth()->user()->id;
        $post->service_id=$id;
        $post->time=date("h:i ", time());
        $post->date=date("Y-m-d ", time());
        $post->save();
     return redirect('/blog');
    }
   }


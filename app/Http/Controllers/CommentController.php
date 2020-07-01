<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Service;
use App\Comment;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Notification;
use App\Notifications\commentReply;
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
       $service=Service::where('id',$post->service_id)->first();
       $user=auth()->user();
       $data= array(
        'id' => $post->id,
        'service'=>$service->name
    );
    $user=User::where('id',$post->user_id)->first();
    Notification::send($user,new commentReply($data));
     return redirect('/blog');

    }
    public function addCommentdetail(Request $request,$id){
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
       $service=Service::where('id',$post->service_id)->first();
       $name=$service->name;
       $postid=$post->id;
       $user=auth()->user();
       $data= array(
        'id' => $postid,
        'service'=>$name
    );
    $user=User::where('id',$post->user_id)->first();
    Notification::send($user,new commentReply($data));
     return redirect('/postdetail/'.$id);
    }
    public function deleteComment($id){
        if(!empty($id)){
           Comment::where(['id'=>$id])->delete();
            return  redirect()->back()->with('flash_message_success','Comment has deleted success');
    }
   }
   }


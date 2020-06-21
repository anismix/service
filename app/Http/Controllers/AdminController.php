<?php
namespace App\Http\Controllers;

use App\Category;
use App\Notification as AppNotification;
use App\Post;
use App\Service;
use App\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
use App\User;
use Validator;
use Illuminate\Support\Facades\Redirect;
use  Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    //
    public function login(Request $request){
        if($request->isMethod('post')){
            $data  = $request->input();
          if(Auth::attempt(['email' => $data['email'] , 'password' => $data['password'] ,'role' => 'admin']))
            {
            Session::put('sessionEmail',$data['email']);
            return redirect('/admin/dashbord');

            }
            else{
           return redirect('/admin')->with('flash_message_error','Invalid Email or Password');
            }
        }
        return view('admin.admin_login');
    }
    public function verify($info,Request $request){
        $notifications =auth()->user()->unreadNotifications()->find($info);
   //   dd($notifications);

        if($request->isMethod('post')){

               $data=$request->all();

               $validator = Validator::make($data,[
                'category'=>'required',
                'name'=>'required|min:3|max:25',
                'adress'=>'required|min:6|max:35',
                'openhour'=>'required',
                'closehour'=>'required',
                'description'=>'required|min:6',
                'phone'=>'required'
               ]);

               if($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }

           $service = new Service;
           $service->name=$data['name'];
           $service->adress=$data['adress'];
           $service->openhour=$data['openhour'];
           $service->closehour=$data['closehour'];
           $service->phone=$data['phone'];
           $service->image=$notifications->data['image'];
           $service->description=$data['description'];
           $service->category_id=$notifications->data['category_id'];
           $service->user_id=$notifications->data['user'];
           $service->save();

           return redirect('/admin/view-service')->with('flash_message_succ','Service add Successfully');

        }


     $categorie =Category::where('id',$notifications->data['user'])->first();
        return view('admin.verify')->with(compact('notifications','categorie'));

    }


    public function dashbord(){
      //  if(Session::has('sessionEmail')){

        //}
      //  else {
       //     return redirect('/admin')->with('flash_message_error','Please Log in to access');
       // }
       $categorie=Category::count();
       $user=User::where('role','<>','admin')->count();
       $services=Service::count();
       $post=Post::count();
     $poste= Post::orderBy('id', 'desc')->take(3)->get();
      return view('admin.dashbord')->with(compact('categorie','user','services','post'));
    }

    public function logout(){
        Session()->flush();
        return redirect('/admin')->with('flash_message_succ','Log out Successfully');
    }
    public function setting(){
   return view('admin.setting');
    }
    public function checkpwd(Request $request){
        $data = $request->all();
        $current_pwd =$data['current_pwd'];
        $chek_password = User::where(['role'=>'admin'])->first();
        if(Hash::check($current_pwd,$chek_password)){
            echo "true";die;
        }
        else {
            echo "false";die;
        }
    }
    public function updatePwd(Request $request){

           if($request->isMethod('post')){
            $data =$request->all();
           $check_pwd=User::where(['email'=>Auth::user()->email])->first();
           $current_pwd=$data['new_pwd'];
           if(Hash::check($current_pwd, $check_pwd->password)){
               $password = bcrypt($data['new_pwd']);
               User::where('id',$check_pwd->id)->update(['password'=>$password]);
               return redirect('/admin/setting')->with('flash_message_succ','Password Update Successfully');
           }
           else{
           return redirect('/admin/setting')->with('flash_message_error','Incorrect Password');
           }
       }
      // echo '<pre>'; dd($data);die;
    }
}

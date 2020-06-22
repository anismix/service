<?php
namespace App\Http\Controllers;

use App\Category;

use App\Post;
use App\Service;

use App\Notifications\ComplaintService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Notification;
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
     // dd($notifications);

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
           $notifications->markAsRead();
           return redirect('/admin/view-service')->with('flash_message_succ','Service add Successfully');

        }


     $categorie =Category::where('id',$notifications->data['user'])->first();
        return view('admin.verify')->with(compact('notifications','categorie'));

    }
 public function complaint($id,$service,Request $request){

    if($request->isMethod('post')){
          $data=$request->all();
          $validator = Validator::make($data,[
           'complaint'=>'required|min:5'
           ]);

            // dd($data);
           if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        $info=array(
             'complaint'=>$data['complaint'],
             'service'=>$service
             );
        $user=User::where('id',$id)->first();
        Notification::send($user,new ComplaintService($info));
        return Redirect::back()->with('flash_message_succ','Complaint send');
      }
     return view('admin.complaint')->with(compact('id','service'));
 }

    public function dashbord(){
      //  if(Session::has('sessionEmail')){

        //}
      //  else {
       //     return redirect('/admin')->with('flash_message_error','Please Log in to access');
       // }
       $categorie=Category::count();
       $user=User::count();
       $services=Service::count();
       $post=Post::count();
     $poste= Post::orderBy('id', 'desc')->take(3)->get();
     $usere=User::get();
      return view('admin.dashbord')->with(compact('categorie','user','services','post','usere','poste'));
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
           $current_pwd=$data['current_pwd'];
           $new_pwd=$data['new_pwd'];
           $con_pwd=$data['confirm_pwd'];
     //      dd(Hash::check($current_pwd, $check_pwd->password));
           if(Hash::check($current_pwd, $check_pwd->password)){
            if($new_pwd!=$con_pwd){
                return redirect('/admin/setting')->with('flash_message_error',"New Password And Confirm Password don't match  ");
            }
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

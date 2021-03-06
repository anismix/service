<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Socialite;
class UserController extends Controller
{
    //*
    public function user(){
         $user=User::get();

       return view('admin.user.user')->with(compact('user'));
    }
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();


    }


    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request)
    {
        $user = Socialite::driver('facebook')->user();
        dd($user);
        $user=User::firstOrCreate([
            'name'=>$user->getName(),
            'email'=>$user->hetEmail(),
            'provider_id'=>$user->getId
        ]);
        Auth::login($user,true);
        $request->session()->put('frontsession',$user->getEmail());
        return redirect('/');
        // $user->token;
    }
    public function  userLoginRegister(){
          return view('user.register_login');
    }
    public function register(Request $request){
        if($request->isMethod('post')){
            $data =$request->all();
            $usercount =User::where(['email'=>$data['email']])->count();
            $validator = Validator::make($data,[
                'name'=>'required|min:3',
                'email'=>'email|required|unique:users,email',
                'myPassword'=>'required|min:6'
               ]);
               if($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $user = new User;
            $user->name=$data['name'];
            $user->email=$data['email'];

            $user->password= bcrypt($data['myPassword']);
            $user->save();
            $email=$data['email'];
            $email1=base64_encode($data['email']);
            $message=[
                'email'=>$data['email'],
                 'name'=>$data['name'],
                 'code'=>$email1
            ];
            Mail::send('emails.ConfirmEmail', $message, function ($message)use($email) {
                $message->to($email)->subject('Email Confirmation - E-Service');

            });

            return redirect()->back()->with('flash_message_succ','Confirm Email To login');

               if(Auth::attempt([ 'email' => $data['email'], 'password' => $data['myPassword']])){
                $request->session()->put('frontsession',$data['email']);
               return redirect('/');
                  }


            }


        }


    public function checkEmail(Request $request){
        $data =$request->all();
            $usercount =User::where(['email'=>$data['email']])->count();
            if($usercount>0){
                echo "false";

            }
            else {
                echo "true";



    }
}
public function confirm($email){
   $email =base64_decode($email);
 //  dd($email);
   $user=User::where('email',$email)->count();

   if($user>0){

          $userdet= User::where('email',$email)->first();
          if($userdet->email_verified_at!=null){
              return redirect('login-register')->with('flash_message_error','Your account already activated');
          }
          else{
              User::where('email',$email)->update(['email_verified_at'=> date('Y-m-d H:i:s',time())]);
              $message=[
                'email'=>$email,
                 'name'=>$userdet->name,

            ];
            Mail::send('emails.Welcome', $message, function ($message)use($email) {
                $message->to($email)->subject('Welcome Email   E-Service');
            });
            return redirect('login-register')->with('flash_message_error','Your account has been activated .Now you can login');


          }
   }
   else{
       abort(404,"dddddddddd");
   }

}
public function login(Request $request ){
    if($request->isMethod('post')){
        $data=$request->all();
        $validator = Validator::make($data,[

            'email'=>'email|required',
            'password'=>'required|min:6'
           ]);
           if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        if(Auth::attempt(['email' => $data['email'] , 'password' => $data['password'] ,'role' => 'admin'])){

            $request->session()->put('frontsession',$data['email']);
            return redirect('/');
        }
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']]) ){
            $email_verif=User::where('email',$data['email'])->first();
            if($email_verif->email_verified_at ==null){
                return redirect()->back()->with('flash_message_succ','Your account is not verfied Yet');
            }
            $request->session()->put('frontsession',$data['email']);
            return redirect('/');

        }
        else{
            return redirect()->back()->with('flash_message_error','Incorrect Email or Password');
        }
    }

}
public function checkpass(Request $request){
            $data=$request->all();
            $c_pass=$data["c_pass"];
            $user_id=Auth::User()->id;
            $c_passe=User::where('id',$user_id)->first();
            if(Hash::check($c_pass, $c_passe->password)){
                echo "true";die;
            }
            else {
                echo "false";die;
            }

}
public function updatepass(Request $request){

    if($request->isMethod('post')){
        $data =$request->all();
        $c_pass=$data["c_pass"];
        $old_pass=User::where('id',auth()->user()->id)->first();
        if(Hash::check($c_pass,$old_pass->password)){
                  $new_pass=$data["n_pass"];
                  $new_passe=bcrypt($new_pass);
                  User::where('id',Auth::User()->id)->update(['password'=>$new_passe]);
                  return redirect()->back()->with('flash_message_succ','Password Update Successfully');
        }
        else{
            return redirect()->back()->with('flash_message_error','Password Incorrect');
        }
    }
    redirect('/account');

}
public function account(Request $request){
    $user =User::where('id',auth()->user()->id)->first();
    if($request->isMethod('post')){
        $data=$request->all();
      $user->name=$data['name'];
      $user->adress=$data['adress'];
      $user->city=$data['city'];
      $user->pincode=$data['pincode'];
      $user->mobile=$data['mobile'];
      $user->save();
    }

    return view('user.account')->with(compact('user'));
}
public function logout(Request $request){
    Auth::logout();
    $request->session()->forget('frontsession');
    return redirect('/');
}
public function deleteUser($id){
    if(!empty($id)){
        User::where(['id'=>$id])->delete();
        return  redirect()->back()->with('flash_message_succ','category has deleted success');
}
}
public function forgetPassword(Request $request){
    $data = $request->all();
    if($request->isMethod('post')){
        $emailcount =User::where('email',$data['email'])->count();
        if($emailcount ==0){
            return redirect()->back()->with('flash_message_error','Email does not Exist');
        }
        $userdetails= User::where('email',$data['email'])->first();
        $random_password=Str::random(8);
        $new_password= bcrypt($random_password);
        User::where('email',$data['email'])->update(['password'=>$new_password]);
        $email=$data['email'];
        $name=$userdetails->name;
        $message=[
            'email'=>$data['email'],
            'password'=>$random_password,
            'name'=>$name
        ];
        Mail::send('emails.forgetpassword', $message, function ($message)use($email) {
            $message->to($email)->subject('New Password - E-Service');

        });
        return redirect('/login-register')->with('flash_message_succ','Please Check your email for new password');
    }
    return view('user.forgetpassword');
}

}

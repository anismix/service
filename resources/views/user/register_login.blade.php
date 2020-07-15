@extends('frontLayout.front_design')
@section('content')

<section id="form" style="margin-top: 0px;"><!--form-->
    <div class="container">
            @if (Session::has('flash_message_succ'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! Session('flash_message_succ') !!}</strong>
            </div>
            @endif
            @if (Session::has('flash_message_error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{!! Session('flash_message_error') !!}</strong>
            </div>
            @endif
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">

                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                <form  action="{{ url('/user-login') }}" method="POST" id="LoginForm">
                    {{ csrf_field() }}

                        <input type="email" name="email" placeholder="Email Address" />
                        @error('email')
                         <div class="error" style="color:red;">{{ $message }}</div>
                          @enderror

                        <input type="password" name="password" placeholder="Password" />
                        @error('password')
                        <div class="error" style="color:red;">{{ $message }}</div>
                         @enderror

                        <span>
                            <input type="checkbox" class="checkbox">
                            Keep me signed in
                        </span>

                        <button type="submit" class="btn btn-default">Login</button>
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ url('/forget-password') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    <a href="{{ url('login/facebook') }}" class="fb btn">
                        <i class="fa fa-facebook fa-fw"></i> Login with Facebook
                      </a>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">OR</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>New User Signup!</h2>
                    <form class="registerForm" id="registerForm" action="{{ url('/user-register') }}" method="post">
                        {{ csrf_field() }}
                        <input name="name" id="name" type="text" placeholder="Name"/>
                        @error('name')
                         <div class="error" style="color:red;">{{ $message }}</div>
                          @enderror
                        <input name="email" is="email" type="email" placeholder="Email Address"/>
                        @error('email')
                         <div class="error" style="color:red;">{{ $message }}</div>
                          @enderror
                        <input  name="myPassword" id="myPassword" type="password" placeholder="Password"/>

                        @error('myPassword')
                         <div class="error" style="color:red;">{{ $message }}</div>
                          @enderror
                          <button type="submit" class="btn btn-default">Signup</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><
@endsection

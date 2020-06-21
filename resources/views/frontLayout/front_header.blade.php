<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> eservicemanarate@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="{{ url('/') }}"><img src="{{ asset('img/frontend_images/home/logo.png') }}" alt="" /></a>
                    </div>
                    <div class="btn-group pull-right">
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="{{ url('/add-service') }}"><i class="fa fa-plus-square"></i>Add service</a></li>
                            @if(empty(Auth::check()))
                            <li><a href="{{ url('/login-register') }}"><i class="fa fa-lock"></i> Login</a></li>
                            @else
                            @unless (auth()->user()->unreadNotifications->isEmpty())
                            <li class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">{{ auth()->user()->unreadNotifications->count() }} notification(s)</span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                  @foreach (auth()->user()->unreadNotifications as $notification)
                                    <li><a href="{{ url('/postdetail/'.$notification->data ['id']) }}">
                                    <i class="icon-user"></i> New comment in Your Post in {{  $notification->data['service'] }}
                                    service.
                                </a></li>
                                  <li class="divider"></li>
                                      @endforeach
                                    </ul>
                              </li>
                              @endunless
                        <li><a href="{{ url('/account') }}"><i class="fa fa-user"></i> Account</a></li>
                        <li><a href="{{ url('/user-logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
                        @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="{{ url('/') }}" class="active">Home</a></li>
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="{{ url('/blog') }}">Blog List</a></li>

                                </ul>
                            </li>
                            <li><a href="{{ url('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form method="GET" action="{{ url('/search') }}">
                        <input type="text" id="query" name="query" value="{{ request()->input('query') }}" placeholder="Search For Services"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

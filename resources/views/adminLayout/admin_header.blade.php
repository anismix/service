<!--Header-part-->
<div id="header">
    <h1><a href="#">E-service Admin </a></h1>
  </div>
  <!--close-Header-part-->
  <!--top-Header-menu-->
  <div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">


              <li class=""><a title="" href="{{url('/admin/setting')}}"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
              <li class=""><a title="" href="{{ url('/logout') }}"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
              @unless (auth()->user()->unreadNotifications->isEmpty())
              <li class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">{{ auth()->user()->unreadNotifications->count() }} notification(s)</span><b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    @foreach (auth()->user()->unreadNotifications as $notification)
                    @if ($notification->data['typeNotification']==='App\\Notifications\\testService')
                      <li><a href="{{  route('verifyservice', ['notification' => $notification->id])}}">
                      <i class="icon-user"></i>{{ $notification->data['name'] }} New !! </a></li>
                      @endif
                    <li class="divider"></li>
                    @if ($notification->data['typeNotification']==='App\\Notifications\\editService')
                    <li><a href="{{ route('verifyuservice', ['notification'=>$notification->id]) }}">
                          <i class="icon-user"></i> Update {{  $notification->data['name'] }} service
                      </a>
                    </li>
                    @endif
                    @endforeach
                </ul>
              </li>

                @endunless
 </ul>
  </div>
  <!--close-top-Header-menu-->
  <!--start-top-serch-->

  <!--close-top-serch-->

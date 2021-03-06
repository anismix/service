@extends('adminLayout.admin_design')
@section('content')
<div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="{{ url('/admin/dashbord') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a><a href="#" class="current">Verify Service</a> </div>
    </div>
    <div class="container-fluid"><hr>
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
              <h5>Verify Service </h5>
              <form action="{{ route('complaintservice',['id'=>$notifications->data['user'],'service'=>$notifications->data['name'],'idf'=>$notifications->id]) }}" method="GET"  >
                    <input type="submit" value="Refused service" class="btn btn-danger " style="float: right; margin:2px;">
            </form>
            </div>
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
            <div class="widget-content nopadding">
              <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/verifyservice/'.$notifications->id) }}" name="add_product" id="add_product" novalidate="novalidate">
                {{ csrf_field() }}
                <div class="widget-box">
                        <div class="control-group">
                                <label class="control-label">Category name</label>
                                <div class="controls">
                                        <input type="text" name="category" id="name" value="{{ $categorie->name}}">
                              @error('category')
                            <div class="error" style="color:red;">{{ $message }}</div>
                            @enderror
                              </div>
                        </div>
                                    <div class="control-group">
                                            <label class="control-label">Serive name</label>
                                            <div class="controls">
                                                    <input type="text" name="name" id="name" value="{{ $notifications->data['name']}}">
                                          @error('name')
                                        <div class="error" style="color:red;">{{ $message }}</div>
                                        @enderror
                                          </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Adress</label>
                                        <div class="controls">
                                                <input type="adress" name="adress" value="{{  $notifications->data['adress']}}" id="code">
                                                @error('adress')
                                                <div class="error" style="color:red;">{{ $message }}</div>
                                                @enderror
                                                  </div>
                                        </div>
                                         <div class="control-group">
                                            <label class="control-label">Description</label>
                                            <div class="controls">
                                              <textarea name="description" id="desc">{{  $notifications->data['description'] }}</textarea>
                                            @error('description')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                            @enderror
                                              </div>
                                          </div>
                                          <div class="control-group">
                                                <label class="control-label">Phone</label>
                                                <div class="controls">
                                                <input type="text" name="phone" id="code" value="{{  $notifications->data['phone'] }}">
                                                @error('phone')
                                                <div class="error" style="color:red;">{{ $message }}</div>
                                                @enderror
                                                  </div>
                                                </div>


                                        <div class="control-group">
                                            <label class="control-label">Service image</label>
                                            <div class="controls">
                                                    <input type="file" name="image" id="image" value="{{ $notifications->data['image'] }}"  >

                                                    <image src="{{ asset('img/backend_images/services/small/'.$notifications->data['image'])}}" style="width: 50px; height: 50px;"></image>
                                                    |
                                                     <a href="{{ url('/admin/delete-image/'.$notifications->data['image']) }}">Delete</a>
                                                    @error('image')
                                                    <div class="error" style="color:red;">{{ $message }}</div>
                                                    @enderror
                                                </div>


                                    </div>
                                      <div class="control-group">
                                            <label class="control-label">Open Hour</label>
                                            <div class="controls">
                                            <input type="time" name="openhour" value="{{ $notifications->data['openhour'] }}" >
                                            @error('openhour')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                            @enderror
                                              </div>
                                            </div>

                                            <div class="control-group">
                                                    <label class="control-label">Close Hour</label>
                                                    <div class="controls">
                                                    <input type="time" name="closehour" value="{{ $notifications->data['closehour'] }}" >
                                                    @error('closehour')
                                                    <div class="error" style="color:red;">{{ $message }}</div>
                                                    @enderror
                                                      </div>
                                                    </div>
                                    </div>


                <div class="form-actions">
                    <input type="submit" value="Add Service" class="btn btn-success">

              </form>

            </div>


            </div>
          </div>
        </div>
      </div>

    </div>
  </div





@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

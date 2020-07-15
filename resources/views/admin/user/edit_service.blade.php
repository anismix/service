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
            <div class="col-sm-12 col-sm-offset-1">
                <div class="login-form">
                    <!--login form-->
                    <h2>Add Service</h2>
                <form  action="{{ url('/edit-service/'.$service->id) }}" method="POST" id="LoginForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="control-group">
                        <div class="row">
                            <input type="hidden" value="{{ auth()->user()->id }}" name="user">
                            <div class="col-sm-4 form-group">
                                  <label>Category:</label>
                                       <select  name="category" class="form-control" placeholder="Under Category" >
                                             <?php  echo $category_dropdown; ?>
                                       </select>
                                           @error('category')
                                            <div class="error" style="color:red;">{{ $message }}</div>
                                           @enderror
                             </div>
                             <div class="col-sm-4 form-group">
                                    <label>Service:</label>
                                         <input  name="name" placeholder="Name" value="{{ $service->name }}" class="form-control">
                                             @error('name')
                                              <div class="error" style="color:red;">{{ $message }}</div>
                                             @enderror
                               </div>
                        </div>
                        <div class="row">
                                <div class="col-sm-4 form-group">
                                        <label>Adress:</label>
                                             <input  name="adress" placeholder="Adress" value="{{ $service->adress }}"  class="form-control">
                                                 @error('adress')
                                                  <div class="error" style="color:red;">{{ $message }}</div>
                                                 @enderror
                                </div>
                                 <div class="col-sm-4 form-group">
                                        <label>Description:</label>
                                             <textarea  name="description" placeholder="Description"  class="form-control">
                                                 {{ $service->description }}
                                             </textarea>
                                                @error('description')
                                                  <div class="error" style="color:red;">{{ $message }}</div>
                                                 @enderror
                                </div>

                        </div>
                        <div class="row">
                                <div class="col-sm-4 form-group">
                                        <label>Phone:</label>
                                             <input  name="phone" placeholder="Phone" value="{{ $service->phone }}" class="form-control">
                                                 @error('phone')
                                                  <div class="error" style="color:red;">{{ $message }}</div>
                                                 @enderror
                                   </div>
                                 <div class="col-sm-4 ">
                                                <label class="control-label">Service image</label>
                                                <div class="controls">
                                                        <input type="file" name="image" value="{{ $service->image }}" id="image">

                                                        @error('image')
                                                        <div class="error" style="color:red;">{{ $message }}</div>
                                                        @enderror
                                                 </div>


                                 </div>
                                 <span style="color:blanchedalmond;">|</span>
                        <div class="col-sm-4">
                                <image src="{{ asset('img/backend_images/services/small/'.$service->image)}}" style="width: 50px; height: 50px;"></image>
                        </div>

                        </div>
                        <div class="row">
                                <div class="col-sm-4 form-group">
                                        <label>Open Hour:</label>
                                             <input  name="openhour" placeholder="Open Hour" type="time" value="{{ $service->openhour }}" class="form-control">
                                                 @error('openhour')
                                                  <div class="error" style="color:red;">{{ $message }}</div>
                                                 @enderror
                                </div>
                                 <div class="col-sm-4 form-group">
                                        <label>Close Hour:</label>
                                             <input  name="closehour" placeholder="Open Hour" type="time"  value="{{ $service->closehour }}" class="form-control">
                                                 @error('closehour')
                                                  <div class="error" style="color:red;">{{ $message }}</div>
                                                 @enderror
                                </div>


                        </div>
                        <button type="submit" class="btn btn-default">Edit Service</button>
                    </form>
                </div><!--/login form-->
            </div>

        </div>
    </div>
</section>
@endsection

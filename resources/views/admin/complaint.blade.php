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
            <form  method="POST" action="{{ route('complaintservice',['id'=>$id,'service'=>$service]) }}" >
               {{ csrf_field() }}
                <div style="margin-left :15px;">
                            <div class="control-group">
                                    <label class="control-label" style="color:black;" ><h5><strong><i><u>Reason for refusing the service:</u></i></strong><h5></label>
                                    <div class="controls">
                                            <textarea type="text" name="complaint" style="width:850px;height: 150px; border-radius: 5px;"  ></textarea>
                                  @error('complaint')
                                <div class="error" style="color:red;">{{ $message }}</div>
                                @enderror
                                  </div>
                            </div>
                            <button type="submit" class="btn btn-danger" style="margin-bottom: 8px; border-radius: 5px;">Send</button>
                        </div>

            </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div





@endsection

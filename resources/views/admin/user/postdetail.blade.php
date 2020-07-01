@extends('adminLayout.admin_design')
@section('content')
<div id="content">
        <div id="content-header">
                <div id="breadcrumb"> <a href="{{ url('/admin/dashbord') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Services</a> <a href="#" class="current">View Category</a> </div>
                @if (Session::has('flash_message_succ'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{!! Session('flash_message_succ') !!}</strong>
                </div>
                @endif
              </div>
        <div class="container-fluid">
          <hr>
          <div class="row-fluid">
            <div class="span12">

              <div class="widget-box">
                <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                  <h5>Posts table</h5>
                </div>

                <div class="widget-content nopadding">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection

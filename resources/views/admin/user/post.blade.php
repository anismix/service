@extends('adminLayout.admin_design')
@section('content')
<div id="content">
        <div id="content-header">
                <div id="breadcrumb"> <a href="{{ url('/admin/dashbord') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Posts</a> <a href="#" class="current">View Posts</a> </div>
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
                  <table class="table table-bordered data-table">
                    <thead>
                      <tr>
                        <th>User Name</th>
                        <th>Post text</th>
                        <th>Service</th>
                        <th>Post Time</th>
                        <th>Post Date</th>
                        <th>Action(s)</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($post as $post)
                      <tr class="gradeX">
                             @foreach ( $user as $use )
                                    @if ($use->id === $post->user_id)
                                    <td> {{ $use->name }}
                             </td>
                  <td>   <a href="{{ url('/admin/detail-post') }}"> {{ $post->post }} </a></td>

                                @endif
                        @endforeach
                        @foreach ( $service as $ser )
                        @if ($ser->id === $post->service_id)
                        <td>{{ $ser->name }}</td>
                        @endif
                        @endforeach
                        <td>{{ $post->time }}</td>
                        <td>{{ $post->date }}</td>
                         <td class="center">
                                <a id="delePost" rel="{{ $post->id }}" rel1="delete-post"
                                    <?php /** href="{{ url('/admin/delete-user',$post->id) }}"*/?> href="javascript:" class="btn btn-danger btn-mini delete-category">Delete</a>

                         </td>
                      </tr>
                    </div>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection

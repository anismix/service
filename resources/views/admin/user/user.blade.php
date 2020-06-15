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
                  <h5>Service table</h5>
                </div>

                <div class="widget-content nopadding">
                  <table class="table table-bordered data-table">
                    <thead>
                      <tr>

                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Adress</th>
                        <th>User Phone</th>
                        <th>Action(s)</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $user)


                      <tr class="gradeX">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>---------</td>
                        <td>---------</td>

                         <td class="center">
                                <a id="deleUser" rel="{{ $user->id }}" rel1="delete-user"
                                    <?php /** href="{{ url('/admin/delete-user',$category->id) }}"*/?> href="javascript:" class="btn btn-danger btn-mini delete-category">Delete</a>
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

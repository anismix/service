@extends('adminLayout.admin_design')
@section('content')
<div id="content">
        <div id="content-header">
                <div id="breadcrumb"> <a href="{{ url('/admin/dashbord') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Services</a> <a href="#" class="current">View Service</a> </div>
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
                        <th>Category Name</th>
                        <th>Service name</th>
                        <th>Service Adress</th>
                        <th>Service Phone</th>
                        <th>Service description</th>
                        <th>Service Horaire</th>
                        <th>Service image</th>
                        <th>Action(s)</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($service as $service )


                      <tr class="gradeX">
                        <td>{{ $service->category_name }}</td>

                        <td>{{ $service->name }}</td>
                        <td>{{ $service->adress }}</td>
                        <td>{{ $service->phone }}</td>
                        <td>{{ $service->description }}</td>
                        <td>{{ $service->openhour }}h/{{ $service->closehour }}h</td>
                       @if(!empty($service->image))
                             <td><image src="{{ asset('img/backend_images/services/small/'.$service->image) }}" style="width:50px;height:50px;"></image></td>

                    @else
                             <td>No image</td>

                   @endif
                         <td class="center">
                            <a href="#myModal{{ $service->id }}" data-toggle="modal"  class="btn btn-success btn-mini">View</a>
                            <a href="{{ url('/admin/edit-service',$service->id)}}"   class="btn btn-info btn-mini">edit</a>
                                <a id="deleS" rel="{{ $service->id }}" rel1="delete-service"
                                    <?php /** href="{{ url('/admin/delete-service',$category->id) }}"*/?> href="javascript:" class="btn btn-danger btn-mini delete-category">Delete</a>

                        </td>
                      </tr>



                    <div id="myModal{{ $service->id }}" class="modal hide">
                        <div class="modal-header">
                          <button data-dismiss="modal" class="close" type="button">×</button>
                          <h3>{{ $service->name }}</h3>
                        </div>
                        <div class="modal-body">
                          <p>service ID :{{ $service->id }}</p>
                           <p>service name :{{ $service->name }}</p>
                            <p>service Phone:{{ $service->phone }}</p>
                            <p>service adress :{{ $service->adress}}</p>
                            <p>service description :{{ $service->description }}</p>

                        </div>
                      </div>

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

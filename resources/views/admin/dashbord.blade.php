@extends('adminLayout.admin_design')
@section('content')
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
      <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
      </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
      <div class="container-fluid">

    <!--End-Action boxes-->

    <!--Chart-box-->
        <div class="row-fluid">
          <div class="widget-box">
            <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
              <h5>Site Analytics</h5>
            </div>
            <div class="widget-content" >
              <div class="row-fluid">
                <div class="span9">
                  <div class="chart">
                        <div class="widget-box">
                                <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
                                  <h5>Latest Posts</h5>
                                </div>
                                <div class="widget-content nopadding collapse in" id="collapseG2">
                                  <ul class="recent-posts">
                                      <form action="{{ url('/admin/view-posts') }}" method="GET">
                                    @foreach ($poste as $item)


                                    <li>
                                      <div class="user-thumb">  <img width="40" height="40" alt="User" src="{{ asset('img/backend_images/demo/av1.jpg')}}"> </div>
                                      <div class="article-post"> <span class="user-info">  @foreach ($usere as $use)
                                        @if ($use->id === $item->user_id)
                                        By: {{$use->name}}
                                        @endif

                                        @endforeach
                                        / Date: {{$item->date}} / Time:{{$item->time}} </span>
                                        <p><a href="view-posts" style="text-decoration: none;">{{ $item->post }}</a> </p>
                                      </div>
                                    </li>
                                    @endforeach
                                    <li>
                                      <button type="submit" class="btn btn-warning btn-mini">View All</button>
                                    </li>
                                </form>
                                  </ul>
                                </div>
                              </div>
                  </div>
                </div>
                <div class="span3">
                  <ul class="site-stats">
                    <li class="bg_lh"><i class="icon-user"></i> <strong>{{ $user }}</strong> <small>Total Users</small></li>
                    <li class="bg_lh"><i class="icon-shopping-cart"></i> <strong>{{ $categorie }}</strong> <small>Total Categories</small></li>
                    <li class="bg_lh"><i class="icon-tag"></i> <strong>{{ $services }}</strong> <small>Total Services</small></li>
                    <li class="bg_lh"><i class="icon-tag"></i> <strong>{{ $post }}</strong> <small>Total Posts</small></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
    <!--End-Chart-box-->
        <hr/>

      </div>
    </div>

    <!--end-main-container-part-->


    @endsection

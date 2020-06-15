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
                                    <li>
                                      <div class="user-thumb">  <img width="40" height="40" alt="User" src="{{ asset('img/backend_images/demo/av1.jpg')}}"> </div>
                                      <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                                        <p><a href="#">This is a much longer one that will go on for a few lines.It has multiple paragraphs and is full of waffle to pad out the comment.</a> </p>
                                      </div>
                                    </li>
                                    <li>
                                      <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{ asset('img/backend_images/demo/av2.jpg')}}"> </div>
                                      <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                                        <p><a href="#">This is a much longer one that will go on for a few lines.It has multiple paragraphs and is full of waffle to pad out the comment.</a> </p>
                                      </div>
                                    </li>
                                    <li>
                                      <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{ asset('img/backend_images/demo/av4.jpg')}}"> </div>
                                      <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                                        <p><a href="#">This is a much longer one that will go on for a few lines.Itaffle to pad out the comment.</a> </p>
                                      </div>
                                    <li>
                                      <button class="btn btn-warning btn-mini">View All</button>
                                    </li>
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
        <div class="row-fluid">
          <div class="span6">
            <div class="widget-box">
              <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
                <h5>Latest Posts</h5>
              </div>
              <div class="widget-content nopadding collapse in" id="collapseG2">
                <ul class="recent-posts">
                  <li>
                    <div class="user-thumb">  <img width="40" height="40" alt="User" src="{{ asset('img/backend_images/demo/av1.jpg')}}"> </div>
                    <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                      <p><a href="#">This is a much longer one that will go on for a few lines.It has multiple paragraphs and is full of waffle to pad out the comment.</a> </p>
                    </div>
                  </li>
                  <li>
                    <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{ asset('img/backend_images/demo/av2.jpg')}}"> </div>
                    <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                      <p><a href="#">This is a much longer one that will go on for a few lines.It has multiple paragraphs and is full of waffle to pad out the comment.</a> </p>
                    </div>
                  </li>
                  <li>
                    <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{ asset('img/backend_images/demo/av4.jpg')}}"> </div>
                    <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                      <p><a href="#">This is a much longer one that will go on for a few lines.Itaffle to pad out the comment.</a> </p>
                    </div>
                  <li>
                    <button class="btn btn-warning btn-mini">View All</button>
                  </li>
                </ul>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>

    <!--end-main-container-part-->


    @endsection

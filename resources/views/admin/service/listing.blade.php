@extends('frontLayout.front_design')
@section('content')

<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SERVICE</h1>
                                <h2>Best Service For You</h2>
                                <p>a service management web platform aimed at strengthening the social strategy between customers and service providers </p>

                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('img/frontend_images/sport.jpg') }}" class="img-responsive" alt="" />

                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SERVICE</h1>
                                <h2>Best Service For You</h2>
                                <p>a service management web platform aimed at strengthening the social strategy between customers and service providers </p>

                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('img/frontend_images/boulangerie.jpg') }}"  class="img-responsive" alt="" />
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>E</span>-SERVICE</h1>
                                <h2>Best Service For You</h2>
                                <p>a service management web platform aimed at strengthening the social strategy between customers and service providers </p>

                            </div>
                            <div class="col-sm-6">
                                <img src="{{ asset('img/frontend_images/dentiste.jpg') }}" class="img-responsive" alt="" />

                            </div>
                        </div>

                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->
<!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <div class="panel panel-default">

                                @foreach($categorie as $cat)

                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#{{ $cat->id }}">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>

                                        {{ $cat->name }}
                                    </a>
                                </h4>
                            </div>
                            <div id="{{ $cat->id }}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        @foreach($cat->categories as $sub)

                                        <li><a href="{{ url('/services/'.$sub->name) }}">{{ $sub->name }} </a></li>

                                       @endforeach

                                    </ul>
                                </div>
                            </div>

                            @endforeach
                        </div>


                    </div><!--/category-products-->



                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">All Services</h2>
                    @foreach($service as $service)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ asset('img/backend_images/services/small/'.$service->image)}}" alt="" />
                                        <h2>{{$service->name }}</h2>
                                        <p>{{$service->adress}}</p>
                                        <a href="{{ url('/service/'.$service->id )}}" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>Detail</a>
                                    </div>

                            </div>

                        </div>
                    </div>
                    @endforeach


                </div><!--features_items-->



            </div>
        </div>
    </div>
</section>

@endsection

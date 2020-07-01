@extends('frontLayout.front_design');
@section('content')

<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">

        </div>
    </div>
</section><!--/slider-->
<!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">

            </div>

            <div class="col-sm-12 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">My Services</h2>
                    @foreach($serviceAll as $serviceAll)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ asset('img/backend_images/services/small/'.$serviceAll->image)}}" alt="" />
                                        <h2>{{$serviceAll->name }}</h2>
                                        <p>{{$serviceAll->adress}}</p>
                                        <a href="{{ url('/service/'.$serviceAll->id )}}" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>Detail</a>
                                        <a href="{{ url('/edit-service/'.$serviceAll->id )}}" class="btn btn-warning add-to-cart"><i class="fa fa-edit"></i>Edit</a>
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

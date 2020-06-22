@extends('frontLayout.front_design');
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('frontLayout.front_sidebar')
            </div><!--/category-products-->



                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="images/product-details/1.jpg" alt="">
                            <h3>ZOOM</h3>
                        </div>
                        <div id="similar-product" >

                            <div class="easyzoom" >
                                <a href="{{ asset('img/backend_images/services/large/'.$servicedet->image)}}">
                    <img style="height: 300px;"  class="mainImage" src="{{ asset('img/backend_images/services/medium/'.$servicedet->image)}}"alt="" />
                                </a>
                        </div>


                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="images/product-details/new.jpg" class="newarrival" alt="">
                            <h2>{{ $servicedet->name }}</h2>


                            <span>
                                <span>{{ $servicedet->openhour }} H || {{ $servicedet->closehour }} H</span>
                            </span>
                            <p><b>Phone:</b>{{ $servicedet->phone }}</p>
                            <p><b>adress:</b>{{ $servicedet->adress }}</p>

                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->

                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">

                            <li><a href="#companyprofile" data-toggle="tab">Description</a></li>

                            <li class="active"><a href="#reviews" data-toggle="tab">Reviews </a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="companyprofile">
                            <div class="col-sm-12">

                                <p><b>Description</b></p>
                                <p>{{ $servicedet->description }}</p>

                            </div>
                        </div>



                        <div class="tab-pane fade active in" id="reviews">
                            <div class="col-sm-12">
                                <ul>

                                </ul>

                                <p><b>Write Your Review</b></p>

                                <form action="{{ url('/postblog/'.$servicedet->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <textarea type="text" name="post" style="width:850px;height: 150px; border-radius: 5px;"  ></textarea>
                                    @error('post')
                                    <div class="error" style="color:red;">{{ $message }}</div>
                                   @enderror

                                    <button type="submit" class="btn btn-default pull-right">
                                      Submit
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div><!--/category-tab-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            <?php $count=1; ?>
                          @foreach($related_service->chunk(3) as $chunk)
                        <div <?php if($count==1) { ?> class="item active" <?php } else {

                        ?> class="item" <?php } ?> >
                        @foreach($chunk as $item)
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img style="width:160px;"src="{{ asset('img/backend_images/services/small/'.$item->image)}}" alt="" />
                                                <h2> {{ $item->name}}</h2>
                                                <p>{{ $item->adress }}</p>
                                                <a href="{{ url('/service/'.$servicedet->id )}}" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>Detail</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                @endforeach
                            </div>

                            <?php $count++;?>

                            @endforeach
                        </div>


                         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                          </a>
                          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                          </a>
                    </div>
                </div><!--/recommended_items-->


            </div>
        </div>
    </div>
</section>
@endsection

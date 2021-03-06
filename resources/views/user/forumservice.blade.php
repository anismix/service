@extends('frontLayout.front_design')
@section('content')
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
                                            {{ $cat->name  }}

                                        </a>
                                    </h4>
                                </div>
                                <div id="{{ $cat->id }}" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            @foreach($cat->categories as $sub)
                                            <li><a href="{{ url('/blog/'.$sub->id) }}">{{ $sub->name }} </a></li>
                                           @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                </div>

</div>
</div>
<div class="col-sm-9">
        <div class="blog-post-area">
            <h2 class="title text-center">Latest From our Blog</h2>
             @foreach ($post as $post )
            <div class="single-blog-post">
                <div class="post-meta">
                    <ul mt-8>
                      @foreach ($post as $post )
                        @foreach ( $user as $use )
                          @if ($use->id === $post->user_id)
                        <li><i class="fa fa-user"></i> {{ $use->name }}</li>
                         @endif
                         @endforeach
                        @endforeach
                        <li><i class="fa fa-clock-o"></i> {{  $post->time }}</li>
                        <li><i class="fa fa-calendar"></i>{{  $post->date }}</li>
                        @foreach ( $service as $ser )
                        @if ($ser->id === $post->service_id)
                        <i> {{ $ser->name }} </i>
                        @endif
                        @endforeach
                    </ul>
                    <span>

                    </span>
                </div>
                <p class="mb-8">{{ $post->post }}</p>
                <p > <button   class="btn btn-default" data-toggle="collapse" data-target="#demo{{ $post->id }}" >Comment</button></p>

                <div id="demo{{ $post->id }}" class="collapse">
                    <form method="POST"  action="{{ url('/comment/'.$post->id)}}">
                  {{ csrf_field() }}
                        <input class="form-control " name="comment" type="text"   placeholder="comment"  required>
                                        <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary">Comment</button>
                                         </div>
                                         @foreach ($comment as $com )
                                         @if ( $com->post_id === $post->id)
                                     &nbsp;  @foreach ( $user as $use )
                                     @if ($use->id === $com->user_id)
                                     <div class="ml-15" style="background: #edf492;padding:8px;">
                                     <span style="float:right;"> <i class="fa fa-user" ></i> {{ $use->name}}</span>
                                   @endif
                                   @endforeach
                                         {{ $com->body }}
                                         </div>
                                         @endif
                                @endforeach
                            </form>
                </div>
            </div>
            <hr>
            @endforeach

            <div class="pagination-area">

            </div>
        </div>
    </div>
</div>
</div>
</section>
@endsection

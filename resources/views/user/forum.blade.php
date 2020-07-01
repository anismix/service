@extends('frontLayout.front_design');
@section('content')
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
                    <div class="left-sidebar">
                </div>

</div>
</div>
<div class="col-sm-12">
        <div class="blog-post-area">
            <h2 class="title text-center">Latest From our Blog</h2>
             @foreach ($post as $post )
            <div class="single-blog-post">
                <div class="post-meta">
                    <ul mt-8>
                      @foreach ( $user as $use )
                          @if($use->id === $post->user_id)
                        <li><i class="fa fa-user"></i>{{ $use->name}}</li>
                        @endif
                        @endforeach
                        <li><i class="fa fa-clock-o"></i> {{  $post->time}}</li>
                        <li><i class="fa fa-calendar"></i>{{   $post->date }}</li>
                        @foreach ( $service as $ser )
                        @if ($ser->id === $post->service_id)
                        <li> {{ $ser->name }} </li>
                        @endif
                        @endforeach
                    </ul>
                    <span>
                            @if(!(empty(Auth::check())))
                            @if( Auth::user()->id=='admin' || Auth::user()->id ===$post->user_id)
                   <a href="{{ url('/edit-postu/'.$post->id) }}">     <i class="fa fa-edit" style="color:blue;" ></i></a>
                     <a href="{{ url('/delete-postu/'.$post->id) }}">   <i class="fa fa-trash-o" style="color:red;" ></i></a>
                            @endif
                        @endif
                    </span>
                </div>
           <a href="{{ url('/postdetail/'.$post->id) }}">     <p class="mb-8">{{ $post->post }}</p><a>
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
                                     <span style="float:right;" style="color:black;"> <i class="fa fa-user" ></i> {{ $use->name}}
                                     @if(!(empty(Auth::check())))
                                         @if(  (Auth::user()->id=='admin' || Auth::user()->id ===$com->user_id))
                                        <a id="deleCu" rel="{{ $com->id }}" rel1="delete-commentu" href="{{ url('/user/delete-commentu/'.$com->id) }}"><i class="fa fa-trash-o" style="color:red; " ></i></a>
                                        @endif
                                    @endif
                                    </span>
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
                <ul class="pagination">
                    <li><a href="" class="active">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</section>
@endsection

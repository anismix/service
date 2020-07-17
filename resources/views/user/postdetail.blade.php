@extends('frontLayout.front_design')
@section('content')
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">

               </div>
<div class="col-sm-12">
        <div class="blog-post-area">
            <h2 class="title text-center">Your Post detail</h2>
             @foreach ($post as $post )
            <div class="single-blog-post">
                <div class="post-meta">
                    <ul mt-8>
                      @foreach ( $user as $use )
                          @if ($use->id === $post->user_id)
                        <li><i class="fa fa-user"></i> {{ $use->name }}</li>
                        @endif
                        @endforeach
                        <li><i class="fa fa-clock-o"></i> {{  $post->time }}</li>
                        <li><i class="fa fa-calendar"></i>{{   $post->date }}</li>

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

             <p class="mb-8">{{ $post->post }}</p>


                <div >
                    <form method="POST"  action="{{ url('/commentdetail/'.$post->id)}}">
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
                                                        @if(  (Auth::user()->role=='admin' || Auth::user()->id ===$com->user_id))
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

            </div>
        </div>
    </div>
</div>
</div>
</section>
@endsection

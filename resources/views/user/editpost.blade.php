@extends('frontLayout.front_design')
@section('content')
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">

           </div>
<div class="col-sm-12">
        <div class="blog-post-area">
            <h2 class="title text-center">Update Your Post</h2>

            <div class="single-blog-post">
                <div class="post-meta">
                    <ul mt-8>

                    </ul>
                    <span>

                    </span>
                </div>

                <div class="tab-pane fade active in" id="reviews">
                        <div class="col-sm-12">
                            <ul>
                            </ul>

                            <p><b>Write Your Review</b></p>

                            <form action="{{ url('/edit-postu/'.$post->id) }}" method="POST">
                                {{ csrf_field() }}
                                <textarea type="text" name="post" style="width:850px;height: 150px; border-radius: 5px;"  >{{ $post->post }}</textarea>
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
            <hr>


            <div class="pagination-area">

            </div>
        </div>
    </div>
</div>
</div>
</section>
@endsection

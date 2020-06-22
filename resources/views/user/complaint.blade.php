@extends('frontLayout.front_design');
@section('content')
<div id="contact-page" class="container">
    	<div class="bg">

    		<div class="row">
                    <div class="col-sm-12">
                            <div class="contact-form">
                                <h2 class="title text-center">Adding Service Failed</h2>
                                <div class="status alert alert-success" style="display: none"></div>
                                 <p>{{ $complaint->data['compalint'] }}</p>
                            </div>
                        </div>


	    	</div>
    	</div>
    </div><!--/#contact-page-->


@endsection

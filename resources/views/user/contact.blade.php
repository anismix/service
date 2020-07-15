@extends('frontLayout.front_design')
@section('content')
<div id="contact-page" class="container">
    	<div class="bg">

    		<div class="row">
                    <div class="col-sm-8">
                            <div class="contact-form">
                                <h2 class="title text-center">Get In Touch</h2>
                                <div class="status alert alert-success" style="display: none"></div>
                                <form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="{{ url('/contact') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group col-md-6">
                                        <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                                        @error('name')
                                        <div class="error" style="color:red;">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                                        @error('email')
                                        <div class="error" style="color:red;">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                                        @error('subject')
                                        <div class="error" style="color:red;">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                                        @error('message')
                                        <div class="error" style="color:red;">{{ $message }}</div>
                                       @enderror
                                    </div>
                                    <div class="form-group col-md-12">
                                        <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">

                                    </div>
                                </form>
                            </div>
                        </div>

	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>E-Service Inc.</p>
							<p>Immeuble 158 - 2ème étage Avenue kouwait Hammamet، 8050</p>
							<p>Hammamet TN</p>
							<p>Mobile: +216 26 662 014</p>
							<p>Fax: 1-714-252-0026</p>
							<p>Email: eservicemanarate@gmail.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>
	    	</div>
    	</div>
    </div><!--/#contact-page-->


@endsection

@extends('frontend.home-master')
@section('title',$seo->title)
@section('description',$seo->description)
@section('keywords',$seo->keywords)

@section('content')


<!-- carousel -->
<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="2000">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">
	    @foreach($car as $key => $c)
		<div class="{{$key==0?'item carousel-size active':'item carousel-size'}}">
			
			<img class="img-responsive" src="{{url('/imageupload/'.$c->image)}}" alt="">
			<div class="text-center capitalize corpboot-wel">
				<h3> {{$c->description}} </h3>
				<a href="{{url('whyus')}}"><button type="button" class="btn btn-primary capitalize btn-slider">Know More</button></a>
			</div>
		</div>
		@endforeach

		<!-- <div class="item carousel-size">
			<div class="text-center capitalize corpboot-wel">
				<h2>Welcome to Bhattidanda Fresh & Natural,<br><br> Be more than a tourist, become a local </h2>
				<a href="{{url('whyus')}}"><button type="button" class="btn btn-primary capitalize btn-slider">Know More</button></a>
			</div>
			<img src="{{url('public/images/bhattidandaimages/carousel2.png')}}" alt="">
		</div>	

		<div class="item carousel-size">
			<div class="text-center capitalize corpboot-wel">
				<h2> Welcome to Bhattidanda Fresh & Natural, <br><br>Be more than a tourist, become a local </h2>
				<a href="{{url('whyus')}}"><button type="button" class="btn btn-primary capitalize btn-slider">Know More</button></a>
			</div>
			<img src="{{url('public/images/bhattidandaimages/carousel3.png')}}" alt="">
		</div>

		<div class="item carousel-size">
			<div class="text-center capitalize corpboot-wel">
				<h2> Welcome to Bhattidanda Fresh & Natural, <br><br>Be more than a tourist, become a local </h2>
				<a href="{{url('whyus')}}"><button type="button" class="btn btn-primary capitalize btn-slider">Know More</button></a>
			</div>
			<img src="{{url('public/images/bhattidandaimages/carousel4.jpg')}}" alt="">
		</div> -->

	</div>

	<!-- Left and right controls -->
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>	
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<!-- End of carousel -->


<div class="container-fluid"> 
	<div class="container">
		<div class="col-md-6"> 
			<div class="container-fluid abt-pad-2">
				<div class="col-md-5 pad-0">
					<h3 class="capitalize">Introduction</h3> 
				</div>
				<div class="col-md-7 span-brdr">
					<span></span>
				</div>
			</div>

			<div >
				<p class="text">
					
					{!!$intro->description!!}
				</p>
				<!-- <ul>
					<li>Tamang culture and traditions are the heart and soul of the Homestay. You will be living with a Tamang family, eating Tamang food, learning about their culture and even, living their culture!
					</li>

					<li>A closer peek into the Himalayas is reason enough to visit Bhattidanda. Imagine waking up to that view! All of our rooms have a spectacular view of the mountains. Sunrise and sunsets are especially beautiful!</li>
					<li>Food served to you is locally produced by the community and directly purchased from the farmers.</li>
					<li>Liked the aloo ko achaar and the saag? Phul Maya didi will not only share her recipe, but teach you how to cook as well!</li>
					<li>If you want to get a taste of agriculture, you can follow Phul Maya didi to her field to see how crops are grown.</li>
					<li>The village in itself is very peaceful. Take a walk around trees, enjoy the tranquility, learn about the village, and interact with the local community.</li>
					<li>Despite being a small village, there are many stories and storytellers! Two elderly women aged above 80, love sharing their tales!</li>
					<li>If you love hiking, you can choose from short hikes (lasting an hour) to long ones (lasting a full day).</li>
					<li>You can participate and contribute in many community based projects during your stay.</li>
					<li>Tamang culture is best explored through its ethnic wear, dance and instruments. All of these are available in the homestay, ready for you to explore!</li>
				</ul> -->
			</div>
		</div><!--end of col-->

		<div class="col-md-6">
			<div class="container-fluid">
				<div class="container-fluid abt-pad-2">
					<div class="col-md-4">
						<h3 class="capitalize">Book now</h3> 
					</div>
					<div class="col-md-8 span-brdr">
						<span></span>
					</div>
				</div>
				<div>
					<div class="container-fluid">
						<div id="booking">
							<div class="panel panel-default book-form">
								<div class="panel-body text-center">
									<div>
										<h3>Booking Form</h3>
									</div>

									<form class="text-center">
										<div class="book-form">
											<input type="text" class="form-control" id="user-name" name="name" placeholder="Name" >
										</div>

										<div class="book-form">
											<input type="email" class="form-control" id="user-email" name="email" placeholder="Email" >
										</div>

										<!-- <div class="book-form">
											<input type="text" class="form-control" id="user-gender" name="gender" placeholder="Gender" >
										</div>

										<div class="book-form">
											<input type="text" class="form-control" name="age" placeholder="Age" >
										</div>

										<div class="book-form">
											<input type="text" class="form-control" name="location" placeholder="Location" >
										</div> -->

										<div class="book-form">
											<input type="number" class="form-control" name="contact" placeholder="Contact" >
										</div>

										<div class="book-form">
											<textarea name="user-message" class="form-control" id="user-message" placeholder="Message" cols="20" rows="7"></textarea>
										</div>

										<div class="book-form">
											<button type="submit" class="btn btn-warning btn-slider" ><i class="glyphicon glyphicon-log-in"></i> Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- gallery -->
<div class="container-fluid margin-all">
	<div class="container glimpse-padding">
		<div class="col-md-3">
			<h3 class="capitalize why-bhattidanda">Some of Glimpse</h3> 
		</div>
		<div class="col-md-9 span-brdr">
			<span></span>
		</div>
	</div>


	<div class="container">
		@foreach($gal as $g)
		<div class="col-md-3 text-center zoom-out-effect left glimpse-caption">
			<div class="thumbnail img-box galleryimg">
					<img src="{{url('imageupload/'.$g->image)}}" class="img-responsive" alt="Lights" style="width:100%">
			</div>
			<p>{{$g->name}}</p>
		</div>
		@endforeach

		
		
		
	</div>
</div>

<!-- greet -->
<div class="container-fluid greet margin-all">
	<div class="container-fluid">
		<div class="greet-pad">
			<p class="capitalize greet-relative">There is no hospitality <br>like understanding</p>
		</div>
	</div>
</div>


@endsection

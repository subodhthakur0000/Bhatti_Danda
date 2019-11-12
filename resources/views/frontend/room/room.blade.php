@extends('frontend.home-master')

@section('content')

<div class="container-fluid abt-pad">
	<div class="col-md-4 span-brdr">
		<span></span>
	</div>
	<div class="col-md-4 text-center">
		<h1 class="capitalize">Rooms</h1> 
	</div>
	<div class="col-md-4 span-brdr">
		<span></span>
	</div>
</div>


<!-- <div class="container">
		<div class="col-md-4">
			<div class="thumbnail text-center" id="demo">
				<a href="{{url('public/images/room2.jpg')}}" class="flipLightBox"><img src="{{url('public/images/room2.JPG')}}" class="img-responsive" alt="room2" style="width:300"></a>
				<a href="{{url('public/images/room2.jpg')}}" class="flipLightBox"><img src="{{url('public/images/room2.JPG')}}" class="img-responsive" alt="room2" style="width:300"></a>
			</div>
		</div>
		<div class="col-md-4">
			<div class="thumbnail text-center">
				<a href="{{url('public/images/room2.JPG')}}" class="flipLightBox-3"><img src="{{url('public/images/room2.JPG')}}" class="img-responsive" alt="room2" style="width:300"></a>
			</div>
		</div>
		<div class="col-md-4">
			<div class="thumbnail text-center">

				<img src="{{url('public/images/room 3.JPG')}}" class="img-responsive" alt="room3" style="width:300">
			</div>
		</div>

		<div class="col-md-4">
			<div class="thumbnail text-center">

				<img src="{{url('public/images/room 5.JPG')}}" class="img-responsive" alt="room5" style="width:300">
			</div>
		</div>

		<div class="col-md-4">
			<div class="thumbnail text-center">

				<img src="{{url('public/images/room 5.JPG')}}" class="img-responsive" alt="" style="width:300">
			</div>
		</div>

		<div class="col-md-4">
			<div class="thumbnail text-center">

				<img src="{{url('public/images/room 5.JPG')}}" class="img-responsive" alt="Fjords" style="width:300">
			</div>
		</div>
	</div> -->
	<div class="container" style="text-align: center;">
		<div class="room-inline room-pad">
			<a href="{{url('public/images/room2.JPG')}}" class="flipLightBox ">
				<img src="{{url('public/images/room2.JPG')}}" class="room-img img-responsive" width="300" height="300" alt="flipLightBox Image 1" />
				<span><b>LightBox</b> Text to accompany first lightbox image</span>
			</a>
		</div>

		<div class="room-inline room-pad">
			<a href="{{url('public/images/room 3.JPG')}}" class="flipLightBox ">
				<img src="{{url('public/images/room 3.JPG')}}" class="room-img img-responsive" width="300" height="300" alt="flipLightBox Image 1" />
				<span><b>LightBox</b> Text to accompany first lightbox image</span>
			</a>
		</div>
		<div class="room-inline room-pad">
			<a href="{{url('public/images/room 4.JPG')}}" class="flipLightBox ">
				<img src="{{url('public/images/room 4.JPG')}}" class="room-img img-responsive"  width="300" height="300" alt="flipLightBox Image 2" />
				<span><b>LightBox Image 2</b><br />Text to accompany 2nd lightbox image</span>
			</a>
		</div>
		<div class="room-inline room-pad">
			<a href="{{url('public/images/room 5.JPG')}}" class="flipLightBox ">
				<img src="{{url('public/images/room 5.JPG')}}" class="room-img img-responsive" width="300" height="300" alt="flipLightBox Image 3" />
				<span><b>LightBox Three</b> Text to accompany the third lightbox image</span>
			</a>
		</div>
		<div class="room-inline room-pad">
			<a href="{{url('public/images/room 6.JPG')}}" class="flipLightBox ">
				<img src="{{url('public/images/room 6.JPG')}}" class="room-img img-responsive" width="300" height="300" alt="flipLightBox Image 4" />
				<span><b>The Final LightBox</b> Text to accompany the last of the lighboxes</span>
			</a>
		</div>
		<div class="room-inline room-pad">
			<a href="{{url('public/images/room 7.JPG')}}" class="flipLightBox ">
				<img src="{{url('public/images/room 7.JPG')}}" class="room-img img-responsive" width="300" height="300" alt="flipLightBox Image 4" />
				<span><b>The Final LightBox</b> Text to accompany the last of the lighboxes</span>
			</a>
		</div>
	</div>


	@endsection
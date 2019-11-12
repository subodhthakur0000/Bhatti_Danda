@extends('frontend.home-master')
@section('content')


<div class="container" style="text-align: center;">
		<div class="room-inline room-pad">
			<a href="{{url('public/images/gallery/bhattidanda/1.jpg')}}" class="flipLightBox ">
				<img src="{{url('public/images/gallery/bhattidanda/1.jpg')}}" class="room-img img-responsive" width="300" height="300" alt="flipLightBox Image 1" />
				<!-- <span><b>LightBox</b> Text to accompany first lightbox image</span> -->
			</a>
		</div>

		<div class="room-inline room-pad">
			<a href="{{url('public/images/gallery/bhattidanda/2.jpg')}}" class="flipLightBox ">
				<img src="{{url('public/images/gallery/bhattidanda/2.jpg')}}" class="room-img img-responsive" width="300" height="300" alt="flipLightBox Image 1" />
				<!-- <span><b>LightBox</b> Text to accompany first lightbox image</span> -->
			</a>
		</div>
		<div class="room-inline room-pad">
			<a href="{{url('public/images/gallery/bhattidanda/3.jpg')}}" class="flipLightBox ">
				<img src="{{url('public/images/gallery/bhattidanda/3.jpg')}}" class="room-img img-responsive"  width="300" height="300" alt="flipLightBox Image 2" />
				<!-- <span><b>LightBox Image 2</b><br />Text to accompany 2nd lightbox image</span> -->
			</a>
		</div>
		<div class="room-inline room-pad">
			<a href="{{url('public/images/gallery/bhattidanda/4.jpg')}}" class="flipLightBox ">
				<img src="{{url('public/images/gallery/bhattidanda/4.jpg')}}" class="room-img img-responsive" width="300" height="300" alt="flipLightBox Image 3" />
				<!-- <span><b>LightBox Three</b> Text to accompany the third lightbox image</span> -->
			</a>
		</div>
		<div class="room-inline room-pad">
			<a href="{{url('public/images/gallery/bhattidanda/5.jpg')}}" class="flipLightBox ">
				<img src="{{url('public/images/gallery/bhattidanda/5.jpg')}}" class="room-img img-responsive" width="300" height="300" alt="flipLightBox Image 4" />
				<!-- <span><b>The Final LightBox</b> Text to accompany the last of the lighboxes</span> -->
			</a>
		</div>
</div>


<!-- <div class="container margin-all margin-bottom-all">
	<div class="col-md-3 room-pad">
				<img src="{{url('public/images/gall1.jpg')}}" class="img-responsive">
	</div>

	<div class="col-md-3 room-pad">
				<img src="{{url('public/images/gall2.jpg')}}" class="img-responsive">
	</div>

	<div class="col-md-3 room-pad">
				<img src="{{url('public/images/gall2.jpg')}}" class="img-responsive">
	</div>

	<div class="col-md-3 room-pad">
				<img src="{{url('public/images/gall3.jpg')}}" class="img-responsive">
	</div>

	<div class="col-md-3 room-pad">
				<img src="{{url('public/images/gall1.jpg')}}" class="img-responsive">
	</div>
	<div class="col-md-3 room-pad">
				<img src="{{url('public/images/gall2.jpg')}}" class="img-responsive">
	</div>
	<div class="col-md-3 room-pad">
				<img src="{{url('public/images/gall3.jpg')}}" class="img-responsive">
	</div>
	<div class="col-md-3 room-pad">
				<img src="{{url('public/images/gall1.jpg')}}" class="img-responsive">
	</div>
	<div class="col-md-3 room-pad">
				<img src="{{url('public/images/gall2.jpg')}}" class="img-responsive">
	</div>
	<div class="col-md-3 room-pad">
				<img src="{{url('public/images/gall3.jpg')}}" class="img-responsive">
	</div>

</div> -->

@endsection
@extends('frontend.home-master')
@section('content')

<div class="container" style="text-align: center;">
		<div class="room-inline room-pad">
			<a href="{{url('public/images/gallery/room/1.jpg')}}" class="flipLightBox ">
				<img src="{{url('public/images/gallery/room/1.jpg')}}" class="room-img img-responsive" width="300" height="300" alt="flipLightBox Image 1" />
				<!-- <span><b>LightBox</b> Text to accompany first lightbox image</span> -->
			</a>
		</div>
		<div class="room-inline room-pad">
			<a href="{{url('public/images/gallery/room/2.jpg')}}" class="flipLightBox ">
				<img src="{{url('public/images/gallery/room/2.jpg')}}" class="room-img img-responsive" width="300" height="300" alt="flipLightBox Image 1" />
				<!-- <span><b>LightBox</b> Text to accompany first lightbox image</span> -->
			</a>
		</div>
		<div class="room-inline room-pad">
			<a href="{{url('public/images/gallery/room/3.jpg')}}" class="flipLightBox ">
				<img src="{{url('public/images/gallery/room/3.jpg')}}" class="room-img img-responsive"  width="300" height="300" alt="flipLightBox Image 2" />
				<!-- <span><b>LightBox Image 2</b><br />Text to accompany 2nd lightbox image</span> -->
			</a>
		</div>
	</div>



<!-- <div class="container margin-all margin-bottom-all room-pad">
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
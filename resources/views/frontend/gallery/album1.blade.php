@extends('frontend.home-master')
@foreach($g as $g)
@section('title',$g->title)
@section('description',$g->sdes)
@section('keywords',$g->keywords)
@endforeach
@section('content')


<div class="container" style="text-align: center;">
		@foreach($images as $i)
		<div class="room-inline room-pad">
			<a href="{{url('public/images/gallery/restaurant/1.jpg')}}" class="flipLightBox ">
				  <img src="{{url('/imageupload/'.$i->image)}}"> class="room-img img-responsive" width="300" height="300" alt="flipLightBox Image 1" />
				<!-- <span><b>LightBox</b> Text to accompany first lightbox image</span> -->
			</a>
		</div>
		@endforeach

		
		
		
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

</div>
 -->

@endsection
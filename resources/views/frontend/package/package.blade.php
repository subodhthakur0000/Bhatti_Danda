@extends('frontend.home-master')
@section('title',$seo->title)
@section('description',$seo->description)
@section('keywords',$seo->keywords)


@section('content')

<div class="container-fluid mayaimage packageimg">
	<img src="{{url('public/images/bhattidandaimages/packages.png')}}" class="img-responsive " alt="Phool Maya">
</div>

<div class="container-fluid abt-pad">
	<div class="col-md-4 span-brdr">
		<span></span>
	</div>
	<div class="col-md-4 text-center">
		<h1 class="capitalize">Our Package</h1> 
	</div>
	<div class="col-md-4 span-brdr">
		<span></span>
	</div>
</div>

<div class="container-fluid package-down">
	@foreach($package as $pak)
	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 text-center package-down-1">
		<div class="thumbnail thumbnail-width">
			<img src="{{url('/imageupload/'.$pak->image)}}" class="img-responsive" alt="Lights" style="width:100%">
			<h3 class="text-center">{{$pak->name}}</h3>
			<hr>
			<ul class="room-ul">
				 {!!$pak->package!!}
			</ul>

			
		</div>
		<a href="{{url('booking',$pak->slug)}}"><button type="button" class="btn btn-warning btn-maya">Book</button></a>
	</div>
	@endforeach
	
	

	
</div>

@endsection
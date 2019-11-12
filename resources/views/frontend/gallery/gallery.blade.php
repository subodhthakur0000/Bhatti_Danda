@extends('frontend.home-master')
@section('title',$seo->title)
@section('description',$seo->description)
@section('keywords',$seo->keywords)
@section('content')

<div class="container-fluid abt-pad">
	<div class="col-md-4 span-brdr">
		<span></span>
	</div>
	<div class="col-md-4 text-center">
		<h1 class="capitalize">Gallery</h1> 
	</div>
	<div class="col-md-4 span-brdr">
		<span></span>
	</div>
</div>

 <div class="container margin-bottom-all">
 	@foreach($gallery as $gal)
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 product_item">
 		<div class="zoom-out-effect left">
 			<div class="img-box center-block gallery-cov">
 				<a href="{{route('album1',$gal->id)}}"><img src="{{url('/imageupload/'.$gal->image)}}" class="img-responsive" alt="{{$gal->altimage}}"></a>
 			</div>
 		</div>
 		<h3 class="why-bhattidanda text-center">{{$gal->name}}</h3>
 	</div>
 	@endforeach

 
 	
 </div>

@endsection
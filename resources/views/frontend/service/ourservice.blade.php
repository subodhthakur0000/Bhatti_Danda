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
		<h1 class="capitalize">Our Services</h1> 
	</div>
	<div class="col-md-4 span-brdr">
		<span></span>
	</div>
</div>

<div class="container-fluid margin-bottom-all">
	<div class="container">
		@foreach($service as $s)
		<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
			<div class="thumbnail text-center thumbnail-height">
				<img src="{{url('/imageupload/'.$s->image)}}" class="img-responsive" alt="service1.JPG" style="width: 2000px;" >
				<h2>{{$s->name}}</h2>
				<p>{!!$s->service!!}</p>
			</div>
		</div>
		@endforeach
		
		

	</div>
</div>

@endsection
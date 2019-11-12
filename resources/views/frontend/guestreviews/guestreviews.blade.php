@extends('frontend.home-master')
@section('title',$seo->title)
@section('description',$seo->description)
@section('keywords',$seo->keywords)
@section('content')

<div class="container-fluid">
	<div class="container">
	
		@foreach($review as $rev)
		<div class="col-md-3" style="margin-top: 20px;">
			<div class="thumbnail text-center">
				<h2>{{$rev->name}}</h2>
				<h4><em style="padding-bottom: 10px;border-bottom: 1px solid #ddd;">{{$rev->address}}</em></h4>
				<p style="text-align: justify;padding: 10px;">{!!$rev->summary!!}</p>
				<div>

				</div>
			</div>
		</div>
		@endforeach
		
		
	</div>
</div>

@endsection
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
		<h1 class="capitalize">Contacts</h1> 
	</div>
	<div class="col-md-4 span-brdr">
		<span></span>
	</div>
</div>

<div class="container-fluid  contact-link">
	<div class="col-md-4 text-center">
		<div><i class="fa fa-phone fa-2x" aria-hidden="true"></i></div>
		<a href="telto:9841427881">9841427881</a><br>
		<a href="telto:011-490411">011-490411</a>
	</div>

	<div class="col-md-4 text-center">
		<div><i class="fa fa-map-marker fa-2x" aria-hidden="true"></i></div>
		<a href="#"> Bhattidanda,Kavre<br>
     Kathmandu,Nepal</a>
	</div>

	<div class="col-md-4 text-center">
		<div><i class="fa fa-envelope fa-2x" aria-hidden="true"></i></div>
		<a href="mailto:bhattidandastay@gmail.com">bhattidandastay@gmail.com</a>
	</div>
</div>

<div class="container-fluid abt-pad">
	<div class="col-md-4 span-brdr">
		<span></span>
	</div>
	<div class="col-md-4 text-center">
		<h1 class="capitalize">Message Us</h1> 
	</div>
	<div class="col-md-4 span-brdr">
		<span></span>
	</div>
</div>

<div class="container book-page-margin">
	<div class=" col-md-offset-3 col-md-6">
		<div id="booking">
			<div class="panel panel-default book-form">
				<div class="panel-body text-center">
					<form class="text-center form-book" method="POST" action="{{url('storecontact')}}">
						{{csrf_field()}}
						<div class="book-form">
							<input type="text" class="form-control" id="user-name" name="name" placeholder="Name" required="" >
						</div>

						<div class="book-form">
							<input type="email" class="form-control" id="user-email" name="email" placeholder="Email" required="">
						</div>

						<div class="book-form">
							<textarea name="message" class="form-control" id="user-message" placeholder="Message" cols="20" rows="7"required=""></textarea>
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
@endsection
<?php

function current_page($uri='home'){
 return request ()-> path()==$uri;

}
?>

<!-- <nav class="navbar header-center header-nav navbar-fixed-top" id="my-navbar">
  <div class="container">
  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button> 
    </div>

    <div class="collapse navbar-collapse" id="navbar-collapse">

      <ul class="nav navbar-nav navbar-center">
       <li class="{{current_page('home')?'active':''}}"><a href="{{url('home')}}" class="active">home</a></li>
       <li class="{{current_page('about')?'active':''}}"><a href="{{url('about')}}">know about phool maya</a></li>
       <li class="{{current_page('service')?'active':''}}"><a href="{{url('service')}}">ourservices</a></li>
       <li class="{{current_page('package')?'active':''}}"><a href="{{url('portfolio')}}">packages</a></li>
       <li class="{{current_page('gallery')?'active':''}}"><a href="{{url('pricing')}}">gallery</a></li>
       <li class="{{current_page('blog')?'active':''}}"><a href="{{url('booking')}}">booking</a></li>
       <li class="{{current_page('restaurant')?'active':''}}"><a href="{{url('room')}}">Restaurant</a></li>
       <li class="{{current_page('element')?'active':''}}"><a href="{{url('room')}}">rooms</a></li>
       <li class="{{current_page('contact')?'active':''}}"><a href="{{url('contact')}}">contact us</a></li>
     </ul>
   </div>
 </div>
</nav> -->



<nav class="navbar navbar-default capitalize header-nav navbar-fixed-top">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand hidden-md hidden-lg" href="{{url('home')}}">Bhattidanda Homestay</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="padding: 0 55px;">
      <ul class="nav navbar-nav">
        <li class="{{current_page('home')?'active':''}}"><a href="{{url('home')}}">home <span class="sr-only">(current)</span></a></li>
        <li class="{{current_page('know-about-phool-maya')?'active':''}}"><a href="{{url('know-about-phool-maya')}}">know about phool maya</a></li>
        <li class="{{current_page('ourservice')?'active':''}}"><a href="{{url('ourservice')}}">Our service</a></li>
        <li class="{{current_page('package')?'active':''}}"><a href="{{url('package')}}">package</a></li>
        <li class="{{current_page('gallery')?'active':''}}"><a href="{{url('gallery')}}">gallery</a></li>
        <li class="{{current_page('booking')?'active':''}}"><a href="{{url('package')}}">booking</a></li>
        <!-- <li class="{{current_page('room')?'active':''}}"><a href="{{url('room')}}">room</a></li> -->
        <li class="{{current_page('guestreviews')?'active':''}}"><a href="{{url('guestreviews')}}">Guest Reviews</a></li>
        <li class="{{current_page('contact')?'active':''}}"><a href="{{url('contact')}}">contact</a></li>
        <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="
          <li class="{{current_page('home')?'active':''}}"><a href="{{url('home')}}">know about phool maya</a></li>
          <li class="{{current_page('home')?'active':''}}"><a href="{{url('home')}}">know about phool maya</a></li>
          <li class="{{current_page('home')?'active':''}}"><a href="{{url('home')}}">know about phool maya</a></li>false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li> -->
      </ul>
      <!-- <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form> -->
      <!-- <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul> -->
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid">
  <a href="https://www.tripadvisor.com/Hotel_Review-g317113-d4091676-Reviews-Bhattidanda_Fresh_Natural_Homestay-Dhulikhel_Bagmati_Zone_Central_Region.html" target="_blank"><img class="img-responsive trip-logo" src="{{url('public/images/trip.png')}}" width="100"></a> 
</div>
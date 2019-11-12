<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>@yield('title','BhattiDandaStay')</title>
   <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="{{url('public/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('public/css/style.css')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('public/fonts/glyphicons-halflings-regular.ttf')}}">
    <link rel="stylesheet" type="text/css" href="{{url('public/css/owl.carousel.css')}}">

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    
    @include('frontend.header.header')
    
    @include('frontend.header.subheader')

    @yield('content')

    @include('frontend.footer.footer')
</body>

<script type="text/javascript" src="{{url('public/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{url('public/js/js.js')}}"></script>
<script type="text/javascript" src="{{url('public/js/fliplightbox.min.js')}}"></script>
<script type="text/javascript">$('body').flipLightBox()</script>

</html>

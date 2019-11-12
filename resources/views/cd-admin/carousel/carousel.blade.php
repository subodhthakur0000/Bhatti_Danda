@extends('cd-admin.home-master')

@section('page-title')  
View Carousel
@endsection

@section('content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->

	 <section class="content-header">
  <h1>
   Carousel
    
  </h1>
  
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Gallery</a></li>
    <li class="active">View Album</li>
  </ol>
</section>


<section class="content" style="padding: 40px;">
	<div class="row">
    <div>
        <a href="{{url('/addcarousel')}}"><button class="btn btn-success" style="margin-bottom: 10px; ">Add Carousel</button></a>
   
   </div>
   @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible">
          <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Data Inserted Successfully</strong>
          {{Session::get("message", '')}}
        </div>
        @elseif(Session::has('deletesuccess'))
        <div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Data Deleted Successfully</strong>
          {{Session::get("message", '')}}
        </div>
        @endif
       @foreach($car as $car)
		<div class="container">
      <div style="height: 85px;">
       <form action="{{url('/statuscar/'.$car->id)}}" method="POST" class="pull-left">
                      {{csrf_field()}}
                    <div class="btn-group">

                 @if($car->status == 'active')
                 <button type="button" class="btn btn-success">Active</button>
                 @else
                  <button type="button" class="btn btn-danger">Inactive</button>
                  @endif
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  @if($car->status == 'active')
                  <div class="dropdown-menu" role="menu" style="min-width: 0px;">
                    <li> <button class="btn btn-danger" type="submit">Inactive</button>
                    </li>
                  </div>
                  @else
                  <div class="dropdown-menu" role="menu" style="min-width: 0px;">
                    <li> <button class="btn btn-success" type="submit">Active</button>
                    </li>
                     </div>
                     @endif
                </div>
              </form>
            </div>
    
      
		<img src="{{url('/imageupload/'.$car->image)}}" alt="">
			<div style="margin-top: 20px;">
		<button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$car->id}}"><i class="fa fa-trash">
     </i></button>
    <button class="btn btn-dafault pull-right" data-toggle="modal" data-target="#exampleModalLong{{$car->id}}"><i class="fa fa-eye"></i>
    </button>
     </div>

</div>
@endforeach




	

</section>
</div>
<style type="text/css">

.container{
width: calc(33% - 6px);
overflow:hidden;
height: fit-content;
margin:3px;
padding: 0;
display:block;
position:relative;
float:left;
border: solid;
border-color: aliceblue;
}
img{
height:250px;
transition-duration: .3s;
max-width: 100%;
display:block;
overflow:hidden;
cursor:pointer;
}
@media only screen and (max-width: 900px) {
.container {
    width: calc(50% - 6px);
}
}
@media only screen and (max-width: 400px) {
.container {
    width: 100%;
}
}
</style>




<?php $er = App\Carousel::all();?>
@foreach($er as $ser)
<div class="modal modal-danger fade" id="modal-danger{{$ser->id}}">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Message from web</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to delete ?&hellip;</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
            <a href="{{url('deletecar/'.$ser->id)}}"><button type="button" class="btn btn-outline">Yes</button></a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>


    <div class="modal fade" id="exampleModalLong{{$ser->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"><strong>Carousel Name :</strong>{{$ser->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
       <p> @if($ser->status=='active')
        <div class="btn btn-success">Active</div>
        @else
        <div class="btn btn-danger">Inactive</div>
        @endif
      </p>
      <p><center> <img src="{{url('/imageupload/'.$ser->image)}}" style="height:250px;"></p>
          </center></p>
      <p><strong>Description : </strong>{!!$ser->description!!}

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
     
      </div>
    </div>
  </div>
</div>

    @endforeach
@endsection
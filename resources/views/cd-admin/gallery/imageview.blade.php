@extends('cd-admin.home-master')

@section('page-title')  
Image View
@endsection

@section('content')

<div class="content-wrapper">
<!-- Content Header (Page header) -->

	 <section class="content-header">
  <h1 style="padding-left: 10px;">
 
  
 
    
  </h1>
  
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Gallery</a></li>
    <li class="active">View Image</li>
  </ol>
</section>


<section class="content" style="padding: 40px;">
	<div class="row">
    <div style="padding-left: 3px;">
    
    <a href="{{url('/addimage/'.$album_id)}}"><button class="btn btn-success" style="margin-bottom: 10px; ">Add Image</button></a>
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

        @foreach($im as $g)

		<div class="container">
       <div style="height: 85px;">
        <form action="{{url('/isupdate/'.$g->id)}}" method="POST">
                      {{csrf_field()}}
                    <div class="btn-group">

                 @if($g->status == 'active')
                 <button type="button" class="btn btn-success">Active</button>
                 @else
                  <button type="button" class="btn btn-danger">Inactive</button>
                  @endif
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  @if($g->status == 'active')
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
	  <img src="{{url('/imageupload/'.$g->image)}}">

			<div>
		<button class="btn btn-danger"  data-toggle="modal" data-target="#modal-danger{{$g->id}}"><i class="fa fa-trash"></i></button>
		
    
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
width: 350px;
height: 350px;
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



<?php $e = App\Image::all();?>
@foreach($e as $i)
<div class="modal modal-danger fade" id="modal-danger{{$i->id}}">
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
            <a href="{{url('/deleteimage/'.$i->id)}}">  <button type="button" class="btn btn-outline">Yes</button></a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    @endforeach
@endsection
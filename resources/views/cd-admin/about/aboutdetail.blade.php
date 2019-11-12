@extends('cd-admin.home-master')
@section('page-title')  
About Details
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="container-fluid">
  
  <section class="content-header">
    <h1>
      About
    </h1>
   <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">About</a></li>
        <li class="active">View About</li>
      </ol>
  </section>
  @if(Session::has('updatesuccess'))
        <div class="alert alert-info alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Data Updated Successfully</strong>
          {{Session::get("message", '')}}
        </div>
        @endif

  <!-- Main content -->
    <section class="content">
   <button class="btn btn-info" data-toggle="modal" data-target="#myModal" ><i class="fa fa-edit">
                    </i></button></a>
       <div class="row">

        <div class="col-md-12">
        <img src="{{url('imageupload/'.$about->image)}}" alt="" height="300px">
        <h4><strong>
          Name : </strong>{{$about->name}}</h4>
        <h4><strong>
          Tagline : </strong>{{$about->tagline}}</h4>
        </div>

      </div>

      <div class="row">
        <div class="col-md-12">
          <p><h3><strong>Description :</strong></h3>
            {!!$about->description!!}</p>
          <a href="{{url('fileupload/'.$about->file)}}"><button type="button" class="btn btn-success "><i class="fa fa-file-pdf-o" aria-hidden="true"></i>PDF FILE</button></a>
          <a href="{{$about->video}}"><button type="button" class="btn btn-primary pull-right "><i class="fa-video-camera" aria-hidden="true"></i>Video</button></a>
        </div>


      </div>
  </section>
  
  </div>
</div>




<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <div class="box box-primary">  
              <form role="form" method="post" action="{{url('/aboutupdate')}}" enctype="multipart/form-data">
             {{csrf_field()}}
                <div class="box-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name"  value="{{$about->name}}">
                  </div>
                  <div class="form-group">
                    <label for="name">Tagline</label>
                    <input type="text" class="form-control" name="tagline" value="{{$about->tagline}}">
                  </div>
                  
                  <div class="form-group">
                    <label for="name">Image</label>
                    <input type="file" class="form-control" name="image" >
                  </div>
                  <div class="form-group">
                    <label for="altimage">Alt Image</label>
                    <input type="text" class="form-control"  name="altimage" value="{{$about->altimage}}" >
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" style="height=100px;" id="summernote">{!! $about->description!!}</textarea>
                  </div>
                
                  <div class="form-group">
                    <label for="pdf">Pdf</label>
                    <input type="file" class="form-control" name="pdf">
                  </div>
                  <div class="form-group">
                    <label for="video">Video link</label>
                    <input type="text" class="form-control" name="video" value="{{$about->video}}">
                  </div>

                </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>

                </div>
              </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
       
@endsection
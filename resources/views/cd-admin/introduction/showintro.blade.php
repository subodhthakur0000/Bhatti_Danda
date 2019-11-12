@extends('cd-admin.home-master')
@section('page-title')  
Introduction Details
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="container-fluid">
  
  <section class="content-header">
    <h1>
      Introduction
    </h1>
   <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Introduction</a></li>
        <li class="active">View Introduction</li>
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
          <p><h3><strong>Description :</strong></h3>
            {!!$intro->description!!}</p>
          

        
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
             <form role="form" method="post" action="introupdate" enctype="multipart/form-data">
             {{csrf_field()}}
                <div class="box-body">
                  
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" style="height=100px;" id="summernote">{!!$intro->description!!}</textarea>
                        
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
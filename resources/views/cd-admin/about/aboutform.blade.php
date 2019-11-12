@extends('cd-admin.home-master')

@section('page-title')  
About Form
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
  ADD ABOUT
  </h1>
   
     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">About</a></li>
        <li class="active">Add About</li>
      </ol>
    </section>


<section class="content">
      <div class="row">
        
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary" style="margin-top: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title">Add About</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{url('aboutstore')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="box-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <div class="text text-danger">{{$errors->first('name')}}</div>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{old('name')}}">
                    
                  </div>
                  <div class="form-group">
                    <label for="name">Tagline</label>
                    <div class="text text-danger">{{$errors->first('tagline')}}</div>
                    <input type="text" class="form-control" name="tagline" id="name"  placeholder="Enter Tagline for name" value="{{old('tagline')}}">
                    
                  </div>
                  
                  <div class="form-group">
                    <label for="name">Image</label>
                    <div class="text text-danger">{{$errors->first('image')}}</div>
                    <input type="file" class="form-control" name="image" id="image">
                    
                  </div>

                  <div class="form-group">
                     <label for="altimage">Alternative Image Text</label>
                     <div class="text text-danger">{{$errors->first('altimage')}}</div>
                    <input type="text" class="form-control" name="altimage" value="{{old('altimage')}}" id="altimage" placeholder="Enter image alternative text">
                    
                  </div>
                  <div class="form-group">

                    <label for="description">Description</label>
                    <div class="text text-danger">{{$errors->first('description')}}</div>
                    <textarea name="description" class="form-control" id="summernote" ></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="pdf">Pdf</label>
                    <div class="text text-danger">{{$errors->first('pdf')}}</div>
                    <input type="file" class="form-control"  name="pdf" id="pdf">
                  </div>
                  <div class="form-group">
                    <label for="video">Video link</label>
                    <div class="text text-danger">{{$errors->first('video')}}</div>
                    <input type="url" class="form-control" name="video" id="video" value="{{old('video')}}">
                  </div>

                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Add</button>

                </div>
              </form>
          </div>
          <!-- /.box -->
      </div>
      
  </div>
</section>



</div>
       
@endsection
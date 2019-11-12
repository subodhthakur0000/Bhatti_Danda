@extends('cd-admin.home-master')
@section('page-title')
Add Gallery
@endsection
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <section class="content-header">
      <h1>
      Add Gallery
      </h1>
      <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Gallery</a></li>
      <li class="active">Add Gallery</li>
    </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <!-- <a href=""><button class="btn btn-primary pull-right">Add Image</button></a> -->
              <h3 class="box-title">Add Gallery </h3>
            </div>
            <form role="form" action="{{url('gallerystore')}}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Album Name</label>
                   <div class="text text-danger">{{$errors->first('name')}}</div>
                  <input type="text" name="name" value="{{old('name')}}" class="form-control" id="name" placeholder="Enter album name">
                </div>
                <div class="form-group">
                  <label for="image">Album Image</label>
                   <div class="text text-danger">{{$errors->first('image')}}</div>
                  <input type="file" name="image" >
                </div>
                <div class="form-group">
                  
                    <label for="altimage">Alternative Image Text</label>
                    <div class="text text-danger">{{$errors->first('altimage')}}</div>
                    <input type="text" name="altimage" value="{{old('altimage')}}" class="form-control" id="altimage" placeholder="Enter Alternative Image Text For Album">
                  </div>

                  <div class="form-group">
                     <label for="name">Status</label>
                          <div class="text text-danger">{{$errors->first('status')}}</div>
              <label>
                <input type="radio" class="minimal" name="status" value="active" <?php echo old('status')=='active' ? 'checked' : ' '  ?> >
                Active
              </label>
              <label>
                <input type="radio" class="minimal" name="status" value="inactive" <?php echo old('status')=='inactive' ? 'checked' : ' '  ?>>
                Inactive
              </label>
            </div>

                  <div class="form-group">
                  <label for="name">SEO Title</label>
                   <div class="text text-danger">{{$errors->first('title')}}</div>
                  <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="Enter SEOTitle">
                </div>


                <div class="form-group">
                  <label for="name">SEO Keywords</label>
                   <div class="text text-danger">{{$errors->first('keywords')}}</div>
                  <input type="text" name="keywords" value="{{old('keywords')}}" class="form-control" placeholder="Enter SEO Keywords">
                </div>
                
                <div class="form-group">
                  
                    <label for="altimage">SEO Description</label>
                    <div class="text text-danger">{{$errors->first('sdes')}}</div>
                    <input type="text" name="sdes" value="{{old('sdes')}}" class="form-control" placeholder="Enter SEO Description">
                  </div>



                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Add Gallery</button>
                </div>
              </div>  
            </form>
            <div class="col-md-4"></div>  
            <div class="box-title">
              <a href="{{ URL()->previous() }}"><button class="btn btn-danger" style="margin-left: 10px;">Cancel</button></a>
            </div>
            <div class="col-md-4"></div>
          </div>
        </div>
      </div>
        
    </section>
  </div>
  </div>
@endsection
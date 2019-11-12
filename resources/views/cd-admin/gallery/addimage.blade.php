@extends('cd-admin.home-master')
@section('page-title')
Add Image
@endsection
@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <section class="content-header">
      <h1>
      Add Image
      </h1>
      <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Gallery</a></li>
      <li class="active">Add Image</li>
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
              <h3 class="box-title">Add Image </h3>
            </div>
            <form role="form" action="{{url('imagestore',$g->id)}}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}


              <div class="box-body">
                <div class="form-group">
                  <strong>Album:</strong> {{$g->name}}
                  <input type="hidden" name="gallery_id" value="{{$g->id}}">
                  
                      
                  

                 </div>
                <div class="form-group">
                  <label for="image"> Image</label>
                   <div class="text text-danger">{{$errors->first('image')}}</div>
                  <input type="file" name="image" >
                </div>
                <div class="form-group">
                  
                    <label for="altimage">Alternative Image Text</label>
                    <div class="text text-danger">{{$errors->first('altimage')}}</div>
                    <input type="text" name="altimage" value="{{old('altimage')}}" class="form-control" id="altimage" placeholder="Enter Alternative Image Text For Album">
                  </div>

                  <div class="form-group">

              <label>
                <input type="radio" class="minimal" name="status" value="active" <?php echo old('status')=='active' ? 'checked' : ' '  ?> >
                Active
              </label>
              <label>
                <input type="radio" name="status" class="minimal" value="inactive" <?php echo old('status')=='inactive' ? 'checked' : ' '  ?>>
                Inactive
              </label>
            </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Add Image</button>
                </div>
              </div>  
            </form>
            <div class="box-footer">
              <a href="{{ URL()->previous() }}"><button class="btn btn-danger" style="margin-left: 10px;">Cancel</button></a>
            </div>
          </div>
        </div>
      </div>
        
    </section>
  </div>
  </div>
@endsection
@extends('cd-admin.home-master')

@section('page-title')  
Add Carousel
@endsection

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Add Careousel</h1>
  
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Carousel</a></li>
      <li class="active">Add Carousel</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      
        
      
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary" style="margin-top: 20px">
          <div class="box-header with-border">
            <h3 class="box-title">Add Carousel</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" method="post" action= "{{url('storecarousel')}}" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="box-body">
              <div class="form-group">
                <label for="name">Carousel Name</label>
                <div class="text text-danger">{{$errors->first('name')}}</div>
                <input type="text" class="form-control" name="name"  id="name" placeholder="Enter Carousel Name" value="{{Request::old('name')}}">
              
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Image for Carousel</label>
                <div class="text text-danger">{{$errors->first('image')}}</div>
                <input type="file" class="form-control" name="image" id="image" placeholder="Choose Image" value="{{Request::old('image')}}">
            </div>
            <div class="form-group">
                <label for="imgalt">Alternative Image Text </label>
                <div class="text text-danger">{{$errors->first('alt')}}</div>
                <input type="text" class="form-control" name="alt" id="alt" placeholder="Alternative Image Text" value="{{Request::old('alt')}}">
            </div>
            <div class="form-group">
                <label for="name">Description</label>
                <div class="text text-danger">{{$errors->first('description')}}</div>
                 <textarea name="description" id="summernote" rows="20" cols="80">
                    
                  </textarea>
              
              </div>
                 
       <div class="form-group">
        <p>Status</p>
        <div class="text text-danger">{{$errors->first('status')}}</div>
                <label>
                  <input type="radio" name="status" class="minimal" value="active">Active
                </label>
                <label>
                  <input type="radio" name="status" class="minimal" value="inactive">Deactive
                </label>
                
              </div>
             

            

            

            <div class="box-footer" >
              <button type="submit" class="btn btn-info">Add Carousel</button>
              
             </div>
             </div>

	</form>
  <div class="box-footer" style="margin-left: 10px;">
    <a href="{{URL()->previous()}}"><button type="submit" class="btn btn-danger">Cancel</button></a>
          </div>
          </div>
        </div>
        
        <!-- /.box -->
    </div>

</section>
</div>


@endsection

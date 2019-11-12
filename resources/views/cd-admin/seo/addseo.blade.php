@extends('cd-admin.home-master')

@section('page-title')  
Add SEO
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
       <h1>ADD SEO</h1>
     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">SEO</a></li>
        <li class="active">ADD SEO</li>
      </ol>
    </section>


<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary" style="margin-top: 20px">
            <div class="box-header with-border">
            <h3 class="box-title">Add SEO </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             <form action= "{{url('seostore')}}"  method="post">
              {{csrf_field()}}
              <div class="box-body">
                 <div class="form-group">
                  
                  <label for="name">Choose Title Page </label>
                  <div class="text text-danger">{{$errors->first('name')}}</div>
                  <select class="form-control" name="name" value="{{old('name')}}">
                    
                    <option value="Home">Home</option>
                    <option value="About">About</option>
                    <option value="Service">Service</option>
                    <option value="Package">Package</option>
                    <option value="Review">Review</option>
                    <option value="Gallery">Gallery</option>
                    <option value="Contact">Contact</option>
                    <option value="Booking">Booking</option>

                  </select>
                  
                  
                
                </div>
                <div class="form-group">
                  <label for="name">SEO Title</label>
                  <div class="text text-danger">{{$errors->first('title')}}</div>
                  <input type="text" class="form-control" name="title"  id="stitle"value="{{old('title')}}" placeholder="Enter SEO Title">
                
                </div>
                <div class="form-group">
                  <label for="name">SEO Keywords</label>
                  <div class="text text-danger">{{$errors->first('keywords')}}</div>
                  <input type="text" class="form-control" name="keywords"  id="skey"value="{{old('keywords')}}" placeholder="Enter SEO Keywords">
                
                </div>
              <div class="form-group">
                  <label for="name">SEO Description</label>
                  <div class="text text-danger">{{$errors->first('description')}}</div>
                  <textarea class="form-control" name="description"  id="des" placeholder="Enter SEO Description" value="{{old('description')}}">
                </textarea>
                </div>
             

               

              </div>
              <div class="box-footer" >
                <button type="submit" class="btn btn-info pull-right">Submit</button>
                
               </div>

    
            </form>
          </div>
          <!-- /.box -->
      </div>
  </div>
</section>



</div>
       
@endsection
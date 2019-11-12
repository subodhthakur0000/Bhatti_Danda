@extends('cd-admin.home-master')

@section('page-title')  
Add Review
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
  ADD REVIEW
  </h1>
   
     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Review</a></li>
        <li class="active">Add Review</li>
      </ol>
    </section>


<section class="content">
      <div class="row">
        
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary" style="margin-top: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title">Add Review</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="post" action="{{url('storereview')}}" >
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="name"> Name</label>
                  <div class="text text-danger">{{$errors->first('name')}}</div>
                  <input type="text" class="form-control" name="name"  id="name" placeholder="Enter Name" value="{{old('name')}}">
                
                </div>
                <div class="form-group">
                  <label for="name"> Address</label>
                  <div class="text text-danger">{{$errors->first('address')}}</div>
                  <input type="text" class="form-control" name="address"  id="address" placeholder="Enter Address" value="{{old('address')}}">
                
                </div>
                <div class="form-group">
                    <label for="text">Message</label>
                    <div class="text text-danger">{{$errors->first('summary')}}</div>
                  <textarea name="summary" class="form-control" value="{{old('summary')}}"></textarea>
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
       
    
       

              </div>
              <div class="box-footer" >
                <button type="submit" class="btn btn-info pull-right">Save</button>
               </div>

    
            </form>
            <div class="box-footer" style="margin-left: 10px;">
            <a href="{{URL()->previous()}}"><button type="submit" class="btn btn-danger">Cancel</button></a>
            </div>
          </div>
          <!-- /.box -->
      </div>
      
  </div>
</section>



</div>
       
@endsection
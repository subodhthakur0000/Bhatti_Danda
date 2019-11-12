@extends('cd-admin.home-master')

@section('page-title')  
IntroductionForm
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
  ADD INTRODUCTION
  </h1>
   
     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Introductio</a></li>
        <li class="active">Add Introduction</li>
      </ol>
    </section>


<section class="content">
      <div class="row">
        
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary" style="margin-top: 20px;">
            <div class="box-header with-border">
              <h3 class="box-title">Add Introduction</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{url('introstore')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="box-body">
                  
                  <div class="form-group">

                    <label for="description">Description</label>
                    <div class="text text-danger">{{$errors->first('description')}}</div>
                    <textarea name="description" class="form-control" id="summernote" ></textarea>
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
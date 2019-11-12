@extends('cd-admin.home-master')

@section('page-title')  
Edit Services
@endsection

@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
  Edit Services
  </h1>   

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Services</a></li>
        <li class="active">Edit Services</li>
      </ol>
    </section>


<section class="content">
      <div class="row">
      
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary" style="margin-top: 20px">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Service</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form role="form" action= "{{url('/update/'.$ser['id'])}}" enctype="multipart/form-data" method="post">
               {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Service Name</label>
                  <input type="text" class="form-control" name="name"  id="name" value="{{$ser['name']  }}">
                
                </div>
                <div class="form-group">
                    <label for="text">Service Details</label>
                  <textarea name="service" id="summernote" rows="20" cols="80"> {!!$ser['service']!!}
                    
                  </textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" class="form-control" name="image" id="image" placeholder="Choose Image">
              </div>
              <div class="form-group">
                  <label for="imgalt">Image Alt</label>
                  <input type="text" class="form-control" name="imagealt" id="imagealt" value="{{$ser['imagealt']}}">
              </div>

             

               
       <div class="form-group">
        <p>Status</p>
             
                <label>
                  <input type="radio" class="minimal" <?php echo $ser['status'] == 'active' ? 'checked' :  '' ?> checked name="status" value="active">Available

                </label><br>
                <label>
                  <input type="radio"  class="minimal"  <?php echo $ser['status'] == 'inactive' ? 'checked' :  '' ?> name="status" value="inactive">Not Available
                </label>
        
              </div>
       
              
              <div class="box-footer" >
                <button type="submit" class="btn btn-info pull-right">Update</button>
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
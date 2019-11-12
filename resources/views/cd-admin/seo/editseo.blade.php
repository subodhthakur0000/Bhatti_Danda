@extends('cd-admin.home-master')

@section('page-title')  
Edit seo
@endsection

@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
  Edit SEO
  </h1>   

      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">SEO</a></li>
        <li class="active">Edit SEO</li>
      </ol>
    </section>


<section class="content">
      <div class="row">
      
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary" style="margin-top: 20px">
            <div class="box-header with-border">
              <h3 class="box-title">Edit SEO</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form role="form" action= "{{url('/updateseo/'.$ser['id'])}}" method="post">
               
             {{csrf_field()}}
              <div class="box-body">
                 <div class="form-group">
                  
                  <label for="name">Choose </label>
                  <div class="text text-danger">{{$errors->first('name')}}</div>
                  <input type="text" class="form-control" name="name"  id="name" placeholder="Enter SEO Title" value="{{$ser['name']}}">
                  
                
                </div>
                <div class="form-group">
                  <label for="name">SEO Title</label>
                  <div class="text text-danger">{{$errors->first('title')}}</div>
                  <input type="text" class="form-control" name="title"  id="stitle"value="{{$ser['title'] }}" placeholder="Enter SEO Title">
                
                </div>
                <div class="form-group">
                  <label for="name">SEO Keywords</label>
                  <div class="text text-danger">{{$errors->first('keywords')}}</div>
                  <input type="text" class="form-control" name="keywords"  id="skey"value="{{$ser['keywords'] }}" placeholder="Enter SEO Keywords">
                
                </div>
              <div class="form-group">
                  <label for="name">SEO Description</label>
                  <div class="text text-danger">{{$errors->first('description')}}</div>
                  <textarea class="form-control" name="description"  id="des" placeholder="Enter SEO Description" >{{$ser['description']}}
                </textarea>
                </div>
             

               

              </div>
              <div class="box-footer" >
                <button type="submit" class="btn btn-info pull-right">Submit</button>
                
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
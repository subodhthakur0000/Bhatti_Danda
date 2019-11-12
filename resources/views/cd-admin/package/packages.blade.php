@extends('cd-admin.home-master')

@section('page-title')  
View Packages
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Package List
        
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Packages</a></li>
        <li class="active">View Packages</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                 <a href="{{url('/addpackages')}}"><button class="btn btn-success" style="margin-bottom: 10px; ">Add Package</button></a>
              </h3>
              @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible">
          <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Data Inserted Successfully</strong>
          {{Session::get("message", '')}}
        </div>
        @elseif(Session::has('updatesuccess'))
        <div class="alert alert-info alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Data Updated Successfully</strong>
          {{Session::get("message", '')}}
        </div>
        @elseif(Session::has('deletesuccess'))
        <div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Data Deleted Successfully</strong>
          {{Session::get("message", '')}}
        </div>
        @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="example1" class="table table-bordered table-striped">
                <thead>

                <tr>
                  <th>SN</th>
                  <th>Name</th>
                   <th>Status</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                @foreach($pak as $pa)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$pa->name}}</td>
                  <td height="75px">
                     <form action="{{url('/status/'.$pa->id)}}" method="POST">
                      {{csrf_field()}}
                    <div class="btn-group">

                 @if($pa->status == 'active')
                 <button type="button" class="btn btn-success">Available</button>
                 @else
                  <button type="button" class="btn btn-danger">Not Available</button>
                  @endif
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  @if($pa->status == 'active')
                  <div class="dropdown-menu" role="menu" style="min-width: 0px;">
                    <li> <button class="btn btn-danger" type="submit">Not Available</button>
                    </li>
                  </div>
                  @else
                  <div class="dropdown-menu" role="menu" style="min-width: 0px;">
                    <li> <button class="btn btn-success" type="submit">Available</button>
                    </li>
                     </div>
                     @endif
                </div>
              </form>
                     </td>
                  <td>
                    <button class="btn btn-info" data-toggle="modal" data-target="#edit{{$pa->id}}" ><i class="fa fa-edit">
                    </i></button></a>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$pa->id}}"><i class="fa fa-trash"> </i></button>
                   <button class="btn btn-success" data-toggle="modal" data-target="#view{{$pa->id}}"><i class="fa  fa-eye"> </i></button>
                 </td>
                </tr>
                @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>S.N</th>
                  <th>Name</th>
                  <th>Ststus</th>
                  <th>Action</th>
                  
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

  </div>


 
            
        

        <!--MODEL-->
<?php $e = App\Packages::all();?>

@foreach($e as $t)
<div class="modal fade" id="view{{$t->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle"><strong>{{$t->name}}</strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        @if($t->status=='active')
        <div class="btn btn-success">Available</div>

        @else
        <div class="btn btn-danger">Not Available</div>
        @endif
        <strong><h3 >Details :</h3></strong><p> {!!$t->package!!}</p> 
        <p> <img src="{{url('/imageupload/'.$t->image)}}" style="height: 500px; width:500px;"></p>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!--Delete-->

<div class="modal modal-danger fade" id="modal-danger{{$t->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Message from web</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete ?&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancel</button>
               <a href="{{url('/deletepackages/'.$t->id)}}"> <button type="button" class="btn btn-outline">Yes</button></a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


        <!--Edit-->
   
        <div class="modal fade" id="edit{{$t->id}}" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title" id="exampleModalLongTitle"><b>EDIT :</b>{{$t->name}}</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form role="form" action= "{{url('/updatepackage/'.$t->id)}}" enctype="multipart/form-data" method="post">
          {{csrf_field()}}
            
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Package Name</label>
                  <input type="text" class="form-control" name="name"  id="pname" value="{{$t->name}}">
                
                </div>
                <div class="form-group">
                    <label for="text">Package Details</label>
                  <textarea name="package" id="summernote{{$loop->iteration}}" rows="20" cols="80">{!!$t->package!!}
                    
                  </textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" class="form-control" name="image" id="image" >
              </div>
              <div class="form-group">
                  <label for="imgalt">Image Alt</label>
                  <input type="text" class="form-control" name="imagealt" id="imagealt" value="{{$t->imagealt}}">
              </div>

              
            <div class="form-group">
                <p>Status</p>
             
                 <label>
                  <input type="radio" class="minimal" <?php echo $pa->status == 'active' ? 'checked' :  '' ?> checked name="status" value="active">Available

                </label><br>
                <label>
                  <input type="radio"  class="minimal"  <?php echo $pa->status == 'inactive' ? 'checked' :  '' ?> name="status" value="inactive">Not Available
                </label>

        
              </div>
               <div class="modal-footer">
               <button type="submit" class="btn btn-primary">Update</button>
              </div>
         </div>
         </form>
         </div>
         </div>
         </div>
         </div>     



<style type="text/css">
  .p{
    width: 100px;
  }
</style>

 
@endforeach

@endsection
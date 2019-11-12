@extends('cd-admin.home-master')

@section('page-title')  
View Services
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Service List
        
      </h1>
     
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Services</a></li>
        <li class="active">View services</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
           <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                <a href="{{url('/addservice')}}"><button class="btn btn-success" style="margin-bottom: 15px;">ADD New Service</button></a>
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
                  <th>S.N</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                @foreach($ser as $ser)
                <tr>
                  
                  <td>{{$loop->iteration}} </td>
                  <td>{{$ser->name}}</td>
                  <td height="75px"> <form action="{{url('/statusup/'.$ser->id)}}" method="POST">
                      {{csrf_field()}}
                    <div class="btn-group">

                 @if($ser->status == 'active')
                 <button type="button" class="btn btn-success">Available</button>
                 @else
                  <button type="button" class="btn btn-danger">Not Available</button>
                  @endif
                  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <span class="caret"></span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  @if($ser->status == 'active')
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
                    <a href="{{url('/editservices/'.$ser->id)}}"><button class="btn btn-info"><i class="fa fa-edit"></i></button></a>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$ser->id}}"><i class="fa fa-trash"> </i></button>
                   <button class="btn btn-success" data-toggle="modal" data-target="#view{{$ser->id}}"><i class="fa  fa-eye"> </i></button>
                 </td>
                </tr>
                @endforeach
                
                </tbody>
                <tfoot>
                <tr>
                  <th>S.N</th>
                  <th>Name</th>
                  <th>Status</th>
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


 <style type="text/css">

  p.img{
    width: 100px;
  }
</style>
<?php $er = App\Service::all();
?>
@foreach($er as $ser)
<div class="modal fade" id="view{{$ser->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLongTitle"><strong>  {{$ser['name']}} </strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body creatuimg">
        <p> @if($ser->status=='active')
        <div class="btn btn-success">Available</div>
        @else
        <div class="btn btn-danger">Not Available</div>
        @endif
        </p> 
         <h3><strong> Details:</strong></h3><p>{!!$ser['service']!!}  </p>

        <p><h3><strong> Image :</strong></h3>
        <center> <img src="{{url('/imageupload/'.$ser->image)}}" style="height:250px;"></p>
          </center>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


<div class="modal modal-danger fade" id="modal-danger{{$ser->id}}">
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
               <a href="{{url('/delete/'.$ser['id'])}}"> <button type="button" class="btn btn-outline">Yes</button></a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>






 
@endforeach

@endsection
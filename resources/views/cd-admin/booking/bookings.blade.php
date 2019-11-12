@extends('cd-admin.home-master')

@section('page-title')  
Bookings
@endsection

@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mailbox
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Booking</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
        


          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Mails</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox</a>
                  
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>
                 @if(Session::has('deletesuccess'))
        <div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Data Deleted Successfully</strong>
          {{Session::get("message", '')}}
        </div>
        @endif
         
             
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
               
                
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                 
                  <tbody>
                    @foreach($c as $b)
                  <tr>
                    <td class="mailbox-star"><button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$b->id}}"><i class="fa fa-trash"> </i></button></td>
                    <td class="mailbox-star"><a data-toggle="modal" data-target="#view{{$b->id}}"><i class="fa fa-eye "></i></a></td>
                    <td class="mailbox-name">
                     <?php 
                     $test = App\BookingStatus::where('contact_id',$b->id)->get()->first();
                     ?>
                     @if($test['status']=='approved')
                     <div class="alert alert-success" style="padding: 2px; width: 70px;" >Approved</div>
                     @elseif($test['status']=='rejected')
                     <div class="alert alert-danger" style="padding: 2px; width: 70px;">Rejected</div>
                     @elseif($test['status']=='')
                     <div class="alert alert-info" style="padding: 2px; width: 70px;">Pending</div>
                     
                     @endif
                  

                     
                     

                     
                        

                    
                    </td>
                    <td class="mailbox-name">{{$b->name}}</td>
                    <td class="mailbox-subject"><b>{{$b->email}}</b>
                    <td class="mailbox-subject"> {!!str_limit($b->message,$limit='10')!!} 
                    </td>
                    <td class="mailbox-date">
                      <?php $date = Carbon\Carbon::parse($b->created_at);
                     $now = Carbon\Carbon::now();
                      $diff = $date->diffForHumans($now);
                      ?>
                      {{$diff}}
                    </td>
                  </tr>
                  @endforeach
                  
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            
            </div>
          </div>
          
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
 










<?php $e = App\Bookings::all();?>

@foreach($e as $t)
{{-- view --}}
<div class="modal fade" id="view{{$t->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="view">From :  {{$t->email}} </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <p><strong>Name : </strong>{{$t->name}}</p>
         <p><strong>Gender : </strong>{{$t->gender}}</p>
         <p><strong>Age : </strong>{{$t->age}}</p>
         <p><strong>Location : </strong>{{$t->location}}</p>
         <p><strong>Contact NO : </strong>{{$t->contact}}</p>
        <p><strong>Message : <br></strong>{!!$t->message!!} </p>
        <p><strong>Booked For :</strong>{{$t->slug}}
      </div>

    

      <div class="modal-footer">

        <a href="{{url('/reply/'.$t->id)}}"><button type="submit" class="btn btn-primary pull-left">Reply</button></a>
       <div class="col-md-4"></div>
       
        <?php $r = App\BookingStatus::where('contact_id',$t->id)->orderBy('id','desc')->get()->first();
        
        ?>
        @if($r=='')
        <div class="col-md-3">
        <form action="{{url('bookinga',$t->id)}}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="email" value="{{$t->email}}">
          <input type="hidden" name="status" value="approved">
          <input type="hidden" name="active" value="replyed">
        <button type="submit" class="btn btn-success">Approved</button>
        </form>
        </div>
       
        


         <div class="col-md-3">

          <form action="{{url('bookingb',$t->id)}}" method="post">
          {{csrf_field()}}
          <input type="hidden" name="email" value="{{$t->email}}">
          <input type="hidden" name="status" value="rejected">
          <input type="hidden" name="active" value="replyed">
          <button type="submit" class="btn btn-danger pull-right">Rejected</button>
          </form>
          </div>

       @elseif($r['status']=='approved') 
       <div class="col-md-3">
        
      <div class="alert alert-success" style="padding: 2px; width: 70px;" >Approved</div>
        </div>

        @elseif($r['status']=='rejected')
        


         <div class="col-md-3">

        
      <div class="alert alert-danger" style="padding: 2px; width: 70px;" >Rejected</div>
        </div>
        @endif
        


        
        </div>

      
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




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
              <a href="{{url('/deletebook/'.$t->id)}}"> <button type="submit" class="btn btn-outline">Yes</button></a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

@endforeach

@endsection
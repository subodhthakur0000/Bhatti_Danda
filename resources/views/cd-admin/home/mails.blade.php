@extends('cd-admin.home-master')
@section('page-title')
Mails
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="container-fluid">
    <section class="content-header">
      <h1>
      Replies
      </h1>
       <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Booking</a></li>
      <li class="active">Replies</li>
    </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
   <div class="col-md-12">

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Replies</h3>

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
                  @foreach($t as $re)
                  <tr>
                    <td class="mailbox-star"><button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$re->id}}"><i class="fa fa-trash"> </i></button></td>
                    <td class="mailbox-name"><a data-toggle="modal" data-target="#view{{$re->id}}">{{$re->email}}</a></td>
                    <td class="mailbox-subject"><strong>{{$re->subject}}</strong>
                      <td class="mailbox-subject">{!!str_limit($re->message,$limits='50')!!}
                      </td>
                    </td>
                    
                    <td class="mailbox-date">

                
                      <?php $d = Carbon\Carbon::parse($re->created_at);
                      //dd($date);
                     $n= Carbon\Carbon::now();
                      //dd($now);
                      $diff = $d->diffForHumans($n);
                      ?>
                      {{$diff}}
                  </td>

                    
                  </tr>
                  @endforeach

                  </tbody>

                </table>
                {!!$t->links()!!}
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            
            </div>
          </div>
      </div>
    </section>
  </div>
</div>

<?php $e = App\QuickMAil::all();?>

@foreach($e as $t)
{{-- view --}}
<div class="modal fade" id="view{{$t->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="view"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <pre><strong>E-mail : </strong>{{$t->email}}    </pre>
        <pre><strong>Subject :</strong>{{$t->subject}}    </pre>
        <p><strong>Message : <br></strong>{!!$t->message!!} </p>
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
              <a href="{{url('/deletemail/'.$t->id)}}"> <button type="button" class="btn btn-outline">Yes</button></a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
@endforeach

@endsection
@extends('cd-admin.home-master')
@section('page-title')
Contact inbox
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="container-fluid">
    <section class="content-header">
      <h1>
      Inbox
      </h1>
       <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Contact</a></li>
      <li class="active">Inbox</li>
    </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
   <div class="col-md-12">
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
                 <a href="{{url('/viewcontact')}}"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>
               
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                    @foreach($c as $contact)
                  <tr>
                    <td class="mailbox-star">
                      <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$contact->id}}"><i class="fa fa-trash"> </i></button>

                      <button class="btn btn-default" data-toggle="modal" data-target="#view{{$contact->id}}"><i class="fa fa-eye"></i></button>

                    </td> 
                    <td>
                      <?php $test = App\Reply::where('contact_id',$contact->id)->orderBy('id','desc')->get()->first();
                         ?>
                         @if($test=='')

                       
                        
                          <div class="alert alert-info" style="padding: 2px; width: 55px;" >Unseen</div>


                        @elseif($test['status']=='active')

                       
                        <div class="alert alert-success" style="padding: 2px; width: 55px;" >seen</div>



                        @endif

                    </td>
                    
                      <td class="mailbox-name">{{$contact->name}}
                       <td class="mailbox-subject">{!!str_limit($contact->message,$limits='50')!!}
                      </td>
                    </td>
                    
                    <td class="mailbox-date">
                     {{ $diff = Carbon\Carbon::parse($contact->created_at)->diffForHumans(Carbon\Carbon::now('Asia/Kathmandu')) }} </td>
                    
                   
                  </tr>
                   @endforeach
                  
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              {!!$c->links()!!}
                  <a href="{{url('/viewcontact')}}"><button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button></a>
               
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
      </div>
    </section>
  </div>
</div>

<?php $e = App\Contact::get();?>
<?php $d = App\Reply::get();?>
@foreach($e as $e)
@foreach($d as $d)
<div class="modal fade" id="view{{$e['id']}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="view"><strong>Name :</strong>  {{$e['name']}} </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <pre><strong>E-mail : </strong>{{$e['email']}}    </pre>
        <pre><strong>Subject :</strong>{{$e['subject']}}    </pre>
        <p><strong>Message : <br></strong>{!!$e['message']!!} </p>
      </div>
      <div class="modal-footer">
        @if($d['status'] == 'active')
          <button type="button" class="btn btn-success btn-sm pull-left">Replyed</button>
        @else
        <a href="{{url('/replycontact/'.$e['id'])}}"><button type="submit" class="btn btn-primary pull-left">Reply</button></a>
        @endif
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


<div class="modal modal-danger fade" id="modal-danger{{$e['id']}}">
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
              <a href="{{url('/deleteinbox/'.$e['id'])}}"> <button type="button" class="btn btn-outline">Yes</button></a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
@endforeach
@endforeach
@endsection
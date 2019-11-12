@extends('cd-admin.home-master')

@section('page-title')  
Admin
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin List
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Admin</a></li>
        <li class="active">View Admins</li>
      </ol>
    </section>

    <section class="content">
      @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible">
          <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Data Inserted Successfully</strong>
          {{Session::get("message", '')}}
        </div>
        @elseif(Session::has('deletesuccess'))
        <div class="alert alert-danger alert-dismissible">
          <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Data Deleted Successfully</strong>
          {{Session::get("message", '')}}
        </div>
      
        @endif
      <div class="row">
        <div class="col-xs-12">
           <div class="box">
            <div class="box-header">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.N</th>
                  <th>Name</th>
                  <th>E-mail</th>
                  <th>Role</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                  @foreach($admin as $a)
                <tr>
                  <td>{{$loop->iteration}} </td>
                  <td>{{$a->name}}</td>
                  <td>{{$a->email}}</td>
                  <td>{{$a->role}}</td>
                  <td>
                    @if(Auth::user()->role =='superadmin')
                    @if(Auth::user()->email ==$a->email)
                    @else
                 <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{$a->id}}"><i class="fa fa-trash"> </i></button>
                 @endif
                 @else
                 @endif

               </td>
               
                  </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>S.N</th>
                  <th>Name</th>
                  <th>E-mail</th>
                  <th>Role</th>
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


 
            
        

        <!--MODEL-->
        <?php $r = App\User::all();?>
        @foreach($r as $ad)



<div class="modal modal-danger fade" id="modal-danger{{$ad->id}}">
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
                <a href="{{url('/deleteadmin/'.$ad['id'])}}"> <button type="button" class="btn btn-outline">Yes</button></a>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>






        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="text-center border border-light p-5" action="#!">

    <p class="h4 mb-4">Edit</p>

    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name">
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name">
        </div>
    </div>

    <!-- E-mail -->
    <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail">

    <!-- Password -->
    <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
        At least 8 characters and 1 digit
    </small>

    <!-- Phone number -->
    <input type="text" id="defaultRegisterPhonePassword" class="form-control" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">
    <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
        Optional - for two step authentication
    </small>

    <!-- Newsletter -->
    <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter">
        <label class="custom-control-label" for="defaultRegisterFormNewsletter">Subscribe to our newsletter</label>
    </div>

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Sign in</button>

    <!-- Social register -->
    
    <hr>

    <!-- Terms of service -->
    <p>By clicking
        <em>Sign up</em> you agree to our
        <a href="" target="_blank">terms of service</a>

</form>
<!-- Default form register -->

      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection
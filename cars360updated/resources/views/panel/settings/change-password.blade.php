@extends('layouts.main')

@section('title', 'Add Cars | CarDrive365')

@section('content')
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary mt-3">
                  <div class="card-header">
                    <h3 class="card-title">Reset Your Password</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" action="{{ route('reset_password_action') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                              <div>
                                <label>Enter Your Current Password</label>
                                {{ Form::password('password', [ 'class' => 'form-control', 'placeholder' => 'Enter Password']) }}
                              </div>
                              
                              <div class="form-group">
                                <label>Enter New Password</label>
                                {{ Form::password('new_password', [ 'class' => 'form-control', 'placeholder' => 'Enter Password']) }}
                              </div>
                              
                              <div class="form-group">
                                <label>Retype Your New Password</label>
                                {{ Form::password('confirm_password', [ 'class' => 'form-control', 'placeholder' => 'Enter Password']) }}
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                      <button type="submit" class="btn btn-outline-primary btn-flat">Submit</button>
                    </div>
                  </form>
                <!-- /.card -->
                </div>
            </div>
        </div>
      <!-- /.row -->
      </div><!-- /.container-fluid -->
</div>

@endsection
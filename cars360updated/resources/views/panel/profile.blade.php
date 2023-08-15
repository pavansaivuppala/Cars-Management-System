@extends('layouts.main')

@section('title')
My Profile
@endsection
@section('content')


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary mt-3">
                  <div class="card-header">
                    <h3 class="card-title">PROFILE</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  {{ Form::model($user, [ 'route' => 'save_user_profile', 'method' => 'post' ]) }}
                  <!-- <form role="form" action="{{ route('reset_password_action') }}" method="POST"> -->
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
<div class="form-group">
    <label >First Name<span class="required">*</span></label>
    {{ Form::text('first_name', null, [ "class" => 'form-control', 'placeholder' => 'Enter Your First Name' ] ) }}
    @if($errors->has('First Name'))
        <span class="invalid-feedback" style="display:block;" role="alert">
        <strong>{{ $errors->first('First Name') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    <label >Last Name<span class="required">*</span></label>
    {{ Form::text('last_name', null, [ "class" => 'form-control', 'placeholder' => 'Enter Your Last Name' ] ) }}
    @if($errors->has('Last Name'))
        <span class="invalid-feedback" style="display:block;" role="alert">
        <strong>{{ $errors->first('Last Name') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    <label >Date Of Birth<span class="required">*</span></label>
    {{ Form::text('date_of_birth', null, [ "class" => 'form-control', 'placeholder' => 'Enter Your Date of Birth' ] ) }}
    @if($errors->has('date_of_birth'))
        <span class="invalid-feedback" style="display:block;" role="alert">
        <strong>{{ $errors->first('date_of_birth') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    <label >Email<span class="required">*</span></label>
    {{ Form::email('email', null, [ "class" => 'form-control', 'placeholder' => 'Enter Your Email ID' ] ) }}
    @if($errors->has('email'))
        <span class="invalid-feedback" style="display:block;" role="alert">
        <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
</div>

<div class="form-group">
    <label >Phone No.<span class="required">*</span></label>
    {{ Form::text('phone', null, [ "class" => 'form-control', 'placeholder' => 'Enter Your Phone Number' ] ) }}
    @if($errors->has('phone'))
        <span class="invalid-feedback" style="display:block;" role="alert">
        <strong>{{ $errors->first('phone') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    <label >Address<span class="required">*</span></label>
    {{ Form::text('address', null, [ "class" => 'form-control', 'placeholder' => 'Enter Your Address' ] ) }}
    @if($errors->has('address'))
        <span class="invalid-feedback" style="display:block;" role="alert">
        <strong>{{ $errors->first('address') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    <label >Adhar Number<span class="required">*</span></label>
    {{ Form::text('adharcard', null, [ "class" => 'form-control', 'placeholder' => 'Enter Your Adhar Card' ] ) }}
    @if($errors->has('adhar card'))
        <span class="invalid-feedback" style="display:block;" role="alert">
        <strong>{{ $errors->first('adhar card') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    <label >Area Pincode<span class="required">*</span></label>
    {{ Form::text('areapincode', null, [ "class" => 'form-control', 'placeholder' => 'Enter Your Area Pincode' ] ) }}
    @if($errors->has('areapincode'))
        <span class="invalid-feedback" style="display:block;" role="alert">
        <strong>{{ $errors->first('areapincode') }}</strong>
        </span>
    @endif
</div>
<div class="form-group">
    <label for="exampleInputFile">Profile Photo</label>
    <div class="input-group">
        <div class="custom-file">
        <input type="file" class="custom-file-input" id="exampleInputFile">
        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
        </div>
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-outline-primary btn-flat float-right">Save</button>
</div>
</form>
            </div>
            <!-- /.card -->
         </div>
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</div>
@endsection
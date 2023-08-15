@extends('layouts.app')

@section('title', 'CarDrive365 Register')

@section('content')
    <div class="row login-box" style="width:70% !important">
        <div class="col-12 login-logo">
            <a href="https://www.cardrive365.com/"><b>CarDrive</b>365</a>
        </div>
        <!-- /.login-logo -->
        <div class="col-12 card">
            <div class="card-body login-card-body">
            <p class="login-box-msg">Register</p>

            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3">
                            <input id="first_name" type="text" placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <input id="last_name" type="text" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3">
                            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <input id="phone" type="phone" placeholder="Phone" class="form-control @error('mobile_number') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  required autocomplete="">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone-alt"></span>
                                </div>
                            </div>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="input-group mb-3">
                            <input id="city" type="text" placeholder="City" class="form-control" name="city" value="{{ old('city') }}" required >
                        </div>
                    </div>
                    <div class="col">
                        <div class="input-group mb-3">
                            <input id="pincode" type="text" placeholder="Pin Code" class="form-control" name="pincode" value="{{ old('pincode') }}"  required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-number"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="company" type="text" placeholder="Company Name" class="form-control" name="company" value="{{ old('company') }}" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-building"></span>
                        </div>
                    </div>

                    @error('company')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <textarea id="address" class="form-control" name="address" rows="3" placeholder="Address" value="{{ old('address') }}" required></textarea>
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input id="location" type="text" placeholder="Address" class="form-control" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-location"></span>
                        </div>
                    </div>

                    @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input id="password-confirm" type="password" placeholder="Retype password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                            I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                <!-- /.col -->
                </div>
            </form>

            <p class="mb-0">
                <a href="{{ url('login') }}" class="text-center">Already have an account?</a>
            </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection

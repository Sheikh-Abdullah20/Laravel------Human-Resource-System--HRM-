@extends('layouts.auth')


@section('title',"Register")

@section('content')

<div class="login-area login-s2">
    <div class="container">
        <div class="login-box ptb--100">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="login-form-head">
                    <h4>Sign up</h4>
                    <p>Hello there, Sign up and Join with Us</p>
                </div>
                <div class="login-form-body">
                    <div class="form-gp">
                        <label for="exampleInputName1">Full Name</label>
                        <input type="text" id="exampleInputName1" name="name" value="{{ old('name') }}">
                        <i class="ti-user"></i>
                        <div class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" id="exampleInputEmail1" name="email" value="{{ old('email') }}">
                        <i class="ti-email"></i>
                        <div class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" id="exampleInputPassword1" name="password">
                        <i class="ti-lock"></i>
                        <div class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-gp">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation">
                        <i class="ti-lock"></i>
                        <div class="text-danger">
                            @error('password_confirmation')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                        {{-- <div class="login-other row mt-4">
                            <div class="col-6">
                                <a class="fb-login" href="#">Sign up with <i class="fa fa-facebook"></i></a>
                            </div>
                            <div class="col-6">
                                <a class="google-login" href="#">Sign up with <i class="fa fa-google"></i></a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="form-footer text-center mt-5">
                        <p class="text-muted">Don't have an account? <a href="{{ route('login') }}">Sign in</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
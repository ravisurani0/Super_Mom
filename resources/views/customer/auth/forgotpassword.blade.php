@extends('layouts.customermain')
@section('content')
    <section class="auth-section">
        <div class="auth-left-block">
            <img class="img-fluid postion-relative" src="{{ asset('media/customer/auth-img.png') }}" alt="Auth Image">
            <a class="navbar-brand position-absolute mobile-model-cancel-icon top-0 start-0 ms-3 mt-3" href="{{ route('front.home') }}">
                        <img src="{{ asset('front/assets/images/logo.png') }}" alt="Gopal Snacks" width="80px" height="auto">
                    </a>
        </div>
        <!-- Forgot passowrd -->
        <div class="auth-right-block forget-parent-box">
            <div class="auth-block postion-relative">
            <i class="fa fa-times fa-2xl position-absolute top-0 end-0 mt-5 me-5 mobile-model-cancel-icon" aria-hidden="true"></i>
                <div class="auth-form-block">
                    @if (Session::has('message'))
                        <p class="alert alert-info">{{ Session::get('message') }}</p>
                    @endif
                    <h1 class="auth-title text-center">Forgot password</h1>
                    <h3 class="auth-subtitle">Don’t worry we will help you recover</h3>
                    <p class="auth-txt">Enter your registered email address on with we can send password recovery
                        instruction</p>
                    <form action="{{ route('customer.forget.password.post') }}" method="POST">
                        @csrf
                        <div class="auth-form">
                            <div class="form-field">
                                <label for="email">Email</label>
                                <img src="{{ asset('media/customer/email.png') }}" class="prefix-img" alt="Email">
                                <input type="text" id="email" name="email"
                                    placeholder="Email address/Username"><br>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="formbtn form-field">
                                <button class="btn custom-btn my-2" type="submit">Submit</button>
                                <div class="text-center display-none mt-2">
                <span>Remember password? <a href="{{ url('login') }}">Back to Login</a> </span>
            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="auth-footer text-center display-block">
                <span>Remember password? <a href="{{ url('login') }}">Back to Login</a> </span>
            </div>
        </div>
    @endsection

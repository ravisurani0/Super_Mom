@extends('layouts.customermain')
@section('content')
    <section class="auth-section">
        <div class="auth-left-block ">
            <img class="img-fluid position-relative" src="{{ asset('media/customer/auth-img.png') }}" alt="Auth Image">
            <a class="navbar-brand position-absolute mobile-model-cancel-icon top-0 start-0 ms-3 mt-3"
                href="{{ route('front.home') }}">
                <img src="{{ asset('front/assets/images/logo.png') }}" alt="Gopal Snacks" width="80px" height="auto">
            </a>
        </div>
        <!-- Login Screen -->
        <div class="auth-right-block forget-parent-box">
            <div class="auth-block">
                <a href="{{ route('front.home') }}"> <i
                        class="fa fa-times fa-2xl position-absolute mobile-model-cancel-icon top-0 end-0 mt-5 me-5"
                        aria-hidden="true"></i></a>
                <div class="auth-form-block">
                    @if (Session::has('message'))
                        <p class="alert alert-info">{{ Session::get('message') }}</p>
                    @endif
                    @if (Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                    <h1 class="auth-title text-center">Login to continue</h1>
                    <h3 class="auth-subtitle">Hi, Welcome back</h3>
                    <p class="auth-txt">Enter your email and password to continue...</p>
                    <form method="POST" action="{{ route('login-customer') }}">
                        <div class="auth-form">
                            @csrf
                            <div class="form-field">
                                <label for="email">Email</label>
                                <img src="{{ asset('media/customer/email.png') }}" class="prefix-img" alt="Email">
                                <input type="text" id="email" name="email"
                                    placeholder="Email address/Username"><br>
                            </div>
                            <div class="form-field">
                                <label for="password">Password</label>
                                <img src="{{ asset('media/customer/password.png') }}" class="prefix-img" alt="password">
                                <input type="password" class="password-input" id="passowrd" name="password"
                                    placeholder="8+ character required"><br>
                                <a role="button" onclick="showPassword()"><img
                                        src="{{ asset('media/customer/eye-close.png') }}" class="suffix-img"
                                        alt="hide passowrd"></a>
                            </div>
                            <div class="signin-forgot-block d-flex align-items-center">
                                <div class="keep-me-signin d-flex align-items-center">
                                    <label class="switch">
                                        <input type="checkbox" name="keepMeSignIn">
                                        <span class="slider round"></span>
                                    </label>
                                    <span>Keep me Signed in</span>
                                </div>
                                <div class="forgot-password">
                                    <a href="{{ route('forgot-password') }}">Forgot Password?</a>
                                </div>
                            </div>
                            <div class="formbtn form-field">
                                <button class="btn custom-btn my-2" type="submit">Login</button>
                                {{-- <span class="text-center d-block my-2">Or, login with </span>
                                <a href="{{ url('auth/google') }}" class="btn custom-link-btn my-2" type="submit">
                                    <img src="{{ asset('media/customer/google.png') }}" alt="Google"> Login with Goggle
                                </a> --}}
                                <div class="text-center display-none">
                                    <span>Don’t have an account? <a href="{{ route('customers') }}">Signup now</a> </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="auth-footer text-center display-block">
                <span>Don’t have an account? <a href="{{ route('customers') }}">Signup now</a> </span>
            </div>
        </div>
    @endsection
    <script src="{{ asset('front/js/jquery-3.6.3.min.js') }}"></script>
    <script>
        function showPassword() {
            var passInput = $("#passowrd");
            if (passInput.attr('type') === 'password') {
                passInput.attr('type', 'text');
            } else {
                passInput.attr('type', 'password');
            }
        }
    </script>

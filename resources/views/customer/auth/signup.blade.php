@extends('layouts.customermain')
@section('content')
    <section class="auth-section">
        <div class="auth-left-block">
            <img class="img-fluid position-relative" src="{{ asset('media/customer/auth-img.png') }}" alt="Auth Image">
            <a class="navbar-brand position-absolute mobile-model-cancel-icon top-0 start-0 ms-3 mt-3"
                href="{{ route('front.home') }}">
                <img src="{{ asset('front/assets/images/logo.png') }}" alt="Gopal Snacks" width="80px" height="auto">
            </a>
        </div>
        <!-- Signup Screen -->
        <div class="auth-right-block forget-parent-box">
            <div class="auth-block">
                <a href="{{ route('front.home') }}"> <i
                        class="fa fa-times fa-2xl position-absolute mobile-model-cancel-icon top-0 end-0 mt-5 me-5"
                        aria-hidden="true"></i></a>
                <div class="auth-form-block">
                    @if (Session::has('other_error'))
                        <p class="alert alert-danger">{{ Session::get('other_error') }}</p>
                    @endif
                    <h1 class="auth-title text-center">Sign Up to get started</h1>
                    <h3 class="auth-subtitle">Hi, Welcome</h3>
                    <p class="auth-txt">Enter below details to start</p>
                    <form action="{{ route('customers') }}" method="POST">
                        @csrf
                        <div class="auth-form">
                            <div class="form-field">
                                <label for="name">User name</label>
                                <img src="{{ asset('media/customer/user.png') }}" class="prefix-img" alt="User">
                                <input type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" id="name"
                                    name="name" placeholder="Enter user name"><br>
                                @error('name')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-field">
                                <label for="email">Email</label>
                                <img src="{{ asset('media/customer/email.png') }}" class="prefix-img" alt="Email">
                                <input type="text" id="email" name="email"
                                    placeholder="Email address/Username"><br>
                                @error('email')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-field">
                                <label for="password">Password</label>
                                <img src="{{ asset('media/customer/password.png') }}" class="prefix-img" alt="password">
                                <input type="password" class="password-input" id="passowrd" name="password"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Password must have min 8 character, Passwords must contain 1 Capital, 1 small , 1 specilal character"
                                    placeholder="8+ character required"><br>
                                <a role="button" onclick="showPassword()"><img
                                        src="{{ asset('media/customer/eye-close.png') }}" class="suffix-img"
                                        alt="hide passowrd"></a>

                                @error('password')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="formbtn form-field">
                                <button class="btn custom-btn my-2" type="submit">Create account</button>
                                {{-- <span class="text-center d-block my-2">Or, login with </span>
                                <button class="btn custom-link-btn my-2" type="submit">
                                    <img src="{{ asset('media/customer/google.png') }}" alt="Google"> Login with Goggle
                                </button>
                               <a href="{{ url('auth/google') }}" class="btn custom-link-btn my-2">
                                    <img src="{{ asset('media/customer/google.png') }}" alt="Google"> Login with Goggle
                                </a> --}}
                                <div class="text-center display-none">
                                    <span>Already have an account? <a href="{{ url('login') }}">Login now</a> </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="auth-footer text-center display-block">
                <span>Already have an account? <a href="{{ url('login') }}">Login now</a> </span>
            </div>
        </div>

    </section>
@endsection
<style>
    .error {
        width: 100%;
        margin-top: 0.25rem;
        font-size: .875em;
        color: #dc3545;
    }
</style>
<script src="{{ asset('front/js/jquery-3.6.3.min.js') }}"></script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })

    function showPassword() {
        var passInput = $("#passowrd");
        if (passInput.attr('type') === 'password') {
            passInput.attr('type', 'text');
        } else {
            passInput.attr('type', 'password');
        }
    }
</script>

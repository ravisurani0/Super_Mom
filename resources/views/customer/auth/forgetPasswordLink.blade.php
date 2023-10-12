@extends('layouts.customermain')
@section('content')
    <section class="auth-section">
        <div class="auth-left-block">
            <img class="img-fluid" src="{{ asset('media/customer/auth-img.png') }}" alt="Auth Image">
        </div>
        <!-- forgot password -->
        <div class="auth-right-block">
            <div class="auth-block">
                <div class="auth-form-block">
                    @if (Session::has('other_error'))
                        <p class="alert alert-danger">{{ Session::get('other_error') }}</p>
                    @endif
                    <h1 class="auth-title text-center">Reset Password</h1>
                    <h3 class="auth-subtitle">Hi, Welcome</h3>
                    <p class="auth-txt">Enter below details to reset password</p>
                    <form action="{{ route('customer.reset.password.post') }}" method="POST">
                        <input type="hidden" name="token" value="{{ $token }}">
                        @csrf
                        <div class="auth-form">
                            <div class="form-field">
                                <label for="name">Email</label>
                                <img src="{{ asset('media/customer/user.png') }}" class="prefix-img" alt="User">
                                <input type="text" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" id="email"
                                    name="email" placeholder="Enter Email address"><br>
                                @error('email')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-field">
                                <label for="password">Password</label>
                                <img src="{{ asset('media/customer/password.png') }}" class="prefix-img" alt="password">
                                <input type="password" class="password-input" id="passowrd" name="password"
                                    placeholder="8+ character required"><br>
                                <a role="button" onclick="showPassword('password')"><img
                                        src="{{ asset('media/customer/eye-close.png') }}" class="suffix-img"
                                        alt="hide passowrd"></a>
                                @error('password')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-field">
                                <label for="password">Confirm Password</label>
                                <img src="{{ asset('media/customer/password.png') }}" class="prefix-img"
                                    alt="password confirmation">
                                <input type="password" class="password-input" id="password_confirmation"
                                    name="password_confirmation" placeholder="8+ character required"><br>
                                <a role="button" onclick="showPassword('confirm_password')"><img
                                        src="{{ asset('media/customer/eye-close.png') }}" class="suffix-img"
                                        alt="hide passowrd"></a>
                                @error('password_confirmation')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="formbtn form-field">
                                <button class="btn custom-btn my-2" type="submit">Reset Password</button>
                            </div>
                        </div>
                    </form>
                </div>
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
    function showPassword(passwordType) {
        if (passwordType == 'confirm_password') {
            var passInput = $("#password_confirmation");
            if (passInput.attr('type') === 'password') {
                passInput.attr('type', 'text');
            } else {
                passInput.attr('type', 'password');
            }
        } else {
            var passInput = $("#passowrd");
            if (passInput.attr('type') === 'password') {
                passInput.attr('type', 'text');
            } else {
                passInput.attr('type', 'password');
            }
        }
    }
</script>

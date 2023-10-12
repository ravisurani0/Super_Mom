@extends('layouts.guest', ['page_title' => 'Login'])

@section('content')
<!--begin::Login Sign in form-->
<div class="login-signin">
    <div class="mb-20">
        <h3>Sign In To Admin</h3>
        {{-- <p class="opacity-60 font-weight-bold">Enter your details to login to your account:</p> --}}
    </div>
    <form method="POST" action="{{ route('login') }}" class="form" id="kt_login_signin_form">
        @csrf
        <div class="form-group">
            <input class="@error('mobile_no') is-invalid @enderror form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="number" placeholder="Contact No" name="mobile_no" autocomplete="off" value="{{ old('mobile_no') }}" />
            @error('mobile_no')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <input class="@error('password') is-invalid @enderror form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5" type="password" placeholder="Password" name="password" />
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8">
            <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} />Remember me
                <span></span>
            </label>
            <a href="{{ route('password.request') }}" id="kt_login_forgot" class="text-white font-weight-bold ml-2">Forget Password ?</a>
        </div>
        <div class="form-group text-center mt-10">
            <button id="kt_login_signin_submit" class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">Sign In</button>
        </div>
    </form>
    {{-- <div class="mt-10">
            <span class="opacity-70 mr-4">Don't have an account yet?</span>
            <a href="{{ route('register') }}" id="kt_login_signup" class="text-white font-weight-bold">Sign Up</a>
</div> --}}
</div>
<!--end::Login Sign in form-->
@endsection
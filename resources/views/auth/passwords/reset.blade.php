@extends('layouts.guest', ['page_title' => 'Update Password'])

@section('content')
<!--begin::Login Sign in form-->
<div class="login-signin">
    <div class="mb-20">
        <h3>Update Password</h3>
        {{-- <p class="opacity-60 font-weight-bold"> Enter your details to login to your account:</p> --}}
    </div>
    <form class="form" id="kt_login_signin_form" method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <input class="@error('email') is-invalid @enderror form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5"
                type="text" value="{{ $email ?? old('email') }}" placeholder="Email" name="email" autocomplete="off" />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-group">
            <input class="@error('password') is-invalid @enderror form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5"
                type="password" placeholder="Password" name="password" autocomplete="new-password" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <div class="form-group">
            <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5"
                type="password" placeholder="Confirm Password" name="password_confirmation" autocomplete="new-password" />
        </div>

        <div class="form-group text-center mt-10">
            <button type="submit" id="kt_login_signin_submit"
                class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">Reset Password</button>
        </div>
    </form>
</div>
<!--end::Login Sign in form-->
@endsection

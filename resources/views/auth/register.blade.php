@extends('layouts.guest', ['page_title'=>'Register'])

@section('content')

    <!--begin::Login Sign up form-->
    <div class="login-signup">
        <div class="mb-20">
            <h3>Sign Up</h3>
            <p class="opacity-60">Enter your details to create your account</p>
        </div>
        <form method="POST" action="{{ route('register') }}" class="form text-center" id="kt_login_signup_form">
            @csrf
            <div class="form-group row">
                <div class="col-6">
                    <input class="@error('name') is-invalid @enderror form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8"
                        type="text" placeholder="Fullname" name="name" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    <input class="@error('email') is-invalid @enderror form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8"
                        type="text" placeholder="Email" name="email" autocomplete="off" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6">
                    <input class="@error('password') is-invalid @enderror form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8"
                        type="password" placeholder="Password" name="password" />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-6">
                    <input class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8"
                        type="password" placeholder="Confirm Password" name="password_confirmation" />
                </div>
            </div>
            <div class="form-group text-left px-8">
                <label class="@error('terms') is-invalid @enderror checkbox checkbox-outline checkbox-white text-white m-0">
                    <input type="checkbox" name="terms" value="1" />I Agree the
                    <a href="#" class="text-white font-weight-bold">terms and conditions</a>.
                    <span></span>
                </label>
                <div class="form-text text-muted text-center"></div>
                @error('terms')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <button id="kt_login_signup_submit" type="submit"
                    class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">Sign Up</button>
                <a href="{{ route('login') }}" id="kt_login_signup_cancel"
                    class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">Cancel</a>
            </div>
        </form>
    </div>
    <!--end::Login Sign up form-->
@endsection

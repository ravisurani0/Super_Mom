@extends('layouts.front.main')
@section('css_include')
<link rel="stylesheet" href="{{ asset('front/css/settings-tab.css') }}">
@endsection
@section('content')
<section class="settings-tab-section">
    <div class="container p-0">
        @if (Session::has('message'))
        <p class="alert alert-info">{{ Session::get('success') }}</p>
        @endif
        @if (Session::has('error'))
        <p class="alert alert-danger">{{ Session::get('error') }}</p>
        @endif
        <h1 class="h3 mb-3">Profile</h1>
        <div class="row">
            <div class="col-md-5 col-xl-4">
                <div class="card">
                    <div class="list-group list-group-flush" role="tablist">
                        <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#account" role="tab">
                            Account
                        </a>
                        <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#saved-address" role="tab">
                            Saved address
                        </a>
                        <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#saved-payment" style="display: none" role="tab">
                            Saved payment options
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-xl-8">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="account" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('update.profile') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="" name="id">
                                    <div class="row">
                                        <div class="col-12 py-2">
                                            <div class="text-center">

                                                <div class="mt-2">
                                                    <label class="btn btn-primary-link">Update profile<input type="file" name="profile_image" id="profile_image" />
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12 py-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="fname" name="fname" placeholder="First name" value="">
                                                @error('fname')
                                                <div class="validation-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12 py-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name" value="">
                                                @error('lname')
                                                <div class="validation-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12 py-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="mobnumber" name="mobnumber" value="" placeholder="Phone number">
                                                @error('mobnumber')
                                                <div class="validation-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12 py-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="">
                                                @error('email')
                                                <div class="validation-error">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 py-2">
                                            <div class="d-flex align-items-center">
                                                <label class="filter-radiobox mr-2 mt-2"> Male
                                                    <input type="radio" name="gender" value="1">
                                                    <span class="mark"></span>
                                                </label>
                                                <label class="filter-radiobox mr-2 mt-2"> Female
                                                    <input type="radio" name="gender" value="0">
                                                    <span class="mark"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-secondary">Update Profile</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="saved-payment" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-12 py-4 d-flex align-items-center">
                                            <h4 class="mb-0 text-nowrap">Add new card</h4>
                                            <div class="divider"></div>
                                        </div>
                                        <div class="col-lg-8 col-12 py-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="cnumber" placeholder="Card number">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12 py-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="expdate" placeholder="Expiry date">
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-12 py-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="cname" placeholder="Name on card">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-12 py-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="cvv" placeholder="CVV">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-secondary my-2">Save new card</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<style>
    input[type="file"] {
        display: none;
    }
</style>
@section('inline-footer-js')
<script>
  
</script>
@endsection
@extends('layouts.app', ['page_title'=>'CMS'])

@section('content')
<div class="container">

    <form class="form" id="productform" method="POST" action="" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card card-custom card-sticky" id="kt_page_sticky_card">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        {{-- <i class="fas fa-shopping-bag text-primary"></i> --}}
                    </span>
                    <h3 class="card-label">Contact Details
                        <i class="mr-2"></i>
                        {{-- <small class="">Contact Details .!</small> --}}
                    </h3>
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('contact_us.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                        <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>
                    <!-- <div class="btn-group">
                        <button type="submit" class="btn btn-primary font-weight-bolder">
                            <i class="ki ki-check icon-sm"></i>Save</button>
                    </div> -->
                </div>
            </div>
            <div class="card-body">
                <!--begin::Form-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-8">
                        <div class="my-5">
                            <h3 class="text-dark font-weight-bold mb-10">Message Info:</h3>

                            <div class="form-group row">
                                <label class="col-3">Name</label>
                                <div class="col-9">
                                    <input type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="name" placeholder="Enter name" value="{{ $contactDetails->name }}" />
                                    @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Email</label>
                                <div class="col-9">
                                    <input type="mail" class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email" placeholder="Enter Email" value="{{ $contactDetails->email }}" />
                                    @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Number</label>
                                <div class="col-9">
                                    <input type="number" class="form-control  {{ $errors->has('number') ? 'is-invalid' : '' }}" name="number" id="number" placeholder="Enter number" value="{{ $contactDetails->number }}" />
                                    @error('number')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Service</label>
                                <div class="col-9">
                                    <input type="text" class="form-control  {{ $errors->has('service') ? 'is-invalid' : '' }}" name="service" id="service" placeholder="Enter service" value="{{ $contactDetails->service }}" />
                                    @error('service')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3">Address</label>
                                <div class="col-9">
                                    <textarea class="form-control  {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" value="{{ old('address') }}" placeholder="Enter address" id="address" style=" min-width:200px; max-width:100%;min-height:75px;height:100%;width:100%;">{{$contactDetails->address }}</textarea>
                                    @error('address')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Message</label>
                                <div class="col-9">
                                    <textarea class="form-control  {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" value="{{ old('message') }}" placeholder="Enter message" id="message" style=" min-width:200px; max-width:100%;min-height:75px;height:100%;width:100%;">{{$contactDetails->message }}</textarea>
                                    @error('message')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <!-- <div class="form-group row">
                                <label class="col-3">Status</label>
                                <div class="col-9">
                                    <select id="status" name="status" class="form-control  customrequired ">
                                        <option value="1" {{$contactDetails->status == '1' ? 'selected' : ''}}>Active</option>
                                        <option value="0" {{$contactDetails->status == '0' ? 'selected' : ''}}>Inactive</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

<style>
    .error {
        font-size: 0.9rem;
        font-weight: 400;
        width: 100%;
        margin-top: 0.25rem;
        color: #e3342f !important;
    }

    .thumb {
        vertical-align: middle;
        border-style: none;
        height: 100px;
        width: 100px;
        margin: 10px;
    }
</style>

@section('scripts')


@endsection
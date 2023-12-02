@extends('layouts.app')

@section('content')
<div class="container">

    <form class="form" id="productform" method="POST" action="{{route('update.profile')}}">
        @method('POST')
        @csrf

        @if($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif
        <div class="card card-custom card-sticky" id="kt_page_sticky_card">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        {{-- <i class="fas fa-shopping-bag text-primary"></i> --}}
                    </span>
                    <h3 class="card-label"> Company Profile
                        <i class="mr-2"></i>
                        {{-- <small class="">Company Profile .!</small> --}}
                    </h3>
                </div>
                <div class="card-toolbar">
                        <button type="submit" class="btn btn-primary font-weight-bolder">
                            <i class="ki ki-check icon-sm"></i>Save</button>
                    
                </div>
            </div>
            <div class="card-body">
                <!--begin::Form-->
                <div class="row">
                    <div class="col-xl-2"></div>
                    <div class="col-xl-8">
                        <div class="my-5">
                            <h3 class="text-dark font-weight-bold mb-10">Company`s Info:</h3>

                            <div class="form-group row">
                                <label class="col-3">Company Name</label>
                                <div class="col-9">
                                    <input type="text" class="form-control  {{ $errors->has('company_name') ? 'is-invalid' : '' }}" name="company_name" placeholder="Enter Company Name" value="{{ $userDetails->company_name }}" />
                                    @error('company_name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Mobile No</label>
                                <div class="col-9">
                                    <input type="text" class="form-control  {{ $errors->has('mobile_no') ? 'is-invalid' : '' }}" name="mobile_no" placeholder="Enter Sort Title" value="{{ $userDetails->mobile_no }}" />
                                    @error('mobile_no')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Whatsapp No</label>
                                <div class="col-9">
                                    <input type="text" class="form-control  {{ $errors->has('whatsapp_no') ? 'is-invalid' : '' }}" name="whatsapp_no" placeholder="Enter Sort Title" value="{{ $userDetails->whatsapp_no }}" />
                                    @error('whatsapp_no')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Email</label>
                                <div class="col-9">
                                    <input type="email" class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" placeholder="Enter Sort Title" value="{{ $userDetails->email }}" />
                                    @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Address</label>
                                <div class="col-9">
                                    <textarea class="form-control  {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" value="{{ $userDetails->address }}" placeholder="Enter address" id="address" style=" min-width:200px; max-width:100%;min-height:75px;height:100%;width:100%;">{{ $userDetails->address }}</textarea>
                                    @error('address')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Seller Id</label>
                                <div class="col-9">
                                    <input type="text" class="form-control  {{ $errors->has('seller_id') ? 'is-invalid' : '' }}" name="seller_id" placeholder="Enter Sort Title" value="{{ $userDetails->seller_id }}" />
                                    @error('seller_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Discount</label>
                                <div class="col-9">
                                    <div class="input-group mb-3">
                                        <input type="number" placeholder="discount" step=".01" class="form-control  {{ $errors->has('discount') ? 'is-invalid' : '' }}" name="discount" placeholder="Discount" value="{{ $userDetails->discount }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                    @error('discount')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Commission</label>
                                <div class="col-9">
                                    <div class="input-group mb-3">
                                        <input type="number" placeholder="commission" step=".01" class="form-control  {{ $errors->has('commission') ? 'is-invalid' : '' }}" name="commission" placeholder="Commission" value="{{ $userDetails->discount }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                    </div>
                                    @error('commission')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Account Balance</label>
                                <div class="col-9">
                                    <input id="account_balance" type="number" class="form-control {{ $errors->has('account_balance') ? 'is-invalid' : '' }}" name="account_balance" value="{{ $userDetails->account_balance }}" placeholder="Account Balance">
                                    @error('account_balance')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Role</label>
                                <div class="col-9">
                                    <select id="role" name="role" class="form-control  customrequired {{ $errors->has('role') ? 'is-invalid' : '' }}">
                                        @if($userDetails->role == 1)
                                        <option value="1" {{$userDetails->role  == 1 ? 'selected' : ''}}>Super Admin</option>
                                        @endif
                                        @foreach($roleList as $role)
                                        @if($role->id != 1)
                                        <option value="{{$role->id}}" {{$role->id == $userDetails->role ? 'selected' : ''}}>{{$role->title}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3">Password</label>
                                <div class="col-9">
                                    <input class="form-control  customrequired mb-3" type="password" placeholder="Password" name="password" />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <input class="form-control  customrequired " type="password" placeholder="Confirm Password" name="password_confirmation" />
                                </div>
                            </div>
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
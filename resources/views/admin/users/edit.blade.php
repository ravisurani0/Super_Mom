@extends('layouts.app', ['page_title'=>'User'])

@section('content')
<div class="container">
    @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif
    <form class="form" id="productform" method="POST" action="{{route('users.update',['user'=>$user->id])}}">
        @method('PUT')
        @csrf
        <div class="card card-custom card-sticky" id="kt_page_sticky_card">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        {{-- <i class="fas fa-shopping-bag text-primary"></i> --}}
                    </span>
                    <h3 class="card-label"> Create Company
                        <i class="mr-2"></i>
                        {{-- <small class="">Create Company .!</small> --}}
                    </h3>
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('users.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                        <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary font-weight-bolder">
                            <i class="ki ki-check icon-sm"></i>Save</button>
                    </div>
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
                                    <input type="text" class="form-control  {{ $errors->has('company_name') ? 'is-invalid' : '' }}" name="company_name" placeholder="Enter Company Name" value="{{ $user->company_name }}" />
                                    @error('company_name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Mobile No</label>
                                <div class="col-9">
                                    <input type="text" class="form-control  {{ $errors->has('mobile_no') ? 'is-invalid' : '' }}" name="mobile_no" placeholder="Enter Sort Title" value="{{ $user->mobile_no }}" />
                                    @error('mobile_no')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Whatsapp No</label>
                                <div class="col-9">
                                    <input type="text" class="form-control  {{ $errors->has('whatsapp_no') ? 'is-invalid' : '' }}" name="whatsapp_no" placeholder="Enter Sort Title" value="{{ $user->whatsapp_no }}" />
                                    @error('whatsapp_no')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Email</label>
                                <div class="col-9">
                                    <input type="email" class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" placeholder="Enter Sort Title" value="{{ $user->email }}" />
                                    @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Address</label>
                                <div class="col-9">
                                    <textarea class="form-control  {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" value="{{ $user->address }}" placeholder="Enter address" id="address" style=" min-width:200px; max-width:100%;min-height:75px;height:100%;width:100%;">{{ $user->address }}</textarea>
                                    @error('address')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Seller Id</label>
                                <div class="col-6">
                                    <input type="text" class="form-control {{ $errors->has('seller_id') ? 'is-invalid' : '' }}" name="seller_id" placeholder="Enter Sort Title" value="{{ $user->seller_id }}" />
                                    @error('seller_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-3 ">
                                    @if($user->seller_id )
                                    @if(!$user->user_status)
                                    <button type='button' class='btn btn-primary btn-sm h-100 ' onclick="aproveSeller({{$user->id}},1)">Aprove</button>
                                    @endif
                                    @if(!$user->is_block || $user->user_status)
                                    <button type='button' class='btn btn-danger btn-sm h-100 mx-2' onclick="aproveSeller({{$user->id}},0)">Block</button>
                                    @endif
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Discount</label>
                                <div class="col-9">
                                    <div class="input-group mb-3">
                                        <input type="number" placeholder="discount" step=".01" class="form-control  {{ $errors->has('discount') ? 'is-invalid' : '' }}" name="discount" placeholder="Discount" value="{{ $user->discount }}">
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
                                        <input type="number" placeholder="commission" step=".01" class="form-control  {{ $errors->has('commission') ? 'is-invalid' : '' }}" name="commission" placeholder="Commission" value="{{ $user->discount }}">
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
                                    <input id="account_balance" type="number" class="form-control {{ $errors->has('account_balance') ? 'is-invalid' : '' }}" name="account_balance" value="{{ $user->account_balance }}" placeholder="Account Balance">
                                    @error('account_balance')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Role</label>
                                <div class="col-9">
                                    <select id="role" name="role" class="form-control  customrequired {{ $errors->has('role') ? 'is-invalid' : '' }}">
                                        @if($user->role == 1)
                                        <option value="1" {{$user->role  == 1 ? 'selected' : ''}}>Super Admin</option>
                                        @endif
                                        @foreach($roleList as $role)
                                        @if($role->id != 1)
                                        <option value="{{$role->id}}" {{$role->id == $user->role ? 'selected' : ''}}>{{$role->title}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
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
@section('scripts')
<script>
    function aproveSeller(sellerId, status) {
        if (confirm('Are you sure to ' + (status ? 'Aprove' : 'Reject') + '?') == true) {
            $.post("{{ route('users.approve_seller_id') }}", {
                    "_token": "{{ csrf_token() }}",
                    'sellerId': sellerId,
                    'status': status,
                },
                function(data, status) {
                    window.location.reload();

                });
        }
    }
</script>
@endsection
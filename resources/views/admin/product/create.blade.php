@extends('layouts.app')

@section('content')
<div class="container">

    @if (Session::has('product-attribute'))
    <div class="alert alert-danger">
        {{ Session::get('product-attribute') }}
    </div>
    @endif
    @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif
    <form class="form" id="productform" method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        <div class="card card-custom card-sticky" id="kt_page_sticky_card">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        {{-- <i class="fas fa-shopping-bag text-primary"></i> --}}
                    </span>
                    <h3 class="card-label"> Create Product
                        <i class="mr-2"></i>
                        {{-- <small class="">create product .!</small> --}}
                    </h3>
                </div>
                <div class="card-toolbar">
                    @csrf
                    <a href="{{ route('products.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
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
                            <h3 class="text-dark font-weight-bold mb-10">Produst`s Info:</h3>

                            <div class="form-group row">
                                <label class="col-3">Title</label>
                                <div class="col-9">
                                    <input type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" placeholder="Enter Name" value="{{ old('name') }}" />
                                    @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Sort Title</label>
                                <div class="col-9">
                                    <input type="text" class="form-control  {{ $errors->has('short_name') ? 'is-invalid' : '' }}" name="short_name" placeholder="Enter Sort Title" value="{{ old('short_name') }}" />
                                    @error('short_name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Description</label>
                                <div class="col-9">
                                    <textarea class="form-control  {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" value="{{ old('description') }}" placeholder="Enter Description" id="description" style=" min-width:200px; max-width:100%;min-height:75px;height:100%;width:100%;">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Price</label>
                                <div class="col-9">
                                    <div class="input-group mb-3">

                                        <input type="number" placeholder="price" step=".01" class="form-control  {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" placeholder="Enter Price" value=" {{ old('price') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">₹</span>
                                        </div>
                                    </div>
                                    @error('price')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Select GST</label>
                                <div class="col-9">
                                    <select id="gst_rate" name="gst_rate" class="form-control  customrequired {{ $errors->has('gst_rate') ? 'is-invalid' : '' }}">
                                        <option value="">Select GST</option>
                                        <option value="5">5% gst</option>
                                        <option value="12">12% gst</option>
                                        <option value="18">18% gst</option>
                                        <option value="28">28% gst</option>
                                    </select>

                                    @error('gst')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">HSN Code</label>
                                <div class="col-9">
                                    <input id="hsn_code" type="number" class="form-control {{ $errors->has('hsn_code') ? 'is-invalid' : '' }}" name="hsn_code" value="{{ old('hsn_code') }}" placeholder="HSN Code">
                                    @error('hsn_code')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Carton Capacity</label>
                                <div class="col-9">
                                    <input id="carton_capacity" type="number" class="form-control {{ $errors->has('carton_capacity') ? 'is-invalid' : '' }}" name="carton_capacity" value="{{ old('carton_capacity') }}" min="0">
                                    @error('carton_capacity')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Order</label>
                                <div class="col-9">
                                    <input id="order" type="number" class="form-control {{ $errors->has('order') ? 'is-invalid' : '' }}" name="order" value="{{ old('order') }}" min="0">
                                    @error('order')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" id="image">
                                <label class="col-3"> Image</label>
                                <div class="col-9">
                                    <input id="image" type="file" class="form-control" name="image" accept="image/*">
                                    @error('image')
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

<script src="{{asset('plugins/global/plugins.bundle.js')}}"></script>

<link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
{{-- <script src="{{asset('plugins/global/plugins.bundle.js')}}"></script> --}}
<script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('js/scripts.bundle.js') }}"></script>
<script src="{{ asset('css/style.bundle.css') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{ asset('custom/js/product.js') }}"></script>
<script src="{{ asset('plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>
<script src="{{ asset('js/pages/crud/forms/editors/ckeditor-classic.js') }}"></script>
<script src="//cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<script src="{{ asset('js/pages/crud/forms/editors/ckeditor.js') }}"></script>
@endsection
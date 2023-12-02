@extends('layouts.app', ['page_title'=>'Product'])

@section('content')
<div class="container">

    @if (Session::has('product-attribute'))
    <div class="alert alert-danger">
        {{ Session::get('product-attribute') }}
    </div>
    @endif
    <!-- @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif -->
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
                                    <input type="text" class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" placeholder="Enter Name" value="{{ old('name') }}" onKeyUp="setCMSKey(this)" />
                                    @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Slug</label>
                                <div class="col-9">
                                    <input type="text" class="form-control  {{ $errors->has('slug') ? 'is-invalid' : '' }}" name="slug" id="slug" placeholder="Enter Slug" value="{{ old('slug') }}" readonly />
                                    @error('slug')
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
                                <label class="col-3">Category</label>
                                <div class="col-9">
                                    <select class="form-control  customattributerequired {{ $errors->has('category.*') ? 'is-invalid' : '' }} " id="category" name="category">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->title }}
                                        </option>
                                        @endforeach

                                    </select>
                                    @error('category.*')
                                    <span class="invalid-feedback">Category is required.</span>
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

                                    @error('gst_rate')
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
                                <label class="col-3">Serial Order</label>
                                <div class="col-9">
                                    <input id="sort_order" type="number" class="form-control {{ $errors->has('sort_order') ? 'is-invalid' : '' }}" name="sort_order" value="{{ old('sort_order')?old('sort_order'):0 }}" min="0">
                                    @error('sort_order')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Select Any</label>
                                <div class="col-9">
                                    <label class="form-group checkbox checkbox-circle checkbox-primary">
                                        <input type="checkbox" name="is_best_seller" id="is_best_seller" {{ old('is_best_seller') == 1 ? 'checked' : '' }} value="1">Bestseller
                                        <span></span></label>
                                    <label class="form-group checkbox checkbox-circle checkbox-primary">
                                        <input type="checkbox" name="is_new_product" id="is_new_product" {{ old('is_new_product') == 1 ? 'checked' : '' }} value="1">New Product
                                        <span></span></label>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Long Description</label>
                                <div class="col-9">
                                    <textarea class="form-control  {{ $errors->has('long_description') ? 'is-invalid' : '' }}" name="long_description" value="{{ old('long_description') }}" placeholder="Enter Long Description" id="long_description" style=" min-width:200px; max-width:100%;min-height:75px;height:100%;width:100%;">{{ old('long_description') }}</textarea>
                                    @error('long_description')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Meta Tag Keywords</label>
                                <div class="col-9">
                                    <input id="tags" class="form-control tagify" name="tags" placeholder="type..." value="{{ old('tags') }}" autofocus="" data-blacklist=".bbb,aaa">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Status</label>
                                <div class="col-9">
                                    <select id="status" name="status" class="form-control  customrequired {{ $errors->has('status') ? 'is-invalid' : '' }}">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <h3 class="text-dark font-weight-bold mb-10">Produst`s image:</h3>
                            <div class="form-group row" id="image">
                                <label class="col-3">Gallery Image</label>
                                <div class="col-9">
                                    <input class="form-control" type="file" id="files" name="gallery_image[]" id="gallery_image" accept="image/*" multiple>
                                    @error('image')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <div>
                    <div class="d-flex justify-content-between">
                        <h3 class="text-dark font-weight-bold mb-10">Additional Info:</h3>
                    </div>
                    <table class="table">
                        <thead>
                            <th style="width:10%">Sort Order</th>
                            <th style="width:30%">Title</th>
                            <th style="width:60%">Details</th>
                            <th style="width:20%">Action</th>
                        </thead>
                        <tbody id="additional_info">
                            <!-- <tr>
                                <td>
                                    <input class="form-control " type="number" id="sortOrder" name="sortOrder[]" value="` + additionalInfoCounter + `" min='0' />
                                </td>
                                <td>
                                    <input class="form-control" type="text" id="title" name="title[]" />
                                </td>
                                <td>
                                    <textarea class="form-control " name="details[]" value="" placeholder="Enter Long Description" id="details"></textarea>
                                </td>
                                <td>
                                    <button type="button" class=" btn btn-sm btn-danger h-100" onclick="removeAdditionalInfo(` + additionalInfoCounter + `)">Remove</button>
                                </td>
                            </tr> -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <td><button type="button" class="btn btn-primary btn-sm h-100" onclick="addNewDetails()">Add</button></td>

                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </form>
</div>
@endsection
<script>
    var additionalInfoCounter = 1

    function addNewDetails() {
        var html = `
        <tr id="additional_info_` + additionalInfoCounter + `">
            <td>
                <input class="form-control " type="number" id="sortOrder" name="sortOrder[]" value="` + additionalInfoCounter + `" min='0' />
            </td>
            <td>
                <input class="form-control" type="text" id="title" name="title[]" />
            </td>
            <td>
                <textarea class="form-control " name="details[]" value="" placeholder="Enter Long Description" id="details"></textarea>
            </td>
            <td>
                <button type="button" class=" btn btn-sm btn-danger h-100" onclick="removeAdditionalInfo(` + additionalInfoCounter + `)">Remove</button>
            </td>
        </tr>
            `

        $('#additional_info').append(html)
        additionalInfoCounter++;
    }

    function removeAdditionalInfo(id) {
        document.getElementById('additional_info_' + id).remove()
    }
</script>
<script>
    function setCMSKey(event) {
        document.getElementById('slug').value = event.value.trim().replaceAll(' ', '_').toLowerCase();
    }
</script>
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

<script>
    $(document).ready(function() {
        var inputTag = document.querySelector("#tags");
        new Tagify(inputTag);
    });
    CKEDITOR.config.allowedContent = true;
    CKEDITOR.replace('long_description');
</script>
@endsection
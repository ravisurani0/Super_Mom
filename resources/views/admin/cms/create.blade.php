@extends('layouts.app', ['page_title'=>'CMS'])

@section('content')
<div class="container">

    @if (Session::has('categorys-attribute'))
    <div class="alert alert-danger">
        {{ Session::get('categorys-attribute') }}
    </div>
    @endif
    @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif
    <form class="form" id="categorysform" method="POST" action="{{ route('cms.store') }}" enctype="multipart/form-data">
        <div class="card card-custom card-sticky" id="kt_page_sticky_card">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        {{-- <i class="fas fa-shopping-bag text-primary"></i> --}}
                    </span>
                    <h3 class="card-label"> Create CMS
                        <i class="mr-2"></i>
                        {{-- <small class="">Create CMS.!</small> --}}
                    </h3>
                </div>
                <div class="card-toolbar">
                    @csrf
                    <a href="{{ route('cms.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
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

                            <h3 class="text-dark font-weight-bold mb-10">CMS`s Info:</h3>

                            <div class="form-group row">
                                <label class="col-3">Title</label>
                                <div class="col-9">
                                    <input type="text" class="form-control  {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" placeholder="Enter Category Name" value="{{ old('title') }}" onChange="setCMSKey(this)" />
                                    @error('title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Page</label>
                                <div class="col-9">
                                    <select id="page_id" name="page_id" class="form-control {{ $errors->has('page_id') ? 'is-invalid' : '' }}">
                                        @foreach($pages as $page)
                                        <option value="{{$page->id}}">{{$page->title}}</option>
                                        @endforeach
                                    </select> @error('sub_title')
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
                            <div class="form-group row" id="image">
                                <label class="col-3">CMS Key</label>
                                <div class="col-9">
                                    <input type="text" class="form-control  {{ $errors->has('cms_key') ? 'is-invalid' : '' }}" name="cms_key" placeholder="Enter Sub Title" id="cms_key" value="{{ old('cms_key') }}" readonly />
                                    @error('cms_key')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row" id="image">
                                <label class="col-3">CMS Field Type</label>
                                <div class="col-9">
                                    <select id="field_type" name="field_type" class="form-control  customrequired {{ $errors->has('field_type') ? 'is-invalid' : '' }}" onChange="onCMSTypeChange(this)">
                                        <option value="text">Text</option>
                                        <option value="link">Link</option>
                                        <option value="img">image</option>
                                    </select> @error('field_type')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row" id="image">
                                <label class="col-3">CMS Value</label>
                                <div class="col-9">
                                    <div id="cms_value_container" class="row ">
                                        <div class="col-12">
                                            <input type="text" class="form-control  {{ $errors->has('cms_value') ? 'is-invalid' : '' }}" name="cms_value" value="{{ old('cms_value') }}" placeholder="Enter CMS Value" id="cms_value" />
                                        </div>
                                    </div>
                                    @error('cms_value')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Meta Tag Keywords</label>
                                <div class="col-9">
                                    <input type="text" id="tags" class="form-control tagify" name="tags" placeholder="type..." value="{{ old('tags') }}" data-blacklist=".bbb,aaa">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
<style>
     .tagify__input{
        display: block !important;
        min-width: 110px !important;
        margin: 0px !important;
        height: calc(1.5em + 1.3rem + 2px) !important;
        padding: 0.65rem 1rem !important;
        font-size: 1rem !important;
        font-weight: 400 !important;
        line-height: 1.5 !important;
    } 
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
    function onCMSTypeChange(event) {
        let html = ``;
        if (event.value == 'text') {
            html = `<div class="col-12">
            <textarea class="form-control  {{ $errors->has('cms_value') ? 'is-invalid' : '' }}" name="cms_value" value="{{ old('cms_value') }}" placeholder="Enter CMS Value" id="cms_value" style=" min-width:200px; max-width:100%;min-height:75px;height:100%;width:100%;">{{ old('cms_value') }}</textarea>
            </div>`;
        } else if (event.value == 'link') {
            html = `<div class="col-12">
            <input type="text" class="form-control  {{ $errors->has('cms_value') ? 'is-invalid' : '' }}" name="cms_value" value="{{ old('cms_value') }}" placeholder="Enter CMS Value" id="cms_value"/>
            </div>`;
        } else if (event.value == 'img') {
            html = `<div class="col-8">
            <input class="form-control" type="file" id="files" name="cms_value_img" id="cms_value_img" accept="image/*" />
                @error('cms_value_img')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-4">
            <img width="210px" class='' style='margin-top:-14px' height='auto' src="{{url('images/productGallary/')}}" alt="Product Base" />
            </div>`;
        }
        document.getElementById('cms_value_container').innerHTML = html;

        if (event.value == 'text') {
            CKEDITOR.config.allowedContent = true;
            CKEDITOR.replace('cms_value');
        }
    }

    function setCMSKey(event) {
        document.getElementById('cms_key').value = event.value.trim().replaceAll(' ', '_').toLowerCase();
    }
</script>

<link href="{{asset('plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
<script src="{{asset('plugins/global/plugins.bundle.js')}}"></script>
<script src="//cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>
<script src="{{ asset('js/pages/crud/forms/editors/ckeditor.js') }}"></script>
<script>
    $(document).ready(function() {
        var inputTag = document.querySelector("#tags");
        new Tagify(inputTag);
    });
    CKEDITOR.config.allowedContent = true;
    CKEDITOR.replace('cms_value');
</script>
@endsection
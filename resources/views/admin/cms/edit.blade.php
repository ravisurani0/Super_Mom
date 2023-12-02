@extends('layouts.app', ['page_title'=>'CMS'])

@section('content')
<div class="container">
    @if (Session::has('newly-launch'))
    <div class="alert alert-danger">
        {{ Session::get('newly-launch') }}
    </div>
    @endif
    @if (Session::has('CMS-attribute'))
    <div class="alert alert-danger">
        {{ Session::get('CMS-attribute') }}
    </div>
    @endif
    @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif
    <form class="form" method="POST" action="{{ route('cms.update',['cm'=>$cm->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card card-custom card-sticky" id="kt_page_sticky_card">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        {{-- <i class="fas fa-shopping-bag text-primary"></i> --}}
                    </span>
                    <h3 class="card-label"> Update CMS
                        <i class="mr-2"></i>
                        {{-- <small class="">Update CMS .!</small> --}}
                    </h3>
                </div>
                <div class="card-toolbar">
                    <a href="{{ $cm->page_id  == 6 ? route('contactCms') : route('cms.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
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
                                    <input type="text" class="form-control  {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" id="cms_title" placeholder="Enter Title" value="{{ $cm->title }}" />
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
                                        <option value="{{$page->id}}" {{$page->id == $cm->page_id ? 'selected' : '' }}>{{$page->title}}</option>
                                        @endforeach
                                    </select> @error('sub_title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Description</label>
                                <div class="col-9">
                                    <textarea class="form-control  {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" value="{{ old('description') }}" placeholder="Enter Description" id="description" style=" min-width:200px; max-width:100%;min-height:75px;height:100%;width:100%;">{{$cm->description }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row" id="image">
                                <label class="col-3">CMS Key</label>
                                <div class="col-9">
                                    <input type="text" class="form-control  {{ $errors->has('cms_key') ? 'is-invalid' : '' }}" name="cms_key" placeholder="Enter Sub Title" value="{{ $cm->cms_key }}" id="cms_key" readonly />
                                    @error('cms_key')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row" id="image">
                                <label class="col-3">CMS Field Type</label>
                                <div class="col-9">
                                    <select id="field_type" name="field_type" class="form-control  customrequired {{ $errors->has('field_type') ? 'is-invalid' : '' }}" onChange="onCMSTypeChange(this)">
                                        <option value="text" {{ $cm->field_type=='text' ? 'selected' : '' }}>Text</option>
                                        <option value="link" {{ $cm->field_type=='link' ? 'selected' : '' }}>Link</option>
                                        <option value="img" {{ $cm->field_type=='img' ? 'selected' : '' }}>Image</option>
                                    </select> @error('field_type')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row" id="image">
                                <label class="col-3">CMS Value</label>
                                <div class="col-9">
                                    <div id="cms_value_container" class="row ">
                                        @if( $cm->field_type=='text')
                                        <div class="col-12">
                                            <textarea class="form-control  {{ $errors->has('cms_value') ? 'is-invalid' : '' }}" name="cms_value" value="{{ old('cms_value') }}" placeholder="Enter Long Description" id="cms_value" style=" min-width:200px; max-width:100%;min-height:75px;height:100%;width:100%;">{{ $cm->cms_value }}</textarea>
                                            @error('cms_value')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        @elseif( $cm->field_type=='link')
                                        <div class="col-12">
                                            <input type="text" class="form-control  {{ $errors->has('cms_value_text') ? 'is-invalid' : '' }}" name="cms_value_text" value="{{ $cm->cms_value }}" placeholder="Enter CMS Value" id="cms_value_text" />
                                        </div>
                                        @elseif( $cm->field_type=='img')
                                        <div class="col-8">
                                            <input class="form-control" type="file" id="cms_value_img" name="cms_value_img" accept="image/*" />
                                            @error('cms_value_img')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-4">
                                            <img width="210px" class="form-control" style='margin-top:-14px;width: 13rem;height: 10rem;' name="cms_value_img" height='auto' src="{{url('storage/images/cms/'.$cm->cms_value)}}" alt="Product Base" />
                                        </div>
                                        @endif
                                    </div>
                                    @error('cms_value')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Meta Tag Keywords</label>
                                <div class="col-9">
                                    <input type="text" id="tags" class="form-control h-100" name="tags" placeholder="type..." value="{{ isset($cm['tags']) ? $cm['tags'] : old('tags') }}" autofocus="" data-blacklist=".bbb,aaa">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Status</label>
                                <div class="col-9">
                                    <select id="status" name="status" class="form-control  customrequired ">
                                        <option value="1" {{$cm->status == '1' ? 'selected' : ''}}>Active</option>
                                        <option value="0" {{$cm->status == '0' ? 'selected' : ''}}>Inactive</option>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>

<script>
    function onCMSTypeChange(event) {

        let html = ``;
        if (event.value == 'text') {
            html = `<div class="col-12">
                        <textarea class="form-control  {{ $errors->has('cms_value') ? 'is-invalid' : '' }}" name="cms_value" value="" placeholder="Enter CMS Value" id="cms_value" style=" min-width:200px; max-width:100%;min-height:75px;height:100%;width:100%;">{{ old('cms_value') }}</textarea>
                    </div>`;
        } else if (event.value == 'link') {
            html = `<div class="col-12">
                        <input type="text" class="form-control  {{ $errors->has('cms_value') ? 'is-invalid' : '' }}" name="cms_value" value="" placeholder="Enter CMS Value" id="cms_value"/>
                    </div>`;
        } else if (event.value == 'img') {
            html = `<div class="col-8">
                        <input class="form-control" type="file" id="files" name="cms_value_img" id="cms_value_img" accept="image/*" />
                        @error('cms_value_img')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-4">
                        <img width="210px" class='' style='margin-top:-14px' height='auto'  name="cms_value" id="cms_value" src="{{url('images/cms/')}}" alt="Product Base" />
                    </div>`;
        }
        document.getElementById('cms_value_container').innerHTML = html;

        if (event.value == 'text') {
            CKEDITOR.config.allowedContent = true;
            CKEDITOR.replace('cms_value');
        }
    }

    // function setCMSKey(event) {
    //     console.log('asdasdasd');
    //     document.getElementById('cms_key').value = event.value.trim().replaceAll(' ', '_').toLowerCase();
    // }
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
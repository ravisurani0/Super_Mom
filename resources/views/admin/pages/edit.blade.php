@extends('layouts.app', ['page_title'=>'Page'])

@section('content')
<div class="container">
    @if (Session::has('newly-launch'))
    <div class="alert alert-danger">
        {{ Session::get('newly-launch') }}
    </div>
    @endif
    @if (Session::has('page-attribute'))
    <div class="alert alert-danger">
        {{ Session::get('product-attribute') }}
    </div>
    @endif
    @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif
    <form class="form" id="productform" method="POST" action="{{ route('page.update',['page'=>$page->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card card-custom card-sticky" id="kt_page_sticky_card">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        {{-- <i class="fas fa-shopping-bag text-primary"></i> --}}
                    </span>
                    <h3 class="card-label"> Update Page
                        <i class="mr-2"></i>
                        {{-- <small class="">Update Page .!</small> --}}
                    </h3>
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('page.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
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
                            <h3 class="text-dark font-weight-bold mb-10">Page`s Info:</h3>

                            <div class="form-group row">
                                <label class="col-3">Title</label>
                                <div class="col-9">
                                    <input type="text" class="form-control  {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" placeholder="Enter Title" value="{{ $page->title }}" />
                                    @error('title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-3">Description</label>
                                <div class="col-9">
                                    <textarea class="form-control  {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" value="{{ $page->description }}" placeholder="Enter Description" id="description" style=" min-width:200px; max-width:100%;min-height:75px;height:100%;width:100%;">{{ $page->description }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row" id="sub_title">
                                <label class="col-3"> Sub Ttitle</label>
                                <div class="col-9">
                                    <input id="sub_title" type="text" class="form-control  {{ $errors->has('sub_title') ? 'is-invalid' : '' }}" name="sub_title" value="{{ $page->sub_title }}" />
                                    @error('sub_title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Slug</label>
                                <div class="col-9">
                                <input type="text" class="form-control  {{ $errors->has('slug') ? 'is-invalid' : '' }}" name="slug" placeholder="Enter Slug " id="slug" value="{{ $page->slug }}" readonly />
                                    @error('slug')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-3">Status</label>
                                <div class="col-9">
                                    <select id="status" name="status" class="form-control  customrequired ">
                                        <option value="1" {{$page->status == '1' ? 'selected' : ''}}>Active</option>
                                        <option value="0" {{$page->status == '0' ? 'selected' : ''}}>Inactive</option>
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

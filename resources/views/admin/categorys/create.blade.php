@extends('layouts.app', ['page_title' => 'Category'])

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (Session::has('categorys-attribute'))
                    <div class="alert alert-danger">
                        {{ Session::get('categorys-attribute') }}
                    </div>
                @endif
                @if ($errors->any())
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                @endif
                <form class="form" id="categorysform" method="POST" action="{{ route('categorys.store') }}"
                    enctype="multipart/form-data">
                    <div class="card card-custom " id="kt_page_sticky_card">
                        <div class="card-header flex-wrap">
                            <div class="card-title">
                                <span class="card-icon">
                                    {{-- <i class="fas fa-shopping-bag text-primary"></i> --}}
                                </span>
                                <h3 class="card-label"> Create category
                                    <i class="mr-2"></i>
                                    {{-- <small class="">Create Category.!</small> --}}
                                </h3>
                            </div>
                            <div class="card-toolbar">
                                @csrf
                                <a href="{{ route('categorys.index') }}"
                                    class="btn btn-light-primary font-weight-bolder mr-2">
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

                                        <h3 class="text-dark font-weight-bold mb-10">Category`s Info:</h3>

                                        <div class="form-group row">
                                            <label class="col-3">Title</label>
                                            <div class="col-9">
                                                <input type="text"
                                                    class="form-control  {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                                    name="title" placeholder="Enter Category Name"
                                                    value="{{ old('title') }}" onKeyUp="setCMSKey(this)" />
                                                @error('title')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3">Description</label>
                                            <div class="col-9">
                                                <textarea class="form-control  {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description"
                                                    value="{{ old('description') }}" placeholder="Enter Description" id="description"
                                                    style=" min-width:200px; max-width:100%;min-height:75px;height:100%;width:100%;">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3">Slug</label>
                                            <div class="col-9">
                                                <input type="text"
                                                    class="form-control  {{ $errors->has('slug') ? 'is-invalid' : '' }}"
                                                    name="slug" id="slug" placeholder="Enter Slug"
                                                    value="{{ old('slug') }}" readonly />
                                                @error('slug')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row" id="image">
                                            <label class="col-3"> Image</label>
                                            <div class="col-9">
                                                <input id="image" type="file" class="form-control" name="image"
                                                    accept="image/*">
                                                @error('image')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3">Meta Tag Keywords</label>
                                            <div class="col-9">
                                                <input id="tags" class="form-control tagify" name="tags"
                                                    placeholder="type..." value="{{ old('tags') }}" autofocus=""
                                                    data-blacklist=".bbb,aaa">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-3">Status</label>
                                            <div class="col-9">
                                                <select id="status" name="status"
                                                    class="form-control  customrequired {{ $errors->has('status') ? 'is-invalid' : '' }}">
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
        </div>
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

<script>
    function setCMSKey(event) {
        document.getElementById('slug').value = event.value.trim().replaceAll(' ', '_').toLowerCase();
    }
</script>


@section('scripts')
    <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>

    <script>
        $(document).ready(function() {
            var inputTag = document.querySelector("#tags");
            new Tagify(inputTag);
        });
    </script>
@endsection

@extends('layouts.app', ['page_title'=>'CMS'])
{{-- @include('partials.flash-message') --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{-- <div class="card"> --}}
            <div class="card card-custom">

                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">CMS List
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('cms.create') }}" class="btn btn-sm btn-primary font-weight-bolder btn-sm"><i class="fa fa-plus"></i>New Cms</a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- <div class="row mb-3">

                        <div class="card-toolbar col-md-4">
                            <label class="font-weight-bold"> Search By Title</label>
                            <input type="text" class="form-control filter" name="title" id="search_title" placeholder="Search by Title" />
                        </div>
                        <div class="card-toolbar col-md-4">
                            <label class="font-weight-bold"> Search By HSN/SKU</label>
                            <input type="text" class="form-control filter" name="search_sku_hsn" id="search_sku_hsn" placeholder="Search by SKU,HSN" />
                        </div>
                        <div class="card-toolbar col-md-4">
                            <label class="font-weight-bold"> Search By Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">In Active</option>
                            </select>
                        </div>
                    </div> -->
                    <table class="table table-bordered data-table ">
                        <thead>
                            <tr class="text-center">

                                <th>id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Service</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            dom: "lrtip",
            "bStateSave": true,
            "fnStateSave": function(oSettings, oData) {
                localStorage.setItem('DataTables', JSON.stringify(oData));
            },
            "fnStateLoad": function(oSettings) {
                return JSON.parse(localStorage.getItem('DataTables'));
            },
            ajax: {
                url: "/admin/contact-us",
                data: function(d) {}
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    visible: false

                },
                {
                    data: 'name',
                    name: 'name',
                    class: 'text-center'

                }, {
                    data: 'email',
                    name: 'email',
                    class: 'text-center'

                },
                {
                    data: 'service',
                    name: 'service',
                    class: 'text-center'

                },

                {
                    data: 'action',
                    orderable: false,
                    searchable: false,
                    width: "30%",
                    class: "text-center"
                },
            ]
        });

    });
</script>
@endsection
@extends('layouts.app', ['page_title'=>'Page'])
{{-- @include('partials.flash-message') --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{-- <div class="card"> --}}
            <div class="card card-custom">

                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Pages List
                    </div>
                    <div class="card-toolbar">
                        <a href="{{ route('page.create') }}" class="btn btn-sm btn-primary font-weight-bolder btn-sm"><i class="fa fa-plus"></i>New Page</a>
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
                                <th>Title</th>
                                <th>Status</th>
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
                url: "/admin/page",
                data: function(d) {
                    d.search_by_category = $('#category').val(),
                        d.search_by_title = $('#search_title').val(),
                        d.search_by_sku_hsn = $('#search_sku_hsn').val(),
                        d.search_by_status = $('#status').val()
                }
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    visible: false

                },
                {
                    data: 'title',
                    name: 'title',
                    class: 'text-center'

                },
                {
                    data: 'preview',
                    class: 'text-center',
                    "render": function(data, type, row, meta) {
                        return row.status ? 'Active' : 'InActive';
                    }
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

        $("#category").on("change", function() {
            table.draw();
        });
        $("#status").on("change", function() {
            table.draw();
        });
        $('#search_title').keyup(function() {
            table.draw();
        });
        $('#search_sku_hsn').keyup(function() {
            table.draw();
        });

    });
</script>
@endsection
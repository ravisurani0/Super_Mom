@extends('layouts.app')
{{-- @include('partials.flash-message') --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{-- <div class="card"> --}}
            <div class="card card-custom">

                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Order List
                    </div>
                    <!-- <div class="card-toolbar">
                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary font-weight-bolder btn-sm"><i class="fa fa-plus"></i>New
                            Company</a>
                    </div> -->
                </div>
                <div class="card-body">

                    <table class="table table-bordered data-table ">
                        <thead>
                            <tr class="text-center">
                                <th>Id</th>
                                <th>Company Name</th>
                                <th>Total</th>
                                <th>Transporter</th>
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
                url: "/admin/orders",
                data: function(d) {}
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    visible: false

                },
                {
                    data: 'preview',
                    class: 'text-center',
                    "render": function(data, type, row, meta) {
                        console.log('key----------------------', data);
                        return row.user.company_name;
                    }
                },
                {
                    data: 'order_subtotal',
                    name: 'order_subtotal',
                    class: 'text-center'

                },
                {
                    data: 'transporter',
                    name: 'transporter',
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
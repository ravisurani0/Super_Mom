@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-xxl-6">
            <!--begin::Stats Widget 11-->
            <div class="card card-custom card-stretch card-stretch gutter-b">


                <!--begin::Body-->
                <div class="card-body p-0">
                    <div class="card-spacer flex-grow-1">
                        <span class="font-weight-bold mt-2">Sellers</span>
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h1 class="text-dark-75 font-weight-bolder " style="font-size: xxx-large;">{{$totalSeller}}</h1>
                                <span class="text-muted font-weight-bold mt-2">Total Sellers</span>
                            </div>
                            <div class="d-flex flex-column text-right">
                                <span class="text-dark-75 font-weight-bolder font-size-h3">{{$requstedSeller}}</span>
                                <span class="text-muted font-weight-bold mt-2">New / Requsted Sellers</span>
                                <span class="text-dark-75 font-weight-bolder font-size-h3 mt-5">{{$activeSeller}}</span>
                                <span class="text-muted font-weight-bold mt-2">Active Sellers</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
        </div>
        <div class="col-lg-6 col-xxl-6">
            <!--end::Stats Widget 11-->
            <!--begin::Stats Widget 12-->
            <div class="card card-custom card-stretch card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body p-0">
                    <div class="card-spacer flex-grow-1">
                        <span class="font-weight-bold mt-2">Orders</span>
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <h1 class="text-dark-75 font-weight-bolder " style="font-size: xxx-large;">{{$totalOrder}}</h1>
                                <span class="text-muted font-weight-bold mt-2">Total Orders</span>
                            </div>
                            <div class="d-flex flex-column text-right">
                                <span class="text-dark-75 font-weight-bolder font-size-h3">{{$pendingOrder}}</span>
                                <span class="text-muted font-weight-bold mt-2">Pending Orders</span>
                                <span class="text-dark-75 font-weight-bolder font-size-h3 mt-5">{{$completedOrder}}</span>
                                <span class="text-muted font-weight-bold mt-2">Completed Orders</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
        </div>

        <div class="col-xxl-12 order-2 order-xxl-1">
            <!--begin::Advance Table Widget 2-->
            <div class="card card-custom mb-5">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Requesetd Seller Id</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered data-table ">
                        <thead>
                            <tr class="text-center">
                                <th>Id</th>
                                <th>Company Name</th>

                                <th>Mobile No</th>
                                <th>Seller Id</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--end::Advance Table Widget 2-->
        </div>

    </div>
</div>
@endsection
<style>
    .product-list::-webkit-scrollbar {
        width: 0 !important;
        display: none;
    }

    .order-list::-webkit-scrollbar {
        width: 0 !important;
        display: none;
    }
</style>
@section('scripts')
<script type="text/javascript">
    var table = null;
    $(document).ready(function() {
        table = $('.data-table').DataTable({
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
                url: "/admin/home",
                data: function(d) {

                }
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    visible: false

                },
                {
                    data: 'company_name',
                    name: 'company_name',
                    class: 'text-center'

                },
                {
                    data: 'mobile_no',
                    name: 'mobile_no',
                    class: 'text-center'

                },
                {
                    data: 'seller_id',
                    name: 'seller_id',
                    class: 'text-center'

                },
                {
                    class: 'text-center',
                    "render": function(data, type, row, meta) {
                        var data = "<button type='button' class='btn btn-primary btn-sm h-100' onclick='aproveSeller(" + row.id + ",1)'>Aprove</button>"
                        data += "<button type='button' class='btn btn-danger btn-sm h-100 mx-2' onclick='aproveSeller(" + row.id + ",0)'>Reject</button>"
                        return data;
                    },
                },
            ]
        });


        $('#search_sku_hsn').keyup(function() {
            table.draw();
        });

    });

    function aproveSeller(sellerId, status) {
        if (confirm('Are you sure to ' + (status ? 'Aprove' : 'Reject') + '?') == true) {
            $.post("{{ route('users.approve_seller_id') }}", {
                    "_token": "{{ csrf_token() }}",
                    'sellerId': sellerId,
                    'status': status,
                },
                function(data, status) {
                    table.draw();
                });
        }
    }
</script>
@endsection
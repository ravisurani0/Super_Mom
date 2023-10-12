@extends('layouts.app')

@section('content')
<div class="container">
    @php
    ;
    @endphp

    <div class="row">
        <div class="col-lg-6 col-xxl-4">
            <!--begin::Stats Widget 11-->
            <div class="card card-custom card-stretch card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body p-0">
                    <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                        <span class="symbol symbol-50 symbol-light-success mr-2">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-success">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5" />
                                            <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </span>
                        <div class="d-flex flex-column text-right">
                            <span class="text-dark-75 font-weight-bolder font-size-h3">₹</span>
                            <span class="text-muted font-weight-bold mt-2">Today Sales</span>
                            <span class="text-dark-75 font-weight-bolder font-size-h3 mt-5">
                                ₹</span>
                            <span class="text-muted font-weight-bold mt-2">Yesterday Sales</span>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
        </div>
        <div class="col-lg-6 col-xxl-4">
            <!--end::Stats Widget 11-->
            <!--begin::Stats Widget 12-->
            <div class="card card-custom card-stretch card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body p-0">
                    <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                        <span class="symbol symbol-50 symbol-light-primary mr-2">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-primary">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </span>
                        <div class="d-flex flex-column text-right">
                            <span class="text-dark-75 font-weight-bolder font-size-h3"></span>
                            <span class="text-muted font-weight-bold mt-2"> New Customers Today</span>
                            <span class="text-dark-75 font-weight-bolder font-size-h3 mt-5"></span>
                            <span class="text-muted font-weight-bold mt-2 mb-2">New Customers This Month</span>
                        </div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
        </div>
        <div class="col-lg-6 col-xxl-4">
            <!--end::Stats Widget 11-->
            <!--begin::Stats Widget 12-->
            <div class="card card-custom card-stretch card-stretch gutter-b">
                <!--begin::Body-->
                <div class="card-body p-0">
                    <div class="d-flex align-items-center justify-content-between card-spacer flex-grow-1">
                        <span class="symbol symbol-50 symbol-light-primary mr-2">
                            <span class="symbol-label">
                                <span class="svg-icon svg-icon-xl svg-icon-primary">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                            <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </span>
                        </span>
                        <div class="d-flex flex-column text-right">
                            <span class="text-dark-75 font-weight-bolder font-size-h3"></span>
                            <span class="text-muted font-weight-bold mt-2">Orders This Month</span>
                            <span class="text-dark-75 font-weight-bolder font-size-h3 mt-5"></span>
                            <span class="text-muted font-weight-bold mt-2">Orders Prev Month</span>
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
                        <h3 class="card-label">Recent Orders
                            <span class="d-block text-muted pt-2 font-size-sm">Past 7 days orders</span>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="datatable datatable-default datatable-primary datatable-loaded">
                        <table class="datatable-bordered datatable-head-custom datatable-table overflow-auto order-list" id="kt_datatable" style="display: block; height: 300px;">
                            <thead class="datatable-head">
                                <tr class="datatable-row" style="left: 0px;">
                                    {{-- <th class="datatable-cell datatable-toggle-detail"><span></span></th> --}}
                                    <th data-field="Order ID" class="datatable-cell datatable-cell-sort"><span style="width: 126px;">Order ID</span></th>
                                    <th data-field="Car Make" class="datatable-cell datatable-cell-sort"><span style="width: 126px;"> Customer</span></th>
                                    <th data-field="Order Date" class="datatable-cell datatable-cell-sort"><span style="width: 126px;">Order Date</span></th>

                                    <th data-field="Color" class="datatable-cell datatable-cell-sort"><span style="width: 126px;">total order value</span></th>

                                    <th data-field="Status" data-autohide-disabled="false" class="datatable-cell datatable-cell-sort"><span style="width: 126px;">Status</span></th>
                                    <th data-field="Type" data-autohide-disabled="false" class="datatable-cell datatable-cell-sort"><span style="width: 126px;">view
                                            order</span></th>
                                </tr>
                            </thead>
                            <tbody style="" class="datatable-body">

                            </tbody>
                        </table>
                    </div>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Advance Table Widget 2-->
        </div>
        <div class="col-xxl-12 order-2 order-xxl-1">
            <!--begin::Advance Table Widget 2-->
            <div class="card card-custom mb-5">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Low Stock Products
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->
                    <div class="datatable datatable-default datatable-primary datatable-loaded">
                        <table class="datatable-bordered datatable-head-custom datatable-table overflow-auto product-list" id="kt_datatable" style="display: block; height: 300px">
                            <thead class="datatable-head">
                                <tr class="datatable-row" style="left: 0px;">
                                    <th data-field="Order ID" class="datatable-cell datatable-cell-sort"><span style="width: 126px;">Product ID</span></th>
                                    <th data-field="Car Make" class="datatable-cell datatable-cell-sort"><span style="width: 126px;"> Product Name </span></th>

                                    <th data-field="Color" class="datatable-cell datatable-cell-sort"><span style="width: 126px;">Hsn Code</span></th>
                                    <th data-field="Color" class="datatable-cell datatable-cell-sort"><span style="width: 126px;">SKU</span></th>

                                    <th data-field="Status" data-autohide-disabled="false" class="datatable-cell datatable-cell-sort"><span style="width: 126px;">Stock</span></th>
                                    <th data-field="Type" data-autohide-disabled="false" class="datatable-cell datatable-cell-sort"><span style="width: 126px;">view
                                            Product</span></th>
                                </tr>
                            </thead>
                            <tbody style="" class="datatable-body ">

                            </tbody>
                        </table>
                    </div>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Advance Table Widget 2-->
        </div>
        <div class="col-xxl-12 order-2 order-xxl-1">
            <!--begin::Advance Table Widget 2-->
            <div class="card card-custom mb-5">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Sales This Months
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin: Datatable-->

                    <div id="google-line-chart" class="datatable datatable-default datatable-primary datatable-loaded" style="width: 100%; height: 400px;"></div>
                    <!--end: Datatable-->
                </div>
            </div>
            <!--end::Advance Table Widget 2-->
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Day', 'Days'],


            ]);

            var options = {
                title: 'Sales This Months',
                vAxis: {
                    title: 'Selling',
                    viewWindow: {
                        min: [0],
                    }
                },
                curveType: 'function',
                legend: {
                    position: 'bottom'
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('google-line-chart'));

            chart.draw(data, options);
        }
    </script>
    @endsection
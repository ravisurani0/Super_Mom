@extends('layouts.app', ['page_title'=>'Order'])

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
    <form class="form" method="POST" action="{{ route('orders.update',['order'=>$order->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card card-custom card-sticky" id="kt_page_sticky_card">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        {{-- <i class="fas fa-shopping-bag text-primary"></i> --}}
                    </span>
                    <h3 class="card-label"> Order Details Page
                        <i class="mr-2"></i>
                        {{-- <small class="">Order Details Page .!</small> --}}
                    </h3>
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('orders.index') }}" class="btn btn-light-primary font-weight-bolder mr-2">
                        <i class="ki ki-long-arrow-back icon-sm"></i>Back</a>
                    <div class="btn-group">
                        <button type="submit" class="btn btn-primary font-weight-bolder">
                            <i class="ki ki-check icon-sm"></i>Save</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!--begin::Form-->

                <div class="my-5">
                    <div class="d-flex justify-content-between ">
                        <h3 class="text-dark font-weight-bold mb-10">Order`s Details Info:</h3>
                        <a href="\admin\order-pdf\{{$order->id}}" class="btn btn-primary h-100 " target="_blank">Get Ordre Pdf</a>
                    </div>
                    <div class="row">
                        <div class="form-group row col-6">
                            <label class="col-3">Oreated By</label>
                            <div class="col-9">
                                <input type="text" class="form-control " name="title" placeholder="Enter Title" value="{{$order->user->company_name}}" disabled />
                                @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label class="col-3">Order Date</label>
                            <div class="col-9">
                                <input type="text" class="form-control " name="title" placeholder="Enter Title" value="{{$order->user->created_at}}" disabled />
                                @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label class="col-3">Sub Total</label>
                            <div class="col-9 input-group ">
                                <input type="text" class="form-control " name="title" placeholder="Enter Title" value="{{ number_format($order->order_subtotal, 2) }}" disabled />
                                <div class="input-group-prepend">
                                    <div class="input-group-text">₹</div>
                                </div>
                            </div>
                            @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group row col-6">
                            <label class="col-3">Discount</label>
                            <div class="col-9 input-group ">
                                <input type="text" class="form-control " name="title" placeholder="Enter Title" value="{{ number_format($order->discount, 2) }}" disabled />
                                <div class="input-group-prepend">
                                    <div class="input-group-text">%</div>
                                </div>
                                @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label class="col-3">Tax Amount</label>
                            <div class="col-9 input-group ">
                                <input type="text" class="form-control " name="title" placeholder="Enter Title" value="{{ number_format($order->tax_amount, 2) }}" disabled />
                                <div class="input-group-prepend">
                                    <div class="input-group-text">₹</div>
                                </div>
                                @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row col-6">
                            <label class="col-3">Order Total</label>
                            <div class="col-9 input-group ">
                                <input type="text" class="form-control " name="title" placeholder="Enter Title" value="{{ number_format($order->order_total, 2) }}" disabled />
                                <div class="input-group-prepend">
                                    <div class="input-group-text">₹</div>
                                </div>
                                @error('title')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-bordered  w-100">
                    <t.head>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                        </thead>
                        <tbody>
                            @foreach($order->orderItems as $product)
                            <tr>
                                <td>{{$product->product->name}}</td>
                                <td>{{$product->qnt}}</td>
                                <td>₹ {{ number_format($product->price, 2) }}</td>
                                <td>
                                    <input type="checkbox" name="orderItems[]" id="is_best_seller" value="{{$product->id}}" {{ $product->status == 1 ? 'checked' : '' }} />
                                    &nbsp &nbsp &nbsp
                                    <span class="{{ $product->status == 1 ? 'text-success' : 'text-danger' }} p-2 border-radius">
                                        {{ $product->status == 1 ? 'Delivered' : 'Pending' }}
                                    </span>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>


                </table>
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

    .border-radius {
        border-radius: 1rem;
    }
</style>
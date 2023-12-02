@section('css_include')

@extends('layouts.front.main', ['page_title'=>$product->name,'description'=>$product->description,'tags'=>$product->tags])

@section('content')
<link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
<!-- [if lte IE 9]>
    <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
    </p>
    <![endif] -->

<main>

    <!-- page title area start  -->
    <section class="page-title-area-2 breadcrumb-spacing bg-theme-4 section-spacing">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-xxl-9">
                    <div class="page-title-wrapper-2 text-center">
                        <h1 class="page__title-2">{{$product->name}}</h1>
                        {{-- <div class="breadcrumb-menu-2 d-flex justify-content-center">
                            <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                <ul class="trail-items-2">
                                    <li class="trail-item-2 trail-begin"><a href="/"><span>Home</span></a></li>
                                    <li class="trail-item-2 trail-center"><a href="/category/{{$product->category[0]->slug}}"><span>{{$product->category[0]->title}}</span></a></li>
                        <li class="trail-item-2 trail-end"><span>{{$product->name}}</span></li>
                        </ul>
                        </nav>
                    </div> --}}
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- page title area start  -->


    <!-- shop details area start  -->
    <section class="shop-details-area section-spacing">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay=".3s">
                <div class="col-lg-6">
                    <div class="product-d-img-tab-wrapper mb-60">
                        <div class="product-d-img-nav">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @foreach($product->imageGallery as $index => $image)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ $index == 0 ? 'active' : '' }} " id="pro-{{$index}}-tab" data-bs-toggle="tab" data-bs-target="#pro-{{$index}}" type="button" role="tab" aria-controls="pro-{{$index}}" aria-selected="false">
                                        <img src="{{ $image->image }}" alt="image not found">
                                    </button>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="product-d-img-tab">
                            <div class="tab-content" id="productDetailsTab">
                                @foreach($product->imageGallery as $index => $image)
                                <div class="tab-pane fade  {{ $index == 0 ? 'active show' : '' }} " id="pro-{{$index}}" role="tabpanel" aria-labelledby="pro-{{$index}}-tab">
                                    <img class="active" src="{{ $image->image }}" alt="image not found">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-side-info mb-60">

                        <h4 class="product-name">{{$product->name}}</h4>
                        <div class="product-price">
                            <span class="price-now">₹{{$product->price}}</span>
                        </div>
                        <p class="mb-30">{{$product->description}}
                        </p>
                        <!-- <div class="product-quantity-cart mb-30">
                            <div class="product-quantity-form">
                                <form action="#">
                                    <button class="cart-minus"><i class="far fa-minus"></i></button>
                                    <input class="cart-input" type="text" value="1">
                                    <button class="cart-plus"><i class="far fa-plus"></i></button>
                                </form>
                            </div>
                            <a href="#" class="primary-btn"><i class="fas fa-shopping-basket"></i>Add to Cart</a>
                        </div> -->
                        <div class="product-d-meta sku mb-10">
                            <span>SKU:</span>
                            <span>{{$product->hsn_code}}</span>
                        </div>
                        <div class="product-d-meta ockcategories mb-10">
                            <span>Categories:</span>
                            <span>{{$product->category[0]->title}}</span>
                        </div>
                        <div class="product-d-meta tags mb-10">
                            <span>Tags:</span>
                            <span>{{$product->tags}}</span>
                        </div>
                        <!-- <div class="product-d-meta share mb-10">
                            <span>Share:</span>
                            <div class="social-links shop-social-link">
                                <ul>
                                    <li><a href="https://www.facebook.com/"><i class="icon-023-facebook-app-symbol"></i></a>
                                    </li>
                                    <li><a href="https://www.instagram.com/"><i class="icon-025-instagram"></i></a>
                                    </li>
                                    <li><a href="https://www.pinterest.com/"><i class="icon-029-pinterest"></i></a>
                                    </li>
                                    <li><a href="https://twitter.com/"><i class="icon-twitter-x"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            

            @if($product->long_description || ( isset( $productAdditionalInfo) && count($productAdditionalInfo) > 0) )
            <div class="product_info-faq-area pb-0 pt-20 wow fadeInUp" data-wow-delay=".3s">
                <div class="product-details-tab-wrapper row ">
                    <nav class="product-details-nav mb-30 col-lg-3">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            @if(isset( $product->long_description) && $product->long_description!= '')
                            <a class="nav-item nav-link active" id="pro-info-1-tab" data-bs-toggle="tab" href="#pro-info-1" role="tab" aria-selected="true">Description</a>
                            @endif
                            @if(isset( $productAdditionalInfo) && count($productAdditionalInfo) > 0 && $productAdditionalInfo->first()->details && $productAdditionalInfo->first()->title)
                            <a class="nav-item nav-link active" id="pro-info-2-tab" data-bs-toggle="tab" href="#pro-info-2" role="tab" aria-selected="true">Additional Information</a>
                            @endif

                        </div>
                    </nav>
                    <div class="product-details-content  col-lg-9">
                        <div class="tab-content" id="nav-tabContent">
                            @if(isset( $product->long_description) && $product->long_description!= '')
                            <div class="tab-pane fade active show" id="pro-info-1" role="tabpanel">
                                <div class="tabs-wrapper mt-0">
                                    <div class="product__details-des">
                                        <p>{!! $product->long_description !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if(isset( $productAdditionalInfo) && count($productAdditionalInfo) > 0 && $productAdditionalInfo->first()->details && $productAdditionalInfo->first()->title)
                            <div class="tab-pane fade active show" id="pro-info-2" role="tabpanel">
                                <div class="tabs-wrapper mt-0">
                                    <div class="product__details-info">
                                        <ul>@foreach($productAdditionalInfo as $additionalInfo)

                                            <li>
                                                <h6>{{$additionalInfo->title}}</h6>
                                                <span>{{$additionalInfo->details}}</span>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
    <!-- shop details area end  -->

    <!-- shop related product area start  -->
    @if(count($relatedProductList))
    <section class="df-related-product section-spacing-bottom wow fadeInUp" data-wow-delay=".3s">
        <div class="container">
            <div class="row">
                <div class="col-xl-8">
                    <div class="section__title-wrapper section-title-spacing">
                        <span class="section__subtitle bg-lighter">RELATED</span>
                        <h2 class="section__title">Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="df-related-product-wrap relatedProduct-slider">
                        <div class="swiper df-related-product-active">
                            <div class="swiper-wrapper">
                                @foreach($relatedProductList as $relatedProduct)
                                <div class="swiper-slide">

                                    <div class="product-single card shadow">
                                        <div class="product-thumb">
                                            <a href="{{ route('product_details', ['category_slug' => $relatedProduct->category->first()->slug , 'product_slug' => $relatedProduct->slug] ) }}">
                                            {{-- <a href="/product/{{$relatedProduct->slug}}"> --}}
                                                <img src="{{ count($relatedProduct->imageGallery) ? $relatedProduct->imageGallery[0]->image : ''}}" alt="Product Image" width="100%" height="195px">
                                            </a>
                                        </div>
                                        <div class="product-description">
                                            <h4 class="product-name text-truncate"><a href="{{ route('product_details', ['category_slug' => $relatedProduct->category->first()->slug , 'product_slug' => $relatedProduct->slug] ) }}">{{$relatedProduct->name}}</a>
                                            {{-- <h4 class="product-name text-truncate"><a href="/product/{{$relatedProduct->slug}}">{{$relatedProduct->name}}</a> --}}
                                            </h4>
                                            <div class="product-price">
                                                <!-- <span class="price-old">$959.00</span> -->
                                                <span class="price-now">₹ {{$relatedProduct->price}}</span>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- shop related product area end  -->
</main>
<!-- back to top start -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
@endsection

<!-- back to top end -->

@endsection
@section('css_include')

@extends('layouts.front.main', ['page_title'=>$cmsValue->Page->title,'description'=>$cmsValue->Page->description,'tags'=>$cmsValue->tags])

@section('content')

<link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
<!-- [if lte IE 9]>
        <p class="browserupgrade">
            You are using an <strong>outdated</strong> browser. Please
            <a href="https://browsehappy.com/">upgrade your browser</a> to improve
            your experience and security.
        </p>
        <![endif] -->

<!-- pre loader area start -->
<div id="loading">
    <div id="loading-center">
        <div id="loading-center-absolute">
            <div class="loading-icon text-center d-flex flex-column align-items-center justify-content-center">
                <img src="{{ url('images/cms/' . $data['appLogo']['cms_value']) }}" alt="">
                <!-- <img class="loading-logo" src="{{ url('img/logo/preloader.svg') }}" ś alt=""> -->

            </div>
        </div>
    </div>
</div>
<!-- pre loader area end -->



<!-- Add your site or application content here -->
<main>

    <!-- hero area start  -->
    <section class="hero4__area fix bg-theme-6">
        <div class="swiper hero__slider">
            <div class="swiper-wrapper">

                @foreach ($data['bannerProducts'] as $bannerProduct)
                {{-- @dd($bannerProduct->category->first()->slug) --}}
                <div class="swiper-slide">
                    <div class="container">
                        <div class="row g-50 align-items-center justify-content-between">
                            <div class="col-xl-5 col-lg-6 col-md-5 order-md-1 order-2">
                                <div class="hero4__wrapper">
                                    <h6 class="hero4__sub-title wow fadeInUp" data-wow-delay=".3s">
                                        {{ $bannerProduct->category[0]->title }}
                                    </h6>
                                    <h1 class="hero4__title wow fadeInUp" data-wow-delay=".5s">
                                        {{ $bannerProduct->name }}
                                    </h1>
                                    <p class="hero4__price-tag wow fadeInUp" data-wow-delay=".7s">
                                        {{ $bannerProduct->short_name }}
                                    </p>
                                    <div class="b-ton">
                                        <a href="{{ route('product_details', ['category_slug' => $bannerProduct->category->first()->slug, 'product_slug' => $bannerProduct->slug]) }}" class="primary-btn wow fadeInUp" data-wow-delay=".8s">Check Now
                                        {{-- <a href="/product/{{ $bannerProduct->slug }}" class="primary-btn wow fadeInUp" data-wow-delay=".8s">Check Now --}}
                                            <span class="icon__box">
                                                <img class="icon__first" src="{{ url('img/icon/arrow-white.webp') }}" alt="image not found">
                                                <img class="icon__second" src="{{ url('img/icon/arrow-white.webp') }}" alt="image not found">
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-7 col-lg-6 col-md-7 order-md-2 order-1">
                                <div class="hero4__thumb-wrapper p-relative wow fadeInUp" data-wow-delay=".5s">
                                    <div class="hero4__thumb p-relative">
                                        <img src="{{ count($bannerProduct->imageGallery) && $bannerProduct->imageGallery[0]->image ?$bannerProduct->imageGallery[0]->image :''}}" alt="image not found">

                                        <img src="{{ asset('img/ecommerce/hero-mask.webp') }}" alt="img not found!">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="container  d-block">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="hero-slider-pagination df__pagination wow fadeInUp" data-wow-delay=".9s"></div>
                        <div class="hero__navigation">
                            <div class="hero__slider-button-next order-0 order-md-1 slider__nav-btn"><i class="icon-021-next"></i>
                            </div>
                            <div class="hero__slider-button-prev order-1 order-md-0 slider__nav-btn mb-20"><i class="icon-022-left"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        </div>

    </section>
    <!-- hero area end  -->

    <!-- shop category area start start  -->
    <section class="df-team__area section-spacing">
        <div class="container">
            <div class="row align-items-end section-title-spacing wow fadeInUp" data-wow-delay=".3s">
                <div class="col-lg-12">
                    <div class="section__title-wrapper text-center section-title-spacing">
                        {{-- <span class="section__subtitle bg-lighter">CATEGORY</span> --}}
                        <h2 class="section__title">Choose Category</h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12 category-slider">
                        <div class="df-member2__wrapper p-relative wow">
                            <div class="swiper category__slider">
                                <div class="swiper-wrapper">
                                    @foreach ($data['categoryList'] as $category)
                                    <div class="swiper-slide">
                                        <div class="df-shop-cat-wrap wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                                            <a href="{{ route('product_category', $category->slug) }}">
                                            {{-- <a href="/category/{{ $category->slug }}"> --}}
                                                <div class="df-shop-cat">
                                                    <div class="df-shop-cat-content">
                                                        <div class="df-shop-cat-wrapper cat-1 category-img">
                                                            @php
                                                            $image = $category->getRawOriginal('image') ? $category->image : $category->getProductImage();
                                                            @endphp

                                                            <img src="{{ $image }}" alt="image not found">
                                                        </div>
                                                        <span class="df-shop-cat-title">{{ $category->title }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="df-member2__navigation">
                                <div class="member__slider-button-prev slider__nav-btn"><i class="icon-022-left"></i>
                                </div>
                                <div class="member__slider-button-next slider__nav-btn"><i class="icon-021-next"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="team__slider-pagination df__pagination mt-60 justify-content-center wow fadeInUp" data-wow-delay=".3s"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop category area start end  -->



    <!-- product area start here-->
    <section class="bf-product-area bg-theme-4 section-spacing">
        <div class="container">
            <div class="row align-items-end section-title-spacing g-5">
                <div class="col-lg-7 col-md-6">
                    <div class="section__title-wrapper wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">
                        {{-- <span class="section__subtitle bg-lighter">Our Products</span> --}}
                        <h2 class="section__title ms-md-3">Latest Products</h2>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="bf-product-filter-btn-wrapper justify-content-center justify-content-lg-end wow ms-md-3 ms-lg-0 me-lg-3 fadeInRight" data-wow-duration="1s" data-wow-delay=".2s">
                        <div class="bf-product-filter-btn bf-filter-btn">
                            <button data-filter=".grid-item" class="active">All</button>
                            <button data-filter=".is_best_seller" class="">Bestseller</button>
                            <button data-filter=".is_new_product" class="">New Product</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row grid">
                @foreach ($data['bestSeller_newProduct'] as $product)
                <div class="col-xl-3 col-lg-4 col-md-6  col-sm-6 grid-item  {{ $product->is_best_seller ? 'is_best_seller' : '' }} {{ $product->is_new_product ? 'is_new_product' : '' }}">
                    <a href="{{ route('product_details', ['category_slug' => $product->category->first()->slug, 'product_slug' => $product->slug]) }}">
                    {{-- <a href="/product/{{ $product->slug }}"> --}}
                        <div class=" bf-product wow fadeInUp " data-wow-delay=".3s">
                            <div class="bf-product-thumb-wrapper bf-product-thumb-active card shadow-lg">
                                <div class="product-single mb-0">
                                    <div class="product-thumb">
                                        <img src="{{ count($product->imageGallery) && $product->imageGallery[0]->image ?$product->imageGallery[0]->image :''  }}" alt="Product Image" width="100%" height="195px">

                                    </div>
                                    <div class="product-description">
                                        <h4 class="product-name text-truncate">
                                            <a href="{{ route('product_details', ['category_slug' => $product->category->first()->slug, 'product_slug' => $product->slug]) }}">{{ $product->name }}</a>
                                            {{-- <a href="/product/{{ $product->slug }}">{{ $product->name }}</a> --}}
                                        </h4>
                                        <div class="product-price">
                                            <!-- @if ($product->price)
                                                <span class="price-old">{{ $product->price }}</span>
                                            @endif -->
                                            <span class="price-now">
                                                ₹
                                                {{ $product->price }}</span>
                                        </div>
                                        <!-- <div class="rating">
                                            <a href="#"><i class="icon-star"></i></a>
                                            <a href="#"><i class="icon-star"></i></a>
                                            <a href="#"><i class="icon-star"></i></a>
                                            <a href="#"><i class="icon-star"></i></a>
                                            <a href="#"><i class="icon-star"></i></a>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
            <!-- <div class="row">
                    <div class="col-12">
                        <div class="bf-product-more-btn mt-35 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                            <a href="#" class="primary-btn">View More
                                <span class="icon__box">
                                    <img class="icon__first" src="{{ url('img/icon/arrow-white.webp') }}" alt="image not found">
                                    <img class="icon__second" src="{{ url('img/icon/arrow-white.webp') }}" alt="image not found">
                                </span>
                            </a>
                        </div>
                    </div>
                </div> -->
        </div>
    </section>
    <!-- product area end here-->


    <!-- product area start here-->
    <section class="df-team__area mt-60">
        <div class="section__title-wrapper text-center section-title-spacing">
            {{-- <span class="section__subtitle bg-lighter ">VIDEOS</span> --}}
            <h2 class="section__title ">Video gallery</h2>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xxl-12 col-xl-12">
                    <div class="df-member2__wrapper p-relative wow px-3">
                        <div class="swiper video__slider">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <div class="df-shop-cat-wrap wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                                        <div class="df-booking__video">
                                            <img src="{{ asset('front/img/video_logo.png') }}" alt="image not found">
                                            <div class="df-video__play-btn pos-center">
                                                <a href="{{ asset('front/video/intro.mp4') }}" class="play-btn popup-video"><i class="icon-008-play-button"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="df-shop-cat-wrap wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                                        <div class="df-booking__video">
                                            <img src="{{ asset('front/img/video_logo.png') }}" alt="image not found">
                                            <div class="df-video__play-btn pos-center">
                                                <a href="{{ asset('front/video/intro.mp4') }}" class="play-btn popup-video"><i class="icon-008-play-button"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="df-shop-cat-wrap wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                                        <div class="df-booking__video">
                                            <img src="{{ asset('front/img/video_logo.png') }}" alt="image not found">
                                            <div class="df-video__play-btn pos-center">
                                                <a href="{{ asset('front/video/intro.mp4') }}" class="play-btn popup-video"><i class="icon-008-play-button"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="df-shop-cat-wrap wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                                        <div class="df-booking__video">
                                            <img src="{{ asset('front/img/video_logo.png') }}" alt="image not found">
                                            <div class="df-video__play-btn pos-center">
                                                <a href="{{ asset('front/video/intro.mp4') }}" class="play-btn popup-video"><i class="icon-008-play-button"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="df-shop-cat-wrap wow fadeInUp" data-wow-duration="1s" data-wow-delay=".4s">
                                        <div class="df-booking__video">
                                            <img src="{{ asset('front/img/video_logo.png') }}" alt="image not found">
                                            <div class="df-video__play-btn pos-center">
                                                <a href="{{ asset('front/video/intro.mp4') }}" class="play-btn popup-video"><i class="icon-008-play-button"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="df-member2__navigation">
                            <div class="member__slider-button-prev-video slider__nav-btn"><i class="icon-022-left"></i>
                            </div>
                            <div class="member__slider-button-next-video slider__nav-btn"><i class="icon-021-next"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team__slider-pagination df__pagination mt-60 justify-content-center wow fadeInUp" data-wow-delay=".3s"></div>
        </div>

    </section>
    <!-- product area end here-->



    <section class="bf-product-area bg-theme-4  py-5">

        <div class="container">

            <div class="row justify-content-center  rounded bg-theme-1- bg-white mx-3 py-5">
                <div class="section__title-wrapper text-center ">
                    <div class="section__title-wrapper text-center section-title-spacing mt-md-4">
                        {{-- <span class="section__subtitle bg-lighter">CONTACT</span> --}}
                        <h2 class="section__title">Contact with Us</h2>
                    </div>

                </div>

                <div class="row justify-content-center  rounded bg-theme-1- mx-3 bg-white">
                    <div class="col-xl-8 col-lg-10">
                        @if (session()->has('success'))
                        <div class="alert bg-lighter section__subtitle text-center text-white w-100">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                        @if($errors->any())
                        <div class="alert bg-lighter section__subtitle text-center text-white w-100">
                            {!! implode('', $errors->all('<div>:message</div>')) !!}
                        </div>
                        @endif
                        <div class="df-booking2__form">
                            <form action="{{ route('contact_us') }}" method="POST">
                                @method('POST')
                                @csrf()
                                <div class="row gx-5">
                                    <div class="col-md-6">
                                        <div class="df-input-field">
                                            <input type="text" id="name" name="name" value="{{ old('name')}}" placeholder="Your Name" required>
                                        </div>
                                    </div>
                                    @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <div class="col-md-6">
                                        <div class="df-input-field">
                                            <input type="text" id="email" name="email" value="{{ old('email')}}" placeholder="Your Email" required>
                                        </div>
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <div class="col-md-6">
                                        <div class="df-input-field">
                                            <input type="number" id="number" name="number" value="{{ old('number')}}" placeholder="Your Phone" min="10" required>
                                        </div>
                                    </div>
                                    @error('number')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <div class="col-md-6">
                                        <div class="df-input-field">
                                            <select name="service" id="service">
                                                <option value="inquiry">Inquiry</option>
                                                <option value="suggestion">Suggestion</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="df-input-field">
                                            <input type="text" id="address" name="address" value="{{ old('address')}}" placeholder="Office Address">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="df-input-field">
                                            <textarea id="user_message" name="user_message" placeholder="Write Message Here..." required>{{ old('user_message')}} </textarea>

                                        </div>
                                    </div>
                                    @error('user_message')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror

                                    <div class="col-md-12 recaptcha">
                                        <div class="df-input-field">
                                            {!! NoCaptcha::display() !!}
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="df-booking2__form-btn mt-0">
                                            <button type="submit" class="primary-btn">send now
                                                <span class="icon__box">
                                                    <img class="icon__first" src="{{url('img/icon/arrow-white.webp')}}" alt="image not found">
                                                    <img class="icon__second" src="{{url('img/icon/arrow-white.webp')}}" alt="image not found">
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- newsletter area start here  -->

    <!-- newsletter area end here  -->
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
@section('script_include')
    {!! NoCaptcha::renderJs() !!}

    <script>
        $(function() {
            function rescaleCaptcha() {
                let width = $('.g-recaptcha').parent().width();
                let scale;
                if (width < 302) {
                    scale = width / 302;
                } else{
                    scale = 1.0;
                }

                $('.g-recaptcha').css('transform', 'scale(' + scale + ')');
                $('.g-recaptcha').css('-webkit-transform', 'scale(' + scale + ')');
                $('.g-recaptcha').css('transform-origin', '0 0');
                $('.g-recaptcha').css('-webkit-transform-origin', '0 0');
            }

            rescaleCaptcha();
            $( window ).resize(function() { rescaleCaptcha(); });
        });
    </script>
@endsection

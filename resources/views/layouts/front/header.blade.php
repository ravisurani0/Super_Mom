<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width, height=device-height, target-densitydpi=device-dpi" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link rel="shortcut icon" href="{{url('images/cms/'.$data['appLogo']['cms_value']) }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @if (Route::is('indexPage'))
        <title>{{ config('app.name', 'Laravel') . ' - ' .(isset($page_title) ? $page_title : '') }}</title>
    @else
        <title>{{ isset($page_title) ? $page_title . ' - ' : '' }}{{ config('app.name', 'Laravel') }}</title>
    @endif
    

    {!! Meta::tag('robots') !!}

    {!! Meta::tag('site_name', config('app.name', 'Laravel')) !!}
    {!! Meta::tag('url', Request::url()); !!}
    {!! Meta::tag('locale', 'en_EN') !!}



    @meta('title',isset($page_title) ? $page_title : '' )
    @meta('description',isset($description) ? $description : '' )
    @meta('tags',isset($tags) ? $tags : '' )
    {{-- @meta('title',isset($page_title) ? $page_title . ' - ' : '' )
    @meta('description',isset($description) ? $description . ' - ' : '' )
    @meta('tags',isset($tags) ? $tags . ' - ' : '' ) --}}
    @meta('canonical' ,config('app.url', 'Laravel') )

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/images/cms/'.$data['appLogo']['cms_value']) }}">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('front/css/plugins/preloader.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/plugins/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/vendor/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/plugins/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/plugins/backToTop.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/plugins/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/plugins/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/vendor/fontAwesome6Pro.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/vendor/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/plugins/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/plugins/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/custom.css') }}">



    {{-- <link rel="stylesheet" href="{{ asset('front/css/settings-tab.css') }}"> --}}
    @yield('css_include')
    @yield('style')

    <style>
        /* ::-webkit-scrollbar:vertical{
            display: none;
        } */
        html,
        body {
            max-width: 100%;
            overflow-x: hidden;
        }

        /* loader css */
        /* #loading_indicator {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
            border: 10px solid #FFEE00;
            border-radius: 50%;
            border-top: 10px solid blue;
            width: 100px;
            height: 100px;
            animation: spinIndicator 1s linear infinite;
        }

        @keyframes spinIndicator {
            100% {
                transform: rotate(180deg);
            }
        } */
    </style>

</head>

<body>

    <div class="mouseCursor cursor-outer"></div>
    <div class="mouseCursor cursor-inner"><span>Drag</span></div>

    <section>
        {{-- loader --}}
        {{-- <div id="loading_indicator"> </div> --}}
        <header class="sticky-top bg-color">
            <!-- <div class='container container-max text-center text-xl-start d-flex flex-md-row top-bottom-border pb-2 flex-column justify-content-between pt-2'>
                <span class='small text-black me-xl-5'>Minimum Order Value ₹300 For Free Shipping</span>

                <div class="d-flex flex-row d-none d-lg-block me-4 me-xxl-0">

                    <a href="{{ isset($facebookUrl) ? $facebookUrl : '' }}" class='mx-1' target="_blank">
                        <span style="font-size: 1.5em; color: #3b5998"> <i class="fab fa-facebook"></i></span>
                    </a>
                    <a href="{{ isset($twitterUrl) ? $twitterUrl : '' }}" class='mx-1' target="_blank">
                        <span style="font-size: 1.5em; color: #00acee"> <i class="fab fa-twitter"></i></span>
                    </a>
                    <a href="{{ isset($linkedinUrl) ? $linkedinUrl : '' }}" class='mx-1' target="_blank">
                        <span style="font-size: 1.5em; color: #0A66C2"><i class="fab fa-linkedin"></i></span>
                    </a>
                    <a href="{{ isset($instagramUrl) ? $instagramUrl : '' }}" class='mx-1' target="_blank">
                        <span style="font-size: 1.5em; color: #962fbf"><i class="fab fa-instagram"></i></span>
                    </a>
                </div>
            </div> -->


            <!-- header area start -->
            <header>

                <div class="df-header4">
                    <!-- header top area start  -->
                    <div class="theme-bg df-header4-top-3 p-relative d-none d-lg-block">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="df-header4-top-wrapper d-flex justify-content-between">
                                        <div class="df-header4-top-left">
                                            <div class="df-header4-meta-items">
                                                <div class="df-header4-meta-item is-white d-flex align-items-center">
                                                    {{-- <div clas  --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="df-header4-top-right d-flex align-items-center">
                                            <div class="df-header4-meta-items d-flex align-items-center">
                                                <div class="df-header4-meta-item is-white d-flex align-items-center">
                                                    <div class="df-header4-meta-icon">
                                                        <i class="fa-solid fa-phone"></i>
                                                    </div>
                                                    <div class="df-header4-meta-text">
                                                        <a href="tel:{{ strip_tags($data['contactDetails']['contact_no']) }}">{{ strip_tags($data['contactDetails']['contact_no'] )}}</a>
                                                    </div>
                                                </div>
                                                <div class="df-header4-meta-item is-white d-flex align-items-center">
                                                    <div class="df-header4-meta-icon">
                                                        <i class="fas fa-envelope"></i>
                                                    </div>
                                                    <div class="df-header4-meta-text">
                                                        <a href="mailto:{{ strip_tags($data['contactDetails']['contact_email'])}}"><span class="__cf_email__" data-cfemail="3c4f494c4c534e487c58535a5544125f5351">{{ strip_tags($data['contactDetails']['contact_email'])}}</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- header top area end -->
                    <!-- header bottom area start -->
                    <div id="header-sticky">
                        <div class="container header__main-container py-2">
                            <div class="row align-items-center">
                                <div class="col-xl-12 col-lg-12">
                                    <div class="header__main-content-wrapper p-relative">
                                        <div class="header__main-left">
                                            <div class="header__logo">
                                                <a href="/" class="logo-dark"><img src="{{ asset('storage/images/cms/'.$data['appLogo']['cms_value']) }}" alt="logo-img"></a>
                                            </div>
                                            <div class="area-separator d-none d-lg-inline-flex"></div>
                                            <div class="location-search d-none d-lg-inline-flex">
                                                <i class="icon-location-2"></i>
                                                <a href="{{ strip_tags($data['contactDetails']['location_link'])}}" target="_blank"><span>Find a Location</span></a>
                                            </div>
                                        </div>
                                        <div class="header__main-right">
                                            <div class="main-menu main-menu1 d-none d-xl-block">
                                                <nav id="mobile-menu">
                                                    <ul>
                                                        <li class="menu-item-has-children">
                                                            <a href="/" class="{{ Route::is('indexPage') ? 'active-menu' : '' }}">Home</a>
                                                        </li>
                                                        <li class="menu-item-has-children">
                                                            <a href="/about-us" class="{{ Route::is('about_us') ? 'active-menu' : '' }}">About Us</a>
                                                        </li>
                                                        <li class="menu-item-has-children menu-expand-category">
                                                            <a href="{{ route('all_products') }}" class="{{ Route::is('category_products') || Route::is('all_products') ? 'active-menu' : '' }}">Products</a>
                                                            <ul class="sub-menu ">
                                                                @foreach($data['categoryList'] as $category )
                                                                <li class="">
                                                                    <a class="{{ Route::is('category_products') && request()->route()->category_slug == $category->slug ? 'active-menu' : '' }}" href="{{ route('product_category', $category->slug ) }}">{{$category->title }}</a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                        {{-- <li class="menu-item-has-children menu-expand-category">
                                                            <a href="#" class="{{ Route::is('category_products') ? 'active-menu' : '' }}">Categories</a>
                                                            <ul class="sub-menu ">
                                                                @foreach($data['categoryList'] as $category )
                                                                <li class="">
                                                                    <a class="{{ Route::is('category_products') && request()->route()->category_slug == $category->slug ? 'active-menu' : '' }}" href="/category/{{$category->slug}}">{{$category->title }}</a>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </li> --}}
                                                        <li><a href="/contact" class="{{ Route::is('contact') ? 'active-menu' : '' }}">Contact</a></li>
                                                    </ul>
                                                </nav>
                                            </div>
                                            <div class="area-separator d-none d-lg-inline-flex"></div>
                                            <div class="message__now d-none d-lg-inline-flex">
                                                <div class="meta-item">
                                                    <div class="meta-item__icon">
                                                        <i class="icon-074-phone"></i>
                                                    </div>
                                                    <div class="meta-item__text">
                                                        <p>CONTACT NUMBER</p>
                                                        <span><a class="is-black" href="tel:{{ strip_tags($data['contactDetails']['contact_no']) }}">{{ strip_tags($data['contactDetails']['contact_no'])}}</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="area-separator d-none d-lg-inline-flex"></div>
                                            <button class="side-toggle">
                                                <span class="menu__bar">
                                                    <span class="bar-icon">
                                                        <span></span>
                                                        <span></span>
                                                        <span></span>
                                                    </span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- header bottom area end -->
                </div>
            </header>
            <!-- header area end -->
            @yield('inline-header-js')
        </header>

        <!-- side toggle start -->
        <aside class="fix">
            <div class="side-info">
                <div class="side-info-content">
                    <div class="offset__widget offset__header">
                        <div class="offset__logo">
                            <a href="/">
                                <img src="{{asset('storage/images/cms/'.$data['appLogo']['cms_value']) }}" s alt="logo">
                            </a>
                        </div>
                        <button class="side-info-close">
                            <i class="fal fa-times"></i>
                        </button>
                    </div>
                    <div class="offset__widget offset__support d-none d-sm-block">
                        <h3 class="offset__title">{{ config('app.name', 'Laravel') }}</h3>
                    </div>
                    <div class="mobile-menu d-xl-none fix"></div>
                    <div class="offset__widget offset__support">
                        <h6 class="offset__sub-title small fw-400 mb-30">CONTACT US</h6>
                        <div class="meta-item mb-20">
                            <div class="meta-item__icon-2">
                                <i class="icon-007-telephone"></i>
                            </div>
                            <div class="meta-item__text-2">
                                <span><a href="tel:{{ strip_tags($data['contactDetails']['contact_no']) }}">{{ strip_tags($data['contactDetails']['contact_no'])}}</a></span>
                            </div>
                        </div>
                        <div class="meta-item mb-20">
                            <div class="meta-item__icon-2 style-2">
                                <i class="icon-052-email"></i>
                            </div>
                            <div class="meta-item__text-2">
                                <span><a href="mailto:{{ strip_tags($data['contactDetails']['contact_email']) }}">{{ strip_tags($data['contactDetails']['contact_email'])}}</a></span>
                            </div>
                        </div>
                        <div class="meta-item">
                            <div class="meta-item__icon-2 style-3">
                                <i class="icon-030-pin"></i>
                            </div>
                            <div class="meta-item__text-2">
                                <a href="{{ strip_tags($data['contactDetails']['location_link']) }}" target="_blank"><span>{{ strip_tags($data['contactDetails']['address']) }}</span></a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="offset__widget offset__gallery">
                <div class="offset__instagram d-none d-sm-block">
                    <h6 class="offset__sub-title small fw-400 mb-30">OUR INSTAGRAM POST</h6>
                    <div class="tp-insta">
                        <div class="row">
                            <div class="col-4 col-sm-4">
                                <div class="offset-insta__thumb">
                                    <a href="#">
                                        <img src="assets/img/offcanvas/insta-1.webp" alt="image not found"></a>
                                </div>
                            </div>
                            <div class="col-4 col-sm-4">
                                <div class="offset-insta__thumb">
                                    <a href="#">
                                        <img src="assets/img/offcanvas/insta-2.webp" alt="image not found"></a>
                                </div>
                            </div>
                            <div class="col-4 col-sm-4">
                                <div class="offset-insta__thumb">
                                    <a href="#">
                                        <img src="assets/img/offcanvas/insta-3.webp" alt="image not found"></a>
                                </div>
                            </div>
                            <div class="col-4 col-sm-4">
                                <div class="offset-insta__thumb">
                                    <a href="#">
                                        <img src="assets/img/offcanvas/insta-4.webp" alt="image not found"></a>
                                </div>
                            </div>
                            <div class="col-4 col-sm-4">
                                <div class="offset-insta__thumb">
                                    <a href="#">
                                        <img src="assets/img/offcanvas/insta-5.webp" alt="image not found"></a>
                                </div>
                            </div>
                            <div class="col-4 col-sm-4">
                                <div class="offset-insta__thumb">
                                    <a href="#">
                                        <img src="assets/img/offcanvas/insta-6.webp" alt="image not found"></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div> -->
                </div>
            </div>
        </aside>

        <div class="offcanvas-overlay"></div>
        <div class="offcanvas-overlay-white"></div>
        <!-- side toggle end -->
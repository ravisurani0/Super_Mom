<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width, height=device-height, target-densitydpi=device-dpi" />
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <link rel="shortcut icon" href="{{ asset('media/logos/gopal-namkeen-logo.png') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{!! Meta::get('page_title') !!} - {{ env('APP_NAME') }}</title>
    {!! Meta::tag('title') !!}
    {!! Meta::tag('description') !!}
    {!! Meta::tag('keywords') !!}
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/css/fontscss2.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/validation.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/all-animation.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/root-color.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="{{ asset('front/js/jquery-3.6.3.min.js') }}"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
    <section>
        {{-- loader --}}
        {{-- <div id="loading_indicator"> </div> --}}
        <header class="sticky-top bg-color">
            <div class='container container-max text-center text-xl-start d-flex flex-md-row top-bottom-border pb-2 flex-column justify-content-between pt-2'>
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


            </div>
         
            <script type="text/javascript">
                // var arrowNext = '{{ URL::asset('front/assets/images/arrow-next.png') }}';
                // var arrowPrev = '{{ URL::asset('front/assets/images/arrow-prev.png') }}';
            </script>
            <script>
                $("#company_ul li a").click(function() {
                    var companyLink = $(this).attr('data-url');

                    switch (companyLink) {
                        case 'about':
                            $("#company_ul li a").removeClass("active");
                            $("#about_us_li").addClass("active");

                            break;

                        case 'what_makes_us_stand_out':
                            $("#company_ul li a").removeClass("active");
                            $("#what_makes_us_stand_out_li").addClass("active");
                            break;

                        case 'vision':
                            $("#company_ul li a").removeClass("active");
                            $("#vision_li").addClass("active");
                            break;
                        case 'value_system':
                            $("#company_ul li a").removeClass("active");
                            $("#value_system_li").addClass("active");
                            break;
                        case 'our_community':
                            $("#company_ul li a").removeClass("active");
                            $("#our_community_li").addClass("active");

                            break;
                        case 'why_we_exist':
                            $("#company_ul li a").removeClass("active");
                            $("#why_we_exist_li").addClass("active");
                            break;

                        default:
                            $("#company_ul li a").removeClass("active");
                            break;
                    }
                });
                jQuery(function($) {
                    $('.navbar .dropdown-hover-item').hover(function() {
                        $(this).find('.dropdown-menu-hover').first().stop(true, true).delay(250).slideDown();

                    }, function() {
                        $(this).find('.dropdown-menu-hover').first().stop(true, true).delay(100).slideUp();

                    });

                    $('.navbar .dropdown > a').click(function() {
                        location.href = this.href;
                    });

                });
                //loader js
                // document.onreadystatechange = function() {
                //     if (document.readyState !== "complete") {
                //         document.querySelector("body").style.visibility = "hidden";
                //         document.getElementById("loading_indicator").style.visibility = "visible";
                //     } else {
                //         // setTimeout(() => {
                //             document.getElementById("loading_indicator").style.display = "none";
                //             document.querySelector("body").style.visibility = "visible";
                //         // }, 1000)
                //     }
                // };
            </script>
            @yield('inline-header-js')
        </header>
@section('css_include')

@extends('layouts.front.main', ['page_title'=>$cmsValue->title,'description'=>$cmsValue->description,'tags'=>$cmsValue->tags])

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
            <div class="row justify-content-center">
                <div class="col-xxl-9">
                    <div class="page-title-wrapper-2 text-center">
                        <h1 class="page__title-2"> {{$cmsValue->Page->title}}</h1>
                        {{-- <div class="breadcrumb-menu-2 d-flex justify-content-center">
                            <nav aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs">
                                <ul class="trail-items-2">
                                    <li class="trail-item-2 trail-begin"><a href="/"><span>Home</span></a></li>
                                    <li class="trail-item-2 trail-end"><span>{{$cmsValue->title}}</span></li>
                                </ul>
                            </nav>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page title area start  -->
    <section class="shop-details-area section-spacing">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-delay=".3s">
                <div class="col-12 px-5 px-md-0">
                    {!! $cmsValue->cms_value !!}
                </div>
            </div>
        </div>
    </section>

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
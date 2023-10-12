@extends('layouts.front.main')
@section('css_include')
<link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/css/fontscss2.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/validation.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/all-animation.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/root-color.css') }}">
    <style>
        .page-height{
            height: 50vh !important;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center; 
       }
    </style>
@endsection

@section('title')
    Page not found
@endsection

@section('content')
    <div class="container mt-150 page-height">
        <div class="center mt-5 mb-5 text-center">
            @if (isset($error))
                <h3 class="text-danger">{{ $error['title'] }}</h3>
                <p class="text-danger">{{ $error['message'] }}</p>
            @else
                <h1 class="text-danger">Page not found!</h1>
                <p class="text-danger">Sorry, but the page you were looking for could not be found.</p>
            @endif
        </div>
    </div>
@endsection

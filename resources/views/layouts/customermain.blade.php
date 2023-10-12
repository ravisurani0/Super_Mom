<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($page_title) ? $page_title . ' | ' : ''  }} {{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/customer/auth.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('front/css/auth.css') }}">

</head>
<!--end::Head-->
<!--begin::Body-->
<body>
    @yield('content')
    @auth()
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth

    <!--end::Global Config-->
    <!--begin:: Global Mandatory Vendors -->
    <script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>

    @yield('scripts')
</body>

<!--end::Body-->

</html>

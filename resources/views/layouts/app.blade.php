<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($page_title) ? $page_title . ' | ' : '' }} {{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="" />

    {{-- <link rel="shortcut icon" href="{{ asset('media/logos/favicon.ico') }}" /> --}}
    <link rel="shortcut icon" href="{{ asset('media/logos/gopal-namkeen-logo.png') }}" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <!--end::Fonts-->

    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Page Vendors Styles-->

    <!--begin:: Global Mandatory Vendors -->
    <link href="{{ asset('plugins/general/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet"
        type="text/css" />

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <link href="{{ asset('plugins/general/tether/dist/css/tether.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('plugins/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/general/bootstrap-timepicker/css/bootstrap-timepicker.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('plugins/general/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/general/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('plugins/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/general/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('plugins/general/ion-rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('plugins/general/nouislider/distribute/nouislider.css') }}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('plugins/general/owl.carousel/dist/assets/owl.carousel.css') }}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('plugins/general/owl.carousel/dist/assets/owl.theme.default.css') }}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('plugins/general/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('plugins/general/summernote/dist/summernote.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('plugins/general/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" rel="stylesheet"
        type="text/css" />
    {{-- <link href="{{ asset('plugins/general/animate.css/animate.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('plugins/general/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/general/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/general/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/general/socicon/css/socicon.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/custom/vendors/line-awesome/css/line-awesome.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('plugins/custom/vendors/flaticon/flaticon.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/custom/vendors/flaticon2/flaticon.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/general/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />

    <!--end::Layout Themes-->

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
    class="page-loading-enabled page-loading header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    @auth()
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endauth
    @include('partials._page-loader')

    <!--begin::Main-->

    @include('partials._header-mobile')

    <div class="d-flex flex-column flex-root" id="app">

        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">

            @include('partials._aside')

            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                @include('partials._header')

                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                    @include('partials._subheader.subheader-v1')

                    <!--Content area here-->
                    @include('partials._content')
                </div>

                <!--end::Content-->

                @include('partials._footer')

            </div>

            <!--end::Wrapper-->
        </div>

        <!--end::Page-->
    </div>

    <!--end::Main-->

    @include('partials._extras.scrolltop')

    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
        var HOST_URL = '{{ env('APP_URL') }}'
    </script>



    <!--end::Global Config-->
    <!--begin:: Global Mandatory Vendors -->
    <script src="{{ asset('plugins/general/jquery/dist/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/popper.js/dist/umd/popper.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/js-cookie/src/js.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/moment/min/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/tooltip.js/dist/umd/tooltip.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('plugins/general/sticky-js/dist/sticky.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/wnumb/wNumb.js') }}" type="text/javascript"></script>

    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <script src="{{ asset('plugins/general/jquery-form/dist/jquery.form.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/block-ui/jquery.blockUI.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('plugins/custom/js/vendors/bootstrap-datepicker.init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('plugins/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('plugins/custom/js/vendors/bootstrap-timepicker.init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('plugins/general/bootstrap-maxlength/src/bootstrap-maxlength.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('plugins/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('plugins/general/bootstrap-select/dist/js/bootstrap-select.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('plugins/general/bootstrap-switch/dist/js/bootstrap-switch.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('plugins/custom/js/vendors/bootstrap-switch.init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/select2/dist/js/select2.full.js') }}" type="text/javascript"></script>
    {{-- <script src="{{ asset('plugins/general/ion-rangeslider/js/ion.rangeSlider.js') }}" type="text/javascript"></script> --}}
    <script src="{{ asset('plugins/general/typeahead.js/dist/typeahead.bundle.js') }}" type="text/javascript"></script>
    {{-- <script src="{{ asset('plugins/general/handlebars/dist/handlebars.js') }}" type="text/javascript"></script> --}}
    <script src="{{ asset('plugins/general/inputmask/dist/jquery.inputmask.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/inputmask/dist/inputmask/inputmask.date.extensions.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('plugins/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js') }}"
        type="text/javascript"></script>
    {{-- <script src="{{ asset('plugins/general/nouislider/distribute/nouislider.js') }}" type="text/javascript"></script> --}}
    {{-- <script src="{{ asset('plugins/general/owl.carousel/dist/owl.carousel.js') }}" type="text/javascript"></script> --}}
    {{-- <script src="{{ asset('plugins/general/autosize/dist/autosize.js') }}" type="text/javascript"></script> --}}
    {{-- <script src="{{ asset('plugins/general/clipboard/dist/clipboard.min.js') }}" type="text/javascript"></script> --}}
    {{-- <script src="{{ asset('plugins/general/dropzone/dist/dropzone.js') }}" type="text/javascript"></script> --}}
    {{-- <script src="{{ asset('plugins/general/summernote/dist/summernote.js') }}" type="text/javascript"></script> --}}
    <script src="{{ asset('plugins/general/markdown/lib/markdown.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/bootstrap-markdown/js/bootstrap-markdown.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('plugins/custom/js/vendors/bootstrap-markdown.init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/bootstrap-notify/bootstrap-notify.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/custom/js/vendors/bootstrap-notify.init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/jquery-validation/dist/jquery.validate.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/jquery-validation/dist/additional-methods.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('plugins/custom/js/vendors/jquery-validation.init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/toastr/build/toastr.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/raphael/raphael.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/morris.js/morris.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/chart.js/dist/Chart.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('plugins/custom/vendors/jquery-idletimer/idle-timer.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/waypoints/lib/jquery.waypoints.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/counterup/jquery.counterup.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/es6-promise-polyfill/promise.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/custom/js/vendors/sweetalert2.init.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/jquery.repeater/src/lib.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/jquery.repeater/src/jquery.input.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/jquery.repeater/src/repeater.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/dompurify/dist/purify.js') }}" type="text/javascript"></script>
    {{-- <script src="{{ asset('plugins/general/jquery-validation/dist/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/general/jquery-validation/dist/additional-methods.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('plugins/custom/js/vendors/jquery-validation.init.js') }}" type="text/javascript"></script> --}}

    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Bundle(used by all pages)-->
    {{-- <script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script> --}}
    <script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}"></script>

    <!--end::Global Theme Bundle-->
    <!--CHEDITOR-->


    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>

    <!--end::Page Vendors-->

    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('js/pages/widgets.js') }}"></script>
    <script src="{{ asset('custom/js/admin.js') }}"></script>

    {{-- <script src="{{ asset('js/pages/features/charts/apexcharts.js') }}"></script> --}}

    @yield('scripts')

    <script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('custom/js/admin.js') }}" type="text/javascript"></script>
    <!--end::Page Scripts-->
    @if (Session('status'))
        <script>
            $(document).ready(function() {
                showNotification('success', "{!! Session('status') !!}");
            })
        </script>
    @endif
    @if (Session('success'))
        {
        <script>
            $(document).ready(function() {
                showNotification('success', "{!! Session('success') !!}");
            })
        </script>
        }
    @endif
    @if (Session('error'))
        {
        <script>
            $(document).ready(function() {
                showNotification('error', "{!! Session('error') !!}");
            })
        </script>
        }
    @endif
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <!-- CKEDITOR -->
    {{-- <script src="{{ asset('js/pages/crud/forms/editors/ckeditor.js') }}"></script>
<script>
    CKEDITOR.config.allowedContent = true;
    CKEDITOR.replace('product_detail');
</script> --}}


</body>

<!--end::Body-->

</html>

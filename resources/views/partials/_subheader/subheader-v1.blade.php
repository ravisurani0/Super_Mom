<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">

        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">

            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">

                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold my-2 mr-5">@yield('title', $page_title ?? '')</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}" class="text-muted text-white">Dashboard</a>
                    </li>
                    @if(isset($breadcrumbs))
                        @forelse($breadcrumbs as $breadcrumb)
                            <li class="breadcrumb-item">
                                <a href="{{ route($breadcrumb['link']) }}" class="text-muted text-white">{{ $breadcrumb['name'] }}</a>
                            </li>
                        @empty @endforelse
                    @endif
                    @if(Route::currentRouteName() != 'home' && !empty($page_title))
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);" class="text-muted text-white">@yield('title', $page_title ?? '')</a>
                        </li>
                    @endif
                </ul>
                <!--end::Breadcrumb-->
            </div>

            <!--end::Page Heading-->
        </div>

        <!--end::Info-->
    </div>
</div>

<!--end::Subheader-->

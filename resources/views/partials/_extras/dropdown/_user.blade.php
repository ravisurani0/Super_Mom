<!--begin::Header-->
<div class="d-flex align-items-center justify-content-between flex-wrap p-8 bgi-size-cover bgi-no-repeat rounded-top"
    style="background-image: url({{ url('media/misc/bg-1.jpg') }})">
    <div class="d-flex align-items-center mr-2">

        <!--begin::Symbol-->
        <div class="symbol bg-white-o-15 mr-3">
            <span class="symbol-label text-success font-weight-bold font-size-h4">{{ substr(Auth::user()?->company_name, 0, 1) }}</span>
        </div>

        <!--end::Symbol-->

        <!--begin::Text-->
        <div class="text-white m-0 flex-grow-1 mr-3 font-size-h5">{{ Auth::user()?->company_name }}</div>

        <!--end::Text-->
    </div>
    <span class="label label-success label-lg font-weight-bold label-inline d-none">3 messages</span>
</div>

<!--end::Header-->

<!--begin::Nav-->
<div class="navi navi-spacer-x-0 pt-5">

    <!--begin::Item-->
    <a href="{{ route('profile') }}" class="navi-item px-8">
        <div class="navi-link">
            <div class="navi-icon mr-2">
                <i class="flaticon2-calendar-3 text-success"></i>
            </div>
            <div class="navi-text">
                <div class="font-weight-bold">
                    My Profile
                </div>
                <div class="text-muted">
                    Account settings and more
                    <span class="label label-light-danger label-inline font-weight-bold d-none">update</span>
                </div>
            </div>
        </div>
    </a>

    <!--end::Item-->

    <!--begin::Footer-->
    <div class="navi-separator mt-3"></div>
    <div class="navi-footer  px-8 py-5">
        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="btn btn-light-primary font-weight-bold">Sign Out</a>
    </div>

    <!--end::Footer-->
</div>

<!--end::Nav-->

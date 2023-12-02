<!--begin::Aside-->

<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">

    <!--begin::Brand-->
    <div class="brand flex-column-auto" id="kt_brand" style="height: 95px; background-color: #004182;">

        <!--begin::Logo-->
        <a href="{{ route('home') }}" class="brand-logo">
            <img src="{{ asset('storage/images/cms/'.$data['appLogo']['cms_value']) }}" alt="logo-img" style="width: 10rem; height: 5rem;" />
        </a>

        <!--end::Logo-->
        <!--begin::Toggle-->
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
            <span class="svg-icon svg-icon svg-icon-xl">

                <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)" stroke="white" stroke-width="0.5" />
                        <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)" stroke="white" stroke-width="0.5" />
                    </g>
                </svg>

                <!--end::Svg Icon-->
            </span>
        </button>

        <!--end::Toolbar-->
    </div>

    <!--end::Brand-->

    <!--begin::Aside Menu-->
    <div style="background-color: #004182;" class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

        <!--begin::Menu Container-->
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">

            <!--begin::Menu Nav-->
            <ul class="menu-nav">

                <li class="menu-item {{ request()->routeIs('home') ? 'menu-item-active' : '' }}" aria-haspopup="true">
                    <a href="{{ route('home') }}" class="menu-link">
                        {{-- <span class="svg-icon menu-icon">

                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <polygon points="0 0 24 0 24 24 0 24" />
                                        <path
                                            d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                            fill="#000000" fill-rule="nonzero" />
                                        <path
                                            d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                            fill="#000000" opacity="0.3" />
                                    </g>
                                </svg>

                                <!--end::Svg Icon-->
                            </span> --}}

                        <span class="menu-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </span>
                        <span class="menu-text">Dashboard</span>
                    </a>
                </li>


                <li class="menu-item menu-item-submenu menu-item-close {{  (request()->routeIs('products.*') ) ? 'menu-item-open menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="menu-icon">
                            <i class="fas fa-info"></i>
                        </span>
                        <span class="menu-text">Products</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu" kt-hidden-height="240">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item  {{ request()->routeIs('products.index') ? 'menu-item-active': '' }}" aria-haspopup="true">
                                <a href="/admin/products" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Products</span>
                                </a>
                            </li>
                            <li class="menu-item  {{ request()->routeIs('products.create') ? 'menu-item-active': '' }}" aria-haspopup="true">
                                <a href="/admin/products/create" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Add New Product</span>
                                </a>
                            </li>
                            <li class="menu-item  {{ request()->routeIs('products.import') ? 'menu-item-active': '' }}" aria-haspopup="true">
                                <a href="/admin/import-product" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Import Products</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="menu-item {{ request()->routeIs('categorys.*') ? 'menu-item-active': '' }}" aria-haspopup="true">
                    <a href="/admin/categorys" class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-info"></i>
                        </span>
                        <span class="menu-text">Category</span>
                    </a>
                </li>
                <li class="menu-item menu-item-submenu menu-item-close {{  (request()->routeIs('users.*') ) ? 'menu-item-open menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="menu-icon">
                            <i class="fas fa-users"></i>
                        </span>
                        <span class="menu-text">Users</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu" kt-hidden-height="240">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item  {{ request()->routeIs('users.index') ? 'menu-item-active': '' }}" aria-haspopup="true">
                                <a href="/admin/users" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">System Users</span>
                                </a>
                            </li>
                            <li class="menu-item  {{ request()->routeIs('users.users.dealer') ? 'menu-item-active': '' }}" aria-haspopup="true">
                                <a href="/admin/users-dealer" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Dealers</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-item {{ request()->routeIs('users.*') ? 'menu-item-active': '' }}" aria-haspopup="true">

                </li>
                <li class="menu-item {{ request()->routeIs('orders.*') ? 'menu-item-active': '' }}" aria-haspopup="true">
                    <a href="/admin/orders" class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-users"></i>
                        </span>
                        <span class="menu-text">Orders</span>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('contact_us.*') ? 'menu-item-active': '' }}" aria-haspopup="true">
                    <a href="/admin/contact-us" class="menu-link">
                        <span class="menu-icon">
                            <i class="fas fa-users"></i>
                        </span>
                        <span class="menu-text">Contact Us</span>
                    </a>
                </li>

                <li class="menu-item menu-item-submenu menu-item-close {{  (request()->routeIs('contactCms') || request()->routeIs('roles.*') || request()->routeIs('page.*') || request()->routeIs('cms.*') ) ? 'menu-item-open menu-item-active' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
                    <a href="javascript:;" class="menu-link menu-toggle">
                        <span class="menu-icon">
                            <i class="fas fa-cog fa-fw"></i>
                        </span>
                        <span class="menu-text">Settings</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="menu-submenu" kt-hidden-height="240">
                        <i class="menu-arrow"></i>
                        <ul class="menu-subnav">
                            <li class="menu-item  {{ request()->routeIs('contactCms') ? 'menu-item-active': '' }}" aria-haspopup="true">
                                <a href="/admin/contact-info" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Contact Info</span>
                                </a>
                            </li>
                            <li class="menu-item  {{  request()->routeIs('cms.*') ? 'menu-item-active': '' }}" aria-haspopup="true">
                                <a href="/admin/cms" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Cms</span>
                                </a>
                            </li>
                            <li class="menu-item  {{  request()->routeIs('page.*') ? 'menu-item-active': '' }}" aria-haspopup="true">
                                <a href="/admin/page" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Page</span>
                                </a>
                            </li>
                            <li class="menu-item  {{ request()->routeIs('roles.*') ? 'menu-item-active': '' }}" aria-haspopup="true">
                                <a href="/admin/roles" class="menu-link">
                                    <i class="menu-bullet menu-bullet-dot">
                                        <span></span>
                                    </i>
                                    <span class="menu-text">Role</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</div>

<style>
    .aside-menu-wrapper {
        /* height: 100% */
        /* margin-bottom: 2%; */
        /* padding-bottom: 2% !important; */
    }

    .aside-menu {
        background-color: #004182 !important;
        /* height: 80% !important; */
    }

    .aside-menu .menu-nav>.menu-item>.menu-heading .menu-text,
    .aside-menu .menu-nav>.menu-item>.menu-link .menu-text {
        color: #fff;
    }

    .aside-menu .menu-nav>.menu-item.menu-item-active>.menu-heading,
    .aside-menu .menu-nav>.menu-item.menu-item-active>.menu-link {
        /* background-color: #004182; */
        background-color: rgba(0, 0, 0, 0.3);
    }

    .aside-menu .menu-nav>.menu-item.menu-item-active>.menu-heading .menu-text,
    .aside-menu .menu-nav>.menu-item.menu-item-active>.menu-link .menu-text {
        color: deeppink;
    }

    .aside-menu .menu-nav>.menu-item-active .menu-icon i

    /* .aside-menu .menu-nav>.menu-item:hover i */
        {
        color: deeppink !important;
    }

    .aside-menu .menu-nav>.menu-item i {
        color: #fff;
    }
</style>

<!--end::Aside-->
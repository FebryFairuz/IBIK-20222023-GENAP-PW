<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kantin IBIK</title>

    @include("private.templates.header")
</head>

<body id="kt_body"
    class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
    style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px" data-kt-aside-minimize="on">


    {{-- ROOT PAGE --}}
    <div class="d-flex flex-column flex-root">
        <div class="play-app-store mt-5 p-5  d-block d-md-none d-lg-none d-xxl-none h-100">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-center">
                    <h1 class="mb-10">Get in on</h1>
                    <a href="">
                        <img src="{{ url('./assets/media/banners/app-play-store.png') }}" class="w-100 mb-5"
                            alt="Play Store" />
                    </a>
                    <a href="">
                        <img src="{{ url('./assets/media/banners/app-store.png') }}" alt="App Store" class="w-100" />
                    </a>
                </div>
            </div>
        </div>

        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid d-none d-md-block d-lg-block d-xxl-block">
            <!--begin::Aside-->
            @auth
                @include('private.templates.nav')
            @endauth

            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid pt-20" id="kt_wrapper">
                @auth
                    <!--begin::Header-->
                    <div id="kt_header" style="" class="header align-items-stretch mb-0">
                        <!--begin::Container-->
                        <div class="container-fluid d-flex align-items-stretch justify-content-between">
                            <!--begin::Aside mobile toggle-->
                            <div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
                                <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                                    id="kt_aside_mobile_toggle">
                                    <span class="svg-icon svg-icon-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                                fill="currentColor" />
                                            <path opacity="0.3"
                                                d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Aside mobile toggle-->
                            <!--begin::Mobile logo-->
                            <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                                <a href="/" class="d-lg-none text-dark fw-bolder">
                                    KANTIN IBIK
                                </a>
                            </div>
                            <!--end::Mobile logo-->
                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                                <!--begin::Navbar-->
                                <div class="d-flex align-items-stretch">
                                    <div class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
                                        <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">Kantin IBIK</h1>
                                    </div>
                                </div>
                                <!--end::Navbar-->
                                <!--begin::Toolbar wrapper-->
                                <div class="d-flex align-items-stretch flex-shrink-0">
                                    @auth
                                        <!--begin::User menu-->
                                        <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                                            <!--begin::Menu wrapper-->
                                            <div class="me-2 text-end">
                                                <span class="d-block">
                                                    Hai,
                                                </span>
                                                <span class="fw-bolder ">{{ auth()->user()->name }}</span>
                                            </div>
                                            <div>
                                                <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                                                    data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                                    data-kt-menu-placement="bottom-end">
                                                    <img src="{{ url('./assets/media/svg/avatars/008-boy-3.svg') }}"
                                                        alt="user" class="bg-light p-1" />

                                                </div>
                                                <!--begin::User account menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                                    data-kt-menu="true">
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <div class="menu-content d-flex align-items-center px-3">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-50px me-5">
                                                                <img alt="Logo" class="bg-light p-1"
                                                                    src={{ url('./assets/media/svg/avatars/008-boy-3.svg') }} />
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Username-->
                                                            <div class="d-flex flex-column">
                                                                <div class="fw-bolder d-flex align-items-center fs-5">
                                                                    {{ auth()->user()->name }}
                                                                    <span
                                                                        class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Admin</span>
                                                                </div>
                                                                <span
                                                                    class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</span>
                                                            </div>
                                                            <!--end::Username-->
                                                        </div>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu separator-->
                                                    <div class="separator my-2"></div>
                                                    <!--end::Menu separator-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-5">
                                                        <a href="{{ url('profile') }}" class="menu-link px-5">
                                                            My Profile
                                                        </a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-5">
                                                        <a href="{{ url('signout') }}" class="menu-link px-5">
                                                            Sign Out
                                                        </a>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::User account menu-->
                                                <!--end::Menu wrapper-->
                                            </div>
                                        </div>
                                        <!--end::User menu-->
                                    @else
                                        <button class="btn btn-danger">Sign In</button>
                                    @endauth
                                </div>
                                <!--end::Toolbar wrapper-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Header-->
                @endauth
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Post-->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        @yield('content')
                        <!--end::Container-->
                    </div>
                    <!--end::Post-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    @include('private.templates.footer')
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    {{-- END ROOT --}}

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1"
                    transform="rotate(90 13 6)" fill="currentColor" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="currentColor" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->

    <div class="modal fade" id="modal-kantin-ibik" tabindex="-1" aria-labelledby="modal-kantin-ibik-label"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modal-kantin-ibik-label">Information</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
            </div>
        </div>
    </div>

    @include("private.templates.bottom")
</body>

</html>

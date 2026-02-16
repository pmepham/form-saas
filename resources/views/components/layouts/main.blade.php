<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../" />
    <title>Form Saas - {{ $title }}</title>
    <meta charset="utf-8" />
    <meta name="description" content="Saul HTML Pro - Bootstrap 5 HTML Multipurpose Admin Dashboard Theme" />
    <meta name="keywords"
        content="Saul, bootstrap, bootstrap 5, dmin themes, free admin themes, bootstrap admin, bootstrap dashboard" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Saul Theme by KeenThemes" />
    <meta property="og:url" content="https://keenthemes.com/products/saul-html-pro" />
    <meta property="og:site_name" content="Saul HTML Pro by Keenthemes" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    {{ $css }}
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>
</head>

<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" class="app-default">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            <div id="kt_app_header" class="app-header d-flex flex-column flex-stack">
                <div class="d-flex align-items-center flex-stack flex-grow-1">
                    <div class="app-header-logo d-flex align-items-center flex-stack px-lg-10 mb-2"
                        id="kt_app_header_logo">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px ms-3 me-2 d-flex d-lg-none"
                            id="kt_app_sidebar_mobile_toggle">
                            <i class="ki-solid ki-abstract-14 fs-2">
                            </i>
                        </div>
                        <a href="index.html" class="app-sidebar-logo">
                            <img alt="Logo" src="{{asset('assets/media/logos/default.svg')}}" class="h-30px theme-light-show" />
                            <img alt="Logo" src="{{asset('assets/media/logos/default-dark.svg')}}"
                                class="h-30px theme-dark-show" />
                        </a>
                        <div id="kt_app_sidebar_toggle"
                            class="app-sidebar-toggle btn btn-sm btn-icon btn-color-warning me-n2 d-none d-lg-flex"
                            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                            data-kt-toggle-name="app-sidebar-minimize">
                            <i class="ki-solid ki-exit-left fs-2x rotate-180">
                            </i>
                        </div>
                    </div>
                    <div class="app-navbar flex-grow-1 justify-content-end" id="kt_app_header_navbar">
                        <div class="app-navbar-item ms-3 ms-lg-4 me-lg-5" id="kt_header_user_menu_toggle">
                            <div class="cursor-pointer symbol symbol-30px symbol-lg-40px"
                                data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                data-kt-menu-placement="bottom-end">
                                <img src="{{asset('assets/media/avatars/300-2.jpg')}}" alt="user" />
                            </div>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                data-kt-menu="true">
                                <div class="menu-item px-3">
                                    <div class="menu-content d-flex align-items-center px-3">
                                        <div class="symbol symbol-50px me-5">
                                            <img alt="Logo" src="{{asset('assets/media/avatars/300-2.jpg')}}" />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <div class="fw-bold d-flex align-items-center fs-5">Peter Mepham
                                                <span
                                                    class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Pro</span>
                                            </div>
                                            <a href="#"
                                                class="fw-semibold text-muted text-hover-primary fs-7">peter.mepham@hotmail.co.uk</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator my-2"></div>
									<div class="menu-item px-5">
										<a href="" class="menu-link px-5">My Profile</a>
									</div>
                                <div class="separator my-2"></div>
                                <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                                    <a href="#" class="menu-link px-5">
                                        <span class="menu-title position-relative">Mode
                                            <span class="ms-5 position-absolute translate-middle-y top-50 end-0">
                                                <i class="ki-solid ki-night-day theme-light-show fs-2"></i>
                                                <i class="ki-solid ki-moon theme-dark-show fs-2"></i>
                                            </span></span>
                                    </a>
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                                        data-kt-menu="true" data-kt-element="theme-mode-menu">
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                                data-kt-value="light">
                                                <span class="menu-icon" data-kt-element="icon">
                                                    <i class="ki-solid ki-night-day fs-2">
                                                    </i>
                                                </span>
                                                <span class="menu-title">Light</span>
                                            </a>
                                        </div>
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                                data-kt-value="dark">
                                                <span class="menu-icon" data-kt-element="icon">
                                                    <i class="ki-solid ki-moon fs-2">
                                                    </i>
                                                </span>
                                                <span class="menu-title">Dark</span>
                                            </a>
                                        </div>
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                                data-kt-value="system">
                                                <span class="menu-icon" data-kt-element="icon">
                                                    <i class="ki-solid ki-screen fs-2">
                                                    </i>
                                                </span>
                                                <span class="menu-title">System</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="menu-item px-5 my-1">
                                    <a href="account/settings.html" class="menu-link px-5">Account Settings</a>
                                </div>
                                <div class="menu-item px-5">
                                    
                                    <a id="logout" class="menu-link px-5" data-csrf="{{ csrf_token() }}" data-url="{{ route('logout') }}">Sign Out</a>
                                </div>
                            </div>
                        </div>
                        <div class="app-navbar-item ms-3 ms-lg-4 ms-n2 me-3 d-flex d-lg-none">
                            <div class="btn btn-icon btn-custom btn-color-gray-600 btn-active-color-primary w-35px h-35px w-md-40px h-md-40px"
                                id="kt_app_aside_mobile_toggle">
                                <i class="ki-solid ki-burger-menu-2 fs-2">
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="app-header-separator me-0 me-lg-5"></div>
            </div>
            <div class="app-wrapper flex-column flex-row-fluid me-0 me-lg-5" id="kt_app_wrapper">
                <div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true"
                    data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                    <div class="d-flex flex-column justify-content-between h-100 hover-scroll-overlay-y my-2 mx-5 d-flex flex-column"
                        id="kt_app_sidebar_main" data-kt-scroll="true" data-kt-scroll-activate="true"
                        data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header"
                        data-kt-scroll-wrappers="#kt_app_main" data-kt-scroll-offset="5px">
                        <div id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false" class="flex-column-fluid menu menu-sub-indention menu-column menu-rounded menu-active-bg mb-7">
                            <div data-kt-menu-trigger="click" class="menu-item">
                                <a class="menu-link" href="{{ route('dashboard') }}">
                                    <span class="menu-icon">
                                        <i class="ki-solid ki-element-11 fs-1"></i>
                                    </span>
                                    <span class="menu-title">Dashboard</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link" href="{{ route('workspace.index') }}" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                    <span class="menu-icon">
                                        <i class="ki-solid ki-folder fs-1"></i>
                                    </span>
                                    <span class="menu-title">Workspace</span>
                                </a>
                            </div>
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <i class="ki-solid ki-gear fs-1">
                                        </i>
                                    </span>
                                    <span class="menu-title">System Settings</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion">
                                    <div class="menu-item">
                                        <a class="menu-link" href="" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">General Settings</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="app-main flex-column flex-row-fluid me-0" id="kt_app_main">
                    <div class="d-flex flex-column flex-column-fluid">
                        <div id="kt_app_toolbar" class="app-toolbar pt-5">
                            <div id="kt_app_toolbar_container"
                                class="app-container container-fluid d-flex align-items-stretch">
                                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                                        <x-breadcrumbs></x-breadcrumbs>
                                        <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bolder fs-1 lh-0">{{ $title }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <div id="kt_app_content_container" class="app-container container-fluid">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                    <div id="kt_app_footer"
                        class="app-footer align-items-center justify-content-center justify-content-md-between flex-column flex-md-row py-3">
                        <div class="text-gray-900 order-2 order-md-1">
                            <span class="text-muted fw-semibold me-1">2025&copy;</span>
                            <a href="https://keenthemes.com" target="_blank"
                                class="text-gray-800 text-hover-primary">Saas</a>
                        </div>
                        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                            <li class="menu-item">
                                <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://devs.keenthemes.com" target="_blank"
                                    class="menu-link px-2">Support</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://keenthemes.com/products/saul-html-pro" target="_blank"
                                    class="menu-link px-2">Purchase</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-solid ki-arrow-up"></i>
    </div>
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#logout').on('click', function(){
                var logout = $(this);
                $.ajax({
                    url: logout.attr('data-url'),
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': logout.attr('data-csrf')
                    },
                    type: 'POST',
                    success: function(response){
                        KTUtil.loadSwal('Logging Out', 'Please wait...', 'success');
                        setTimeout(function () {
                            window.location.assign(response.redirect);
                        }, 1500);
                    }
                });
            });
        });
    </script>
    {{ $javascript }}
</body>

</html>

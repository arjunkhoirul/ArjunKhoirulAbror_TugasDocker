<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>DAM</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/img/can.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('/assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('/assets/css/demo.css') }}"/>

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('/assets/vendor/css/pages/page-auth.css ')}}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('/assets/js/config.js ')}}"></script>
  </head>

  <body>


      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
                <img src="{{ asset('assets/img/can.png') }}" alt=""class="w-px-30 h-auto rounded-circle">
              <span class="app-brand-logo demo">
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">DAM</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
          <!-- Dashboard -->
        <li class="menu-item  {{ (request()->is('dashboard*')) ? 'active' : '' }}  ">
          <a href="/dashboard" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle  "></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>



@if ( auth()->user()->getRoleNames()->implode(', ') == 'Admin' )

<li class="menu-header small text-uppercase"><span class="menu-header-text">Users</span></li>

<li class="menu-item  {{ request()->routeIs('petugas*')? 'active' : '' }}  {{ request()->routeIs('polsek*')? 'active' : '' }} ">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="bx bx-group me-2"></i>
        <div data-i18n="Account Settings">Keanggotaan</div>
    </a>
    @endif
    <ul class="menu-sub">
        @if (auth()->user()->getRoleNames()->implode(', ') == 'Admin')
        <li class="menu-item  {{ request()->routeIs('petugas*')? 'active' : '' }}">
            <a href="/petugas" class="menu-link">
                <div data-i18n="Account">Polisi</div>
            </a>
        </li>
        @endif
        @if (auth()->user()->getRoleNames()->implode(', ') == 'Admin')
        <li class="menu-item  {{ request()->routeIs('polsek*')? 'active' : '' }}">
            <a href="/polsek" class="menu-link">
                <div data-i18n="Notifications">Polsek</div>
            </a>
        </li>
        @endif

    </ul>
</li>


@if (auth()->user()->getRoleNames()->implode(', ') == 'Admin')
<li class="menu-header small text-uppercase"><span class="menu-header-text">Kategori</span></li>
<li class="menu-item
      {{ request()->routeIs('wilayah*')? 'active' : '' }}
      {{ request()->routeIs('kategori*')? 'active' : '' }}
      {{ request()->routeIs('kanal*')? 'active' : '' }} "
>
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="bx bx-category me-2"></i>
        <div data-i18n="Account Settings"> Kategori</div>
    </a>
    @endif
    <ul class="menu-sub">
        @if (auth()->user()->getRoleNames()->implode(', ') == 'Admin')
        <li class="menu-item  {{ request()->routeIs('wilayah*')? 'active' : '' }}">
            <a href="/wilayah" class="menu-link">
                <div data-i18n="Account">Wilayah Hukum</div>
            </a>
        </li>
        @endif
        </a>

        @if (auth()->user()->getRoleNames()->implode(',') == 'Admin' || auth()->user()->getRoleNames()->implode(', ') == 'Petugas')
        <li class="menu-item  {{ request()->routeIs('kategori*')? 'active' : '' }}">
            <a href="/kategori" class="menu-link">
                <div data-i18n="Account">Kategori Laporan</div>
            </a>
        </li>
        <li class="menu-item  {{ request()->routeIs('kanal*')? 'active' : '' }}">
            <a href="/kanal" class="menu-link">
                <div data-i18n="Account">Kanal Laporan</div>
            </a>
        </li>
        @endif
    </ul>
</li>


<li class="menu-header small text-uppercase"><span class="menu-header-text">Laporan</span></li>

<li class="menu-item  {{ request()->routeIs('laporan*')? 'active' : '' }}">
    <a href="/laporan" class="menu-link ">
        <i class="bx bx-file me-2"></i>
        <div data-i18n="Account">Laporan</div>
    </a>
</li>

</aside>
<div class="layout-page">
    <nav
    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar"
    >
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
       @yield('navbar')
        </div>
    </div>
    <!-- /Search -->

    <ul class="navbar-nav flex-row align-items-center ms-auto">
        <!-- Place this tag where you want the button to render. -->
        <li class="nav-item lh-1 me-3">
            <a
            class="github-button"
            href="https://github.com/themeselection/sneat-html-admin-template-free"
            data-icon="octicon-star"
            data-size="large"
            data-show-count="true"
            aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
            >Star</a
            >
        </li>

        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
              <img src="{{ asset('storage/image/'.auth()->user()->image) }}" alt class="w-px-40 h-auto rounded-circle" />
            </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li>
                <a class="dropdown-item" href="#">
                    <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                        <img src="{{ asset('storage/image/'.auth()->user()->image) }}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                    <small class="text-muted">{{ auth()->user()->getRoleNames()->implode(', ') }}</small>
                  </div>
                </div>
              </a>
            </li>
            <li>
                <div class="dropdown-divider"></div>
            </li>
            <li>
              <a class="dropdown-item" href="/setting">
                <i class="bx bx-cog me-2"></i>
                <span class="align-middle">Settings</span>
            </a>
        </li>
            <li>
                <div class="dropdown-divider"></div>
            </li>
            <li>

              <a class="dropdown-item" href="/logout">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Log Out</span>
              </a>


        </li>
    </ul>
        </li>
    <!--/ User -->
</ul>
</div>
</div>
</nav>
<div class="content-wrapper">
@yield('main')
</div>





    <script src="{{ asset('/assets/vendor/libs/jquery/jquery.js ') }}"></script>
    <script src="{{ asset('/assets/vendor/libs/popper/popper.js ') }}"></script>
    <script src="{{ asset('/assets/vendor/js/bootstrap.js ') }}"></script>
    <script src="{{ asset('/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->


    <script src="{{ asset('/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('/assets/js/main.js') }}"></script>


    <!-- Page JS -->
    <script src="{{ asset('/assets/js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('/assets/js/extended-ui-perfect-scrollbar.js ') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    @stack('script')
  </body>
</html>

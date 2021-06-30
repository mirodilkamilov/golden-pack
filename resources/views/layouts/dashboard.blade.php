<!DOCTYPE html>

<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="ltr">

<head>
   <title>Golden Pack - {{ __('Dashboard') }}</title>

   <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

   <!-- BEGIN: Vendor CSS-->
   <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/vendors.min.css">
   <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/ui/prism.min.css">

   <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">
   <!-- END: Vendor CSS-->

   <!-- BEGIN: Theme CSS-->
   <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="/app-assets/css/bootstrap-extended.css">
   <link rel="stylesheet" type="text/css" href="/app-assets/css/colors.css">
   <link rel="stylesheet" type="text/css" href="/app-assets/css/components.css">

   <!-- BEGIN: Page CSS-->
   <link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.css">
   <link rel="stylesheet" type="text/css" href="/app-assets/css/core/colors/palette-gradient.css">

   <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/app-todo.css">
   <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/app-user.css">
   <link rel="stylesheet" type="text/css" href="/app-assets/css/pages/data-list-view.css">
   <!-- END: Page CSS-->

   <link rel="stylesheet" href="/assets/styles/custom.css">

   <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
           integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
</head>


<body class="vertical-layout vertical-menu-modern 2-columns navbar-sticky fixed-footer todo-application"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<!-- BEGIN: Header-->
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-light navbar-shadow">
   <div class="navbar-wrapper">
      <div class="navbar-container content">
         <div class="navbar-collapse" id="navbar-mobile">
            <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
               <ul class="nav navbar-nav">
                  <li class="nav-item mobile-menu d-xl-none mr-auto">
                     <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                        <i class="ficon feather icon-menu"></i>
                     </a>
                  </li>
               </ul>
            </div>
            <ul class="nav navbar-nav float-right">

               <x-dashboard.language-dropdown :availableLangs="$availableLangs" :locale="$locale"/>

               <li class="nav-item d-none d-lg-block">
                  <a class="nav-link nav-link-expand">
                     <i class="ficon feather icon-maximize"></i>
                  </a>
               </li>

               <li class="dropdown dropdown-user nav-item">
                  <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                     <div class="user-nav d-sm-flex d-none">
                        <span class="user-name text-bold-600">{{ $name }}</span>
                        <span class="user-status">{{ __('Admin') }}</span>
                     </div>
                     <div class="avatar">
                        <span class="avatar-content">{{ Str::substr($name, 0, 1) }}</span>
                     </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                     <a class="dropdown-item" href="{{ route('dashboard.index') }}">
                        <i class="feather icon-user"></i>
                        {{ __('Edit Profile') }}
                     </a>
                     <div class="dropdown-divider"></div>

                     <!-- Log out -->
                     <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                           <i class="feather icon-power"></i>{{ __('Log out') }}
                        </a>
                     </form>
                     <!-- /Log out -->
                  </div>
               </li>
            </ul>
         </div>
      </div>
   </div>
</nav>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
   <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
         <li class="nav-item mr-auto">
            <a class="navbar-brand" href="{{ route('home.index') }}">
               <img src="/app-assets/images/logo/logo.png" alt="logo" width="35px">
               <h2 class="brand-text mb-0">Golden Pack</h2>
            </a>
         </li>
         <li class="nav-item nav-toggle">
            <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
               <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
               <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary"
                  data-ticon="icon-disc"></i>
            </a>
         </li>
      </ul>
   </div>
   <div class="shadow-bottom"></div>

   <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
         <li class="nav-item {{ active('dashboard.index') }}">
            <a href="{{ route('dashboard.index') }}">
               <i class="feather icon-home"></i>
               <span class="menu-title">{{ __('Dashboard') }}</span>
            </a>
         </li>

         <li class="nav-item {{ active('applications.index') }}">
            <a href="{{ route('applications.index') }}">
               <i class="feather icon-list"></i>
               <span class="menu-title">{{ __('Applications') }}</span>
            </a>
         </li>

         <li
            class="nav-item  {{ active(['hero-section.*', 'main-info.*', 'contacts.*'], 'sidebar-group-active open') }}">
            <a href="#">
               <i class="feather icon-info"></i>
               <span class="menu-title">{{ __('About company') }}</span>
            </a>
            <ul class="menu-content">
               <li class="{{ active('hero-section.*') }}">
                  <a href="{{ route('hero-section.index') }}">
                     <span class="menu-item">{{ __('Hero section') }}</span>
                  </a>
               </li>
               <li class="{{ active('main-information.*') }}">
                  <a href="{{ route('main-information.index') }}">
                     <span class="menu-item">{{ __('Main information') }}</span>
                  </a>
               </li>
               <li class="{{ active('contacts.*') }}">
                  <a href="{{ route('contacts.index') }}">
                     <span class="menu-item">{{ __('Contacts') }}</span>
                  </a>
               </li>
            </ul>
         </li>

         <li class="nav-item {{ active('processes.*') }}">
            <a href="{{ route('processes.index') }}">
               <i class="feather icon-package"></i>
               <span class="menu-title">{{ __('Packaging process') }}</span>
            </a>
         </li>
         <li class="nav-item {{ active('equipment.*') }}">
            <a href="{{ route('equipment.index') }}">
               <i class="feather"><img src="/assets/uploads/other/tool.svg"></i>
               <span class="menu-title">{{ __('Equipments') }}</span>
            </a>
         </li>
         <li class="nav-item ">
            <a href="">
               <i class="feather icon-briefcase"></i>
               <span class="menu-title">{{ __('Portfolios') }}</span>
            </a>
         </li>
         <li class="nav-item ">
            <a href="">
               <i class="fa fa-quote-left"></i>
               <span class="menu-title">{{ __('Testimonials') }}</span>
            </a>
         </li>
         <li class="nav-item ">
            <a href="">
               <i class="feather icon-thumbs-up"></i>
               <span class="menu-title">{{ __('Advantages') }}</span>
            </a>
         </li>
         <li class="nav-item ">
            <a href="">
               <i class="fa fa-handshake-o"></i>
               <span class="menu-title">{{ __('Cooperation') }}</span>
            </a>
         </li>
      </ul>
   </div>
</div>
<!-- END: Main Menu-->

@yield('content')

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Vendor JS-->
<script src="/app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="/app-assets/vendors/js/ui/prism.min.js"></script>

<script src="/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="/app-assets/js/core/app-menu.js"></script>
<script src="/app-assets/js/core/app.js"></script>
<script src="/app-assets/js/scripts/components.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<script src="/app-assets/js/scripts/ui/data-list-view.js"></script>
<script src="/app-assets/js/scripts/datatables/datatable.js"></script>
<script src="/app-assets/js/scripts/pages/app-todo.js"></script>
<script src="/app-assets/js/scripts/pages/app-user.js"></script>
<script src="/app-assets/js/scripts/modal/components-modal.js"></script>

<script src="/app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>

@stack('modal-show')
@stack('data-table')
@stack('image-preview')
@stack('change-language-tabs')
@stack('ckeditor')
@stack('company-contacts-list-manipulation')
<!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>

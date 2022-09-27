
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>bitBirds - Dashboard</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        @php
            $get_company_info=App\Models\Company::first();
        @endphp
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('/uploads/company') }}/{{$get_company_info->company_favicon}}">


         <!-- third party css -->
         <link href="{{asset('backend/assets/css/vendor/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css">
         {{-- <link href="{{asset('assets/css/vendor/dataTables.bootstrap5.css')}}" rel="stylesheet">
         <link href="{{asset('assets/css/vendor/responsive.bootstrap5.css')}}" rel="stylesheet">
         <link href="{{asset('assets/css/vendor/buttons.bootstrap5.css')}}" rel="stylesheet">
         <link href="{{asset('assets/css/vendor/select.bootstrap5.css')}}" rel="stylesheet"> --}}
         <!-- third party css end -->
         <!-- App css -->
         <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
         <link href="{{asset('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style">
         <link href="{{asset('backend/assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">   
        <link rel="stylesheet" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">     
        

     
      
         
        <style>
            #basic-datatable_paginate{
                display: flex;
                justify-content: end;
            }
        </style>
    </head>

    <body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <!-- Begin page -->
        <div class="wrapper">
            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu">
    
                <!-- LOGO -->
                <a href="index.html" class="logo text-center logo-light">
                    <span class="logo-lg">
                        
                        {{-- <img  src="{{ asset('/uploads/company') }}/{{$get_company_info->company_logo}}" alt="Logo" width="100" height="30"> --}}
                        <img src="https://bitbirds.com/web/wp-content/uploads/2021/11/bitBirds-white-logo.png" alt="" height="30">
                    </span>
                    <span class="logo-sm">
                        <img  src="https://bitbirds.com/web/wp-content/uploads/2021/11/bitBirds-white-logo-300x77.png" alt="Logo" height="12">
                        {{-- <img src="assets/images/logo_sm.png" alt="" height="16"> --}}
                    </span>
                </a>

                <!-- LOGO -->
                {{-- <a href="index.html" class="logo text-center logo-dark"> --}}
                    {{-- <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="assets/images/logo_sm_dark.png" alt="" height="16">
                    </span>
                </a> --}}
    
                <div class="h-100" id="leftside-menu-container" data-simplebar="">

                    <!--- Sidemenu -->
                    <ul class="side-nav">

                        {{-- <li class="side-nav-title side-nav-item">Navigation</li> --}}

                        {{-- <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarDashboards" aria-expanded="false" aria-controls="sidebarDashboards" class="side-nav-link">
                                <i class="uil-home-alt"></i>
                                <span class="badge bg-success float-end">4</span>
                                <span> Dashboards </span>
                            </a>
                            <div class="collapse" id="sidebarDashboards">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="dashboard-analytics.html">Analytics</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-crm.html">CRM</a>
                                    </li>
                                    <li>
                                        <a href="index.html">Ecommerce</a>
                                    </li>
                                    <li>
                                        <a href="dashboard-projects.html">Projects</a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}

                        <li class="side-nav-title side-nav-item">Admin</li>

                        @can('user')
                            <li class="side-nav-item">
                                <a href="{{ route('user') }}" class="side-nav-link">
                                    <i class=" dripicons-user"></i>
                                    <span>User</span>
                                </a>
                            </li>
                        @endcan
                        @can('role_manage')
                        <li class="side-nav-item">
                            <a href="{{ route('role.manage') }}" class="side-nav-link">
                                <i class=" dripicons-user"></i>
                                <span>Role Manage</span>
                            </a>
                        </li>
                        @endcan
                        @can('company')
                        <li class="side-nav-item">
                            <a href="{{ route('company') }}" class="side-nav-link">
                                <i class=" uil-copyright"></i>
                                <span>Setup Company</span>
                            </a>
                        </li>
                        @endcan
                        @can('supplier')
                        <li class="side-nav-item">
                            <a href="{{ route('supplier') }}" class="side-nav-link">
                                <i class=" uil-copyright"></i>
                                <span>Supplier</span>
                            </a>
                        </li>
                        @endcan
                        @can('brand')
                        <li class="side-nav-item">
                            <a href="{{ route('brand') }}" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span>Brand</span>
                            </a>
                        </li>
                        @endcan
                        @can('yarn')
                        <li class="side-nav-item">
                            <a href="{{ route('yarn') }}" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span>Yarn</span>
                            </a>
                        </li>
                        @endcan
                        @can('material')
                        <li class="side-nav-item">
                            <a href="{{ route('material') }}" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span>Material</span>
                            </a>
                        </li>
                        @endcan
                        @can('department')
                        <li class="side-nav-item">
                            <a href="{{ route('department') }}" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span>Department</span>
                            </a>
                        </li>
                        @endcan
                        @can('color')
                        <li class="side-nav-item">
                            <a href="{{ route('color') }}" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span>Color</span>
                            </a>
                        </li>
                        @endcan
                        @can('product_feature')
                        <li class="side-nav-item">
                            <a href="{{ route('product_feacture') }}" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span>Product Feature</span>
                            </a>
                        </li>
                        @endcan

                        @can('add_product')
                        <li class="side-nav-item">
                            <a href="{{ route('product_feacture_add') }}" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span>Add Product</span>
                            </a>
                        </li>
                        @endcan
                        @can('product_received')
                        <li class="side-nav-item">
                            <a href="{{ route('product_received') }}" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span>Product Received</span>
                            </a>
                        </li>
                        @endcan
                        @can('add_product_received')
                        <li class="side-nav-item">
                            <a href="{{ route('product_received_add') }}" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span>Add Received</span>
                            </a>
                        </li>
                        @endcan
                       
                        
                       

                        {{-- <li class="side-nav-item">
                            <a href="{{ route('brand') }}" class="side-nav-link">
                                <i class="uil-comments-alt"></i>
                                <span>Brand</span>
                            </a>
                        </li> --}}

                        {{-- <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false" aria-controls="sidebarEcommerce" class="side-nav-link">
                                <i class="uil-store"></i>
                                <span> Ecommerce </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarEcommerce">
                                <ul class="side-nav-second-level">
                                    <li>
                                        <a href="apps-ecommerce-products.html">Products</a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </li> --}}

                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">
                    <!-- Topbar Start -->
                    <div class="navbar-custom">
                        <ul class="list-unstyled topbar-menu float-end mb-0">
                            <li class="dropdown notification-list d-lg-none">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-search noti-icon"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                    <form class="p-3">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    </form>
                                </div>
                            </li>
                            {{-- <li class="dropdown notification-list topbar-dropdown">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="assets/images/flags/us.jpg" alt="user-image" class="me-0 me-sm-1" height="12"> 
                                    <span class="align-middle d-none d-sm-inline-block">English</span> <i class="mdi mdi-chevron-down d-none d-sm-inline-block align-middle"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu">

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <img src="assets/images/flags/germany.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">German</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <img src="assets/images/flags/italy.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Italian</span>
                                    </a>
                
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <img src="assets/images/flags/spain.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Spanish</span>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <img src="assets/images/flags/russia.jpg" alt="user-image" class="me-1" height="12"> <span class="align-middle">Russian</span>
                                    </a>

                                </div>
                            </li> --}}

                            {{-- <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-bell noti-icon"></i>
                                    <span class="noti-icon-badge"></span>
                                </a>
                                {{-- <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg"> --}}

                                    <!-- item-->
                                    {{-- <div class="dropdown-item noti-title">
                                        <h5 class="m-0">
                                            <span class="float-end">
                                                <a href="javascript: void(0);" class="text-dark">
                                                    <small>Clear All</small>
                                                </a>
                                            </span>Notification
                                        </h5>
                                    </div> --}}

                                    {{-- <div style="max-height: 230px;" data-simplebar="">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary">
                                                <i class="mdi mdi-comment-account-outline"></i>
                                            </div>
                                            <p class="notify-details">Caleb Flakelar commented on Admin
                                                <small class="text-muted">1 min ago</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info">
                                                <i class="mdi mdi-account-plus"></i>
                                            </div>
                                            <p class="notify-details">New user registered.
                                                <small class="text-muted">5 hours ago</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon">
                                                <img src="assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt=""> </div>
                                            <p class="notify-details">Cristina Pride</p>
                                            <p class="text-muted mb-0 user-msg">
                                                <small>Hi, How are you? What about our next meeting</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary">
                                                <i class="mdi mdi-comment-account-outline"></i>
                                            </div>
                                            <p class="notify-details">Caleb Flakelar commented on Admin
                                                <small class="text-muted">4 days ago</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon">
                                                <img src="assets/images/users/avatar-4.jpg" class="img-fluid rounded-circle" alt=""> </div>
                                            <p class="notify-details">Karen Robinson</p>
                                            <p class="text-muted mb-0 user-msg">
                                                <small>Wow ! this admin looks good and awesome design</small>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info">
                                                <i class="mdi mdi-heart"></i>
                                            </div>
                                            <p class="notify-details">Carlos Crouch liked
                                                <b>Admin</b>
                                                <small class="text-muted">13 days ago</small>
                                            </p>
                                        </a>
                                    </div> --}}

                                    <!-- All-->
                                    {{-- <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                                        View All
                                    </a> --}}

                                {{-- </div> --}}
                            {{-- </li> --}}

                            {{-- <li class="dropdown notification-list d-none d-sm-inline-block">
                                <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="dripicons-view-apps noti-icon"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0">

                                    <div class="p-2">
                                        <div class="row g-0">
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="assets/images/brands/slack.png" alt="slack">
                                                    <span>Slack</span>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="assets/images/brands/github.png" alt="Github">
                                                    <span>GitHub</span>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                                    <span>Dribbble</span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="row g-0">
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                                    <span>Bitbucket</span>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                                    <span>Dropbox</span>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a class="dropdown-icon-item" href="#">
                                                    <img src="assets/images/brands/g-suite.png" alt="G Suite">
                                                    <span>G Suite</span>
                                                </a>
                                            </div>
                                        </div> <!-- end row-->
                                    </div>

                                </div>
                            </li> --}}

                            {{-- <li class="notification-list">
                                <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                                    <i class="dripicons-gear noti-icon"></i>
                                </a>
                            </li> --}}
                       

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <span class="account-user-avatar"> 
                                        <img  src="{{ asset('/uploads/users') }}/{{ Auth::user()->profile_photo }}" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span>
                                        <span class="account-user-name text-capitalize">{{ Auth::user()->name }}</span>
                                        <span class="account-position">Founder</span>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                                    <!-- item-->
                                    <a href="{{ route('profile.change') }}" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-circle me-1"></i>
                                        <span>My Account</span>
                                    </a>

                                    <!-- item-->
                                    {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-account-edit me-1"></i>
                                        <span>Settings</span>
                                    </a> --}}

                                    <!-- item-->
                                    <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"> <i class="mdi mdi-logout me-1"></i>
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    {{-- <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <i class="mdi mdi-logout me-1"></i>
                                        <span>Logout</span>
                                    </a> --}}
                                </div>
                            </li>

                        </ul>
                        <button class="button-menu-mobile open-left">
                            <i class="mdi mdi-menu"></i>
                        </button>
                        <div class="app-search dropdown d-none d-lg-block">
                            {{-- <form>
                                <div class="input-group">
                                    <input type="text" class="form-control dropdown-toggle" placeholder="Search..." id="top-search">
                                    <span class="mdi mdi-magnify search-icon"></span>
                                    <button class="input-group-text btn-primary" type="submit">Search</button>
                                </div>
                            </form> --}}

                            {{-- <div class="dropdown-menu dropdown-menu-animated dropdown-lg" id="search-dropdown">
                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h5 class="text-overflow mb-2">Found <span class="text-danger">17</span> results</h5>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="uil-notes font-16 me-1"></i>
                                    <span>Analytics Report</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="uil-life-ring font-16 me-1"></i>
                                    <span>How can I help you?</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="uil-cog font-16 me-1"></i>
                                    <span>User profile settings</span>
                                </a>

                                <!-- item-->
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                                </div>

                                <div class="notification-list">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex">
                                            <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-2.jpg" alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0 font-14">Erwin Brown</h5>
                                                <span class="font-12 mb-0">UI Designer</span>
                                            </div>
                                        </div>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="d-flex">
                                            <img class="d-flex me-2 rounded-circle" src="assets/images/users/avatar-5.jpg" alt="Generic placeholder image" height="32">
                                            <div class="w-100">
                                                <h5 class="m-0 font-14">Jacob Deo</h5>
                                                <span class="font-12 mb-0">Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <!-- end Topbar -->

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        {{-- <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                            <li class="breadcrumb-item active">Starter</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Starter</h4>
                                </div>
                            </div>
                        </div>      --}}
                        @yield('content')
                        <!-- end page title --> 
                        
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <script>document.write(new Date().getFullYear())</script> © bitBirds - bitbirds.com
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- Right Sidebar -->
        {{-- <div class="end-bar">

            <div class="rightbar-title">
                <a href="javascript:void(0);" class="end-bar-toggle float-end">
                    <i class="dripicons-cross noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

            <div class="rightbar-content h-100" data-simplebar="">

                <div class="p-3">
                    <div class="alert alert-warning" role="alert">
                        <strong>Customize </strong> the overall color scheme, sidebar menu, etc.
                    </div>

                    <!-- Settings -->
                    <h5 class="mt-3">Color Scheme</h5>
                    <hr class="mt-1">

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="light" id="light-mode-check" checked="">
                        <label class="form-check-label" for="light-mode-check">Light Mode</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="color-scheme-mode" value="dark" id="dark-mode-check">
                        <label class="form-check-label" for="dark-mode-check">Dark Mode</label>
                    </div>
       

                    <!-- Width -->
                    <h5 class="mt-4">Width</h5>
                    <hr class="mt-1">
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="fluid" id="fluid-check" checked="">
                        <label class="form-check-label" for="fluid-check">Fluid</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="width" value="boxed" id="boxed-check">
                        <label class="form-check-label" for="boxed-check">Boxed</label>
                    </div>
        

                    <!-- Left Sidebar-->
                    <h5 class="mt-4">Left Sidebar</h5>
                    <hr class="mt-1">
                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="default" id="default-check">
                        <label class="form-check-label" for="default-check">Default</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="theme" value="light" id="light-check" checked="">
                        <label class="form-check-label" for="light-check">Light</label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="theme" value="dark" id="dark-check">
                        <label class="form-check-label" for="dark-check">Dark</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="fixed" id="fixed-check" checked="">
                        <label class="form-check-label" for="fixed-check">Fixed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="condensed" id="condensed-check">
                        <label class="form-check-label" for="condensed-check">Condensed</label>
                    </div>

                    <div class="form-check form-switch mb-1">
                        <input class="form-check-input" type="checkbox" name="compact" value="scrollable" id="scrollable-check">
                        <label class="form-check-label" for="scrollable-check">Scrollable</label>
                    </div>

                    <div class="d-grid mt-4">
                        <button class="btn btn-primary" id="resetBtn">Reset to Default</button>
                    </div>
                </div>

            </div>
        </div> --}}

        <div class="rightbar-overlay"></div>
        <!-- /End-bar -->
{{-- 
        <!-- bundle -->
        <script src="{{asset('backend/assets/js/vendor.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/app.min.js')}}"></script>

        <!-- third party js -->
        <script src="{{asset('backend/assets/js/vendor/apexcharts.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/vendor/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/vendor/jquery-jvectormap-world-mill-en.js')}}"></script>
        <!-- third party js ends --> --}}

        <!-- demo app -->
        {{-- <script src="{{asset('backend/assets/js/pages/demo.dashboard.js')}}"></script> --}}
        <!-- end demo js-->
        
        <script src="{{asset('backend/assets/js/vendor.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/app.min.js')}}"></script>
 
        {{-- <script src="{{asset('backend/assets/js/pages/demo.toastr.js')}}"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
			@if (Session::has('message'))
				var type ="{{ Session::get('alert-type', 'info') }}"
				switch(type){
				case 'info':
				toastr.info(" {{ Session::get('message') }} ");
				break;
			
				case 'success':
				toastr.success(" {{ Session::get('message') }} ");
				break;
			
				case 'warning':
				toastr.warning(" {{ Session::get('message') }} ");
				break;
			
				case 'error':
				toastr.error(" {{ Session::get('message') }} ");
				break;
				}
			@endif
		</script>

        <!-- plugin js -->
        <script src="{{asset('backend/assets/js/vendor/dropzone.min.js')}}"></script>
        <!-- init js -->
        <script src="{{asset('backend/assets/js/ui/component.fileupload.js')}}"></script>
        <!-- third party js -->
        <!-- third party js -->
        {{-- <script src="{{asset('backend/assets/js/vendor/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/vendor/dataTables.bootstrap5.js')}}"></script>
        <script src="{{asset('backend/assets/js/vendor/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/vendor/responsive.bootstrap5.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/vendor/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/vendor/buttons.bootstrap5.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/vendor/buttons.html5.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/vendor/buttons.flash.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/vendor/buttons.print.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/vendor/dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/vendor/dataTables.select.min.js')}}"></script> --}}

        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>

        <!-- third party js ends -->

        <!-- demo app -->
        <script src="{{asset('backend/assets/js/pages/demo.datatable-init.js')}}"></script>
        <!-- end demo js-->
        {{-- <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script> --}}
        
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        @yield('footer_script')
        
    </body>
</html>

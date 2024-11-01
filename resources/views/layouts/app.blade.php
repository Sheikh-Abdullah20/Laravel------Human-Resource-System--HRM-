<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/icon/favicon.ico') }}">

        <!-- Start datatable css  -->
        {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> --}}
        <link rel="stylesheet" href="{{ asset("assets/Datatables_Assets/css/datatables.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/Datatables_Assets/css/responsive.jqueryui.min.css") }}">

    <link rel="stylesheet" href="{{ asset("assets/css/jqueryui.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/flatTimepicker.css") }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    @yield('css')
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="{{ route('dashboard') }}"> <x-application-logo/> </a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                <a href="{{ route('dashboard') }}"><i
                                        class="ti-dashboard"></i><span>dashboard</span></a>
                            </li>


                            <li class="{{ request()->routeIs('department.index') ? 'active' : '' }}">
                                <a href="{{ route('department.index') }}"><i
                                        class="fa fa-building"></i><span>Departments</span></a>
                            </li>


                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i
                                        class="fa fa-users"></i><span>Employees</span></a>
                                <ul class="collapse">
                                    <li class="{{ request()->routeIs('employee.index') ? 'active' : '' }}"><a href="{{ route('employee.index') }}"><i
                                        class="fa fa-building"></i><span>Employee List</span></a></li>

                                    <li class="{{ request()->routeIs('overtime.index') ? 'active' : '' }}"><a href="{{ route('overtime.index') }}"><i
                                        class="fa fa-clock-o"></i><span>OverTime</span></a></li>
                                    <li><a href="index3.html">Settings</a></li>
                                </ul>
                            </li>


                            <li class="{{ request()->routeIs('schedule.index') ? 'active' : '' }}">
                                <a href="{{ route('schedule.index') }}"><i
                                        class="fa fa-hourglass-half"></i><span>Schedule</span></a>
                            </li>

                            <li class="{{ request()->routeIs('position.index') ? 'active' : '' }}">
                                <a href="{{ route('position.index') }}"><i
                                        class="fa fa-hourglass-half"></i><span>Position</span></a>
                            </li>

                            <li class="">
                                <a href="javascript:void(0)" aria-expanded="true"><i
                                        class="ti-dashboard"></i><span>Settings</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="index.html">Settings</a></li>
                                    <li><a href="index2.html">Settings</a></li>
                                    <li><a href="index3.html">Settings</a></li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                     
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix ">
                        <ul class="notification-area pull-right d-flex align-items-center">
                            <li id="full-view"><i class="ti-fullscreen text-secondary"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out text-secondary"></i></li>
                            <li class="settings-btn">
                                <a href="#" class="text-secondary"><i class="ti-settings" style="font-size: 26px"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- main content area Start -->
            @yield('content')

        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
                <p>© Copyright 2024. All right reserved.by Sheikh </p>
            </div>
        </footer>
        <!-- footer area end-->
    </div>
   
    <!-- jquery latest version -->
    <script src="{{ asset('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/jqueryui.js') }}"></script>
 
   
    <!-- Start datatable js -->

{{-- 
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>  --}}

     <script src="{{ asset("assets/Datatables_Assets/js/jquery.dataTables.js") }}"></script>
     <script src="{{ asset("assets/Datatables_Assets/js/jquery.dataTables.min.js") }}"></script>
     <script src="{{ asset("assets/Datatables_Assets/js/dataTables.bootstrap4.min.js") }}"></script>
     <script src="{{ asset("assets/Datatables_Assets/js/dataTables.responsive.min.js") }}"></script>
     <script src="{{ asset("assets/Datatables_Assets/js/responsive.bootstrap.min.js") }}"></script>
 
 
     <!-- Datatables Buttons Cdn -->
     <script src="{{ asset("assets/Datatables_Assets/js/dataTables.buttons.min.js") }}"></script>
     <script src="{{ asset("assets/Datatables_Assets/js/jszip.min.js") }}"></script>
     <script src="{{ asset("assets/Datatables_Assets/js/buttons.html5.min.js") }}"></script>
     <script src="{{ asset("assets/Datatables_Assets/js/buttons.print.min.js") }}"></script>
     <script src="{{ asset("assets/Datatables_Assets/js/pdfmake.min.js") }}"></script>
     <script src="{{ asset("assets/Datatables_Assets/js/vfs_fonts.js") }}"></script>


    <!-- bootstrap 4 js -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>

   
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset("assets/js/flatTimepicker.js") }}"></script>
    @yield('js')
</body>

</html>
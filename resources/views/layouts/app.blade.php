<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/icon/favicon.ico') }}">

        <!-- Start datatable css  -->
    <link rel="stylesheet" href="{{ asset("assets/Datatables Assets/css/jqueryDatatables.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/Datatables Assets/css/juqeryDatatblesb4.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/Datatables Assets/css/DatatablesResponsive.bootstrap.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/Datatables Assets/css/responsive.jqueryui.min.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/css/jqueryui.css") }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/amcharPlugin.css') }}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
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
                                <a href="{{ route('dashboard') }}" aria-expanded="true"><i
                                        class="ti-dashboard"></i><span>dashboard</span></a>
                            </li>


                            <li class="{{ request()->routeIs('department.index') ? 'active' : '' }}">
                                <a href="{{ route('department.index') }}" aria-expanded="true"><i
                                        class="fa fa-building"></i><span>Departments</span></a>
                            </li>

                            
                            <li class="{{ request()->routeIs('employee.index') ? 'active' : '' }}">
                                <a href="{{ route('employee.index') }}" aria-expanded="true"><i
                                        class="fa fa-users"></i><span>Employees</span></a>
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
                <p>© Copyright 2018. All right reserved.by Sheikh </p>
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

     <script src="{{ asset("assets/Datatables Assets/js/jquery.dataTables.js") }}"></script>
     <script src="{{ asset("assets/Datatables Assets/js/jquery.dataTables.min.js") }}"></script>
     <script src="{{ asset("assets/Datatables Assets/js/dataTables.bootstrap4.min.js") }}"></script>
     <script src="{{ asset("assets/Datatables Assets/js/dataTables.responsive.min.js") }}"></script>
     <script src="{{ asset("assets/Datatables Assets/js/responsive.bootstrap.min.js") }}"></script>
 
 
     <!-- Datatables Buttons Cdn -->
     <script src="{{ asset("assets/Datatables Assets/js/dataTables.buttons.min.js") }}"></script>
     <script src="{{ asset("assets/Datatables Assets/js/jszip.min.js") }}"></script>
     <script src="{{ asset("assets/Datatables Assets/js/buttons.html5.min.js") }}"></script>
     <script src="{{ asset("assets/Datatables Assets/js/buttons.print.min.js") }}"></script>
     <script src="{{ asset("assets/Datatables Assets/js/pdfmake.min.js") }}"></script>
     <script src="{{ asset("assets/Datatables Assets/js/vfs_fonts.js") }}"></script>


    <!-- bootstrap 4 js -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- start chart js -->
    <script src="{{ asset('assets/js/chart.min.js') }}"></script>
    <!-- start highcharts js -->
    <script src="{{ asset('assets/js/highChart.js') }}"></script>
    <!-- start zingchart js -->
    <script src="{{ asset('assets/js/zingChart.js') }}"></script>
    <!-- all line chart activation -->
    <script src="{{ asset('assets/js/line-chart.js') }}"></script>
    <!-- all pie chart -->
    <script src="{{ asset('assets/js/pie-chart.js') }}"></script>
    <!-- others plugins -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>

</html>
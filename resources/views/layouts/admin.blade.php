<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Admin Omahku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset("admin/images/favicon.ico")}}">

     <!-- Sweet Alert-->
     <link href="{{asset("admin/libs/sweetalert2/sweetalert2.min.css")}}" rel="stylesheet" type="text/css" />

    <!-- jquery.vectormap css -->
    <link href="{{asset("admin/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css")}}" rel="stylesheet"
        type="text/css" />
    
    <link rel="stylesheet" href="{{asset("admin/libs/morris.js/morris.css")}}">

    <!-- DataTables -->
    <link href="{{asset("admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css")}}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset("admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css")}}" rel="stylesheet"
        type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{asset("admin/css/bootstrap.min.css")}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset("admin/css/icons.min.css")}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset("admin/css/app.min.css")}}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    
<!-- <body data-layout="horizontal" data-topbar="light"> -->

<!-- Begin page -->
<div id="layout-wrapper">

    @include('layouts.inc.admin.header')
    @include("layouts.inc.admin.left-sidebard")

    

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    @yield('content')
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

@include("layouts.inc.admin.right-sidebar")
<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script src="{{asset("admin/libs/jquery/jquery.min.js")}}"></script>
<script src="{{asset("admin/libs/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src="{{asset("admin/libs/metismenu/metisMenu.min.js")}}"></script>
<script src="{{asset("admin/libs/simplebar/simplebar.min.js")}}"></script>
<script src="{{asset("admin/libs/node-waves/waves.min.js")}}"></script>

        <!-- Sweet Alerts js -->
<script src="{{asset("admin/libs/sweetalert2/sweetalert2.min.js")}}"></script>

        <!-- Sweet alert init js-->
<script src="{{asset("admin/js/pages/sweet-alerts.init.js")}}"></script>


<!-- morris chart -->
<script src="{{asset("admin/libs/morris.js/morris.min.js")}}"></script>
<script src="{{asset("admin/libs/raphael/raphael.min.js")}}"></script>

<!-- jquery.vectormap map -->
<script src="{{asset("admin/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js")}}"></script>
<script src="{{asset("admin/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js")}}"></script>

<!-- Required datatable js -->
<script src="{{asset("admin/libs/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js")}}"></script>

<!-- Responsive examples -->
<script src="{{asset("admin/libs/datatables.net-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("admin/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js")}}"></script>

<script src="{{asset("admin/js/pages/dashboard.init.js")}}"></script>

<!-- App js -->
<script src="{{asset("admin/js/app.js")}}"></script>
</body>

</html>
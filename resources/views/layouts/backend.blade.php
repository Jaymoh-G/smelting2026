<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smelting Afrika</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <link href="{!! asset('css/common/bootstrap.css') !!}" rel="stylesheet" type="text/css" media="all" />


    <!-- Theme style -->
    <link href="{{ asset('adminlte/adminlte.min.css') }}" rel="stylesheet">

    <!-- Custom style -->
    <link href="{{ asset('css/backend/backend_styles.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
@include('backend.partials.header')
<!-- /.navbar -->

    <!-- Main Sidebar Container -->
@include('backend.partials.sidebar')


<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pt-3">
        <!-- Content Header (Page header) -->
    @include('backend.partials.breadcrumbs')
    <!-- /.content-header -->

        <!-- Main content -->
    @yield('content')
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
@include('backend.partials.control-sidebar')
<!-- /.control-sidebar -->

    <!-- Main Footer -->
    @include('backend.partials.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{asset('adminlte/adminlte.min.js')}}"></script>
@stack('scripts')
</body>
</html>

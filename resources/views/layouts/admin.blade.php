<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{url('/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{url('/admin/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('/admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{url('/admin/bower_components/select2/dist/css/select2.min.css')}}">
    <!-- Jquery UI -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/admin/dist/css/AdminLTE.min.css')}}">

    <link rel="stylesheet" href="{{url('/admin/dist/css/skins/_all-skins.min.css')}}">
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="{{url('/admin/css/admin.css')}}">
    <script>
        window.host = "{{url('/')}}"
    </script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('layouts.header')
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('pageTitle')
                </h1>

                <ol class="breadcrumb">
                    @yield('header-right')
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
        </div>
    </div>

    <!-- jQuery 3 -->
    <script src="{{url('/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{url('/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{url('/admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
    <!-- DataTables -->
    <script src="{{url('/admin/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <!-- CK Editor -->
    <script src="{{url('/admin/bower_components/ckeditor/ckeditor.js')}}"></script>
    <!-- Select2 -->
    <script src="{{url('/admin/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- Jquery UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- AdminLTE App -->
    <script src="{{url('/admin/dist/js/adminlte.min.js')}}"></script>
    <script src="{{url('/admin/js/admin.js')}}"></script>
    @yield('footerScript')
</body>

</html>
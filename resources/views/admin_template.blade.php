<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $page_title or "Autoškola Tintilinić" }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset("bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("bower_components/font-awesome/css/font-awesome.min.css")}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset("bower_components/Ionicons/css/ionicons.min.css")}}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset("bower_components/datatables.net-bs/css/datatables.min.css")}}">
    <link rel="stylesheet" href="{{asset("bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css")}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("dist/css/AdminLTE.min.css")}}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="{{asset("dist/css/skins/skin-blue.min.css")}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="skin-black">
<div class="wrapper">

@include('layouts.header')

@include('layouts.sidebar')

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                {{ $page_title or "" }}
                <small>{{ $page_description or null }}</small>
            </h1>
        </section>
        <section class="content">
            @yield('content')
        </section>
    </div>

    @include('layouts.footer')

</div><!-- ./wrapper -->
<!-- ./wrapper -->

<!-- JS SCRIPTS -->
<script src="{{asset("bower_components/jquery/dist/jquery.min.js")}}"></script>
<script src="{{asset("bower_components/jquery/dist/jquery-1.12.3.js")}}"></script>
<script src="{{asset("bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>
<script src="{{asset("bower_components/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
<script src="{{asset("dist/js/adminlte.min.js")}}"></script>

<script>
    $(document).ready(function() {
        $('#example1').DataTable();
        $('#example2').DataTable();
        $('#example3').DataTable();
    } );
</script>
</body>
</html>
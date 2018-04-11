<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset ("bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset ("bower_components/font-awesome/css/font-awesome.min.css") }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset("bower_components/Ionicons/css/ionicons.min.css")}}">
  <!-- Theme style -->
  <!-- DataTables -->
<link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!--select 2 css -->

  <link rel="stylesheet" href="{{ asset ("bower_components/select2/dist/css/select2.min.css")}}">

  <link rel="stylesheet" href="{{ asset ("bower_components/admin-lte/dist/css/AdminLTE.min.css")}}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/skins/skin-green.min.css")}}">
  <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

  <!-- Styles -->

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
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

      <!-- Header -->
      @include('layout.header')

      <!-- Sidebar -->
      @include('layout.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            {{ $page_title or "Dashboard" }}
            <small>{{ $page_description or "Everything at quick glance" }}</small>
          </h1>
        </section>

              @if(Session::has('flash_message'))
                   <div class="container">
                       <div class="alert alert-success"><em> {!! session('flash_message') !!}</em>
                       </div>
                   </div>
              @endif

               <div class="row">
                   <div class="col-md-8 col-md-offset-2">
                       @include ('errors.list') {{-- Including error file --}}
                   </div>
               </div>
        <!-- Main content -->
        <section class="content container-fluid">
          <!-- Your Page Content Here -->
          @yield('content')
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Footer -->
      @include('layout.footer')

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset ("bower_components/jquery/dist/jquery.min.js") }}"></script>

    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset ("bower_components/bootstrap/dist/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("bower_components/select2/dist/js/select2.full.min.js")}}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("bower_components/admin-lte/dist/js/adminlte.min.js") }}" type="text/javascript"></script>
    <!-- select 2 js -->
    !-- DataTables -->
      <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
      });
    </script>
    <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
      @yield('body_script')
  </body>
</html>

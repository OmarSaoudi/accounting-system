<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  @include('layouts.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    @include('layouts.main-headerbar')
    <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.main-sidebar')

    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->

    @include('layouts.footer')

    <div class="control-sidebar-bg"></div>

  </div>
  <!-- ./wrapper -->

  @include('layouts.footer-scripts')
  </body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
  @include('templates.partials.head')
  <title>
    @yield('title', 'SMAN 1 AMBUNTEN')
  </title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    @include('templates.partials.navbar')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    @include('templates.partials.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content">
        @yield('content')
      </div>
    </div>
    <!-- /.content-wrapper -->
    @include('templates.partials.footer')
  </div>
  <!-- ./wrapper -->
  @include('templates.partials.script')
</body>

</html>

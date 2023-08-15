<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>@yield('title', 'CarDrive365')</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ url('/css/custom.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ url('plugins/toastr/toastr.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a> 
        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('panel_dashboard') }}" class="brand-link">
      <img src="{{ url('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">CarDrive365</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->first_name." ".Auth::user()->last_name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('panel_dashboard') }}" class="nav-link">
              <i class="fas fa-tachometer-alt"></i>
              <p> Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('car_add') }}" class="nav-link">
              <i class="fas fa-plus-square"></i>
              <p> Add Car</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('car_list') }}" class="nav-link">
              <i class="fas fa-shuttle-van"></i>
              <p> My Cars</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('lead_list') }}" class="nav-link">
              <i class="fas fa-users"></i>
              <p> Leads</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="fas fa-cog"></i>
              <p>
                 Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user_profile') }}" class="nav-link ">
                  <i class="fas fa-user"></i>
                  <p> My Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('reset_password') }}" class="nav-link ">
                  <i class="fas fa-key"></i>
                  <p> Change password</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!-- <div class="float-right d-none d-sm-inline">
      Anything you want
    </div> -->
    <!-- Default to the left -->
    <strong>Copyright &copy; <script>document.write(new Date().getFullYear());</script> <a href="https://www.cardrive365.com/">cardrive365.com</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->


    <!-- jQuery -->
    <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ url('/js/adminlte.min.js') }}"></script>

    <!-- Toastr -->
    <script src="{{ url('plugins/toastr/toastr.min.js') }}"></script>  
    <script>
      @if(session('success'))
        toastr.success("{{ session('success') }}");
      @endif
      @if(session('info'))
        toastr.info("{{ session('info') }}");
      @endif
      @if(session('error'))
        toastr.error("{{ session('error') }}");
      @endif
    </script>

    @yield('footer-js')

    <script>
      var url = window.location.href;
      var anand = '';

      // for sidebar menu entirely but not cover treeview
      $('ul.nav-sidebar a').filter(function() {
          return this.href != url;
      }).removeClass('active');

      // for sidebar menu entirely but not cover treeview
      $('ul.nav-sidebar a').filter(function() {
          return this.href == url;
      }).addClass('active');

      // for treeview
      $('ul.nav-treeview a').filter(function() {
          if(this.href == url) {
            $(this).parent().parent().parent().find('.nav-link').addClass('active');
            $(this).parent().parent().parent().addClass('menu-open');
          }

          return this.href == url;
      }).parentsUntil(".nav-sidebar > .treeview-menu").addClass('active');
    </script>
</body>
</html>

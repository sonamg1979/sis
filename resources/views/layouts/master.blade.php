<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIS | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
        
      
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>
    <h4 class="text-center text-primary">Choetse Dzong; Sector Information System</h4>

    <!-- SEARCH FORM -->
   <!--  <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      @guest
      @else
      <!-- <li class="dropdown">
                        <a  href="{{ url('/user/logout') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ 'App\User' == Auth::getProvider()->getModel() ? route('logout') : route('logout') }}" method="GET" style="display: none;">
                                @csrf
                            </form>
                    </li> -->
      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
              </form>
        </div>
        </li>
      @endguest
     
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard')}}" class="brand-link">
      <img src="{{ asset('dist/img/rgob-logo.png') }}" alt="SIS Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SECTOR INFORMATION</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ url('/dashboard') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Demographic
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">2</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/dashboard/populationage') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Population By Age-Group</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/dashboard/populationplace')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Population By Age-Group & Place</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <span class="badge badge-info right">6</span>
              <p>
                Education
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/dashboard/studentinfoclass') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student By Class</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/dashboard/studentinfo') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student By Class & Age-Group</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/dashboard/studentschoolinfo') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student By School</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/dashboard/studentschool') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Overall Student By Class</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/dashboard/schoolstaff') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teacher & Staff By School</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/dashboard/schoollist') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>School Details</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Agriculture
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">7</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/dashboard/agrifacilities') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Facilties</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/dashboard/agrifarmgroup') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Farm Group</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/dashboard/agriirrigation') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Irrigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/dashboard/agrifarmroad') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Farm Road</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/dashboard/agrielectricfencing') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Electric/Solar Fencing</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/dashboard/agricultureproduct') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crop Production</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/dashboard/landdevelopment') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Land Development</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Livestock
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/dashboard/livestockinfra') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Infrastructure</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/dashboard/livestockgroup') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Farm Group & Cooperatives</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/dashboard/livestockproduct') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Livestock Product</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ url('/dashboard/activity_all') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Project/Activities
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/dashboard/focus_all') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Sector Primary Focus
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/dashboard/culture_all') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Culture & Heritages
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
 
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('msg.msg')
    @yield ('content')
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019-2020 <a href="http://trongsa.gov.bt">ICT Dzongkhag Administration Trongsa</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>
@yield ('script')
<script>
        $(document).ready(function() {
        $('#myTable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );
        $('#employee').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );
    } );
        
    </script>
</body>
</html>

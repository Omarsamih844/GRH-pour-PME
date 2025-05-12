<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Dashboard | {{ config('app.name') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin-assets/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
        }
        
        .btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:focus {
            background-color: #4e73df !important;
            border-color: #4e73df !important;
        }
        
        .btn-success, .btn-success:hover, .btn-success:active, .btn-success:focus {
            background-color: #1cc88a !important;
            border-color: #1cc88a !important;
        }
        
        .btn-warning, .btn-warning:hover, .btn-warning:active, .btn-warning:focus {
            background-color: #f6c23e !important;
            border-color: #f6c23e !important;
            color: #fff !important;
        }
        
        .btn-danger, .btn-danger:hover, .btn-danger:active, .btn-danger:focus {
            background-color: #e74a3b !important;
            border-color: #e74a3b !important;
        }
        
        .btn-info, .btn-info:hover, .btn-info:active, .btn-info:focus {
            background-color: #36b9cc !important;
            border-color: #36b9cc !important;
        }
        
        .nav-sidebar .nav-item > .nav-link.active {
            background-color: #4e73df !important;
        }
        
        .page-item.active .page-link {
            background-color: #4e73df !important;
            border-color: #4e73df !important;
        }
        
        .sidebar-dark-primary {
            background: #3a3a3a !important;
        }
        
        .main-header {
            border-bottom: 1px solid #e3e6f0 !important;
        }
        
        .main-sidebar {
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15) !important;
        }
        
        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1) !important;
            border-radius: 0.35rem !important;
        }
        
        .card-header {
            background-color: #f8f9fc !important;
            border-bottom: 1px solid #e3e6f0 !important;
        }
        
        .card-footer {
            background-color: #f8f9fc !important;
            border-top: 1px solid #e3e6f0 !important;
        }
        
        .main-header {
            background-color: #fff !important;
        }
        
        .main-header .navbar-nav .nav-item .nav-link {
            color: #6e707e !important;
        }
        
        .table-bordered {
            border: 1px solid #e3e6f0 !important;
        }
        
        .table-bordered th, .table-bordered td {
            border: 1px solid #e3e6f0 !important;
        }
        
        .table thead th {
            font-weight: 600 !important;
            background-color: #f8f9fc !important;
        }
        
        /* Additional CSS for sidebar menu */
        .nav-sidebar .nav-treeview {
            padding-left: 15px;
        }
        
        .nav-sidebar .menu-active {
            background-color: rgba(255, 255, 255, 0.1);
        }
        
        .nav-sidebar .nav-link[data-toggle="collapse"] {
            cursor: pointer;
        }
        
        .nav-sidebar .collapse {
            transition: all 0.3s ease;
        }
        
        .nav-sidebar .collapse .nav-link {
            padding-left: 35px !important;
        }
    </style>
    
    @notifyCss
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">3 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 1 new message
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 1 new report
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ isset(auth()->user()->employee) && auth()->user()->employee->employee_image ? url('/uploads/' . auth()->user()->employee->employee_image) : asset('assests/image/default.png') }}" 
                             class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="{{ isset(auth()->user()->employee) && auth()->user()->employee->employee_image ? url('/uploads/' . auth()->user()->employee->employee_image) : asset('assests/image/default.png') }}" 
                                 class="img-circle elevation-2" alt="User Image">
                            <p>
                                {{ auth()->user()->name }}
                                <small>{{ auth()->user()->role }}</small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="{{ route('employee.profile') }}" class="btn btn-default btn-flat">Profile</a>
                            <a href="{{ route('admin.logout') }}" class="btn btn-default btn-flat float-right">Sign out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('employee.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title', 'Employee Dashboard')</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; {{ date('Y') }} <a href="/">Employee Management System</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('admin-assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('admin-assets/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('admin-assets/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('admin-assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('admin-assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('admin-assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('admin-assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- DataTables -->
    <script src="{{ asset('admin-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin-assets/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin-assets/js/demo.js') }}"></script>

    <x-notify::notify />
    @notifyJs

    <script>
        $(function() {
            // Initialize DataTables
            if ($('.data-table').length > 0) {
                $('.data-table').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            }
        });
    </script>
    
    @yield('scripts')
    
    <script>
        // Direct script for menu toggling - this should work without AdminLTE
        $(document).ready(function() {
            // Initialize Bootstrap's collapse component
            $('.collapse').collapse({
                toggle: false
            });
            
            // Make sure menu items with active children are expanded
            $('#attendance-menu, #leave-menu').on('shown.bs.collapse', function() {
                $(this).parent().addClass('menu-active');
            }).on('hidden.bs.collapse', function() {
                $(this).parent().removeClass('menu-active');
            });
            
            // Show menu items that should be open by default
            $('[data-toggle="collapse"].active').each(function() {
                const target = $(this).attr('href');
                $(target).collapse('show');
            });
        });
    </script>
</body>

</html> 
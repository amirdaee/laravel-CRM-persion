<!DOCTYPE html>
<html>
<head>
@include('includes.head-dashboard')
</head>
<body class="skin-blue sidebar-mini wysihtml5-supported">
<div class="wrapper ">
    <?php $user = Auth::user() ?>

    @include('includes.main-header')


    <!-- Left side column. contains the logo and sidebar -->
    @include('includes.main-sidebar')


    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    پیشخوان
                    <small>پنل مدیریت</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
                    <li class="active"></li>
                    @if(isset($subactivesheet))
                        <li class="active"></li>
                    @endif
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section>
        </div>

    <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2016 <a href="#">media hamrah</a>.</strong> All rights reserved.
        </footer>

    <!-- Control Sidebar -->
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->
    @include('includes.footer-dashboard')
</body>
</html>

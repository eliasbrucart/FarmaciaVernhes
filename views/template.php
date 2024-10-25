<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmacia Vernhes</title>
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?php
        session_start();
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $url = Route::GetFrontendRoute();

        $server = Route::GetBackendRoute();
    ?>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $url; ?>views/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo $url; ?>views/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo $url; ?>views/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo $url; ?>views/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo $url; ?>views/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo $url; ?>views/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo $url; ?>views/plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="<?php echo $url; ?>views/plugins/fullcalendar/main.css">

    <link rel="stylesheet" href="<?php echo $url; ?>views/plugins/dropzone/dropzone.css">

    <link rel="stylesheet" href="<?php echo $url; ?>views/plugins/datepicker/bootstrap-datepicker.min.css">

    <link rel="stylesheet" href="<?php echo $url; ?>views/plugins/sweetalert2/sweetalert2.min.css">

    <link rel="stylesheet" href="<?php echo $url; ?>views/plugins/toastr/toastr.min.css">

    <link rel="stylesheet" href="<?php echo $url; ?>views/css/turner/turner_module.css">
    
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/admin/admin_module.css">
    
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/pharmacies/pharmacies_module.css">

    <link rel="stylesheet" href="<?php echo $url; ?>views/css/perfumery/perfumery_module.css">

    <link rel="stylesheet" href="<?php echo $url; ?>views/css/perfumery/perfumery_view_module.css">

    <input type="hidden" value="<?php echo $url; ?>" id="hiddenPath">

</head>
<body translate="no">

    <?php 

        $routes = array();
        $route = null;

        if(isset($_GET["ruta"])){
            $routes = explode("/", $_GET["ruta"]);
            if($route != null || $routes[0] == "turner"){
                include "modules/".$routes[0]."/".$routes[0]."_module.php";
            }else if($routes[0] == "home" || $routes[0] == "admin" || $routes[0] == "pharmacies" || $routes[0] == "perfumery" || $routes[0] == "users"){
                if(isset($_SESSION["validateSession"]) && $_SESSION["validateSession"] == "ok"){
                    include "modules/header/header_module.php"; //temp
                    include "modules/".$routes[0]."/".$routes[0]."_module.php";
                    include "modules/footer/footer_module.php";
                }
            }else if($routes[0] == "perfumery_view"){
                include "modules/perfumery/".$routes[0]."_module.php";
            }else if($routes[0] == "register" || $routes[0] == "login" || $routes[0] == "logout"){
                include "modules/".$routes[0]."/".$routes[0]."_module.php";
            }
        }else{
            include "modules/login/login_module.php";
        }

    ?>

    <!-- jQuery -->
    <script src="<?php echo $url; ?>views/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo $url; ?>views/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo $url; ?>views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo $url; ?>views/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo $url; ?>views/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo $url; ?>views/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo $url; ?>views/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo $url; ?>views/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo $url; ?>views/plugins/moment/moment.min.js"></script>
    <script src="<?php echo $url; ?>views/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo $url; ?>views/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?php echo $url; ?>views/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo $url; ?>views/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo $url; ?>views/js/adminlte.js"></script>

    <script src="<?php echo $url; ?>views/plugins/moment/moment.min.js"></script>

    <script src="<?php echo $url; ?>views/plugins/fullcalendar/main.js"></script>

    <script src="<?php echo $url; ?>views/plugins/dropzone/dropzone.js"></script>

    <script src="<?php echo $url; ?>views/plugins/datepicker/bootstrap-datepicker.min.js"></script>

    <script src="<?php echo $url; ?>views/plugins/sweetalert2/sweetalert2.min.js"></script>

    <script src="<?php echo $url; ?>views/plugins/toastr/toastr.min.js"></script>

    <!-- Data tables libraries -->
	<script src="<?php echo $url; ?>views/lib/browser_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo $url; ?>views/lib/browser_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo $url; ?>views/lib/browser_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo $url; ?>views/lib/browser_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

    <script src="<?php echo $url; ?>views/js/template.js"></script>

    <!-- AdminLTE for demo purposes -->
    <!--<script src="<?php echo $url; ?>views/js/demo.js"></script>-->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo $url; ?>views/js/pages/dashboard.js"></script>
    <script src="<?php echo $url; ?>views/js/calendar/calendar.js"></script>
    <script src="<?php echo $url; ?>views/js/admin/admin_module.js"></script>
    <!--<script src="<?php echo $url; ?>views/js/turner/turner_module.js"></script>-->
    <script src="<?php echo $url; ?>views/js/turner/turner_module_2.js"></script>
    <!--<script src="<?php echo $url; ?>views/js/turner/turner_video_fullscreen.js"></script>-->
    <script src="<?php echo $url; ?>views/js/pharmacies/pharmacies_module.js"></script>
    <script src="<?php echo $url; ?>views/js/perfumery/perfumery_module.js"></script>
    <script src="<?php echo $url; ?>views/js/perfumery/perfumery_view_module.js"></script>
    <script src="<?php echo $url; ?>views/js/users/users_module.js"></script>
    
</body>
</html>
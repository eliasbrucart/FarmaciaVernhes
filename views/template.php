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

    <input type="hidden" value="<?php echo $url; ?>" id="hiddenPath">

</head>
<body>

    <?php 

        $routes = array();
        $route = null;

        include "modules/header/header_module.php"; //temp
        include "modules/admin/admin_module.php";
        include "modules/footer/footer_module.php";

        if(isset($_GET["ruta"])){
            $routes = explode("/", $_GET["ruta"]);

            include "modules/header/header_module.php";
        }else{

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

    <script src="<?php echo $url; ?>views/js/template.js"></script>

    <!-- AdminLTE for demo purposes -->
    <!--<script src="<?php echo $url; ?>views/js/demo.js"></script>-->
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo $url; ?>views/js/pages/dashboard.js"></script>
    <script src="<?php echo $url; ?>views/js/calendar/calendar.js"></script>
    <script src="<?php echo $url; ?>views/js/admin_module.js"></script>
    
</body>
</html>
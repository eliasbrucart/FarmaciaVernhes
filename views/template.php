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

    <input type="hidden" value="<?php echo $url; ?>" id="hiddenPath">

</head>
<body>

    <?php 

        $routes = array();
        $route = null;

        include "modules/header/header_module.php"; //temp

        if(isset($_GET["ruta"])){
            $routes = explode("/", $_GET["ruta"]);

            include "modules/header/header_module.php";
        }else{

        }

    ?>
    
</body>
</html>
<?php

ini_set('display_errors', 1);
ini_set("log_errors", 1);
ini_set("error_log",  "D:/xampp/htdocs/FarmaciaVernhes/php_error_log");

require_once "controllers/template_controller.php";
require_once "controllers/pharmacy_controller.php";
require_once "controllers/turner_controller.php";
require_once "controllers/perfumery_controller.php";
require_once "controllers/users_controller.php";

require_once "models/pharmacy_model.php";
require_once "models/perfumery_model.php";
require_once "models/turner_model.php";
require_once "models/users_model.php";

require_once "models/routes.php";

$template = new TemplateController();
$template->GetTemplate();

?>
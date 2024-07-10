<?php

require "../controllers/turner_controller.php";
require "../models/turner_model.php";

class TurnerModuleAjax{
    public $actualDateToDBFormat;
    public function GetTodayPharmacies(){
        $response = TurnerController::GetTodayPharmacies($this->actualDateToDBFormat);

        echo json_encode($response);
    }
}

if(isset($_POST["getTodayPharmacies"])){
    $todayPharmacies = new TurnerModuleAjax();
    $todayPharmacies->actualDateToDBFormat = $_POST["actualDateToDBFormat"];
    $todayPharmacies->GetTodayPharmacies();
}

?>
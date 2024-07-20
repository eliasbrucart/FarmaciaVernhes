<?php

require "../controllers/turner_controller.php";
require "../models/turner_model.php";

require "../controllers/pharmacy_controller.php";
require "../models/pharmacy_model.php";

class TurnerModuleAjax{
    public $actualDateToDBFormat;
    public function GetTodayPharmacies(){
        $response = TurnerController::GetTodayPharmacies($this->actualDateToDBFormat);

        echo json_encode($response);
    }

    public $idTodayPharmacy;
    public function GetPharmacyAddress(){
        $response = PharmacyController::GetPharmacyAddress($this->idTodayPharmacy);

        echo json_encode($response);
    }

    public $idTurnerFullDay;
    public $stateTurner;
    public function SetTurnerFullDay(){
        $response = TurnerController::SetTurnerFullDay($this->idTurnerFullDay, $this->stateTurner);

        echo json_encode($response);
    }

    public $idTurnerGetFullDay;
    public function GetFullDayState(){
        $response = TurnerController::GetFullDayState($this->idTurnerGetFullDay);

        echo json_encode($response);
    }
}

if(isset($_POST["getTodayPharmacies"])){
    $todayPharmacies = new TurnerModuleAjax();
    $todayPharmacies->actualDateToDBFormat = $_POST["actualDateToDBFormat"];
    $todayPharmacies->GetTodayPharmacies();
}

if(isset($_POST["getTodayPharmacyAddress"])){
    $todayPharmacyAddress = new TurnerModuleAjax();
    $todayPharmacyAddress->idTodayPharmacy = $_POST["idTodayPharmacy"];
    $todayPharmacyAddress->GetPharmacyAddress();
}

if(isset($_POST["setTurnerFullDay"])){
    $turnerFullDay = new TurnerModuleAjax();
    $turnerFullDay->idTurnerFullDay = $_POST["idTurnerFullDay"];
    $turnerFullDay->stateTurner = $_POST["stateTurner"];
    $turnerFullDay->SetTurnerFullDay();
}

if(isset($_POST["getFullDayState"])){
    $getFullDayState = new TurnerModuleAjax();
    $getFullDayState->idTurnerGetFullDay = $_POST["idTurnerGetFullDay"];
    $getFullDayState->GetFullDayState();
}

?>
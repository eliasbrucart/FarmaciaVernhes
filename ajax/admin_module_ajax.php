<?php

require "../controllers/pharmacy_controller.php";
require "../models/pharmacy_model.php";

class AdminModuleAjax{
    public $namePharmacyToAdd;
    public function AddPharmacy(){
        $data = array("namePharmacyToAdd"=>$this->namePharmacyToAdd);

        $response = PharmacyController::AddPharmacy($data);

        echo json_encode($response);
    }
}

if(isset($_POST["namePharmacyToAdd"])){
    $addPharmacy = new AdminModuleAjax();
    $addPharmacy->namePharmacyToAdd = $_POST["namePharmacyToAdd"];
    $addPharmacy->AddPharmacy();
}

?>
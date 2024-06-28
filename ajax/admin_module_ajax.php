<?php

require "../controllers/pharmacy_controller.php";
require "../models/pharmacy_model.php";

class AdminModuleAjax{
    public $namePharmacyToAdd;
    public $addressPharmacyToAdd;
    public function AddPharmacy(){
        $data = array("namePharmacyToAdd"=>$this->namePharmacyToAdd,
                      "addressPharmacyToAdd"=>$this->addressPharmacyToAdd);

        $response = PharmacyController::AddPharmacy($data);

        echo json_encode($response);
    }

    public function GetPharmacies(){
        $response = PharmacyController::GetPharmacies();

        echo json_encode($response);
    }
}

if(isset($_POST["namePharmacyToAdd"])){
    $addPharmacy = new AdminModuleAjax();
    $addPharmacy->namePharmacyToAdd = $_POST["namePharmacyToAdd"];
    $addPharmacy->addressPharmacyToAdd = $_POST["addressPharmacyToAdd"];
    $addPharmacy->AddPharmacy();
}

if(isset($_POST["getPharmacies"])){
    $getPharmacies = new AdminModuleAjax();
    $getPharmacies->GetPharmacies();
}

?>
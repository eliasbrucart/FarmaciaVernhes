<?php

require "../controllers/pharmacy_controller.php";
require "../models/pharmacy_model.php";

require "../controllers/turner_controller.php";
require "../models/turner_model.php";

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

    public $namePharmacyTurner;
    public $dateTurner;
    public $pharmacy24hs;
    public function CreateTurner(){
        /*$data = array("namePharmacy"=>$this->namePharmacyTurner,
                      "dateTurner"=>$this->dateTurner,
                      "pharmacy24hs"=>$this->pharmacy24hs);*/
        
        $response = TurnerController::CreateTurner($this->namePharmacyTurner, $this->dateTurner, $this->pharmacy24hs);

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

if(isset($_POST["createTurner"])){
    $createTurner = new AdminModuleAjax();
    $createTurner->namePharmacyTurner = $_POST["recieveEventName"];
    $createTurner->dateTurner = $_POST["dropDate"];
    $createTurner->pharmacy24hs = $_POST["pharmacy24hs"];
    $createTurner->CreateTurner();
}

?>
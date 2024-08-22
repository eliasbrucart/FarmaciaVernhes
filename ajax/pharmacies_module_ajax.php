<?php

require_once "../controllers/pharmacy_controller.php";
require_once "../models/pharmacy_model.php";

class PharmaciesModuleAjax{
    public $idPharmacyToEdit;
    public $namePharmacyToEdit;
    public $addressPharmacyToEdit;
    public $multimedia24;
    public $multimedia12;
    public function EditPharmacy(){

        /*if($this->multimedia24 != null){
            $data = array("idPharmacyToEdit"=>$this->idPharmacyToEdit,
                      "namePharmacyToEdit"=>$this->namePharmacyToEdit,
                      "addressPharmacyToEdit"=>$this->addressPharmacyToEdit,
                      "multimedia24"=>$this->multimedia24);

            $response = PharmacyController::EditPharmacy($data);

            echo json_encode($response);
        }

        if($this->multimedia12 != null){
            $data = array("idPharmacyToEdit"=>$this->idPharmacyToEdit,
                      "namePharmacyToEdit"=>$this->namePharmacyToEdit,
                      "addressPharmacyToEdit"=>$this->addressPharmacyToEdit,
                      "multimedia12"=>$this->multimedia12);

            $response = PharmacyController::EditPharmacy($data);

            echo json_encode($response);
        }*/

        $data = array("idPharmacyToEdit"=>$this->idPharmacyToEdit,
                      "namePharmacyToEdit"=>$this->namePharmacyToEdit,
                      "addressPharmacyToEdit"=>$this->addressPharmacyToEdit,
                      "multimedia24"=>$this->multimedia24,
                      "multimedia12"=>$this->multimedia12);

        $response = PharmacyController::EditPharmacy($data);

        echo json_encode($response);
    }

    public $pharmacyFiles;
    public $pharmacyFilesRoute;
    public function UploadPharmacyFiles(){
        PharmacyController::DeletePharmacyFiles($this->pharmacyFilesRoute);
        $response = PharmacyController::CreatePharmacyFiles($this->pharmacyFiles, $this->pharmacyFilesRoute);

        echo $response;
    }

    public $pharmacyFiles12;
    //public $pharmacyFilesRoute;
    public function UploadPharmacyFiles12(){
        PharmacyController::DeletePharmacyFiles($this->pharmacyFilesRoute);
        $response = PharmacyController::CreatePharmacyFiles($this->pharmacyFiles12, $this->pharmacyFilesRoute);

        echo $response;
    }

    public $idPharmacyToDelete;
    public function DeletePharmacy(){
        $response = PharmacyController::DeletePharmacy($this->idPharmacyToDelete);

        echo json_encode($response);
    }
}

if(isset($_POST["editPharmacy"]) && $_POST["editPharmacy"]){
    $editPharmacy = new PharmaciesModuleAjax();
    $editPharmacy->idPharmacyToEdit = $_POST["idPharmacyToEdit"];
    $editPharmacy->namePharmacyToEdit = $_POST["namePharmacyToEdit"];
    $editPharmacy->addressPharmacyToEdit = $_POST["addressPharmacyToEdit"];
    if($_POST["multimedia24"] != null){
        $editPharmacy->multimedia24 = $_POST["multimedia24"];
    }else{
        $editPharmacy->multimedia24 = 0;
    }

    if($_POST["multimedia12"] != null){
        $editPharmacy->multimedia12 = $_POST["multimedia12"];
    }else{
        $editPharmacy->multimedia12 = 0;
    }
    $editPharmacy->EditPharmacy();
}

if(isset($_FILES["pharmacyFiles"]) && $_POST["pharmacyFilesRoute"] != ""){
    $editPharmacyWithFiles = new PharmaciesModuleAjax();
    $editPharmacyWithFiles->pharmacyFiles = $_FILES["pharmacyFiles"];
    $editPharmacyWithFiles->pharmacyFilesRoute = $_POST["pharmacyFilesRoute"];
    $editPharmacyWithFiles->UploadPharmacyFiles();
}

if(isset($_FILES["pharmacyFiles12"]) && $_POST["pharmacyFilesRoute"] != ""){
    $editPharmacyWithFiles = new PharmaciesModuleAjax();
    $editPharmacyWithFiles->pharmacyFiles12 = $_FILES["pharmacyFiles12"];
    $editPharmacyWithFiles->pharmacyFilesRoute = $_POST["pharmacyFilesRoute"];
    $editPharmacyWithFiles->UploadPharmacyFiles12();
}

if(isset($_POST["deletePharmacy"]) && $_POST["deletePharmacy"]){
    $deletePharmacy = new PharmaciesModuleAjax();
    $deletePharmacy->idPharmacyToDelete = $_POST["idPharmacyToDelete"];
    $deletePharmacy->DeletePharmacy();
}

?>
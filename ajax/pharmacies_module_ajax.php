<?php

require_once "../controllers/pharmacy_controller.php";
require_once "../models/pharmacy_model.php";

class PharmaciesModuleAjax{
    public $idPharmacyToEdit;
    public $namePharmacyToEdit;
    public $addressPharmacyToEdit;
    public $fileRoutes;
    public function EditPharmacy(){
        $data = array("idPharmacyToEdit"=>$this->idPharmacyToEdit,
                      "namePharmacyToEdit"=>$this->namePharmacyToEdit,
                      "addressPharmacyToEdit"=>$this->addressPharmacyToEdit,
                      "fileRoutes"=>$this->fileRoutes);

        $response = PharmacyController::EditPharmacy($data);

        echo json_encode($response);
    }

    public $pharmacyFiles;
    public $pharmacyFilesRoute;
    public function UploadPharmacyFiles(){
        $response = PharmacyController::CreatePharmacyFiles($this->pharmacyFiles, $this->pharmacyFilesRoute);

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
    $editPharmacy->fileRoutes = $_POST["fileRoutes"];
    $editPharmacy->EditPharmacy();
}

if(isset($_FILES["pharmacyFiles"]) && $_POST["pharmacyFilesRoute"] != ""){
    $editPharmacyWithFiles = new PharmaciesModuleAjax();
    $editPharmacyWithFiles->pharmacyFiles = $_FILES["pharmacyFiles"];
    $editPharmacyWithFiles->pharmacyFilesRoute = $_POST["pharmacyFilesRoute"];
    $editPharmacyWithFiles->UploadPharmacyFiles();
}

if(isset($_POST["deletePharmacy"]) && $_POST["deletePharmacy"]){
    $deletePharmacy = new PharmaciesModuleAjax();
    $deletePharmacy->idPharmacyToDelete = $_POST["idPharmacyToDelete"];
    $deletePharmacy->DeletePharmacy();
}

?>
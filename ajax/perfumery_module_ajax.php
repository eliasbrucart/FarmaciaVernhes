<?php

require "../controllers/perfumery_controller.php";
require "../models/perfumery_model.php";

require "../controllers/pharmacy_controller.php";
require "../models/pharmacy_model.php";

class PerfumeryModuleAjax{
    public $uploadPerfumeryName;
    public $uploadPerfumeryMultimedia;
    public $uploadPerfumeryOrder;
    public function UploadPerfumery(){
        $data = array("name"=>$this->uploadPerfumeryName,
                      "multimedia"=>$this->uploadPerfumeryMultimedia,
                      "order"=>$this->uploadPerfumeryOrder);

        $response = PerfumeryController::UploadPerfumery($data);

        echo json_encode($response);
    }

    public $perfumeryFiles;
    public $perfumeryName;
    public function UploadPerfumeryFiles(){
        //Eliminar archivos anteriores
        $response = PerfumeryController::CreatePerfumeryFiles($this->perfumeryFiles, $this->perfumeryName);
        //$response = PharmacyController::CreatePharmacyFiles($this->perfumeryFiles, $this->perfumeryName);

        echo $response;
    }

    public $perfumeryNameEdited;
    public $originalPerfumeryName;
    public $perfumeryFilesEdited;
    public function EditPerfumeryFiles(){
        PerfumeryController::DeletePerfumeryFiles($this->originalPerfumeryName);
        $response = PerfumeryController::CreatePerfumeryFiles($this->perfumeryFilesEdited, $this->perfumeryNameEdited);

        echo $response;
    }

    public $idPerfumeryEdited;
    public $namePerfumeryEdited; //variable name excepction
    public $perfumeryFileRoutesEdited;
    public $perfumeryOrderEdited;
    public function EditPerfumery(){
        $data = array("idPerfumeryEdited"=>$this->idPerfumeryEdited,
                      "namePerfumeryEdited"=>$this->namePerfumeryEdited,
                      "fileRoutesPerfumeryEdited"=>$this->perfumeryFileRoutesEdited,
                      "orderPerfumeryEdited"=>$this->perfumeryOrderEdited);

        $response = PerfumeryController::EditPerfumery($data);

        echo json_encode($response);
    }

    public $perfumeryIdEdited;
    public $perfumerNameEdited;
    public function EditNamePerfumery(){
        $data = array("perfumeryIdEdited"=>$this->perfumeryIdEdited,
                      "perfumerNameEdited"=>$this->perfumerNameEdited);

        $response = PerfumeryController::EditNamePerfumery($data);

        echo json_encode($response);
    }

    public $newOrderPerfumery;
    public function EditOrderPerfumery(){
        $data = array("idPerfumery"=>$this->idPerfumeryEdited,
                      "orderPerfumery"=>$this->newOrderPerfumery);

        $response = PerfumeryController::EditOrderPerfumery($data);

        echo json_encode($response);
    }

    public $idPerfumeryDeleted;
    public function DeletePerfumery(){
        $response = PerfumeryController::DeletePerfumery($this->idPerfumeryDeleted);

        echo json_encode($response);
    }

    public function GetAllPerfumeriesInJSON(){
        $response = PerfumeryController::GetAllPerfumeries();

        echo json_encode($response);
    }
}

if(isset($_POST["uploadPerfumery"]) && $_POST["uploadPerfumery"] == true){
    $uploadPerfumery = new PerfumeryModuleAjax();
    $uploadPerfumery->uploadPerfumeryName = $_POST["uploadPerfumeryName"];
    $uploadPerfumery->uploadPerfumeryMultimedia = $_POST["uploadPerfumeryMultimedia"];
    $uploadPerfumery->uploadPerfumeryOrder = $_POST["uploadPerfumeryOrder"];
    $uploadPerfumery->UploadPerfumery();
}

if(isset($_FILES["perfumeryFiles"]) && $_POST["perfumeryName"]){
    $uploadPerfumeryFiles = new PerfumeryModuleAjax();
    $uploadPerfumeryFiles->perfumeryFiles = $_FILES["perfumeryFiles"];
    $uploadPerfumeryFiles->perfumeryName = $_POST["perfumeryName"];
    $uploadPerfumeryFiles->UploadPerfumeryFiles();
}

if(isset($_FILES["perfumeryFilesEdited"]) && $_POST["perfumeryNameEdited"]){
    $perfumeryFilesEdited = new PerfumeryModuleAjax();
    $perfumeryFilesEdited->perfumeryNameEdited = $_POST["perfumeryNameEdited"];
    $perfumeryFilesEdited->originalPerfumeryName = $_POST["originalPerfumeryName"];
    $perfumeryFilesEdited->perfumeryFilesEdited = $_FILES["perfumeryFilesEdited"];
    $perfumeryFilesEdited->EditPerfumeryFiles();
}

if(isset($_POST["perfumeryIdEdited"]) && isset($_POST["perfumeryNameEdited"]) && isset($_POST["perfumeryFileRoutesEdited"])){
    $perfumeryEdited = new PerfumeryModuleAjax();
    $perfumeryEdited->idPerfumeryEdited = $_POST["perfumeryIdEdited"];
    $perfumeryEdited->namePerfumeryEdited = $_POST["perfumeryNameEdited"];
    $perfumeryEdited->perfumeryFileRoutesEdited = $_POST["perfumeryFileRoutesEdited"];
    $perfumeryEdited->perfumeryOrderEdited = $_POST["perfumeryOrderEdited"];
    $perfumeryEdited->EditPerfumery();
}

if(isset($_POST["perfumeryIdEdited"]) && isset($_POST["perfumeryNameEdited"])){
    $editNamePerfumery = new PerfumeryModuleAjax();
    $editNamePerfumery->perfumeryIdEdited = $_POST["perfumeryIdEdited"];
    $editNamePerfumery->perfumerNameEdited = $_POST["perfumeryNameEdited"];
    $editNamePerfumery->EditNamePerfumery();
}

if(isset($_POST["changeOrderPerfumery"]) && $_POST["changeOrderPerfumery"]){
    $changeOrderPerfumery = new PerfumeryModuleAjax();
    $changeOrderPerfumery->idPerfumeryEdited = $_POST["idPerfumery"];
    $changeOrderPerfumery->newOrderPerfumery = $_POST["orderPerfumery"];
    $changeOrderPerfumery->EditOrderPerfumery();
}

if(isset($_POST["deletePerfumery"]) && $_POST["deletePerfumery"]){
    $deletePerfumery = new PerfumeryModuleAjax();
    $deletePerfumery->idPerfumeryDeleted = $_POST["perfumeryIdDeleted"];
    $deletePerfumery->DeletePerfumery();
}

if(isset($_POST["getAllPerfumeriesInJSON"])){
    $getAllPerfumeriesInJSON = new PerfumeryModuleAjax();
    $getAllPerfumeriesInJSON->GetAllPerfumeriesInJSON();
}

?>
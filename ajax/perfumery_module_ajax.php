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
        $response = PerfumeryController::CreatePerfumeryFiles($this->perfumeryFiles, $this->perfumeryName);
        //$response = PharmacyController::CreatePharmacyFiles($this->perfumeryFiles, $this->perfumeryName);

        echo $response;
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

?>
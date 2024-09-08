<?php

require "../controllers/perfumery_controller.php";
require "../models/perfumery_model.php";

require "../controllers/pharmacy_controller.php";
require "../models/pharmacy_model.php";

class PerfumeryModuleAjax{
    public $uploadPerfumeryName;
    public $uploadPerfumeryMultimedia;
    public $uploadPerfumeryOrder;
    public $uploadPerfumeryDate;

    public function UploadPerfumery(){
        $data = array("name"=>$this->uploadPerfumeryName,
                      "multimedia"=>$this->uploadPerfumeryMultimedia,
                      "order"=>$this->uploadPerfumeryOrder,
                      "date"=>$this->uploadPerfumeryDate);

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
    public $perfumeryIdToEdited;
    public $perfumeryFilesEdited;
    public function EditPerfumeryFiles(){
        $perfumeryArray = PerfumeryController::GetPerfumeryById($this->perfumeryIdToEdited);
        $originalPerfumeryFileRoute = $perfumeryArray["file_perfumery"];

        PerfumeryController::DeletePerfumeryFilesByRoute($originalPerfumeryFileRoute);
        $response = PerfumeryController::CreatePerfumeryFiles($this->perfumeryFilesEdited, $this->perfumeryNameEdited);

        echo $response;
    }

    public $idPerfumeryEdited;
    public $namePerfumeryEdited; //variable name excepction
    public $perfumeryFileRoutesEdited;
    public $perfumeryDateEdited;
    //public $perfumeryOrderEdited;
    public function EditPerfumery(){
        $data = array("idPerfumeryEdited"=>$this->idPerfumeryEdited,
                      "namePerfumeryEdited"=>$this->namePerfumeryEdited,
                      "fileRoutesPerfumeryEdited"=>$this->perfumeryFileRoutesEdited,
                      "perfumeryDateEdited"=>$this->perfumeryDateEdited);
                      //"orderPerfumeryEdited"=>$this->perfumeryOrderEdited);

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

    public function EditDatePerfumery(){
        $data = array("perfumeryIdEdited"=>$this->idPerfumeryEdited,
                      "perfumeryDateEdited"=>$this->perfumeryDateEdited);

        $response = PerfumeryController::EditDatePerfumery($data);

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
    //public $originalPerfumeryNameDeleted;
    public function DeletePerfumery(){
        $perfumeryArray = PerfumeryController::GetPerfumeryById($this->idPerfumeryDeleted);
        $originalPerfumeryFileRoute = $perfumeryArray["file_perfumery"];

        PerfumeryController::DeletePerfumeryFilesByRoute($originalPerfumeryFileRoute);

        $response = PerfumeryController::DeletePerfumery($this->idPerfumeryDeleted);

        echo json_encode($response);
    }

    public function GetAllPerfumeriesInJSON(){
        $response = PerfumeryController::GetAllPerfumeries();

        echo json_encode($response);
    }

    public function GetPerfumeryRegistered(){
        $response = PerfumeryController::GetAllPerfumeriesInTurner();

        if(is_array($response)){
            $data_arr = array();
            $i = 1;

            for($i = 0; $i < count($response); $i++){
                $data_arr[$i]['id'] = $response[$i]['id_turner_perfumery'];
                $data_arr[$i]['title'] = $response[$i]['namePerfumery_turner_perfumery'];
                $data_arr[$i]['start'] = date("Y-m-d", strtotime($response[$i]['datePerfumery_turner_perfumery']));
                $data_arr[$i]['end'] = date("Y-m-d", strtotime($response[$i]['datePerfumery_turner_perfumery']));
                $data_arr[$i]['color'] = '#2a3efc';
                $data_arr[$i]['type'] = 'perfumery';
            }

            $data = array('status' => true,
                          'msg' => 'successfully!',
                          'data' => $data_arr);
        }else{
            $data = array('status' => false,
                          'msg' => 'Error!');
        }

        echo json_encode($data);
    }

    public $eventDropID;
    public $eventDropDate;
    public function UpdatePerfumeryDate(){
        $data = array("eventDropID"=>$this->eventDropID,
                      "eventDropDate"=>$this->eventDropDate);

        $response = PerfumeryController::UpdatePerfumeryDate($data);

        echo json_encode($response);
    }

    public $recieveEventName;
    public $dropDate;
    public function CreatePerfumeryDate(){
        $data = array("recieveEventName"=>$this->recieveEventName,
                      "dropDate"=>$this->dropDate);

        $response = PerfumeryController::CreatePerfumeryDate($data);

        echo json_encode($response);

    }
}

if(isset($_POST["uploadPerfumery"]) && $_POST["uploadPerfumery"] == true){
    $uploadPerfumery = new PerfumeryModuleAjax();
    $uploadPerfumery->uploadPerfumeryName = $_POST["uploadPerfumeryName"];
    $uploadPerfumery->uploadPerfumeryMultimedia = $_POST["uploadPerfumeryMultimedia"];
    $uploadPerfumery->uploadPerfumeryOrder = $_POST["uploadPerfumeryOrder"];
    $uploadPerfumery->uploadPerfumeryDate = $_POST["uploadPerfumeryDate"];
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
    $perfumeryFilesEdited->perfumeryIdToEdited = $_POST["perfumeryIdToEdited"];
    $perfumeryFilesEdited->perfumeryFilesEdited = $_FILES["perfumeryFilesEdited"];
    $perfumeryFilesEdited->EditPerfumeryFiles();
}

if(isset($_POST["perfumeryIdEdited"]) && isset($_POST["perfumeryNameEdited"]) && isset($_POST["perfumeryFileRoutesEdited"])){
    $perfumeryEdited = new PerfumeryModuleAjax();
    $perfumeryEdited->idPerfumeryEdited = $_POST["perfumeryIdEdited"];
    $perfumeryEdited->namePerfumeryEdited = $_POST["perfumeryNameEdited"];
    $perfumeryEdited->perfumeryFileRoutesEdited = $_POST["perfumeryFileRoutesEdited"];
    $perfumeryEdited->perfumeryDateEdited = $_POST["perfumeryDateEdited"];
    $perfumeryEdited->EditPerfumery();
}

if(isset($_POST["editPerfumeryName"]) && $_POST["editPerfumeryName"] && isset($_POST["perfumeryNameEdited"])){
    $editNamePerfumery = new PerfumeryModuleAjax();
    $editNamePerfumery->perfumeryIdEdited = $_POST["perfumeryIdEdited"];
    $editNamePerfumery->perfumerNameEdited = $_POST["perfumeryNameEdited"];
    $editNamePerfumery->EditNamePerfumery();
}

if(isset($_POST["editPerfumeryDate"]) && $_POST["editPerfumeryDate"]){
    $editPerfumeryDate = new PerfumeryModuleAjax();
    $editPerfumeryDate->idPerfumeryEdited = $_POST["perfumeryIdEdited"];
    $editPerfumeryDate->perfumeryDateEdited = $_POST["perfumeryDateEdited"];
    $editPerfumeryDate->EditDatePerfumery();
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
    //$deletePerfumery->idPerfumeryDeleted = $_POST["originalPerfumeryNameDeleted"];
    $deletePerfumery->DeletePerfumery();
}

if(isset($_POST["getAllPerfumeriesInJSON"])){
    $getAllPerfumeriesInJSON = new PerfumeryModuleAjax();
    $getAllPerfumeriesInJSON->GetAllPerfumeriesInJSON();
}

if(isset($_POST["getPerfumeryRegistered"])){
    $getPerfumeriesRegistered = new PerfumeryModuleAjax();
    $getPerfumeriesRegistered->GetPerfumeryRegistered();
}

if(isset($_POST["UpdatePerfumeryDate"])){
    $updatePerfumery = new PerfumeryModuleAjax();
    $updatePerfumery->eventDropID = $_POST["eventDropID"];
    $updatePerfumery->eventDropDate = $_POST["eventDropDate"];
    $updatePerfumery->UpdatePerfumeryDate();
}

if(isset($_POST["UploadPerfumeryDate"])){
    $createPerfumeryDate = new PerfumeryModuleAjax();
    $createPerfumeryDate->recieveEventName = $_POST["recieveEventName"];
    $createPerfumeryDate->dropDate = $_POST["dropDate"];
    $createPerfumeryDate->CreatePerfumeryDate();
}

?>
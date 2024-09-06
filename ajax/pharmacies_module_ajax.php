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

    public $pharmacyIdEdited;
    public $pharmacyNameEdited;
    public $pharmacyAddressEdited;
    public function EditDataPharmacy(){
        $data = array("pharmacyIdEdited"=>$this->pharmacyIdEdited,
                      "pharmacyNameEdited"=>$this->pharmacyNameEdited,
                      "pharmacyAddressEdited"=>$this->pharmacyAddressEdited);

        $response = PharmacyController::EditDataPharmacy($data);

        echo json_encode($response);
    }

    public $pharmacyFiles;
    public $pharmacyFilesRoute;
    public $pharmacyFileUploadId;
    public $originalFileName;
    public function UploadPharmacyFiles(){
        $fullDayFile = "fullDayFile";
       /*try{
            $pharmacyArray = PharmacyController::GetPharmacyById($this->pharmacyFileUploadId);
            $pharmacyFiles = $pharmacyArray["fullday_pharmacy"];
            $pharmacyFilesArray = json_decode($pharmacyFiles);
    
            for($i = 0; $i < count($pharmacyFilesArray); $i++){
                PharmacyController::DeletePharmacyFilesByRoute($pharmacyFilesArray[$i]);
            }
        }catch(Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }*/
        PharmacyController::DeletePharmacyFiles($this->pharmacyFilesRoute, $fullDayFile);
        sleep(1.5);
        
        $response = PharmacyController::CreatePharmacyFiles($this->pharmacyFiles, $this->pharmacyFilesRoute, $fullDayFile, $this->originalFileName);

        echo $response;
    }

    public $pharmacyFiles12;
    //public $pharmacyFilesRoute;
    public function UploadPharmacyFiles12(){
        $halfDayFile = "halfDayFile";
        PharmacyController::DeletePharmacyFiles($this->pharmacyFilesRoute, $halfDayFile);
        $response = PharmacyController::CreatePharmacyFiles($this->pharmacyFiles12, $this->pharmacyFilesRoute, $halfDayFile);

        echo $response;
    }

    public $idPharmacyToDelete;
    public function DeletePharmacy(){
        //PharmacyController::DeletePharmacyFiles($this->namePharmacyDeleted);
        $pharmacyArray = PharmacyController::GetPharmacyById($this->idPharmacyToDelete);
        $pharmacy12Files = $pharmacyArray["halfday_pharmacy"];
        $pharmacy24Files = $pharmacyArray["fullday_pharmacy"];
        $pharmacyName = $pharmacyArray["name_pharmacy"];
        /*try{
            PharmacyController::DeletePharmacyFiles($pharmacyName);
        }catch(Exception $e){
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }*/
        PharmacyController::DeletePharmacyFilesByRoute($pharmacy12Files);
        PharmacyController::DeletePharmacyFilesByRoute($pharmacy24Files);

        $response = PharmacyController::DeletePharmacy($this->idPharmacyToDelete);

        echo json_encode($response);
    }

    public function GetPharmaciesInJSON(){
        $response = PharmacyController::GetPharmacies();

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
    }

    if($_POST["multimedia12"] != null){
        $editPharmacy->multimedia12 = $_POST["multimedia12"];
    }
    $editPharmacy->EditPharmacy();
}

if(isset($_FILES["pharmacyFiles"]) && $_POST["pharmacyFilesRoute"] != ""){
    $editPharmacyWithFiles = new PharmaciesModuleAjax();
    $editPharmacyWithFiles->pharmacyFiles = $_FILES["pharmacyFiles"];
    $editPharmacyWithFiles->pharmacyFilesRoute = $_POST["pharmacyFilesRoute"];
    $editPharmacyWithFiles->pharmacyFileUploadId = $_POST["pharmacyFileUploadId"];
    $editPharmacyWithFiles->originalFileName = $_FILES["pharmacyFiles"]["tmp_name"];
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

if(isset($_POST["pharmacyEdited"]) && $_POST["pharmacyEdited"]){
    $editDataPharmacy = new PharmaciesModuleAjax();
    $editDataPharmacy->pharmacyIdEdited = $_POST["pharmacyIdEdited"];
    $editDataPharmacy->pharmacyNameEdited = $_POST["pharmacyNameEdited"];
    $editDataPharmacy->pharmacyAddressEdited = $_POST["pharmacyAddressEdited"];
    $editDataPharmacy->EditDataPharmacy();
}

if(isset($_POST["getAllParmaciesInJSON"]) && $_POST["getAllParmaciesInJSON"]){
    $getPharmaciesInJSON = new PharmaciesModuleAjax();
    $getPharmaciesInJSON->GetPharmaciesInJSON();
}


?>
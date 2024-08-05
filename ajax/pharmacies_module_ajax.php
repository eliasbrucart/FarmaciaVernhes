<?php

require_once "../controllers/pharmacy_controller.php";
require_once "../models/pharmacy_model.php";

class PharmaciesModuleAjax{
    public function PharmaciesTable(){
        $pharmacies = PharmacyController::GetPharmacies();

        $dataJson = '
        {
            "data":[';

            for($i = 0; $i < count($pharmacies); $i++){
                $idPharmacy = $pharmacies[$i]["id_pharmacy"];

                $namePharmacy = $pharmacies[$i]["name_pharmacy"];

                $addressPharmacy = $pharmacies[$i]["address_pharmacy"];

                $editBtn = "<button type='button' class='btn btn-info btn-sm editPharmacyBtn' onclick='ShowPharmacyDataOnEdit(".$idPharmacy.", "."`$namePharmacy`".", "."`$addressPharmacy`".")' data-toggle='modal' data-target='#editPharmacyModal'>Editar</button>";

                $deleteBtn = "<button type='button' class='btn btn-danger btn-sm deletePharmacyBtn' onclick='ShowPharmacyDataOnDelete(".$idPharmacy.", "."`$namePharmacy`".", "."`$addressPharmacy`".")' data-toggle='modal' data-target='#deletePharmacyModal'>Eliminar</button>";

                $dataJson .= '[
                    "#",
                    "'.$namePharmacy.'",
                    "'.$addressPharmacy.'",
                    "#",
                    "'.$editBtn.$deleteBtn.'"
                ],';
            } 

        $dataJson = substr($dataJson, 0, -1);

        $dataJson .= ']
            
        }';

        echo $dataJson;
    }

    public $idPharmacyToEdit;
    public $namePharmacyToEdit;
    public $addressPharmacyToEdit;
    public $pharmacyFiles;
    public $pharmacyFilesRoute;
    public function EditPharmacy(){

        var_dump($this->pharmacyFiles);

        $responsePharmacyFiles = PharmacyController::CreatePharmacyFiles($this->pharmacyFiles, $this->pharmacyFilesRoute, $this->namePharmacyToEdit);

        var_dump($responsePharmacyFiles);

        return;

        $data = array("idPharmacyToEdit"=>$this->idPharmacyToEdit,
                      "namePharmacyToEdit"=>$this->namePharmacyToEdit,
                      "addressPharmacyToEdit"=>$this->addressPharmacyToEdit);

        $response = PharmacyController::EditPharmacy($data);

        echo json_encode($response);
    }

    public $idPharmacyToDelete;
    public function DeletePharmacy(){
        $response = PharmacyController::DeletePharmacy($this->idPharmacyToDelete);

        echo json_encode($response);
    }
}

$pharmaciesTable = new PharmaciesModuleAjax();
$pharmaciesTable->PharmaciesTable();

if(isset($_POST["editPharmacy"]) && $_POST["editPharmacy"]){
    $editPharmacy = new PharmaciesModuleAjax();
    $editPharmacy->idPharmacyToEdit = $_POST["idPharmacyToEdit"];
    $editPharmacy->namePharmacyToEdit = $_POST["namePharmacyToEdit"];
    $editPharmacy->addressPharmacyToEdit = $_POST["addressPharmacyToEdit"];
    $editPharmacy->pharmacyFiles = $_FILES["pharmacyFiles"];
    $editPharmacy->pharmacyFilesRoute = $_POST["pharmacyFilesRoute"];
    $editPharmacy->EditPharmacy();
}

if(isset($_POST["deletePharmacy"]) && $_POST["deletePharmacy"]){
    $deletePharmacy = new PharmaciesModuleAjax();
    $deletePharmacy->idPharmacyToDelete = $_POST["idPharmacyToDelete"];
    $deletePharmacy->DeletePharmacy();
}

?>
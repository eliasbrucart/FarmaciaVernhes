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

                $editBtn = "<button type='button' class='btn btn-info btn-sm editPharmacyBtn' onclick='ShowIdPharmacy(".$idPharmacy.", "."`$namePharmacy`".", "."`$addressPharmacy`".")' data-toggle='modal' data-target='#editPharmacyModal'>Editar</button>";

                $deleteBtn = "<button type='button' class='btn btn-danger btn-sm deletePharmacyBtn'>Eliminar</button>";

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
    public function EditPharmacy(){
        $data = array("idPharmacyToEdit"=>$this->idPharmacyToEdit,
                      "namePharmacyToEdit"=>$this->namePharmacyToEdit,
                      "addressPharmacyToEdit"=>$this->addressPharmacyToEdit);

        $response = PharmacyController::EditPharmacy($data);

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
    $editPharmacy->EditPharmacy();
}

?>
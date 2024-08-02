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
                $namePharmacy = $pharmacies[$i]["name_pharmacy"];

                $addressPharmacy = $pharmacies[$i]["address_pharmacy"];

                $editBtn = "<button type='button' class='btn btn-info btn-sm editPharmacyBtn' data-toggle='modal' data-target='#editPharmacyModal'>Editar</button>";

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
}

$pharmaciesTable = new PharmaciesModuleAjax();
$pharmaciesTable->PharmaciesTable();

?>
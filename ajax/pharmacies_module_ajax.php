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

                $dataJson .= '[
                    "#",
                    "'.$namePharmacy.'",
                    "XD",
                    "Activo",
                    "xd"
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
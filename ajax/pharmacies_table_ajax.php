<?php 

require_once "../controllers/pharmacy_controller.php";
require_once "../models/pharmacy_model.php";

class PharmaciesTableAjax{
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
                    "Activo",
                    "'.$editBtn.$deleteBtn.'"
                ],';
            } 

        $dataJson = substr($dataJson, 0, -1);

        $dataJson .= ']
            
        }';

        echo $dataJson;
    }
}

$pharmaciesTable = new PharmaciesTableAjax();
$pharmaciesTable->PharmaciesTable();

?>
<?php 

class TurnerController{
    static public function CreateTurner($namePharmacyTurner, $dateTurner, $pharmacy24hs){
        $table = "turner";

        //Consultar id de farmacia por nombre de la misma
        $pharmacyTable = "pharmacy";

        $idPharmacyByName = TurnerModel::GetPharmacyId($pharmacyTable, $namePharmacyTurner);

        var_dump($idPharmacyByName);

        $data = array("idPharmacyTurner"=>$idPharmacyByName,
                      "dateTurner"=>$dateTurner,
                      "pharmacy24hs"=>$pharmacy24hs);

        $response = TurnerModel::CreateTurner($table, $data);

        return $response;
    }

    static public function GetPharmaciesRegistered(){
        $table = "calendar_event_master";

        $response = TurnerModel::GetPharmaciesRegistered($table);

        return $response;
    }
}

?>
<?php 

class TurnerController{
    static public function CreateTurner($namePharmacyTurner, $dateTurner, $pharmacy24hs){
        $table = "turner";

        //Consultar id de farmacia por nombre de la misma
        $pharmacyTable = "pharmacy";

        $idPharmacyByName = TurnerModel::GetPharmacyId($pharmacyTable, $namePharmacyTurner);

        var_dump($idPharmacyByName);

        $data = array("idPharmacyTurner"=>$idPharmacyByName,
                      "namePharmacy"=>$namePharmacyTurner,
                      "dateTurner"=>$dateTurner,
                      "pharmacy24hs"=>$pharmacy24hs);

        $response = TurnerModel::CreateTurner($table, $data);

        return $response;
    }

    static public function GetPharmaciesRegistered(){
        $table = "turner";
        //$table = "calendar_event_master";

        $response = TurnerModel::GetPharmaciesRegistered($table);

        /*var_dump($response);

        $pharmacyTable = "pharmacy";
        $data = array();

        if(is_array($response)){

            for($i = 0; $i < count($response); $i++){
                $namePharmacy = TurnerModel::GetPharmacyName($pharmacyTable, $response[$i]["id_pharmacy"]);
                array_push($data, $namePharmacy);
            }

        }

        var_dump($data)*/

        return $response;
    }
}

?>
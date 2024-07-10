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

        $response = TurnerModel::GetPharmaciesRegistered($table);

        return $response;
    }

    static public function UpdateTurner($data){
        $table = "turner";

        $response = TurnerModel::UpdateTurner($table, $data);

        return $response;
    }

    static public function GetTodayPharmacies($actualDateToDBFormat){
        $table = "turner";

        $response = TurnerModel::GetTodayPharmacies($table, $actualDateToDBFormat);

        return $response;
    }
}

?>
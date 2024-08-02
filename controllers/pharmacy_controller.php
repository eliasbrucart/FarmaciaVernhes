<?php 

class PharmacyController{
    static function ShowPharmacy($pharmacy){
        $table = "pharmacy";

        $response = PharmacyModel::ShowPharmacy($table, $pharmacy);

        return $response;
    }

    static public function AddPharmacy($data){
        $table = "pharmacy";

        $pharmacy = $data["namePharmacyToAdd"];

        $showPharmacy = self::ShowPharmacy($pharmacy);

        if(is_array($showPharmacy) && $pharmacy == $showPharmacy["name_pharmacy"]){
            return "Ya existe la farmacia!";
        }else{
            $response = PharmacyModel::AddPharmacy($table, $data);

            return $response;
        }

    }

    static public function GetPharmacies(){
        $table = "pharmacy";

        $response = PharmacyModel::GetPharmacies($table);

        return $response;
    }

    static public function GetPharmacyAddress($idTodayPharmacy){
        $table = "pharmacy";

        $response = PharmacyModel::GetPharmacyAddress($table, $idTodayPharmacy);

        return $response;
    }

    static public function EditPharmacy($data){
        $table = "pharmacy";

        $response = PharmacyModel::EditPharmacy($table, $data);

        return $response;
    }

    static public function DeletePharmacy($idPharmacyToDelete){
        $table = "pharmacy";

        $response = PharmacyModel::DeletePharmacy($table, $idPharmacyToDelete);

        return $response;
    }
}

?>
<?php 

class PharmacyController{
    static public function AddPharmacy($data){
        $table = "pharmacy";

        $response = PharmacyModel::AddPharmacy($table, $data);

        return $response;
    }
}

?>
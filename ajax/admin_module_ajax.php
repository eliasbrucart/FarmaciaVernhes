<?php 

class AdminModuleAjax{
    public $namePharmacyToAdd;
    public function AddPharmacy(){
        $response = "";

        echo json_encode($response);
    }
}

if(isset($_POST["namePharmacyToAdd"])){
    $addPharmacy = new AdminModuleAjax();
    $addPharmacy->namePharmacyToAdd = $_POST["namePharmacyToAdd"];
    $addPharmacy->AddPharmacy();
}

?>
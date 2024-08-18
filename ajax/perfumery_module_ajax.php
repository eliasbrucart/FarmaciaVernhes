<?php 

class PerfumeryModuleAjax{
    public function UploadPharmacy(){

    } 
}

if(isset($_POST["uploadPerfumery"])){
    $uploadPerfumery = new PerfumeryModuleAjax();
    $uploadPerfumery->UploadPharmacy();
}

?>
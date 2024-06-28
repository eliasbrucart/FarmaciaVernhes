<?php

require "connection.php";

class PharmacyModel{
    static public function AddPharmacy($table, $data){
        $stmt = Connection::Connect()->prepare("INSERT INTO $table(name_pharmacy) VALUES(:name_pharmacy)");

        $stmt->bindParam(":name_".$table, $data["namePharmacyToAdd"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
}

?>
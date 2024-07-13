<?php

require_once "connection.php";

class PharmacyModel{
    static public function AddPharmacy($table, $data){
        $stmt = Connection::Connect()->prepare("INSERT INTO $table(name_pharmacy, address_pharmacy) VALUES(:name_pharmacy, :address_pharmacy)");

        $stmt->bindParam(":name_".$table, $data["namePharmacyToAdd"], PDO::PARAM_STR);
        $stmt->bindParam(":address_".$table, $data["addressPharmacyToAdd"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function ShowPharmacy($table, $pharmacy){
        $stmt = Connection::Connect()->prepare("SELECT * FROM $table WHERE name_$table= :name_$table");

        $stmt->bindParam(":name_".$table, $pharmacy, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }

    static public function GetPharmacies($table){
        $stmt = Connection::Connect()->prepare("SELECT * FROM $table");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }

    static public function GetPharmacyAddress($table, $idTodayPharmacy){
        $stmt = Connection::Connect()->prepare("SELECT * FROM $table WHERE id_pharmacy = :id_pharmacy");

        $stmt->bindParam("id_pharmacy", $idTodayPharmacy, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchColumn(2); //Columna address_pharmacy

        $stmt->close();

        $stmt = null;
    }
}

?>
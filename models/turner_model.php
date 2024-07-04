<?php

class TurnerModel{
    static public function CreateTurner($table, $data){
        $stmt = Connection::Connect()->prepare("INSERT INTO $table(id_pharmacy, date_turner, 24hs_turner) VALUES(:id_pharmacy, :date_turner, :24hs_turner)");

        //bind params
        $stmt->bindParam(":id_pharmacy", $data["idPharmacyTurner"], PDO::PARAM_INT);
        $stmt->bindParam(":date_".$table, $data["dateTurner"], PDO::PARAM_STR);
        $stmt->bindParam(":24hs_".$table, $data["pharmacy24hs"], PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function GetPharmacyId($pharmacyTable, $namePharmacyTurner){
        $stmt = Connection::Connect()->prepare("SELECT * FROM $pharmacyTable WHERE name_pharmacy = :name_pharmacy");

        $stmt->bindParam(":name_".$pharmacyTable, $namePharmacyTurner, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchColumn(0);

        $stmt->close();

        $stmt = null;
    }

    static public function GetPharmaciesRegistered($table){
        $stmt = Connection::Connect()->prepare("SELECT * FROM $table");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
}

?>
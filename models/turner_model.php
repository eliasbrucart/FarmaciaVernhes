<?php

require_once "connection.php";

class TurnerModel{
    static public function CreateTurner($table, $data){
        $stmt = Connection::Connect()->prepare("INSERT INTO $table(id_pharmacy, name_pharmacy, date_turner, fullDay) VALUES(:id_pharmacy, :name_pharmacy, :date_turner, :fullDay)");

        //bind params
        $stmt->bindParam(":id_pharmacy", $data["idPharmacyTurner"], PDO::PARAM_INT);
        $stmt->bindParam(":name_pharmacy", $data["namePharmacy"], PDO::PARAM_STR);
        $stmt->bindParam(":date_".$table, $data["dateTurner"], PDO::PARAM_STR);
        $stmt->bindParam(":fullDay", $data["pharmacy24hs"], PDO::PARAM_INT);

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

    static public function GetPharmacyName($table, $id){
        $stmt = Connection::Connect()->prepare("SELECT * FROM $table WHERE id_$table = :id_$table");

        $stmt->bindParam("id_".$table, $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchColumn(1); //columna name_pharmacy

        $stmt->close();

        $stmt = null;
    }

    static public function UpdateTurner($table, $data){
        $stmt = Connection::Connect()->prepare("UPDATE $table SET date_turner = :date_turner WHERE id_turner = :id_turner");

        $stmt->bindParam(":id_turner", $data["eventDropID"], PDO::PARAM_INT);
        $stmt->bindParam(":date_turner", $data["eventDropDate"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function GetTodayPharmacies($table, $actualDateToDBFormat){
        $stmt = Connection::Connect()->prepare("SELECT * FROM $table WHERE date_$table = :date_$table");

        $stmt->bindParam(":date_".$table, $actualDateToDBFormat, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }

    static public function SetTurnerFullDay($table, $idTurnerFullDay, $stateTurner){
        $stmt = Connection::Connect()->prepare("UPDATE $table SET fullDay = :fullDay WHERE id_turner = :id_turner");

        $stmt->bindParam(":id_turner", $idTurnerFullDay, PDO::PARAM_INT);
        $stmt->bindParam(":fullDay", $stateTurner, PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function GetFullDayState($table, $idTurnerGetFullDay){
        $stmt = Connection::Connect()->prepare("SELECT * FROM $table WHERE id_turner = :id_turner");

        $stmt->bindParam(":id_turner", $idTurnerGetFullDay, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchColumn(4);

        $stmt->close();

        $stmt = null;
    }

    static public function RemoveEventFromTurner($table, $idTurnerToRemove){
        $stmt = Connection::Connect()->prepare("DELETE FROM $table WHERE id_turner = :id_turner");

        $stmt->bindParam(":id_turner", $idTurnerToRemove, PDO::PARAM_INT);

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
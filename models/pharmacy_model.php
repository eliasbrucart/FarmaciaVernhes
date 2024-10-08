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

    static public function GetPharmacyById($table, $id){
        $stmt = Connection::Connect()->prepare("SELECT * FROM $table WHERE id_pharmacy = :id_pharmacy");

        $stmt->bindParam(":id_".$table, $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();

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

    static public function GetPharmacyFileRoutes($table, $idTodayPharmacy){
        $stmt = Connection::Connect()->prepare("SELECT * FROM $table WHERE id_pharmacy = :id_pharmacy");

        $stmt->bindParam("id_pharmacy", $idTodayPharmacy, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(); //Columna file_routes_pharmacy

        $stmt->close();

        $stmt = null;
    }

    static public function EditPharmacy($table, $data){
        $stmt = null;
        if($data["multimedia24"] != null){
            $stmt = Connection::Connect()->prepare("UPDATE $table SET name_pharmacy = :name_pharmacy, address_pharmacy = :address_pharmacy, fullday_pharmacy = :fullday_pharmacy WHERE id_pharmacy = :id_pharmacy");

            $stmt->bindParam(":id_pharmacy", $data["idPharmacyToEdit"], PDO::PARAM_INT);
            $stmt->bindParam(":name_pharmacy", $data["namePharmacyToEdit"], PDO::PARAM_STR);
            $stmt->bindParam(":address_pharmacy", $data["addressPharmacyToEdit"], PDO::PARAM_STR);
            $stmt->bindParam(":fullday_pharmacy", $data["multimedia24"], PDO::PARAM_STR);
            //$stmt->bindParam(":halfday_pharmacy", $data["multimedia12"], PDO::PARAM_STR);
        }else if($data["multimedia12"] != null){
            $stmt = Connection::Connect()->prepare("UPDATE $table SET name_pharmacy = :name_pharmacy, address_pharmacy = :address_pharmacy, halfday_pharmacy = :halfday_pharmacy WHERE id_pharmacy = :id_pharmacy");

            $stmt->bindParam(":id_pharmacy", $data["idPharmacyToEdit"], PDO::PARAM_INT);
            $stmt->bindParam(":name_pharmacy", $data["namePharmacyToEdit"], PDO::PARAM_STR);
            $stmt->bindParam(":address_pharmacy", $data["addressPharmacyToEdit"], PDO::PARAM_STR);
            //$stmt->bindParam(":fullday_pharmacy", $data["multimedia24"], PDO::PARAM_STR);
            $stmt->bindParam(":halfday_pharmacy", $data["multimedia12"], PDO::PARAM_STR);
        }
        

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function DeletePharmacy($table, $idPharmacyToDelete){
        $stmt = Connection::Connect()->prepare("DELETE FROM $table WHERE id_pharmacy = :id_pharmacy");

        $stmt->bindParam(":id_pharmacy", $idPharmacyToDelete, PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function EditDataPharmacy($table, $data){
        $stmt = Connection::Connect()->prepare("UPDATE $table SET name_pharmacy = :name_pharmacy, address_pharmacy = :address_pharmacy WHERE id_pharmacy = :id_pharmacy");

        $stmt->bindParam(":id_".$table, $data["pharmacyIdEdited"], PDO::PARAM_INT);
        $stmt->bindParam(":name_".$table, $data["pharmacyNameEdited"], PDO::PARAM_STR);
        $stmt->bindParam(":address_".$table, $data["pharmacyAddressEdited"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function ClearFilesPharmacyColumn($table, $id){
        $stmt = Connection::Connect()->prepare("UPDATE $table SET fullday_pharmacy = :fullday_pharmacy WHERE id_pharmacy = :id_pharmacy");

        $stmt->bindParam(":id_".$table, $id, PDO::PARAM_INT);
        $nullValue = "";
        $stmt->bindParam(":fullday_".$table, $nullValue, PDO::PARAM_STR);

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
<?php

require_once "connection.php";

class PerfumeryModel{
    static public function UploadPerfumery($table, $data){
        $stmt = Connection::Connect()->prepare("INSERT INTO $table(name_perfumery, file_perfumery, order_perfumery) VALUES(:name_perfumery, :file_perfumery, :order_perfumery)");

        $stmt->bindParam(":name_".$table, $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":file_".$table, $data["multimedia"], PDO::PARAM_STR);
        $stmt->bindParam(":order_".$table, $data["order"], PDO::PARAM_INT);
        //$stmt->bindParam(":date_".$table, $data["date"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function ShowPerfumery($table, $perfumery){
        $stmt = Connection::Connect()->prepare("SELECT * FROM $table WHERE name_$table= :name_$table");

        $stmt->bindParam(":name_".$table, $perfumery, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }

    static public function GetAllPerfumeries($table){
        $stmt = Connection::Connect()->prepare("SELECT * FROM $table ORDER BY order_perfumery ASC");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }

    static public function GetAllPerfumeriesInTurner($table){
        $stmt = Connection::Connect()->prepare("SELECT * FROM $table");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }

    static public function EditPerfumery($table, $data){
        $stmt = Connection::Connect()->prepare("UPDATE $table SET name_perfumery = :name_perfumery, file_perfumery = :file_perfumery WHERE id_perfumery = :id_perfumery");

        $stmt->bindParam(":id_".$table, $data["idPerfumeryEdited"], PDO::PARAM_INT);
        $stmt->bindParam(":name_".$table, $data["namePerfumeryEdited"], PDO::PARAM_STR);
        $stmt->bindParam(":file_".$table, $data["fileRoutesPerfumeryEdited"], PDO::PARAM_STR);
        //$stmt->bindParam(":date_".$table, $data["perfumeryDateEdited"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function EditNamePerfumery($table, $data){
        $stmt = Connection::Connect()->prepare("UPDATE $table SET name_perfumery = :name_perfumery WHERE id_perfumery = :id_perfumery");

        $stmt->bindParam(":id_".$table, $data["perfumeryIdEdited"], PDO::PARAM_INT);
        $stmt->bindParam(":name_".$table, $data["perfumerNameEdited"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function EditDatePerfumery($table, $data){
        $stmt = Connection::Connect()->prepare("UPDATE $table SET date_perfumery = :date_perfumery WHERE id_perfumery = :id_perfumery");

        $stmt->bindParam(":id_".$table, $data["perfumeryIdEdited"], PDO::PARAM_INT);
        $stmt->bindParam(":date_".$table, $data["perfumeryDateEdited"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function EditOrderPerfumery($table, $data){
        $stmt = Connection::Connect()->prepare("UPDATE $table SET order_perfumery = :order_perfumery WHERE id_perfumery = :id_perfumery");

        $stmt->bindParam(":id_".$table, $data["idPerfumery"], PDO::PARAM_INT);
        $stmt->bindParam(":order_".$table, $data["orderPerfumery"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function DeletePerfumery($table, $idPerfumeryDeleted){
        $stmt = Connection::Connect()->prepare("DELETE FROM $table WHERE id_perfumery = :id_perfumery");

        $stmt->bindParam(":id_".$table, $idPerfumeryDeleted, PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function GetPerfumeryById($table, $id){
        $stmt = Connection::Connect()->prepare("SELECT * FROM $table WHERE id_perfumery = :id_perfumery");

        $stmt->bindParam(":id_".$table, $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }

    static public function GetPerfumeryFilesRoutes($table, $id){
        $stmt = Connection::Connect()->prepare("SELECT * FROM $table WHERE id_perfumery = :id_perfumery");

        $stmt->bindParam(":id_".$table, $id, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(); //files column

        $stmt->close();

        $stmt = null;
    }

    static public function UpdatePerfumeryDate($table, $data){
        $stmt = Connection::Connect()->prepare("UPDATE $table SET datePerfumery_turner_perfumery = :datePerfumery_turner_perfumery WHERE id_turner_perfumery = :id_turner_perfumery");

        $stmt->bindParam(":id_turner_perfumery", $data["eventDropID"], PDO::PARAM_INT);
        $stmt->bindParam(":datePerfumery_turner_perfumery", $data["eventDropDate"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function CreatePerfumeryDate($table, $data){
        $stmt = Connection::Connect()->prepare("INSERT INTO $table(idPerfumery_turner_perfumery, namePerfumery_turner_perfumery, datePerfumery_turner_perfumery) VALUES(:id_perfumery, :name_perfumery, :date_perfumery)");

        $stmt->bindParam(":id_perfumery", $data["perfumeryId"], PDO::PARAM_INT);
        $stmt->bindParam(":name_perfumery", $data["perfumeryName"], PDO::PARAM_STR);
        $stmt->bindParam(":date_perfumery", $data["perfumeryDate"], PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function RemovePerfumeryFromTurner($table, $idPerfumeryToRemove){
        $stmt = Connection::Connect()->prepare("DELETE FROM $table WHERE id_turner_perfumery = :id_turner_perfumery");

        $stmt->bindParam(":id_turner_perfumery", $idPerfumeryToRemove, PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function GetPerfumeryTurner($table, $actualDateToDBFormat){
        $stmt = Connection::Connect()->prepare("SELECT * FROM $table WHERE datePerfumery_turner_perfumery = :datePerfumery_turner_perfumery");

        $stmt->bindParam(":datePerfumery_turner_perfumery", $actualDateToDBFormat, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }

    static public function GetPerfumeryByIdInTurner($table, $idPerfumeryTurner){
        $stmt = Connection::Connect()->prepare("SELECT * FROM $table WHERE id_turner_perfumery = :id_turner_perfumery");

        $stmt->bindParam(":id_turner_perfumery", $idPerfumeryTurner, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchColumn(1);

        $stmt->close();

        $stmt = null;
    }

    static public function SaveSelectedPerfumeryFile($table, $selectedFilesPerfumeryTurner, $selectedFilesValues){
        $stmt = Connection::Connect()->prepare("UPDATE $table SET fileSelected = :fileSelected WHERE id_turner_perfumery = :id_turner_perfumery");

        $stmt->bindParam(":id_turner_perfumery", $selectedFilesPerfumeryTurner, PDO::PARAM_INT);
        $stmt->bindParam(":fileSelected", $selectedFilesValues, PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function ClearFilesPerfumeryColumn($table, $id){
        $stmt = Connection::Connect()->prepare("UPDATE $table SET file_perfumery = :file_perfumery WHERE id_perfumery = :id_perfumery");

        $stmt->bindParam(":id_".$table, $id, PDO::PARAM_INT);
        $nullValue = "";
        $stmt->bindParam(":file_".$table, $nullValue, PDO::PARAM_STR);

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
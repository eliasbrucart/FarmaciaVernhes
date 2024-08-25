<?php

require_once "connection.php";

class PerfumeryModel{
    static public function UploadPerfumery($table, $data){
        $stmt = Connection::Connect()->prepare("INSERT INTO $table(name_perfumery, file_perfumery, order_perfumery) VALUES(:name_perfumery, :file_perfumery, :order_perfumery)");

        $stmt->bindParam(":name_".$table, $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":file_".$table, $data["multimedia"], PDO::PARAM_STR);
        $stmt->bindParam(":order_".$table, $data["order"], PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

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

    static public function EditPerfumery($table, $data){
        $stmt = Connection::Connect()->prepare("UPDATE $table SET name_perfumery = :name_perfumery, file_perfumery = :file_perfumery, order_perfumery = :order_perfumery WHERE id_perfumery = :id_perfumery");

        $stmt->bindParam(":id_".$table, $data["idPerfumeryEdited"], PDO::PARAM_INT);
        $stmt->bindParam(":name_".$table, $data["namePerfumeryEdited"], PDO::PARAM_STR);
        $stmt->bindParam(":file_".$table, $data["fileRoutesPerfumeryEdited"], PDO::PARAM_STR);
        $stmt->bindParam(":order_".$table, $data["orderPerfumeryEdited"], PDO::PARAM_INT);

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
}

?>
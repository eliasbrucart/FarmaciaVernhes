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
}

?>
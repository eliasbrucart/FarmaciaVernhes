<?php

require_once "connection.php";

class UsersModel{
    static public function RegisterUser($table, $data){
        $stmt = Connection::Connect()->prepare("INSERT INTO $table(name_users, email_users, email_encrypted_users, password_users, actived_users) VALUES(:name_users, :email_users, :email_encrypted_users, :password_users, :actived_users)");

        $stmt->bindParam(":name_users", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":email_users", $data["email"], PDO::PARAM_STR);
        $stmt->bindParam(":email_encrypted_users", $data["encryptedEmail"], PDO::PARAM_STR);
        $stmt->bindParam(":password_users", $data["password"], PDO::PARAM_STR);
        $stmt->bindParam(":actived_users", $data["actived"], PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }

    static public function ShowUser($table, $item, $value){
        $stmt = Connection::Connect()->prepare("SELECT * FROM $table WHERE $item=:$item");

        $stmt->bindParam(":".$item, $value, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }

    static public function GetAllUsers($table){
        $stmt = Connection::Connect()->prepare("SELECT * FROM $table");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }

    static public function DeleteUser($table, $idUserDeleted){
        $stmt = Connection::Connect()->prepare("DELETE FROM $table WHERE id_users = :id_users");

        $stmt->bindParam(":id_".$table, $idUserDeleted, PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function EditUser($table, $data){
        $stmt = Connection::Connect()->prepare("UPDATE $table SET name_users = :name_users, email_users = :email_users, email_encrypted_users = :email_encrypted_users, password_users = :password_users, actived_users = :actived_users, isSuperuser = :isSuperuser WHERE id_users = :id_users");

        $stmt->bindParam(":id_".$table, $data["idUserToEdit"], PDO::PARAM_INT);
        $stmt->bindParam(":name_".$table, $data["newNameUser"], PDO::PARAM_STR);
        $stmt->bindParam(":email_".$table, $data["newEmailUser"], PDO::PARAM_STR);
        $stmt->bindParam(":email_encrypted_".$table, $data["newEmailEncryptedUser"], PDO::PARAM_STR);
        $stmt->bindParam(":password_".$table, $data["newPasswordUser"], PDO::PARAM_STR);
        $stmt->bindParam(":actived_".$table, $data["activateUser"], PDO::PARAM_INT);
        $stmt->bindParam(":isSuperuser", $data["isSuperuser"], PDO::PARAM_INT);

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
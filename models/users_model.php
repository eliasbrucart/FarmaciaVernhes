<?php 

class UsersModel{
    static public function RegisterUser($table, $data){
        $stmt = Connection::Connect()->prepare("INSERT INTO $table(name_users, email_users, email_encrypted_users, password_users) VALUES(:name_users, :email_users, :email_encrypted_users, :password_users)");

        $stmt->bindParam(":name_users", $data["name"], PDO::PARAM_STR);
        $stmt->bindParam(":email_users", $data["email"], PDO::PARAM_STR);
        $stmt->bindParam(":email_encrypted_users", $data["encryptedEmail"], PDO::PARAM_STR);
        $stmt->bindParam(":password_users", $data["password"], PDO::PARAM_STR);

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
}

?>
<?php

require_once "../controllers/users_controller.php";
require_once "../models/users_model.php";

class UsersModuleAjax{
    public $idUserDeleted;
    public function DeleteUser(){
        $response = UsersController::DeleteUser($this->idUserDeleted);

        echo json_encode($response);
    }

    public $idUserToEdit;
    public $newNameUser;
    public $newEmailUser;
    public $newPasswordUser;
    public $activateUser;
    public $isSuperuser;
    public function EditUser(){
        $encrypt = crypt($this->newPasswordUser, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

        $encryptEmail = md5($this->newEmailUser);

        $data = array("idUserToEdit"=>$this->idUserToEdit,
                      "newNameUser"=>$this->newNameUser,
                      "newEmailUser"=>$this->newEmailUser,
                      "newPasswordUser"=>$encrypt,
                      "newEmailEncryptedUser"=>$encryptEmail,
                      "activateUser"=>$this->activateUser,
                      "isSuperuser"=>$this->isSuperuser);

        $response = UsersController::EditUser($data);

        echo json_encode($response);
    }
}

if(isset($_POST["deleteUser"]) && $_POST["deleteUser"]){
    $deleteUser = new UsersModuleAjax();
    $deleteUser->idUserDeleted = $_POST["idUserDeleted"];
    $deleteUser->DeleteUser();
}

if(isset($_POST["editUser"]) && $_POST["editUser"]){
    $editUser = new UsersModuleAjax();
    $editUser->idUserToEdit = $_POST["idUserToEdit"];
    $editUser->newNameUser = $_POST["newNameUser"];
    $editUser->newEmailUser = $_POST["newEmailUser"];
    $editUser->newPasswordUser = $_POST["newPasswordUser"];
    $editUser->activateUser = $_POST["activateUser"];
    $editUser->isSuperuser = $_POST["isSuperuser"];
    $editUser->EditUser();
}


?>
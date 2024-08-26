<?php

require_once "../controllers/users_controller.php";
require_once "../models/users_model.php";

class UsersTableAjax{
    public function UsersTable(){
        $users = UsersController::GetAllUsers();

        $dataJson = '
        {
            "data":[';

            for($i = 0; $i < count($users); $i++){
                $idUser = $users[$i]["id_users"];

                $nameUser = $users[$i]["name_users"];

                $emailUser = $users[$i]["email_users"];

                $activatedUser = $users[$i]["actived_users"];

                $isActived = "No Activo";
                if($activatedUser == 1){
                    $isActived = "Activo";
                }

                $editBtn = "<button type='button' class='btn btn-info btn-sm editUserBtn' onclick='ShowUserDataOnEdit(".$idUser.", "."`$nameUser`".", "."`$emailUser`".")' data-toggle='modal' data-target='#editUserModal'>Editar</button>";

                $deleteBtn = "<button type='button' class='btn btn-danger btn-sm' onclick='DeleteUser(".$idUser.")'>Eliminar</button>";

                $dataJson .= '[
                    "'.$idUser.'",
                    "'.$nameUser.'",
                    "'.$emailUser.'",
                    "'.$isActived.'",
                    "'.$editBtn.$deleteBtn.'"
                ],';
            } 

        $dataJson = substr($dataJson, 0, -1);

        $dataJson .= ']
            
        }';

        echo $dataJson;
    }
}

$usersTable = new UsersTableAjax();
$usersTable->UsersTable();

?>
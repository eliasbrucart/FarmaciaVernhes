<?php

class UsersController{
    public function RegisterUser(){
        if(isset($_POST["regNameUserInput"])){
            if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regNameUserInput"]) &&
            preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmailUserInput"]) &&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPasswordUserInput"])){
                $encrypt = crypt($_POST["regPasswordUserInput"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $encryptEmail = md5($_POST["regEmailUserInput"]);

                $data = array("name"=>$_POST["regNameUserInput"],
                            "password"=>$encrypt,
                            "email"=>$_POST["regEmailUserInput"],
                            "encryptedEmail"=>$encryptEmail,
                            "actived"=>$_POST["isUserActivated"]
                        );

                $response = "";

                $table = "users";
                $item = "email_users";
                $value = $_POST["regEmailUserInput"];

                $showUser = UsersModel::ShowUser($table, $item, $value);

                if(is_array($showUser) && $showUser["email_users"] == $_POST["regEmailUserInput"] && $showUser["name_users"] == $_POST["regNameUserInput"]){
                    echo '<script>alert("Ya existe el usuario!");</script>';
                }else{
                    $response = UsersModel::RegisterUser($table, $data);
                }

                $url = Route::GetFrontendRoute();

                if($response == "ok"){

                    echo '<script>
                            window.location.assign("'.$url.'users/");
						</script>';

                }else{

                    echo '<script> 

							swal({
								  title: "¡ERROR!",
								  text: "¡Ha ocurrido un problema registrandote! Porfavor revise que esten bien los datos.",
								  type:"error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';

                }

            }
        }
        //return $response;
    }

    public function LoginUser(){
        if(isset($_POST["logEmailUserInput"])){
            if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["logEmailUserInput"]) &&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["logPasswordUserInput"])){
                $encrypt = crypt($_POST["logPasswordUserInput"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $table = "users";
                $item = "email_users";
                $value = $_POST["logEmailUserInput"];

                $response = UsersModel::ShowUser($table, $item, $value);

                if(is_array($response) && $response["email_users"] == $_POST["logEmailUserInput"] && $response["password_users"] == $encrypt && $response["actived_users"] == 1){
                    //Condicion de chequeo si esta verificado
                    $_SESSION["validateSession"] = "ok";
					$_SESSION["id"] = $response["id_users"];
					$_SESSION["name"] = $response["name_users"];
					//$_SESSION["foto"] = $response["foto"]; Agregar despues
					$_SESSION["email"] = $response["email_users"];
					$_SESSION["password"] = $response["password_users"];
					$_SESSION["isSuperuser"] = $response["isSuperuser"];
					//$_SESSION["modo"] = $response["modo"];

                    $url = Route::GetFrontendRoute();

                    echo '<script> //Objeto actualRoute pertenece a HardGames Store

                            window.location.assign("'.$url.'admin/");

					</script>';
                }else{
                    echo '<script>alert("Error al ingresar!");</script>';
                }
            }
        }
    }

    static public function GetAllUsers(){
        $table = "users";

        $response = UsersModel::GetAllUsers($table);

        return $response;
    }

    static public function DeleteUser($idUserDeleted){
        $table = "users";

        $response = UsersModel::DeleteUser($table, $idUserDeleted);

        return $response;
    }

    static public function EditUser($data){
        $table = "users";

        $response = UsersModel::EditUser($table, $data);

        return $response;
    }
}

?>
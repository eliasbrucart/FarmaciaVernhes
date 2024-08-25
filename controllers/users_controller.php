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
                            "encryptedEmail"=>$encryptEmail
                        );

                $table = "users";

                $response = UsersModel::RegisterUser($table, $data);

                if($response == "ok"){

                    echo '<script> 

							swal({
								  title: "¡OK!",
								  text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo electrónico '.$_POST["regEmailUserInput"].' para verificar la cuenta!",
								  type:"success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

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
}

?>
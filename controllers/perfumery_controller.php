<?php 

class PerfumeryController{
    static public function UploadPerfumery($data){
        $table = "perfumery";

        $response = PerfumeryModel::UploadPerfumery($table, $data);

        return $response;
    }

    static public function CreatePerfumeryFiles($perfumeryFiles, $perfumeryRoutes){
        if(isset($perfumeryFiles["tmp_name"]) && !empty($perfumeryFiles["tmp_name"])){
            //list($width, $height) = getimagesize($perfumeryFiles["tmp_name"]);

            //$newWidth = 500;
            //$newHeight = 1000;

            $directory = "../views/img/perfumery/".$perfumeryRoutes;

            if(!file_exists($directory)){
                mkdir($directory, 0755);
            }

            if($perfumeryFiles["type"] == "video/mp4"){
                $date = date("Y-m-d");

                $num = mt_rand(1, 20);

                $routeFile = $directory."/".$perfumeryRoutes."_".$date."_".$num."_video".".mp4";

                if(file_exists($routeFile)){
                    $newNum = mt_rand(1, 30);

                    $routeFile = $directory."/".$perfumeryRoutes."_".$date."_".$newNum."_video".".mp4";

                    move_uploaded_file($perfumeryFiles["tmp_name"], $routeFile);
                }

                move_uploaded_file($perfumeryFiles["tmp_name"], $routeFile);
            }

            return $routeFile;
        }
    }

    static public function DeletePerfumeryFiles($perfumeryRoutes){
        $directory = "../views/img/perfumery/".$perfumeryRoutes;
        $files = glob($directory.'/*');
        foreach($files as $file){
            if(is_file($file)){
                unlink($file);
            }
        }
        if(is_dir($directory)){
            rmdir($directory);
            //echo "directorio ".$directory." eliminado!";
        }
    }

    static public function GetAllPerfumeries(){
        $table = "perfumery";

        $response = PerfumeryModel::GetAllPerfumeries($table);

        return $response;
    }

    static public function EditPerfumery($data){
        $table = "perfumery";

        $response = PerfumeryModel::EditPerfumery($table, $data);

        return $response;
    }

    static public function EditNamePerfumery($data){
        $table = "perfumery";

        $response = PerfumeryModel::EditNamePerfumery($table, $data);

        return $response;
    }

    static public function EditOrderPerfumery($data){
        $table = "perfumery";

        $response = PerfumeryModel::EditOrderPerfumery($table, $data);

        return $response;
    }

    static public function DeletePerfumery($idPerfumeryDeleted){
        $table = "perfumery";

        $response = PerfumeryModel::DeletePerfumery($table, $idPerfumeryDeleted);

        return $response;
    }
}

?>
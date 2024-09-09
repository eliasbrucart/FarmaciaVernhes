<?php 

class PerfumeryController{
    static function ShowPerfumery($perfumery){
        $table = "perfumery";

        $response = PerfumeryModel::ShowPerfumery($table, $perfumery);

        return $response;
    }
    static public function UploadPerfumery($data){
        $table = "perfumery";

        $perfumery = $data["name"];

        $showPerfumery = self::ShowPerfumery($perfumery);

        if(is_array($showPerfumery) && $perfumery == $showPerfumery["name_perfumery"]){
            return "Ya existe la perfumeria!";
        }else{
            $response = PerfumeryModel::UploadPerfumery($table, $data);

            return $response;
        }

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

                $routeFile = $directory."/".$perfumeryRoutes."_".$date."_".time()."_video.mp4";

                if(file_exists($routeFile)){
                    $newNum = mt_rand(1, 1000);

                    $secondNum = mt_rand(1, 1000);

                    if($newNum == $secondNum){
                        $secondNum = mt_rand(1000, 3000);
                    }

                    //$routeFile = $directory."/".$perfumeryRoutes."_".$date."_".$newNum."_video".".mp4";

                    $routeFile = $directory."/".$perfumeryRoutes."_".$date."_".time()."_".$newNum."_".$secondNum."_video.mp4";
                    
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

    static public function DeletePerfumeryFilesByRoute($route){
        $parseRoute = "../".$route;
        if(is_file($parseRoute)){
            unlink($parseRoute);
        }
    }

    static public function GetAllPerfumeries(){
        $table = "perfumery";

        $response = PerfumeryModel::GetAllPerfumeries($table);

        return $response;
    }

    static public function GetAllPerfumeriesInTurner(){
        $table = "turner_perfumery";

        $response = PerfumeryModel::GetAllPerfumeriesInTurner($table);

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

    static public function EditDatePerfumery($data){
        $table = "perfumery";

        $response = PerfumeryModel::EditDatePerfumery($table, $data);

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

    static public function GetPerfumeryById($id){
        $table = "perfumery";

        $response = PerfumeryModel::GetPerfumeryById($table, $id);

        return $response;
    }

    static public function UpdatePerfumeryDate($data){
        $table = "turner_perfumery";

        $response = PerfumeryModel::UpdatePerfumeryDate($table, $data);

        return $response;
    }

    static public function CreatePerfumeryDate($data){
        $table = "turner_perfumery";

        $perfumeryTable = "perfumery";

        $perfumeryArray = PerfumeryModel::ShowPerfumery($perfumeryTable, $data["recieveEventName"]);

        $idPerfumery = $perfumeryArray["id_perfumery"];

        $newData = array("perfumeryId"=>$idPerfumery,
                          "perfumeryName"=>$data["recieveEventName"],
                          "perfumeryDate"=>$data["dropDate"]);

        $response = PerfumeryModel::CreatePerfumeryDate($table, $newData);

        return $response;
    }

    static public function RemovePerfumeryFromTurner($idPerfumeryToRemove){
        $table = "turner_perfumery";

        $response = PerfumeryModel::RemovePerfumeryFromTurner($table, $idPerfumeryToRemove);

        return $response;
    }
}

?>
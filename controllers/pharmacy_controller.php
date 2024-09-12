<?php 

class PharmacyController{
    static function ShowPharmacy($pharmacy){
        $table = "pharmacy";

        $response = PharmacyModel::ShowPharmacy($table, $pharmacy);

        return $response;
    }

    static public function AddPharmacy($data){
        $table = "pharmacy";

        $pharmacy = $data["namePharmacyToAdd"];

        $showPharmacy = self::ShowPharmacy($pharmacy);

        if(is_array($showPharmacy) && $pharmacy == $showPharmacy["name_pharmacy"]){
            return "Ya existe la farmacia!";
        }else{
            $response = PharmacyModel::AddPharmacy($table, $data);

            return $response;
        }

    }

    static public function GetPharmacies(){
        $table = "pharmacy";

        $response = PharmacyModel::GetPharmacies($table);

        return $response;
    }

    static public function GetPharmacyById($id){
        $table = "pharmacy";

        $response = PharmacyModel::GetPharmacyById($table, $id);

        return $response;
    }

    static public function GetPharmacyAddress($idTodayPharmacy){
        $table = "pharmacy";

        $response = PharmacyModel::GetPharmacyAddress($table, $idTodayPharmacy);

        return $response;
    }

    static public function GetPharmacyFileRoutes($idTodayPharmacy){
        $table = "pharmacy";

        $response = PharmacyModel::GetPharmacyFileRoutes($table, $idTodayPharmacy);

        return $response;
    }

    static public function EditPharmacy($data){
        $table = "pharmacy";

        $response = PharmacyModel::EditPharmacy($table, $data);

        return $response;
    }

    static public function DeletePharmacy($idPharmacyToDelete){
        $table = "pharmacy";

        $response = PharmacyModel::DeletePharmacy($table, $idPharmacyToDelete);

        return $response;
    }

    static public function CreatePharmacyFiles($pharmacyFiles, $pharmacyFilesRoute, $fileType, $originalFileName){
        if(isset($pharmacyFiles["tmp_name"]) && !empty($pharmacyFiles["tmp_name"])){

            list($width, $height) = getimagesize($pharmacyFiles["tmp_name"]);

            $newWidth = 500;
            $newHeight = 1000;

            $directory = "../views/img/".$pharmacyFilesRoute;
            $fileTypeDirectory = "../views/img/".$pharmacyFilesRoute."/".$fileType;

            if(!file_exists($directory)){
                mkdir($directory, 0755);
            }

            if(!file_exists($fileTypeDirectory)){
                mkdir($fileTypeDirectory, 0755);
                if($pharmacyFiles["type"] == "video/mp4"){
                    $date = date("Y-m-d");
    
                    $num = mt_rand(1, 20);
    
                    //$routeFile = $directory."/".$pharmacyFiles["tmp_name"]."_".$date.".mp4";
    
                    //$routeFile = $directory."/".$pharmacyFilesRoute."_".$date."_".$num."_video".".mp4";
                    $routeFile = $fileTypeDirectory."/".$pharmacyFilesRoute."_".$date."_".time()."_video.mp4";
    
                    if(file_exists($routeFile)){
    
                        $newNum = mt_rand(1, 1000);
    
                        $secondNum = mt_rand(1, 1000);
    
                        if($newNum == $secondNum){
                            $secondNum = mt_rand(1000, 3000);
                        }
    
                        $routeFile = $fileTypeDirectory."/".$pharmacyFilesRoute."_".$date."_".time()."_".$newNum."_".$secondNum."_video.mp4";
                        //$routeFile = $fileTypeDirectory."/".$pharmacyFilesRoute."_".$originalFileName;
    
                        move_uploaded_file($pharmacyFiles["tmp_name"], $routeFile);
                    }
    
                    move_uploaded_file($pharmacyFiles["tmp_name"], $routeFile);
                }
                return $routeFile;
            }else{
                if($pharmacyFiles["type"] == "video/mp4"){
                    $date = date("Y-m-d");
    
                    $num = mt_rand(1, 20);
    
                    //$routeFile = $directory."/".$pharmacyFiles["tmp_name"]."_".$date.".mp4";
    
                    //$routeFile = $directory."/".$pharmacyFilesRoute."_".$date."_".$num."_video".".mp4";
                    $routeFile = $fileTypeDirectory."/".$pharmacyFilesRoute."_".$date."_".time()."_video.mp4";
    
                    if(file_exists($routeFile)){
    
                        $newNum = mt_rand(1, 1000);
    
                        $secondNum = mt_rand(1, 1000);
    
                        if($newNum == $secondNum){
                            $secondNum = mt_rand(1000, 3000);
                        }
    
                        $routeFile = $fileTypeDirectory."/".$pharmacyFilesRoute."_".$date."_".time()."_".$newNum."_".$secondNum."_video.mp4";
                        //$routeFile = $fileTypeDirectory."/".$pharmacyFilesRoute."_".$originalFileName;
    
                        move_uploaded_file($pharmacyFiles["tmp_name"], $routeFile);
                    }
    
                    move_uploaded_file($pharmacyFiles["tmp_name"], $routeFile);
                }
                return $routeFile;
            }

        }
    }

    static public function DeletePharmacyFiles($pharmacyFilesRoute, $fileType){
        $directory = "../views/img/".$pharmacyFilesRoute."/".$fileType;
        if(file_exists($directory)){
            $files = glob($directory.'/*');
            foreach($files as $file){
                if(is_file($file)){
                    unlink($file);
                }
            }
        }
    }

    static public function DeletePharmacyFilesByRoute($route){
        $parseRoute = "../".$route;
        if(is_file($parseRoute)){
            unlink($parseRoute);
        }
    }

    static public function EditDataPharmacy($data){
        $table = "pharmacy";

        $response = PharmacyModel::EditDataPharmacy($table, $data);

        return $response;
    }
}

?>
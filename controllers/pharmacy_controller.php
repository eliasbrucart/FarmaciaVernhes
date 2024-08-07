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

    static public function CreatePharmacyFiles($pharmacyFiles, $pharmacyFilesRoute){
        if(isset($pharmacyFiles["tmp_name"]) && !empty($pharmacyFiles["tmp_name"])){

            list($width, $height) = getimagesize($pharmacyFiles["tmp_name"]);

            $newWidth = 500;
            $newHeight = 1000;

            $directory = "../views/img/".$pharmacyFilesRoute;

            if(!file_exists($directory)){
                mkdir($directory, 0755);
            }

            if($pharmacyFiles["type"] == "image/jpeg"){
                $routeFile = $directory."/".$pharmacyFiles["name"];

                $origin = imagecreatefromjpeg($pharmacyFiles["tmp_name"]);

                $destination = imagecreatetruecolor($newWidth, $newHeight);

                imagecopyresized($destination, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

				imagejpeg($destination, $routeFile);
            }

            if($pharmacyFiles["type"] == "image/png"){
                $routeFile = $directory."/".$pharmacyFiles["name"];

                $origin = imagecreatefrompng($pharmacyFiles["tmp_name"]);

                $destination = imagecreatetruecolor($newWidth, $newHeight);

                imagealphablending($destination, false);

                imagesavealpha($destination, true);

                imagecopyresized($destination, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

				imagepng($destination, $routeFile);
            }

            if($pharmacyFiles["type"] == "video/mp4"){
                $date = date("Y-m-d");
                $routeFile = $directory."/".$pharmacyFilesRoute."_".$date."_".time()."_video".".mp4";

                move_uploaded_file($pharmacyFiles["tmp_name"], $routeFile);
            }

            return $routeFile;
        }
    }
}

?>
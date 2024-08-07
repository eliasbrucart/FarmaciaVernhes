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
                $routeImage = $directory."/".$pharmacyFiles["name"];

                $origin = imagecreatefromjpeg($pharmacyFiles["tmp_name"]);

                $destination = imagecreatetruecolor($newWidth, $newHeight);

                imagecopyresized($destination, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

				imagejpeg($destination, $routeImage);
            }

            if($pharmacyFiles["type"] == "image/png"){
                $routeImage = $directory."/".$pharmacyFiles["name"];

                $origin = imagecreatefrompng($pharmacyFiles["tmp_name"]);

                $destination = imagecreatetruecolor($newWidth, $newHeight);

                imagealphablending($destination, false);

                imagesavealpha($destination, true);

                imagecopyresized($destination, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

				imagepng($destination, $routeImage);
            }

            return $routeImage;
        }
    }
}

?>
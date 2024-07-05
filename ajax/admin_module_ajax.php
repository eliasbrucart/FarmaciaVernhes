<?php

require "../controllers/pharmacy_controller.php";
require "../models/pharmacy_model.php";

require "../controllers/turner_controller.php";
require "../models/turner_model.php";

class AdminModuleAjax{
    public $namePharmacyToAdd;
    public $addressPharmacyToAdd;
    public function AddPharmacy(){
        $data = array("namePharmacyToAdd"=>$this->namePharmacyToAdd,
                      "addressPharmacyToAdd"=>$this->addressPharmacyToAdd);

        $response = PharmacyController::AddPharmacy($data);

        echo json_encode($response);
    }

    public function GetPharmacies(){
        $response = PharmacyController::GetPharmacies();

        echo json_encode($response);
    }

    public $namePharmacyTurner;
    public $dateTurner;
    public $pharmacy24hs;
    public function CreateTurner(){
        /*$data = array("namePharmacy"=>$this->namePharmacyTurner,
                      "dateTurner"=>$this->dateTurner,
                      "pharmacy24hs"=>$this->pharmacy24hs);*/
        
        $response = TurnerController::CreateTurner($this->namePharmacyTurner, $this->dateTurner, $this->pharmacy24hs);

        echo json_encode($response);
    }

    public function GetPharmaciesRegistered(){
        $response = TurnerController::GetPharmaciesRegistered();

        if(is_array($response)){
            $data_arr = array();
            $i = 1;

            for($i = 0; $i < count($response); $i++){
                $data_arr[$i]['event_id'] = $response[$i]['id_turner'];
                $data_arr[$i]['title'] = $response[$i]['name_pharmacy'];
                $data_arr[$i]['start'] = date("Y-m-d", strtotime($response[$i]['date_turner']));
                $data_arr[$i]['end'] = date("Y-m-d", strtotime($response[$i]['date_turner']));
                $data_arr[$i]['color'] = '#'.substr(uniqid(),-6); // 'green'; pass colour name
                $data_arr[$i]['url'] = 'https://www.shinerweb.com';
            }

            $data = array('status' => true,
                          'msg' => 'successfully!',
                          'data' => $data_arr);
        }else{
            $data = array('status' => false,
                          'msg' => 'Error!');
        }

        echo json_encode($data);
    }
}

if(isset($_POST["namePharmacyToAdd"])){
    $addPharmacy = new AdminModuleAjax();
    $addPharmacy->namePharmacyToAdd = $_POST["namePharmacyToAdd"];
    $addPharmacy->addressPharmacyToAdd = $_POST["addressPharmacyToAdd"];
    $addPharmacy->AddPharmacy();
}

if(isset($_POST["getPharmacies"])){
    $getPharmacies = new AdminModuleAjax();
    $getPharmacies->GetPharmacies();
}

if(isset($_POST["createTurner"])){
    $createTurner = new AdminModuleAjax();
    $createTurner->namePharmacyTurner = $_POST["recieveEventName"];
    $createTurner->dateTurner = $_POST["dropDate"];
    $createTurner->pharmacy24hs = $_POST["pharmacy24hs"];
    $createTurner->CreateTurner();
}

if(isset($_POST["getPharmaciesRegistered"])){
    $getPharmaciesRegistered = new AdminModuleAjax();
    $getPharmaciesRegistered->GetPharmaciesRegistered();
}

?>
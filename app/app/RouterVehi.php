<?php
require_once(dirname(__DIR__).'/models/Vehicle.php');
require_once(dirname(__DIR__).'/models/Driver.php');
require_once(dirname(__DIR__).'/models/admin/AdminVehiModel.php');
require_once(dirname(__DIR__).'/controllers/admin/AdminVehiController.php');

class RouterVehi{
    private $aVehiCtr;

    public function __construct()
    {
        $this->aVehiCtr = new AdminVehiController();
    }

    public function getPathVehi(){
       if(isset($_GET['action'])){
           switch($_GET['action']){
               case 'list_vehi':
                $this->aVehiCtr -> listVehicle();
                break;
           }
       } 
    }
}
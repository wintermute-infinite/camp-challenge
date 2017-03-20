<?php

require_once("/var/www/html/projects/campspot/inc/classes/ModelParse.php");

class ReservationsOld extends ModelParse
{
    private $reservations;

//    public function __construct()
//    {
//        parent::__construct();
//        $this->setReservations();
//    }

    public function getReservations() {
        $this->setReservations();
        return $this->reservations;
    }

//    private function setReservations() {
//        $reservations = $this->getDecodedDataByPrimaryGroup("reservations");
//        $this->reservations = $reservations;
//    }

//    public function clearReservations() {
//        $this->reservations = [];
//        return $this->reservations;
//    }



}

?>
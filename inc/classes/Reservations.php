<?php

class Reservations
{
    private $reservations;

    public function __construct($reservationsData)
    {
        $this->setReservations($reservationsData);
    }

    public function getReservations() {
        return $this->reservations;
    }

    private function setReservations($reservationsData) {
        $this->reservations = $reservationsData;
    }

}

?>
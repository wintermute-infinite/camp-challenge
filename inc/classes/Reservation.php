<?php

require_once("/var/www/html/projects/campspot/inc/classes/Reservations.php");

class Reservation extends Reservations
{
    private $reservation;
    private $id;
    private $reservationStartDate;
    private $reservationEndDate;

    public function __construct($reservation)
    {
        parent::__construct();
        $this->setReservation($reservation);
        $this->setReservationId();
//        $this->setReservationStartDate();
//        $this->setReservationEndDate();
    }

    public function getReservation() {
        return $this->reservation;
    }

    public function getReservationStartDate() {
        return $this->reservationStartDate;
    }

    public function getReservationEndDate() {
        return $this->reservationStartDate;
    }

    private function setReservation($reservation) {
        $this->reservation = $reservation;
    }

    private function setReservationStartDate() {
        $reservation = $this->reservation;
//        print_r($reservation);
        $this->reservationStartDate = date_create_from_format("Y-m-d", $reservation->startDate);
        print_r($this->reservationStartDate);
    }

    private function setReservationEndDate() {
        $reservation = $this->reservation;
        $this->reservationEndDate = date_create_from_format("Y-m-d", $reservation->endDate);
    }
    private function setReservationId() {
        $reservation = $this->reservation;
        $this->id = $reservation->campsiteId;
    }
}
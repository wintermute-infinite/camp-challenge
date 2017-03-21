<?php

class Reservations
{
    private $reservations;

    public function __construct($reservationsData)
    {
        $this->setReservations($reservationsData);
    }
// Main getter method
    public function getReservations()
    {
        return $this->reservations;
    }
// returns the reservation start date in a PHP DateTime Obj format
    public function getReservationsStartDate($reservation)
    {
        $resStartDateString = $reservation->startDate;
        $resStartDate = date_create_from_format("Y-m-d", $resStartDateString);
        return $resStartDate;
    }
// returns the reservation end date in a PHP DateTime Obj format
    public function getReservationsEndDate($reservation)
    {
        $resEndDateString = $reservation->endDate;
        $resEndDate = date_create_from_format("Y-m-d", $resEndDateString);
        return $resEndDate;
    }
// Main setter method
    private function setReservations($reservationsData)
    {
        $this->reservations = $reservationsData;
    }
}


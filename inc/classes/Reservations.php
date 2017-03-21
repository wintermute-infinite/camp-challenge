<?php

class Reservations
{
    private $reservations;

    public function __construct($reservationsData)
    {
        $this->setReservations($reservationsData);
    }

    public function getReservations()
    {
        return $this->reservations;
    }

    public function getReservationsStartDate($reservation)
    {
        $resStartDateString = $reservation->startDate;
        $resStartDate = date_create_from_format("Y-m-d", $resStartDateString);
        return $resStartDate;
    }

    public function getReservationsEndDate($reservation)
    {
        $resEndDateString = $reservation->endDate;
        $resEndDate = date_create_from_format("Y-m-d", $resEndDateString);
        return $resEndDate;
    }

    private function setReservations($reservationsData)
    {
        $this->reservations = $reservationsData;
    }
}


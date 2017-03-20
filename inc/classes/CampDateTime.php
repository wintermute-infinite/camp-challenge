<?php

class CampDateTime {
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate) {
        $this->startTime = $startDate;
        $this->endTime = $endDate;
    }

    public function convertToDateTimeObj($dateString) {
        $this->startDate = date_create_from_format("Y-m-d", $this->startDate);
        $this->endDate = date_create_from_format("Y-m-d", $this->endDate);
    }
}

?>
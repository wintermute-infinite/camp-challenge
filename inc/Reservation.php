<?php

class Reservation {
    protected $campsiteId;
    protected $resStartDate;
    protected $resEndDate;

    public function __construct($campsiteId, $resStartDate, $resEndDate) {
        $this->campsiteId = $campsiteId;
        $this->resStartDate = $resStartDate;
        $this->resEndTime = $resEndDate;
    }

    private function setResStartDate($resStartDate) {
        $this->resStartDate = $resStartDate;
    }

    private function getResStartDate() {
        return $this->resStartDate;
    }

    private function setSearchEndDate($searchEndDate) {
        $this->searchEndDate = $searchEndDate;
    }

    private function getSearchEndDate() {
        return $this->searchEndDate;
    }
}

?>
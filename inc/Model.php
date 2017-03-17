<?php

define("DATA_ROOTPATH", "/var/www/html/projects/campspot/inc/model/");

class Model {
    private $data;

    private $search;
    private $campsites;
    private $gapRules;
    private $reservations;

    private $searchStartDate;
    private $searchEndDate;

    public function __construct($dataPath)
    {
        $this->setData($dataPath);

        $data = $this->getData();

        $this->setSearchData($data);
        $this->setCampsitesData($data);
        $this->setGapRulesData($data);
        $this->setReservationsData($data);
    }

    public function getSearchData() {
        return $this->search;
    }

    public function getCampsitesData() {
        return $this->campsites;
    }

    public function getGapRulesData() {
        return $this->gapRules;
    }

    public function getReservationsData() {
        return $this->reservations;
    }

    private function setData($data) {
        $rawData = file_get_contents(DATA_ROOTPATH . $data);
        $this->data = json_decode($rawData);
    }

    private function getData() {
        return $this->data;
    }

    private function setSearchData($data) {
        $this->search = $data->search;
    }

    private function setCampsitesData($data) {
        $this->campsites = $data->campsites;
    }

    private function setGapRulesData($data) {
        $this->gapRules = $data->gapRules;
    }

    private function setReservationsData($data) {
        $this->reservations = $data->reservations;
    }
}

?>
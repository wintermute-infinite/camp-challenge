<?php
/**
 * Created by PhpStorm.
 * User: n0cturn3
 * Date: 3/18/17
 * Time: 10:08 AM
 */

class Model {
    private $data;

    private $search;
    private $campsites;
    private $gapRules;
    private $reservations;

    private $searchStartDate;
    private $searchEndDate;

    private $dataSrcPath;

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

    protected function getDataType($dataType) {
        $dataSrcPath = "/var/www/html/projects/campspot/inc/model/" . $dataType . "/";
        return $dataSrcPath;
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
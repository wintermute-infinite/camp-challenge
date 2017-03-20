<?php

require_once ("/var/www/html/projects/campspot/inc/classes/ModelParse.php");
//require_once ("/var/www/html/projects/campspot/inc/classes/GenerateAvailability.php");

class Search
{
    private $searchData;
    private $searchStartDate;
    private $searchEndDate;

    public function __construct($searchData)
    {
        $this->setSearchData($searchData);
        $this->setSearchStartDate($searchData);
        $this->setSearchEndDate($searchData);
    }

    public function checkAvailability(Search $search, $reservations, $campsites, $campsiteIds, $gapRules) {

        $searchStartDate =  $search->getSearchStartDate();
        $searchEndDate =  $search->getSearchEndDate();

        $availCampsiteIds = $this->generateAvailableCampsiteIdsSearch($reservations, $campsiteIds, $searchStartDate, $searchEndDate, $gapRules);
        $resultsArray = $this->returnAvailableCampsiteNames($campsites, $availCampsiteIds);
        return $resultsArray;
    }

    private function generateAvailableCampsiteIdsSearch($reservations, $campsiteIds, $searchStartDate, $searchEndDate, $gapRules) {

        $ga = new GenerateAvailability();

        $availCampsiteIds = $ga->generateAvailableCampsiteIds($reservations, $campsiteIds, $searchStartDate, $searchEndDate, $gapRules);
        return $availCampsiteIds;

    }

    private function returnAvailableCampsiteNames($campsites, $availCampsiteIds) {
        $resultsArray = [];
        foreach ($campsites as $campsite) {
            if (in_array($campsite->id, $availCampsiteIds)) {
                $resultsArray[] = $campsite->name;
            }
        }
        return $resultsArray;
    }

    public function getSearchData()
    {
        return $this->searchData;
    }

    public function getSearchStartDate() {
        return $this->searchStartDate;
    }

    public function getSearchEndDate() {
        return $this->searchEndDate;
    }

    private function setSearchData($searchData) {
        $this->searchData = $searchData;
    }

    private function setSearchStartDate($searchData) {
        $searchStartDateString = $searchData->startDate;
        $searchStartDate = (date_create_from_format("Y-m-d", $searchStartDateString));
        $this->searchStartDate = $searchStartDate;
    }

    private function setSearchEndDate($searchData) {
        $searchEndDateString = $searchData->endDate;
        $searchEndDate = (date_create_from_format("Y-m-d", $searchEndDateString));
        $this->searchEndDate = $searchEndDate;
    }


}
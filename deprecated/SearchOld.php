<?php

//class SearchOld {
//
//    private $searchStartDate;
//    private $searchEndDate;
//
//    public function __construct($searchStartDate, $searchEndDate)
//    {
//        $this->setSearchStartDate(date_create_from_format("Y-m-d", $searchStartDate));
//        $this->setSearchEndDate(date_create_from_format("Y-m-d", $searchEndDate));
//    }
//
//    public function checkAvailability($searchDates, $reservations, $campsites) {
//
//        $searchStartDate =  $searchDates->getSearchStartDate();
//        $searchEndDate =  $searchDates->getSearchEndDate();
//
//        $availCampsiteIds = $this->generateAvailableCampsiteIds($reservations, $searchStartDate, $searchEndDate);
//        $resultsArray = $this->returnAvailableCampsiteNames($campsites, $availCampsiteIds);
//        return $resultsArray;
//    }
//
//    private function generateAvailableCampsiteIds($reservations, $searchStartDate, $searchEndDate) {
//
//        $ga = new GenerateAvailability();
//        $availCampsiteIds = $ga->generateAvailableCampsiteIds($reservations, $searchStartDate, $searchEndDate);
//        return $availCampsiteIds;
//
//    }
//
//    private function returnAvailableCampsiteNames($campsites, $availCampsiteIds) {
//        $resultsArray = [];
//        foreach ($campsites as $campsite) {
//            if (in_array($campsite->id, $availCampsiteIds)) {
//                $resultsArray[] = $campsite->name;
//            }
//        }
//        return $resultsArray;
//    }
//
//    private function setSearchStartDate($searchStartDate) {
//        $this->searchStartDate = $searchStartDate;
//    }
//
//    private function getSearchStartDate() {
//        return $this->searchStartDate;
//    }
//
//    private function setSearchEndDate($searchEndDate) {
//        $this->searchEndDate = $searchEndDate;
//    }
//
//    private function getSearchEndDate() {
//        return $this->searchEndDate;
//    }
//}

?>
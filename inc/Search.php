<?php

Class Search {
    private $searchStartDate;
    private $searchEndDate;

    public function __construct($searchStartDate, $searchEndDate)
    {
        $this->setSearchStartDate(date_create_from_format("Y-m-d", $searchStartDate));
        $this->setSearchEndDate(date_create_from_format("Y-m-d", $searchEndDate));
    }

    public function checkAvailability($searchDates, $reservations, $campsites) {

        $searchStartDate =  $searchDates->getSearchStartDate();
        $searchEndDate =  $searchDates->getSearchEndDate();

        $availCampsiteIds = $this->generateAvailableCampsiteIds($reservations, $searchStartDate, $searchEndDate);
        $resultsArray = $this->returnAvailableCampsiteNames($campsites, $availCampsiteIds);
        return $resultsArray;
    }

    private function generateAvailableCampsiteIds($reservations, $searchStartDate, $searchEndDate) {

        //	initialize array for storing pushed campsiteIds for use in matching to campsite objects
        $availCampsiteIds = [];
        $notAvailCampsiteIds = [];

        foreach ($reservations as $reservation) {

//	    convert string dates into PHP DateTime objects in order to use the DateDiff function which requires DateTime objects as arguments
            $resStartDate = date_create_from_format("Y-m-d", $reservation->startDate);
            $resEndDate = date_create_from_format("Y-m-d", $reservation->endDate);

//		perform dateDiff function to determine the number of days between each date and store in vars. ->d is the flag to calculate the diff in days
            $searchStartDateDiff = (date_diff($searchStartDate, $resEndDate, TRUE))->d;
            $searchEndDateDiff = (date_diff($searchEndDate, $resStartDate, TRUE))->d;

//      eliminates all cases where the requested reservation overlaps with any existing reservations
            if (($searchStartDate <= $resEndDate) && ($searchEndDate >= $resStartDate)) {
                continue;
//      eliminates all cases where the date diff violates the gapRules
            } elseif (($searchStartDateDiff >= 3 && $searchStartDateDiff <= 4) || ($searchEndDateDiff >= 3 && $searchEndDateDiff <= 4)) {
                $notAvailCampsiteIds[] = $reservation->campsiteId;
                continue;
//      matches all non-violating/matching dates
            } elseif( (!in_array($reservation->campsiteId, $availCampsiteIds))) {
//		        pushes the matching reservation record property of campsiteId to previously initialized array
                $availCampsiteIds[] = $reservation->campsiteId;
            }
        }
        $availCampsiteIds = array_diff($availCampsiteIds, $notAvailCampsiteIds);
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

    private function setSearchStartDate($searchStartDate) {
        $this->searchStartDate = $searchStartDate;
    }

    private function getSearchStartDate() {
        return $this->searchStartDate;
    }

    private function setSearchEndDate($searchEndDate) {
        $this->searchEndDate = $searchEndDate;
    }

    private function getSearchEndDate() {
        return $this->searchEndDate;
    }
}

?>
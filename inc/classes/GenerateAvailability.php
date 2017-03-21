<?php

require_once ("/var/www/html/projects/campspot/inc/classes/GapRules.php");
require_once ("/var/www/html/projects/campspot/inc/classes/Reservations.php");

class GenerateAvailability {

    public function generateAvailableCampsiteIds($reservationsObj, $campsiteIds, $searchStartDate, $searchEndDate, $gapRulesObj) {

        if (empty($reservationsObj)) {return $campsiteIds;}

        $availCampsiteIds = $campsiteIds;
        $notAvailCampsiteIds = [];

        $gapRuleArray = $gapRulesObj->convertGapRulesToArray();

        $reservations = $reservationsObj->getReservations();

        foreach ($reservations as $reservation) {

//            convert string dates into PHP DateTime objects in order to use the DateDiff function which requires DateTime objects as arguments

            $resStartDate = $reservationsObj->getReservationsStartDate($reservation);
            $resEndDate = $reservationsObj->getReservationsEndDate($reservation);

//		    perform dateDiff function to determine the number of days between each date and store in vars. ->d is the flag to calculate the diff in days
            $searchStartDateDiff = (date_diff($searchStartDate, $resEndDate, TRUE))->d;
            $searchEndDateDiff = (date_diff($searchEndDate, $resStartDate, TRUE))->d;

            $gapRuleViolation = false;

            if (!empty($gapRuleArray)) {
                $gapRuleViolation = $this->calculateGapRuleViolations($searchStartDateDiff, $searchEndDateDiff, $gapRuleArray);
            }
            if ((($searchStartDate == $resStartDate) || ($searchEndDate == $resEndDate)) || ($searchStartDate <= $resEndDate) && ($searchEndDate >= $resStartDate) || $gapRuleViolation) {
                $notAvailCampsiteIds[] = $reservation->campsiteId;
                continue;
            }
            elseif( (!in_array($reservation->campsiteId, $availCampsiteIds))) {
                $availCampsiteIds[] = $reservation->campsiteId;
                continue;
            }
        }
        $generatedAvailableCampsiteIds = array_values(array_diff($availCampsiteIds, $notAvailCampsiteIds));

        return $generatedAvailableCampsiteIds;
    }

    private function calculateGapRuleViolations($searchStartDateDiff, $searchEndDateDiff, $gapRuleArray) {

        if (($searchStartDateDiff == $gapRuleArray[0]["gapSize"]) || ($searchEndDateDiff == $gapRuleArray[0]["gapSize"])) {
            return true;
        }
        elseif (count($gapRuleArray) > 1) {
            if (($searchStartDateDiff >= $gapRuleArray[0]["gapSize"] && $searchStartDateDiff <= $gapRuleArray[1]["gapSize"]) || ($searchEndDateDiff >= $gapRuleArray[0]["gapSize"] && $searchEndDateDiff <= $gapRuleArray[1]["gapSize"])) {
                return true;
            }
        }
        return false;
    }

}
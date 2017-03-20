<?php

class GenerateAvailability {

    public function generateAvailableCampsiteIds($reservations, $campsiteIds, $searchStartDate, $searchEndDate, $gapRules) {

        if (empty($reservations)) {
            return $campsiteIds;
        }

        //	initialize array for storing pushed campsiteIds for use in matching to campsite objects

        $availCampsiteIds = $campsiteIds;
        $notAvailCampsiteIds = [];

        $gapRuleArray = $this->processGapRulesData($gapRules);

        foreach ($reservations as $reservation) {

//	    convert string dates into PHP DateTime objects in order to use the DateDiff function which requires DateTime objects as arguments

            $resStartDateString = $reservation->startDate;
            $resEndDateString = $reservation->endDate;

            $resStartDate = date_create_from_format("Y-m-d", $resStartDateString);
            $resEndDate = date_create_from_format("Y-m-d", $resEndDateString);

//		perform dateDiff function to determine the number of days between each date and store in vars. ->d is the flag to calculate the diff in days
            $searchStartDateDiff = (date_diff($searchStartDate, $resEndDate, TRUE))->d;
            $searchEndDateDiff = (date_diff($searchEndDate, $resStartDate, TRUE))->d;

            if (($searchStartDate == $resStartDate) || ($searchEndDate == $resEndDate)) {
                $notAvailCampsiteIds[] = $reservation->campsiteId;
                continue;
            }
//      eliminates all cases where the requested reservation overlaps with any existing reservations
            elseif (($searchStartDate <= $resEndDate) && ($searchEndDate >= $resStartDate)) {
                $notAvailCampsiteIds[] = $reservation->campsiteId;
                continue;
//      eliminates all cases where the date diff violates the gapRules
            }
            elseif (($searchStartDateDiff >= $gapRuleArray[0] && $searchStartDateDiff <= $gapRuleArray[1]) || ($searchEndDateDiff >= $gapRuleArray[0] && $searchEndDateDiff <= $gapRuleArray[1])) {

                $notAvailCampsiteIds[] = $reservation->campsiteId;
                continue;
//      matches all non-violating/matching dates
            }
            elseif( (!in_array($reservation->campsiteId, $availCampsiteIds))) {
//		        pushes the matching reservation record property of campsiteId to previously initialized array
                $availCampsiteIds[] = $reservation->campsiteId;
            }
        }
        $generatedAvailableCampsiteIds = array_values(array_diff($availCampsiteIds, $notAvailCampsiteIds));


        return $generatedAvailableCampsiteIds;
    }

    public function processGapRulesData($gapRules) {
        $gapRuleArray = [];

        foreach ($gapRules as $gapRule) {
            $gapRuleArray[] = (($gapRule->gapSize) + 1);
        }
        sort($gapRuleArray);
        return $gapRuleArray;
    }

}
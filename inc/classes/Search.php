<?php

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
// Primary function that is called from the frontend, index.php
    public function checkAvailability(Search $search, $reservationsObj, $campsites, $campsiteIds, $gapRulesObj)
    {
// It does a little data parsing to split up the search object into the two dates
        $searchStartDate =  $search->getSearchStartDate();
        $searchEndDate =  $search->getSearchEndDate();
// Initiates the function that generates the matching availability depending on the passed in parameters, storing the results in an array of matches by id
        $availCampsiteIds = $this->generateAvailableCampsiteIdsSearch($reservationsObj, $campsiteIds, $searchStartDate, $searchEndDate, $gapRulesObj);
// Uses ids as returned above and campsites array to correlate the matching ids with their respective campsite names
        $resultsArray = $this->returnAvailableCampsiteNames($campsites, $availCampsiteIds);
// Returns results array with each matching record with the single key of name
        return $resultsArray;
    }
// Next step in the primary search engine
    private function generateAvailableCampsiteIdsSearch($reservationsObj, $campsiteIds, $searchStartDate, $searchEndDate, $gapRulesObj)
    {
// Instantiate new object for this search engine processing
        $ga = new GenerateAvailability();
// Kicks off the core of the search Engine and stores the results as an array of integers
        $availCampsiteIds = $ga->generateAvailableCampsiteIds($reservationsObj, $campsiteIds, $searchStartDate, $searchEndDate, $gapRulesObj);
        return $availCampsiteIds;
    }
// Uses returned array of matching ids and uses the campsites data (and their common id key) to generate an array of campsite names as results
    private function returnAvailableCampsiteNames($campsites, $availCampsiteIds)
    {
        $resultsArray = [];
        foreach ($campsites as $campsite) {
            if (in_array($campsite->id, $availCampsiteIds)) {
                $resultsArray[] = $campsite->name;
            }
        }
        return $resultsArray;
    }
// Basic setters and getters to optimize encapsulation
    private function setSearchData($searchData)
    {
        $this->searchData = $searchData;
    }

    private function getSearchStartDate()
    {
        return $this->searchStartDate;
    }

    private function getSearchEndDate()
    {
        return $this->searchEndDate;
    }
// Setting the search dates not only prepares for more advanced processing, but it also converts them from strings to PHP DateTime objects, necessary for calculating date differences
    private function setSearchStartDate($searchData)
    {
        $searchStartDateString = $searchData->startDate;
        $searchStartDate = (date_create_from_format("Y-m-d", $searchStartDateString));
        $this->searchStartDate = $searchStartDate;
    }

    private function setSearchEndDate($searchData)
    {
        $searchEndDateString = $searchData->endDate;
        $searchEndDate = (date_create_from_format("Y-m-d", $searchEndDateString));
        $this->searchEndDate = $searchEndDate;
    }
}
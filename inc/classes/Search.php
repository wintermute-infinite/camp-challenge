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

    public function checkAvailability(Search $search, $reservationsObj, $campsites, $campsiteIds, $gapRulesObj)
    {

        $searchStartDate =  $search->getSearchStartDate();
        $searchEndDate =  $search->getSearchEndDate();

        $availCampsiteIds = $this->generateAvailableCampsiteIdsSearch($reservationsObj, $campsiteIds, $searchStartDate, $searchEndDate, $gapRulesObj);
        $resultsArray = $this->returnAvailableCampsiteNames($campsites, $availCampsiteIds);
        return $resultsArray;
    }

    private function generateAvailableCampsiteIdsSearch($reservationsObj, $campsiteIds, $searchStartDate, $searchEndDate, $gapRulesObj)
    {
        $ga = new GenerateAvailability();

        $availCampsiteIds = $ga->generateAvailableCampsiteIds($reservationsObj, $campsiteIds, $searchStartDate, $searchEndDate, $gapRulesObj);
        return $availCampsiteIds;
    }

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
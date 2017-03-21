<?php

class Campsites
{
	private $campsites;
	private $campsiteIds;

    public function __construct($campsitesData)
    {
        $this->setCampsitesData($campsitesData);
        $this->setCampsiteIds();
    }
// Main getter method
    public function getCampsitesData() {
        return $this->campsites;
    }
// permits an easy interface to retrieve just the campsiteIds since this is what we need for comparisons and name can be associated later
    public function getCampsiteIds() {
        return $this->campsiteIds;
    }
// Main setter method
    private function setCampsitesData($campsitesData) {
        $this->campsites = $campsitesData;
    }
// helper method for getCampsiteIds, iterating through the main class data array and generating an array of just the ids
    private function setCampsiteIds() {
        $campsites = $this->getCampsitesData();
        $campsiteIds = [];

        foreach ($campsites as $campsite){
            $campsiteIds[] = $campsite->id;
        }
        $this->campsiteIds = $campsiteIds;
    }
}
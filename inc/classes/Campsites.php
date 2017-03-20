<?php

require_once ("/var/www/html/projects/campspot/inc/classes/ModelParse.php");

class Campsites extends ModelParse
{
	private $campsites;
	private $campsiteIds;

    public function __construct()
    {
        parent::__construct();
        $this->setCampsitesData();
        $this->setCampsiteIds();
    }

    public function getCampsitesData() {
        return $this->campsites;
    }

    public function getCampsiteIds() {
        return $this->campsiteIds;
    }

    private function setCampsitesData() {
        $campsitesData = $this->getDecodedDataByPrimaryGroup("campsites");
        $this->campsites = $campsitesData;
    }

    private function setCampsiteIds() {
        $campsites = $this->getCampsitesData();
        $campsiteIds = [];

        foreach ($campsites as $campsite){
            $campsiteIds[] = $campsite->id;
        }
        $this->campsiteIds = $campsiteIds;
    }
}

?>
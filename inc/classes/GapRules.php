<?php

require_once ("/var/www/html/projects/campspot/inc/classes/ModelParse.php");

class GapRules extends ModelParse
{
    private $gapRules;

    public function __construct()
    {
        parent::__construct();
        $this->setGapRules();
    }

    public function getGapRules() {
        return $this->gapRules;
    }

    private function setGapRules() {
        $gapRules = $this->getDecodedDataByPrimaryGroup("gapRules");
        $this->gapRules = $gapRules;
    }
}
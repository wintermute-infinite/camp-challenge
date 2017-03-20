<?php

require_once ("/var/www/html/projects/campspot/inc/classes/ModelParse.php");

class GapRules
{
    private $gapRules;

    public function __construct($gapRulesData)
    {
        $this->setGapRules($gapRulesData);
    }

    public function getGapRules() {
        return $this->gapRules;
    }

    private function setGapRules($gapRulesData) {
        $this->gapRules = $gapRulesData;
    }
}
<?php

class GapRules
{
    private $gapRules;

    public function __construct($gapRulesData)
    {
        $this->setGapRules($gapRulesData);
    }

    public function getGapRules()
    {
        return $this->gapRules;
    }

    public function convertGapRulesToArray()
    {
        $gapRules = $this->getGapRules();

        if (empty($gapRules)) {return $gapRules;}

        if (!function_exists("add1")) {
            function add1($n) {
                return($n+1);
            }
        }

        $gapRulesArray  = json_decode(json_encode($gapRules), true);

        foreach ($gapRulesArray as $gapRules) {
            $gapRulesArrayOutput[] = array_map("add1", $gapRules);

        }

        sort($gapRulesArrayOutput);
        return $gapRulesArrayOutput;
    }

    private function setGapRules($gapRulesData)
    {
        $this->gapRules = $gapRulesData;
    }
}
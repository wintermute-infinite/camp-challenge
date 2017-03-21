<?php

class GapRules
{
    private $gapRules;

    public function __construct($gapRulesData)
    {
        $this->setGapRules($gapRulesData);
    }
// Takes in a multidimensional array containing objects with gapRule data
    public function convertGapRulesToArray()
    {
        $gapRules = $this->getGapRules();
// Makes sure that if there are no set gap rules the program still runs successfully
        if (empty($gapRules)) {return $gapRules;}
// Function check is to prevent duplicate declarations while looping
        if (!function_exists("add1")) {
            function add1($n) {
                return($n+1);
            }
        }
// This is a neat trick to convert objects into arrays, necessary for the following array_map function
        $gapRulesArray  = json_decode(json_encode($gapRules), true);

        foreach ($gapRulesArray as $gapRules) {
// Adds 1 to every gapSize value in order to prep for the format used by the date_diff() function
            $gapRulesArrayOutput[] = array_map("add1", $gapRules);

        }
// This sorts the gap rules from lowest to highest in order to make sure the gapRuleViolation comparisons work properly whether they are ordered to begin with or not
        sort($gapRulesArrayOutput);
        return $gapRulesArrayOutput;
    }
// Getters and setters
    public function getGapRules()
    {
        return $this->gapRules;
    }

    private function setGapRules($gapRulesData)
    {
        $this->gapRules = $gapRulesData;
    }
}
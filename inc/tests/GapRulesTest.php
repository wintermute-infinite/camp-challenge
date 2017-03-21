<?php

namespace PHPUnit\Framework;

class GapRulesTest extends TestCase
{
// Tests to make sure the returned array of gap rules in in a consistent order from low to high
    public function test_convertGapRulesToArray_GapRuleArrayValuesAreNotInOrderAndAreSortedLowestToHighest()
    {
        $rawData = file_get_contents("/var/www/html/projects/campspot/inc/model/json/test-case.json");

        $decodedData = json_decode($rawData);
        $gapRulesData = $decodedData->gapRules;

        $expected = [
            ["gapSize" => 3],
            ["gapSize" => 4]
        ];

        $testClassObject = new \GapRules($gapRulesData);

        $actual = $testClassObject->convertGapRulesToArray();

        $this->assertEquals($expected, $actual);
    }
}

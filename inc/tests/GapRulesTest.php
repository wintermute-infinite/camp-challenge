<?php

namespace PHPUnit\Framework;

class GapRulesTest extends TestCase
{
    public function test_GetGapRulesData_WillReturnAllDataFromInheritedClassMethods() {

        $gapRulesDataObj = new \ModelParse();
        $expected = $gapRulesDataObj->getDecodedDataByPrimaryGroup("gapRules");

        $testClassObject = new \GapRules();

        $actual = $testClassObject->getGapRules();

        $this->assertEquals($expected, $actual);

    }
}

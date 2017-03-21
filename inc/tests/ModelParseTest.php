<?php

namespace PHPUnit\Framework;

class ModelParseTest extends TestCase
{
// Tests decodedData method results
    public function test_ModelParseTest_getDecodedData()
    {
        $rawData = file_get_contents("/var/www/html/projects/campspot/inc/model/json/test-case.json");
        $file = "test-case.json";
        $expected = json_decode($rawData);

        $testClassObject = new \ModelParse($file);
        $actual = $testClassObject->getDecodedData();

        $this->assertEquals($expected, $actual);
    }
}

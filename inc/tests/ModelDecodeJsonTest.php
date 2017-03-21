<?php

namespace PHPUnit\Framework;

class ModelDecodeJsonTest extends TestCase
{

    public function test_ModelDecodeJson_RetrievesCorrectPathToDataTypeSrc()
    {
        $file = ("test-case.json");

        $expected = "/var/www/html/projects/campspot/inc/model/json/";

        $testClassObject = new \ModelDecodeJson($file);

        $actual = $testClassObject->getDataSrcPath();

        $this->assertEquals($expected, $actual);

    }

    public function test_ModelDecodeJson_ReturnsRawData()
    {
        $file = ("test-case.json");

        $expected = file_get_contents("/var/www/html/projects/campspot/inc/model/json/test-case.json");

        $testClassObject = new \ModelDecodeJson($file);

        $actual = $testClassObject->returnRawData();

        $this->assertEquals($expected, $actual);

    }

    public function test_ModelDecodeJson_DecodesJsonIntoPhp()
    {
        $rawData = file_get_contents("/var/www/html/projects/campspot/inc/model/json/test-case.json");
        $file = ("test-case.json");

        $expected = json_decode($rawData);

        $testClassObject = new \ModelDecodeJson($file);

        $actual = $testClassObject->returnDecodedData();

        $this->assertEquals($expected, $actual);

    }

    public function test_ModelDecodeJson_TakesFileArgumentInConstructor() {
        $rawData = file_get_contents("/var/www/html/projects/campspot/inc/model/json/test-case.json");
        $file = ("test-case.json");

        $expected = json_decode($rawData);

        $testClassObject = new \ModelDecodeJson($file);

        $actual = $testClassObject->returnDecodedData();

        $this->assertEquals($expected, $actual);
    }
}

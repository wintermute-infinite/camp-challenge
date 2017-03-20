<?php

namespace PHPUnit\Framework;

class ModelDecodeJsonTest extends TestCase
{

    public function test_ModelDecodeJson_RetrievesCorrectPathToDataTypeSrc() {

        $expected = "/var/www/html/projects/campspot/inc/model/json/";

        $testClassObject = new \ModelDecodeJson();

        $actual = $testClassObject->getDataSrcPath();

        $this->assertEquals($expected, $actual);

    }

    public function test_ModelDecodeJson_ReturnsRawData() {

        $expected = file_get_contents("/var/www/html/projects/campspot/inc/model/json/test-case.json");

        $testClassObject = new \ModelDecodeJson();

        $actual = $testClassObject->returnRawData("test-case.json");

        $this->assertEquals($expected, $actual);

    }

    public function test_ModelDecodeJson_DecodesJsonIntoPhp() {

        $rawData = file_get_contents("/var/www/html/projects/campspot/inc/model/json/test-case.json");
        $expected = json_decode($rawData);

        $testClassObject = new \ModelDecodeJson();

        $actual = $testClassObject->returnDecodedData("test-case.json");

        $this->assertEquals($expected, $actual);

    }

//    public function test_ModelDecodeJson_

//    public function test_ModelDecodeJson_OnlyAcceptsJsonFormat() {
//        $dataFile = "test-case.json";
//    }
}

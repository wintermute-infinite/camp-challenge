<?php

namespace PHPUnit\Framework;

class ModelParseTest extends TestCase
{
    public function test_ModelParse_getDecodedData() {
        $rawData = file_get_contents("/var/www/html/projects/campspot/inc/model/json/test-case.json");
        $file = "test-case.json";
        $expected = json_decode($rawData);

        $testClassObject = new \ModelParse($file);
        $actual = $testClassObject->getDecodedData();

        $this->assertEquals($expected, $actual);
    }

    public function test_ModelParse_getDecodedDataByPrimaryGroupReservations() {
        $rawData = file_get_contents("/var/www/html/projects/campspot/inc/model/json/test-case.json");
        $decodedData = json_decode($rawData);
        $file = "test-case.json";
        $group = "reservations";
        $expected = $decodedData->reservations;

        $testClassObject = new \ModelParse($file);
        $actual = $testClassObject->getDecodedDataByPrimaryGroup($group);

        $this->assertEquals($expected, $actual);
    }

    public function test_ModelParse_getDecodedDataByPrimaryGroupCampsites() {
        $rawData = file_get_contents("/var/www/html/projects/campspot/inc/model/json/test-case.json");
        $decodedData = json_decode($rawData);
        $file = "test-case.json";
        $group = "campsites";
        $expected = $decodedData->campsites;

        $testClassObject = new \ModelParse($file);
        $actual = $testClassObject->getDecodedDataByPrimaryGroup($group);

        $this->assertEquals($expected, $actual);
    }

    public function test_ModelParse_getDecodedDataByPrimaryGroupGapRules() {
        $rawData = file_get_contents("/var/www/html/projects/campspot/inc/model/json/test-case.json");
        $decodedData = json_decode($rawData);
        $file = "test-case.json";
        $group = "gapRules";
        $expected = $decodedData->gapRules;

        $testClassObject = new \ModelParse($file);
        $actual = $testClassObject->getDecodedDataByPrimaryGroup($group);

        $this->assertEquals($expected, $actual);
    }

    public function test_ModelParse_getDecodedDataByPrimaryGroupSearch() {
        $rawData = file_get_contents("/var/www/html/projects/campspot/inc/model/json/test-case.json");
        $decodedData = json_decode($rawData);
        $file = "test-case.json";
        $group = "search";
        $expected = $decodedData->search;

        $testClassObject = new \ModelParse($file);
        $actual = $testClassObject->getDecodedDataByPrimaryGroup($group);

        $this->assertEquals($expected, $actual);
    }
}

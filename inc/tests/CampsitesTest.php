<?php

namespace PHPUnit\Framework;

class CampsitesTest extends TestCase
{
// Tests the campsites method for returning an array of just the ids
    public function test_GetCampsiteIds_WillReturnArrayOfCampsiteIds()
    {
        $rawData = file_get_contents("../model/json/test-case.json");
        $decodedData = json_decode($rawData);

        $campsites = $decodedData->campsites;

        $expected = [1,2,3,4,5,6,7,8,9];

        $testClassObject = new \Campsites($campsites);

        $actual = $testClassObject->getCampsiteIds();

        $this->assertEquals($expected, $actual);
    }
}

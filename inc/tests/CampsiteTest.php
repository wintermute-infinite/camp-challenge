<?php

namespace PHPUnit\Framework;

class CampsiteTest extends TestCase
{
    public function test_GetCampsiteData_WillReturnAllDataFromInheritedClassMethods() {

        $campsiteDataObj = new \ModelParse();
        $expected = $campsiteDataObj->getDecodedDataByPrimaryGroup("campsites");

        $testClassObject = new \Campsites();

        $actual = $testClassObject->getCampsitesData();

        $this->assertEquals($expected, $actual);

    }

    public function test_GetCampsiteIds_WillReturnArrayOfCampsiteIds() {

        $expected = [1,2,3,4,5,6,7,8,9];

        $testClassObject = new \Campsites();

        $actual = $testClassObject->getCampsiteIds();

        $this->assertEquals($expected, $actual);

    }
}

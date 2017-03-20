<?php

namespace PHPUnit\Framework;

class ReservationsTest extends TestCase
{
    public function test_GetReservationData_WillReturnAllDataFromInheritedClassMethods() {
        $rawData = file_get_contents("/var/www/html/projects/campspot/inc/model/json/test-case.json");
        $decodedData = json_decode($rawData);
        $expected = $decodedData->reservations;

        $expected = $reservationDataObj->getDecodedDataByPrimaryGroup("reservations");

        $testClassObject = new \Reservations();

        $actual = $testClassObject->getReservations();

        $this->assertEquals($expected, $actual);

    }

}

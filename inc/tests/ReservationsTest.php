<?php

namespace PHPUnit\Framework;

class ReservationsTest extends TestCase
{
    public function test_GetReservationData_WillReturnAllDataFromInheritedClassMethods() {

        $reservationDataObj = new \ModelParse();
        $expected = $reservationDataObj->getDecodedDataByPrimaryGroup("reservations");

        $testClassObject = new \Reservations();

        $actual = $testClassObject->getReservations();

        $this->assertEquals($expected, $actual);

    }

//    public function test_GetReservationIds_WillReturnArrayOfReservationIds() {
//
//        $expected = [1,2,3,4,5,6,7,8,9];
//
//        $testClassObject = new \Reservation();
//
//        $actual = $testClassObject->getReservationIds();
//
//        $this->assertEquals($expected, $actual);
//
//    }
}

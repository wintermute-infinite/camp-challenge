<?php

namespace PHPUnit\Framework;
class ReservationTest extends TestCase
{
    public function test_GetReservation_ReturnSingleObjectWhenGivenFirstIndexArray() {

        $reservationDataObj = new \ModelParse();
        $reservations = $reservationDataObj->getDecodedDataByPrimaryGroup("reservations");
        $expected = $reservations[0];

        $reservationArray = [];

        foreach ($reservations as $reservation) {
            $reservationArray[] = $reservation;
        }

        $actualReservationIndex = $reservationArray[0];
        $testClassObject = new \Reservation($actualReservationIndex);

        $actual = $testClassObject->getReservation();

        $this->assertEquals($expected, $actual);
    }

    public function test_SetReservationStartDate_ReturnStartDateForGivenFirstReservationIndex() {

        $expected = "2016-06-01";

        $reservationDataObj = new \ModelParse();
        $reservations = $reservationDataObj->getDecodedDataByPrimaryGroup("reservations");
        $reservationArray = [];

        foreach ($reservations as $reservation) {
            $reservationArray[] = $reservation;
        }

        $actualReservationIndex = $reservationArray[0];
        $testClassObject = new \Reservation($actualReservationIndex);

        $actual = $testClassObject->getReservationStartDate();

        $this->assertEquals($expected, $actual);
    }
}

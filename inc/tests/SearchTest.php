<?php

namespace PHPUnit\Framework;

include '/var/www/html/projects/campspot/inc/classes/GenerateAvailability.php';

class SearchTest extends TestCase
{
    public function test_SetSearchData_ReturnSingleSearchObject() {

        $data = new \ModelParse();
        $expected = $data->getDecodedDataByPrimaryGroup("search");
        $testClassObject = new \Search();
        $actual = $testClassObject->getSearchData();

        $this->assertEquals($expected, $actual);
    }

    public function test_GetSearchStartDate_ReturnsDateTimeObject() {

        $data = new \ModelParse();
        $expected = $data->getDecodedDataByPrimaryGroup("search");
        $testClassObject = new \Search();
        $actual = $testClassObject->getSearchData();

        print_r($expected);

        $this->assertEquals($expected, $actual);
    }

//// Using this test, I discovered a bunch of bugs: first, I did not account for the case where either of the start dates or end dates matched. second, the way I was setting the time properties led to a difference in time (hours, minutes, seconds) that made them not match even if they had the same dates. finally I had been using a more inefficient way of building my list of available campsites in GenerateAvailability, and was able to begin refactoring the lengthly conditional chain in that class
//
//    public function test_CheckAvailabilityTwo_EliminateSingleCampsiteIdFromSingleReservation() {
//
//        $reservations = array(
//            (object)["campsiteId" => 1, "startDate" => "2016-06-01", "endDate" => "2016-06-04"]
//        );
//        $searchStartDate = date_create("2016-06-01");
//        $searchEndDate = date_create("2016-06-04");
//        $campsiteIds = [1,2,3,6,8];
//
//        $expected = [2,3,6,8];
//
//        $testClassObject = new \Search();
//
//        $actual = $testClassObject->checkAvailabilityTwo();
//
//
//        $this->assertEquals($expected, $actual);
//    }

////    Testing same as above except for campsite ids in the middle of the array
//    public function test_CheckAvailabilityTwo_EliminateSingleCampsiteIdFromMiddleOfListFromSingleReservation() {
//
//        $reservations = array(
//            (object)["campsiteId" => 6, "startDate" => "2016-06-01", "endDate" => "2016-06-04"]
//        );
//        $searchStartDate = date_create("2016-06-01");
//        $searchEndDate = date_create("2016-06-04");
//        $campsiteIds = [1,2,3,6,8];
//
//        $expected = [1,2,3,8];
//
//        $testClassObject = new \SearchTwo();
//
//        $actual = $testClassObject->checkAvailabilityTwo($reservations, $searchStartDate, $searchEndDate, $campsiteIds);
//
//
//        $this->assertEquals($expected, $actual);
//    }
//
//    public function test_CheckAvailabilityTwo_SearchDatesOverlapWithEarlierReservationDates() {
//
//        $reservations = array(
//            (object)["campsiteId" => 1, "startDate" => "2016-06-04", "endDate" => "2016-06-10"]
//        );
//        $searchStartDate = date_create("2016-06-01");
//        $searchEndDate = date_create("2016-06-05");
//        $campsiteIds = [1,2,3,6,8];
//
//        $expected = [2,3,6,8];
//
//        $testClassObject = new \SearchTwo();
//
//        $actual = $testClassObject->checkAvailabilityTwo($reservations, $searchStartDate, $searchEndDate, $campsiteIds);
//
//
//        $this->assertEquals($expected, $actual);
//    }
//
//    public function test_CheckAvailabilityTwo_SearchDatesOverlapWithLaterReservationDates() {
//
//        $reservations = array(
//            (object)["campsiteId" => 1, "startDate" => "2016-06-04", "endDate" => "2016-06-10"]
//        );
//        $searchStartDate = date_create("2016-06-08");
//        $searchEndDate = date_create("2016-06-13");
//        $campsiteIds = [1,2,3,6,8];
//
//        $expected = [2,3,6,8];
//
//        $testClassObject = new \SearchTwo();
//
//        $actual = $testClassObject->checkAvailabilityTwo($reservations, $searchStartDate, $searchEndDate, $campsiteIds);
//
//
//        $this->assertEquals($expected, $actual);
//    }
//
//    public function test_SetCampsites_SetsCampsitesPropertyCorrectly() {
//        $rawData = file_get_contents("/var/www/html/projects/campspot/inc/model/json/test-case.json");
//        $decodedData = json_decode($rawData);
//        $file = "test-case.json";
//        $group = "campsites";
//        $expected = $decodedData->campsites;
//
//        $testClassObject = new \ModelParse($file);
//        $actual = $testClassObject->getDecodedDataByPrimaryGroup($group);
//
//        $this->assertEquals($expected, $actual);
//    }

//    public function test_CheckAvailabilityTwo_GetsDecodedDataSearch() {
//        $rawData = file_get_contents("/var/www/html/projects/campspot/inc/model/json/test-case.json");
//        $decodedData = json_decode($rawData);
//        $file = "test-case.json";
//        $group = "search";
//        $expected = $decodedData->search;
//
//        $expected = [2,3,6,8];
//
//        $testClassObject = new \SearchTwo();
//
//        $actual = $testClassObject->checkAvailabilityTwo($reservations, $searchStartDate, $searchEndDate, $campsiteIds);
//
//
//        $this->assertEquals($expected, $actual);
//    }
}



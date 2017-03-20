<?php

namespace PHPUnit\Framework;


class GenerateAvailabilityTest extends TestCase
{

    public function test_generateAvailableCampsiteIds_ReturnsAllCampsiteIdsIfReservationsIsEmpty() {

        $reservations = [];
        $campsiteIds = [1,2,3,4,5,6,7,8,9];
        $gapRules = array(
            (object)["gapSize" => 2],
            (object)["gapSize" => 3]
        );

        $searchStartDate = date_create("2016-06-01");
        $searchEndDate = date_create("2016-06-04");

        $expected = [1,2,3,4,5,6,7,8,9];

        $testClassObject = new \GenerateAvailability();

        $actual = $testClassObject->generateAvailableCampsiteIds($reservations, $campsiteIds, $searchStartDate, $searchEndDate, $gapRules);

        $this->assertEquals($expected, $actual);
    }

    public function test_generateAvailableCampsiteIds_ReturnsTrimmedArrayForSearchOverlappingWithExistingReservations() {

        $reservations = array(
            (object)["campsiteId" => 1, "startDate" => "2016-06-01", "endDate" => "2016-06-04"]
        );
        $campsiteIds = [1,2,3,4,5,6,7,8,9];
        $gapRules = array(
            (object)["gapSize" => 2],
            (object)["gapSize" => 3]
        );

        $searchStartDate = date_create("2016-06-01");
        $searchEndDate = date_create("2016-06-04");

        $expected = [2,3,4,5,6,7,8,9];

        $testClassObject = new \GenerateAvailability();

        $actual = $testClassObject->generateAvailableCampsiteIds($reservations, $campsiteIds, $searchStartDate, $searchEndDate, $gapRules);

        $this->assertEquals($expected, $actual);
    }

    public function test_generateAvailableCampsiteIds_ReturnsExpectedFinalResultsArrayIds() {
        $rawData = file_get_contents("../model/json/test-case.json");
        $decodedData = json_decode($rawData);
        $reservations = $decodedData->reservations;
        $campsiteIds = [1,2,3,4,5,6,7,8,9];
        $gapRules = array(
            (object)["gapSize" => 2],
            (object)["gapSize" => 3]
        );

        $searchStartDateString = "2016-06-07";
        $searchEndDateString = "2016-06-10";
        $searchStartDate = (date_create_from_format("Y-m-d", $searchStartDateString));
        $searchEndDate = (date_create_from_format("Y-m-d", $searchEndDateString));

        $expected = [5,6,8,9];

        $testClassObject = new \GenerateAvailability();
        $actual = $testClassObject->generateAvailableCampsiteIds($reservations, $campsiteIds, $searchStartDate, $searchEndDate, $gapRules);

        $this->assertEquals($expected, $actual);
    }

    public function test_processGapRulesData_GapRuleArrayValuesAreNotInOrderAndAreSortedLowestToHighest() {

        $gapRules = array(
            (object)["gapSize" => 4],
            (object)["gapSize" => 2]
        );

        $expected = [3,5];

        $testClassObject = new \GenerateAvailability();
        $actual = $testClassObject->processGapRulesData($gapRules);

        $this->assertEquals($expected, $actual);
    }

}

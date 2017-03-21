<?php

namespace PHPUnit\Framework;


class GenerateAvailabilityTest extends TestCase
{
// Makes sure that an empty reservations object means every campsite is available and therefore the full array is returned
    public function test_generateAvailableCampsiteIds_ReturnsAllCampsiteIdsIfReservationsIsEmpty()
    {
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
// Basic test to make sure that arbitrary searches still result in the date comparisons working and producing usable results
    public function test_generateAvailableCampsiteIds_ReturnsTrimmedArrayForSearchOverlappingWithExistingReservations()
    {
        $reservations = array(
            (object)["campsiteId" => 1, "startDate" => "2016-06-01", "endDate" => "2016-06-04"]
        );
        $reservationsObj = new \Reservations($reservations);
        $campsiteIds = [1,2,3,4,5,6,7,8,9];
        $gapRules = array(
            (object)["gapSize" => 2],
            (object)["gapSize" => 3]
        );
        $gapRulesObj = new \GapRules($gapRules);

        $searchStartDate = date_create("2016-06-01");
        $searchEndDate = date_create("2016-06-04");

        $expected = [2,3,4,5,6,7,8,9];

        $testClassObject = new \GenerateAvailability();

        $actual = $testClassObject->generateAvailableCampsiteIds($reservationsObj, $campsiteIds, $searchStartDate, $searchEndDate, $gapRulesObj);

        $this->assertEquals($expected, $actual);
    }
// Tests to make sure the results for the input file match the expectations as communcated in the exercise instructions
    public function test_generateAvailableCampsiteIds_ReturnsExpectedFinalResultsArrayIds()
    {
        $rawData = file_get_contents("../model/json/test-case.json");
        $decodedData = json_decode($rawData);

        $reservations = $decodedData->reservations;
        $reservationsObj = new \Reservations($reservations);
        $campsiteIds = [1,2,3,4,5,6,7,8,9];
        $gapRules = array(
            (object)["gapSize" => 2],
            (object)["gapSize" => 3]
        );
        $gapRulesObj = new \GapRules($gapRules);

        $searchStartDateString = "2016-06-07";
        $searchEndDateString = "2016-06-10";
        $searchStartDate = (date_create_from_format("Y-m-d", $searchStartDateString));
        $searchEndDate = (date_create_from_format("Y-m-d", $searchEndDateString));

        $expected = [5,6,8,9];

        $testClassObject = new \GenerateAvailability();
        $actual = $testClassObject->generateAvailableCampsiteIds($reservationsObj, $campsiteIds, $searchStartDate, $searchEndDate, $gapRulesObj);

        $this->assertEquals($expected, $actual);
    }
// Makes sure that when there are no set gap rules, the search engine and results still work and return results
    public function test_generateAvailableCampsiteIds_ProducesResultsForNoGapRules()
    {
        $rawData = file_get_contents("../model/json/test-case.json");
        $decodedData = json_decode($rawData);

        $reservations = $decodedData->reservations;
        $reservationsObj = new \Reservations($reservations);
        $campsiteIds = [1,2,3,4,5,6,7,8,9];
        $gapRules = [];
        $gapRulesObj = new \GapRules($gapRules);

        $searchStartDate = date_create("2016-06-07");
        $searchEndDate = date_create("2016-06-10");

        $expected = [1,3,4,5,6,8,9];

        $testClassObject = new \GenerateAvailability();

        $actual = $testClassObject->generateAvailableCampsiteIds($reservationsObj, $campsiteIds, $searchStartDate, $searchEndDate, $gapRulesObj);

        $this->assertEquals($expected, $actual);
    }
// Original specs only included a pair of gap rules, so I wanted to make sure a single gap rule would still be accepted and return results
    public function test_generateAvailableCampsiteIds_ProducesResultsForSingleGapRules()
    {
        $rawData = file_get_contents("../model/json/test-case.json");
        $decodedData = json_decode($rawData);

        $reservations = $decodedData->reservations;
        $reservationsObj = new \Reservations($reservations);
        $campsiteIds = [1,2,3,4,5,6,7,8,9];
        $gapRules = array(
            (object)["gapSize" => 2]
        );
        $gapRulesObj = new \GapRules($gapRules);

        $searchStartDate = date_create("2016-06-07");
        $searchEndDate = date_create("2016-06-10");

        $expected = [1,3,5,6,8,9];

        $testClassObject = new \GenerateAvailability();

        $actual = $testClassObject->generateAvailableCampsiteIds($reservationsObj, $campsiteIds, $searchStartDate, $searchEndDate, $gapRulesObj);

        $this->assertEquals($expected, $actual);
    }

}

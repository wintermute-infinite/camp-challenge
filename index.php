<?php

//Use PHP's magic method for autoloading classes when they are called but not found

function __autoload($class) {
    require "inc/" . $class . ".php";
}

// data is being stored and processed in a Model class to improve maintainability in the future
$data = new Model("test-case.json");

// search data is gathered using Model method and then split into the start/end dates
$search = $data->getSearchData();
$searchStartDate = $search->startDate;
$searchEndDate = $search->endDate;

//primary datasets are gathered using public class methods
$campsites = $data->getCampsitesData();
$gapRules = $data->getGapRulesData();
$reservations = $data->getReservationsData();

// instantiate new Search object to prepare for primary calculations in Search class method
$mainSearch = new Search($searchStartDate, $searchEndDate);

// checks availability of camp sites given search dates within Search object
// stores results in array

$resultsArray = $mainSearch->checkAvailability($mainSearch, $reservations, $campsites);

// iterates over results array and displays each on a new line
foreach ($resultsArray as $result) {
    echo $result . "<br />";
}

?>
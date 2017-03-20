<?php


//Use PHP's magic method for autoloading classes when they are called but not found

function __autoload($class) {
    require "./inc/classes/" . $class . ".php";
}

$dataFile = "test-case.json";

$rawData = new ModelParse($dataFile);
$decodedData = $rawData->getDecodedData();

$searchData = $decodedData->search;
$reservationsData = $decodedData->reservations;
$gapRulesData = $decodedData->gapRules;
$campsitesData = $decodedData->campsites;

//var_dump($reservations);

// instantiate objects

$search = new Search($searchData);
$reservationsObj = new Reservations($reservationsData);
$gapRulesObj = new GapRules($gapRulesData);
$campsitesObj = new Campsites($campsitesData);

$reservations = $reservationsObj->getReservations();
$gapRules = $gapRulesObj->getGapRules();
$campsites = $campsitesObj->getCampsitesData();
$campsiteIds = $campsitesObj->getCampsiteIds();

$resultsArray = $search->checkAvailability($search, $reservations, $campsites, $campsiteIds, $gapRules);

//
//// iterates over results array and displays each on a new line

foreach ($resultsArray as $result) {
    echo $result . "<br />";
}

?>
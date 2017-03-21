<?php

// Use PHP's magic method for autoloading classes when they are called but not found

function __autoload($class) {
    require "./inc/classes/" . $class . ".php";
}

// Data file source is set from here, the view in order to improve testability. Would likely exist further backend if data was from a more dynamic source

$dataFile = "test-case.json";

$rawData = new ModelParse($dataFile);
$decodedData = $rawData->getDecodedData();

// Gets the primary data broken down by their respective class names. This returns arrays containing the default class stdClass
$searchData = $decodedData->search;
$reservationsData = $decodedData->reservations;
$gapRulesData = $decodedData->gapRules;
$campsitesData = $decodedData->campsites;

// Instantiate primary objects of each class, which converts them from stdClass to their respective classes (allows freer use of props and methods)
$search = new Search($searchData);
$reservationsObj = new Reservations($reservationsData);
$gapRulesObj = new GapRules($gapRulesData);
$campsitesObj = new Campsites($campsitesData);

// Returns the data for each class object in an array container, which permits faster data parsing at various points. Also, this section and the above are illustrative of maintainability, and I admit all instances are not used at this point
$reservations = $reservationsObj->getReservations();
$gapRules = $gapRulesObj->getGapRules();
$campsites = $campsitesObj->getCampsitesData();
$campsiteIds = $campsitesObj->getCampsiteIds();

// Kicks off the primary engine and stores the results in an array
$resultsArray = $search->checkAvailability($search, $reservationsObj, $campsites, $campsiteIds, $gapRulesObj);

// Iterates over results array and displays each on a new line
foreach ($resultsArray as $result) {
    echo $result . "<br />";
}

?>
<?php


//Use PHP's magic method for autoloading classes when they are called but not found

function __autoload($class) {
    require "./inc/classes/" . $class . ".php";
}

$rawData = new ModelDecodeJson();
$decodedData = $rawData->returnDecodedData();

$searchData = $decodedData->search;
$reservations = $decodedData->reservations;
$gapRules = $decodedData->gapRules;

var_dump($gapRules);

// instantiate objects
$search = new Search($searchData);

$campsitesObj = new Campsites();

$campsites = $campsitesObj->getCampsitesData();
$campsiteIds = $campsitesObj->getCampsiteIds();

$resultsArray = $search->checkAvailability($search, $reservations, $campsites, $campsiteIds, $gapRules);

//
//// iterates over results array and displays each on a new line

foreach ($resultsArray as $result) {
    echo $result . "<br />";
}

?>
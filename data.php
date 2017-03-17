<?php

//	 use php function to get contents of provided json file

$json = file_get_contents('./test-case.json');

// use php function to decode json data into php objects

$data = json_decode($json);

//	Initialize primary objects from decoded json data
$search = $data->search;
$campsites = $data->campsites;
$gapRules = $data->gapRules;
$reservations = $data->reservations;

// Split the search object into start and end date since this is the only way it is used in the application

$searchStartDate = $search->startDate;
$searchEndDate = $search->endDate;

?>
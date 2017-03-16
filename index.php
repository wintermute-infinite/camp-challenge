<?php
	
//Use PHP's magic method for autoloading classes when they are called but not found

	function __autoload($class) {
		require "inc/" . $class . ".php";
	}

//	 use php function to get contents of provided json file

	$json = file_get_contents('./test-case.json');

// use php function to decode json data into php objects

	$data = json_decode($json);

//	Initialize primary objects from decoded json data
	$search = $data->search;
	$campsites = $data->campsites;
	$gapRules = $data->gapRules;
	$reservations = $data->reservations;

	echo "<h1>Campsites</h1>";

//  iterate over the campsites array to provide important debug info
	foreach ($campsites as $campsite) {

		print_r($campsite);
		echo "<br />";

	}

	echo "<h1>Reservations</h1>";

//	converts string dates into PHP dateTime objects, in preparation for using the DateDiff static method, which requires each argument to be a DateTime object
	$searchStartDate = date_create_from_format("Y-m-d", $search->startDate);
	$searchEndDate = date_create_from_format("Y-m-d", $search->endDate);

//	displays the search query date range using the formatted versions of the start and end date
	echo "<h2>Search Date Range</h2>";
	echo "<h2>" . date_format($searchStartDate, "Y-m-d") . " - " . date_format($searchEndDate, "Y-m-d") . "</h2>";

//	initialize array for storing pushed campsiteIds for use in matching to campsite objects
    $availCampsiteIds = [];

//  iterate through each reservation object in order to compare dates of existing reservations in comparing to searched terms and determining availability
	foreach ($reservations as $reservation) {

//	    convert string dates into PHP DateTime objects in order to use the DateDiff static method which requires DateTime objects as arguments
		$resStartDate = date_create_from_format("Y-m-d", $reservation->startDate);
		$resEndDate = date_create_from_format("Y-m-d", $reservation->endDate);

//		perform dateDiff function to determine the number of days between each date and store in vars
        $searchStartDateDiff = (date_diff($searchStartDate, $resEndDate, TRUE))->d;
        $searchEndDateDiff = (date_diff($searchEndDate, $resStartDate, TRUE))->d;

//      eliminates all cases where the requested reservation overlaps with any existing reservations
		 if (($searchStartDate <= $resEndDate) && ($searchEndDate >= $resStartDate)) {
//      Do nothing
//      eliminates all cases where the date diff violates the gapRules
		 } elseif (($searchStartDateDiff >= 3 && $searchStartDateDiff <= 4) || ($searchEndDateDiff >= 3 && $searchEndDateDiff <= 4)) {
//      Do nothing
//      matches all non-violating/matching dates
        } else {

//		     pushes the matching reservation record property of campsiteId to previously initialized array
             $availCampsiteIds[] = $reservation->campsiteId;

//           prints out visual confirmation of each site that is available for the searched by dates
		     echo "<h2>Reservation for campsiteId" . $reservation->campsiteId . "</h2>";
		     echo "<h3>is available</h3>";
             echo "<br />";

//           outputs debug data to show that the array is being built properly
             print_r($availCampsiteIds);
        }
	}

?>
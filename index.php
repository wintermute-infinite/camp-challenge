<?php
	
	$json = file_get_contents('./test-case.json');

	$data = json_decode($json);

	$search = $data->search;
	$campsites = $data->campsites;
	$gapRules = $data->gapRules;
	$reservations = $data->reservations;


	echo "<h1>Search</h1>";
	print_r($search);

	echo "<h1>Campsites</h1>";

	// print_r($campsites);

	foreach ($campsites as $campsite) {
		print_r($campsite);
		echo "<br />";
	}

	echo "<h1>Gap Rules</h1>";
	foreach ($gapRules as $gapRule) {
		print_r($gapRule);
		echo "<br />";
	}

	echo "<h1>Reservations</h1>";
	foreach ($reservations as $reservation) {
		print_r($reservation);
		echo "<br />";
	}

	// var_dump($json->search);

?>
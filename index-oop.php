<?php

//Use PHP's magic method for autoloading classes when they are called but not found

function __autoload($class) {
    require "inc/" . $class . ".php";
}

include "./data.php";

$mainSearch = new Search($searchStartDate, $searchEndDate);

//$mainSearch->getAvailableCampIds($searchStartDate, $searchEndDate);

$mainSearch->checkAvailability($mainSearch, $reservations);


?>
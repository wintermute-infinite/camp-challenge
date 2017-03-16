<?php

class Campsite {
	protected $id;
	protected $name;
	protected $siteReservations;

	public function __construct($id, $name) {
		$this->id = $id;
		$this->name = $name;
	}

	public function setReservations() {
		global $reservations;

		foreach ($reservations as $reservation) {
			if ($reservation->campsiteId == $this->id) {
				$siteReservation["startDate"] = $reservation->startDate;
				$siteReservation["endDate"] = $reservation->endDate;

				print_r($siteReservation["startDate"]);
				print_r($siteReservation["endDate"]);
				echo "<br />";
			}
		}
	}

	public function getReservations() {
		
	}

}

?>
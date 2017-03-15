<?php

class Campsite {
	protected $id;
	protected $name;
	protected $reservations;

	public function __construct($id, $name) {
		$this->id = $id;
		$this->name = $name;
	}

	public function getReservations() {
		
	}

}

?>
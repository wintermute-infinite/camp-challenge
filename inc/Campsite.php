<?php

class Campsite {
	private $id;
	private $name;

	public function __construct($id, $name) {
		$this->id = $id;
		$this->name = $name;
	}

	private function setId($id) {
	    $this->id = $id;
    }

    private function getId() {
	    return $this->id;
    }

    private function setName($name) {
        $this->name = $name;
    }

    private function getName() {
        return $this->name;
    }

}

?>
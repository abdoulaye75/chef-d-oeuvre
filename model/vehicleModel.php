<?php

require 'model/.config.php';

class VehicleModel
{
	private $bdd;

	public function __construct()
	{
		$this->bdd = new Database();
	}

	public function listVehicles() {
		$req = $this->bdd->connectDatabase()->prepare("SELECT * FROM vehicles");
		$req->execute(array());
		return $req;
	}
}

?>
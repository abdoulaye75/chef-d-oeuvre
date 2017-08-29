<?php

require_once 'model/.config.php';

class ReservationModel
{
	private $bdd;

	public function __construct()
	{
		$this->bdd = new Database();
	}

	public function createReservation($date, $timeRent, $dateBack, $timeBack) {
		$req = $this->bdd->connectDatabase()->prepare("INSERT INTO reservations (dateRent, timeRent, dateBack, timeBack) VALUES (:dateRent, :timeRent, :dateBack, :timeBack)");
		$req->execute(array('dateRent' => $date, 'timeRent' => $timeRent, 'dateBack' => $dateBack, 'timeBack' => $timeBack));
		return $req;
	}

	public function getVehicles() {
		$req = $this->bdd->connectDatabase()->prepare("SELECT * FROM vehicles");
		$req->execute(array());
		return $req;
	}

	public function updateReservation($id, $date, $timeRent, $dateBack, $timeBack) {
		$req = $this->bdd->connectDatabase()->prepare("UPDATE reservations SET dateRent = :nvdateRent, timeRent = :nvtimeRent, dateBack = :nvdateBack, timeBack = :nvtimeBack WHERE id = :id");
		$req->execute(array('nvdateRent' => $date, 'nvtimeRent' => $timeRent, 'nvdateBack' => $dateBack, 'nvtimeBack' => $timeBack, 'id' => $id));
		return $req;
	}

	public function getIdReservation($idReservation) {
		$req = $this->bdd->connectDatabase()->prepare("SELECT * FROM reservations WHERE id = :id");
		$req->execute(array('id' => $idReservation));
		return $req;
	}

	public function removeReservation($id) {
		$req = $this->bdd->connectDatabase()->prepare("DELETE FROM reservations WHERE id = :id");
		$req->execute(array('id' => $id));
		return $req;
	}
}

?>
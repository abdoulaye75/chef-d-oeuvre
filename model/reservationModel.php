<?php

class ReservationModel
{
	private $host = 'localhost';
	private $dbname = 'rent_young';
	private $user = 'phpmyadmin';
	private $password = 'paris18';
	private $bdd;

	public function __construct()
	{
		try {
            $this->bdd = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf8', $this->user, $this->password);
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->bdd->exec("SET CHARACTER SET utf8");
            $this->bdd->exec("SET NAMES utf8");
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
	}

	public function createReservation($date, $timeRent, $dateBack, $timeBack) {
		$req = $this->bdd->prepare("INSERT INTO reservations (dateRent, timeRent, dateBack, timeBack) VALUES (:dateRent, :timeRent, :dateBack)");
		$req->execute(array('dateRent' => $date, 'timeRent' => $timeRent, 'dateBack' => $dateBack, 'timeBack' => $timeBack));
		return $req;
	}

	public function getVehicles() {
		$req = $this->bdd->prepare("SELECT * FROM vehicles");
		$req->execute(array());
		return $req;
	}

	public function updateReservation($id, $date, $timeRent, $dateBack, $timeBack) {
		$req = $this->bdd->prepare("UPDATE reservations SET dateRent = :nvdateRent, timeRent = :nvtimeRent, dateBack = :nvdateBack, timeBack = :nvtimeBack WHERE id = :id");
		$req->execute(array('nvdateRent' => $date, 'nvtimeRent' => $timeRent, 'nvdateBack' => $dateBack, 'nvtimeBack' => $timeBack, 'id' => $id));
		return $req;
	}

	public function getIdReservation() {
		$req = $this->bdd->prepare("SELECT * FROM reservations WHERE id = :id");
		$req->execute(array('id' => $_GET['id']));
		return $req;
	}

	public function removeReservation($id) {
		$req = $this->bdd->prepare("DELETE FROM reservations WHERE id = :id");
		$req->execute(array('id' => $id));
		return $req;
	}
}

?>
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
		$req = $this->bdd->prepare("INSERT INTO reservations (dateRent, timeRent, dateBack, timeBack) VALUES (:dateRent, :timeRent, :dateBack, :timeBack)");
		$req->execute(array('dateRent' => $date, 'timeRent' => $timeRent, 'dateBack' => $dateBack, 'timeBack' => $timeBack));
		return $req;
	}
}

?>
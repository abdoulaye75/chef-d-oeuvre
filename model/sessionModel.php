<?php

class SessionModel
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

	public function listSessions() {
		$req = $this->bdd->prepare("SELECT * FROM sessions");
		$req->execute(array());
		return $req;
	}

	public function createSession($date, $timeStart, $timeEnd) {
		$req = $this->bdd->prepare("INSERT INTO sessions (dateSession, timeStart, timeEnd, status) VALUES (:dateSession, :timeStart, :timeEnd, :status)");
		$req->execute(array('dateSession' => $date, 'timeStart' => $timeStart, 'timeEnd' => $timeEnd, 'status' => 'Pas encore accepté'));
		return $req;
	}

	public function updateSession($id, $date, $timeStart, $timeEnd) {
		$req = $this->bdd->prepare("UPDATE sessions SET dateSession = :nvdateSession, timeStart = :nvtimeStart, timeEnd = :nvtimeEnd, status = :nvstatus WHERE id = :id");
		$req->execute(array('nvdateSession' => $date, 'nvtimeStart' => $timeStart, 'nvtimeEnd' => $timeEnd, 'nvstatus' => 'Pas encore accepté', 'id' => $id));
		return $req;
	}

	public function changeStatus($id) {
		$req = $this->bdd->prepare("UPDATE sessions SET status = :nvstatus WHERE id = :id");
		$req->execute(array('nvstatus' => 'Accepté', 'id' => $id));
		return $req;
	}

	public function getStatus($id) {
		$req = $this->bdd->prepare("SELECT id FROM sessions WHERE id = :id ");
		$req->execute(array('id' => $id));
		return $req;
	}

	public function getIdSession() {
		$req = $this->bdd->prepare("SELECT * FROM sessions WHERE id = :id");
		$req->execute(array('id' => $_GET['id']));
		return $req;

	}

	public function removeSession($id) {
		$req = $this->bdd->prepare("DELETE FROM sessions WHERE id = :id");
		$req->execute(array('id' => $id));
		return $req;
	}

	public function listVehicles() {
		$req = $this->bdd->prepare("SELECT * FROM vehicles");
		$req->execute(array());
		return $req;
	}
}

?>
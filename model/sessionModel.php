<?php

require_once 'model/.config.php';

class SessionModel
{
	private $bdd;

	public function __construct()
	{
		$this->bdd = new Database();
	}	

	public function listSessions() {
		$req = $this->bdd->connectDatabase()->prepare("SELECT * FROM sessions");
		$req->execute(array());
		return $req;
	}

	public function createSession($date, $timeStart, $timeEnd) {
		$req = $this->bdd->connectDatabase()->prepare("INSERT INTO sessions (dateSession, timeStart, timeEnd, status) VALUES (:dateSession, :timeStart, :timeEnd, :status)");
		$req->execute(array('dateSession' => $date, 'timeStart' => $timeStart, 'timeEnd' => $timeEnd, 'status' => 'Pas encore accepté'));
		return $req;
	}

	public function updateSession($id, $date, $timeStart, $timeEnd) {
		$req = $this->bdd->connectDatabase()->prepare("UPDATE sessions SET dateSession = :nvdateSession, timeStart = :nvtimeStart, timeEnd = :nvtimeEnd, status = :nvstatus WHERE id = :id");
		$req->execute(array('nvdateSession' => $date, 'nvtimeStart' => $timeStart, 'nvtimeEnd' => $timeEnd, 'nvstatus' => 'Pas encore accepté', 'id' => $id));
		return $req;
	}

	public function changeStatus($id) {
		$req = $this->bdd->connectDatabase()->prepare("UPDATE sessions SET status = :nvstatus WHERE id = :id");
		$req->execute(array('nvstatus' => 'Accepté', 'id' => $id));
		return $req;
	}

	public function getStatus($id) {
		$req = $this->bdd->connectDatabase()->prepare("SELECT id FROM sessions WHERE id = :id ");
		$req->execute(array('id' => $id));
		return $req;
	}

	public function getIdSession($id) {
		$req = $this->bdd->connectDatabase()->prepare("SELECT * FROM sessions WHERE id = :id");
		$req->execute(array('id' => $id));
		return $req;

	}

	public function removeSession($id) {
		$req = $this->bdd->connectDatabase()->prepare("DELETE FROM sessions WHERE id = :id");
		$req->execute(array('id' => $id));
		return $req;
	}

	public function listVehicles() {
		$req = $this->bdd->connectDatabase()->prepare("SELECT * FROM vehicles");
		$req->execute(array());
		return $req;
	}
}

?>
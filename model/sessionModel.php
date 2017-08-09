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
		$req = $this->bdd->prepare("INSERT INTO sessions (dateSession, timeStart, timeEnd) VALUES (:dateSession, :timeStart, :timeEnd)");
		$req->execute(array('dateSession' => $date, 'timeStart' => $timeStart, 'timeEnd' => $timeEnd));
		return $req;
	}
}

?>
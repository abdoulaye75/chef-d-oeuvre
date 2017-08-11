<?php

class DriverModel
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

	public function subscribeDriver($name, $firstname, $login, $password) {
		$req = $this->bdd->prepare("INSERT INTO drivers (name, firstname, mail, login, password) VALUES (:name, :firstname, :login, :password)");
		$req->execute(array('name' => $name, 'firstname' => $firstname, 'login' => $login, 'password' => $password));
		return $req;
	}

	public function connectDriver($login, $password) {
		$req = $this->bdd->prepare("SELECT login, password FROM drivers WHERE login = :login AND password = :password");
		$req->execute(array('login' => $login, 'password' => $password));
		return $req;
	}

	public function listReservations() {
		$req = $this->bdd->prepare("SELECT * FROM reservations");
		$req->execute(array());
		return $req;
	}

	public function listSessions() {
		$req = $this->bdd->prepare("SELECT * FROM sessions");
		$req->execute(array());
		return $req;
	}
}

?>
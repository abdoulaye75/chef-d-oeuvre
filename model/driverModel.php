<?php 

require_once 'model/.config.php';

class DriverModel
{
	
	private $bdd;

	public function __construct()
	{
		$this->bdd = new Database();
	}

	public function subscribeDriver($name, $firstname, $login, $password) {
		$req = $this->bdd->connectDatabase()->prepare("INSERT INTO drivers (name, firstName, mail, login, password) VALUES (:name, :firstname, :login, :password)");
		$req->execute(array('name' => $name, 'firstname' => $firstname, 'login' => $login, 'password' => $password));
		return $req;
	}

	public function connectDriver($login, $password) {
		$req = $this->bdd->connectDatabase()->prepare("SELECT login, password FROM drivers WHERE login = :login AND password = :password");
		$req->execute(array('login' => $login, 'password' => $password));
		return $req;
	}

	public function listReservations() {
		$req = $this->bdd->connectDatabase()->prepare("SELECT * FROM reservations");
		$req->execute(array());
		return $req;
	}

	public function listAllSessions() {
		$req = $this->bdd->connectDatabase()->prepare("SELECT * FROM sessions");
		$req->execute(array());
		return $req;
	}
}

?>
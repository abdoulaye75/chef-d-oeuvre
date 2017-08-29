<?php

require_once 'model/.config.php';

class AccompagnistModel
{
	private $bdd;

	public function __construct()
	{
		$this->bdd = new Database();
	}

	public function subscribeAccompagnist($name, $firstname, $login, $password) {
		$req = $this->bdd->connectDatabase()->prepare("INSERT INTO accompagnists (name, firstName, login, password) VALUES (:name, :firstname, :login, :password)");
		$req->execute(array('name' => $name, 'firstname' => $firstname, 'login' => $login, 'password' => $password));
		return $req;
	}

	public function connectAccompagnist($login, $password) {
		$req = $this->bdd->connectDatabase()->prepare("SELECT login, password FROM accompagnists WHERE login = :login AND password = :password");
		$req->execute(array('login' => $login, 'password' => $password));
		return $req;
	}
}

?>
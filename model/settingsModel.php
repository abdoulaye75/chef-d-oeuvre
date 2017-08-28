<?php

require 'model/.config.php';

class SettingsModel
{
	private $bdd;

	public function __construct()
	{
		$this->bdd = new Database();
	}

	public function updateIdentifiersDrivers($id, $login, $password) {
		$req = $this->bdd->connectDatabase()->prepare("UPDATE drivers SET login = :nvlogin, password = :nvpassword WHERE id = :id");
		$req->execute(array('nvlogin' => $login, 'nvpassword' => $password, 'id' => $id));
		return $req;
	}

	public function getIdDriver() {
		$req = $this->bdd->connectDatabase()->prepare("SELECT id, login, password FROM drivers WHERE login = :login");
		$req->execute(array('login' => $_GET['login']));
		return $req;
	}

	public function removeDriver($login) {
		$req = $this->bdd->connectDatabase()->prepare("DELETE FROM drivers WHERE login = :login");
		$req->execute(array('login' => $login));
		return $req;
	}

	public function updateIdentifiersAccompagnists($id, $login, $password) {
		$req = $this->bdd->connectDatabase()->prepare("UPDATE accompagnists SET login = :nvlogin, password = :nvpassword WHERE id = :id");
		$req->execute(array('nvlogin' => $login, 'nvpassword' => $password, 'id' => $id));
		return $req;
	}

	public function getIdAccompagnist() {
		$req = $this->bdd->connectDatabase()->prepare("SELECT id, login, password FROM accompagnists WHERE login = :login");
		$req->execute(array('login' => $_GET['login']));
		return $req;
	}

	public function removeAccompagnist($login) {
		$req = $this->bdd->connectDatabase()->prepare("DELETE FROM accompagnists WHERE login = :login");
		$req->execute(array('login' => $login));
		return $req;
	}
}

?>
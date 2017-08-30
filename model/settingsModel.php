<?php

require_once 'model/.config.php';

class SettingsModel
{
	private $bdd;

	public function __construct()
	{
		$this->bdd = new Database();
	}

	// requête sql pour modifier les identifiants de connexion du conducteur
	public function updateIdentifiersDrivers($id, $login, $password) {
		$req = $this->bdd->connectDatabase()->prepare("UPDATE drivers SET login = :nvlogin, password = :nvpassword WHERE id = :id");
		$req->execute(array('nvlogin' => $login, 'nvpassword' => $password, 'id' => $id));
		return $req;
	}

	// méthode pour avoir les identifiants de connexion du conducteur et vérifier la correspondance
	public function getIdDriver() {
		$req = $this->bdd->connectDatabase()->prepare("SELECT id, login, password FROM drivers WHERE login = :login");
		$req->execute(array('login' => $_GET['login']));
		return $req;
	}

	// méthode pour supprimer le compte du conducteur sélectionné par son login
	public function removeDriver($login) {
		$req = $this->bdd->connectDatabase()->prepare("DELETE FROM drivers WHERE login = :login");
		$req->execute(array('login' => $login));
		return $req;
	}

	// requête sql pour modifier les identifiants de connexion de l'accompagnateur
	public function updateIdentifiersAccompagnists($id, $login, $password) {
		$req = $this->bdd->connectDatabase()->prepare("UPDATE accompagnists SET login = :nvlogin, password = :nvpassword WHERE id = :id");
		$req->execute(array('nvlogin' => $login, 'nvpassword' => $password, 'id' => $id));
		return $req;
	}

	// méthode pour avoir les identifiants de connexion de l'accompagnateur et vérifier la correspondance
	public function getIdAccompagnist() {
		$req = $this->bdd->connectDatabase()->prepare("SELECT id, login, password FROM accompagnists WHERE login = :login");
		$req->execute(array('login' => $_GET['login']));
		return $req;
	}

	// méthode pour supprimer le compte de l'accompagnateur sélectionné par son login
	public function removeAccompagnist($login) {
		$req = $this->bdd->connectDatabase()->prepare("DELETE FROM accompagnists WHERE login = :login");
		$req->execute(array('login' => $login));
		return $req;
	}
}

?>
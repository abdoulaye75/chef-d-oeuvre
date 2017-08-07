<?php

class SettingsModel
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

	public function updateIdentifiersDrivers($id, $mail, $login, $password) {
		$req = $this->bdd->prepare("UPDATE drivers SET mail = :nvmail, login = :nvlogin, password = :nvpassword WHERE id = :id");
		$req->execute(array('nvmail' => $mail, 'nvlogin' => $login, 'nvpassword' => $password, 'id' => $id));
		return $req;
	}

	public function getIdDriver() {
		$req = $this->bdd->prepare("SELECT id, mail, login, password FROM drivers WHERE login = :login");
		$req->execute(array('login' => $_GET['login']));
		return $req;
	}

	public function removeDriver($login) {
		$req = $this->bdd->prepare("DELETE FROM drivers WHERE login = :login");
		$req->execute(array('login' => $login));
		return $req;
	}
}

?>
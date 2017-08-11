<?php

class AdminModel
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

	public function getAdmin($login, $password) {
		$req = $this->bdd->prepare("SELECT login, password FROM admins WHERE login = :login AND password = :password");
		$req->execute(array('login' => $login, 'password' => $password));
		return $req;
	}

	public function getVehicles() {
		$req = $this->bdd->prepare("SELECT * FROM vehicles");
		$req->execute(array());
		return $req;
	}

	public function updateVehicle($id, $brand, $model, $type, $description, $numberPlaces, $year) {
		$req = $this->bdd->prepare("UPDATE vehicles SET brand = :nvbrand, model = :nvmodel, type = :nvtype, description = :nvdescription, numberPlaces = :nvnumberPlaces, year = :nvyear WHERE id = :id");
		$req->execute(array('nvbrand' => $brand, 'nvmodel' => $model, 'nvtype' => $type, 'nvdescription' => $description, 'nvnumberPlaces' => $numberPlaces, 'nvyear' => $year, 'id' => $id));
		return $req;
	}

	public function getIdVehicle() {
		$req = $this->bdd->prepare("SELECT * FROM vehicles WHERE id = :id");
		$req->execute(array('id' => $_GET['id']));
		return $req;
	}

	public function removeVehicle($id) {
		$req = $this->bdd->prepare("DELETE FROM vehicles WHERE id = :id");
		$req->execute(array('id' => $id));
		return $req;
	}
}

?>
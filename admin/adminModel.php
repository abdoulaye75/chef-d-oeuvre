<?php

require '../model/.config.php';

class AdminModel
{
	private $bdd;
	
	public function __construct()
	{
		$this->bdd = new Database();
	}

	// sélectionner les identifiants de connexion pour vérifier la correspondance identifiant et mot de passe
	public function getAdmin($login, $password) {
		$req = $this->bdd->connectDatabase()->prepare("SELECT login, password FROM admins WHERE login = :login AND password = :password");
		$req->execute(array('login' => $login, 'password' => $password));
		return $req;
	}

	// afficher tous les véhicules de la base de données
	public function getVehicles() {
		$req = $this->bdd->connectDatabase()->prepare("SELECT * FROM vehicles");
		$req->execute(array());
		return $req;
	}

	// modifier un véhicule sélectionné par son id (marque, modèle, type, description, nombre de places, année et l'image)
	public function updateVehicle($id, $brand, $model, $type, $description, $numberPlaces, $year, $image) {
		$req = $this->bdd->connectDatabase()->prepare("UPDATE vehicles SET brand = :nvbrand, model = :nvmodel, type = :nvtype, description = :nvdescription, numberPlaces = :nvnumberPlaces, year = :nvyear, pictureFilename = :nvpicture WHERE id = :id");
		$req->execute(array('nvbrand' => $brand, 'nvmodel' => $model, 'nvtype' => $type, 'nvdescription' => $description, 'nvnumberPlaces' => $numberPlaces, 'nvyear' => $year, 'nvpicture' => $image, 'id' => $id));
		return $req;
	}

	// afficher un véhicule sélectionné par son id
	public function getIdVehicle($id) {
		$req = $this->bdd->connectDatabase()->prepare("SELECT * FROM vehicles WHERE id = :id");
		$req->execute(array('id' => $id));
		return $req;
	}

	// supprimer un véhicule sélectionné par son id
	public function removeVehicle($id) {
		$req = $this->bdd->connectDatabase()->prepare("DELETE FROM vehicles WHERE id = :id");
		$req->execute(array('id' => $id));
		return $req;
	}

	// ajouter un nouveau véhicule dans la base de données
	public function createVehicle($brand, $model, $type, $description, $numberPlaces, $year, $image) {
		$req = $this->bdd->connectDatabase()->prepare("INSERT INTO vehicles (brand, model, type, description, numberPlaces, year, pictureFilename) VALUES (:brand, :model, :type, :description, :numberPlaces, :year, :picture)");
		$req->execute(array('brand' => $brand, 'model' => $model, 'type' => $type, 'description' => $description, 'numberPlaces' => $numberPlaces, 'year' => $year, 'picture' => $image));
		return $req;
	}

	// modifier les identifiants de connexion
	public function updateLogins($id, $login, $password) {
		$req = $this->bdd->connectDatabase()->prepare("UPDATE admins SET login = :nvlogin, password = :nvpassword WHERE id = :id");
		$req->execute(array('nvlogin' => $login, 'nvpassword' => $password, 'id' => $id));
		return $req;
	}

	// sélectionner un administrateur par son login
	public function getIdAdmin($login) {
		$req = $this->bdd->connectDatabase()->prepare("SELECT id, login, password FROM admins WHERE login = :login");
		$req->execute(array('login' => $login));
		return $req;
	}
}

?>
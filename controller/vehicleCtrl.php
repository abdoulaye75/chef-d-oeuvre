<?php

require 'model/vehicleModel.php';
require 'views/vehicleView.php';

class VehicleCtrl
{
	
	private $vehicleModel;
	private $vehicleView;

	public function __construct()
	{
		$this->vehicleModel = new VehicleModel(); // classe du modèle
		$this->vehicleView = new VehicleView(); // classe de la vue
	}

	public function showVehicles() {
		$eachVehicle = $this->vehicleModel->listVehicles(); // méthode pour sélectionner tous les véhicules
		$this->vehicleView->displayVehicles($eachVehicle); // méthode qui affiche les véhicules dans des div
	}
}

?>
<?php

require 'model/vehicleModel.php';
require 'views/vehicleView.php';

class VehicleCtrl
{
	
	private $vehicleModel;
	private $vehicleView;

	public function __construct()
	{
		$this->vehicleModel = new VehicleModel();
		$this->vehicleView = new VehicleView();
	}

	public function showVehicles() {
		$eachVehicle = $this->vehicleModel->listVehicles();
		$this->vehicleView->displayVehicles($eachVehicle);
	}
}

?>
<?php

class VehicleView
{
	public $brand = "";
	public $model = "";
	public $type = "";
	public $description = "";
	public $number_places = "";
	public $year = "";

	public function __construct()
	{
		# code...
	}

	public function displayVehicles($eachVehicle) {
		while ($data = $eachVehicle->fetch()) {
			echo '<div class="container">
			<div class="type">'.$data['type'].'</div>
			<div class="content">
				<div class="content1"><img src="views/pictures_vehicles/'.$data['pictureFilename'].'" alt="image du véhicule"></div>
				<div class="content2">
				<p>'.$data['brand'].' '.$data['model'].'</p>
				<p>'.$data['description'].'</p>
				<p>'.$data['numberPlaces'].' places</p>
				<p>'.$data['year'].'</p>
				</div>
			</div>
			</div>';
		} $eachVehicle->closeCursor();
	}
}

?>
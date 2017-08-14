<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Ajouter un nouveau véhicule </title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/jpg" href="../views/img/rent_car.jpg">
</head>
<body>
	<?php require 'navAdmin.php'; ?>
	<?php require 'adminCtrl.php';
		$addVehicle = new AdminCtrl();
		$addVehicle->addVehicle($brand, $model, $type, $description, $numberPlaces, $year);
		$addVehicle->formAddVehicle();
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
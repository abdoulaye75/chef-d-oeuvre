<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Modifier un véhicule </title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/jpg" href="../views/img/rent_car.jpg">
</head>
<body>
	<?php require 'navAdmin.php'; ?>
	<?php require 'adminCtrl.php';
	if (isset($_SESSION['login'], $_SESSION['password'])) {
		$vehicle = new AdminCtrl(); // classe du contrôleur adminctrl.php
		$vehicle->updateOneVehicle($id, $brand, $model, $type, $description, $numberPlaces, $year, $image); // méthode pour modifier le véhicule sélectionné
		$vehicle->listOneVehicle(); // méthode pour afficher le formulaire de modification pré-rempli du véhicule sélectionné
	} else {
		header('Location: index.php');
	}

	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
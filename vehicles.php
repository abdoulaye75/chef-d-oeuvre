<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Nos véhicules </title>
	<link rel="stylesheet" type="text/css" href="styles/index.css">
	<link rel="stylesheet" type="text/css" href="styles/nav.css">
	<link rel="stylesheet" type="text/css" href="styles/vehicles.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="icon" type="image/jpg" href="views/img/rent_car.jpg">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="views/js/nav.js"></script>
</head>
<body>
	<?php require 'views/nav.php'; ?>
	<?php require 'controller/vehicleCtrl.php';
	$vehicles = new VehicleCtrl(); // classe qu'on trouve dans vehicleCtrl.php
	$vehicles->showVehicles(); // méthode qui liste tous les véhicules contenus dans la base données
	?>
</body>
</html>
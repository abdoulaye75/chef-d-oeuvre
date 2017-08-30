<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Liste des véhicules </title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/jpg" href="../views/img/rent_car.jpg">
</head>
<body>
	<?php require 'navAdmin.php'; ?>
	<?php require 'adminCtrl.php';
		session_start();

		// message de bienvenue après connexion
		if (isset($_SESSION['login'], $_SESSION['password'])) {
			echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button> <strong> Connexion réussie, '.$_SESSION['login'].' !</strong></div>';
		}
		$vehicle = new AdminCtrl(); // classe qu'on trouve dans adminCtrl.php
		$vehicle->listVehicles(); // méthode qui affiche le tableau qui liste tous les véhicules
	?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
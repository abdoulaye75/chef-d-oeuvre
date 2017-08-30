<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> S'inscrire en tant que conducteur </title>
	<link rel="stylesheet" type="text/css" href="styles/index.css">
	<link rel="stylesheet" type="text/css" href="styles/nav.css">
	<link rel="stylesheet" type="text/css" href="styles/signup.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="icon" type="image/jpg" href="views/img/rent_car.jpg">
</head>
<body>
	<?php require 'views/nav.php'; ?>
	<?php require 'controller/driverCtrl.php';

	$driverCtrl = new DriverCtrl(); // classe qu'on trouve dans driverCtrl.php

	$driverCtrl->signupForm(); // méthode pour afficher le formulaire d'inscription, l'ajout du conducteur dans la base de données et la redirection vers la page membre

	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="views/js/nav.js"></script>
</body>
</html>
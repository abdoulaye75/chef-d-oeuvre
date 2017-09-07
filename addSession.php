<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Réserver une séance </title>
	<link rel="stylesheet" type="text/css" href="styles/index.css">
	<link rel="stylesheet" type="text/css" href="styles/nav.css">
	<link rel="stylesheet" type="text/css" href="styles/reservations.css">
	<link rel="stylesheet" type="text/css" href="styles/signup.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="icon" type="image/jpg" href="views/img/rent_car.jpg">
</head>
<body>
	<?php require 'views/nav.php'; ?>
	<?php require 'controller/sessionCtrl.php';
	if (isset($_SESSION['login'], $_SESSION['password'])) {
		$addSession = new SessionCtrl(); // classe du contrôleur dans sessionCtrl.php
		$addSession->addSession($date, $timeStart, $timeEnd); // méthode pour traiter le formulaire et l'ajout dans la base de données
		$addSession->formCreateSession(); // méthode qui affiche le formulaire de réservation de séance de conduite
		echo '<a href="reservations.php" class="back"> Retour aux tableaux des réservations et séances </a>';
	} else {
		header('Location: loginDriver.php');
	}

	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="views/js/nav.js"></script>
	<script src="views/js/form.js"></script>
</body>
</html>
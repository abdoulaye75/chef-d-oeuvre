<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Modifier la location </title>
	<link rel="stylesheet" type="text/css" href="styles/index.css">
	<link rel="stylesheet" type="text/css" href="styles/nav.css">
	<link rel="stylesheet" type="text/css" href="styles/signup.css">
	<link rel="stylesheet" type="text/css" href="styles/reservations.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="icon" type="image/jpg" href="views/img/rent_car.jpg">
</head>
<body>
	<?php require 'views/nav.php'; ?>
	<?php require 'controller/reservationCtrl.php';
	if (isset($_SESSION['login'], $_SESSION['password'])) {
		$reservations = new ReservationCtrl(); // classe qu'on retrouve dans reservationCtrl.php
		$reservations->changeReservation($id, $date, $timeRent, $dateBack, $timeBack); // méthode pour modifier une location (date, heure)
		$reservations->listOneReservation(); // méthode pour afficher le formulaire de modification d'une location donnée
		echo '<a href="reservations.php"> Retour aux tableaux des réservations et des séances </a>';
	} else {
		header('Location: loginDriver.php');
	}

	?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="views/js/nav.js"></script>
	<script src="views/js/form.js"></script>
</body>
</html>
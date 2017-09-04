<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Mes séances </title>
	<link rel="stylesheet" type="text/css" href="styles/index.css">
	<link rel="stylesheet" type="text/css" href="styles/nav.css">
	<link rel="stylesheet" type="text/css" href="styles/reservations.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="icon" type="image/jpg" href="views/img/rent_car.jpg">
</head>
<body>
	<?php require 'views/nav.php'; ?>
	<?php require 'controller/sessionCtrl.php'; ?>
	<?php session_start();
	 if (isset($_SESSION['loginAccompagnist'], $_SESSION['passwordAccompagnist'])) {
		// message de bienvenue à l'accompagnateur après connexion
		echo '<div class="alert successful"><span class="btnclose">&times;</span><strong> Bienvenue, '.$_SESSION['loginAccompagnist'].' !</strong></div>';

		$sessions = new SessionCtrl(); // classe qu'on retrouve dans sessionCtrl.php
		$sessions->changeSessionStatus($id); // méthode pour changer le statut de la séance (acceptée ou pas encore) dans la base de données
		$sessions->showTableSessions(); // tableau des séances
	} else {
		header('Location: loginAccompanist.php');
	}

	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="views/js/nav.js"></script>
	<script src="views/js/form.js"></script>
</body>
</html>
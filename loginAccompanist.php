<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Se connecter </title>
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
	<?php require 'controller/monitorCtrl.php';

	$monitorCtrl = new AccompagnistCtrl(); // classe du contrôleur dans monitorCtrl.php

	$monitorCtrl->verifyMonitor($login, $password); // vérification de la concordance des identifiants de connexion
	$monitorCtrl->monitorSigninForm(); // méthode pour afficher le formulaire de connexion pour l'accompagnateur

	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="views/js/nav.js"></script>
	<script src="views/js/form.js"></script>
</body>
</html>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Paramètres du compte </title>
	<link rel="stylesheet" type="text/css" href="styles/index.css">
	<link rel="stylesheet" type="text/css" href="styles/nav.css">
	<link rel="stylesheet" type="text/css" href="styles/signup.css">
	<link rel="stylesheet" type="text/css" href="styles/settings.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="icon" type="image/jpg" href="views/img/rent_car.jpg">
</head>
<body>
	<?php require 'views/nav.php'; ?>
	<?php require 'controller/settingsCtrl.php'; ?>
	<?php
		// si le conducteur est connecté, on affiche le formulaire pré-rempli pour modifier ses identifiants de connexion et le bouton pour supprimer son compte
		if (isset($_SESSION['login'], $_SESSION['password'])) {
			$settings = new SettingsCtrl();
			$settings->updateSettings($id, $mail, $login, $password);
			$settings->listOneDriver();
			$settings->deleteAccount();
		} // même chose pour l'accompagnateur
		elseif (isset($_SESSION['loginAccompagnist'], $_SESSION['passwordAccompagnist'])) {
			$settingsAccompagnist = new SettingsCtrl();
			$settingsAccompagnist->updateSettingsAccompagnist($id, $mail, $login, $password);
			$settingsAccompagnist->listOneAccompagnist();
			$settingsAccompagnist->deleteAccountAccompagnist();
		}
	?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="views/js/nav.js"></script>
	<script src="views/js/form.js"></script>
	<script src="views/js/settings.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Se connecter en tant qu'administrateur </title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/jpg" href="../views/img/rent_car.jpg">
</head>
<body>
	<?php require 'navAdmin.php'; ?>
	<?php require 'adminCtrl.php';
		$admin = new AdminCtrl(); // classe qu'on trouve dans adminCtrl.php
		$admin->verifyAdmin($login, $password); // méthode pour vérifier la concordance des identifiants de connexion. S'ils correspondent, redirection vers la page membre. Sinon un message d'erreur s'affiche
		$admin->signInForm(); // méthode pour afficher le formulaire de connexion
	?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
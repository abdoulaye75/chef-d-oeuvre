<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Modifier mes identifiants </title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/jpg" href="../views/img/rent_car.jpg">
</head>
<body>
	<?php require 'navAdmin.php'; ?>
	<?php require 'adminCtrl.php';
		if (isset($_SESSION['login'], $_SESSION['password'])) {
			$admin = new AdminCtrl(); // classe du contrôleur adminctrl.php
			$admin->updateOneAdmin($id, $login, $password); // méthode pour modifier les identifiants de connexion. Message de confirmation de modification
			$admin->getOneAdmin(); // méthode pour afficher le formulaire de modification pré-rempli des identifiants de connexion de l'administrateur
		} else {
			header('Location: index.php');
		}
		
	?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
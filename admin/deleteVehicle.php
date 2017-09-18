<?php

require 'adminCtrl.php';

if (isset($_SESSION['login'], $_SESSION['password'])) {
	$logout = new AdminCtrl(); // classe du contrôleur adminctrl.php
	$logout->deleteVehicle($id); // méthode pour supprimer un véhicule de la liste (et donc de la base de données)
} else {
	header('Location: index.php');
}


?>
<?php

require 'controller/driverCtrl.php';

$logout = new DriverCtrl(); // classe du contrôleur dans driverCtrl.php
$logout->logout(); // méthode pour la déconnexion qui détruit la session et redirige l'utilisateur vers la page d'accueil

?>
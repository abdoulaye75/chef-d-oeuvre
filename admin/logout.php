<?php

require 'adminCtrl.php';

$logout = new AdminCtrl(); // classe du contrôleur adminctrl.php
$logout->logoutAdmin(); // méthode pour la déconnexion

?>
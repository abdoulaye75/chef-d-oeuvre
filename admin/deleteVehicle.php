<?php

require 'adminCtrl.php';

$logout = new AdminCtrl(); // classe du contrôleur adminctrl.php
$logout->deleteVehicle($id); // méthode pour supprimer un véhicule de la liste (et donc de la base de données)

?>
<?php

require 'controller/sessionCtrl.php';

$delete = new SessionCtrl(); // classe du contrôleur dans sessionCtrl.php
$delete->deleteSession($id); // méthode pour annuler une réservation de séance

?>
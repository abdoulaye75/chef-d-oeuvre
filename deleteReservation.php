<?php

require 'controller/reservationCtrl.php';

$delete = new ReservationCtrl(); // classe du contrôleur dans reservationCtrl.php
$delete->deleteReservation($id); // méthode pour annuler une réservation de location

?>
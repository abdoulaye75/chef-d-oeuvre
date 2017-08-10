<?php

require 'controller/reservationCtrl.php';

$delete = new ReservationCtrl();
$delete->deleteReservation($id);

?>
<?php

require 'adminCtrl.php';

$logout = new AdminCtrl();
$logout->deleteVehicle($id);

?>
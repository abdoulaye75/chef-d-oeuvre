<?php

require 'controller/sessionCtrl.php';

$delete = new SessionCtrl();
$delete->deleteSession($id);

?>
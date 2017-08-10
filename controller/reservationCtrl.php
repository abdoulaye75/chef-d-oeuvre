<?php

require 'model/reservationModel.php';
require 'views/reservationView.php';

class ReservationCtrl
{
	private $reservationModel;
	private $reservationView;

	public function __construct()
	{
		$this->reservationModel = new ReservationModel();
		$this->reservationView = new ReservationView();
	}

	public function formAddReservation() {
		$vehicle = $this->reservationModel->getVehicles();
		$this->reservationView->displayFormReservation($vehicle);
	}

	public function addReservation($date, $timeRent, $dateBack, $timeBack, $vehicle) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['date'], $_POST['timeRent'], $_POST['dateBack'], $_POST['timeBack'], $_POST['vehicle'])) {
				$date = htmlspecialchars($_POST['date']);
				$timeRent = htmlspecialchars($_POST['timeRent']);
				$dateBack = htmlspecialchars($_POST['dateBack']);
				$timeBack = htmlspecialchars($_POST['timeBack']);
				$vehicle = htmlspecialchars($_POST['vehicle']);

				$this->reservationModel->createReservation($date, $timeRent, $dateBack, $timeBack, $vehicle);
				$this->reservationView->confirmAdd();
			}
		}
	}
}

?>
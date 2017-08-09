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
		$this->reservationView->displayFormReservation();
	}

	public function addReservation($date, $timeRent, $dateBack, $timeBack) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['date'], $_POST['timeRent'], $_POST['dateBack'], $_POST['timeBack'])) {
				$date = htmlspecialchars($_POST['date']);
				$timeRent = htmlspecialchars($_POST['timeRent']);
				$dateBack = htmlspecialchars($_POST['dateBack']);
				$timeBack = htmlspecialchars($_POST['timeBack']);

				$this->reservationModel->createReservation($date, $timeRent, $dateBack, $timeBack);
				$this->reservationView->confirmAdd();
			}
		}
	}
}

?>
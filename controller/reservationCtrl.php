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

	public function addReservation($date, $timeRent, $dateBack, $timeBack) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['date'], $_POST['timeRent'], $_POST['dateBack'], $_POST['timeBack'])) {
				$date = htmlspecialchars($_POST['date']);
				$timeRent = htmlspecialchars($_POST['timeRent']);
				$dateBack = htmlspecialchars($_POST['dateBack']);
				$timeBack = htmlspecialchars($_POST['timeBack']);
				//$vehicle = htmlspecialchars($_POST['vehicle']);

				$this->reservationModel->createReservation($date, $timeRent, $dateBack, $timeBack);
				$this->reservationView->confirmAdd();
			}
		}
	}

	public function listOneReservation() {
		if (isset($_GET['id'])) {
			$id = $this->reservationModel->getIdReservation();
			$this->reservationView->displayFormUpdate($id);
		}
	}

	public function changeReservation($id, $date, $timeRent, $dateBack, $timeBack) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['id'], $_POST['date'], $_POST['timeRent'], $_POST['dateBack'], $_POST['timeBack'])) {
				$id = htmlspecialchars($_POST['id']);
				$date = htmlspecialchars($_POST['date']);
				$timeRent = htmlspecialchars($_POST['timeRent']);
				$dateBack = htmlspecialchars($_POST['dateBack']);
				$timeBack = htmlspecialchars($_POST['timeBack']);

				$this->reservationModel->updateReservation($id, $date, $timeRent, $dateBack, $timeBack);
				$this->reservationView->confirmUpdate();
			}
		}
	}

	public function deleteReservation($id) {
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$this->reservationModel->removeReservation($id);
			header('Location: reservations.php');
		}
	}
}

?>
<?php

require 'model/reservationModel.php';
require 'views/reservationView.php';

class ReservationCtrl
{
	private $reservationModel;
	private $reservationView;

	public function __construct()
	{
		$this->reservationModel = new ReservationModel(); // classe du modèle
		$this->reservationView = new ReservationView(); // classe de la vue
	}

	// formulaire pour réserver (nouvelle réservation)
	public function formAddReservation() {
		$vehicle = $this->reservationModel->getVehicles(); // requête sql pour sélectionner tous les véhicules
		$this->reservationView->displayFormReservation($vehicle); // tableau qui liste tous les véhicules
	}

	// ajout de la location en base de données et traitement du formulaire d'ajout
	public function addReservation($date, $timeRent, $dateBack, $timeBack) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['date'], $_POST['timeRent'], $_POST['dateBack'], $_POST['timeBack'])) {
				$date = htmlspecialchars($_POST['date']);
				$timeRent = htmlspecialchars($_POST['timeRent']);
				$dateBack = htmlspecialchars($_POST['dateBack']);
				$timeBack = htmlspecialchars($_POST['timeBack']);
				//$vehicle = htmlspecialchars($_POST['vehicle']);

				if (!empty($date) && !empty($timeRent) && !empty($timeBack)) {
					$this->reservationModel->createReservation($date, $timeRent, $dateBack, $timeBack);
					$this->reservationView->confirmAdd();
				} else {
					$this->reservationView->emptyForm();
				}
				
			}
		}
	}

	// reprend les informations d'une location. C'est cette méthode qui pré-remplit le formulaire de modification d'une location
	public function listOneReservation() {
		if (isset($_GET['id'])) {
			$id = htmlspecialchars($_GET['id']); // valeur du paramètre id en URL. C'est l'id de la réservation en base de données
			$id = $this->reservationModel->getIdReservation($id);
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

				if (!empty($id) && !empty($date) && !empty($timeRent) && !empty($dateBack) && !empty($timeBack)) {
					$this->reservationModel->updateReservation($id, $date, $timeRent, $dateBack, $timeBack);
					$this->reservationView->confirmUpdate();
				} else {
					$this->reservationView->emptyForm();
				}
				
			}
		}
	}

	public function deleteReservation($id) {
		if (isset($_GET['id'])) {
			$id = htmlspecialchars($_GET['id']); // valeur du paramètre id en URL. C'est l'id de la réservation en base de données
			$this->reservationModel->removeReservation($id);
			header('Location: reservations.php');
		}
	}
}

?>
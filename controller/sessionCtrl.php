<?php

require 'model/sessionModel.php';
require 'views/sessionView.php';

class SessionCtrl
{
	private $sessionModel;
	private $sessionView;

	public function __construct()
	{
		$this->sessionModel = new SessionModel(); // classe du modèle
		$this->sessionView = new SessionView(); // classe de la vue
	}

	// méthode pour afficher le tableau des sessions
	public function showTableSessions() {
		$eachSession = $this->sessionModel->listSessions();
		$this->sessionView->displayTableSessions($eachSession);
	}

	// affiche le bouton Réserver une séance de conduite
	public function displayButtonAddSession() {
		$this->sessionView->displayButtonAdd();
	}

	// affiche le bouton Louer un véhicule
	public function displayButtonAddRent() {
		$this->sessionView->displayButtonAddRent();
	}

	// affiche le formulaire de réservation de séance
	public function formCreateSession() {
		$vehicle = $this->sessionModel->listVehicles();
		$this->sessionView->displayFormAdd($vehicle);
	}

	// ajoute la séance en base de données
	public function addSession($date, $timeStart, $timeEnd) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['date'], $_POST['timeStart'], $_POST['timeEnd'])) {
				$date = htmlspecialchars($_POST['date']);
				$timeStart = htmlspecialchars($_POST['timeStart']);
				$timeEnd = htmlspecialchars($_POST['timeEnd']);

				if (!empty($date) && !empty($timeStart) && !empty($timeEnd)) {
					$this->sessionModel->createSession($date, $timeStart, $timeEnd);
					$this->sessionView->confirmAddSession();
				} else {
					$this->sessionView->emptyForm();
				}				
			}
		}
	}

	public function listOneSession() {
		if (isset($_GET['id'])) {
			$id = htmlspecialchars($_GET['id']);
			$id = $this->sessionModel->getIdSession($id);
			$this->sessionView->displayFormUpdateSession($id);
		}
	}

	public function changeSession($id, $date, $timeStart, $timeEnd) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['id'], $_POST['date'], $_POST['timeStart'], $_POST['timeEnd'])) {
				$id = htmlspecialchars($_POST['id']);
				$date = htmlspecialchars($_POST['date']);
				$timeStart = htmlspecialchars($_POST['timeStart']);
				$timeEnd = htmlspecialchars($_POST['timeEnd']);

				if (!empty($id) && !empty($date) && !empty($timeStart) && !empty($timeEnd)) {
					$this->sessionModel->updateSession($id, $date, $timeStart, $timeEnd);
					$this->sessionView->confirmUpdateSession();
				} else {
					$this->sessionView->emptyForm();
				}
				
			}
		}
	}

	public function changeSessionStatus($id) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['id'])) {
				$id = htmlspecialchars($_POST['id']);
				$this->sessionModel->changeStatus($id);
				$this->sessionView->confirmAccept();
			}
		}
	}

	public function deleteSession($id) {
		if (isset($_GET['id'])) {
			$id = htmlspecialchars($_GET['id']);
			$this->sessionModel->removeSession($id);
			header('Location: reservations.php');
		}
	}
}

?>
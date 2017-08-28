<?php

require 'model/sessionModel.php';
require 'views/sessionView.php';

class SessionCtrl
{
	private $sessionModel;
	private $sessionView;

	public function __construct()
	{
		$this->sessionModel = new SessionModel();
		$this->sessionView = new SessionView();
	}

	public function showTableSessions() {
		$eachSession = $this->sessionModel->listSessions();
		$this->sessionView->displayTableSessions($eachSession);
	}

	public function displayButtonAddSession() {
		$this->sessionView->displayButtonAdd();
	}

	public function displayButtonAddRent() {
		$this->sessionView->displayButtonAddRent();
	}

	public function formCreateSession() {
		$vehicle = $this->sessionModel->listVehicles();
		$this->sessionView->displayFormAdd($vehicle);
	}

	public function addSession($date, $timeStart, $timeEnd) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['date'], $_POST['timeStart'], $_POST['timeStart'])) {
				$date = htmlspecialchars($_POST['date']);
				$timeStart = htmlspecialchars($_POST['timeStart']);
				$timeEnd = htmlspecialchars($_POST['timeEnd']);

				$this->sessionModel->createSession($date, $timeStart, $timeEnd);
				$this->sessionView->confirmAddSession();
			}
		}
	}

	public function listOneSession() {
		if (isset($_GET['id'])) {
			$id = $this->sessionModel->getIdSession();
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

				$this->sessionModel->updateSession($id, $date, $timeStart, $timeEnd);
				$this->sessionView->confirmUpdateSession();
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
			$id = $_GET['id'];
			$this->sessionModel->removeSession($id);
			header('Location: reservations.php');
		}
	}
}

?>
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

	public function tableSessions() {
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
		$this->sessionView->displayFormAdd();
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
}

?>
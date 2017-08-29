<?php

require 'model/driverModel.php';
require 'views/driverView.php';

class DriverCtrl
{
	
	private $driverModel;
	private $driverView;

	public function __construct()
	{
		$this->driverModel = new DriverModel();
		$this->driverView = new Driver();
	}

	public function signupForm()
	{
		$this->driverView->displaySignupForm();
		if (isset($_POST['submit'])) {
			if (isset($_POST['lastname'], $_POST['firstname'], $_POST['login'], $_POST['password'])) {
				$name = htmlspecialchars($_POST['lastname']);
				$firstname = htmlspecialchars($_POST['firstname']);
				$login = htmlspecialchars($_POST['login']);
				$password = $_POST['password'];

				session_start();
				$_SESSION['login'] = $login;
				$_SESSION['password'] = $password;
				$this->driverModel->subscribeDriver($name, $firstname, $login, $password);
				header('Location: reservations.php');
			}
		}
	}

	public function signinForm() {
		$this->driverView->displayLoginForm();
	}

	public function verifyUser($login, $password) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['login'], $_POST['password'])) {
				$login = htmlspecialchars($_POST['login']);
				$password = $_POST['password'];
				$drivers = $this->driverModel->connectDriver($login, $password);
				$noConnect = $this->driverView->noConnect();

				foreach ($drivers as $driver) {
					if ($login !== $driver['login'] || $password !== $driver['password']) {
						$noConnect;
						header('Location: loginDriver.php');
					} else {
						session_start();
						$_SESSION['login'] = $login;
						$_SESSION['password'] = $password;
						header('Location: reservations.php');
					}
					
				}
			}
		}
	}

	public function tableReservations() {
		$eachReservation = $this->driverModel->listReservations();
		$this->driverView->displayTableReservations($eachReservation);
	}

	public function tableSessions() {
		$eachSession = $this->driverModel->listAllSessions();
		$this->driverView->displayTableSessions($eachSession);
	}

	public function logout() {
		session_start();

		$_SESSION = array();

		session_destroy();

		header("Location: index.php"); // on redirige l'utilisateur vers la page d'accueil
	}
}

?>
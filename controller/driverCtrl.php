<?php

require 'model/driverModel.php';
require 'views/driverView.php';

class DriverCtrl
{
	
	private $driverModel;
	private $driverView;

	public function __construct()
	{
		$this->driverModel = new DriverModel(); // classe du modèle
		$this->driverView = new DriverView(); // classe de la vue
	}

	// formulaire d'inscription pour le conducteur. Contrôle de saisie côté serveur. Message d'erreur en cas d'erreur de saisie ou de champ vide
	public function signupForm()
	{
		if (isset($_POST['submit'])) {
			if (isset($_POST['lastname'], $_POST['firstname'], $_POST['login'], $_POST['password'])) {
				$name = htmlspecialchars($_POST['lastname']);
				$firstname = htmlspecialchars($_POST['firstname']);
				$login = htmlspecialchars($_POST['login']);
				$password = sha1($_POST['password']);

				if (!empty($name) && !empty($firstname) && !empty($login) && !empty($password)) {
					session_start();
					$_SESSION['login'] = $login;
					$_SESSION['password'] = $password;
					$this->driverModel->subscribeDriver($name, $firstname, $login, $password);
					header('Location: reservations.php');
				} else {
					$this->driverView->emptyForm();
				}
			}
		}
		$this->driverView->displaySignupForm();
	}

	// affiche le formulaire de connexion pour le conducteur
	public function signinForm() {
		$this->driverView->displayLoginForm();
	}

	// formulaire de connexion pour le conducteur. Contrôle de saisie côté serveur. Message d'erreur en cas d'erreur de saisie ou de champ vide
	public function verifyUser($login, $password) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['login'], $_POST['password'])) {
				$login = htmlspecialchars($_POST['login']);
				$password = sha1($_POST['password']);
				$drivers = $this->driverModel->connectDriver($login, $password);
				$noConnect = $this->driverView->noConnect();

				if (!empty($login) && !empty($password)) {
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
				} else {
					$this->driverView->emptyForm();
				}
			}
		}
	}

	// méthode pour lister les locations dans un tableau
	public function tableReservations() {
		$eachReservation = $this->driverModel->listReservations(); // les données en SQL
		$this->driverView->displayTableReservations($eachReservation); // le tableau
	}

	// même chose ici mais pour les séances
	public function tableSessions() {
		$eachSession = $this->driverModel->listAllSessions();
		$this->driverView->displayTableSessions($eachSession);
	}

	// gère la déconnexion
	public function logout() {
		session_start();

		$_SESSION = array();

		session_destroy();

		header("Location: index.php"); // on redirige le conducteur vers la page d'accueil
	}
}

?>
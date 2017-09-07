<?php

require 'model/monitorModel.php';
require 'views/monitorView.php';

class AccompagnistCtrl
{
	private $monitorModel;
	private $monitorView;

	public function __construct()
	{
		$this->monitorModel = new AccompagnistModel(); // classe du modèle pour l'accompagnateur
		$this->monitorView = new AccompagnistView(); // classe de la vue pour l'accompagnateur
	}

	// formulaire d'inscription pour l'accompagnateur. Contrôle de saisie côté serveur. Message d'erreur en cas d'erreur de saisie ou de champ vide
	public function monitorSignupForm()
	{
		if (isset($_POST['submit'])) {
			if (isset($_POST['lastname'], $_POST['firstname'], $_POST['login'], $_POST['password'])) {
				$name = htmlspecialchars($_POST['lastname']);
				$firstname = htmlspecialchars($_POST['firstname']);
				$login = htmlspecialchars($_POST['login']);
				$password = sha1($_POST['password']);

				if (!empty($name) && !empty($firstname) && !empty($login) && !empty($password)) {
					session_start();
					$_SESSION['loginAccompagnist'] = $login;
					$_SESSION['passwordAccompagnist'] = $password;
					$this->monitorModel->subscribeAccompagnist($name, $firstname, $login, $password);
					header('Location: sessions.php');
				} else {
					$this->monitorView->emptyForm();
				}
				
			}
		}
		$this->monitorView->displaySignupForm();
	}

	// affiche le formulaire de connexion pour l'accompagnateur
	public function monitorSigninForm() {
		$this->monitorView->displayLoginForm();
	}

	// formulaire de connexion pour l'accompagnateur. Contrôle de saisie côté serveur. Message d'erreur en cas d'erreur de saisie ou de champ vide
	public function verifyMonitor($login, $password) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['login'], $_POST['password'])) {
				$login = htmlspecialchars($_POST['login']);
				$password = sha1($_POST['password']);
				$monitors = $this->monitorModel->connectAccompagnist($login, $password);
				$noConnect = $this->monitorView->noConnect();

				if (!empty($login) && !empty($password)) {
					foreach ($monitors as $monitor) {
						if ($login !== $monitor['login'] || $password !== $monitor['password']) {
							$noConnect;
							header('Location: loginAccompanist.php');
						} else {
							session_start();
							$_SESSION['loginAccompagnist'] = $login;
							$_SESSION['passwordAccompagnist'] = $password;
							header('Location: sessions.php');
						}
					}
				} else {
					$this->monitorView->emptyForm();
				}
				
			}
		}
	}

	// gère la déconnexion
	public function logout() {
		session_start();

		$_SESSION = array();

		session_destroy();

		header("Location: index.php"); // on redirige l'accompagnateur vers la page d'accueil
	}
}

?>
<?php

require 'model/monitorModel.php';
require 'views/monitorView.php';

class AccompagnistCtrl
{
	private $monitorModel;
	private $monitorView;

	public function __construct()
	{
		$this->monitorModel = new AccompagnistModel();
		$this->monitorView = new AccompagnistView();
	}

	public function monitorSignupForm()
	{
		$this->monitorView->displaySignupForm();
		if (isset($_POST['submit'])) {
			if (isset($_POST['lastname'], $_POST['firstname'], $_POST['mail'], $_POST['login'], $_POST['password'])) {
				$name = htmlspecialchars($_POST['lastname']);
				$firstname = htmlspecialchars($_POST['firstname']);
				$mail = htmlspecialchars($_POST['mail']);
				$login = htmlspecialchars($_POST['login']);
				$password = $_POST['password'];

				session_start();
				$_SESSION['loginAccompagnist'] = $login;
				$_SESSION['passwordAccompagnist'] = $password;
				$this->monitorModel->subscribeAccompagnist($name, $firstname, $mail, $login, $password);
				header('Location: sessions.php');
			}
		}
	}

	public function monitorSigninForm() {
		$this->monitorView->displayLoginForm();
	}

	public function verifyMonitor($login, $password) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['login'], $_POST['password'])) {
				$login = htmlspecialchars($_POST['login']);
				$password = $_POST['password'];
				$monitors = $this->monitorModel->connectAccompagnist($login, $password);
				$noConnect = $this->monitorView->noConnect();

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
			}
		}
	}

	public function logout() {
		session_start();

		$_SESSION = array();

		session_destroy();

		header("Location: index.php"); // on redirige l'utilisateur vers la page d'accueil
	}
}

?>
<?php

require 'model/settingsModel.php';
require 'views/settingsView.php';

class SettingsCtrl
{
	private $settingsModel;
	private $settingsView;

	public function __construct()
	{
		$this->settingsModel = new SettingsModel(); // classe du modèle
		$this->settingsView = new SettingsView(); // classe de la vue
	}

	// reprend les informations du conducteur connecté et pré-remplit le formulaire
	public function listOneDriver() {
		if (isset($_GET['login'])) {
			$result = $this->settingsModel->getIdDriver();
			$this->settingsView->displayFormUpdateSettings($result);
		}
	}

	// méthode qui modifie les identifiants de connexion
	public function updateSettings($id, $login, $password) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['id'], $_POST['login'], $_POST['password'])) {
				$id = htmlspecialchars($_POST['id']);
				$login = htmlspecialchars($_POST['login']);
				$password = sha1($_POST['password']);

				if (!empty($id) && !empty($login) && !empty($password)) {
					$this->settingsModel->updateIdentifiersDrivers($id, $login, $password);
					$this->settingsView->confirmUpdateSettings();
				} else {
					$this->settingsView->emptyForm();
				}
				
			}
		}
	}

	// méthode qui supprime le compte du conducteur
	public function deleteAccount() {
		$this->settingsView->displayButtonUnsubscribe();
		if (isset($_GET['login'])) {
			if (isset($_POST['unsubscribe'])) {
				$login = $_GET['login'];
				$this->settingsModel->removeDriver($login);
				$_SESSION = array();
    			session_destroy();
    			header("Location: index.php");
			}
		}
	}

	// reprend les identifiants de connexion de l'accompagnateur
	public function listOneAccompagnist() {
		if (isset($_GET['login'])) {
			$result = $this->settingsModel->getIdAccompagnist();
			$this->settingsView->displayFormUpdateSettings($result);
		}
	}

	// méthode qui modifie les identifiants de connexion de l'accompagnateur
	public function updateSettingsAccompagnist($id, $login, $password) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['id'], $_POST['login'], $_POST['password'])) {
				$id = htmlspecialchars($_POST['id']);
				$login = htmlspecialchars($_POST['login']);
				$password = sha1($_POST['password']);

				if (!empty($id) && !empty($login) && !empty($password)) {
					$this->settingsModel->updateIdentifiersAccompagnists($id, $login, $password);
					$this->settingsView->confirmUpdateSettings();
				} else {
					$this->settingsView->emptyForm();
				}
				
			}
		}
	}

	// méthode qui supprime le compte de l'accompagnateur
	public function deleteAccountAccompagnist() {
		$this->settingsView->displayButtonUnsubscribe();
		if (isset($_GET['login'])) {
			if (isset($_POST['unsubscribe'])) {
				$login = $_GET['login'];
				$this->settingsModel->removeAccompagnist($login);
				$_SESSION = array();
    			session_destroy();
    			header("Location: index.php");
			}
		}
	}
}

?>
<?php

require 'model/settingsModel.php';
require 'views/settingsView.php';

class SettingsCtrl
{
	private $settingsModel;
	private $settingsView;

	public function __construct()
	{
		$this->settingsModel = new SettingsModel();
		$this->settingsView = new SettingsView();
	}

	public function listOneDriver() {
		if (isset($_GET['login'])) {
			$result = $this->settingsModel->getIdDriver();
			$this->settingsView->displayFormUpdateSettings($result);
		}
	}

	public function updateSettings($id, $mail, $login, $password) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['id'], $_POST['mail'], $_POST['login'], $_POST['password'])) {
				$id = htmlspecialchars($_POST['id']);
				$mail = htmlspecialchars($_POST['mail']);
				$login = htmlspecialchars($_POST['login']);
				$password = $_POST['password'];

				$this->settingsModel->updateIdentifiersDrivers($id, $mail, $login, $password);
				$this->settingsView->confirmUpdateSettings();
			}
		}
	}

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



	public function listOneAccompagnist() {
		if (isset($_GET['login'])) {
			$result = $this->settingsModel->getIdAccompagnist();
			$this->settingsView->displayFormUpdateSettings($result);
		}
	}

	public function updateSettingsAccompagnist($id, $mail, $login, $password) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['id'], $_POST['mail'], $_POST['login'], $_POST['password'])) {
				$id = htmlspecialchars($_POST['id']);
				$mail = htmlspecialchars($_POST['mail']);
				$login = htmlspecialchars($_POST['login']);
				$password = $_POST['password'];

				$this->settingsModel->updateIdentifiersAccompagnists($id, $mail, $login, $password);
				$this->settingsView->confirmUpdateSettings();
			}
		}
	}

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
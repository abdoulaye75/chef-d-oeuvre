<?php

require 'adminModel.php';
require 'adminView.php';

class AdminCtrl
{
	private $adminModel;
	private $adminView;

	public function __construct()
	{
		$this->adminModel = new AdminModel();
		$this->adminView = new AdminView();
	}

	public function verifyAdmin($login, $password) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['login'], $_POST['password'])) {
				$login = htmlspecialchars($_POST['login']);
				$password = $_POST['password'];
				$admins = $this->adminModel->getAdmin($login, $password);
				$noConnect = $this->adminView->noConnect();

				foreach ($admins as $admin) {
					if ($login !== $admin['login'] || $password !== $admin['password']) {
						$noConnect;
						header('Location: index.php');
					} else {
						session_start();
						$_SESSION['login'] = $login;
						$_SESSION['password'] = $password;
						header('Location: tableVehicles.php');
					}
					
				}
			}
		}
	}

	public function signInForm() {
		$this->adminView->displayFormConnect();
	}

	public function listVehicles() {
		$vehicle = $this->adminModel->getVehicles();
		$this->adminView->displayTableVehicles($vehicle);
	}

	public function listOneVehicle() {
		if (isset($_GET['id'])) {
			$vehicle = $this->adminModel->getIdVehicle();
			$this->adminView->displayFormUpdate($vehicle);
		}
	}

	public function formAddVehicle() {
		$this->adminView->displayFormAdd();
	}

	public function addVehicle($brand, $model, $type, $description, $numberPlaces, $year, $image) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['brand'], $_POST['model'], $_POST['type'], $_POST['description'], $_POST['numberPlaces'], $_POST['year'], $_FILES['image']) && !empty($_FILES['image']['name'])) {
				$brand = htmlspecialchars($_POST['brand']);
				$model = htmlspecialchars($_POST['model']);
				$type = htmlspecialchars($_POST['type']);
				$description = htmlspecialchars($_POST['description']);
				$numberPlaces = htmlspecialchars($_POST['numberPlaces']);
				$year = htmlspecialchars($_POST['year']);
				$image = $_FILES['image']['name'];

				$tailleMax = 2000000;
  				$extensionsValides = array('jpg', 'jpeg', 'gif', 'png');

  			if ($_FILES['image']['size'] <= $tailleMax) {
	    		$extensionUpload = strtolower(substr(strrchr($image, '.'), 1));


		    	if (in_array($extensionUpload, $extensionsValides)) {
				      $chemin = "../views/pictures_vehicles/".$_FILES['image']['name'];
				      move_uploaded_file($_FILES['image']['tmp_name'], $chemin);
			    }

				$this->adminModel->createVehicle($brand, $model, $type, $description, $numberPlaces, $year, $image);
				$this->adminView->confirmAdd();
			}
		}
	}
}

	public function updateOneVehicle($id, $brand, $model, $type, $description, $numberPlaces, $year) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['id'], $_POST['brand'], $_POST['model'], $_POST['type'], $_POST['description'], $_POST['numberPlaces'], $_POST['year'])) {
				$id = htmlspecialchars($_POST['id']);
				$brand = htmlspecialchars($_POST['brand']);
				$model = htmlspecialchars($_POST['model']);
				$type = htmlspecialchars($_POST['type']);
				$description = htmlspecialchars($_POST['description']);
				$numberPlaces = htmlspecialchars($_POST['numberPlaces']);
				$year = htmlspecialchars($_POST['year']);

				$this->adminModel->updateVehicle($id, $brand, $model, $type, $description, $numberPlaces, $year);
				$this->adminView->confirmUpdate();
			}
		}
	}

	public function deleteVehicle($id) {
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$this->adminModel->removeVehicle($id);
			header('Location: tableVehicles.php');
		}
	}

	public function logoutAdmin() {
		session_start();

		$_SESSION = array();

		session_destroy();

		header("Location: index.php"); // on redirige l'utilisateur vers la page d'accueil
	}

	public function getOneAdmin() {
		if (isset($_GET['login'])) {
			$admin = $this->adminModel->getIdAdmin();
			$this->adminView->displayFormUpdateLogins($admin);
		}
	}

	public function updateOneAdmin($id, $login, $password) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['id'], $_POST['login'], $_POST['password'])) {
				$id = htmlspecialchars($_POST['id']);
				$login = htmlspecialchars($_POST['login']);
				$password = htmlspecialchars($_POST['password']);

				$this->adminModel->updateLogins($id, $login, $password);
				$this->adminView->confirmUpdateLogins();
			}
		}
	}
}

?>
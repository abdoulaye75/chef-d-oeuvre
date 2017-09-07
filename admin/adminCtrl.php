<?php

require 'adminModel.php';
require 'adminView.php';

class AdminCtrl
{
	private $adminModel;
	private $adminView;

	public function __construct()
	{
		$this->adminModel = new AdminModel(); // classe du modèle
		$this->adminView = new AdminView(); // classe de la vue
	}

	/* méthode qui vérifie la correspondance identifiant et mot de passe et que tous les champs soient remplis. Sinon il affiche un message d'erreur.
	S'il y a correspondance, redirection vers la page administration */
	public function verifyAdmin($login, $password) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['login'], $_POST['password']) && !empty($_POST['login']) && !empty($_POST['password'])) {
				$login = htmlspecialchars($_POST['login']);
				$password = sha1($_POST['password']);
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
			} else {
				$this->adminView->emptyInputs();
			}
		}
	}

	// affiche le formulaire de connexion de l'administrateur
	public function signInForm() {
		$this->adminView->displayFormConnect();
	}

	// liste tous les véhicules
	public function listVehicles() {
		$vehicle = $this->adminModel->getVehicles();
		$this->adminView->displayTableVehicles($vehicle);
	}

	// affiche le véhicule sélectionné par l'administrateur dans la page updateVehicle.php?id=, d'où le $_GET['id']
	public function listOneVehicle() {
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$vehicle = $this->adminModel->getIdVehicle($id);
			$this->adminView->displayFormUpdate($vehicle);
		}
	}

	// affiche le formulaire d'ajout d'un nouveau véhicule
	public function formAddVehicle() {
		$this->adminView->displayFormAdd();
	}

	/*vérifie que les champs existent et qu'ils soient remplis, les sécurisent. Pour l'image on lui définit une taille maximale (2Mo), les extensions autorisées. Si la taille est respectée,  */
	public function addVehicle($brand, $model, $type, $description, $numberPlaces, $year, $image) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['brand'], $_POST['model'], $_POST['type'], $_POST['description'], $_POST['numberPlaces'], $_POST['year'], $_FILES['image']) && !empty($_POST['id']) && !empty($_POST['brand']) && !empty($_POST['model']) && !empty($_POST['type']) && !empty($_POST['description']) && !empty($_POST['numberPlaces']) && !empty($_POST['year']) && !empty($_FILES['image']['name'])) {
				$brand = htmlspecialchars($_POST['brand']);
				$model = htmlspecialchars($_POST['model']);
				$type = htmlspecialchars($_POST['type']);
				$description = htmlspecialchars($_POST['description']);
				$numberPlaces = htmlspecialchars($_POST['numberPlaces']);
				$year = htmlspecialchars($_POST['year']);
				$image = $_FILES['image']['name'];

				$tailleMax = 2000000; // la taille maximale de l'image en octets (dans cet exemple, 2000000 octets, soit 2Mo)
  				$extensionsValides = array('jpg', 'jpeg', 'gif', 'png'); // les extensions valides de l'image

	  			if ($_FILES['image']['size'] <= $tailleMax) {
		    		$extensionUpload = strtolower(substr(strrchr($image, '.'), 1)); // renvoie l'extension de fichier avec le point

		    	/* la fonction substr permet d'ignorer un caractère, en l'occurence le ., qui est le 1er caractère, d'où le 1
    			la fonction strtolower permet de mettre l'extension en minuscule, au cas où l'image aurait pour extension JPG, JPEG, GIF ou PNG */


			    	// vérifie si l'extension de l'image sélectionnée par l'utilisateur figure bien dans le tableau des extensions valides
			    	if (in_array($extensionUpload, $extensionsValides)) {
					      $chemin = "../views/pictures_vehicles/".$_FILES['image']['name']; // correspond au dossier où sera transféré l'image
					      move_uploaded_file($_FILES['image']['tmp_name'], $chemin); // correspond au dossier où sera transféré l'image
				    }

					$this->adminModel->createVehicle($brand, $model, $type, $description, $numberPlaces, $year, $image); /* si tout se passe bien, insertion dans la base de données */

					$this->adminView->confirmAdd(); // message de confirmation de l'ajout
				}
			} else {
				$this->adminView->emptyInputs(); // message d'erreur si au moins un champ est vide
			}
		}
	}

	// même chose que la méthode ci-dessus, mais pour la modification d'un véhicule
	public function updateOneVehicle($id, $brand, $model, $type, $description, $numberPlaces, $year, $image) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['id'], $_POST['brand'], $_POST['model'], $_POST['type'], $_POST['description'], $_POST['numberPlaces'], $_POST['year'], $_FILES['image']) && !empty($_POST['id']) && !empty($_POST['brand']) && !empty($_POST['model']) && !empty($_POST['type']) && !empty($_POST['description']) && !empty($_POST['numberPlaces']) && !empty($_POST['year']) && !empty($_FILES['image']['name'])) {
				$id = htmlspecialchars($_POST['id']);
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

					$this->adminModel->updateVehicle($id, $brand, $model, $type, $description, $numberPlaces, $year, $image);
					$this->adminView->confirmUpdate();
				}
			} else {
				$this->adminView->emptyInputs();
			}
		}
	}

	// supprime un véhicule sélectionné par l'administrateur dans la page deleteVehicle.php?id=, d'où le $_GET['id']. On reste en fait sur la même page
	public function deleteVehicle($id) {
		if (isset($_GET['id'])) {
			$id = $_GET['id']; // la valeur du paramètre id dans la query string est l'id du véhicule sélectionné
			$this->adminModel->removeVehicle($id); // cette variable correspond à la requête DELETE FROM vehicle WHERE id = :id en SQL
			header('Location: tableVehicles.php');
		}
	}

	// déconnecte l'administrateur, détruit la session et le redirige vers la page de connexion
	public function logoutAdmin() {
		session_start();

		$_SESSION = array();

		session_destroy();

		header("Location: index.php");
	}

	// il pré-remplit le formulaire de modification des identifiants de connexion dans la page updateLogins.php?login=, d'où le $_GET['login']
	public function getOneAdmin() {
		if (isset($_GET['login'])) {
			$login = $_GET['login']; // la valeur du paramètre login dans la query string est le login de l'administrateur
			$admin = $this->adminModel->getIdAdmin($login); // cette variable correspond à la requête SELECT login en SQL
			$this->adminView->displayFormUpdateLogins($admin);
		}
	}

	// méthode qui modifie les identifiants de connexion dans la base de données. Affiche un message de confirmation
	public function updateOneAdmin($id, $login, $password) {
		if (isset($_POST['submit'])) {
			if (isset($_POST['id'], $_POST['login'], $_POST['password']) && !empty($_POST['id']) && !empty($_POST['login']) && !empty($_POST['password'])) {
				$id = htmlspecialchars($_POST['id']);
				$login = htmlspecialchars($_POST['login']);
				$password = sha1($_POST['password']);

				$this->adminModel->updateLogins($id, $login, $password);
				$this->adminView->confirmUpdateLogins();
			} else {
				$this->adminView->emptyInputs();
			}
		}
	}
}

?>
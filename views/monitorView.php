<?php

class AccompagnistView
{
	public $name = "";
	public $firstname = "";
	public $mail = "";
	public $login = "";
	public $password = "";
	public $idSession = "";

	public function __construct()
	{
		# code...
	}

	public function displaySignupForm()
	{
		echo '<form action="" method="post">
			<h1> Accompagnateur </h1>

			<label for="lastname"> Nom: </label>
			<input type="text" name="lastname" id="lastname" required>

			<label for="firstname"> Prénom: </label>
			<input type="text" name="firstname" id="firstname" required>

			<label for="mail"> Mail: </label>
			<input type="email" name="mail" id="mail" required>

			<label for="login"> Identifiant: </label>
			<input type="text" name="login" id="login" required>

			<label for="password"> Mot de passe </label>
			<input type="password" name="password" id="password" required>

			<button type="submit" name="submit"> M\'inscrire </button>
		</form>';
	}

	public function displayLoginForm() {
		echo '<form action="" method="post">
			<h1> Accompagnateur </h1>

			<label for="login"> Identifiant: </label>
			<input type="text" name="login" id="login" required>

			<label for="password"> Mot de passe </label>
			<input type="password" name="password" id="password" required>

			<button type="submit" name="submit"> Connexion </button>
		</form>';
	}

	public function noConnect() {
		echo '<div class="alert fail"><span class="btnclose">&times;</span><strong>Utilisateur inconnu ! Vérifiez bien votre identifiant et votre mot de passe !</strong></div>';
	}
}

?>
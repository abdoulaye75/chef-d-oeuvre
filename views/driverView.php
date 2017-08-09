<?php

class Driver
{
	public $name = "";
	public $firstname = "";
	public $mail = "";
	public $login = "";
	public $password = "";
	public $idSession = "";
	public $idReservation = "";

	public function __construct()
	{
		# code...
	}

	public function displaySignupForm()
	{
		echo '<form action="" method="post">
			<h1> Jeune conducteur </h1>

			<label for="lastname"> Nom: </label>
			<input type="text" name="lastname" id="lastname" required class="form-control">

			<label for="firstname"> Prénom: </label>
			<input type="text" name="firstname" id="firstname" required class="form-control">

			<label for="mail"> Mail: </label>
			<input type="email" name="mail" id="mail" required class="form-control">

			<label for="login"> Identifiant: </label>
			<input type="text" name="login" id="login" required class="form-control">

			<label for="password"> Mot de passe </label>
			<input type="password" name="password" id="password" required class="form-control">

			<button type="submit" name="submit"> M\'inscrire </button>
		</form>';
	}

	public function displayLoginForm() {
		echo '<form action="" method="post">
			<h1> Jeune conducteur </h1>

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

	public function displayTableReservations($eachReservation) {
		echo '<table>
		<caption> <h2> Mes réservations de location </h2> </caption>
		<thead>
			<tr>
				<th> Date début </th>
				<th> Heure début </th>
				<th> Date retour </th>
				<th> Heure retour </th>
				<th> Modifier </th>
				<th> Annuler </th>
			</tr>
		</thead>
		<tbody>';
		while ($data = $eachReservation->fetch()) {
			echo '<tr>
					<td>'.$data['date_rent'].'</td>
					<td>'.$data['timeRent'].'</td>
					<td>'.$data['dateBack'].'</td>
					<td>'.$data['timeBack'].'</td>
					<td>';
					$updateReservations = array($data);
					foreach ($updateReservations as $updateReservation) {
						echo '<a href=""> Modifier </a>';
					} echo '</td>
					<td>';
					$deleteReservations = array($data);
					foreach ($deleteReservations as $deleteReservation) {
						echo '<a href=""> Annuler </a>';
					} echo '</td>
				</tr>';
		} $eachReservation->closeCursor();
		echo '</tbody>
		</table>';
	}
}

?>
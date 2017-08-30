<?php

class DriverView
{
	// formulaire d'inscription pour le conducteur
	public function displaySignupForm()
	{
		echo '<form action="" method="post">
			<h1> Jeune conducteur </h1>

			<label for="lastname"> Nom: </label>
			<input type="text" name="lastname" id="lastname" required class="form-control">

			<label for="firstname"> Prénom: </label>
			<input type="text" name="firstname" id="firstname" required class="form-control">

			<label for="login"> Identifiant: </label>
			<input type="text" name="login" id="login" required class="form-control">

			<label for="password"> Mot de passe </label>
			<input type="password" name="password" id="password" required class="form-control">

			<button type="submit" name="submit"> M\'inscrire </button>
		</form>';
	}

	// formulaire de connexion pour le conducteur
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

	// message d'erreur en cas d'erreur de saisie pour se connecter
	public function noConnect() {
		echo '<div class="alert fail"><span class="btnclose">&times;</span><strong>Utilisateur inconnu ! Vérifiez bien votre identifiant et votre mot de passe !</strong></div>';
	}

	// message d'erreur si au moins un champ est vide
	public function emptyForm() {
		echo '<div class="alert fail"><span class="btnclose">&times;</span><strong>Tous les champs sont obligatoires !</strong></div>';
	}

	// tableau pour lister les locations
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
					<td>'.$data['dateRent'].'</td>
					<td>'.$data['timeRent'].'</td>
					<td>'.$data['dateBack'].'</td>
					<td>'.$data['timeBack'].'</td>
					<td>';
					$updateReservations = array($data);
					foreach ($updateReservations as $updateReservation) {
						echo '<a href="updateRent.php?id='.$data['id'].'"> Modifier </a>';
					} echo '</td>
					<td>';
					$deleteReservations = array($data);
					foreach ($deleteReservations as $deleteReservation) {
						echo '<a href="deleteReservation.php?id='.$data['id'].'"> Annuler </a>';
					} echo '</td>
				</tr>';
		} $eachReservation->closeCursor();
		echo '</tbody>
		</table>';
	}

	// tableau qui liste les séances
	public function displayTableSessions($eachSession) {
		echo '<table>
		<caption> <h2> Mes séances de conduite </h2> </caption>
		<thead>
			<tr>
				<th> Date début </th>
				<th> Heure début </th>
				<th> Heure retour </th>
				<th> Statut </th>
				<th> Modifier </th>
				<th> Annuler </th>
			</tr>
		</thead>
		<tbody>';
		while ($data = $eachSession->fetch()) {
			echo '<tr>
					<td>'.$data['dateSession'].'</td>
					<td>'.$data['timeStart'].'</td>
					<td>'.$data['timeEnd'].'</td>
					<td>'.$data['status'].'</td>
					<td>';
					$updateSessions = array($data);
					foreach ($updateSessions as $updateSession) {
						echo '<a href="updateSession.php?id='.$data['id'].'"> Modifier </a>';
					} echo '</td>
					<td>';
					$deleteSessions = array($data);
					foreach ($deleteSessions as $deleteSession) {
						echo '<a href="deleteSession.php?id='.$data['id'].'"> Annuler </a>';
					} echo '</td>
				</tr>';
		} $eachSession->closeCursor();
		echo '</tbody>
		</table>';
	}
}

?>
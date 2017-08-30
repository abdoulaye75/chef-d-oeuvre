<?php

class SettingsView
{
	// formulaire pré-rempli des identifiants de connexion
	public function displayFormUpdateSettings($id) {
		while($data = $id->fetch()) {
		echo '<h2> Modifier mes identifiants </h2>
		<form action="settings.php?login='.$data['login'].'" method="post">
			<input type="hidden" name="id" value="'.$data['id'].'">

			<label for="login"> Identifiant : </label>
			<input type="text" name="login" id="login" value="'.$data['login'].'">

			<label for="password"> Mot de passe : </label>
			<input type="text" name="password" id="password" value="'.$data['password'].'">

			<button type="submit" name="submit"> Mettre à jour </button>
		</form>';
		} $id->closeCursor();
	}

	// message de confirmation de la modification des identifiants de connexion
	public function confirmUpdateSettings() {
		echo '<div class="alert successful"><span class="btnclose">&times;</span><strong>Vos identifiants ont bien été mis à jour !</strong></div>';
	}

	// bouton Supprimer mon compte et sa fenêtre modale
	public function displayButtonUnsubscribe() {
		echo '<div class="btnRemove"> <button id="myBtn" class="remove"> Supprimer mon compte </button> </div>
		<div class="modal" id="myModal">
			<div class="modal-content">
				<span class="closeModal">&times;</span>
				<p> Êtes-vous sûr de vouloir supprimer votre compte ? Cette opération est irréversible ! </p>
				<form action="index.php" method="post">
					<button class="delete" type="submit" name="unsubscribe" style="background-color: #f44336; color: #fff; border: 1px solid #f44336;"> Supprimer mon compte définitivement </button>
				</form>
			</div>
		</div>';
	}

	// message d'erreur si au moins un champ est vide
	public function emptyForm() {
		echo '<div class="alert fail"><span class="btnclose">&times;</span><strong>Tous les champs sont obligatoires !</strong></div>';
	}
}

?>
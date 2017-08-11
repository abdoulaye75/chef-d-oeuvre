<?php

class SettingsView
{
	public function __construct()
	{
		# code...
	}

	public function displayFormUpdateSettings($id) {
		while($data = $id->fetch()) {
		echo '<form action="" method="post">
			<caption> <h2> Modifier mes identifiants </h2> </caption>
			<input type="hidden" name="id" value="'.$data['id'].'">

			<label for="login"> Identifiant : </label>
			<input type="text" name="login" id="login" value="'.$data['login'].'">

			<label for="password"> Mot de passe : </label>
			<input type="text" name="password" id="password" value="'.$data['password'].'">

			<button type="submit" name="submit"> Mettre à jour </button>
		</form>';
		} $id->closeCursor();
	}

	public function confirmUpdateSettings() {
		echo '<div class="alert successful"><span class="btnclose">&times;</span><strong>Vos identifiants ont bien été mis à jour</strong></div>';
	}

	public function displayButtonUnsubscribe() {
		echo '<div class="btnRemove"> <button id="myBtn" class="remove"> Supprimer mon compte </button> </div>
		<div class="modal" id="myModal">
			<div class="modal-content">
				<span class="closeModal">&times;</span>
				<p> Êtes-vous sûr de vouloir supprimer votre compte ? Cette opération est irréversible ! </p>
				<form action="" method="post">
					<button class="delete" type="submit" name="unsubscribe" style="background-color: #f44336; color: #fff; border: 1px solid #f44336;"> Supprimer mon compte définitivement </button>
				</form>
			</div>
		</div>';
	}
}

?>
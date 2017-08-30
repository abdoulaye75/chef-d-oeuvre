<?php

class SessionView
{
	private $date = "";
	private $timeStart = "";
	private $timeEnd = "";

	public function __construct()
	{
		# code...
	}

	public function displayTableSessions($eachSession) {
		echo '<table>
		<caption> <h2> Les séances </h2> </caption>
		<thead>
			<tr>
				<th> Date </th>
				<th> Heure début </th>
				<th> Heure de fin </th>
				<th> Statut </th>
				<th> Accepter </th>
			</tr>
		</thead>
		<tbody>';
		while ($data = $eachSession->fetch()) {
			echo '<tr>
					<td>'.$data['dateSession'].'</td>
					<td>'.$data['timeStart'].'</td>
					<td>'.$data['timeEnd'].'</td>
					<td>'.$data['status'].'</td>';
					if ($data['status'] == 'Acceptée') {
						echo '<td></td>';
					} elseif ($data['status'] == 'Pas encore accepté') {
						echo '<td> <form action="sessions.php" method="post">
						<input type="hidden" value="'.$data['id'].'" name="id">
						<button type="submit" name="submit"> Accepter </button> </form>
					 </td>';
					}
				echo '</tr>';
		} $eachSession->closeCursor();
		echo '</tbody>
		</table>';
	}

	public function confirmAccept() {
		echo '<div class="alert successful"><span class="btnclose">&times;</span><strong> Vous avez accepté une séance ! Le jeune conducteur en sera informé à sa connexion ! </strong></div>';
	}

	public function displayButtonAdd() {
		echo '<a href="addSession.php" class="addSession"> Réserver une séance de conduite </a>';
	}

	public function displayButtonAddRent() {
		echo '<a href="addReservation.php" class="addReservation"> Louer un véhicule </a>';
	}

	public function displayFormAdd($vehicle) {
		echo '<form action="addSession.php" method="post">
			<label for="date"> Date : </label>
			<input type="text" required name="date" id="date">

			<label for="timeStart"> Heure début : </label>
			<input type="text" required name="timeStart" id="timeStart">

			<label for="timeEnd"> Heure de fin : </label>
			<input type="text" required name="timeEnd" id="timeEnd">

			<label for="vehicle"> Véhicule souhaité : </label>
			<select name="vehicle" id="vehicle">';
			while ($data = $vehicle->fetch()) {
				echo '<option value="'.$data['id'].'">'.$data['brand'].' '.$data['model'].'</option>';
			} $vehicle->closeCursor();
			echo '</select>

			<button type="submit" name="submit"> Réserver cette séance </button>
		</form>';
	}

	public function confirmAddSession() {
		echo '<div class="alert successful"><span class="btnclose">&times;</span><strong> Votre séance est bien réservée ! </strong></div>';
	}

	public function displayFormUpdateSession($id) {
		while ($data = $id->fetch()) {
			echo '<form action="updateSession.php?id='.$data['id'].'" method="post">
			<input type="hidden" name="id" value="'.$data['id'].'">
			<label for="date"> Date </label>
			<input type="text" required name="date" id="date" value="'.$data['dateSession'].'">

			<label for="timeRent"> Heure début </label>
			<input type="text" required name="timeStart" id="timeRent" value="'.$data['timeStart'].'">

			<label for="timeBack"> Heure de fin </label>
			<input type="text" required name="timeEnd" id="timeBack" value="'.$data['timeEnd'].'">';

			// <label for="vehicle"> Véhicule souhaité </label>
			// <select name="vehicle" required>';
			// while ($data = $vehicle->fetch()) {
			// 	echo '<option value="'.$data['id'].'">'.$data['brand'].' '.$data['model'].'</option>';
			// } $vehicle->closeCursor();
			// echo </select>

			echo '<button type="submit" name="submit"> Mettre à jour cette séance </button>
		</form>';
		}
	}

	public function confirmUpdateSession() {
		echo '<div class="alert successful"><span class="btnclose">&times;</span><strong>Cette séance a bien été mise à jour !</strong></div>';
	}

	// message d'erreur si au moins un champ est vide
	public function emptyForm() {
		echo '<div class="alert fail"><span class="btnclose">&times;</span><strong>Tous les champs sont obligatoires !</strong></div>';
	}
}

?>
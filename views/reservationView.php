<?php

class ReservationView
{
	
	public function __construct()
	{
		# code...
	}

	public function displayFormReservation ($vehicle) {
		echo '<form action="" method="post">
			<label for="date"> Date début : </label>
			<input type="text" required name="date" id="date">

			<label for="timeRent"> Heure début : </label>
			<input type="text" required name="timeRent" id="timeRent">

			<label for="dateBack"> Date de retour : </label>
			<input type="text" required name="dateBack" id="dateBack">

			<label for="timeBack"> Heure de fin : </label>
			<input type="text" required name="timeBack" id="timeBack">

			<label for="vehicle"> Véhicule souhaité : </label>
			<select name="vehicle">';
			while ($data = $vehicle->fetch()) {
				echo '<option value="'.$data['id'].'">'.$data['brand'].' '.$data['model'].'</option>';
			} $vehicle->closeCursor();
			echo '</select>
			<button type="submit" name="submit"> Louer </button>
		</form>';
	}

	public function confirmAdd() {
		echo '<div class="alert successful"><span class="btnclose">&times;</span><strong> Location effectuée ! </strong></div>';
	}

	public function displayFormUpdate($id) {
		while ($data = $id->fetch()) {
			echo '<form action="" method="post">
			<input type="hidden" name="id" value="'.$data['id'].'">
			<label for="date"> Date début </label>
			<input type="text" required name="date" id="date" value="'.$data['dateRent'].'">

			<label for="timeRent"> Heure début </label>
			<input type="text" required name="timeRent" id="timeRent" value="'.$data['timeRent'].'">

			<label for="dateBack"> Date de retour </label>
			<input type="text" required name="dateBack" id="dateBack" value="'.$data['dateBack'].'">

			<label for="timeBack"> Heure de fin </label>
			<input type="text" required name="timeBack" id="timeBack" value="'.$data['timeBack'].'">

			<label for="vehicle"> Véhicule souhaité </label>
			<select name="vehicle">';
			while ($data = $vehicle->fetch()) {
				echo '<option value="'.$data['id'].'">'.$data['brand'].' '.$data['model'].'</option>';
			} $vehicle->closeCursor();
			echo '</select>
			<button type="submit" name="submit"> Mettre à jour cette location </button>
		</form>';
		}
	}

	public function confirmUpdate() {
		echo '<div class="alert successful"><span class="btnclose">&times;</span><strong>Cette location a bien été mise à jour !</strong></div>';
	}
}

?>
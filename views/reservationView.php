<?php

class ReservationView
{
	
	public function __construct()
	{
		# code...
	}

	public function displayFormReservation () {
		echo '<form action="" method="post">
			<label for="date"> Date début </label>
			<input type="text" required name="date" id="date">

			<label for="timeRent"> Heure début </label>
			<input type="text" required name="timeRent" id="timeRent">

			<label for="dateBack"> Date de retour </label>
			<input type="text" required name="dateBack" id="dateBack">

			<label for="timeBack"> Heure de fin </label>
			<input type="text" required name="timeBack" id="timeBack">

			<button type="submit" name="submit"> Louer </button>
		</form>';
	}

	public function confirmAdd() {
		echo '<div class="alert successful"><span class="btnclose">&times;</span><strong> Location effectuée </strong></div>';
	}
}

?>
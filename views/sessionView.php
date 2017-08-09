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
				<th> Accepter </th>
			</tr>
		</thead>
		<tbody>';
		while ($data = $eachSession->fetch()) {
			echo '<tr>
					<td>'.$data['dateSession'].'</td>
					<td>'.$data['timeStart'].'</td>
					<td>'.$data['timeEnd'].'</td>
					<td> <button> Accepter </button> </td>;
				</tr>';
		} $eachSession->closeCursor();
		echo '</tbody>
		</table>';
	}

	public function displayButtonAdd() {
		echo '<a href="addSession.php"> Réserver une séance de conduite </a>';
	}

	public function displayButtonAddRent() {
		echo '<a href="addReservation.php"> Louer un véhicule </a>';
	}

	public function displayFormAdd() {
		echo '<form action="" method="post">
			<label for="date"> Date </label>
			<input type="text" required name="date" id="date">

			<label for="timeStart"> Heure début </label>
			<input type="text" required name="timeStart" id="timeStart">

			<label for="timeEnd"> Heure de fin </label>
			<input type="text" required name="timeEnd" id="timeEnd">

			<button type="submit" name="submit"> Réserver cette séance </button>
		</form>';
	}

	public function confirmAddSession() {
		echo '<div class="alert successful"><span class="btnclose">&times;</span><strong> Votre séance est bien réservée ! </strong></div>';
	}
}

?>
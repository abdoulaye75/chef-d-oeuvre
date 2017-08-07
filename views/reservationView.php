<?php

class ReservationView
{
	
	public function __construct()
	{
		# code...
	}

	public function displayReservations($eachReservation) {
		return '<table>
			<caption> <h2> Mes réservations </h2> </caption>
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
			while ($reservation = $eachReservation->fetch()) {
				echo '<tr>
					<td>'.$reservation['date_rent'].'</td>
					<td>'.$reservation['timeRent'].'</td>
					<td>'.$reservation['dateBack'].'</td>
					<td>'.$reservation['timeBack'].'</td>
					<td>';
					$updateReservations = array($reservation);
					foreach ($updateReservations as $updateReservation) {
						echo '<a href=""> Modifier </a>';
					}'</td>
					<td>';
					$cancelReservations = array($reservation);
					foreach ($cancelReservations as $cancelReservation) {
						echo '<a href=""> Annuler </a>';
					}'</td>
					</tr>';
			} $eachReservation->closeCursor();
			echo '</tbody>
		</table>';
	}
}

?>
<?php

class AdminView
{
	
	public function __construct()
	{
		# code...
	}

	public function displayFormConnect() {
		echo '<form action="" method="post" class="col-md-6">
			<label for="login"> Identifiant : </label>
			<input type="text" name="login" id="login" class="form-control">

			<label for="password"> Mot de passe : </label>
			<input type="password" name="password" id="password" class="form-control">

			<button type="submit" name="submit" class="btn btn-primary"> Se connecter </button>
		</form>';
	}

	public function noConnect() {
		echo '<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button> <strong> Administrateur inconnu ! Veuillez vérifier vos identifiants !</strong></div>';
	}

	public function displayTableVehicles($vehicle) {
		echo '<table class="table table-bordered table-striped table-responsive">
		<thead>
			<tr>
				<th> Marque </th>
				<th> Modèle </th>
				<th> Type </th>
				<th> Description </th>
				<th> Nombre de places </th>
				<th> Année </th>
				<th> Image </th>
				<th> Modifier </th>
				<th> Supprimer </th>
			<tr>
		</thead>
		<tbody>';
		while ($data = $vehicle->fetch()) {
			echo '<tr>
			<td>'.$data['brand'].'</td>
			<td>'.$data['model'].'</td>
			<td>'.$data['type'].'</td>
			<td>'.$data['description'].'</td>
			<td>'.$data['numberPlaces'].'</td>
			<td>'.$data['year'].'</td>
			<td><img src="../views/pictures_vehicles/'.$data['picture'].'" alt="'.$data['picture'].'" width="150" height="150"></td>
			<td>';
			$updateVehicles = array($data);
			foreach ($updateVehicles as $updateVehicle) {
				echo '<a href="updateVehicle.php?id='.$data['id'].'"> Modifier </a> </td>';
			} echo '</td>
			<td>';
			$deleteVehicles = array($data);
			foreach ($deleteVehicles as $deleteVehicle) {
				echo '<a href="deleteVehicle.php?id='.$data['id'].'"> Supprimer </a> </td>';
			}
			echo '</td>
			</tr>';
		} $vehicle->closeCursor();
		echo'
		</tbody>
		</table>';
	}

	public function displayFormUpdate($vehicle) {
		while ($data = $vehicle->fetch()) {
			echo '<form action="" method="post" class="col-md-6">
				<input type="hidden" name="id" value="'.$data['id'].'">
				<label for="brand"> Marque : </label>
				<input type="text" name="brand" value="'.$data['brand'].'" id="brand" class="form-control">

				<label for="model"> Modèle : </label>
				<input type="text" name="model" value="'.$data['model'].'" id="model" class="form-control">

				<label for="type"> Type </label>
				<input type="text" name="type" value="'.$data['type'].'" id="type" class="form-control">

				<label for="description"> Description </label>
				<textarea name="description" id="description" class="form-control">'.$data['description'].'</textarea>

				<label for="numberPlaces"> Nombre de places </label>
				<input type="number" name="numberPlaces" value="'.$data['numberPlaces'].'" id="numberPlaces" class="form-control">

				<label for="year"> Année </label>
				<input type="text" name="year" value="'.$data['year'].'" id="year" class="form-control">

				<button type="submit" name="submit" class="btn btn-primary"> Mettre à jour </button>
			</form>';
		} $vehicle->closeCursor();
	}

	public function confirmUpdate() {
		echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button> <strong> Véhicule modifié avec succès !</strong></div>';
	}
}

?>
<?php

class AdminView
{
	
	public function __construct()
	{
		# code...
	}

	public function displayFormConnect() {
		echo '<form action="" method="post" class="col-md-6">
			<div class="form-group">
				<label for="login"> Identifiant : </label>
				<input type="text" name="login" id="login" class="form-control" required>
			</div>

			<div class="form-group">
				<label for="password"> Mot de passe : </label>
				<input type="password" name="password" id="password" class="form-control" required>
			</div>

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
				<th> Image </th>';
				if (isset($_SESSION['login'], $_SESSION['password'])) {
				echo '<th> Modifier </th>
				<th> Supprimer </th>';
			}
			echo '<tr>
		</thead>
		<tbody>';
		while ($data = $vehicle->fetch()) {
			echo '<tr>
			<td>'.$data['brand'].'</td>
			<td>'.$data['model'].'</td>
			<td>'.$data['type'].'</td>
			<td>'.$data['description'].'</td>
			<td>'.$data['numberPlaces'].' places</td>
			<td>'.$data['year'].'</td>
			<td><img src="../views/pictures_vehicles/'.$data['picture'].'" alt="'.$data['picture'].'" width="150" height="150"></td>';
			if (isset($_SESSION['login'], $_SESSION['password'])) {
			echo '<td>';
			$updateVehicles = array($data);
			foreach ($updateVehicles as $updateVehicle) {
				echo '<a href="updateVehicle.php?id='.$data['id'].'" class="btn btn-primary"> Modifier </a> </td>';
			} echo '</td>
			<td>';
			$deleteVehicles = array($data);
			foreach ($deleteVehicles as $deleteVehicle) {
				echo '<a href="deleteVehicle.php?id='.$data['id'].'" class="btn btn-danger"> Supprimer </a> </td>';
			}
			echo '</td>';
		}
			echo '</tr>';
		} $vehicle->closeCursor();
		echo'
		</tbody>
		</table>';
	}

	public function displayFormUpdate($vehicle) {
		while ($data = $vehicle->fetch()) {
			echo '<form action="" method="post" class="col-md-6" enctype="multipart/form-data">
				<input type="hidden" name="id" value="'.$data['id'].'">
				
				<div class="form-group">
					<label for="brand"> Marque : </label>
					<input type="text" name="brand" value="'.$data['brand'].'" id="brand" class="form-control" required>
				</div>

				<div class="form-group">
					<label for="model"> Modèle : </label>
					<input type="text" name="model" value="'.$data['model'].'" id="model" class="form-control" required>
				</div>

				<div class="form-group">
					<label for="type"> Type </label>
					<input type="text" name="type" value="'.$data['type'].'" id="type" class="form-control" required>
				</div>

				<div class="form-group">
					<label for="description"> Description </label>
					<textarea name="description" id="description" class="form-control" required>'.$data['description'].'</textarea>
				</div>

				<div class="form-group">
					<label for="numberPlaces"> Nombre de places </label>
					<input type="number" name="numberPlaces" value="'.$data['numberPlaces'].'" id="numberPlaces" class="form-control" required>
				</div>

				<div class="form-group">
					<label for="year"> Année </label>
					<input type="text" name="year" value="'.$data['year'].'" id="year" class="form-control" required>
				</div>

				<div class="form-group">
					<label> Télécharger de nouveau cette image ou une nouvelle : </label>
					<img src="../views/pictures_vehicles/'.$data['picture'].'" width="150" height="150">
					<p>'.$data['picture'].'</p>
            		<input type="hidden" name="MAX_FILE_SIZE" value="20000">
            		<input type="file" name="image">
				</div>

				<button type="submit" name="submit" class="btn btn-primary"> Mettre à jour </button>
			</form>';
		} $vehicle->closeCursor();
	}

	public function confirmAdd() {
		echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button> <strong> Véhicule ajouté avec succès !</strong></div>';
	}

	public function confirmUpdate() {
		echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button> <strong> Véhicule modifié avec succès !</strong></div>';
	}

	public function displayFormAdd() {
		echo '<form action="" method="post" class="col-md-6" enctype="multipart/form-data">
				<div class="form-group">
					<label for="brand"> Marque : </label>
					<input type="text" name="brand" id="brand" class="form-control" required>
				</div>

				<div class="form-group">
					<label for="model"> Modèle : </label>
					<input type="text" name="model" id="model" class="form-control" required>
				</div>

				<div class="form-group">
					<label for="type"> Type : </label>
					<input type="text" name="type" id="type" class="form-control" required>
				</div>

				<div class="form-group">
					<label for="description"> Description : </label>
					<textarea name="description" id="description" class="form-control" required></textarea>
				</div>

				<div class="form-group">
					<label for="numberPlaces"> Nombre de places : </label>
					<input type="number" name="numberPlaces" id="numberPlaces" class="form-control" required>
				</div>

				<div class="form-group">
					<label for="year"> Année : </label>
					<input type="text" name="year" id="year" class="form-control" required>
				</div>

				<div class="form-group">
					<label> Télécharger une image : </label>
            		<input type="hidden" name="MAX_FILE_SIZE" value="20000">
            		<input type="file" name="image">
				</div>

				<button type="submit" name="submit" class="btn btn-primary"> Ajouter </button>
			</form>';
	}

	public function displayFormUpdateLogins($admin) {
		while ($data = $admin->fetch()) {
			echo '<form action="" method="post" class="col-md-6">
				<caption> <h2> Modifier mes identifiants </h2> </caption>
				<input type="hidden" name="id" value="'.$data['id'].'">
				<div class="form-group">
					<label for="login"> Identifiant : </label>
					<input type="text" name="login" id="login" class="form-control" value="'.$data['login'].'">
				</div>

				<div class="form-group">
					<label for="password"> Mot de passe : </label>
					<input type="text" name="password" id="password" class="form-control" value="'.$data['password'].'">
				</div>

				<button type="submit" name="submit" class="btn btn-primary"> Mettre à jour mes identifiants </button>
			</form>';
		} $admin->closeCursor();
	}

	public function confirmUpdateLogins() {
		echo '<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button> <strong> Identifiants modifiés avec succès !</strong></div>';
	}
}

?>
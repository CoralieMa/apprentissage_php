<?php 
require_once("14_fonctions_template.php");
 ?>

 <!DOCTYPE html>
<html lang="fr">
<head>
	<title>Base de donnée</title>
	<meta charset="utf-8">
</head>
<body>
	<table>
		<tr>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Date de naissance</th>
			<th>Genre</th>
			<th></th>
			<th>Action</th>
		</tr>
		<?php visualisation($tab, $id); ?>
		<tr>
			<form action="14_data_base_controleur.php" method="post">
				<td><input type="text" name="nom"></td>
				<td><input type="text" name="prenom"></td>
				<td><input type="date" name="ddn"></td>
				<td>
					<select name="genre">
					<option value="f" >Femme</option>
					<option value="h" >Homme</option>
					<option value="a" >Autre</option>
				</td>
				<td><input type="password" name="mdp"></td>
				<td>
						<input type="submit" name="ajout" value="Ajouter">
				</td>
			</form>
		</tr>
	</table>
</body>
</html>
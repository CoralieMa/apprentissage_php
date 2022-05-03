<?php
	require_once("08_data_stagiaires.php");

	function ligneNom($stag){
		if($stag["sexe"] == "M"){
			$genre = "Monsieur";
		}else
			$genre = "Madame";

			$nom = mb_strtoupper($stag['nom']);

		return "<li>$genre {$nom} {$stag['prenom']}</li>";
	}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Exercice liste</title>
	<meta charset="utf-8">
</head>
<body>
	<ul>
	<?php
		foreach($stagiaires as $cle1 => $valeur1){
			echo "<li>Elément : $cle1 <ul>";
			foreach($valeur1 as $cle2 => $valeur2){
				if (is_array($valeur2)) {
					echo "<li>$cle2";
					foreach ($valeur2 as $cle3 => $valeur3){
						echo "<ul><li>$cle3 : $valeur3</li></ul>";
					}
					echo "</li>";
				}
				else {
				echo "<li>$cle2 : $valeur2</li>";
				}		
			}

			echo "</ul></li>";
		}
	?>
	</ul>
	<hr>
	<ul>
	<?php
		foreach($stagiaires as $cle2 => $valeur2){
			echo "<li>ID : $cle2 <ul>";
			echo ligneNom($valeur2);
			echo "<li>DDN : {$valeur2['ddn']}</li>";
			echo "<li>Nombre d'enfants : {$valeur2['enfants']}</li>";
			echo "<li>Hobbies : <ul>";
			foreach ($valeur2["hobbies"] as $cle2 => $valeur3) {
				echo "<li>".$hobbies[$valeur3]."</li>";
			}
			echo "</ul></li></ul>";
			
		}
	?>
	</ul>
</body>
</html>
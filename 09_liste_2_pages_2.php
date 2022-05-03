<?php
	require_once("08_data_stagiaires.php");
	$stag = null;
	if (isset($_GET["id"])){
		$numeroStag = $_GET["id"];
		$stag = $stagiaires[$numeroStag];
	}
	
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
	<title>Fiche stagiaires</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
		if ($stag == null) {
			echo "Pas de paramètres";
		}
		else {
		echo "<li>Personne n° : $numeroStag :<ul>";
			echo ligneNom($stag);
			echo "<li>DDN : {$stag['ddn']}</li>";
			echo "<li>Nombre d'enfants : {$stag['enfants']}</li>";
			echo "<li>Hobbies : <ul>";
			foreach ($stag["hobbies"] as $cle2 => $valeur3) {
				echo "<li>".$hobbies[$valeur3]."</li>";
			}
			echo "</ul></li></ul>";
		}
	?>
	<a href='javascript:history.go(-1)'>Retour</a>
</body>
</html>
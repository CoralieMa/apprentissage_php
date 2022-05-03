<?php
	require_once("08_data_stagiaires.php");

	function ligneNom($stag, $indiceStag){

		if($stag["sexe"] == "M"){
			$genre = "Monsieur";
		}else
			$genre = "Madame";

			$nom = mb_strtoupper($stag['nom']);

			$lien = "<a href='12_liste_2_pages_2.php?id=".$indiceStag."'>$nom</a>";

		return "<li>$genre {$lien} {$stag['prenom']}</li>";
	}
?>

<!DOCTYPE html
<html lang="fr">
<head>
	<title>Exercice 2 liste</title>
	<meta charset="utf-8">
</head>
<body>
	<ul>
		<?php
		foreach($stagiaires as $cle1 => $valeur1){
			echo "<li>Personne : n° $cle1 <ul>";
			echo ligneNom($valeur1, $cle1);
			echo "</ul>";
		}
		?>
		</li>
	</ul>
</body>
</html>
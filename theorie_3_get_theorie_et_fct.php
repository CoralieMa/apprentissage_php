<?php
function rigolo($chaine){
	$ret="";
	for($i=0;$i<strlen($chaine);$i++){
		if($i%2==0)
			// versions mb_ pour accentuées - UTF 8
			$ret.=mb_strtoupper(mb_substr($chaine, $i,1));
		else
			$ret.=mb_strtolower(mb_substr($chaine, $i,1));
	}
	return $ret;
}
function foo(&$var) {
  $var++;
}
$a=5;
foo ($a);

?>


<!doctype html>
<html lang="fr">
	<head>
		<title>Titre de l'exercice</title>
		<meta charset="utf-8">
	</head>
	<body>
			<?php
			echo "\$a: $a <hr/>";
 			if(isset($_GET["nom"])){
				echo "nom : ".rigolo($_GET["nom"]);
			}
			?> <br/> 
			<?php
			if(isset($_GET["prenom"])){
				echo "prénom : ".$_GET["prenom"];
			}
			?>
			<br/>
			<a href='theorie_3_get_theorie_et_fct.php?nom=Albért&prenom=Sébastien'>Passage de param</a>
	</body>
</html>
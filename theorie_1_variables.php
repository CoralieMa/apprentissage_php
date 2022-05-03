<DOCTYPE html>
<html lang=fr>
<head>
	<meta charset="UTF-8">
	<title>Variables</title>
</head>
<body>
	
	<?php 
		echo "1.<br/>2.";
		
	?>
<hr>
	<?php 
		echo "1.";
		echo "<br/>";
		echo "2.";
	?>
<hr>
	<?php 
		echo "1.","<br/>","2.";
	?>
<hr>
	<?php 
		echo "1."."<br/>"."2.";
	?>
<hr>
	<?php 
		echo "1.
		<br/>
		2.";            // ajouter \n pour retour à la loigne dans le source généré
	?>
<hr>
	<?php 
		$nom ="Isabelle";
		echo "Hello ".$nom."<br/>";
		$nom=123;
		echo "Hello $nom <br/>";
		echo "Hello \$nom <br/>"; // l'interpolation n'a pas lieu
		echo 'Hello $nom <br/>';  // avec ' jamais d'interpolation
		echo 'Hello \$nom <br/>'; // ne change rien pas d'interpolation
	?>
<hr>
	<?php
	$prenom="Josy";
	$nom="Dubois";
	$complet="Mme ".$prenom." ".$nom."<br/>";
	echo $complet;
	echo "$complet";
	$complet="Mme $prenom $nom";
	echo "$complet";
	?>

	<h2>Numérique</h2>
	<?php
	$a= 103;
	$b=-2;
	$somme= $a + $b;
	$produit = $a * $b;
	$soustraction = $a - $b;
	$division = $a / $b;
	$modulo = $a % $b;
	$increment = $a++; //Attention d'abord assignation à $increment (donc 103) puis incrémentation de $a  (donc 104)
	echo "Somme : $somme <br/>";
	echo "Produit : $produit <br/>";
	echo "Soustraction : $soustraction <br/>";
	echo "Division : $division <br/>";
	echo "Modulo : $modulo <br/>";
	echo "Increment : $increment | $a <br/>"; 
	$increment = ++$a; // incrementation de $a avant assignation => les 2 à 105
	echo "Increment : $increment | $a <br/>";
	
	?>
<hr>
	<h2>Booléen</h2>
	<?php
	$vrai=true;
	$faux=false;
	echo $vrai; // affichage de 1
	echo $faux; // affichage de ""
	echo "Vrai : $vrai<br/>"; // Vrai : 1
	echo "Faux : $faux<br/>"; // Faux : 

	echo "vrai et faux : ".($vrai&&$faux)."<br/>"; //""
	echo "vrai ou faux : ".($vrai||$faux)."<br/>"; //1
	// && , || eval courte;  & ou | éval courte
	echo "test eval courte", $vrai || $erreur,"<br/>"; // $erreur n'existe pas mais éval courte donc pas d'erreur
	echo "test eval longue",$vrai | $erreur, "<br/>"; // $erreur n'existe pas mais éval longue donc erreur
	echo "not vrai : ".(!$vrai)."<br/>";
	echo "not faux : ".(!$faux)."<br/>";
	?>
<hr>
	<h2>Comparaison</h2>
	<?php
	$op1="Salut";
	$op2="salut";
	echo "$op1 == $op2 :".($op1 == $op2)."<br/>"; // case sensitive donc false
	echo "$op1 != $op2 :".($op1 != $op2)."<br/>"; // vrai
	echo "S <  s   : ","S"<"s","<br/>"; // comparaison ascii de base   &lt;
	echo "$op1 < $op2 :".($op1 < $op2)."<br/>"; // vrai comparaison ascii
	echo "$op1 > $op2 :".($op1 > $op2)."<br/>"; // faux
	echo "$op1 <= $op2 :".($op1 <= $op2)."<br/>"; // vrai car <
	echo "$op1 >= $op2 :".($op1 >= $op2)."<br/>"; // false
	
	echo 'Comparaison unicode',  strnatcmp ( "S" ,  "s" ),'<br/>'; //-1 car S > s 
	/* comparaison sur postulat 1er arg < au 2e arg =>
	 -1 si 1er > 2e, 
	 1 si <, 
	 0 si égal*/

	$op1=true;
	$op2="1";
	echo "$op1 == $op2 :".($op1 == $op2)."<br/>";
	echo "$op1 != $op2 :".($op1 != $op2)."<br/>";
	echo "$op1 < $op2 :".($op1 < $op2)."<br/>";
	echo "$op1 > $op2 :".($op1 > $op2)."<br/>";
	echo "$op1 <= $op2 :".($op1 <= $op2)."<br/>";
	echo "$op1 >= $op2 :".($op1 >= $op2)."<br/>";

	echo "$op1 === $op2 :".($op1 === $op2)."<br/>"; // === pas de conversion de type donc identité de type ET de valeur
	echo "$op1 !== $op2 :".($op1 !== $op2)."<br/>";
	?>
<hr>
	<h2>Autres types</h2>
	Objet, Ressources, null
	
	<?php
	//structures de contrôle
	if(true){
		echo "";	
	}else{
		echo "";	
	}
	for ($i=1;$i<10;$i++){

	}
	while($i<5){

	}
	switch ($i) {
		case '10':
			echo "i=10";
			break;
		
		default:
			# code...
			break;
	}
	?>

<?php
	// Constantes
	define("NB",10);
	echo NB;
	echo nb; //erreur


	?>

</body>
</html>

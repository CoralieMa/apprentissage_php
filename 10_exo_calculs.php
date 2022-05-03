<?php  
$liste="";
$chiffres = [];
$somme = 0;
$max = 0;
$min = 0;

if (isset($_POST['soumission'])) {
	$liste=$_POST['liste'];
	$liste = $liste.",".$_POST["nombres"];
	if ($liste[0] == ","){
		$liste = substr($liste, 1);
	}
	$chiffres=explode(",",$liste);
}
if (isset($_POST['initialisation'])) {
	$liste = "";
	$chiffres = [];
	$somme = 0;
	$max = 0;
	$min = 0;
}

for ($i=0;$i<count($chiffres);$i++){
	$somme = $somme + (int)$chiffres[$i];
	if ($max < (int)$chiffres[$i]){
		$max = (int)$chiffres[$i]; 
	}
	if ($i == 0 or $min > (int)$chiffres[$i]){
		$min = (int)$chiffres[$i]; 
	}
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Calculs</title>
	<meta charset="utf-8">
</head>
<body>
	<form action="10_exo_calculs.php" method="POST">
		<input type="number" name="nombres">
		<input type="submit" name="soumission" value="soumettre">
		<input type="submit" name="initialisation" value="initialiser">
		<p>
	   		<label for="nombre">Nombre de nombres :</label>
	   		<input type="number" name="nombre" readonly value=<?php echo count($chiffres) ?>>
	   	</p>
	   	<p>
	   		Somme de nombres :
	   		<input type="number" name="somme" readonly value=<?php echo $somme ?>>
	   	</p>
	   	<p>
	   		Moyenne des nombres :
	   		<input type="number" name="moyenne" readonly value= <?php 
	   		if (count($chiffres) == 0){
	   			echo "0";
	   		}else {
	   			echo $somme/(count($chiffres));
	   		} ?>> 
	   	</p>
	   	<p>
	   		Plus grand :
	   		<input type="number" name="grand" readonly value=<?php echo $max ?>>
	   	</p>
	   	<p>
	   		Plus petit : 
	   		<input type="number" name="petit" readonly value=<?php echo $min ?>>
	   	</p>
	   	<p>
	   		Liste de nombres
	   		<textarea name="liste"><?php echo $liste ?></textarea>
	   </p>
	</form>
</body>
</html>
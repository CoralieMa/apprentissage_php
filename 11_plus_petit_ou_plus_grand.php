<?php
$nombreOrdi = rand(0,100);
$resultat = "à tester";

if (isset($_POST['soumission'])){
	$nombreOrdi = $_POST['nombreAl'];
	$nombreUtil = $_POST['nombre'];
	if ($nombreOrdi == $nombreUtil){
		$resultat = "correct";
	}
	if ($nombreOrdi > $nombreUtil){
		$resultat = "plus grand";
	}
	if ($nombreOrdi < $nombreUtil){
		$resultat = "plus petit";
	}
}



?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Plus petit ou plus grand</title>
	<meta charset="UTF-8">
</head>
<body>
	<h1>Trouve un nombre entre 0 et 100</h1>
	<form action="11_plus_petit_ou_plus_grand.php" method="POST">
		<p>
		<input type="number" name="nombre">
		Le nombre est <?php echo $resultat ?>
		<input type="submit" name="soumission" value="Tester">
		<input type="submit" name="abandon" value="Reset">
		<input type="hidden" name="nombreAl" value=<?php echo $nombreOrdi ?>>
		</p>
	</form>
</body>
</html>
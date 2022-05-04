<?php
$resultat = "à tester";
$nombreOrdi = 0;
session_start();

if (isset($_POST['soumission'])){

	if (isset($_SESSION["nombreOrdi"])){

		$nombreOrdi = $_SESSION["nombreOrdi"];
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
	
}else{
	$_SESSION["nombreOrdi"]=rand(0,100);
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
	<form action="12_plus_petit_ou_plus_grand_session.php" method="POST">
		<p>
		<input type="number" name="nombre">
		Le nombre est <?php echo $resultat ?>
		<input type="submit" name="soumission" value="Tester">
		<input type="submit" name="abandon" value="Reset">
	</form>
</body>
</html>
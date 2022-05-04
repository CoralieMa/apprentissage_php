<?php
$tab = [10];
$page = 1;
$score = 0;
session_start();
if (isset($_POST['reset'])){
	unset($_SESSION["tab"]);
}
if (isset($_SESSION["tab"])){
	$tab = $_SESSION["tab"];
	$page = $_SESSION["page"];
	if (isset($_POST['prec'])){
		if (isset($_POST['nombre'])){
			$tab[$page]["réponseUtil"] = $_POST['nombre'];
	}
		$page--;
		if ($page == 0){
			$page = 10;
		}
		
	}
	if (isset($_POST['suiv'])){
		if (isset($_POST['nombre'])){
			$tab[$page]["réponseUtil"] = $_POST['nombre'];
	}
		$page++;
		if ($page == 11){
			$page = 1;
		}
		
	}
	$_SESSION["page"] = $page;
	$_SESSION["tab"] = $tab;
}
else {
	$cpt = 0;
	$tab=[];
	$_SESSION["page"] = $page;
	for ($i=1; $i < 11; $i++) { 
		$chiffre1 = rand(1,100);
		$chiffre2 = rand(1,100);
		$r = rand(1,4);
		if ($r == 1){
			$operation = "+";
			$reponseOrdi = $chiffre1 + $chiffre2;
		}
		if ($r == 2){
			$operation = "-";
			$reponseOrdi = $chiffre1 - $chiffre2;
		}
		if ($r == 3){
			$operation = "*";
			$reponseOrdi = $chiffre1 * $chiffre2;
		}
		if ($r == 4){
			$operation = "/";
			$reponseOrdi = (round(($chiffre1 / $chiffre2), 2));
		}
		$tab[$i]=["chiffre1"=>$chiffre1, "chiffre2"=>$chiffre2, "opé"=>$operation, "réponseOrdi"=>$reponseOrdi, "réponseUtil"=> ""];
	}
	$_SESSION["tab"] = $tab;
}	
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title></title>
	<meta charset="UTF-8">
</head>
<body>
	<h1>Didacticiel Math</h1>
	<form action="13_tirage-aleatoire.php" method="POST">
		<p>
		<?php 
			if (isset($_POST['bilan'])){
				echo "<h2>Résultats</h2>";
				echo "<p>";
				for ($i=1; $i < 11; $i++) { 
					echo $tab[$i]["chiffre1"];
					echo $tab[$i]["opé"];
					echo $tab[$i]["chiffre2"];
					echo " = ";
					echo $tab[$i]["réponseUtil"];
					if ($tab[$i]["réponseUtil"] == $tab[$i]["réponseOrdi"]){
						echo "     :-)";
						$score++;
					}
					else {
						echo "     :-(    ==> ".$tab[$i]["réponseOrdi"];
					}
					echo "<br>";	
				}
				echo "Votre score est : ".$score."/10 <br>";
				echo '<input type="submit" name="reset" value="Recommencer">';
				echo "</p>";
			}
			else{
		 ?>
	</p>
		<p>Page <?php echo $page ?> sur 10</p>
		<p>
			<?php echo $tab[$page]["chiffre1"] ?>
			<?php echo $tab[$page]["opé"] ?>
			<?php echo $tab[$page]["chiffre2"] ?>
			  =  
			<input type="number" name="nombre" step="any" placeholder='<?php echo $tab[$page]["réponseUtil"] ?>'> 
		</p>
		<p>
			<input type="submit" name="prec" value="Précédent">
			<input type="submit" name="bilan" value="Bilan">
			<input type="submit" name="suiv" value="Suivant">
		</p>
		<p>
			<input type="submit" name="reset" value="Recommencer">
		</p>
		<?php 				
			} 
		?>
	</form>
</body>
</html>
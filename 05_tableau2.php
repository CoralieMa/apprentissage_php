<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Tableau aléatoire</title>
	<meta charset="utf-8">

	<style type="text/css">
		table, tr, td{
			border: solid;
		}
		.themeA {
			background: lightgreen;
		}
		.themeB {
			background: lightblue;
		}
		<?php 
		$ligne= 5;
		$colonne=5;
		for ($i=1; $i<$ligne * $colonne + 1; $i++){
			echo ".theme".$i.'{';
			$coul1 = rand(0,255);
			$coul2 = rand(0,255);
			$coul3 = rand(0,255);
			echo " background-color: rgb(".$coul1.",".$coul2.",".$coul3.");} ";}
		?>
	</style>
</head>
<body>
	<?php
	$ligneTab1= $ligne;
	$colonneTab1= $colonne;
	?>
	<table>
	<?php
	for($i=0; $i<$ligneTab1; $i++){
	?>
		<tr>
	<?php 
		for($j=0; $j<$colonneTab1; $j++){
			$nb = rand(1,99);
			if ($nb % 2 == 0){
				echo '<td class="themeA">';
			}
			else {
				echo '<td class="themeB">';
			}
			echo $nb;
			?></td>
	<?php		
		} 
		?> </tr><?php
	}
	?>
	</table>
	<hr>
	<table>
	<?php
	$ligneTab2= $ligne;
	$colonneTab2= $colonne;
	$cpt = 0;
	for($i=0; $i<$ligneTab2; $i++){
	?>
		<tr>
	<?php 
		for($j=0; $j<$colonneTab2; $j++){
			$nb = rand(1,99);
			$cpt++;
			echo '<td class="theme'.$cpt.'">';
			echo $nb;
			?></td>
	<?php		
		} 
		?> </tr><?php
	}
	?>
	</table>
</body>
</html>
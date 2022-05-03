
<DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Exercices tab html</title>
	<style type="text/css">
		table{border-style: solid;border-width:1px; border-collapse:collapse }
		th,td{border-style: solid;border-width:1px; }
	</style>
</head>
<body>
	<table>
		<tr>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Points</th>
		</tr>
		<tr>
			<td>Albert</td>
			<td>Zoé</td>
			<td>10</td>
		</tr>
		<tr>
			<td>Durant</td>
			<td>Eric</td>
			<td>50</td>
		</tr>
		<tr>
			<td>Durant</td>
			<td>Eric</td>
			<td>30</td>
		</tr>
	</table>
<hr>
	<table>
		<tr>
			<th colspan="2">Personne</th>
			<th>Points</th>
		</tr>
		<tr>
			<td>Albert</td>
			<td>Zoé</td>
			<td>10</td>
		</tr>
		<tr>
			<td rowspan="2">Durant</td>
			<td rowspan="2">Eric</td>
			<td>50</td>
		</tr>
		<tr>
			
			<td>30</td>
		</tr>
	</table>

<hr>
	<?php
	$ligne=2;
	$colonne=4;
	?>
	<table>
	<?php
	for($i=0; $i<$ligne; $i++){
	?>
		<tr>
	<?php 
		for($j=0; $j<$colonne; $j++){
	?>
			<td><?php echo "($i,$j)";?></td>
	<?php		
		} 
		?> </tr><?php
	}
	?>
	</table>


</body>
</html>
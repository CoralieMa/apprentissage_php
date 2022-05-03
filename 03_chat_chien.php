<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Chats ou chiens?</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>

	<?php  
		$nb = rand(1,100);
		if ($nb < 50){
			echo $nb;
			echo "  Vous avez gagné un chien <br>";
			echo '<img src="images/chien.jpg">';
		}
		else {
			echo $nb;
			echo "  Vous avez gagné un autre chien <br>";
			echo '<img src="images/chien1.jpg">';
		}
	?>
	</h1>
</body>
</html>
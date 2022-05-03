<?php
$titre="Hello World";
$i = 0;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title><?php echo $titre; ?>
	</title>
	<meta charset="utf-8">
</head>
<body>
	<h1><?php echo $titre; ?>
	</h1>
	<?php
	while($i < 99){
		echo "<h5>Bonjour</h5>";
		$i++;
	}
	?>
</body>
</html>
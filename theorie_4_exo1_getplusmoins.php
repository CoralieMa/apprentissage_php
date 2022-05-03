<?php
$operation = null;
$nombre = 0;
if (isset($_GET['incrementation'])) {
	$operation = $_GET['incrementation'];
}

if (isset($_GET['nombre'])) {
	$nombre = $_GET['nombre'];
} 

if (is_numeric($nombre)){
if ($operation === '+')
{
	$nombre = $nombre + 1;
}
else if ($operation === '-')
{
	$nombre = $nombre - 1;
}
}

//var_dump($_GET);
?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>exo1</title>
</head>
<body>
<form action="theorie_4_exo1_getplusmoins.php" method="GET">
   <input type="submit" name="incrementation"  value="-" />
   <input type="number" name="nombre" readonly value="<?php echo $nombre?>"> 
   <!-- disabled => pas envoyé lors du submit, readonly ok --> 
   <input type="submit" name="incrementation"  value="+" />
</form>

</body>
</html>
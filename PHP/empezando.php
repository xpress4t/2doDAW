<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<style>
		*{
			font-family: Calibri;
		}
</style>
</head>
<body>
<?php
	echo "<h1>Bucles</h2>";
	echo "<h2>For</h2>";
 
	for($vueltas=0;$vueltas<10;$vueltas++){
		echo "<p>Esta es la vuelta número $vueltas</p>";
	}
	
	echo "string";
	echo "Nº aleatorio del 1 al 10";
	$numero = rand(1,10);
	echo "<p>Tabla del $numero</p>";

	for($i=1;$i<=10;$i++){
		echo "<p>$numero x $i = ".($numero*$i)."</p>";
	}
	?>


</body>
</html>
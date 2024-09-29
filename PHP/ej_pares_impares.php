<?php
	echo "<h1>Sumatoria de pares e impares</h1>";
	$sumaImpares = 0;
	$sumaPares = 0;
	
	for ($numero=1; $numero <= 1000; $numero++) { 
		if ($numero%2==0) {
			$sumaPares += $numero;
		}else{
			$sumaImpares += $numero;
		}
	}

	echo "<p>Sumatoria de números pares hasta el 1000: " .$sumaPares."</p>";
	echo "<p>Sumatoria de números impares hasta el 1000: " .$sumaImpares."</p>";
?>
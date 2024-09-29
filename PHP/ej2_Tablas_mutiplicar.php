<?php
	echo "<h2>TABLA UTILIZANDO FOR</h2>";
	for ($i=1; $i <= 10; $i++) { 
		echo "<h3>Tabla del $i</h3>";
		for ($j=1; $j <= 10; $j++) { 
			echo "<p>$i * $j = ".($i*$j)."</p>";
		}
	}
?>

<?php
	echo "<h2>TABLA UTILIZANDO WHILE</h2>";
	$i = 1;
	while ($i<=10) {
		echo "<h3>Tabla del $i</h3>";
		$j = 1;
		while ($j<=10) {
			echo "<p>$i * $j = ".($i*$j)."</p>";
			$j++;
		}
		$i++;
	}
?>
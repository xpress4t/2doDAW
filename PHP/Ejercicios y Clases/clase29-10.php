<?php
    echo "<h1>PHP</h1>";

    $nombre = "Emmanuel";
    $apellido1 = "Cordova";
    $apellido2 = "Muñoz";

    echo "<p>Nombre: ".$nombre."</p>";
    echo "<p>Primer apellido: ".$apellido1."</p>";
    echo "<p>Segundo apellido: ".$apellido2."</p>";

    echo "<h2>Concatenación de variables</h2>";
    // Concatenando con comillas dobles
    echo "<p> $nombre $apellido1 $apellido2 </p>";

    // Concatenando con comillas simples y con puntos
    echo '<p>'.$nombre.' '.$apellido1.' '.$apellido2.'</p>';

    // Concatenando con comillas simples (aparece en pantalla el nombre de las variables "$nombre", etc)
    echo '<p> $nombre $apellido1 $apellido2 </p>';

    echo "<h2>Bucle WHILE</h2>";
    // Bucle while 
    $a = 0;
    while($a <= 10){
        echo "<p>El contador vale: $a </p>";
        $a++;
    }

    echo "<h2>Bucle FOR</h2>";

    for($i=0;$i<=5;$i++){
        echo "<p>El contador vale: $i </p>";
    }

    echo "<h2>Estructura de control SWITCH</h2>";
    $variable = 5;
    switch($variable){
        case 5:
            echo "<p>El valor es 5</p>";
            break;

        case 6:
            echo "<p>El valor es 6</p>";
            break;

        case 7:
            echo "<p>El valor es 7</p>";
            break;
        default:
            echo "<p>No se que valor tienes</p>";
    }


    echo "Nº aleatorio del 1 al 10";
    $numero = rand(1, 10);
    echo "<p>Tabla del $numero</p>";

    for ($i = 1; $i <= 10; $i++) {
        echo "<p>$numero x $i = " . ($numero * $i) . "</p>";
    }

    echo "<h2>Pirámide</h2>";

    $altura = 5;

        for ($m=1;$m<=$altura;$m++){
            for($n=1;$n<=(2*$m-1);$n++){
                echo "*";
            }
            echo "<br>";
        }
?>

<?php
$var1 = 6;
$var2 = 9;
$operador = "+";

if($operador == "+"){
    echo "El resultado de la suma $var1 + $var2 es: ".$var1+$var2;
}else if($operador == "-"){
    echo "El resultado de la resta $var1 - $var2 es: ".$var1-$var2;
}else if($operador == "*"){
    echo "El resultado de la multiplicación $var1 * $var2 es: ".$var1*$var2;
}else if($operador == "/"){
    echo "El resultado de la división $var1 / $var2 es: ".$var1/$var2;
}
?>

<?php
	echo "<h1>Sumatoria de pares e impares</h1>";
	$sumaImpares = 0;
	$sumaPares = 0;
	
	for ($numero=1; $numero <= 1000; $numero++) { 
		if ($numero%2==0) {
			$sumaPares += $numero;
			// $sumaPares = $sumaPares + $numero;
		}else{
			$sumaImpares += $numero;
			// $sumaImpares = $sumaImapres + $numero;
			// $sumaImpares = 0 + 1
			// $sumaImpares = 1 + 3
			// $sumaImpares = 3 + 5
			// $sumaImpares = 5 + 7
			//         -
			//         -
			//         -
			//         -
			//         -
			// 1 + 3 + 5 + 7 + 9 + .......
		}
	}

	echo "<p>Sumatoria de números pares hasta el 1000: " .$sumaPares."</p>";
	echo "<p>Sumatoria de números impares hasta el 1000: " .$sumaImpares."</p>";
?>
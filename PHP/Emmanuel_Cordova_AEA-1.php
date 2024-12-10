<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale-1">
    <title>Bingo</title>
</head>
<body>
	<!--
		Realiza un programa para jugar al bingo (un único jugador con un único cartón), que cumpla con los siguientes requisitos: X
	    El programa debe tener los números (bolas) del 1 al 100 en el array $bombo. Rellénalo con un bucle. X
	    El cartón debe llamarse $carton, y debe contener 15 números distintos generados aleatoriamente entre el 1 y el 100. X
	    Empezamos a jugar y el programa debe mostrar los números ordenados del cartón en una única línea, separados por el carácter |  (está en la tecla del 1) X
	    El programa ha de realizar “extracciones” aleatorias de las bolas del bombo, e indicar tras cada extracción, una de estas dos opciones:
	     a) Ha salido el número x. Has acertado y lo tacho del cartón.
	     b) Ha salido el número x. No está en el cartón.
	    El programa finaliza cuando el jugador ha “tachado” los 15 números. Debe indicar: Enhorabuena, has cantado bingo con x extracciones de bolas.
		Entrégalo en la plataforma con la nomenclatura: nombre_apellido_AEA-1.php
	-->
	<?php
		// Declaro los arrays para el bombo y el cartón
		$bombo = [];
		$carton = [];

		echo "<h1>Bingo</h1>";
		echo "<h3>Números del bombo: </h3>";
		// Bucle para generar los números del bombo
		for($i=1;$i<=100;$i++){
			$bombo[]=$i;
			echo " - ".$i;
		}
		
		echo "<h3>Números del cartón: </h3>";
		// Bucle para generar los números aleatorios del cartón
		while (count($carton)<15) {
			$numeros_carton=rand(1,100);
			if(!in_array($numeros_carton,$carton)){
				$carton[]=$numeros_carton;
			}
			echo " | ".$numeros_carton;
		}
		echo "<br>";

		// Declaro las variables para tachar y sacar el número de extracciones
		$numeroDeTachados = 0;
		$numeroDeExtracciones = 0;

		// Un foreach para hacer la lógica del juego, básicamente; donde tacharé un número (en caso haya salido)
		foreach ($bombo as $numeroSalido) {
			$numeroDeExtracciones++;
			echo "<br>";
			echo "Ha salido el número $numeroSalido.";
			// Método in_array para saber si uno de los números salidos está en mi cartón 
			if(in_array($numeroSalido,$carton)){
				$numeroDeTachados++;
				echo " Has acertado y lo tacho del cartón.";
			}else{
				echo " No está en el cartón.";
			}
			echo "<br>";

			//if para confirmar los 15 números tachados y terminar el juego
			if($numeroDeTachados===15){
				echo "<br>";
				echo "Enhorabuena, has cantado bingo con $numeroDeExtracciones extracciones de bolas.";
				break;
			}
		}
	?>
</body>
</html>
<?php
// Creamos el bombo con los números del 1 al 100
$bombo = range(1, 100);

// Mezclamos el bombo para que los números salgan aleatoriamente
shuffle($bombo);

// Generamos un cartón con 15 números únicos aleatorios
$carton = array_rand(array_flip(range(1, 100)), 15);
sort($carton); // Ordenamos los números del cartón

// Mostramos el cartón bonito
echo "<pre>"; // Usamos <pre> para mantener formato tipo consola
echo "=======================<br>";
echo "🎱 TU CARTÓN DE BINGO 🎱<br>";
echo "=======================<br>";
echo implode(' | ', $carton) . "<br>";
echo "=======================<br><br>";

$numerosTachados = 0;
$extracciones = 0;

// Jugamos hasta que el cartón esté completo
foreach ($bombo as $bola) {
    $extracciones++;
    echo "🔔 Ha salido el número: $bola<br>";

    if (in_array($bola, $carton)) {
        echo "✅ ¡Has acertado! Lo tachamos del cartón.<br>";

        // Quitamos el número del cartón
        $carton = array_diff($carton, [$bola]);
        $numerosTachados++;
    } else {
        echo "❌ No está en el cartón.<br>";
    }

    echo "-----------------------<br>";

    // Si hemos tachado los 15 números, terminamos el juego
    if ($numerosTachados == 15) {
        echo "🎉 ¡Enhorabuena, has cantado bingo con $extracciones extracciones de bolas! 🎉<br>";
        break;
    }
}
?>
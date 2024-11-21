<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bingo</title>
</head>
<body>
    <?php
        // Crear un cartón de bingo con 15 números únicos
        $cartaBingo = [];
        while (count($cartaBingo) < 15) {
            $numero = rand(1, 100);
            if (!in_array($numero, $cartaBingo)) {
                $cartaBingo[] = $numero;
            }
        }
        // Ordenar el cartón
        sort($cartaBingo);

        echo "<h2>Tu cartón de Bingo:</h2>";
        echo "<p>" . implode(", ", $cartaBingo) . "</p>";

        // Variables para el juego
        $numerosExtraidos = [];
        $turnos = 0;
        $ganado = false;

        echo "<h2>Resultados del juego:</h2>";

        // Simular 73 extracciones
        while ($turnos < 73 && !$ganado) {
            $turnos++;
            do {
                $numeroExtraido = rand(1, 100);
            } while (in_array($numeroExtraido, $numerosExtraidos)); // Evitar números repetidos

            $numerosExtraidos[] = $numeroExtraido;

            // Comprobar si el número está en el cartón
            if (in_array($numeroExtraido, $cartaBingo)) {
                // Tachar el número del cartón
                $key = array_search($numeroExtraido, $cartaBingo);
                unset($cartaBingo[$key]);

                echo "<p>Ha salido el número <strong>$numeroExtraido</strong>. Lo tengo y lo tacho del cartón.</p>";
            } else {
                echo "<p>Ha salido el número <strong>$numeroExtraido</strong>. No lo tengo.</p>";
            }

            // Comprobar si el cartón está vacío
            if (empty($cartaBingo)) {
                $ganado = true;
                echo "<h3>¡Enhorabuena! Has ganado en $turnos extracciones.</h3>";
            }
        }

        // Si no se ha ganado en 73 turnos
        if (!$ganado) {
            echo "<h3>No has completado el cartón en 73 extracciones.</h3>";
        }
    ?>
</body>
</html>

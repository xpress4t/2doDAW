<?php
$min = rand(1, 5);
$max = rand(6, 10);

if ($min > $max) {
    $temp = $min;
    $min = $max;
    $max = $temp;
}

echo "<h1>Tablas de multiplicar del $min al $max</h1>";

for ($tabla = $min; $tabla <= $max; $tabla++) {
    echo "<h2>Tabla del $tabla</h2>";
    for ($i = 1; $i <= 10; $i++) {
        $resultado = $tabla * $i;
        echo "<p>$tabla x $i = $resultado</p>";
    }
}

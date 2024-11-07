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
    $index = 0;
    while($index <= 10){
        echo "<p>El contador vale: $index </p>";
        $index++;
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $numero = 1;

        switch($numero){
            case 1:
                echo "Lunes";
            break;
            case 2:
                echo "Martes";
            break;
            case 3:
                echo "Miércoles";
            break;
            case 4:
                echo "Jueves";
            break;
            case 5:
                echo "Viernes";
            break;
            case 6:
                echo "Sábado";
            break;
            case 7:
                echo "Domingo";
            break;
        }

        echo "<h2>Operaciones básicas</h2>";

        $var1 = 6;
        $var2 = 9;
        $operador = "/";

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
        echo "<br>";
        echo "<br>";
        echo "<br>";

        $altura = 5;

        for ($m=1;$m<=$altura;$m++){
            for($n=1;$n<=(2*$m-1);$n++){
                echo "*";
            }
            echo "<br>";
        }
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php</title>
</head>
<style>
    .piramide{
    background-color: rgb(58, 58, 58);
    color: rgb(7, 170, 7);
    height: 300px;
    width: 300px;
    }
</style>
<body>
    <div class="piramide">
        <?php
            echo "<br>";
            echo "<br>";
            echo "<br>";
            $altura = 10;

            for($fila=0;$fila<$altura;$fila++){
                for($espacio=0;$espacio<($altura-$fila-1);$espacio++){
                    echo "&nbsp;&nbsp;";
                }
                for($asterisco=0;$asterisco<($fila*2)+1;$asterisco++){
                    echo "*";
                }
                echo "<br>";
            }
        ?>
    </div>
</body>
</html>
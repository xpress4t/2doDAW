<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php</title>
</head>
<style>
    body{
        font-size: 24px;
    }
    .piramide{
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
    <br>
    <br><br>

    <?php
        $array_asociativo = ["key1" => "value1", "key2" => "value2", "key3" => "value3"];
        $valor = "value2";
        if(in_array($valor,$array_asociativo)){
            echo "El valor `$valor` value se encuentra en tu array asociativo :)";
        }else{
            echo "El valor `$valor` no se encuentra en tu array asociativo :(";
        }
        // para acceder a una variable enviada a traves de n formulario 
        // $_POST["nombre"]
        // método para enviar datos a través de una URL --> GET
    ?>
</body>
</html>
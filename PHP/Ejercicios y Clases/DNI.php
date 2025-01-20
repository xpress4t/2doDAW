<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Comprobador DNI</title>
</head>
<body>
    <?php
    $letras = ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E'];

    // T => 0, R => 1, W => 2, A => 3, G => 4, M => 5, Y => 6, F => 7, P => 8, D => 9, X => 10, B => 11, N => 12, J => 13, Z => 14, S => 15, Q => 16, V => 17, H => 18, L => 19, C => 20, K => 21, E => 22

    $dniValido = false;
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $dni = $_POST['dni'];
        
        if(preg_match('/^[0-9]{8}[A-Za-z]{1}$/',$dni)){
            $numero = substr($dni,0,8);
            $letra = strtoupper(substr($dni,-1));
            $letraDNI = $letras[$numero%23];

            if($letra == $letraDNI){
                $dniValido = true;
            }else{
                echo "<p>La letra no corresponde al número del DNI</p>";
            }
        }else{
            echo "<p>DNI no válido. Debe tener 8 dígitos y una letra al final</p>";
        }
    }

    if(!$dniValido){
        echo '<form action="" method="POST">';
        echo '<label for="dni">Introduce tu DNI:</label>';
        echo '<input type="text" name="dni" id="dni" required placeholder="12345678A">';
        echo '<button type="submit">Validar</button>';
        echo '</form>';
    }else{
        echo '<p>DNI correcto</p>';
        echo '<a href="">DNI correcto, click aquí deseas intentar nuevamente</a>';
    }
    ?>
</body>
</html>
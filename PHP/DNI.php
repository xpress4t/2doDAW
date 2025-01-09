<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificador de DNI</title>
</head>
<body>
    <?php
    $letrasAsignadas = ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E'];
    $dniValido = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dni = $_POST['dni'];
        if (preg_match('/^[0-9]{8}[A-Za-z]{1}$/',$dni)) {
            $numero = substr($dni,0,8);   
            $letra = strtoupper(substr($dni,-1));
            $letraDNI = $letrasAsignadas[$numero%23];

            if ($letra == $letraDNI) {
                $dniValido = true;
            } else {
                echo "<p>La letra no corresponde al número proporcionado.</p>";
            }
        } else {
            echo "<p>DNI no válido. Debe tener 8 dígitos seguidos de una letra.</p>";
        }
    }
    
    if (!$dniValido) {
        echo '<form action="" method="POST">';
        echo '<label for="dni">Introduce tu DNI:</label>';
        echo '<input type="text" name="dni" id="dni" required pattern ="[0-9]{8}[A-Za-z]{1}" placeholder="12345678A">';
        echo '<button type="submit">Validar</button>';
        echo '</form>';
    } else {
        echo '<p>DNI correcto.</p>';
        echo '<a href="">Tu DNI es correcto, click si deseas intentar nuevamente</a>';
    }
    ?>
</body>
</html>
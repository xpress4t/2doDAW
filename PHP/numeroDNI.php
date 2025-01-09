<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar DNI</title>
    <style>
        * {
            color: blue;
        }
    </style>
</head>
<body>
    <?php
    function validarDNI($dni) {
        $letras = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $numero = substr($dni, 0, -1);
        $letra = strtoupper(substr($dni, -1));
        if (is_numeric($numero) && strlen($numero) == 8) {
            $resto = $numero % 23;
            return $letra === $letras[$resto];
        }
        return false;
    }

    $mensaje = "";
    $dni_valido = false;
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $dni = $_POST['dni'] ?? '';
        if (validarDNI($dni)) {
            $mensaje = "¡DNI válido!";
            $dni_valido = true;
        } else {
            $mensaje = "DNI incorrecto. Inténtalo de nuevo.";
        }
    }
    ?>

    <?php if (!$dni_valido): ?>
    <form action="" method="POST">
        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="dni" maxlength="9" required>
        <button type="submit">Validar</button>
    </form>
        <?php endif; ?>
</body>
</html>
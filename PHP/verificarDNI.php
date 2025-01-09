<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Verificador DNI</p>
    <form action="verificarDNI.php" method="POST">
        <label for="dni">Introduce tu DNI:</label>
        <input type="text" name="dni" id="dni" required>
        <a href="verificarDNI.php">Validar</a>
    </form>

    <?php
        function validarDNI($dni) {
            $patron = '/^[0-9]{8}[A-Z]$/';
            if (preg_match($patron, $dni)) {
                return "El formato del DNI es correcto.";
            } else {
                return "El formato del DNI es incorrecto.";
            }
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['dni'])) {
                $dni = $_GET['dni'];
                echo validarDNI($dni);
            } else {
                echo "Proporciona un DNI";
            }
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['dni'])) {
                $dni = $_POST['dni'];
                echo validarDNI($dni);
            }
        }
    ?>
</body>
</html>
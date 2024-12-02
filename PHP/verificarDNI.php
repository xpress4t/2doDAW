<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Validador de DNI</h1>
    <form action="verificarDNI.php" method="POST">
        <label for="dni">Introduce tu DNI:</label>
        <input type="text" name="dni" id="dni" required>
        <button type="submit">Validar</button>
    </form>

    <?php
        function validarDNI($dni) {
            // Expresión regular para el formato (8 números seguidos por una letra)
            $patron = '/^[0-9]{8}[A-Za-z]$/';
        
            // Validar el DNI usando la expresión regular
            if (preg_match($patron, $dni)) {
                return "El formato del DNI es correcto.";
            } else {
                return "El formato del DNI es incorrecto.";
            }
        }
        // Comprobación si se recibe una solicitud GET o POST
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Obtener el DNI de los parámetros de consulta
            if (isset($_GET['dni'])) {
                $dni = $_GET['dni'];
                echo validarDNI($dni);
            } else {
                echo "Por favor, proporciona un DNI en el parámetro 'dni'.";
            }
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener el DNI desde el cuerpo de la solicitud
            if (isset($_POST['dni'])) {
                $dni = $_POST['dni'];
                echo validarDNI($dni);
            }
        }
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Datos</title>
</head>
<body>
    <!-- Formulario que envía datos a la misma página -->
    <form action="formulario.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <br><br>
        
        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad" required>
        <br><br>
        
        <input type="submit" value="Enviar">
    </form>

    <?php
    // Verifica si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos enviados por el usuario
        $nombre = $_POST["nombre"];
        $edad = $_POST["edad"];

        // Mostrar los datos procesados
        echo "<h3>Datos recibidos:</h3>";
        echo "Nombre: " . htmlspecialchars($nombre) . "<br>";
        echo "Edad: " . htmlspecialchars($edad) . "<br>";
    }
    ?>

</body>
</html>

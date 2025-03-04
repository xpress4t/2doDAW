<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actores</title>
</head>

<body>
    <?php
    include 'conexion.php';
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = trim($_POST['nombre']); // trim() elimina espacios en blanco al inicio y al final
        $apellidos = trim($_POST['apellidos']);
        $fechaNacimiento = $_POST['fec_nacimiento'];
        $fechaMuerte = $_POST['fec_muerte'];
        $foto = $_FILES['foto'];

        
        /*
        // Verificar el nombre tiene como maximo 30 caracteres
        if (strlen($nombre) > 30) {
            $errors['nombre'] = "El nombre no puede tener más de 30 caracteres.";
        }

        // Verificar que el apelido no tenga más de 40 caracteres
        if (!empty($apellidos)) {
            if (strlen($apellidos) > 40) {
                $errors['apellidos'] = "El apellido no puede tener más de 40 caracteres.";
            }
        } else {
            $apellidos = "";
        }

        // Verificar si hay fecha de muerte
        if (!empty($fechaMuerte)) {
            if ($fechaMuerte < $fechaNacimiento) {
                $errors['fec_nacimiento'] = "La fecha de muerte no puede ser anterior a la fecha de nacimiento.";
            }
        } else {
            $fechaMuerte = "9999-12-31";
        }
        // Verificar si hay foto
        if(!empty($foto)) {
            if(strlen($foto['name']) > 50) {
                $errors['foto'] = "El nombre de la foto no puede tener más de 50 caracteres.";
            }else if($foto['size'] > 1*1024*1024) {
                $errors['foto'] = "La foto no puede tener un tamaño mayor a 1MB.";
            }else if($foto['type'] != 'image/jpeg' && $foto['type'] != 'image/png') {
                $errors['foto'] = "La foto debe ser de tipo jpg o png.";
            }else{
                // Mover la foto

            }
            
        }else {
            $foto = "nd";
        }



        // Codigo para bbdd

        // Verificar los datos que estoy enviando por POST
        foreach ($_POST as $campo => $valor) {
            echo "<p>$campo: $valor</p>";
        }
        var_dump ($errors);
        */

        if (strlen($nombre) > 30) {
            $errors['nombre'] = "El nombre no puede tener más de 30 caracteres.";
        }
    
        if (strlen($apellidos) > 40) {
            $errors['apellidos'] = "El apellido no puede tener más de 40 caracteres.";
        }
    
        if (!empty($fechaMuerte) && $fechaMuerte < $fechaNacimiento) {
            $errors['fec_nacimiento'] = "La fecha de muerte no puede ser anterior a la fecha de nacimiento.";
        } else if (empty($fechaMuerte)) {
            $fechaMuerte = "9999-12-31";
        }
    
        $fotoPath = 'nd';
        if ($foto['name']) {
            $uploadDir = 'media/img/actores/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
    
            $fotoPath = $uploadDir . basename($foto['name']);
            if (file_exists($fotoPath)) {
                $errors['foto'] = "La foto ya existe en el servidor.";
            } else if ($foto['size'] > 1 * 1024 * 1024 || !in_array($foto['type'], ['image/jpeg', 'image/png'])) {
                $errors['foto'] = "La foto debe ser JPG o PNG y no superar 1MB.";
            }
        }
    
        if (empty($errors)) {
            try {
                $conexion = new mysqli($servidor, $usuario, $password, $bbdd);
                if ($conexion->connect_error) {
                    throw new Exception("Conexión fallida: " . $conexion->connect_error);
                }
    
                $stmt = $conexion->prepare("INSERT INTO actores (nombre, apellidos, fec_nacimiento, fec_muerte, foto) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $nombre, $apellidos, $fechaNacimiento, $fechaMuerte, $fotoPath);
                
                if (!$stmt->execute()) {
                    if ($conexion->errno == 1062) {
                        echo "<p style='color: red;'>El actor ya está registrado.</p>";
                    } else {
                        throw new Exception("Error en la inserción: " . $stmt->error);
                    }
                } else {
                    if ($foto['name']) {
                        move_uploaded_file($foto['tmp_name'], $fotoPath);
                    }
                    echo "<p style='color: green;'>Actor insertado correctamente.</p>";
                }
    
                $stmt->close();
                $conexion->close();
            } catch (Exception $e) {
                echo "<p style='color: red;'>" . $e->getMessage() . "</p>";
            }
        }
    }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <h1>Insertar Autor</h1>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre" id="nombre" autofocus required>
        <?php if (isset($errors['nombre'])) echo '<p style="color: red;">' . $errors['nombre'] . '</p>'; ?>
        <br><br>

        <label for="apellidos">Apellidos: </label>
        <input type="text" name="apellidos" id="apellidos">
        <?php if (isset($errors['apellidos'])) echo '<p style="color: red;">' . $errors['apellidos'] . '</p>'; ?>
        <br><br>

        <label for="fec_nacimiento">Fecha de nacimiento: </label>
        <input type="date" name="fec_nacimiento" id="fec_nacimiento">
        <br><br>
        <label for="fec_muerte">Fecha de muerte: </label>
        <input type="date" name="fec_muerte" id="fec_muerte">
        <br><br>
        <label for="foto">Foto: </label>
        <input type="file" name="foto" id="foto">
        <?php if (isset($errors['foto'])) echo '<p style="color: red;">' . $errors['foto'] . '</p>'; ?>
        <br><br>
        <input type="submit" value="Enviar">
        <input type="reset" value="Limpiar">
    </form>
</body>
</html>
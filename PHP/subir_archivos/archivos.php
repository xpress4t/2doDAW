<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir archivos</title>
    <style>
        *{
            font-family: "Calibri";
        }
    </style>
</head>
<body>
    <h1>Subir archivos</h1>
    <form name="formulario" action="subir_archivos.php" method="post" enctype="multipart/form-data">
        <input type="file" name="archivo" id="archivo">
        <input type="submit" name="enviar" value="Subir archivo">
    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="js/subir.js"></script>
</head>
<body>
    <?php
        if(isset($_POST['enviar'])){
            foreach($_FILES['archivo'] as $propiedad => $valor){
                echo "Propiedad: $propiedad => Valor: $valor<br>";
            }
            // Si no existe la carpeta archivos, la creamos
            if(!file_exists("archivos/")){
                mkdir("archivos/",0700);
            }
            $archivo = $_FILES['archivo']['tmp_name'];
            $tipo = $_FILES['archivo']['type'];
            $size = $_FILES['archivo']['size'];
            $destino = "archivos/".$_FILES['archivo']['name'];
            //Vamos a permitir imágenes (por ejemplo) de hasta 5MB
            if($tipo == "image/jpeg" && $size<=5242880){
                if(!file_exists($destino)){
                    if(move_uploaded_file($archivo,$destino)){
                        echo "<p style='color:green;font-size:24px'>OK</p>";
                    }else{
                        echo "Error";
                    }
                }else{
                    echo "<p style='color:red;font-size:24px'>Ya existe un archivo con ese nombre</p>";
                    echo "<button onclick='cancelar()';>Elija otro archivo</button>";
                }
            }else{
                echo "<p style='color:blue;font-size:24px'>Sólo se permite subir imágenes (jpg) de hasta 5MB</p>";
            }
        }
    ?>
</body>
</html>
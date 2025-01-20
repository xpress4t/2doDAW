<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <section id="contenedor">
        <header>
            <a href="index.php"><img src="media/cabecera.jpg" alt=""></a>
        </header>
        <main>
            <h1>Listado de contactos</h1>
            <?php
            require("conexion_agenda.php"); // Importo el archivo conexion_agenda.php
            try{
                $conexion=mysqli_connect($servidor,$usuario,$password,$bbdd);
                if(!$conexion){
                    throw new Exception("No se pudo conectar al servidor: ".mysqli_connect_error());
                }
                if(!mysqli_select_db($conexion,$bbdd)){
                    throw new Exception("No se pudo encontrar la base de datos: " . mysqli_error($conexion));
                }
                mysqli_query($conexion, "SET NAMES 'UTF8'");
                $consulta = "SELECT * FROM contactos ORDER BY nombre, apellidos"; //definimos la query
                $resultado = mysqli_query($conexion,$consulta); //ejecutamos la query
                if(!$resultado){
                    throw new Exception("Error al ejecutar la consulta: " . mysqli_error($conexion));
                }
                while($fila = mysqli_fetch_array($resultado)){
                    echo "<p>$fila[cod_contacto]</p>";
                    echo "<p>$fila[nombre]</p>";
                    echo "<p>$fila[apellidos]</p>";
 
                }
            }catch(Exception $e){
                echo "<p>error: ".mysqli_errno($conexion)."</p>";
                echo "<p>Mensaje: ".mysqli_error($conexion)."</p>";
            }  
            ?>
        </main>
        <aside>
 
        </aside>
        <footer>
 
        </footer>
    </section>
</body>
</html>
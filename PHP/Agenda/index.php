<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/style.css">
    <script src="borrar.js"></script>
</head>
<body>
    <h1>Listado de contactos</h1>
    <?php
    // require("conexion_agenda.php"); // Importo el archivo conexion_agenda.php
    // try{
    //     $conexion=mysqli_connect($servidor,$usuario,$password,$bbdd);
    //     if(!$conexion){
    //         throw new Exception("No se pudo conectar al servidor: ".mysqli_connect_error());
    //     }
    //     if(!mysqli_select_db($conexion,$bbdd)){
    //        throw new Exception("No se pudo encontrar la base de datos: " . mysqli_error($conexion));
    //    }
    //     mysqli_query($conexion, "SET NAMES 'UTF8'");
    //     $consulta = "SELECT * FROM contactos ORDER BY nombre, apellidos"; //definimos la query
    //     $resultado = mysqli_query($conexion,$consulta); //ejecutamos la query
    //    if(!$resultado){
    //         throw new Exception("Error al ejecutar la consulta: " . mysqli_error($conexion));
    //     }
    //     while($fila = mysqli_fetch_array($resultado)){
    //         echo "<p>$fila[cod_contacto]</p>";
    //         echo "<p>$fila[nombre]</p>";
    //         echo "<p>$fila[apellidos]</p>";
    //     }
    // }catch(Exception $e){
    //     echo "<p>error: ".mysqli_errno($conexion)."</p>";
    //     echo "<p>Mensaje: ".mysqli_error($conexion)."</p>";
    // }
    /*error_reporting(0) desactiva la notificacion de errores*/
    /*error_reporting(E_ALL ^ E_WARNING/E_NOTICE) desactivar todo excepto tal o/tal */
    // error_reporting(0);
    try{
        require("conexion_agenda.php");
    
    }catch(Throwable $t){
        echo "<p>----------------------------------------</p>";
        echo "Mensaje: ".$t->getMessage();
        echo "<p>----------------------------------------</p>";
        exit();
    }

    try{
    // 1.- Conexión
    $conexion = mysqli_connect($servidor,$usuario,$password,$bbdd);
    mysqli_query($conexion,"SET NAMES 'UTF8'");
    // 2.- Seleccionamos la BBDD
    if(mysqli_select_db($conexion,$bbdd)){
        // 3.- Definimos la query
        $consulta = "SELECT * FROM contactos ORDER BY nombre, apellidos;";
        // 4.- Ejecutamos la consulta
        $resultado = mysqli_query($conexion, $consulta);
        // 5.- Mostramos por pantalla (SELECT)
        $contador=0;
        while($fila=mysqli_fetch_array($resultado)){
            // Declaramos la variable ruta que es la que buscará las imágenes que tenemos
            $ruta="media/img/".$fila['foto'];
            if($contador%2==0){
                // echo "<section class='info-par'>";
            }else{
                // echo "<section class='info-impar'>";
            }
            if(file_exists($ruta)){
                echo "<img src='$ruta'>";
            }else{
                echo "<br>";
                // Muestra una imagen de error cuando no se encuentra la foto del usuario
                echo "<img src='media/img/error.webp'>";
            }

            echo "<a href='mostrar_ficha.php?cod_contacto=$fila[cod_contacto]
            &nombre=$fila[nombre]
            &apellidos=$fila[apellidos]
            &mail=$fila[mail]
            &telefono=$fila[telefono]
            &observaciones=$fila[observaciones]
            &foto=$fila[foto]'>$fila[nombre] $fila[apellidos]</a>";

            // Añadiendo función para borrar un contacto 
            // También se puede escribir \"$fila[nombre] $fila[apellidos]\"
            echo "<a onclick='borrar($fila[cod_contacto],`$fila[nombre] $fila[apellidos]`);'>
                <img src='media/img/papelera.jpg' 
                alt='Eliminar contacto' 
                title='Borrar contacto' 
                style='cursor:pointer;border:1px solid black;'
                $fila[nombre] 
                $fila[apellidos]>
            </a>";
            echo "</section>";
            $contador++;
            /*
            echo "<p style='color:red'>$fila[cod_contacto]</p>";
            echo "<p>$fila[nombre]</p>";
            echo "<p>$fila[apellidos]</p>";
            */
        }
    }
    mysqli_close($conexion);
    }catch(mysqli_sql_exception $mse){
        //ha saltado una excepcion y vamos a mostrar error
        echo "<p>Nº de error: ".$mse->getCode()."</p>";
        echo "<p>Mensaje: ".$mse->getMessage()."</p>";
    }
    /*
    mostrar_contactos.php -> (dibujo de un lapiz) -> editar_contacto.php
    UPDATE contactos SET
    nombre = (una caja, o sa un input)
    WHERE cod_contacto = (una caja, o sea un input)
    */
    ?>
</body>
</html>
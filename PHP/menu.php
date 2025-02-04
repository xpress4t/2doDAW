<?php
    require_once('sesion.php');
    echo "<p>Usuario conectado: ".$_SESSION['usuario']."</p>";
    echo "<p><a href='archivo_protegido1.php'>Archivo 1</a></p>";
    echo "<p><a href='archivo_protegido2.php'>Archivo 2</a></p>";
    echo "<p><a href='salir.php'>Salir</a></p>";
?>
<?php
    if(isset($_GET['nombre'])&& isset($_GET['edad'])){
        $nombre = $_GET['nombre'];
        $edad = $_GET['edad'];
        echo "Nombre: $nombre, Edad: $edad";
    }else{
        echo "No se pasaron datos";
    }
?>
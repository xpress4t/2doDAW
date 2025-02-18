<?php
    $DB_HOST = "localhost";
    $DB_USER = "root";
    $DB_PASSWORD = "";
    $DB_NAME = "pruebas";

    
    function getUser($email){

        global $DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME;

        $connectionBBDD = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
        if(!$connectionBBDD){
            die("Conexión fallida: ".mysqli_connect_error());
        }

        $email = mysqli_real_escape_string($connectionBBDD, $email);

        $query = "SELECT id, email, password FROM usuarios WHERE email='$email'";
        $resultado = mysqli_query($connectionBBDD, $query);

        if(!isset($resultado) || mysqli_num_rows($resultado) == 0){
            return false;
        }
        
        $user = $resultado->fetch_assoc();
        return $user;
    }

    
?>
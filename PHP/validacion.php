<?php
// Esto a futuro debemos hacerlo con contraseñas encriptadas
    if(isset($_POST['enviar'])){
        // Validar por código
        // Esto para la base de datos
        $usuario = $_POST['usuario'];
        $pass = $_POST['pass'];

     
        $consulta = "SELECT * FROM usuarios WHERE user='$usuario' AND contrasena='$pass'";

        if($_POST['usuario']=="pepe@gmail.com" && $_POST['pass']=="123456"){
            //Existe el usuario --> abrimos una sesión
            session_start(); // Variables de sesión que vamos a utilizar y que vamos a necesitar
            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['logueado'] = true; // Para saber si la sesión está vigente
            $_SESSION['hora'] = time(); // Para saber cuándo se ha logueado
            header("Location: archivo_protegido1.php");
        }else{
           header("Location: index_sesiones.php?mensaje=error"); 
        }
    }else{
        header("Location: index_sesiones.php");
    }
?>
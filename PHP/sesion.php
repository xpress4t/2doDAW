<?php
    session_start();
    if(!$_SESSION['logueado']){
        // Si entro por aquí, quiere decir que la sesión NO está vigente
        session_destroy();
        header("Location: index_sesiones.php");
    }

    // Caduca a los 10 segundos 
    if($_SESSION['hora']+10<time()){
        session_destroy();
        header("Location: index_sesiones.php?mensaje=caducada");
    }

    // Expira por inactividad (5 segundos)
    if(isset($_SESSION['timeout'])){
        // Si ingreso a las 12:00:00 y ahora son las 12:00:07
        // time() sería --> 12:00:07, por lo cual 12:00:07 - 12:00:00 = 7
        // Entonces $vida_sesion = 7 > 5 --> TRUE
        // Me expulsa por inactividad
        $vida_sesion = time() - $_SESSION['timeout'];
        if($vida_sesion > 5){
            // Fin por inactividad
            session_destroy();
            header("Location: index_sesiones.php?mensaje=inactividad");
        }
    }

    $_SESSION['timeout'] = time();
?>

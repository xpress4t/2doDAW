<?php
    require_once("./Services/Database.php");

    function userAuthenticate($email,$password){
        $user = getUser($email,$password);

        if($user == false || $user["password"] !== $password){
            return false;
        }

        $user["password"] = null; // BORRAR LA CONTRASEÑA DEL USUARIO
        
        $_SESSION['user'] = $user;
        $_SESSION['time'] = time();
    }
?>
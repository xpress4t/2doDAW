<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Es para saber si estoy por GET o por POST
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            extract($_POST); // si necesito un array asociativo, convierte una clave-valor en una variable
            // print_r($_POST);
            // echo empty($palabras)."-> palabras<br>"; // Para saber si una variable tiene valor
            // echo empty($palabrasDiferentes)."-> palabras<br>";
            // echo isset($palabras)."-> palabras<br>";
            // echo isset($palabras123)."-> palabras<br>";
            // echo $palabras."<br>";
            // echo $palabrasDiferentes."<br>";
            // echo $_POST["palabras"]."<br>";
            // echo $_POST["palabrasDiferentes"]."<br>";
            //print_r($_GET);
        }
    ?>
    <!-- 
    $SERVER -> Variable superglobal que contiene la información del servidor
    
    echo $_SERVER["PHP_SELF"]; -> Manda la información al mismo archivo           
    si quiero otra dirección se le pone ./pepitolospalotes.php o ../ 
    en lugar de PHP_SELF -->
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
        <br>
        <label for="">Introduce palabras separadas por comas:</label>
        <input name="palabras" value="<?php if(isset($palabras)) echo $palabras ?>" autofocus required>
        <br><br>
        <label for="">Introduce palabras separadas por comas:</label>
        <input name="palabrasDiferentes">
        <br><br>
        <input type="submit" value="Procesar">
    </form>
</body>
</html>
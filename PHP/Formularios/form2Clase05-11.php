<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        print_r($_POST);
        extract($_POST);
        if(isset($chk)){
            echo "has pulsado.<br>";
        }else{
            echo "no has pulsado.<br>";
        }
    }
    ?>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
        <br>
        <label for="">Introduce palabras separadas por comas:</label>
        <input name="palabras" value="<?php if(isset($palabras)) echo $palabras ?>" autofocus required>
        <br><br>
        <label>Clicka o no... tú sabrás: </label>
        <input name="chk" type="checkbox" <?php if(isset($chk)) echo "checked";?> >
        <br><br>
        <input type="submit" value="Procesar">
    </form>
</body>
</html>
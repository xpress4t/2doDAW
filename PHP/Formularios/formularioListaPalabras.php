<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            extract($_POST);

            if(empty($words)){
                $error = "Introduce una lista de palabras separadas por comas.";
            }else{
                // Convertimos la cadena en un array usando explode
                $wordsArray = explode(",",$words);


                $wordsArray = array_map('trim',$wordsArray);

                $result = implode(",");
            }
        }
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
        <h2>Lista de palabras procesada:</h2>
        <br>
        <label for="">Introduce palabras separadas por comas: </label>
        <input name="palabras" value="<?php if(isset($palabras)) echo $palabras ?>" autofocus required>
        <input type="submit" name="enviar" value="Procesar">
    </form>
</body>
</html>
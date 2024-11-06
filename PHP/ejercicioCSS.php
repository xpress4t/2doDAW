<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
</head>
<style>
    body{
        text-align: center;
        justify-content: center;
        border: solid 1px red;
        display: flex;
    }
    .modoClaro{
        background: white;
        color: black;
    }

    .modoOscuro{
        background: black;
        color: white;
    }
</style>

<?php
    if(isset($_POST['check'])){
        $class='modoClaro';
    }else{
        $class='modoOscuro';
    }
?>
<!-- En el body llamo a la lógica que hice en php como una class-->
<body class="<?php echo $class; ?>">
    <form method="post">
        <label for="check">Clicka si quieres cambiar de fondo: </label>
        <input type="checkbox" name="check" id="check" <?php if(isset($_POST['check'])) echo 'checked'; ?>>
        <input type="submit" name="enviar" value="Procesar">
    </form>
</body>
</html>
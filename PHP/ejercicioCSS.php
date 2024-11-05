<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .fondo1{
        background-image: url("https://www.dzoom.org.es/wp-content/uploads/2017/07/seebensee-2384369-810x540.jpg");
    }

    .fondo2{
        background-image: url("https://content.nationalgeographic.com.es/medio/2022/12/01/under-the-rainbow_00000000_221201164428_1200x987.jpg");
    }
</style>
<body class="<?php echo (isset($_POST['check']) ? 'fondo2' : 'fondo1'); ?>">
    <form method="post">
        <label for="check">Clicka si quieres cambiar de fondo: </label>
        <input type="checkbox" name="check" id="check" <?php if(isset($_POST['check'])) echo 'checked'; ?>>
        <input type="submit" name="enviar" value="Procesar">
    </form>
</body>
</html>
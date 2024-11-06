<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size: 20px;
    }
    form{
        margin: auto;
        padding: 2rem; 
        width: 35vw;
    }
    @keyframes rainbow-text {
            0% { color: red; }
            20% { color: orange; }
            40% { color: black; }
            60% { color: green; }
            80% { color: blue; }
            100% { color: purple; }
    }

    .rgb {
        font-weight: bold;
        animation: rainbow-text 3s infinite;
    }
</style>
<body>
    <?php
        $nombreError = $correoError = $edadError = $sexoError = $paisError = "";
        $nombre = $correo = $edad = $sexo = $pais = "";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            print_r($_POST);
            extract($_POST);
            if (!empty($_POST["nombre"])) {
                $nombre = trim($_POST["nombre"]);
            }
        }
        if(empty($nombre)){
            $nombreError = "El nombre es obligatorio.";
        }
        if(empty($email)){
            $emailError = "El correo electrónico es obligatorio.";
        }
        if(empty($edad)){
            $edadError = "La edad es obligatoria.";
        }
        if(empty($sexo)){
            $sexoError = "El sexo es obligatorio.";
        }
        if(empty($pais)){
            $paisError = "El país es obligatorio.";
        }
    ?>
    <br><br><br>
    <form action="" method="POST">
        <label for="">Nombre completo: </label>
        <input type="text" name="nombre" autofocus>
        <span style="color:red;"><?php echo $nombreError; ?></span>
        <br><br>    

        <label for="">Correo electrónico: </label>
        <input type="email" name="email">
        <span style="color:red;"><?php echo $emailError; ?></span>
        <br><br>

        <label for="">Edad: </label>
        <input type="number" name="edad">
        <span style="color:red;"><?php echo $edadError; ?></span>

        <br><br>

        <label for="">Sexo: </label>
        <input type="radio" name="sexo">Masculino
        <input type="radio" name="sexo">Femenino
        <span class="rgb" style="color:red;"><?php echo $sexoError; ?></span>
        <br><br>

        <label for="">País de residencia: </label>
        <select name="pais" id="">
            <option value="0">Escoge tu país...</option>
            <option value="1">Alemania</option>
            <option value="2">Bélgica</option>
            <option value="3">España</option>
            <option value="4">Perú</option>
        </select>
        <span style="color:red;"><?php echo $paisError; ?></span>
        <br><br>

        <label for="">Hobbies: </label>
        <input type="checkbox" name="hobbies[]"> Lectura
        <input type="checkbox" name="hobbies[]"> Dormir
        <input type="checkbox" name="hobbies[]"> Deportes
        <input type="checkbox" name="hobbies[]"> Música
        <input type="checkbox" name="hobbies[]"> Viajar
        <input type="checkbox" name="hobbies[]"> Cine
        <br><br>

        <input class="x" type="submit" name="Procesar" value="Enviar 🤑">
    </form>
</body>
</html>
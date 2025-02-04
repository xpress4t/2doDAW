<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale-=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<title>Login</title>
    <style>
        h1{
            text-align: center;
        }
        body{
            background:rgb(157, 157, 157);
        }
        *{
		padding: 0;
		margin-left: 1em;
		font-family: calibri;
        }
        label{
            display: block;
        }
        .botones{
            margin-top: 1em;
        }
        .form-control{
            border: 1px solid blue;
        }
        #formulario{
            border: 1px solid black;
            padding: 1em;
            width: 50%;
            margin: auto;
        }
    </style>
</head>
<body>
	<h1>Validación de usuario (sesiones)</h1>
    <!-- Feedback -->

    <?php
        if(isset($_GET['mensaje'])){
            if($_GET['mensaje']=="error"){
                echo "<p style='color:red'>Credenciales incorrectas</p>";
            }else if($_GET['mensaje']=="caducada"){
                echo "<h2 style='color:red'>Sesión caducada por tiempo</h2>";
            } else if($_GET['mensaje']=="inactividad"){
                echo "<h2 style='color:red'>Sesión caducada por inactividad</h2>";
            }
        }else{
            echo "<h2>Introduzca sus credenciales</h2>";
        }
    ?>
	<form id="formulario" name="sesiones" action="validacion.php" method="post" enctype="application/x-www-form-urlencoded">
		<label>Usuario:</label>
        <!-- Bootstrap -->
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <input type="text" name="usuario" maxlength="50" required autofocus id="inputPassword6" class="form-control" aria-describedby="textHelpInline">
            </div>
        </div>
        <label>Contraseña:</label>
        <!-- Bootstrap -->
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <input type="password" name="pass" minlength="6" maxlength="20" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
            </div>
        </div>

        <div class="botones">
            <input class="btn btn-primary" type="submit" name="enviar" value="Acceder">
            <input class="btn btn-danger" type="reset" value="Borrar">
        </div>
        <br>
        <div class="spinner-border text-primary" role="status"></div>
        <div class="spinner-border text-danger" role="status"></div>
	</form>

</body>
</html>
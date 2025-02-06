<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="styles.css">
	<title>Login</title>
</head>
<body>
	<h1>Validación (evitando inyección de código)</h1>
	<form name="login" action="validar_inyeccion.php" method="post" enctype="application/x-www-form-urlencoded">
		<label>Usuario:</label>
		<input type="email" name="user" maxlength="320" autofocus required>

		<label>Contraseña:</label>
		<input type="password" name="pass" minlength="6" maxlength="20" required>

		<div class="botones">
			<input type="submit" name="enviar" value="Acceder">
			<input type="reset" value="Borrar">
		</div>
	</form>
</body>
</html>
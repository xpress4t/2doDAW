<!DOCTYPE html>
<html lang="es">
<head>
	<title>Insertar Autores</title>
</head>
<body>
	<?php
		include 'conexion.php';
		// creo un array que contenga los errores en caso los haya
		$errors = [];

		// Primero verifico el tipo de método
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			// utilizo trim() para quitar los espacios en blanco
			$nombre = trim($_POST['nombre']);
			$apellidos = trim($_POST['apellidos']);
			$fechaNacimiento = $_POST['fec_nacimiento'];
			$fechaMuerte = $_POST['fec_muerte'];
			$foto = $_FILES['foto'];

			// Comprobaciones
			// Comprobación de que el nombre no tenga más de 30 caracteres
			if(strlen($nombre) > 30){
				$errors['nombre'] = "El nombre no puede tener más de 30 caracteres";
			}

			// Comprobación de que el apellido no tenga más de 40 caracteres
			if(strlen($apellidos) > 40){
				$errors['apellidos'] = "El apellido no puede tener más de 40 caracteres";
			}

			// Comprobación de que la fecha de muerte no sea menor a la fecha de nacimiento
			// Utilizo empty() para verificar si está vacia o no
			if(!empty($fechaMuerte) && $fechaMuerte < $fechaNacimiento){
				$errors['fec_nacimiento'] = "La fecha de muerte no puede ser anterior a la fecha de nacimiento";
			} else if(empty($fechaMuerte)){
				// Se pone por defecto esta fecha si no se ingresa ninguna fecha de muerte
				$fechaMuerte = "9999-12-31";
			}

			// Comprobación para saber si la foto está subida o no
			$fotoPath = 'nd';
			if($foto['name']){
				$subirCarpeta = 'media/img/actores/';
				// Verificamos que la carpeta esté creada o no
				if(!is_dir($subirCarpeta)){
					// 0777 son los permisos que se le concede al usuario
					mkdir($subirCarpeta,0777,true);
				}

				$fotoPath = $subirCarpeta.basename($foto['name']);

				// Verificamos si la foto existe y si pesa más de 1MB
				if(file_exists($fotoPath)){
					$errors['foto'] = "La foto ya existe en el servidor";
					// Se pone por defecto del mime type, que es jpeg o jpg
				}else if($foto['size'] > 1*1024*1024 || !in_array($foto['type'],['image/jpeg','image/png'])) {
					$errors['foto'] = "La foto no debe pesar más de 1MB y debe ser png o jpg";
				}
			}

			if(empty($errors)) {
				// Conexión con la base de datos
				try{
					$conexion = new mysqli($servidor,$usuario,$password,$bbdd);

					if($conexion->connect_error){
						// Mostrar error de conexión
						throw new Exception("Error de conexión".$conexion->connect_error);
					}

					$s = $conexion->prepare("INSERT INTO actores (nombre,apellidos,fec_nacimiento,fec_muerte,foto) VALUES(?,?,?,?,?)");
					$s->bind_param("sssss",$nombre,$apellidos,$fechaNacimiento,$fechaMuerte,$fotoPath);

					if(!$s->execute()){
						if($conexion->errno == 1062){
							echo "<p style='color:red;'>El actor ya está registrado</p>";
						}else{
							throw new Exception("Error al ingresar actor".$s->error);
						}
					}else{
						// Verifico si el nombe del actor ya se encuentra registrado
						if($foto['name']){
							// temporal name
							move_uploaded_file($foto['tmp_name'],$fotoPath);
						}
						echo "<p style='color:green;'>Actor registrado correctamente</p>";
					}

					$s->close();
					$conexion->close();
				}catch (Exception $error){
					echo "<p style='color:red;'>".$error->getMessage()."</p>";
				}
			}
		}
	?>

	<!-- Formulario que se mostrará en pantalla para rellenar los datos -->
	<form method="POST" enctype="multipart/form-data">
		<!-- Utilizando php mprimiré el error en pantalla en caso no cumpla con los requerimientos  -->
		<label for="nombre">Nombre: </label>
		<input type="text" id="nombre" name="nombre" required>
		<?php if(isset($errors['nombre'])) echo '<p style = "color:red;">'.$errors['nombre'].'</p>'; ?>
		<br><br>

		<label for="apellidos">Apellidos: </label>
		<input type="text" id="apellidos" name="apellidos" >
		<?php if(isset($errors['apellidos'])) echo '<p style = "color:red;">'.$errors['apellidos'].'</p>'; ?>
		<br><br>

		<label for="fec_nacimiento">Fecha Nacimiento: </label>
		<input type="date" id="fec_nacimiento" name="fec_nacimiento">
		<br><br>

		<label for="fec_muerte">Fecha Fallecimiento: </label>
		<input type="date" id="fec_muerte" name="fec_muerte">
		<br><br>

		<label for="foto">Foto: </label>
		<input type="file" id="foto" name="foto">
		<?php if(isset($errors['foto'])) echo '<p style = "color:red;">'.$errors['foto'].'</p>'; ?>
		<br><br>

		<input type="submit" value="Enviar">
		<input type="reset" value="Borrar">
	</form>
</body>
</html>
<?php
if (isset($_POST['enviar'])) {
	extract($_POST);
	try{
		require('conexion_pruebas.php');
	}catch(Throwable $t){
		echo "<p>Mensaje: ".$t->getMessage()."</p>";
		exit();
	}

	try{
		$conexion = mysqli_connect($servidor,$usuario,$password,$bbdd);
		// ***************************************
		mysqli_query($conexion,"SET NAMES 'UTF8'");
		if(mysqli_select_db($conexion,$bbdd)){
			//Usuario: pepe@hotmail.com
			// Contraseña: 1234qwerty
			$consulta="SELECT * FROM usuarios WHERE user='$user' AND AES_DECRYPT(pass,'almandrullos')='$pass';";
			$resultado = mysqli_query($conexion,$consulta);
			if(mysqli_num_rows($resultado)==1){
				echo "<p style='color:blue'>Bienvenido ".$user."</p>";
			}else if(mysqli_num_rows($resultado)>1){
				// Escribiendo esto como contraseña => ' OR '1'='1, aparecerá este mensaje
				echo "<p>Usuario o contraseña incorrectos</p>";
			}else{
				echo "<p>No existes mano</p>";
			}
		}
		mysqli_close($conexion);
	}catch(mysqli_sql_exception $mse){
		echo "<p>Error: ".$me->getCode()."</p>";
		echo "<p>Mensaje: ".$me->getMessage()."</p>";
	}
}
?>
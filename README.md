# 2do-a-o-de-DAW
✔ Apuntes de 2do curso de Daw ✔

<?php
function validarDNI($dni) {
    if (strlen($dni) !== 9) {
        return "El formato del DNI es incorrecto. Debe tener 8 números y 1 letra.";
    }
 
    $numeros = substr($dni, 0, 8); // Los primeros 8 caracteres
    $letra = substr($dni, -1);    // El último carácter
 
    if (!ctype_digit($numeros)) {
        return "El formato del DNI es incorrecto. Los primeros 8 caracteres deben ser números.";
    }

    if (!ctype_alpha($letra)) {
        return "El formato del DNI es incorrecto. El último carácter debe ser una letra.";
    }
 
    // Si todas las validaciones pasan
    return "El formato del DNI es correcto.";
}
 
// Comprobación si se recibe una solicitud GET o POST
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Obtener el DNI de los parámetros de consulta
    if (isset($_GET['dni'])) {
        $dni = $_GET['dni'];
        echo validarDNI($dni);
    } else {
        echo "Por favor, proporciona un DNI en el parámetro 'dni'.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el DNI desde el cuerpo de la solicitud
    if (isset($_POST['dni'])) {
        $dni = $_POST['dni'];
        echo validarDNI($dni);
    } else {
        echo "Por favor, proporciona un DNI en el cuerpo de la solicitud.";
    }
} else {
    echo "Solo se aceptan solicitudes GET o POST.";
}
?>


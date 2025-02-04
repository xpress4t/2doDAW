<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

include "config.php";

$metodo = $_SERVER["REQUEST_METHOD"];
$datos = json_decode(file_get_contents("php://input"), true);

if ($metodo == "GET") {
    $condiciones = [];
    if (!empty($_GET)) {
        foreach ($_GET as $key => $value) {
            $condiciones[] = "$key LIKE '%" . mysqli_real_escape_string($conexion, $value) . "%'";
        }
    }
    
    
    $sql = "SELECT * FROM juegos";
    if (!empty($condiciones)) {
        $sql .= " WHERE " . implode(" AND ", $condiciones);
    }

    $resultado = mysqli_query($conexion, $sql);
    $juegos = [];

    while ($fila = mysqli_fetch_assoc($resultado)) {
        $juegos[] = $fila;
    }

    echo json_encode($juegos);
}

if ($metodo == "POST") {
    if (!isset($datos["titulo"], $datos["plataforma"], $datos["desarrollador"], $datos["genero"], $datos["fecha_lanzamiento"], $datos["precio"], $datos["puntuacion"])) {
        echo json_encode(["error" => "Datos incompletos"]);
        exit;
    }

    $sql = "INSERT INTO juegos (titulo, plataforma, desarrollador, genero, fecha_lanzamiento, precio, puntuacion) VALUES (
        '" . mysqli_real_escape_string($conexion, $datos["titulo"]) . "',
        '" . mysqli_real_escape_string($conexion, $datos["plataforma"]) . "',
        '" . mysqli_real_escape_string($conexion, $datos["desarrollador"]) . "',
        '" . mysqli_real_escape_string($conexion, $datos["genero"]) . "',
        '" . mysqli_real_escape_string($conexion, $datos["fecha_lanzamiento"]) . "',
        '" . mysqli_real_escape_string($conexion, $datos["precio"]) . "',
        '" . mysqli_real_escape_string($conexion, $datos["puntuacion"]) . "'
    )";

    if (mysqli_query($conexion, $sql)) {
        echo json_encode(["message" => "Juego agregado correctamente"]);
    } else {
        echo json_encode(["error" => "Error al agregar"]);
    }
}

if ($metodo == "PUT") {
    parse_str(file_get_contents("php://input"), $datos);
    
    if (!isset($datos["id"])) {
        echo json_encode(["error" => "ID requerido"]);
        exit;
    }

    $actualizaciones = [];
    foreach ($datos as $key => $value) {
        if ($key != "id") {
            $actualizaciones[] = "$key = '" . mysqli_real_escape_string($conexion, $value) . "'";
        }
    }

    $sql = "UPDATE juegos SET " . implode(", ", $actualizaciones) . " WHERE id = '" . mysqli_real_escape_string($conexion, $datos["id"]) . "'";

    if (mysqli_query($conexion, $sql)) {
        echo json_encode(["message" => "Juego actualizado"]);
    } else {
        echo json_encode(["error" => "Error al actualizar"]);
    }
}

if ($metodo == "DELETE") {
    parse_str(file_get_contents("php://input"), $datos);
    if (!isset($datos["id"])) {
        echo json_encode(["error" => "ID requerido"]);
        exit;
    }

    $sql = "DELETE FROM juegos WHERE id = '" . mysqli_real_escape_string($conexion, $datos["id"]) . "'";
    
    if (mysqli_query($conexion, $sql)) {
        echo json_encode(["message" => "Juego eliminado"]);
    } else {
        echo json_encode(["error" => "Error al eliminar"]);
    }
}

if ($metodo == "OPTIONS") {
    http_response_code(200);
}
?>

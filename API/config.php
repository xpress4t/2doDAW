<?php
$host = "localhost";
$dbname = "pruebaphp"; // Poner el nombre de nuestra base de datos en phpMyAdmin
$username = "root";
$password = "";
$conexion = mysqli_connect($host, $username, $password, $dbname);

if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}


/*
CREATE DATABASE juegos_db;
USE juegos_db;

CREATE TABLE juegos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    plataforma VARCHAR(100) NOT NULL,
    desarrollador VARCHAR(150) NOT NULL,
    genero VARCHAR(100) NOT NULL,
    fecha_lanzamiento DATE NOT NULL,
    precio DECIMAL(6,2) NOT NULL,
    puntuacion FLOAT NOT NULL CHECK (puntuacion BETWEEN 0 AND 10)
);

INSERT INTO juegos (titulo, plataforma, desarrollador, genero, fecha_lanzamiento, precio, puntuacion) VALUES
('The Legend of Zelda: Breath of the Wild', 'Nintendo Switch', 'Nintendo', 'Aventura', '2017-03-03', 59.99, 9.8),
('God of War Ragnarok', 'PlayStation 5', 'Santa Monica Studio', 'Acción', '2022-11-09', 69.99, 9.6),
('Elden Ring', 'PC', 'FromSoftware', 'RPG', '2022-02-25', 59.99, 9.7),
('Red Dead Redemption 2', 'Xbox One', 'Rockstar Games', 'Aventura', '2018-10-26', 49.99, 9.5),
('Super Mario Odyssey', 'Nintendo Switch', 'Nintendo', 'Plataformas', '2017-10-27', 59.99, 9.4),
('Cyberpunk 2077', 'PC', 'CD Projekt Red', 'RPG', '2020-12-10', 39.99, 8.5),
('Hollow Knight', 'PC', 'Team Cherry', 'Metroidvania', '2017-02-24', 14.99, 9.3),
('Final Fantasy VII Remake', 'PlayStation 4', 'Square Enix', 'RPG', '2020-04-10', 59.99, 9.0),
('Resident Evil 4 Remake', 'PlayStation 5', 'Capcom', 'Survival Horror', '2023-03-24', 59.99, 9.2),
('Minecraft', 'PC', 'Mojang Studios', 'Sandbox', '2011-11-18', 26.95, 9.6);


*/

?>

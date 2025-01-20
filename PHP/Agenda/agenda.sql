-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-01-2023 a las 16:10:19
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

DROP TABLE IF EXISTS `contactos`;
CREATE TABLE IF NOT EXISTS `contactos` (
  `cod_contacto` smallint(5) UNSIGNED NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cod_contacto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`cod_contacto`, `nombre`, `apellidos`, `mail`, `telefono`, `observaciones`) VALUES
(1, 'Fernando', 'López Sanz', 'fls@gmail.com', '900123456', 'Horario: de 9 a 18'),
(2, 'Carlos', 'Giménez López', 'cgl@gmail.com', '645324567', 'Horario: de 7 a 15'),
(3, 'Pepe', 'Pérez Gil', 'ppg@gmail.com', '633444555', 'Llega tarde'),
(4, 'José Luis', 'López Jiménez', 'jllj@gmail.com', '612345678', 'No trabaja'),
(5, 'Federico', 'García Herranz', 'fgh@gmail.com', '634578900', 'Ascenso'),
(6, 'Víctor', 'Torres Ronaldo', 'vtr@gmail.com', '678926394', 'Le quedan dos telediarios'),
(7, 'Andrés', 'Hernández Carrasco', 'ahz@gmail.com', '657432010', 'Le gusta el fútbol'),
(8, 'Antonio', 'García García', 'antoniogg@gmail.com', '654755233', 'Horario de mañana'),
(9, 'Aurora', 'Álamos Frutos', 'aaf@gmail.com', '947555639', 'Siempre es puntual'),
(10, 'Daniel', 'Antúnez Larred', 'dal@gmail.com', '689691525', 'Buscando trabajo'),
(11, 'Adrián', 'Segura Cabezas', 'asc@gmail.com', '645351045', 'A un año de jubilarse'),
(12, 'Héctor', 'De la Cruz Pérez', 'hdp@gmail.com', '666555777', 'Vive lejos'),
(13, 'David Ignacio', 'Corral Kennedy', 'loquesea@gmail.com', '722541685', 'Falta mucho'),
(14, 'Ángel', 'Serrano Fernández', 'asf@gmail.com', '629541586', 'Horario flexible'),
(15, 'Pepe', 'Antúnez Salmerón', 'pas@minegocio.com', '911123456', 'Llega tarde'),
(16, 'Laura', 'Gómez Sanz', 'lgs@hotmail.com', '600123456', 'Horario de mañana'),
(17, 'Laura', 'Sanz Gómez', 'lsg@hotmail.com', '600654321', 'Prima de Laura Gómez Sanz'),
(18, 'Pepe', 'Álamo de la Torre', '', '911123456', 'Amigo de Laura Gómez Sanz');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

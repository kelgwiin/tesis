-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2014 a las 04:34:35
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ti`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_proceso`
--

CREATE TABLE IF NOT EXISTS `servicio_proceso` (
  `servicio_proceso_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`servicio_proceso_id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Representa todos los procesos que se encuentrarÃ¡n asociados a un servicio previamente definido' AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `servicio_proceso`
--

INSERT INTO `servicio_proceso` (`servicio_proceso_id`, `nombre`, `tipo`, `descripcion`) VALUES
(14, 'Proceso de Negocio 1', 'Critica', NULL),
(15, 'Proceso de Negocio 2', 'Critica', NULL),
(16, 'Proceso de Negocio 3', 'Alta', NULL),
(17, 'Proceso de Negocio 4', 'Media', NULL),
(18, 'Proceso de Negocio 5', 'Baja', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

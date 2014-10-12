-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2014 a las 04:34:44
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
-- Estructura de tabla para la tabla `proceso_soporta_servicio`
--

CREATE TABLE IF NOT EXISTS `proceso_soporta_servicio` (
  `servicio_proceso_id` bigint(20) NOT NULL,
  `servicio_id` bigint(20) NOT NULL,
  PRIMARY KEY (`servicio_proceso_id`,`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proceso_soporta_servicio`
--

INSERT INTO `proceso_soporta_servicio` (`servicio_proceso_id`, `servicio_id`) VALUES
(14, 1),
(15, 1),
(17, 3),
(17, 7),
(18, 3),
(18, 7);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `proceso_soporta_servicio`
--
ALTER TABLE `proceso_soporta_servicio`
  ADD CONSTRAINT `proceso_soporta_servicio_ibfk_1` FOREIGN KEY (`servicio_proceso_id`) REFERENCES `servicio_proceso` (`servicio_proceso_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

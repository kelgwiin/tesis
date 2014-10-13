-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2014 a las 02:49:46
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
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE IF NOT EXISTS `servicio` (
  `servicio_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `nombre` varchar(150) NOT NULL COMMENT 'Nombre asociado al servicio',
  `descripcion` text NOT NULL COMMENT 'Describe el funcionamiento',
  `caracteristicas` text NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `categoria_servicio` varchar(150) NOT NULL,
  `tipo_servicio` varchar(150) NOT NULL,
  `propietario_servicio` bigint(20) NOT NULL,
  `proveedor_servicio` bigint(20) NOT NULL,
  `fecha_modificado` datetime DEFAULT NULL,
  `prioridad_servicio` varchar(150) NOT NULL,
  `impacto` text,
  `procedimiento_solicitud` text,
  `contacto` text,
  `estatus` varchar(150) NOT NULL DEFAULT 'Activo',
  `ruta_imagen` text NOT NULL,
  `degradacion_cpu` int(4) DEFAULT NULL,
  `degradacion_red` int(4) DEFAULT NULL,
  `degradacion_memoria` int(4) DEFAULT NULL,
  `degradacion_disco` int(4) DEFAULT NULL,
  `fallo_cpu` int(4) DEFAULT NULL,
  `fallo_red` int(4) DEFAULT NULL,
  `fallo_memoria` int(4) DEFAULT NULL,
  `fallo_disco` int(4) DEFAULT NULL,
  `genera_ingresos` tinyint(1) DEFAULT NULL,
  `cantidad_ingresos` int(11) DEFAULT NULL COMMENT 'Cantidad de Ingresos , sÃ³lo estÃ',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`servicio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Representa el catÃ¡logo de servicios de la infaestructura de' AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`servicio_id`, `nombre`, `descripcion`, `caracteristicas`, `fecha_creacion`, `categoria_servicio`, `tipo_servicio`, `propietario_servicio`, `proveedor_servicio`, `fecha_modificado`, `prioridad_servicio`, `impacto`, `procedimiento_solicitud`, `contacto`, `estatus`, `ruta_imagen`, `degradacion_cpu`, `degradacion_red`, `degradacion_memoria`, `degradacion_disco`, `fallo_cpu`, `fallo_red`, `fallo_memoria`, `fallo_disco`, `genera_ingresos`, `cantidad_ingresos`, `borrado`) VALUES
(1, 'Servicio 1', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', '2014-09-23 08:01:11', 'Servicio de Bases de Datos', 'Servicio Orientado al Cliente', 3, 5, '2014-09-24 01:51:24', 'Baja', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/database-add-icon.png', 96, 98, 97, 95, 96, 99, 97, 95, NULL, NULL, 0),
(2, 'Servicio 2', '<p>Segundo Servicio </p>', '<p>Otras Caracteristicas (modificado)</p>', '2014-08-31 19:19:14', 'Servicio de Infraestructura', 'Servicio de Soporte', 1, 5, '2014-09-24 01:49:31', 'Media', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/database-arrow-down-icon.png', 3, 7, 5, 1, 4, 8, 6, 2, NULL, NULL, 0),
(3, 'Servicio 3', '<p> Servicio 3</p>', '<p> Servicio 3</p>', '2014-09-09 17:31:17', 'Servicio de Negocio', 'Servicio Orientado al Cliente', 2, 5, '2014-09-24 01:54:21', 'Baja', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/Cash-register-icon.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, 'Servicio 4', '<p>Servicio 4</p>', '<p>Servicio 3</p>', '2014-09-09 17:31:39', 'Servicio de Infraestructura', 'Servicio de Soporte', 2, 5, '2014-09-24 01:58:35', 'Alta', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/Categories-preferences-other-icon_(1).png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(5, 'Servicio 5', '<p>Servicio 3</p>', '<p>Servicio 3</p>', '2014-09-09 17:31:58', 'Servicio de Negocio', 'Servicio Orientado al Cliente', 1, 5, '2014-09-24 01:54:39', 'Baja', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/Money-icon.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(6, 'Servicio 6', '<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>', '<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>', '2014-09-09 17:32:19', 'Servicio de Negocio', 'Servicio Orientado al Cliente', 3, 6, '2014-09-24 01:57:15', 'Media', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/Graph-icon.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(7, 'Servicio 7', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', '2014-09-09 17:32:43', 'Servicio de Bases de Datos', 'Servicio de Soporte', 1, 5, '2014-09-24 01:51:45', 'Baja', '<ul>\r\n<li>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and</li>\r\n</ul>', '<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and</p>', '<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and</p>', 'Activo', 'assets/imagenes/servicio/database-arrow-down-icon.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(8, 'ewefwef', '<p>efwef</p>', '<p>wefwef</p>', '2014-09-23 07:00:44', 'Servicio de Bases de Datos', 'Servicio Orientado al Cliente', 2, 6, '2014-09-24 01:52:00', 'Alta', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/database-search-icon.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(9, 'qwdqd', '<p>edwed</p>', '<p>wedwed</p>', '2014-09-23 07:23:56', 'Servicio de Bases de Datos', 'Servicio Orientado al Cliente', 1, 5, '2014-09-24 01:52:20', 'Baja', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/Misc-Delete-Database-icon.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(11, 'wedwed', '<p>wedwe</p>', '<p>dwed</p>', '2014-09-23 07:33:33', 'Servicio de Bases de Datos', 'Servicio Orientado al Cliente', 1, 6, '2014-09-24 01:53:03', 'Baja', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/Web-Database-icon.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

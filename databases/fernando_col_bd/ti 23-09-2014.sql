-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2014 a las 09:48:43
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
-- Estructura de tabla para la tabla `acuerdos_servicios`
--

CREATE TABLE IF NOT EXISTS `acuerdos_servicios` (
  `acuerdos_servicios_id` int(11) NOT NULL AUTO_INCREMENT,
  `servicio_id` bigint(20) NOT NULL,
  `porcentaje_disponibilidad` int(11) DEFAULT NULL,
  `horas_fiabilidad` int(11) DEFAULT NULL,
  `horas_confiabilidad` int(11) DEFAULT NULL,
  `borrado` tinyint(1) NOT NULL,
  PRIMARY KEY (`acuerdos_servicios_id`),
  KEY `fk_acuerdos_servicios_servicio1_idx` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arrendamiento`
--

CREATE TABLE IF NOT EXISTS `arrendamiento` (
  `arrendamiento_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `costo` double NOT NULL COMMENT 'Costo en la moneda que dicte la informaciÃ³n de la organizaciÃ³n.',
  `fecha_inicial_vigencia` datetime NOT NULL COMMENT 'Fecha inicial de vigencia del arrendamiento',
  `esquema_tiempo` enum('mensual','trimestral','semestral','anual') NOT NULL COMMENT 'Esquema de tiempo seleccionado',
  `ma_motivo_id` bigint(20) NOT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`arrendamiento_id`),
  KEY `fk_arrendamiento_1_ma_motivo_idx` (`ma_motivo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `arrendamiento`
--

INSERT INTO `arrendamiento` (`arrendamiento_id`, `nombre`, `costo`, `fecha_inicial_vigencia`, `esquema_tiempo`, `ma_motivo_id`, `borrado`) VALUES
(1, 'Arrendamiento 1', 23, '2014-05-21 00:00:00', 'trimestral', 3, 0),
(2, 'prueba delete', 234, '2014-05-15 00:00:00', 'semestral', 1, 1),
(3, 'arrre', 32, '2014-05-21 00:00:00', 'semestral', 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_riesgos`
--

CREATE TABLE IF NOT EXISTS `categorias_riesgos` (
  `id_categoria` bigint(20) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `categorias_riesgos`
--

INSERT INTO `categorias_riesgos` (`id_categoria`, `categoria`, `descripcion`) VALUES
(1, 'Desastres naturales', 'Eventos o fenÃ³menos de factor climÃ¡tico o de la naturaleza que ocurren de forma al azar y representan un riesgo o amenaza para la organizaciÃ³n.'),
(2, 'DaÃ±os accidentales', 'Eventos de ocurren de forma fortuita, sin intenciÃ³n alguna pero que de igual forma representan un riesgo  amenaza para la organizaciÃ³n.'),
(3, 'Humano intencionado interno', 'Amenaza o riesgo efectuado de manera intencional por personal interno de la organizaciÃ³n '),
(4, 'Humano intencionado externo', 'Amenaza o riesgo efectuado de manera intencional por personal externo a la organizaciÃ³n '),
(5, 'Humano no intencionado interno', 'Amenaza o riesgo efectuado de manera no intencional por personal interno de la organizaciÃ³n '),
(6, 'Humano no intencionado externo', 'Amenaza o riesgo efectuado de manera no intencional por personal externo de la organizaciÃ³n'),
(7, 'Otros daÃ±os', 'CategorÃ­a creada para cualquier otro tipo de daÃ±os que no tengan una clasificaciÃ³n especÃ­fica.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componente_ti`
--

CREATE TABLE IF NOT EXISTS `componente_ti` (
  `componente_ti_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `ma_unidad_medida_id` bigint(20) NOT NULL,
  `fecha_compra` datetime DEFAULT NULL COMMENT 'Fecha en la cual se adquieriÃ³',
  `fecha_elaboracion` datetime DEFAULT NULL COMMENT 'Fecha en la cual fue',
  `fecha_creacion` datetime NOT NULL,
  `tiempo_vida` int(11) DEFAULT '0' COMMENT 'Cantidad de dÃ­as/meses/aÃ±os que durÃ¡ un it',
  `unidad_tiempo_vida` enum('AA','MM','DD','NA') NOT NULL DEFAULT 'NA' COMMENT 'Unidad asocidada al tiempo de vida, donde,',
  `fecha_hasta` datetime DEFAULT NULL,
  `precio` double NOT NULL COMMENT 'precio del Ã­tem',
  `capacidad` double NOT NULL DEFAULT '0' COMMENT 'Capacidad del Ã­tem.',
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `cantidad_disponible` int(11) NOT NULL,
  `tipo_asignacion` enum('MULT','UNI') NOT NULL DEFAULT 'UNI' COMMENT 'Indica si un componente',
  `activa` enum('ON','OFF') NOT NULL DEFAULT 'ON' COMMENT 'Permite identificar si ',
  `borrado` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Fecha de fin del tiempo de vida',
  PRIMARY KEY (`componente_ti_id`),
  KEY `fk_inventario_ti_detalle_1_ma_unidad_medida_idx` (`ma_unidad_medida_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Detalle de los Componentes de TI.' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `componente_ti`
--

INSERT INTO `componente_ti` (`componente_ti_id`, `ma_unidad_medida_id`, `fecha_compra`, `fecha_elaboracion`, `fecha_creacion`, `tiempo_vida`, `unidad_tiempo_vida`, `fecha_hasta`, `precio`, `capacidad`, `nombre`, `descripcion`, `cantidad`, `cantidad_disponible`, `tipo_asignacion`, `activa`, `borrado`) VALUES
(1, 15, '2014-05-15 00:00:00', '2014-05-21 00:00:00', '2014-05-20 13:09:57', 8, 'MM', '2015-01-20 13:09:57', 43, 34, 'fsdf', 'fsdf', 34, 29, 'UNI', 'ON', 0),
(2, 6, '2014-06-30 00:00:00', '2014-07-03 00:00:00', '2014-06-30 14:05:35', 6, 'DD', '2014-07-06 14:05:35', 345, 12, 'comp casi vencido', 'dff', 12, 12, 'UNI', 'ON', 0),
(3, 10, '2014-06-30 00:00:00', '2014-06-30 00:00:00', '2014-06-30 14:06:32', 2, 'DD', '2014-07-02 14:06:32', 2323, 32, 'otro comp casi vencido', 'dfdfdfdf', 1, 1, 'MULT', 'ON', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `departamento_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `icono_fa` varchar(50) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Ãcono de FontAwesom',
  PRIMARY KEY (`departamento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Su funciÃ³n es llevar el control de los servicios que se encuentran asociados a los departamentos.' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`departamento_id`, `nombre`, `icono_fa`, `descripcion`, `borrado`) VALUES
(1, 'Departamento 1', 'fa-desktop', 'sfsdfdwedwe', 0),
(2, 'Departamento 2', 'fa-gavel', 'dfd', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento_direccion`
--

CREATE TABLE IF NOT EXISTS `departamento_direccion` (
  `departamento_direccion_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `departamento_id` bigint(20) NOT NULL,
  `direccion_mac` varchar(200) NOT NULL COMMENT 'Direcciones de mac de',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`departamento_direccion_id`),
  KEY `fk_departamento_direccion_1_departamento_idx` (`departamento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Direcciones mac asociadas a los departamentos.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento_servicio`
--

CREATE TABLE IF NOT EXISTS `departamento_servicio` (
  `departamento_id` bigint(20) NOT NULL COMMENT 'Clave primaria',
  `servicio_id` bigint(20) NOT NULL COMMENT 'FK servicio',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`departamento_id`,`servicio_id`),
  KEY `fk_departamento_servicio_1_servicio_idx` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='RelaciÃ³n entre la tabla "servicio" y "departamento"';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad`
--

CREATE TABLE IF NOT EXISTS `disponibilidad` (
  `disponibilidad_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `servicio_historial_id` bigint(20) NOT NULL,
  `servicio_id` bigint(20) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `tiempo_medio_fallos` int(11) NOT NULL,
  `calculo_disponibilidad` int(11) NOT NULL,
  `calculo_fiabilidad` int(11) NOT NULL,
  `calculo_confiabilidad` int(11) NOT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`disponibilidad_id`),
  KEY `fk_disponibilidad_1_servicio_historial_idx` (`servicio_historial_id`),
  KEY `fk_disponibilidad_2_servicio_idx` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estructura_costo`
--

CREATE TABLE IF NOT EXISTS `estructura_costo` (
  `estructura_costo_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mes` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL COMMENT 'Se crearÃ¡n mensualmente',
  PRIMARY KEY (`estructura_costo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Permite almacenar la contabilizaciÃ³n total de los costos. Incluyendo los costos indirectos. De manera que esta informaciÃ³n es la que se' AUTO_INCREMENT=117 ;

--
-- Volcado de datos para la tabla `estructura_costo`
--

INSERT INTO `estructura_costo` (`estructura_costo_id`, `mes`, `anio`, `fecha_creacion`) VALUES
(108, 6, 2014, '2014-06-30 14:34:50'),
(109, 7, 2014, '2014-06-30 14:34:50'),
(110, 8, 2014, '2014-06-30 14:34:50'),
(111, 9, 2014, '2014-06-30 14:34:50'),
(112, 10, 2014, '2014-06-30 14:34:50'),
(113, 11, 2014, '2014-06-30 14:34:51'),
(114, 12, 2014, '2014-06-30 14:34:51'),
(115, 1, 2015, '2014-06-30 14:35:02'),
(116, 5, 2014, '2014-07-02 14:22:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estructura_costo_item`
--

CREATE TABLE IF NOT EXISTS `estructura_costo_item` (
  `estructura_costo_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `estructura_costo_id` bigint(20) NOT NULL COMMENT 'fk estrucutura_costo',
  `ma_categoria_id` bigint(20) NOT NULL COMMENT 'fk ma_categoria ',
  `total_capacidad` bigint(20) NOT NULL COMMENT 'Capacidad total expresado',
  `total_monetario` double NOT NULL COMMENT 'Total monetario que',
  `total_monetario_cost_ind` double NOT NULL COMMENT 'Total monetario por concepto de costos ',
  `cantidad_items` bigint(20) NOT NULL COMMENT 'Cantidad de items que',
  PRIMARY KEY (`estructura_costo_item_id`),
  KEY `fk_estructura_costo_item_1_estructura_costo_idx` (`estructura_costo_id`),
  KEY `fk_estructura_costo_item_2_ma_categoria_idx` (`ma_categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=125 ;

--
-- Volcado de datos para la tabla `estructura_costo_item`
--

INSERT INTO `estructura_costo_item` (`estructura_costo_item_id`, `estructura_costo_id`, `ma_categoria_id`, `total_capacidad`, `total_monetario`, `total_monetario_cost_ind`, `cantidad_items`) VALUES
(112, 108, 4, 1241245548544, 1462, 1155.6666666667, 1),
(113, 108, 2, 150994944, 4140, 1155.6666666667, 1),
(114, 108, 3, 32000000, 2323, 1155.6666666667, 1),
(115, 109, 4, 1241245548544, 1462, 4.3333333333333, 1),
(116, 109, 2, 150994944, 4140, 4.3333333333333, 1),
(117, 109, 3, 32000000, 2323, 4.3333333333333, 1),
(118, 110, 4, 1241245548544, 1462, 13, 1),
(119, 111, 4, 1241245548544, 1462, 13, 1),
(120, 112, 4, 1241245548544, 1462, 13, 1),
(121, 113, 4, 1241245548544, 1462, 13, 1),
(122, 114, 4, 1241245548544, 1462, 13, 1),
(123, 115, 4, 1241245548544, 1462, 13, 1),
(124, 116, 4, 1241245548544, 1462, 45, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `allDay` enum('true','false') DEFAULT 'false',
  `borrado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `start`, `end`, `allDay`, `borrado`) VALUES
(1, 'mantenimiento del acceso remoto', '2014-07-02 00:00:00', '2014-07-03 00:00:00', 'true', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacion`
--

CREATE TABLE IF NOT EXISTS `formacion` (
  `formacion_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion_breve` varchar(200) NOT NULL COMMENT 'Breve descripciÃ³n',
  `costo` double NOT NULL COMMENT 'Costo asociado a la formaciÃ³n',
  `fecha` datetime NOT NULL,
  `formacion_tipo_id` bigint(20) NOT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`formacion_id`),
  KEY `fk_formacion_1_formacion_tipo_idx` (`formacion_tipo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Costos Indirectos relaacionados con la formaciÃ³n de personal.' AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `formacion`
--

INSERT INTO `formacion` (`formacion_id`, `descripcion_breve`, `costo`, `fecha`, `formacion_tipo_id`, `borrado`) VALUES
(1, '32423', 32, '2014-05-21 00:00:00', 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacion_tipo`
--

CREATE TABLE IF NOT EXISTS `formacion_tipo` (
  `formacion_tipo_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL COMMENT 'Nombre del tipo de',
  PRIMARY KEY (`formacion_tipo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tipos de formaciÃ³n' AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `formacion_tipo`
--

INSERT INTO `formacion_tipo` (`formacion_tipo_id`, `nombre`) VALUES
(1, 'Certificaciones'),
(2, 'Cursos'),
(3, 'CapacitaciÃ³n de usuario final'),
(4, 'ConsultorÃ­as externas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `honorario`
--

CREATE TABLE IF NOT EXISTS `honorario` (
  `honorario_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `costo` double NOT NULL,
  `numero_profesionales` int(11) NOT NULL,
  `fecha_desde` datetime NOT NULL COMMENT 'Inicio de fecha de vigencia',
  `fecha_hasta` datetime NOT NULL COMMENT 'Inicio de fecha de vigencia',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`honorario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Honoraios Profesionales' AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `honorario`
--

INSERT INTO `honorario` (`honorario_id`, `nombre`, `costo`, `numero_profesionales`, `fecha_desde`, `fecha_hasta`, `borrado`) VALUES
(1, 'prueba delete', 2, 2, '2014-05-21 00:00:00', '2014-05-22 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

CREATE TABLE IF NOT EXISTS `incidencia` (
  `incidencia_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(100) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `servicio_id` bigint(20) NOT NULL,
  `fecha_deteccion` datetime NOT NULL COMMENT 'Fecha de detecciÃ³n de la incidencia',
  `fecha_reparacion` datetime DEFAULT NULL COMMENT 'Fecha de reparaciÃ³n de la incidencia',
  `fecha_restaurado` datetime DEFAULT NULL COMMENT 'Fecha de restaurado de la incidencia',
  `tiempo_caido` varchar(200) DEFAULT NULL COMMENT 'Cantidad que durÃ³ la caÃ­da del servicio.',
  `tiempo_retraso` varchar(200) DEFAULT NULL,
  `pro_crit_afect` int(11) DEFAULT NULL,
  `usuarios_afectados` int(11) DEFAULT NULL,
  `confiabilidad_informacion` int(11) DEFAULT NULL,
  `personal_recuperacion` int(11) DEFAULT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`incidencia_id`),
  KEY `fk_incidencia_1_servicio_idx` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Registra las incidencias ocurridas' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_componente_ti`
--

CREATE TABLE IF NOT EXISTS `inventario_componente_ti` (
  `inventario_componente_ti_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Interrelacion de inventario_ti contra',
  `inventario_ti_id` bigint(20) NOT NULL,
  `componente_ti_id` bigint(20) NOT NULL,
  PRIMARY KEY (`inventario_componente_ti_id`),
  KEY `fk_inventario_componente_ti_1_inventario_ti_idx` (`inventario_ti_id`),
  KEY `fk_inventario_componente_ti_2_componente_ti_idx` (`componente_ti_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Un componente de TI pertenece a uno o mÃ¡s inventarios' AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `inventario_componente_ti`
--

INSERT INTO `inventario_componente_ti` (`inventario_componente_ti_id`, `inventario_ti_id`, `componente_ti_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_ti`
--

CREATE TABLE IF NOT EXISTS `inventario_ti` (
  `inventario_ti_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `departamento_id` bigint(20) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`inventario_ti_id`),
  KEY `fk_inventario_ti_1_departamento_idx` (`departamento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Lleva el control de los elementos de tecnologÃ­a de informaciÃ³n que posea la organizaciÃ³n.' AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `inventario_ti`
--

INSERT INTO `inventario_ti` (`inventario_ti_id`, `departamento_id`, `fecha_creacion`, `borrado`) VALUES
(1, 1, '2014-05-20 13:10:10', 0),
(2, 2, '2014-05-20 13:10:24', 0),
(3, 1, '2014-08-31 20:43:05', 0),
(4, 1, '2014-08-31 21:17:20', 0),
(5, 1, '2014-08-31 21:20:01', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logros_rendimiento`
--

CREATE TABLE IF NOT EXISTS `logros_rendimiento` (
  `logros_rendimiento_id` int(11) NOT NULL AUTO_INCREMENT,
  `servicio_id` bigint(20) NOT NULL,
  `impacto_logros` varchar(200) DEFAULT NULL,
  `descripcion_logros` varchar(200) DEFAULT NULL,
  `beneficio_logros` varchar(200) DEFAULT NULL,
  `costo_logros` double DEFAULT NULL,
  `borrado` tinyint(1) NOT NULL,
  PRIMARY KEY (`logros_rendimiento_id`),
  KEY `fk_logros_rendimiento_servicio1_idx` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE IF NOT EXISTS `mantenimiento` (
  `mantenimiento_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo_operacion` enum('mantenimiento','instalaciÃ³n') NOT NULL COMMENT 'Dominio{mantenimiento, operacion}',
  `ma_motivo_id` bigint(20) NOT NULL,
  `costo` double NOT NULL COMMENT 'Costo de manimiento',
  `fecha` datetime NOT NULL COMMENT 'Fecha de mantenimiento',
  `departamento_id` bigint(20) NOT NULL COMMENT 'fk dpto',
  `ma_categoria_id` bigint(20) NOT NULL COMMENT 'fk categoria',
  `nombre` varchar(200) NOT NULL COMMENT 'Nombre del encargado de mantenimiento/instalaciÃ³n',
  `apellido` varchar(200) NOT NULL COMMENT 'Apellido del encargado de mantenimiento/instalaciÃ³n',
  `email` varchar(300) NOT NULL COMMENT 'Email del encargado de mantenimiento/instalaciÃ³n',
  `telefono` varchar(20) NOT NULL COMMENT 'TelÃ©fono del encargado de mantenimiento/instalaciÃ³n',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  `nombre_mantenimiento` varchar(200) NOT NULL,
  PRIMARY KEY (`mantenimiento_id`),
  KEY `fk_mantenimiento_1_ma_motivo_idx` (`ma_motivo_id`),
  KEY `fk_mantenimiento_2_departamento_idx` (`departamento_id`),
  KEY `fk_mantenimiento_3_ma_categoria_idx` (`ma_categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`mantenimiento_id`, `tipo_operacion`, `ma_motivo_id`, `costo`, `fecha`, `departamento_id`, `ma_categoria_id`, `nombre`, `apellido`, `email`, `telefono`, `borrado`, `nombre_mantenimiento`) VALUES
(1, 'instalaciÃ³n', 6, 345, '2014-05-21 00:00:00', 2, 2, 'Pepe', 'Castillo', 'kelgwi@mgdg.com', '342343', 0, '453'),
(2, 'mantenimiento', 9, 23, '2014-05-22 00:00:00', 2, 5, 'Pedow', 'df', 'erfsd@rsdfv', '324434', 1, 'prueba delete');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ma_categoria`
--

CREATE TABLE IF NOT EXISTS `ma_categoria` (
  `ma_categoria_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `icono_fa` varchar(50) NOT NULL COMMENT 'Cadena que representa el',
  `valor_base` bigint(20) DEFAULT NULL COMMENT 'Valor base que corresponde a la unidad de medidad',
  PRIMARY KEY (`ma_categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Representa el maestro de las categorÃ­as las cuales se encuentran previamente cargadas' AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `ma_categoria`
--

INSERT INTO `ma_categoria` (`ma_categoria_id`, `nombre`, `icono_fa`, `valor_base`) VALUES
(1, 'Procesador', 'fa-cogs', 1024),
(2, 'Memoria', 'fa-eraser', 1024),
(3, 'Redes', 'fa-globe', 1000),
(4, 'Almacenamiento', 'fa-hdd-o', 1024),
(5, 'Licencia', 'fa-file-text-o', -1),
(6, 'Otros', 'fa-suitcase', -1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ma_motivo`
--

CREATE TABLE IF NOT EXISTS `ma_motivo` (
  `ma_motivo_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `seccion` enum('arrendamiento','mantenimiento','formacion','honorarios','utileria') NOT NULL COMMENT 'Indica la secciÃ³n de Costos Indirectos a la que pertenecen',
  PRIMARY KEY (`ma_motivo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `ma_motivo`
--

INSERT INTO `ma_motivo` (`ma_motivo_id`, `nombre`, `seccion`) VALUES
(1, 'Servicio de Luz', 'arrendamiento'),
(2, 'Servicio de IPS', 'arrendamiento'),
(3, 'Llamadas telefÃ³nicas', 'arrendamiento'),
(4, 'Alquiler de equipos de TI', 'arrendamiento'),
(5, 'Otros', 'arrendamiento'),
(6, 'InstalaciÃ³n y configuraciÃ³n de los equipos de red', 'mantenimiento'),
(7, 'Soporte de Sistema Operativo', 'mantenimiento'),
(8, 'AfinaciÃ³n del desempeÃ±o y entonaciÃ³n del sistema', 'mantenimiento'),
(9, 'InvestigaciÃ³n y planeaciÃ³n de sistemas', 'mantenimiento'),
(10, 'EvaluaciÃ³n y compra', 'mantenimiento'),
(11, 'EliminaciÃ³n de Hardware', 'mantenimiento'),
(12, 'Respaldos y recuperaciÃ³n', 'mantenimiento'),
(13, 'PlaneaciÃ³n de fallas', 'mantenimiento'),
(14, 'Soporte en general', 'mantenimiento'),
(15, 'Otros', 'mantenimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ma_unidad_medida`
--

CREATE TABLE IF NOT EXISTS `ma_unidad_medida` (
  `ma_unidad_medida_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ma_categoria_id` bigint(20) NOT NULL COMMENT 'Clave forÃ¡nea en ma_categorÃ­a',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre de la unidad de medida',
  `abrev_nombre` varchar(3) NOT NULL COMMENT 'Abreviatura del Nombre',
  `valor_nivel` bigint(20) NOT NULL COMMENT 'Representa el valor de la unidad expresado en una medida',
  PRIMARY KEY (`ma_unidad_medida_id`),
  KEY `fk_ma_unidad_medida_1_ma_categoria_idx` (`ma_categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Registra todas las unidades de medidas que tendrÃ¡ asociada un categorÃ­a' AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `ma_unidad_medida`
--

INSERT INTO `ma_unidad_medida` (`ma_unidad_medida_id`, `ma_categoria_id`, `nombre`, `abrev_nombre`, `valor_nivel`) VALUES
(1, 1, 'Kiloherzs', 'KH', 1),
(2, 1, 'Megaherzs', 'MH', 2),
(3, 1, 'Gigaherz', 'GH', 3),
(4, 1, 'Teraherz', 'TH', 4),
(5, 2, 'Kilobytes', 'KB', 1),
(6, 2, 'Megabytes', 'MB', 2),
(7, 2, 'Gigabytes', 'GB', 3),
(8, 2, 'Terabytes', 'TB', 4),
(9, 3, 'Kilobits', 'Kb', 1),
(10, 3, 'Megabits', 'Mb', 2),
(11, 3, 'Kilobits', 'Kb', 3),
(12, 3, 'Terabits', 'Tb', 4),
(13, 4, 'Kilobytes', 'KB', 1),
(14, 4, 'Megabytes', 'MB', 2),
(15, 4, 'Gigabytes', 'GB', 3),
(16, 4, 'Terabytes', 'TB', 4),
(17, 5, 'NA Licencia', 'NA', -1),
(18, 6, 'NA Otros', 'NA', -1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo_hijo`
--

CREATE TABLE IF NOT EXISTS `modulo_hijo` (
  `id_modulo_hijo` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_modulo_padre` bigint(20) NOT NULL,
  `modulo_hijo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_modulo_hijo`),
  KEY `id_modulo_padre` (`id_modulo_padre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `modulo_hijo`
--

INSERT INTO `modulo_hijo` (`id_modulo_hijo`, `id_modulo_padre`, `modulo_hijo`) VALUES
(1, 1, 'ver_usuario'),
(2, 1, 'crear_usuario'),
(3, 1, 'buscar_usuario'),
(4, 1, 'eliminar_usuario'),
(5, 1, 'editar_usuario'),
(6, 8, 'cargar_personal'),
(7, 8, 'agregar_personal'),
(8, 8, 'editar_personal'),
(9, 8, 'eliminar_personal'),
(10, 4, 'continuidad_index'),
(11, 4, 'continuidad_listadopcn'),
(12, 4, 'continuidad_riesgos'),
(13, 4, 'continuidad_listadocategorias'),
(14, 4, 'continuidad_crearcategoria'),
(15, 4, 'continuidad_modificarcategoria'),
(16, 4, 'continuidad_eliminarcategoria'),
(17, 4, 'continuidad_listadoriesgos'),
(18, 4, 'continuidad_crearriesgos'),
(19, 4, 'continuidad_modificarriesgos'),
(20, 4, 'continuidad_eliminarriesgos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo_padre`
--

CREATE TABLE IF NOT EXISTS `modulo_padre` (
  `id_modulo_padre` bigint(20) NOT NULL AUTO_INCREMENT,
  `modulo_padre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_modulo_padre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `modulo_padre`
--

INSERT INTO `modulo_padre` (`id_modulo_padre`, `modulo_padre`) VALUES
(1, 'usuario'),
(2, 'operaciones'),
(3, 'capacidad'),
(4, 'continuidad'),
(5, 'costos'),
(6, 'disponibilidad'),
(7, 'niveles_servicio'),
(8, 'cargar_infraestructura'),
(9, 'ajustes_sistema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones_mejoras`
--

CREATE TABLE IF NOT EXISTS `opciones_mejoras` (
  `opciones_mejoras_id` int(11) NOT NULL AUTO_INCREMENT,
  `servicio_id` bigint(20) NOT NULL,
  `impacto_mejoras` varchar(200) DEFAULT NULL,
  `descripcion_mejoras` varchar(200) DEFAULT NULL,
  `beneficio_mejoras` varchar(200) DEFAULT NULL,
  `costo_mejoras` double DEFAULT NULL,
  `borrado` tinyint(1) NOT NULL,
  PRIMARY KEY (`opciones_mejoras_id`),
  KEY `fk_opciones_mejoras_servicio1_idx` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oportunidades_tecnologicas`
--

CREATE TABLE IF NOT EXISTS `oportunidades_tecnologicas` (
  `oportunidades_tecnologicas_id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `potencial_beneficio` varchar(200) DEFAULT NULL,
  `recursos_requeridos` varchar(200) DEFAULT NULL,
  `borrado` tinyint(1) NOT NULL,
  PRIMARY KEY (`oportunidades_tecnologicas_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizacion`
--

CREATE TABLE IF NOT EXISTS `organizacion` (
  `organizacion_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `moneda` varchar(50) NOT NULL COMMENT 'Nombre asociado a la moneda',
  `abrev_moneda` varchar(45) NOT NULL COMMENT 'Abreviatura de la moneda',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`organizacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Almacena los datos bÃ¡sicos de la organizaciÃ³n.' AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `organizacion`
--

INSERT INTO `organizacion` (`organizacion_id`, `nombre`, `descripcion`, `moneda`, `abrev_moneda`, `borrado`) VALUES
(1, 'Ve', 'dsfsdf', 'BolÃ­var', 'Bs', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `id_personal` bigint(20) NOT NULL AUTO_INCREMENT,
  `codigo_empleado` varchar(20) NOT NULL COMMENT 'Este identificador es el ID que se usa internamente en la organizaciÃ³n para identificar a sus empleados',
  `id_departamento` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `email_personal` varchar(100) NOT NULL,
  `email_corporativo` varchar(100) DEFAULT NULL,
  `tlfn_personal` varchar(50) NOT NULL,
  `tlfn_corporativo` varchar(50) DEFAULT NULL,
  `cargo` varchar(200) NOT NULL,
  `fechaingreso_empresa` datetime NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_personal`),
  UNIQUE KEY `cedula` (`cedula`),
  UNIQUE KEY `email_personal` (`email_personal`),
  UNIQUE KEY `tlfn_personal` (`tlfn_personal`),
  UNIQUE KEY `id_organizacion` (`codigo_empleado`,`email_personal`,`email_corporativo`),
  KEY `id_departamento` (`id_departamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `codigo_empleado`, `id_departamento`, `nombre`, `cedula`, `email_personal`, `email_corporativo`, `tlfn_personal`, `tlfn_corporativo`, `cargo`, `fechaingreso_empresa`, `fecha_creacion`, `fecha_modificacion`) VALUES
(1, 'LOG-001', 1, 'Fernando Pinto', 'V-19524910', 'f6rnando@gmail.com', 'f6rnando@sigitec.com', '0424-0000101', '0412-7439763', 'Gerente de departamento', '2014-01-06 00:00:00', '2014-07-21 11:53:15', '2014-07-23 21:14:12'),
(2, 'LOG-002', 1, 'Fernando Colmenares', 'V-19000698', 'fernandocolmenares@gmail.com', 'fernandocolmenares@sigitec.com', '0242-0012547', '0424-8741014', 'Desarrollador Web', '2014-10-07 00:00:00', '2014-07-21 12:41:02', '2014-07-21 21:41:02'),
(3, 'LOG-003', 2, 'Kelwin Gamez', 'V-20123456', 'kelwin@gmail.com', 'kelwingamez@sigitec.com', '0416-0102030', '0424-0708090', 'Gerente Investigador', '1969-12-31 20:00:00', '2014-07-23 12:16:10', '2014-07-23 21:16:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_continuidad`
--

CREATE TABLE IF NOT EXISTS `plan_continuidad` (
  `id_continuidad` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_riesgo` bigint(20) NOT NULL,
  `id_departamento` bigint(20) NOT NULL,
  `id_empleado` bigint(20) NOT NULL,
  `id_estado` bigint(20) NOT NULL,
  `tipo_plan` varchar(20) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_continuidad`),
  KEY `id_riesgo` (`id_riesgo`),
  KEY `id_departamento` (`id_departamento`),
  KEY `id_empleado` (`id_empleado`),
  KEY `id_estado` (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE IF NOT EXISTS `presupuesto` (
  `presupuesto_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',
  `monto` double NOT NULL COMMENT 'Cantidad de dinero asociada.',
  `departamento_id` bigint(20) NOT NULL COMMENT 'FK departamento',
  `tipo` enum('INV','SER') NOT NULL COMMENT 'Dominio:{INV,SER}',
  `fecha_creacion` datetime NOT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`presupuesto_id`),
  KEY `fk_presupuesto_1_departamento_idx` (`departamento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Es un presupuesto generado en funciÃ³n de los precios de cada elemento' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto_item`
--

CREATE TABLE IF NOT EXISTS `presupuesto_item` (
  `presupuesto_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `presupuesto_id` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre del Ã­tem',
  `precio` double NOT NULL COMMENT 'precio del item, Ã©ste puede ser u',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`presupuesto_item_id`),
  KEY `fk_presupuesto_item_1_presupuesto_idx` (`presupuesto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Ãtem de un presupuesto' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_historial`
--

CREATE TABLE IF NOT EXISTS `proceso_historial` (
  `proceso_historial_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `servicio_proceso_id` bigint(20) NOT NULL,
  `mac_dir` varchar(100) NOT NULL,
  `pagina_reclaim` int(11) NOT NULL,
  `pagina_errores` int(11) NOT NULL,
  `pagina_escritura` int(11) NOT NULL,
  `pagina_lectura` int(11) NOT NULL,
  `tasa_ram` int(11) NOT NULL,
  `tasa_red_salida` int(11) NOT NULL,
  `tasa_red_entrada` int(11) NOT NULL,
  `tasa_cpu` int(11) NOT NULL COMMENT 'La tasa de CPU se basa en el',
  `operaciones_lectura_dd` int(11) NOT NULL,
  `operaciones_escritura_dd` int(11) NOT NULL,
  `tasa_lectura_dd` int(11) NOT NULL,
  `tasa_escritura_dd` int(11) NOT NULL,
  `tasa_transferencia_dd` int(11) NOT NULL,
  `num_bloqueos` int(11) NOT NULL,
  `num_interrupciones_cpu` int(11) NOT NULL,
  `tiempo_online` int(11) NOT NULL,
  `tiempo_offline` int(11) NOT NULL,
  `tiempo_reparacion` int(11) NOT NULL,
  `cache_errores` int(11) NOT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`proceso_historial_id`),
  KEY `fk_proceso_historial_1_servicio_proceso_idx` (`servicio_proceso_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Guarda la informaciÃ³n en detalle de cada uno de los procesos' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_negocio`
--

CREATE TABLE IF NOT EXISTS `proceso_negocio` (
  `procesoneg_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `id_departamento` bigint(20) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`procesoneg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `proceso_negocio`
--

INSERT INTO `proceso_negocio` (`procesoneg_id`, `id_departamento`, `nombre`, `descripcion`) VALUES
(1, 2, 'Proceso Negocio 1', '<p>aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia</p>'),
(2, 1, 'Proceso Negocio 2', '<p>sqwsqw</p>'),
(3, 1, 'Proceso Negocio 3', '<p>dssd</p>'),
(4, 2, 'Proceso Negocio 4', '<p>sdvdszd</p>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_negocio_soporte`
--

CREATE TABLE IF NOT EXISTS `proceso_negocio_soporte` (
  `servicio_id` bigint(20) NOT NULL,
  `proceso_id` bigint(20) NOT NULL,
  PRIMARY KEY (`servicio_id`,`proceso_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proceso_negocio_soporte`
--

INSERT INTO `proceso_negocio_soporte` (`servicio_id`, `proceso_id`) VALUES
(0, 2),
(1, 1),
(1, 2),
(2, 3),
(2, 4),
(4, 2),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(7, 3),
(7, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `riesgos_amenazas`
--

CREATE TABLE IF NOT EXISTS `riesgos_amenazas` (
  `id_riesgo` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_categoria` bigint(20) NOT NULL,
  `denominacion` varchar(100) NOT NULL,
  `probabilidad` varchar(50) NOT NULL,
  `impacto` varchar(50) NOT NULL,
  PRIMARY KEY (`id_riesgo`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` bigint(20) NOT NULL AUTO_INCREMENT,
  `rol` varchar(20) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'administrador'),
(2, 'general');

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
  `prioridad_servicio` varchar(150) DEFAULT NULL,
  `impacto` text,
  `procedimiento_solicitud` text,
  `contacto` text,
  `estatus` varchar(150) NOT NULL DEFAULT 'Activo',
  `ruta_imagen` text NOT NULL,
  `genera_ingresos` tinyint(1) DEFAULT NULL,
  `cantidad_ingresos` int(11) DEFAULT NULL COMMENT 'Cantidad de Ingresos , sÃ³lo estÃ',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`servicio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Representa el catÃ¡logo de servicios de la infaestructura de' AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`servicio_id`, `nombre`, `descripcion`, `caracteristicas`, `fecha_creacion`, `categoria_servicio`, `tipo_servicio`, `propietario_servicio`, `proveedor_servicio`, `fecha_modificado`, `prioridad_servicio`, `impacto`, `procedimiento_solicitud`, `contacto`, `estatus`, `ruta_imagen`, `genera_ingresos`, `cantidad_ingresos`, `borrado`) VALUES
(1, 'Servicio 1', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', '2014-09-23 08:01:11', 'Servicio de Bases de Datos', 'Servicio Orientado al Cliente', 3, 5, '2014-09-23 08:06:05', 'Alta', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/imagen3.jpg', NULL, NULL, 0),
(2, 'Servicio 2', '<p>Segundo Servicio </p>', '<p>Otras Caracteristicas (modificado)</p>', '2014-08-31 19:19:14', 'Servicio de Infraestructura', 'Servicio de Soporte', 1, 5, '2014-09-09 17:36:39', 'Media', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/default.jpg', NULL, NULL, 0),
(3, 'Servicio 3', '<p> Servicio 3</p>', '<p> Servicio 3</p>', '2014-09-09 17:31:17', 'Servicio de Negocio', 'Servicio Orientado al Cliente', 2, 5, NULL, 'Baja', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/default.jpg', NULL, NULL, 0),
(4, 'Servicio 4', '<p>Servicio 4</p>', '<p>Servicio 3</p>', '2014-09-09 17:31:39', 'Servicio de Infraestructura', 'Servicio de Soporte', 2, 5, NULL, 'Alta', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/default.jpg', NULL, NULL, 0),
(5, 'Servicio 5', '<p>Servicio 3</p>', '<p>Servicio 3</p>', '2014-09-09 17:31:58', 'Servicio de Negocio', 'Servicio Orientado al Cliente', 1, 5, NULL, 'Baja', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/default.jpg', NULL, NULL, 0),
(6, 'Servicio 6', '<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>', '<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>', '2014-09-09 17:32:19', 'Servicio de Negocio', 'Servicio Orientado al Cliente', 3, 6, '2014-09-20 02:10:39', 'Media', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/default.jpg', NULL, NULL, 0),
(7, 'Servicio 7', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', '2014-09-09 17:32:43', 'Servicio de Bases de Datos', 'Servicio de Soporte', 1, 5, '2014-09-23 00:16:21', 'Baja', '<ul>\r\n<li>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and</li>\r\n</ul>', '<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and</p>', '<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and</p>', 'Activo', 'assets/imagenes/servicio/default.jpg', NULL, NULL, 0),
(8, 'ewefwef', '<p>efwef</p>', '<p>wefwef</p>', '2014-09-23 07:00:44', 'Servicio de Bases de Datos', 'Servicio Orientado al Cliente', 2, 6, NULL, 'seleccione', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/default.jpg', NULL, NULL, 0),
(9, 'qwdqd', '<p>edwed</p>', '<p>wedwed</p>', '2014-09-23 07:23:56', 'Servicio de Bases de Datos', 'Servicio Orientado al Cliente', 1, 5, NULL, 'seleccione', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/default.jpg', NULL, NULL, 0),
(11, 'wedwed', '<p>wedwe</p>', '<p>dwed</p>', '2014-09-23 07:33:33', 'Servicio de Bases de Datos', 'Servicio Orientado al Cliente', 1, 6, NULL, 'seleccione', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/imagen2.jpg', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_categoria`
--

CREATE TABLE IF NOT EXISTS `servicio_categoria` (
  `categoria_id` bigint(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `ruta_imagen` text NOT NULL,
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabla para almacenar los nombres de las Categorías de Servicios' AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `servicio_categoria`
--

INSERT INTO `servicio_categoria` (`categoria_id`, `nombre`, `descripcion`, `ruta_imagen`) VALUES
(1, 'Servicio de Bases de Datos', '<p>Los servicios de soporte a las bases de datos se han diseñado para proveer ayuda cualificada en la configuración y gestión diaria de diversos y populares paquetes de bases de datos. Los servicios incluyen instalación y configuración de software de bases de datos, además de resolución de problemas, actualización e instalación de parches, cambios de configuración, rotación de ficheros de registro, depuraciones, archivado y ajuste del rendimiento para ayudarle a optimizar el rendimiento de su sitio Web y la satisfacción del usuario final.</p>', 'assets/imagenes/servicio/default.jpg'),
(2, 'Servicio de Almacenamiento', 'El servicio de almacenamiento proporciona una sólida combinación de hardware y software para la gestión de las necesidades de almacenamiento fiable de datos e información del cliente', 'assets/imagenes/servicio/default.jpg'),
(3, 'Servicio de Negocio', 'Servicio de TI que sustenta directamente un Proceso de Negocio, en contraposición a un Servicio de Infraestructura que es usado internamente por el Proveedor de Servicios de TI y normalmente no tiene visibilidad hacía el Negocio. El término Servicio de Negocio también se usa para definir un Servicio que se provee a Clientes de Negocio a través de Unidades de Negocio. Por ejemplo la provisión de servicios financieros a Clientes de un banco, o la provisión de bienes a Clientes en una tienda de venta al por menor. La provisión exitosa de Servicios de Negocio a menudo depende de uno o más Servicios de TI.', 'assets/imagenes/servicio/default.jpg'),
(4, 'Servicio de Infraestructura', '<p>Un Servicio de TI que no es usado directamente por el Negocio, pero que es requerido por el Proveedor de Servicio de TI de modo que pueda proporcionar otros Servicios de TI. Por ejemplo Servicios de Directorio, servicios de nombrado o servicios de comunicación.</p>', 'assets/imagenes/servicio/imagen6.jpg'),
(5, 'Categoria 4', '<p>ccvdfdvvd</p>', 'assets/imagenes/servicio/imagen4.jpg'),
(6, 'Categoria 5', '<p>ffvdfbfgfbfgb</p>', 'assets/imagenes/servicio/imagen5.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_costo`
--

CREATE TABLE IF NOT EXISTS `servicio_costo` (
  `servicio_costo_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `servicio_id` bigint(20) NOT NULL COMMENT 'fk en servicio',
  `fecha_valoracion` datetime NOT NULL COMMENT 'Fecha en la cual',
  `nivel_criticidad` int(11) NOT NULL DEFAULT '0' COMMENT 'Define que tan crÃ­tic',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`servicio_costo_id`),
  KEY `fk_servicio_costo_1_servicio_idx` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Costo asociado a un servicio, que incluso podrÃ­an tener varios costos asociados segÃºn la variaciÃ³n que este pueda tener en el tiempo' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_historial`
--

CREATE TABLE IF NOT EXISTS `servicio_historial` (
  `servicio_historial_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `servicio_id` bigint(20) NOT NULL,
  `energia_consumida` int(11) NOT NULL COMMENT 'NÃºmero de (MEDIDA) unidades de medida',
  `tiempo_ejecucion_total` int(11) NOT NULL COMMENT 'Tiempo total de ejecuciÃ³n de un servicio',
  `tiempo_espera_critico_total` int(11) NOT NULL COMMENT 'Tiempo total de espera crÃ­tico de un servicio.',
  `tiempo_espera_regular_total` int(11) NOT NULL COMMENT 'Tiempo de espera regular total de un servicio',
  `num_caidas` int(11) NOT NULL,
  `tiempo_inactividad` int(11) NOT NULL,
  `frecuencia_id` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`servicio_historial_id`),
  KEY `fk_servicio_historial_servicio_idx` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Almacena el historial de un servicio, que representa la totalizaciones de los cÃ¡lculos previamente registrados.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_infraestructura`
--

CREATE TABLE IF NOT EXISTS `servicio_infraestructura` (
  `servicio_id` bigint(20) NOT NULL,
  `componente_id` bigint(20) NOT NULL,
  PRIMARY KEY (`servicio_id`,`componente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio_infraestructura`
--

INSERT INTO `servicio_infraestructura` (`servicio_id`, `componente_id`) VALUES
(1, 3),
(2, 2),
(2, 3),
(4, 2),
(4, 3),
(6, 1),
(6, 2),
(7, 1),
(7, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_proceso`
--

CREATE TABLE IF NOT EXISTS `servicio_proceso` (
  `servicio_proceso_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `servicio_id` bigint(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `tipo` varchar(10) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`servicio_proceso_id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  KEY `fk_servicio_proceso_1_servicio_idx` (`servicio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Representa todos los procesos que se encuentrarÃ¡n asociados a un servicio previamente definido' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `servicio_proceso`
--

INSERT INTO `servicio_proceso` (`servicio_proceso_id`, `servicio_id`, `nombre`, `tipo`, `descripcion`) VALUES
(1, 2, 'Proceso Servicio 1', NULL, NULL),
(2, 2, 'Segundo Proceso Servicio 2', NULL, NULL),
(3, 2, 'Proceso 3 servicio 2', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_proveedor`
--

CREATE TABLE IF NOT EXISTS `servicio_proveedor` (
  `proveedor_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `tipo` varchar(150) NOT NULL,
  PRIMARY KEY (`proveedor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `servicio_proveedor`
--

INSERT INTO `servicio_proveedor` (`proveedor_id`, `nombre`, `descripcion`, `tipo`) VALUES
(5, 'Departamento 1', '<p>Proveedor de Servicios de Ti. </p>', 'Proveedor Interno'),
(6, 'Departamento 2', '<p>Proveedor de Servicios de ofimatica</p>', 'Proveedor Interno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_tipo`
--

CREATE TABLE IF NOT EXISTS `servicio_tipo` (
  `tipo_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 NOT NULL,
  `descripcion` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`tipo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `servicio_tipo`
--

INSERT INTO `servicio_tipo` (`tipo_id`, `nombre`, `descripcion`) VALUES
(1, 'Servicio Orientado al Cliente', 'Un servicio Orientado al cliente es un Servicio de TI que es visible para el cliente. Los datos típicos que se registran son los que conectan con el negocio, aunque la información de la capa de soporte puede ser registrada, así como para uso interno del proveedor de Servicios de TI.'),
(2, 'Servicio de Soporte', 'Un Servicio de Soporte es un Servicio de TI que no se utiliza directamente por la empresa, pero es requerido por el proveedor de Servicios de TI para ofrecer servicios de cara al cliente (por ejemplo, un Servicio de Directorio o un Servicio de Copia de Seguridad). Los servicios de Soporte de TI también pueden incluir sólo los Servicios utilizados por el Proveedor de Servicios de TI. La información típica que deben tomarse son las de la capa de soporte.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporta_a`
--

CREATE TABLE IF NOT EXISTS `soporta_a` (
  `servicio_soporte` bigint(20) NOT NULL,
  `servicio_soportado` bigint(20) NOT NULL,
  PRIMARY KEY (`servicio_soporte`,`servicio_soportado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `soporta_a`
--

INSERT INTO `soporta_a` (`servicio_soporte`, `servicio_soportado`) VALUES
(1, 2),
(1, 3),
(3, 1),
(3, 2),
(3, 4),
(6, 3),
(6, 5),
(7, 1),
(7, 2),
(7, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE IF NOT EXISTS `tarea` (
  `tarea_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `servicio_id` bigint(20) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL COMMENT 'DescripciÃ³n de la tarea qu',
  `horario_desde` time NOT NULL COMMENT 'Tiempo de inicio del proceso',
  `horario_hasta` time NOT NULL COMMENT 'Tiempo de fin del servicio',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tarea_id`),
  KEY `fk_tarea_1_servicio_idx` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tiene como funciÃ³n llevar el control de los horarios de ejecuciÃ³n de los servicios.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_detalle`
--

CREATE TABLE IF NOT EXISTS `tarea_detalle` (
  `tarea_detalle_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tarea_id` bigint(20) NOT NULL COMMENT 'FK en "tareas".',
  `operacion` varchar(45) NOT NULL,
  `comando` varchar(45) DEFAULT NULL COMMENT 'Comando que se ejecutarÃ',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tarea_detalle_id`),
  KEY `fk_tarea_detalle_1_tarea_idx` (`tarea_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Detalle de asociado a la tabla de "tareas".' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `umbral`
--

CREATE TABLE IF NOT EXISTS `umbral` (
  `umbral_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `servicio_id` bigint(20) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `tiempo_acordado` int(11) NOT NULL,
  `medida` enum('hh','mm','ss') NOT NULL COMMENT 'Unidad de medida del',
  `valor` int(11) NOT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`umbral_id`),
  KEY `fk_umbral_1_servicio_idx` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_rol` bigint(20) NOT NULL,
  `id_estado` bigint(20) NOT NULL,
  `permisologia` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `recuperacion` varchar(200) DEFAULT NULL,
  `creacion` datetime NOT NULL,
  `ultima_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email` (`email`),
  KEY `id_rol` (`id_rol`),
  KEY `id_estado` (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_rol`, `id_estado`, `permisologia`, `nombre`, `email`, `password`, `recuperacion`, `creacion`, `ultima_modificacion`) VALUES
(1, 1, 1, 'all', 'Admin Administrador', 'admin@admin.com', '9dbf7c1488382487931d10235fc84a74bff5d2f4', NULL, '2013-12-09 14:43:47', '2013-12-10 04:14:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_estado`
--

CREATE TABLE IF NOT EXISTS `usuarios_estado` (
  `id_estado` bigint(20) NOT NULL AUTO_INCREMENT,
  `estado` varchar(100) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios_estado`
--

INSERT INTO `usuarios_estado` (`id_estado`, `estado`) VALUES
(1, 'activo'),
(2, 'inactivo'),
(3, 'bloqueado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `utileria`
--

CREATE TABLE IF NOT EXISTS `utileria` (
  `utileria_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `costo` double NOT NULL,
  `fecha` datetime NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`utileria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `utileria`
--

INSERT INTO `utileria` (`utileria_id`, `nombre`, `costo`, `fecha`, `descripcion`, `borrado`) VALUES
(1, 'prueba delete', 34, '2014-05-21 00:00:00', 'fsdf', 1),
(2, 'trytry', 3454, '2014-06-20 00:00:00', 'gfhf', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vulnerabilidades`
--

CREATE TABLE IF NOT EXISTS `vulnerabilidades` (
  `id_vulnerabilidad` bigint(20) NOT NULL AUTO_INCREMENT,
  `vulnerabilidad` varchar(300) NOT NULL,
  PRIMARY KEY (`id_vulnerabilidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acuerdos_servicios`
--
ALTER TABLE `acuerdos_servicios`
  ADD CONSTRAINT `fk_acuerdos_servicios_servicio1` FOREIGN KEY (`servicio_id`) REFERENCES `servicio` (`servicio_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `arrendamiento`
--
ALTER TABLE `arrendamiento`
  ADD CONSTRAINT `fk_arrendamiento_1_ma_motivo` FOREIGN KEY (`ma_motivo_id`) REFERENCES `ma_motivo` (`ma_motivo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `componente_ti`
--
ALTER TABLE `componente_ti`
  ADD CONSTRAINT `fk_inventario_ti_detalle_1_ma_unidad_medida` FOREIGN KEY (`ma_unidad_medida_id`) REFERENCES `ma_unidad_medida` (`ma_unidad_medida_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `departamento_direccion`
--
ALTER TABLE `departamento_direccion`
  ADD CONSTRAINT `fk_departamento_direccion_1_departamento` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`departamento_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `departamento_servicio`
--
ALTER TABLE `departamento_servicio`
  ADD CONSTRAINT `fk_departamento_servicio_1_departamento` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`departamento_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_departamento_servicio_1_servicio` FOREIGN KEY (`servicio_id`) REFERENCES `servicio` (`servicio_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD CONSTRAINT `fk_disponibilidad_1_servicio_historial` FOREIGN KEY (`servicio_historial_id`) REFERENCES `servicio_historial` (`servicio_historial_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_disponibilidad_2_servicio` FOREIGN KEY (`servicio_id`) REFERENCES `servicio` (`servicio_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estructura_costo_item`
--
ALTER TABLE `estructura_costo_item`
  ADD CONSTRAINT `fk_estructura_costo_item_1_estructura_costo` FOREIGN KEY (`estructura_costo_id`) REFERENCES `estructura_costo` (`estructura_costo_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estructura_costo_item_2_ma_categoria` FOREIGN KEY (`ma_categoria_id`) REFERENCES `ma_categoria` (`ma_categoria_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `formacion`
--
ALTER TABLE `formacion`
  ADD CONSTRAINT `fk_formacion_1_formacion_tipo` FOREIGN KEY (`formacion_tipo_id`) REFERENCES `formacion_tipo` (`formacion_tipo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `incidencia`
--
ALTER TABLE `incidencia`
  ADD CONSTRAINT `fk_incidencia_1_servicio` FOREIGN KEY (`servicio_id`) REFERENCES `servicio` (`servicio_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario_componente_ti`
--
ALTER TABLE `inventario_componente_ti`
  ADD CONSTRAINT `fk_inventario_componente_ti_1_inventario_ti` FOREIGN KEY (`inventario_ti_id`) REFERENCES `inventario_ti` (`inventario_ti_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inventario_componente_ti_2_componente_ti` FOREIGN KEY (`componente_ti_id`) REFERENCES `componente_ti` (`componente_ti_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario_ti`
--
ALTER TABLE `inventario_ti`
  ADD CONSTRAINT `fk_inventario_ti_1_departamento` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`departamento_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `logros_rendimiento`
--
ALTER TABLE `logros_rendimiento`
  ADD CONSTRAINT `fk_logros_rendimiento_servicio1` FOREIGN KEY (`servicio_id`) REFERENCES `servicio` (`servicio_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `fk_mantenimiento_1_ma_motivo` FOREIGN KEY (`ma_motivo_id`) REFERENCES `ma_motivo` (`ma_motivo_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mantenimiento_2_departamento` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`departamento_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_mantenimiento_3_ma_categoria` FOREIGN KEY (`ma_categoria_id`) REFERENCES `ma_categoria` (`ma_categoria_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ma_unidad_medida`
--
ALTER TABLE `ma_unidad_medida`
  ADD CONSTRAINT `fk_ma_unidad_medida_1_ma_categoria` FOREIGN KEY (`ma_categoria_id`) REFERENCES `ma_categoria` (`ma_categoria_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `modulo_hijo`
--
ALTER TABLE `modulo_hijo`
  ADD CONSTRAINT `modulo_hijo_ibfk_1` FOREIGN KEY (`id_modulo_padre`) REFERENCES `modulo_padre` (`id_modulo_padre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `opciones_mejoras`
--
ALTER TABLE `opciones_mejoras`
  ADD CONSTRAINT `fk_opciones_mejoras_servicio1` FOREIGN KEY (`servicio_id`) REFERENCES `servicio` (`servicio_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`departamento_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `plan_continuidad`
--
ALTER TABLE `plan_continuidad`
  ADD CONSTRAINT `plan_continuidad_ibfk_1` FOREIGN KEY (`id_riesgo`) REFERENCES `riesgos_amenazas` (`id_riesgo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_continuidad_ibfk_2` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`departamento_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_continuidad_ibfk_3` FOREIGN KEY (`id_empleado`) REFERENCES `personal` (`id_personal`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_continuidad_ibfk_4` FOREIGN KEY (`id_estado`) REFERENCES `usuarios_estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `presupuesto`
--
ALTER TABLE `presupuesto`
  ADD CONSTRAINT `fk_presupuesto_1_departamento` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`departamento_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `presupuesto_item`
--
ALTER TABLE `presupuesto_item`
  ADD CONSTRAINT `fk_presupuesto_item_1_presupuesto` FOREIGN KEY (`presupuesto_id`) REFERENCES `presupuesto` (`presupuesto_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proceso_historial`
--
ALTER TABLE `proceso_historial`
  ADD CONSTRAINT `fk_proceso_historial_1_servicio_proceso` FOREIGN KEY (`servicio_proceso_id`) REFERENCES `servicio_proceso` (`servicio_proceso_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `riesgos_amenazas`
--
ALTER TABLE `riesgos_amenazas`
  ADD CONSTRAINT `riesgos_amenazas_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_riesgos` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio_costo`
--
ALTER TABLE `servicio_costo`
  ADD CONSTRAINT `fk_servicio_costo_1_servicio` FOREIGN KEY (`servicio_id`) REFERENCES `servicio` (`servicio_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio_historial`
--
ALTER TABLE `servicio_historial`
  ADD CONSTRAINT `fk_servicio_historial_1_servicio` FOREIGN KEY (`servicio_id`) REFERENCES `servicio` (`servicio_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio_proceso`
--
ALTER TABLE `servicio_proceso`
  ADD CONSTRAINT `fk_servicio_proceso_1_servicio` FOREIGN KEY (`servicio_id`) REFERENCES `servicio` (`servicio_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `fk_tarea_1_servicio` FOREIGN KEY (`servicio_id`) REFERENCES `servicio` (`servicio_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tarea_detalle`
--
ALTER TABLE `tarea_detalle`
  ADD CONSTRAINT `fk_tarea_detalle_1_tarea` FOREIGN KEY (`tarea_id`) REFERENCES `tarea` (`tarea_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `umbral`
--
ALTER TABLE `umbral`
  ADD CONSTRAINT `fk_umbral_1_servicio` FOREIGN KEY (`servicio_id`) REFERENCES `servicio` (`servicio_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `usuarios_estado` (`id_estado`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

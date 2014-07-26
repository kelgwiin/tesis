-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-07-2014 a las 09:48:06
-- Versión del servidor: 5.5.37
-- Versión de PHP: 5.4.6-1ubuntu1.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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

--
-- RELACIONES PARA LA TABLA `acuerdos_servicios`:
--   `servicio_id`
--       `servicio` -> `servicio_id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arrendamiento`
--

CREATE TABLE IF NOT EXISTS `arrendamiento` (
  `arrendamiento_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `costo` double NOT NULL COMMENT 'Costo en la moneda que dicte la información de la organización.',
  `fecha_inicial_vigencia` datetime NOT NULL COMMENT 'Fecha inicial de vigencia del arrendamiento',
  `esquema_tiempo` enum('mensual','trimestral','semestral','anual') NOT NULL COMMENT 'Esquema de tiempo seleccionado',
  `ma_motivo_id` bigint(20) NOT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`arrendamiento_id`),
  KEY `fk_arrendamiento_1_ma_motivo_idx` (`ma_motivo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- RELACIONES PARA LA TABLA `arrendamiento`:
--   `ma_motivo_id`
--       `ma_motivo` -> `ma_motivo_id`
--

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
(1, 'Desastres naturales', 'Eventos o fenómenos de factor climático o de la naturaleza que ocurren de forma al azar y representan un riesgo o amenaza para la organización.'),
(2, 'Daños accidentales', 'Eventos de ocurren de forma fortuita, sin intención alguna pero que de igual forma representan un riesgo  amenaza para la organización.'),
(3, 'Humano intencionado interno', 'Amenaza o riesgo efectuado de manera intencional por personal interno de la organización '),
(4, 'Humano intencionado externo', 'Amenaza o riesgo efectuado de manera intencional por personal externo a la organización '),
(5, 'Humano no intencionado interno', 'Amenaza o riesgo efectuado de manera no intencional por personal interno de la organización '),
(6, 'Humano no intencionado externo', 'Amenaza o riesgo efectuado de manera no intencional por personal externo de la organización'),
(7, 'Otros daños', 'Categoría creada para cualquier otro tipo de daños que no tengan una clasificación específica.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componente_ti`
--

CREATE TABLE IF NOT EXISTS `componente_ti` (
  `componente_ti_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `ma_unidad_medida_id` bigint(20) NOT NULL,
  `fecha_compra` datetime DEFAULT NULL COMMENT 'Fecha en la cual se adquierió',
  `fecha_elaboracion` datetime DEFAULT NULL COMMENT 'Fecha en la cual fue',
  `fecha_creacion` datetime NOT NULL,
  `tiempo_vida` int(11) DEFAULT '0' COMMENT 'Cantidad de días/meses/años que durá un it',
  `unidad_tiempo_vida` enum('AA','MM','DD','NA') NOT NULL DEFAULT 'NA' COMMENT 'Unidad asocidada al tiempo de vida, donde,',
  `fecha_hasta` datetime DEFAULT NULL,
  `precio` double NOT NULL COMMENT 'precio del ítem',
  `capacidad` double NOT NULL DEFAULT '0' COMMENT 'Capacidad del ítem.',
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
-- RELACIONES PARA LA TABLA `componente_ti`:
--   `ma_unidad_medida_id`
--       `ma_unidad_medida` -> `ma_unidad_medida_id`
--

--
-- Volcado de datos para la tabla `componente_ti`
--

INSERT INTO `componente_ti` (`componente_ti_id`, `ma_unidad_medida_id`, `fecha_compra`, `fecha_elaboracion`, `fecha_creacion`, `tiempo_vida`, `unidad_tiempo_vida`, `fecha_hasta`, `precio`, `capacidad`, `nombre`, `descripcion`, `cantidad`, `cantidad_disponible`, `tipo_asignacion`, `activa`, `borrado`) VALUES
(1, 15, '2014-05-15 00:00:00', '2014-05-21 00:00:00', '2014-05-20 13:09:57', 8, 'MM', '2015-01-20 13:09:57', 43, 34, 'fsdf', 'fsdf', 34, 32, 'UNI', 'ON', 0),
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
  `borrado` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Ícono de FontAwesom',
  PRIMARY KEY (`departamento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Su función es llevar el control de los servicios que se encuentran asociados a los departamentos.' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`departamento_id`, `nombre`, `icono_fa`, `descripcion`, `borrado`) VALUES
(1, 'dpto1', 'fa-desktop', 'sfsdf', 0),
(2, 'dpto 2', 'fa-gavel', 'dfd', 0);

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

--
-- RELACIONES PARA LA TABLA `departamento_direccion`:
--   `departamento_id`
--       `departamento` -> `departamento_id`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Relación entre la tabla "servicio" y "departamento"';

--
-- RELACIONES PARA LA TABLA `departamento_servicio`:
--   `departamento_id`
--       `departamento` -> `departamento_id`
--   `servicio_id`
--       `servicio` -> `servicio_id`
--

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

--
-- RELACIONES PARA LA TABLA `disponibilidad`:
--   `servicio_historial_id`
--       `servicio_historial` -> `servicio_historial_id`
--   `servicio_id`
--       `servicio` -> `servicio_id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estructura_costo`
--

CREATE TABLE IF NOT EXISTS `estructura_costo` (
  `estructura_costo_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mes` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL COMMENT 'Se crearán mensualmente',
  PRIMARY KEY (`estructura_costo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Permite almacenar la contabilización total de los costos. Incluyendo los costos indirectos. De manera que esta información es la que se' AUTO_INCREMENT=117 ;

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
-- RELACIONES PARA LA TABLA `estructura_costo_item`:
--   `estructura_costo_id`
--       `estructura_costo` -> `estructura_costo_id`
--   `ma_categoria_id`
--       `ma_categoria` -> `ma_categoria_id`
--

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
  `descripcion_breve` varchar(200) NOT NULL COMMENT 'Breve descripción',
  `costo` double NOT NULL COMMENT 'Costo asociado a la formación',
  `fecha` datetime NOT NULL,
  `formacion_tipo_id` bigint(20) NOT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`formacion_id`),
  KEY `fk_formacion_1_formacion_tipo_idx` (`formacion_tipo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Costos Indirectos relaacionados con la formación de personal.' AUTO_INCREMENT=2 ;

--
-- RELACIONES PARA LA TABLA `formacion`:
--   `formacion_tipo_id`
--       `formacion_tipo` -> `formacion_tipo_id`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tipos de formación' AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `formacion_tipo`
--

INSERT INTO `formacion_tipo` (`formacion_tipo_id`, `nombre`) VALUES
(1, 'Certificaciones'),
(2, 'Cursos'),
(3, 'Capacitación de usuario final'),
(4, 'Consultorías externas');

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
  `fecha_deteccion` datetime NOT NULL COMMENT 'Fecha de detección de la incidencia',
  `fecha_reparacion` datetime DEFAULT NULL COMMENT 'Fecha de reparación de la incidencia',
  `fecha_restaurado` datetime DEFAULT NULL COMMENT 'Fecha de restaurado de la incidencia',
  `tiempo_caido` varchar(200) DEFAULT NULL COMMENT 'Cantidad que duró la caída del servicio.',
  `tiempo_retraso` varchar(200) DEFAULT NULL,
  `pro_crit_afect` int(11) DEFAULT NULL,
  `usuarios_afectados` int(11) DEFAULT NULL,
  `confiabilidad_informacion` int(11) DEFAULT NULL,
  `personal_recuperacion` int(11) DEFAULT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`incidencia_id`),
  KEY `fk_incidencia_1_servicio_idx` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Registra las incidencias ocurridas' AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `incidencia`:
--   `servicio_id`
--       `servicio` -> `servicio_id`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Un componente de TI pertenece a uno o más inventarios' AUTO_INCREMENT=3 ;

--
-- RELACIONES PARA LA TABLA `inventario_componente_ti`:
--   `inventario_ti_id`
--       `inventario_ti` -> `inventario_ti_id`
--   `componente_ti_id`
--       `componente_ti` -> `componente_ti_id`
--

--
-- Volcado de datos para la tabla `inventario_componente_ti`
--

INSERT INTO `inventario_componente_ti` (`inventario_componente_ti_id`, `inventario_ti_id`, `componente_ti_id`) VALUES
(1, 1, 1),
(2, 2, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Lleva el control de los elementos de tecnología de información que posea la organización.' AUTO_INCREMENT=3 ;

--
-- RELACIONES PARA LA TABLA `inventario_ti`:
--   `departamento_id`
--       `departamento` -> `departamento_id`
--

--
-- Volcado de datos para la tabla `inventario_ti`
--

INSERT INTO `inventario_ti` (`inventario_ti_id`, `departamento_id`, `fecha_creacion`, `borrado`) VALUES
(1, 1, '2014-05-20 13:10:10', 0),
(2, 2, '2014-05-20 13:10:24', 0);

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

--
-- RELACIONES PARA LA TABLA `logros_rendimiento`:
--   `servicio_id`
--       `servicio` -> `servicio_id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE IF NOT EXISTS `mantenimiento` (
  `mantenimiento_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo_operacion` enum('mantenimiento','instalación') NOT NULL COMMENT 'Dominio{mantenimiento, operacion}',
  `ma_motivo_id` bigint(20) NOT NULL,
  `costo` double NOT NULL COMMENT 'Costo de manimiento',
  `fecha` datetime NOT NULL COMMENT 'Fecha de mantenimiento',
  `departamento_id` bigint(20) NOT NULL COMMENT 'fk dpto',
  `ma_categoria_id` bigint(20) NOT NULL COMMENT 'fk categoria',
  `nombre` varchar(200) NOT NULL COMMENT 'Nombre del encargado de mantenimiento/instalación',
  `apellido` varchar(200) NOT NULL COMMENT 'Apellido del encargado de mantenimiento/instalación',
  `email` varchar(300) NOT NULL COMMENT 'Email del encargado de mantenimiento/instalación',
  `telefono` varchar(20) NOT NULL COMMENT 'Teléfono del encargado de mantenimiento/instalación',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  `nombre_mantenimiento` varchar(200) NOT NULL,
  PRIMARY KEY (`mantenimiento_id`),
  KEY `fk_mantenimiento_1_ma_motivo_idx` (`ma_motivo_id`),
  KEY `fk_mantenimiento_2_departamento_idx` (`departamento_id`),
  KEY `fk_mantenimiento_3_ma_categoria_idx` (`ma_categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- RELACIONES PARA LA TABLA `mantenimiento`:
--   `ma_motivo_id`
--       `ma_motivo` -> `ma_motivo_id`
--   `departamento_id`
--       `departamento` -> `departamento_id`
--   `ma_categoria_id`
--       `ma_categoria` -> `ma_categoria_id`
--

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`mantenimiento_id`, `tipo_operacion`, `ma_motivo_id`, `costo`, `fecha`, `departamento_id`, `ma_categoria_id`, `nombre`, `apellido`, `email`, `telefono`, `borrado`, `nombre_mantenimiento`) VALUES
(1, 'instalación', 6, 345, '2014-05-21 00:00:00', 2, 2, 'Pepe', 'Castillo', 'kelgwi@mgdg.com', '342343', 0, '453'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Representa el maestro de las categorías las cuales se encuentran previamente cargadas' AUTO_INCREMENT=7 ;

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
  `seccion` enum('arrendamiento','mantenimiento','formacion','honorarios','utileria') NOT NULL COMMENT 'Indica la sección de Costos Indirectos a la que pertenecen',
  PRIMARY KEY (`ma_motivo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `ma_motivo`
--

INSERT INTO `ma_motivo` (`ma_motivo_id`, `nombre`, `seccion`) VALUES
(1, 'Servicio de Luz', 'arrendamiento'),
(2, 'Servicio de IPS', 'arrendamiento'),
(3, 'Llamadas telefónicas', 'arrendamiento'),
(4, 'Alquiler de equipos de TI', 'arrendamiento'),
(5, 'Otros', 'arrendamiento'),
(6, 'Instalación y configuración de los equipos de red', 'mantenimiento'),
(7, 'Soporte de Sistema Operativo', 'mantenimiento'),
(8, 'Afinación del desempeño y entonación del sistema', 'mantenimiento'),
(9, 'Investigación y planeación de sistemas', 'mantenimiento'),
(10, 'Evaluación y compra', 'mantenimiento'),
(11, 'Eliminación de Hardware', 'mantenimiento'),
(12, 'Respaldos y recuperación', 'mantenimiento'),
(13, 'Planeación de fallas', 'mantenimiento'),
(14, 'Soporte en general', 'mantenimiento'),
(15, 'Otros', 'mantenimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ma_unidad_medida`
--

CREATE TABLE IF NOT EXISTS `ma_unidad_medida` (
  `ma_unidad_medida_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ma_categoria_id` bigint(20) NOT NULL COMMENT 'Clave foránea en ma_categoría',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre de la unidad de medida',
  `abrev_nombre` varchar(3) NOT NULL COMMENT 'Abreviatura del Nombre',
  `valor_nivel` bigint(20) NOT NULL COMMENT 'Representa el valor de la unidad expresado en una medida',
  PRIMARY KEY (`ma_unidad_medida_id`),
  KEY `fk_ma_unidad_medida_1_ma_categoria_idx` (`ma_categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Registra todas las unidades de medidas que tendrá asociada un categoría' AUTO_INCREMENT=19 ;

--
-- RELACIONES PARA LA TABLA `ma_unidad_medida`:
--   `ma_categoria_id`
--       `ma_categoria` -> `ma_categoria_id`
--

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
-- RELACIONES PARA LA TABLA `modulo_hijo`:
--   `id_modulo_padre`
--       `modulo_padre` -> `id_modulo_padre`
--

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

--
-- RELACIONES PARA LA TABLA `opciones_mejoras`:
--   `servicio_id`
--       `servicio` -> `servicio_id`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Almacena los datos básicos de la organización.' AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `organizacion`
--

INSERT INTO `organizacion` (`organizacion_id`, `nombre`, `descripcion`, `moneda`, `abrev_moneda`, `borrado`) VALUES
(1, 'Ve', 'dsfsdf', 'Bolívar', 'Bs', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `id_personal` bigint(20) NOT NULL AUTO_INCREMENT,
  `codigo_empleado` varchar(20) NOT NULL COMMENT 'Este identificador es el ID que se usa internamente en la organización para identificar a sus empleados',
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
-- RELACIONES PARA LA TABLA `personal`:
--   `id_departamento`
--       `departamento` -> `departamento_id`
--

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `codigo_empleado`, `id_departamento`, `nombre`, `cedula`, `email_personal`, `email_corporativo`, `tlfn_personal`, `tlfn_corporativo`, `cargo`, `fechaingreso_empresa`, `fecha_creacion`, `fecha_modificacion`) VALUES
(1, 'LOG-001', 1, 'Fernando Pinto', 'V-19524910', 'f6rnando@gmail.com', 'f6rnando@sigitec.com', '0424-0000101', '0412-7439763', 'Gerente de departamento', '2014-01-06 00:00:00', '2014-07-21 11:53:15', '2014-07-23 16:44:12'),
(2, 'LOG-002', 1, 'Fernando Colmenares', 'V-19000698', 'fernandocolmenares@gmail.com', 'fernandocolmenares@sigitec.com', '0242-0012547', '0424-8741014', 'Desarrollador Web', '2014-10-07 00:00:00', '2014-07-21 12:41:02', '2014-07-21 17:11:02'),
(3, 'LOG-003', 2, 'Kelwin Gamez', 'V-20123456', 'kelwin@gmail.com', 'kelwingamez@sigitec.com', '0416-0102030', '0424-0708090', 'Gerente Investigador', '1969-12-31 20:00:00', '2014-07-23 12:16:10', '2014-07-23 16:46:10');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Es un presupuesto generado en función de los precios de cada elemento' AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `presupuesto`:
--   `departamento_id`
--       `departamento` -> `departamento_id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto_item`
--

CREATE TABLE IF NOT EXISTS `presupuesto_item` (
  `presupuesto_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `presupuesto_id` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre del ítem',
  `precio` double NOT NULL COMMENT 'precio del item, éste puede ser u',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`presupuesto_item_id`),
  KEY `fk_presupuesto_item_1_presupuesto_idx` (`presupuesto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Ítem de un presupuesto' AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `presupuesto_item`:
--   `presupuesto_id`
--       `presupuesto` -> `presupuesto_id`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Guarda la información en detalle de cada uno de los procesos' AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `proceso_historial`:
--   `servicio_proceso_id`
--       `servicio_proceso` -> `servicio_proceso_id`
--

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
  UNIQUE KEY `denominacion` (`denominacion`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- RELACIONES PARA LA TABLA `riesgos_amenazas`:
--   `id_categoria`
--       `categorias_riesgos` -> `id_categoria`
--

--
-- Volcado de datos para la tabla `riesgos_amenazas`
--

INSERT INTO `riesgos_amenazas` (`id_riesgo`, `id_categoria`, `denominacion`, `probabilidad`, `impacto`) VALUES
(1, 1, 'Huracán', 'Baja', 'Medio'),
(2, 1, 'Inundación', 'Media', 'Medio-Alto'),
(3, 1, 'Incendio', 'Media-Baja', 'Alto'),
(4, 2, 'Fuego fortuito', 'Media', 'Alto'),
(5, 2, 'Fallo del aire acondicionado', 'Media-Baja', 'Medio'),
(6, 2, 'Exceso de humedad', 'Baja', 'Bajo'),
(7, 2, 'Humo y/o Gases tóxicos', 'Baja', 'Medio-Alto'),
(8, 2, 'Fallo del UPS', 'Media', 'Medio-Alto'),
(9, 2, 'Accidentes de personal', 'Media', 'Medio'),
(10, 2, 'Errores de operación', 'Media-Alta', 'Alto'),
(11, 3, 'Actos de vandalismo', 'Media-Baja', 'Alto'),
(12, 3, 'Manipulación de datos/software', 'Media-Baja', 'Alto'),
(13, 3, 'Manipulación de hardware', 'Media', 'Alto'),
(14, 4, 'Explosivos', 'Media-Alta', 'Medio-Alto'),
(15, 4, 'Accesos no autorizados al recinto', 'Baja', 'Alto'),
(16, 4, 'Robo', 'Media', 'Alto'),
(17, 5, 'Introducción de virus', 'Baja', 'Medio-Alto'),
(18, 5, 'Error en mantenimiento', 'Media-Baja', 'Medio'),
(19, 6, 'Daños a la propiedad privada', 'Baja', 'Medio'),
(20, 5, 'Subida de tensión', 'Media-Alta', 'Medio');

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
-- Estructura de tabla para la tabla `servicio_costo`
--

CREATE TABLE IF NOT EXISTS `servicio_costo` (
  `servicio_costo_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `servicio_id` bigint(20) NOT NULL COMMENT 'fk en servicio',
  `fecha_valoracion` datetime NOT NULL COMMENT 'Fecha en la cual',
  `nivel_criticidad` int(11) NOT NULL DEFAULT '0' COMMENT 'Define que tan crític',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`servicio_costo_id`),
  KEY `fk_servicio_costo_1_servicio_idx` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Costo asociado a un servicio, que incluso podrían tener varios costos asociados según la variación que este pueda tener en el tiempo' AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `servicio_costo`:
--   `servicio_id`
--       `servicio` -> `servicio_id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_historial`
--

CREATE TABLE IF NOT EXISTS `servicio_historial` (
  `servicio_historial_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `servicio_id` bigint(20) NOT NULL,
  `energia_consumida` int(11) NOT NULL COMMENT 'Número de (MEDIDA) unidades de medida',
  `tiempo_ejecucion_total` int(11) NOT NULL COMMENT 'Tiempo total de ejecución de un servicio',
  `tiempo_espera_critico_total` int(11) NOT NULL COMMENT 'Tiempo total de espera crítico de un servicio.',
  `tiempo_espera_regular_total` int(11) NOT NULL COMMENT 'Tiempo de espera regular total de un servicio',
  `num_caidas` int(11) NOT NULL,
  `tiempo_inactividad` int(11) NOT NULL,
  `frecuencia_id` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`servicio_historial_id`),
  KEY `fk_servicio_historial_servicio_idx` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Almacena el historial de un servicio, que representa la totalizaciones de los cálculos previamente registrados.' AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `servicio_historial`:
--   `servicio_id`
--       `servicio` -> `servicio_id`
--

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
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`servicio_proceso_id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  KEY `fk_servicio_proceso_1_servicio_idx` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Representa todos los procesos que se encuentrarán asociados a un servicio previamente definido' AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `servicio_proceso`:
--   `servicio_id`
--       `servicio` -> `servicio_id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE IF NOT EXISTS `tarea` (
  `tarea_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `servicio_id` bigint(20) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL COMMENT 'Descripción de la tarea qu',
  `horario_desde` time NOT NULL COMMENT 'Tiempo de inicio del proceso',
  `horario_hasta` time NOT NULL COMMENT 'Tiempo de fin del servicio',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tarea_id`),
  KEY `fk_tarea_1_servicio_idx` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tiene como función llevar el control de los horarios de ejecución de los servicios.' AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `tarea`:
--   `servicio_id`
--       `servicio` -> `servicio_id`
--

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

--
-- RELACIONES PARA LA TABLA `umbral`:
--   `servicio_id`
--       `servicio` -> `servicio_id`
--

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
-- RELACIONES PARA LA TABLA `usuarios`:
--   `id_rol`
--       `roles` -> `id_rol`
--   `id_estado`
--       `usuarios_estado` -> `id_estado`
--

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_rol`, `id_estado`, `permisologia`, `nombre`, `email`, `password`, `recuperacion`, `creacion`, `ultima_modificacion`) VALUES
(1, 1, 1, 'all', 'Admin Administrador', 'admin@admin.com', '9dbf7c1488382487931d10235fc84a74bff5d2f4', NULL, '2013-12-09 14:43:47', '2013-12-09 23:44:07');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `vulnerabilidades`
--

INSERT INTO `vulnerabilidades` (`id_vulnerabilidad`, `vulnerabilidad`) VALUES
(1, 'Existencia de materiales inflamables por doquier (Papeles, cajas, combustibles)'),
(2, 'Cableado inapropiado'),
(3, 'Ancho de banda inapropiado'),
(4, 'Suministro eléctrico inapropiado'),
(5, 'Mantenimiento inapropiado'),
(6, 'Ausencia de mantenimiento'),
(7, 'Educación inadecuada del personal en virus y malware'),
(8, 'Políticas de Firewall inadecuadas'),
(9, 'Políticas de seguridad de información inadecuadas'),
(10, 'Ausencia de políticas de seguridad'),
(11, 'Derechos de acceso incorrectos'),
(12, 'Ausencia de un sistema de extinción automática de incendios'),
(13, 'Ausencia de respaldos'),
(14, 'Ausencia de mecanismos de identificación y autenticación'),
(15, 'Ausencia de política de restricción de personal para uso de licencias de software'),
(16, 'Ubicación física en un área susceptible a desastres naturales'),
(17, 'Carencia de software antivirus'),
(18, 'Descarga incontrolada y uso de software de Internet'),
(19, 'Ausencia de mecanismos de cifrado de datos para la transmisión de datos confidenciales '),
(20, 'Protección física de equipos inadecuada'),
(21, 'Personal sin formación adecuada'),
(22, 'Incumplimientos legales'),
(23, 'Definición de privilegios de acceso inadecuada'),
(24, 'Ausencia de Planes de Continuidad y Recuperación del Negocio');

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


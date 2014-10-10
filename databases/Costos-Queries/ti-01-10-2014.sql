-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-10-2014 a las 21:59:03
-- Versión del servidor: 5.5.35
-- Versión de PHP: 5.3.10-1ubuntu3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `acuerdos_servicios` (
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

CREATE TABLE `arrendamiento` (
  `arrendamiento_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `costo` double NOT NULL COMMENT 'Costo en la moneda que dicte la información de la organización.',
  `fecha_inicial_vigencia` datetime NOT NULL COMMENT 'Fecha inicial de vigencia del arrendamiento',
  `esquema_tiempo` enum('mensual','trimestral','semestral','anual') NOT NULL COMMENT 'Esquema de tiempo seleccionado',
  `ma_motivo_id` bigint(20) NOT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`arrendamiento_id`),
  KEY `fk_arrendamiento_1_ma_motivo_idx` (`ma_motivo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracterizacion`
--

CREATE TABLE `caracterizacion` (
  `caracterizacion_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `servicio_id` bigint(20) NOT NULL COMMENT 'Permite guradar la data una vez es caracterizada. Aquí se aplica el algoritmo de clustering Kmeans.',
  `total_uso_redes` bigint(20) DEFAULT NULL,
  `total_uso_cpu` bigint(20) DEFAULT NULL,
  `total_uso_almacenamiento` bigint(20) DEFAULT NULL,
  `total_uso_memoria` bigint(20) DEFAULT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`caracterizacion_id`),
  KEY `fk_caracterizacion_1_servicio_idx` (`servicio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_riesgos`
--

CREATE TABLE `categorias_riesgos` (
  `id_categoria` bigint(20) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componente_ti`
--

CREATE TABLE `componente_ti` (
  `componente_ti_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `ma_unidad_medida_id` bigint(20) NOT NULL,
  `fecha_compra` datetime DEFAULT NULL COMMENT 'Fecha en la cual se adquierió \nun ítem.',
  `fecha_elaboracion` datetime DEFAULT NULL COMMENT 'Fecha en la cual fue\ncreado el componente de \nTI. Para algunos componentes\npuede que no aplique.',
  `fecha_creacion` datetime NOT NULL,
  `tiempo_vida` int(11) DEFAULT '0' COMMENT 'Cantidad de días/meses/años que durá un item.\nSi es cero "0" se asume\ninfinito el tiempo de vida.',
  `unidad_tiempo_vida` enum('AA','MM','DD','NA') NOT NULL DEFAULT 'NA' COMMENT 'Unidad asocidada al tiempo de vida, donde,\nDD: días, MM: meses, AA: años, y NA: no aplica para\nlos casos casuales en que sea infinito el mismo. ',
  `fecha_hasta` datetime DEFAULT NULL,
  `precio` double NOT NULL COMMENT 'precio del ítem',
  `capacidad` double NOT NULL DEFAULT '0' COMMENT 'Capacidad del ítem.',
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `cantidad_disponible` int(11) NOT NULL,
  `tipo_asignacion` enum('MULT','UNI') NOT NULL DEFAULT 'UNI' COMMENT 'Indica si un componente\npuede ser asignado \na múltiples departamentos.\n\nDominio {MULT,UNI}\nMULT: Múltiple\nUNI: Única: En ese caso\ndependerá de la cantidad\ndisponible',
  `activa` enum('ON','OFF') NOT NULL DEFAULT 'ON' COMMENT 'Permite identificar si \nel item de inventario\nestá activo o no, según el tiempo de vida\nespecificado.',
  `borrado` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Fecha de fin del tiempo de vida',
  PRIMARY KEY (`componente_ti_id`),
  KEY `fk_inventario_ti_detalle_1_ma_unidad_medida_idx` (`ma_unidad_medida_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Detalle de los Componentes de TI.' AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `departamento_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `icono_fa` varchar(50) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Ícono de FontAwesome\nla cadena que representa \nel nombre del mismo.',
  PRIMARY KEY (`departamento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Su función es llevar el control de los servicios que se encuentran asociados a los departamentos.' AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento_direccion`
--

CREATE TABLE `departamento_direccion` (
  `departamento_direccion_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `departamento_id` bigint(20) NOT NULL,
  `direccion_mac` varchar(200) NOT NULL COMMENT 'Direcciones de mac de\nlos equipos que se\nencuentren en los\ndepartamentos',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`departamento_direccion_id`),
  KEY `fk_departamento_direccion_1_departamento_idx` (`departamento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Direcciones mac asociadas a los departamentos.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento_servicio`
--

CREATE TABLE `departamento_servicio` (
  `departamento_id` bigint(20) NOT NULL COMMENT 'Clave primaria',
  `servicio_id` bigint(20) NOT NULL COMMENT 'FK servicio',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`departamento_id`,`servicio_id`),
  KEY `fk_departamento_servicio_1_servicio_idx` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Relación entre la tabla "servicio" y "departamento"';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad`
--

CREATE TABLE `disponibilidad` (
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

CREATE TABLE `estructura_costo` (
  `estructura_costo_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mes` int(11) NOT NULL,
  `anio` int(11) NOT NULL,
  `fecha_creacion` datetime NOT NULL COMMENT 'Se crearán mensualmente',
  PRIMARY KEY (`estructura_costo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Permite almacenar la contabilización total de los costos. Incluyendo los costos indirectos. De manera que esta información es la que será\nutilizada para hacer el cruce con la data de rendimiento.' AUTO_INCREMENT=632 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estructura_costo_item`
--

CREATE TABLE `estructura_costo_item` (
  `estructura_costo_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `estructura_costo_id` bigint(20) NOT NULL COMMENT 'fk estrucutura_costo',
  `ma_categoria_id` bigint(20) NOT NULL COMMENT 'fk ma_categoria ',
  `total_capacidad` bigint(20) NOT NULL COMMENT 'Capacidad total expresado\nen la unidad más baja\nsegún la categoría.',
  `total_monetario` double NOT NULL COMMENT 'Total monetario que\nestá asociado al \ntotal capacidad.',
  `total_monetario_cost_ind` double NOT NULL COMMENT 'Total monetario por concepto de costos \nindirectos.',
  `cantidad_items` bigint(20) NOT NULL COMMENT 'Cantidad de items que\nposee la categoría',
  PRIMARY KEY (`estructura_costo_item_id`),
  KEY `fk_estructura_costo_item_1_estructura_costo_idx` (`estructura_costo_id`),
  KEY `fk_estructura_costo_item_2_ma_categoria_idx` (`ma_categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1997 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `allDay` enum('true','false') DEFAULT 'false',
  `borrado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacion`
--

CREATE TABLE `formacion` (
  `formacion_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion_breve` varchar(200) NOT NULL COMMENT 'Breve descripción',
  `costo` double NOT NULL COMMENT 'Costo asociado a la formación',
  `fecha` datetime NOT NULL,
  `formacion_tipo_id` bigint(20) NOT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`formacion_id`),
  KEY `fk_formacion_1_formacion_tipo_idx` (`formacion_tipo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Costos Indirectos relaacionados con la formación de personal.' AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formacion_tipo`
--

CREATE TABLE `formacion_tipo` (
  `formacion_tipo_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL COMMENT 'Nombre del tipo de\nformación',
  PRIMARY KEY (`formacion_tipo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tipos de formación' AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `honorario`
--

CREATE TABLE `honorario` (
  `honorario_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `costo` double NOT NULL,
  `numero_profesionales` int(11) NOT NULL,
  `fecha_desde` datetime NOT NULL COMMENT 'Inicio de fecha de vigencia',
  `fecha_hasta` datetime NOT NULL COMMENT 'Inicio de fecha de vigencia',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`honorario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Honoraios Profesionales' AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencia`
--

CREATE TABLE `incidencia` (
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_componente_ti`
--

CREATE TABLE `inventario_componente_ti` (
  `inventario_componente_ti_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Interrelacion de inventario_ti contra\ncomponente_ti',
  `inventario_ti_id` bigint(20) NOT NULL,
  `componente_ti_id` bigint(20) NOT NULL,
  PRIMARY KEY (`inventario_componente_ti_id`),
  KEY `fk_inventario_componente_ti_1_inventario_ti_idx` (`inventario_ti_id`),
  KEY `fk_inventario_componente_ti_2_componente_ti_idx` (`componente_ti_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Un componente de TI pertenece a uno o más inventarios' AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_ti`
--

CREATE TABLE `inventario_ti` (
  `inventario_ti_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `departamento_id` bigint(20) NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`inventario_ti_id`),
  KEY `fk_inventario_ti_1_departamento_idx` (`departamento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Lleva el control de los elementos de tecnología de información que posea la organización.' AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logros_rendimiento`
--

CREATE TABLE `logros_rendimiento` (
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

CREATE TABLE `mantenimiento` (
  `mantenimiento_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo_operacion` enum('mantenimiento','instalación') NOT NULL COMMENT 'Dominio{mantenimiento, operacion}',
  `ma_motivo_id` bigint(20) NOT NULL,
  `costo` double NOT NULL COMMENT 'Costo de manimiento',
  `fecha` datetime NOT NULL COMMENT 'Fecha de mantenimiento\n',
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ma_categoria`
--

CREATE TABLE `ma_categoria` (
  `ma_categoria_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `icono_fa` varchar(50) NOT NULL COMMENT 'Cadena que representa el\nícono de la categoría según los \níconos de FontAwaesome',
  `valor_base` bigint(20) DEFAULT NULL COMMENT 'Valor base que corresponde a la unidad de medidad\nMemoria: 1024 (bytes)\nAlmacenamiento: 1024 (bytes)\nRedes: 1000 (bit)\nProcesador: 1024 (Herz)\n',
  PRIMARY KEY (`ma_categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Representa el maestro de las categorías las cuales se encuentran previamente cargadas' AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ma_motivo`
--

CREATE TABLE `ma_motivo` (
  `ma_motivo_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `seccion` enum('arrendamiento','mantenimiento','formacion','honorarios','utileria') NOT NULL COMMENT 'Indica la sección de Costos Indirectos a la que pertenecen.\n\nDominio{arrendamiento, mantenimiento, formacion, honorario}',
  PRIMARY KEY (`ma_motivo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ma_unidad_medida`
--

CREATE TABLE `ma_unidad_medida` (
  `ma_unidad_medida_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ma_categoria_id` bigint(20) NOT NULL COMMENT 'Clave foránea en ma_categoría',
  `nombre` varchar(45) NOT NULL COMMENT 'Nombre de la unidad de medida',
  `abrev_nombre` varchar(3) NOT NULL COMMENT 'Abreviatura del Nombre',
  `valor_nivel` bigint(20) NOT NULL COMMENT 'Representa el valor de la unidad expresado en una medida\nestándar, en este caso serían \nbytes si es Memoria Principal,\nsi Redes serían bits ',
  PRIMARY KEY (`ma_unidad_medida_id`),
  KEY `fk_ma_unidad_medida_1_ma_categoria_idx` (`ma_categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Registra todas las unidades de medidas que tendrá asociada un categoría' AUTO_INCREMENT=19 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo_hijo`
--

CREATE TABLE `modulo_hijo` (
  `id_modulo_hijo` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_modulo_padre` bigint(20) NOT NULL,
  `modulo_hijo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_modulo_hijo`),
  KEY `id_modulo_padre` (`id_modulo_padre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo_padre`
--

CREATE TABLE `modulo_padre` (
  `id_modulo_padre` bigint(20) NOT NULL AUTO_INCREMENT,
  `modulo_padre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_modulo_padre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones_mejoras`
--

CREATE TABLE `opciones_mejoras` (
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

CREATE TABLE `oportunidades_tecnologicas` (
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

CREATE TABLE `organizacion` (
  `organizacion_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `moneda` varchar(50) NOT NULL COMMENT 'Nombre asociado a la moneda',
  `abrev_moneda` varchar(45) NOT NULL COMMENT 'Abreviatura de la moneda',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`organizacion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Almacena los datos básicos de la organización.' AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto`
--

CREATE TABLE `presupuesto` (
  `presupuesto_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria',
  `monto` double NOT NULL COMMENT 'Cantidad de dinero asociada.',
  `departamento_id` bigint(20) NOT NULL COMMENT 'FK departamento',
  `tipo` enum('INV','SER') NOT NULL COMMENT 'Dominio:{INV,SER}\n\nINV: Inventario\nSER: Servicio',
  `fecha_creacion` datetime NOT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`presupuesto_id`),
  KEY `fk_presupuesto_1_departamento_idx` (`departamento_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Es un presupuesto generado en función de los precios de cada elemento' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuesto_item`
--

CREATE TABLE `presupuesto_item` (
  `presupuesto_item_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `presupuesto_id` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre del ítem',
  `precio` double NOT NULL COMMENT 'precio del item, éste puede ser un\nservicio o una pieza.',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`presupuesto_item_id`),
  KEY `fk_presupuesto_item_1_presupuesto_idx` (`presupuesto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Ítem de un presupuesto' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_historial`
--

CREATE TABLE `proceso_historial` (
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
  `tasa_cpu` int(11) NOT NULL COMMENT 'La tasa de CPU se basa en el\ntiempo de uso de CPU	',
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `riesgos_amenazas`
--

CREATE TABLE `riesgos_amenazas` (
  `id_riesgo` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_categoria` bigint(20) NOT NULL,
  `denominacion` varchar(100) NOT NULL,
  `probabilidad` varchar(50) NOT NULL,
  `impacto` varchar(50) NOT NULL,
  PRIMARY KEY (`id_riesgo`),
  KEY `fk_riesgos_amenazas_1_categorias_riesgos_idx` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` bigint(20) NOT NULL AUTO_INCREMENT,
  `rol` varchar(20) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `servicio_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `nombre` varchar(100) NOT NULL COMMENT 'Nombre asociado al servicio',
  `descripcion` varchar(100) NOT NULL COMMENT 'Describe el funcionamiento\nde un servicio',
  `fecha_creacion` datetime NOT NULL,
  `tipo` enum('SYS','USR') NOT NULL DEFAULT 'USR' COMMENT 'Para identificar el\ntipo de servicio asociado.\n\nDominio {SYS,USR}\nSYS: Son servicios asociados\nal Sistema Operativo.\n.USR: son los definidos por\nlos usuario',
  `genera_ingresos` tinyint(1) NOT NULL,
  `cantidad_ingresos` int(11) DEFAULT NULL COMMENT 'Cantidad de Ingresos , sólo está \nactivo cuando la variable genera\ningresos se encuentra en verdadero',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`servicio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Representa el catálogo de servicios de la infaestructura de TI' AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_costo`
--

CREATE TABLE `servicio_costo` (
  `servicio_costo_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `servicio_id` bigint(20) NOT NULL COMMENT 'fk en servicio',
  `costo` double NOT NULL,
  `fecha_creacion` datetime NOT NULL COMMENT 'Fecha en la cual\nse estableció ese costo para\nun servicio.',
  `nivel_criticidad` int(11) NOT NULL DEFAULT '0' COMMENT 'Define que tan crítico\nes un servicio en función\nde costos.',
  `mes` int(11) NOT NULL COMMENT 'Mes en el cual se \nhizo la valoración.',
  `anio` int(11) NOT NULL COMMENT 'Año en el que se hizo \nla valoración.',
  `borrado` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Costo asociado al\nservicio.',
  PRIMARY KEY (`servicio_costo_id`),
  KEY `fk_servicio_costo_1_servicio_idx` (`servicio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Costo asociado a un servicio, que incluso podrían tener varios costos asociados según la variación que este pueda tener en el tiempo' AUTO_INCREMENT=63 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_costo_detalle`
--

CREATE TABLE `servicio_costo_detalle` (
  `servicio_costo_detalle_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `servicio_costo_id` bigint(20) NOT NULL,
  `c_almacenamiento` double NOT NULL,
  `c_memoria` double NOT NULL,
  `c_redes` double NOT NULL,
  `c_procesador` double NOT NULL,
  PRIMARY KEY (`servicio_costo_detalle_id`),
  KEY `fk_servicio_costo_1_detalle_idx` (`servicio_costo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_historial`
--

CREATE TABLE `servicio_historial` (
  `servicio_historial_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `servicio_id` bigint(20) NOT NULL,
  `energia_consumida` int(11) NOT NULL COMMENT 'Número de (MEDIDA) unidades de medidas\nde energía consumida',
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_proceso`
--

CREATE TABLE `servicio_proceso` (
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `tarea_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `servicio_id` bigint(20) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL COMMENT 'Descripción de la tarea que\nva a llevar a cabo.',
  `horario_desde` time NOT NULL COMMENT 'Tiempo de inicio del proceso',
  `horario_hasta` time NOT NULL COMMENT 'Tiempo de fin del servicio',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tarea_id`),
  KEY `fk_tarea_1_servicio_idx` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tiene como función llevar el control de los horarios de ejecución de los servicios.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea_detalle`
--

CREATE TABLE `tarea_detalle` (
  `tarea_detalle_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tarea_id` bigint(20) NOT NULL COMMENT 'FK en "tareas".',
  `operacion` varchar(45) NOT NULL,
  `comando` varchar(45) DEFAULT NULL COMMENT 'Comando que se ejecutará\npara iniciar el servicio.',
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tarea_detalle_id`),
  KEY `fk_tarea_detalle_1_tarea_idx` (`tarea_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Detalle de asociado a la tabla de "tareas".' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `umbral`
--

CREATE TABLE `umbral` (
  `umbral_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `servicio_id` bigint(20) NOT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `tiempo_acordado` int(11) NOT NULL,
  `medida` enum('hh','mm','ss') NOT NULL COMMENT 'Unidad de medida del\ntiempo acordado\n\nDominio {hh,mm,ss}',
  `valor` int(11) NOT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`umbral_id`),
  KEY `fk_umbral_1_servicio_idx` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_estado`
--

CREATE TABLE `usuarios_estado` (
  `id_estado` bigint(20) NOT NULL AUTO_INCREMENT,
  `estado` varchar(100) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `utileria`
--

CREATE TABLE `utileria` (
  `utileria_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `costo` double NOT NULL,
  `fecha` datetime NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`utileria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vulnerabilidades`
--

CREATE TABLE `vulnerabilidades` (
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
-- Filtros para la tabla `caracterizacion`
--
ALTER TABLE `caracterizacion`
  ADD CONSTRAINT `fk_caracterizacion_1_servicio` FOREIGN KEY (`servicio_id`) REFERENCES `servicio` (`servicio_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_riesgos_amenazas_1_categorias_riesgos` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_riesgos` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio_costo`
--
ALTER TABLE `servicio_costo`
  ADD CONSTRAINT `fk_servicio_costo_1_servicio` FOREIGN KEY (`servicio_id`) REFERENCES `servicio` (`servicio_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio_costo_detalle`
--
ALTER TABLE `servicio_costo_detalle`
  ADD CONSTRAINT `fk_servicio_costo_1_detalle` FOREIGN KEY (`servicio_costo_id`) REFERENCES `servicio_costo` (`servicio_costo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

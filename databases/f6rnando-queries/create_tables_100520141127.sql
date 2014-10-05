-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-10-2014 a las 11:25:56
-- Versión del servidor: 5.5.38-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `ti`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_riesgos`
--

DROP TABLE IF EXISTS `categorias_riesgos` CASCADE;
CREATE TABLE IF NOT EXISTS `categorias_riesgos` (
  `id_categoria` bigint(20) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_pcn`
--

DROP TABLE IF EXISTS `equipo_pcn` CASCADE;
CREATE TABLE IF NOT EXISTS `equipo_pcn` (
  `id_equipo` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_tipo` bigint(20) NOT NULL,
  `nombre_equipo` varchar(30) DEFAULT NULL,
  `equipo` varchar(20) NOT NULL,
  `fecha_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id_equipo`),
  KEY `id_tipo` (`id_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estrategias_recuperacion`
--

DROP TABLE IF EXISTS `estrategias_recuperacion` CASCADE;
CREATE TABLE IF NOT EXISTS `estrategias_recuperacion` (
  `id_estrategia` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_tipoestrategia` bigint(20) NOT NULL,
  `denominacion` varchar(100) NOT NULL,
  `costo` varchar(100) NOT NULL,
  `hardware` varchar(300) NOT NULL,
  `telecom` varchar(300) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `localizacion` varchar(300) NOT NULL,
  `acotaciones` text NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_estrategia`),
  KEY `id_tipoestrategia` (`id_tipoestrategia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

DROP TABLE IF EXISTS `personal` CASCADE;
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_continuidad`
--

DROP TABLE IF EXISTS `plan_continuidad` CASCADE;
CREATE TABLE IF NOT EXISTS `plan_continuidad` (
  `id_continuidad` bigint(20) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(20) NOT NULL,
  `denominacion` varchar(100) NOT NULL,
  `id_riesgo` bigint(20) NOT NULL,
  `id_departamento` bigint(20) NOT NULL,
  `id_empleado` bigint(20) NOT NULL,
  `id_estado` bigint(20) NOT NULL,
  `id_estrategia` bigint(20) NOT NULL,
  `tipo_plan` varchar(20) NOT NULL,
  `id_crisis` bigint(20) NOT NULL,
  `desc_crisis` text NOT NULL,
  `id_recuperacion` bigint(20) NOT NULL,
  `desc_recuperacion` text NOT NULL,
  `id_logistica` bigint(20) NOT NULL,
  `desc_logistica` text NOT NULL,
  `id_rrpp` bigint(20) NOT NULL,
  `desc_rrpp` text NOT NULL,
  `id_pruebas` bigint(20) NOT NULL,
  `desc_pruebas` text NOT NULL,
  `consideraciones` text,
  `pdf` varchar(300) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_modificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_continuidad`),
  UNIQUE KEY `codigo` (`codigo`),
  KEY `id_riesgo` (`id_riesgo`),
  KEY `id_departamento` (`id_departamento`),
  KEY `id_empleado` (`id_empleado`),
  KEY `id_estado` (`id_estado`),
  KEY `id_crisis` (`id_crisis`),
  KEY `id_recuperacion` (`id_recuperacion`),
  KEY `id_logistica` (`id_logistica`),
  KEY `id_rrpp` (`id_rrpp`),
  KEY `id_pruebas` (`id_pruebas`),
  KEY `id_estrategia` (`id_estrategia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respaldo_db`
--

DROP TABLE IF EXISTS `respaldo_db` CASCADE;
CREATE TABLE IF NOT EXISTS `respaldo_db` (
  `id_respaldo` bigint(20) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(300) NOT NULL,
  `ruta` varchar(300) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id_respaldo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `riesgos_amenazas`
--

DROP TABLE IF EXISTS `riesgos_amenazas` CASCADE;
CREATE TABLE IF NOT EXISTS `riesgos_amenazas` (
  `id_riesgo` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_categoria` bigint(20) NOT NULL,
  `denominacion` varchar(100) NOT NULL,
  `probabilidad` varchar(50) NOT NULL,
  `impacto` varchar(50) NOT NULL,
  `valoracion` varchar(20) NOT NULL,
  PRIMARY KEY (`id_riesgo`),
  UNIQUE KEY `denominacion` (`denominacion`),
  KEY `id_categoria` (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoequipos_pcn`
--

DROP TABLE IF EXISTS `tipoequipos_pcn` CASCADE;
CREATE TABLE IF NOT EXISTS `tipoequipos_pcn` (
  `id_tipo` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo_equipo` varchar(20) NOT NULL,
  `denominacion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo`),
  UNIQUE KEY `equipo` (`tipo_equipo`,`denominacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_estrategiasrecuperacion`
--

DROP TABLE IF EXISTS `tipo_estrategiasrecuperacion` CASCADE;
CREATE TABLE IF NOT EXISTS `tipo_estrategiasrecuperacion` (
  `id_tipoestrategia` bigint(20) NOT NULL AUTO_INCREMENT,
  `denominacion` varchar(100) NOT NULL,
  `parentesis` varchar(100) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `costo` varchar(20) NOT NULL,
  `hardware` varchar(20) NOT NULL,
  `telecom` varchar(20) NOT NULL,
  `tiempo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipoestrategia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;



-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-04-2015 a las 12:50:56
-- Versión del servidor: 5.6.14
-- Versión de PHP: 5.5.6

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
-- Estructura de tabla para la tabla `acuerdo_nivel_servicio`
--

CREATE TABLE IF NOT EXISTS `acuerdo_nivel_servicio` (
  `acuerdo_nivel_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_servicio` bigint(20) NOT NULL,
  `nombre_acuerdo` varchar(255) NOT NULL,
  `gestor_servicio` varchar(200) NOT NULL,
  `cliente` varchar(500) NOT NULL,
  `representante_cliente` bigint(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `modo_revision` varchar(50) NOT NULL,
  `objetivos_acuerdo` text NOT NULL,
  `alcance` text NOT NULL,
  `condiciones_terminacion` text,
  `procedimiento_actualizacion` text,
  `soporte_tecnico` text NOT NULL,
  `contactos` text NOT NULL,
  `responsabilidades` text NOT NULL,
  `cobros` text,
  `glosario` text,
  `complemento_disponibilidad` text,
  `fecha_revision` date DEFAULT NULL,
  `ultima_revision` date DEFAULT NULL,
  `fecha_creacion_acuerdo` datetime NOT NULL,
  `fecha_modificacion_acuerdo` datetime DEFAULT NULL,
  `porcentaje_disp` int(4) NOT NULL,
  `lunes_disp_ini` time DEFAULT NULL,
  `lunes_disp_fin` time DEFAULT NULL,
  `martes_disp_ini` time DEFAULT NULL,
  `martes_disp_fin` time DEFAULT NULL,
  `miercoles_disp_ini` time DEFAULT NULL,
  `miercoles_disp_fin` time DEFAULT NULL,
  `jueves_disp_ini` time DEFAULT NULL,
  `jueves_disp_fin` time DEFAULT NULL,
  `viernes_disp_ini` time DEFAULT NULL,
  `viernes_disp_fin` time DEFAULT NULL,
  `sabado_disp_ini` time DEFAULT NULL,
  `sabado_disp_fin` time DEFAULT NULL,
  `domingo_disp_ini` time DEFAULT NULL,
  `domingo_disp_fin` time DEFAULT NULL,
  `lunes_mant_ini` time DEFAULT NULL,
  `lunes_mant_fin` time DEFAULT NULL,
  `martes_mant_ini` time DEFAULT NULL,
  `martes_mant_fin` time DEFAULT NULL,
  `miercoles_mant_ini` time DEFAULT NULL,
  `miercoles_mant_fin` time DEFAULT NULL,
  `jueves_mant_ini` time DEFAULT NULL,
  `jueves_mant_fin` time DEFAULT NULL,
  `viernes_mant_ini` time DEFAULT NULL,
  `viernes_mant_fin` time DEFAULT NULL,
  `sabado_mant_ini` time DEFAULT NULL,
  `sabado_mant_fin` time DEFAULT NULL,
  `domingo_mant_ini` time DEFAULT NULL,
  `domingo_mant_fin` time DEFAULT NULL,
  `pregunta_mant` varchar(5) NOT NULL,
  `modalidad_mantenimiento` int(2) NOT NULL,
  `unidad_num_caidas` varchar(10) NOT NULL,
  `minimo_num_caidas` int(10) NOT NULL,
  `maximo_num_caidas` int(10) NOT NULL,
  `unidad_duracion_caidas` varchar(11) NOT NULL,
  `minimo_duracion_caidas` int(11) NOT NULL,
  `maximo_duracion_caidas` int(11) NOT NULL,
  `unidad_tiempo_respuesta` varchar(10) NOT NULL,
  `minimo_tiempo_respuesta` int(15) NOT NULL,
  `maximo_tiempo_respuesta` int(15) NOT NULL,
  `unidad_tiempo_restauracion` varchar(10) NOT NULL,
  `minimo_tiempo_restauracion` int(10) NOT NULL,
  `maximo_tiempo_restauracion` int(10) NOT NULL,
  `tiempo_respuesta_critico` int(10) NOT NULL,
  `unidad_respuesta_critico` varchar(10) NOT NULL,
  `tiempo_respuesta_severo` int(10) NOT NULL,
  `unidad_respuesta_severo` varchar(10) NOT NULL,
  `tiempo_respuesta_medio` int(10) NOT NULL,
  `unidad_respuesta_medio` varchar(10) NOT NULL,
  `tiempo_respuesta_menor` int(10) NOT NULL,
  `unidad_respuesta_menor` varchar(10) NOT NULL,
  `tiempo_resolucion_critico` int(10) NOT NULL,
  `unidad_resolucion_critico` varchar(10) NOT NULL,
  `tiempo_resolucion_severo` int(10) NOT NULL,
  `unidad_resolucion_severo` varchar(10) NOT NULL,
  `tiempo_resolucion_medio` int(10) NOT NULL,
  `unidad_resolucion_medio` varchar(10) NOT NULL,
  `tiempo_resolucion_menor` int(10) NOT NULL,
  `unidad_resolucion_menor` varchar(10) NOT NULL,
  `minutos_disp_semanal` bigint(20) DEFAULT NULL,
  `minutos_disp_mensual` bigint(20) DEFAULT NULL,
  `minutos_disp_anual` bigint(20) DEFAULT NULL,
  `minutos_mant_semanal` bigint(20) DEFAULT NULL,
  `minutos_mant_mensual` bigint(20) DEFAULT NULL,
  `minutos_mant_anual` bigint(20) DEFAULT NULL,
  `posicion_terminacion` int(2) NOT NULL DEFAULT '1',
  `posicion_modificacion` int(2) NOT NULL DEFAULT '2',
  `posicion_niveles` int(2) NOT NULL DEFAULT '3',
  `posicion_soporte` int(2) NOT NULL DEFAULT '4',
  `posicion_responsabilidades` int(2) NOT NULL DEFAULT '5',
  `posicion_contacto` int(2) NOT NULL DEFAULT '6',
  `posicion_costos` int(2) NOT NULL DEFAULT '7',
  `posicion_glosario` int(2) NOT NULL DEFAULT '8',
  `ruta_pdf` varchar(535) DEFAULT NULL,
  PRIMARY KEY (`acuerdo_nivel_id`),
  KEY `id_servicio` (`id_servicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `acuerdo_nivel_servicio`
--

INSERT INTO `acuerdo_nivel_servicio` (`acuerdo_nivel_id`, `id_servicio`, `nombre_acuerdo`, `gestor_servicio`, `cliente`, `representante_cliente`, `fecha_inicio`, `fecha_final`, `modo_revision`, `objetivos_acuerdo`, `alcance`, `condiciones_terminacion`, `procedimiento_actualizacion`, `soporte_tecnico`, `contactos`, `responsabilidades`, `cobros`, `glosario`, `complemento_disponibilidad`, `fecha_revision`, `ultima_revision`, `fecha_creacion_acuerdo`, `fecha_modificacion_acuerdo`, `porcentaje_disp`, `lunes_disp_ini`, `lunes_disp_fin`, `martes_disp_ini`, `martes_disp_fin`, `miercoles_disp_ini`, `miercoles_disp_fin`, `jueves_disp_ini`, `jueves_disp_fin`, `viernes_disp_ini`, `viernes_disp_fin`, `sabado_disp_ini`, `sabado_disp_fin`, `domingo_disp_ini`, `domingo_disp_fin`, `lunes_mant_ini`, `lunes_mant_fin`, `martes_mant_ini`, `martes_mant_fin`, `miercoles_mant_ini`, `miercoles_mant_fin`, `jueves_mant_ini`, `jueves_mant_fin`, `viernes_mant_ini`, `viernes_mant_fin`, `sabado_mant_ini`, `sabado_mant_fin`, `domingo_mant_ini`, `domingo_mant_fin`, `pregunta_mant`, `modalidad_mantenimiento`, `unidad_num_caidas`, `minimo_num_caidas`, `maximo_num_caidas`, `unidad_duracion_caidas`, `minimo_duracion_caidas`, `maximo_duracion_caidas`, `unidad_tiempo_respuesta`, `minimo_tiempo_respuesta`, `maximo_tiempo_respuesta`, `unidad_tiempo_restauracion`, `minimo_tiempo_restauracion`, `maximo_tiempo_restauracion`, `tiempo_respuesta_critico`, `unidad_respuesta_critico`, `tiempo_respuesta_severo`, `unidad_respuesta_severo`, `tiempo_respuesta_medio`, `unidad_respuesta_medio`, `tiempo_respuesta_menor`, `unidad_respuesta_menor`, `tiempo_resolucion_critico`, `unidad_resolucion_critico`, `tiempo_resolucion_severo`, `unidad_resolucion_severo`, `tiempo_resolucion_medio`, `unidad_resolucion_medio`, `tiempo_resolucion_menor`, `unidad_resolucion_menor`, `minutos_disp_semanal`, `minutos_disp_mensual`, `minutos_disp_anual`, `minutos_mant_semanal`, `minutos_mant_mensual`, `minutos_mant_anual`, `posicion_terminacion`, `posicion_modificacion`, `posicion_niveles`, `posicion_soporte`, `posicion_responsabilidades`, `posicion_contacto`, `posicion_costos`, `posicion_glosario`, `ruta_pdf`) VALUES
(6, 1, 'Acuerdo 1', '2', '<p>Departamento de Produccion</p>', 1, '2014-10-21', '2015-10-21', 'Anual', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant. Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', NULL, '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', NULL, '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Actualizado</p>', '2015-10-21', NULL, '2014-10-21 17:41:50', '2014-12-04 17:07:54', 96, '08:00:00', '17:00:00', '08:00:00', '17:00:00', '08:00:00', '17:00:00', '08:00:00', '17:00:00', '08:00:00', '17:00:00', NULL, NULL, NULL, NULL, '22:00:00', '23:00:00', '22:00:00', '23:00:00', '22:00:00', '23:00:00', '22:00:00', '23:00:00', '22:00:00', '23:00:00', '19:00:00', '20:00:00', '21:00:00', '23:00:00', 'no', 4, 'dia', 3, 5, 'segundos', 6, 10, 'minutos', 1, 3, 'horas', 1, 4, 1, 'segundos', 2, 'minutos', 3, 'horas', 4, 'dias', 5, 'dias', 6, 'horas', 7, 'minutos', 8, 'segundos', 2700, 10800, 129600, 480, 1920, 23040, 1, 2, 3, 4, 5, 6, 7, 8, './assets/documentacion_GNS/ANS/6.pdf'),
(7, 2, 'Acuerdo 2', '2', '<p>Departamento 1</p>', 1, '2014-10-28', '2015-10-29', 'Trimestral', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', 'Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.', 'Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', 'Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.', 'Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.', NULL, '2015-01-21', NULL, '2014-10-21 18:12:04', NULL, 97, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21:00:00', '22:00:00', '21:00:00', '22:00:00', '21:00:00', '22:00:00', 'si', 2, 'dia', 1, 3, 'segundos', 1, 5, 'segundos', 1, 4, 'segundos', 1, 4, 1, 'segundos', 2, 'minutos', 3, 'horas', 4, 'horas', 4, 'minutos', 5, 'horas', 6, 'minutos', 7, 'horas', 10080, 40320, 483840, 180, 360, 4320, 4, 3, 5, 1, 6, 7, 2, 8, './assets/documentacion_GNS/ANS/7.pdf'),
(10, 2, 'Acuerdo 4 en base a el Acuerdo 2', '2', '<p>Departamento 1</p>', 1, '2014-10-28', '2015-10-29', 'Trimestral', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', NULL, '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', NULL, '2015-02-04', NULL, '2014-10-27 15:41:23', '2014-11-04 18:45:29', 97, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21:00:00', '22:00:00', '21:00:00', '22:00:00', '21:00:00', '22:00:00', 'si', 2, 'dia', 1, 3, 'segundos', 1, 5, 'segundos', 1, 4, 'segundos', 1, 4, 1, 'segundos', 2, 'minutos', 3, 'horas', 4, 'horas', 4, 'minutos', 5, 'horas', 6, 'minutos', 7, 'horas', 10080, 40320, 483840, 180, 360, 4320, 1, 2, 3, 4, 5, 6, 7, 8, './assets/documentacion_GNS/ANS/10.pdf'),
(12, 4, 'dwedwed', '2', '<p>dwedwedwe</p>', 1, '2014-11-21', '2014-11-25', 'Mensual', '<p>wedwed</p>', '<p>edwedwe</p>', NULL, NULL, '<p>rreferferferfferf</p>', '<p>edwedwed</p>', '<p>edwedwed</p>', NULL, NULL, NULL, '2014-12-13', NULL, '2014-11-13 03:10:40', NULL, 97, '00:19:00', '01:19:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '00:19:00', '02:19:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 4, 'mes', 1, 2, 'segundos', 4, 5, 'segundos', 1, 3, 'segundos', 4, 6, 3, 'segundos', 4, 'minutos', 5, 'horas', 6, 'minutos', 4, 'minutos', 6, 'horas', 6, 'segundos', 7, 'minutos', 60, 240, 2880, 120, 480, 5760, 1, 2, 3, 4, 5, 6, 7, 8, './assets/documentacion_GNS/ANS/12.pdf'),
(14, 1, 'ferferferferf', '2', '<p>Departamento de Produccion</p>', 3, '2014-11-21', '2014-11-26', 'Trimestral', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant. Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', NULL, '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', NULL, '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', NULL, '2015-02-13', NULL, '2014-11-13 03:23:20', '2014-11-13 03:23:20', 96, '08:00:00', '17:00:00', '08:00:00', '17:00:00', '08:00:00', '17:00:00', '08:00:00', '17:00:00', '08:00:00', '17:00:00', NULL, NULL, NULL, NULL, '22:00:00', '23:00:00', '22:00:00', '23:00:00', '22:00:00', '23:00:00', '22:00:00', '23:00:00', '22:00:00', '23:00:00', '19:00:00', '20:00:00', '21:00:00', '23:00:00', 'no', 4, 'dia', 3, 5, 'segundos', 6, 10, 'minutos', 1, 3, 'horas', 1, 4, 1, 'segundos', 2, 'minutos', 3, 'horas', 4, 'dias', 5, 'dias', 6, 'horas', 7, 'minutos', 8, 'segundos', 2700, 10800, 129600, 480, 1920, 23040, 1, 2, 3, 4, 5, 6, 7, 8, './assets/documentacion_GNS/ANS/14.pdf');
INSERT INTO `acuerdo_nivel_servicio` (`acuerdo_nivel_id`, `id_servicio`, `nombre_acuerdo`, `gestor_servicio`, `cliente`, `representante_cliente`, `fecha_inicio`, `fecha_final`, `modo_revision`, `objetivos_acuerdo`, `alcance`, `condiciones_terminacion`, `procedimiento_actualizacion`, `soporte_tecnico`, `contactos`, `responsabilidades`, `cobros`, `glosario`, `complemento_disponibilidad`, `fecha_revision`, `ultima_revision`, `fecha_creacion_acuerdo`, `fecha_modificacion_acuerdo`, `porcentaje_disp`, `lunes_disp_ini`, `lunes_disp_fin`, `martes_disp_ini`, `martes_disp_fin`, `miercoles_disp_ini`, `miercoles_disp_fin`, `jueves_disp_ini`, `jueves_disp_fin`, `viernes_disp_ini`, `viernes_disp_fin`, `sabado_disp_ini`, `sabado_disp_fin`, `domingo_disp_ini`, `domingo_disp_fin`, `lunes_mant_ini`, `lunes_mant_fin`, `martes_mant_ini`, `martes_mant_fin`, `miercoles_mant_ini`, `miercoles_mant_fin`, `jueves_mant_ini`, `jueves_mant_fin`, `viernes_mant_ini`, `viernes_mant_fin`, `sabado_mant_ini`, `sabado_mant_fin`, `domingo_mant_ini`, `domingo_mant_fin`, `pregunta_mant`, `modalidad_mantenimiento`, `unidad_num_caidas`, `minimo_num_caidas`, `maximo_num_caidas`, `unidad_duracion_caidas`, `minimo_duracion_caidas`, `maximo_duracion_caidas`, `unidad_tiempo_respuesta`, `minimo_tiempo_respuesta`, `maximo_tiempo_respuesta`, `unidad_tiempo_restauracion`, `minimo_tiempo_restauracion`, `maximo_tiempo_restauracion`, `tiempo_respuesta_critico`, `unidad_respuesta_critico`, `tiempo_respuesta_severo`, `unidad_respuesta_severo`, `tiempo_respuesta_medio`, `unidad_respuesta_medio`, `tiempo_respuesta_menor`, `unidad_respuesta_menor`, `tiempo_resolucion_critico`, `unidad_resolucion_critico`, `tiempo_resolucion_severo`, `unidad_resolucion_severo`, `tiempo_resolucion_medio`, `unidad_resolucion_medio`, `tiempo_resolucion_menor`, `unidad_resolucion_menor`, `minutos_disp_semanal`, `minutos_disp_mensual`, `minutos_disp_anual`, `minutos_mant_semanal`, `minutos_mant_mensual`, `minutos_mant_anual`, `posicion_terminacion`, `posicion_modificacion`, `posicion_niveles`, `posicion_soporte`, `posicion_responsabilidades`, `posicion_contacto`, `posicion_costos`, `posicion_glosario`, `ruta_pdf`) VALUES
(16, 1, 'swdaw', '2', '<p>Departamento de Produccion</p>', 3, '2014-11-28', '2015-02-04', 'Mensual', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant. Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', NULL, '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', NULL, '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', NULL, '2014-12-22', NULL, '2014-11-22 15:20:58', '2014-11-22 15:20:58', 96, '08:00:00', '17:00:00', '08:00:00', '17:00:00', '08:00:00', '17:00:00', '08:00:00', '17:00:00', '08:00:00', '17:00:00', NULL, NULL, NULL, NULL, '22:00:00', '23:00:00', '22:00:00', '23:00:00', '22:00:00', '23:00:00', '22:00:00', '23:00:00', '22:00:00', '23:00:00', '19:00:00', '20:00:00', '21:00:00', '23:00:00', 'no', 4, 'dia', 3, 5, 'segundos', 6, 10, 'minutos', 1, 3, 'horas', 1, 4, 1, 'segundos', 2, 'minutos', 3, 'horas', 4, 'dias', 5, 'dias', 6, 'horas', 7, 'minutos', 8, 'segundos', 2700, 10800, 129600, 480, 1920, 23040, 1, 2, 3, 4, 5, 6, 7, 8, './assets/documentacion_GNS/ANS/19.pdf'),
(20, 1, 'feferferf', '2', '<p>Departamento de Produccion</p>', 1, '2014-11-28', '2015-02-04', 'Mensual', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant. Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', NULL, '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', NULL, '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', NULL, '2014-12-28', NULL, '2014-11-22 15:35:40', '2014-11-22 15:35:40', 96, '08:00:00', '17:00:00', '08:00:00', '17:00:00', '08:00:00', '17:00:00', '08:00:00', '17:00:00', '08:00:00', '17:00:00', NULL, NULL, NULL, NULL, '22:00:00', '23:00:00', '22:00:00', '23:00:00', '22:00:00', '23:00:00', '22:00:00', '23:00:00', '22:00:00', '23:00:00', '19:00:00', '20:00:00', '21:00:00', '23:00:00', 'no', 4, 'dia', 3, 5, 'segundos', 6, 10, 'minutos', 1, 3, 'horas', 1, 4, 1, 'segundos', 2, 'minutos', 3, 'horas', 4, 'dias', 5, 'dias', 6, 'horas', 7, 'minutos', 8, 'segundos', 2700, 10800, 129600, 480, 1920, 23040, 1, 2, 3, 4, 5, 6, 7, 8, './assets/documentacion_GNS/ANS/20.pdf'),
(21, 1, 'Acuerdo prueba de Eventos', '2', '<p>Departamento de Produccion</p>', 1, '2014-12-30', '2015-12-30', 'Mensual', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant. Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', NULL, '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', NULL, '<p>Lorem ipsum dolor sit amet, bibendum felis felis ut neque non justo, quod lectus, sociis morbi turpis ligula, tellus turpis fusce eu. Ligula non mi non quam aliquam sapien, sed urna molestie pharetra ut non, magna rutrum ultrices molestie tempus, autem elementum feugiat ipsum id habitasse. Turpis ultrices lobortis, amet ut, risus consectetuer semper rutrum curae posuere cras, vehicula ultrices ipsum sollicitudin nulla felis neque, dui ultrices orci. Sed lacinia cras sollicitudin phasellus magna diam. Sed metus ultrices vel nec sit, duis hendrerit massa et et fames. Luctus wisi mi vitae arcu sociosqu, eros eget pellentesque, urna mollis elit erat quis hendrerit quis, lectus dictum justo in gravida. In sociosqu sit ullamcorper ligula, amet id massa lacus. Per diam vestibulum, est sed in vivamus nullam urna. Laoreet nam ipsum dolor, tellus placerat diam felis fringilla eu, diam orci placerat, fringilla qui accumsan neque aut, lectus eu hymenaeos leo. Eos egestas libero a magna, velit eleifend. Gravida morbi ipsum, a lacus bibendum, lobortis morbi, non pede lorem aliquam risus et augue. Turpis donec ligula nullam, wisi pellentesque, nec ultrices faucibus eleifend, praesent donec interdum volutpat nam quis habitant.</p>', '<p>Actualizado</p>', '2015-01-30', NULL, '2014-12-09 14:27:48', '2014-12-09 14:27:48', 96, '08:00:00', '17:00:00', '08:00:00', '17:00:00', '08:00:00', '17:00:00', '08:00:00', '17:00:00', '08:00:00', '17:00:00', NULL, NULL, NULL, NULL, '22:00:00', '23:00:00', '22:00:00', '23:00:00', '22:00:00', '23:00:00', '22:00:00', '23:00:00', '22:00:00', '23:00:00', '19:00:00', '20:00:00', '21:00:00', '23:00:00', 'no', 4, 'dia', 3, 5, 'segundos', 6, 10, 'minutos', 1, 3, 'horas', 1, 4, 1, 'segundos', 2, 'minutos', 3, 'horas', 4, 'dias', 5, 'dias', 6, 'horas', 7, 'minutos', 8, 'segundos', 2700, 10800, 129600, 480, 1920, 23040, 1, 2, 3, 4, 5, 6, 7, 8, './assets/documentacion_GNS/ANS/21.pdf');

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
-- Estructura de tabla para la tabla `asistente_evento`
--

CREATE TABLE IF NOT EXISTS `asistente_evento` (
  `id_evento` bigint(11) NOT NULL,
  `id_personal` bigint(11) NOT NULL,
  PRIMARY KEY (`id_evento`,`id_personal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistente_evento`
--

INSERT INTO `asistente_evento` (`id_evento`, `id_personal`) VALUES
(1, 1),
(1, 2),
(1, 3),
(5, 2),
(8, 1),
(8, 3),
(16, 3),
(18, 1),
(20, 2),
(20, 3),
(21, 2),
(21, 3),
(22, 2),
(23, 2),
(23, 4),
(23, 5),
(52, 2),
(52, 4),
(52, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracterizacion`
--

CREATE TABLE IF NOT EXISTS `caracterizacion` (
  `caracterizacion_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `servicio_id` bigint(20) NOT NULL COMMENT 'Permite guradar la data una vez es caracterizada. Aquí se aplica el algoritmo de clustering Kmeans.',
  `total_uso_redes` double DEFAULT NULL,
  `total_uso_cpu` double DEFAULT NULL,
  `total_uso_almacenamiento` double DEFAULT NULL,
  `total_uso_memoria` double DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`caracterizacion_id`),
  KEY `fk_caracterizacion_1_servicio_idx` (`servicio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Su funciÃ³n es llevar el control de los servicios que se encuentran asociados a los departamentos.' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`departamento_id`, `nombre`, `icono_fa`, `descripcion`, `borrado`) VALUES
(1, 'Departamento 1', 'fa-desktop', 'sfsdfdwedwe', 0),
(2, 'Departamento 2', 'fa-gavel', 'dfd', 0),
(3, 'Departamento 3', 'fa-keyboard-o', 'Departamento 3', 0);

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
-- Estructura de tabla para la tabla `equipo_pcn`
--

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

--
-- Volcado de datos para la tabla `equipo_pcn`
--

INSERT INTO `equipo_pcn` (`id_equipo`, `id_tipo`, `nombre_equipo`, `equipo`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, 'crisis1', '1,3,4', '2014-08-06 22:17:38', '2014-08-06 13:17:38'),
(2, 1, 'crisis2', '7,6,5', '2014-08-06 22:17:49', '2014-08-06 13:17:49'),
(3, 2, 'recuperacion1', '7,3,5', '2014-08-07 20:52:19', '2014-08-07 11:52:19'),
(4, 2, 'recuperacion2', '6,7', '2014-08-07 20:52:30', '2014-08-07 11:52:30'),
(5, 3, 'logistica1', '1', '2014-08-07 21:03:54', '2014-08-07 12:03:54'),
(6, 3, 'logistica2', '3,4', '2014-08-07 21:04:08', '2014-08-07 12:04:08'),
(7, 4, 'rrpp1', '5,1', '2014-08-07 21:04:25', '2014-08-07 12:04:25'),
(8, 4, 'rrpp2', '7,6', '2014-08-07 21:04:37', '2014-08-07 12:04:37'),
(9, 5, 'pruebas1', '7,6,3', '2014-08-07 21:05:08', '2014-08-07 12:05:08'),
(10, 5, 'pruebas2', '7,6,5', '2014-08-07 21:05:26', '2014-08-07 12:05:26'),
(12, 1, 'crisis3', '6,5', '2014-09-28 23:12:59', '2014-09-28 14:12:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estrategias_recuperacion`
--

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

--
-- Volcado de datos para la tabla `estrategias_recuperacion`
--

INSERT INTO `estrategias_recuperacion` (`id_estrategia`, `id_tipoestrategia`, `denominacion`, `costo`, `hardware`, `telecom`, `fecha_inicio`, `fecha_fin`, `localizacion`, `acotaciones`, `fecha_creacion`, `fecha_modificacion`) VALUES
(2, 1, 'RecuperaciÃ³n en frio', '25000', 'Llevar los servidores y monitores propios de f6rnando inc', 'Llevar modems, routers y cables propios', '2014-09-01', '2015-09-01', 'Planta baja del edificio de la compaÃ±Ã­a, local 231-5', '', '0000-00-00 00:00:00', '2014-09-29 23:37:29'),
(3, 1, 'RecuperaciÃ³n en frio externo', '35000', 'Llevar los servidores y monitores propios de f6rnando inc', 'Llevar modems, routers y cables propios', '2014-08-01', '2014-10-31', 'Edificio B de la compaÃ±Ã­a, planta baja, local 125-84', 'Moverse rÃ¡pido', '0000-00-00 00:00:00', '2014-09-29 23:38:41'),
(4, 2, 'RecuperaciÃ³n warm oficina superior', '10000', 'Llevar los servidores y monitores propios de f6rnando inc', 'Llevar modems, routers y cables propios', '2014-09-17', '2014-09-30', 'Edificio A de la compaÃ±Ã­a, piso 3, oficina 21', '', '0000-00-00 00:00:00', '2014-09-29 23:40:23');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `start`, `end`, `allDay`, `borrado`) VALUES
(1, 'mantenimiento del acceso remoto', '2014-07-02 00:00:00', '2014-07-03 00:00:00', 'true', 0),
(2, '545345', '2014-11-15 00:00:00', '2014-11-15 00:00:00', 'true', 0),
(3, 'unnun', '2014-11-19 00:00:00', '2014-11-22 00:00:00', 'true', 0),
(4, 'yytt', '2015-04-23 00:00:00', '2015-04-23 00:00:00', 'true', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_ans`
--

CREATE TABLE IF NOT EXISTS `evento_ans` (
  `acuerdo_nivel_id` bigint(20) NOT NULL,
  `id_evento` bigint(20) NOT NULL,
  PRIMARY KEY (`acuerdo_nivel_id`,`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evento_ans`
--

INSERT INTO `evento_ans` (`acuerdo_nivel_id`, `id_evento`) VALUES
(7, 23),
(10, 18),
(12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_gns`
--

CREATE TABLE IF NOT EXISTS `evento_gns` (
  `id_evento` bigint(20) NOT NULL AUTO_INCREMENT,
  `acuerdo_nivel_id` bigint(20) DEFAULT NULL,
  `tipo_evento` varchar(150) NOT NULL,
  `nombre_evento` varchar(250) NOT NULL,
  `lugar_evento` varchar(500) DEFAULT NULL,
  `inicio` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `descripcion_evento` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_evento`),
  KEY `acuerdo_nivel_id` (`acuerdo_nivel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

--
-- Volcado de datos para la tabla `evento_gns`
--

INSERT INTO `evento_gns` (`id_evento`, `acuerdo_nivel_id`, `tipo_evento`, `nombre_evento`, `lugar_evento`, `inicio`, `fin`, `descripcion_evento`) VALUES
(1, 12, 'revision_ANS', 'primer evento', 'aqui', '2014-12-21 18:53:00', '2014-12-21 19:53:00', 'prueba'),
(5, NULL, 'reunion', 'csdc', '', '2014-12-20 18:54:00', '2014-12-20 20:54:00', ''),
(6, NULL, 'otro', 'eewdwed', '', '2014-12-23 18:54:00', '2014-12-23 19:54:00', ''),
(8, NULL, 'reunion', 'ewewe modificado', '', '2014-12-09 19:13:00', '2014-12-09 20:13:00', ''),
(9, NULL, 'reunion', 'Reunión en el ojetal', '', '1969-12-31 20:00:00', '1969-12-31 20:00:00', ''),
(16, NULL, 'reunion', 'actualizado', '', '2014-12-08 20:41:00', '2014-12-08 22:41:00', ''),
(17, NULL, 'otro', 'Evento', '', '2014-12-11 20:05:00', '2014-12-11 22:05:00', ''),
(18, 10, 'renovacion_ANS', 'Evento', 'dwedwed', '2014-12-19 13:37:00', '2014-12-19 15:38:00', 'wedwedwedwd'),
(20, NULL, 'reunion', 'evento2', '', '2014-12-12 04:00:00', '2014-12-12 05:44:00', ''),
(21, NULL, 'reunion', 'Evnento 3', 'sdcsdc', '2014-12-12 10:00:00', '2014-12-12 11:48:00', 'csdcsdc'),
(22, NULL, 'otro', 'evento 4', 'dfdf', '2014-12-12 20:43:00', '2014-12-12 21:43:00', ''),
(23, 7, 'renovacion_ANS', 'Primer Evento con Ans', '', '2014-12-15 19:38:00', '2014-12-15 21:38:00', ''),
(29, NULL, 'otro', 'evento', '', '2014-12-15 19:38:00', '2014-12-15 21:38:00', ''),
(33, NULL, 'reunion', 'ererer', '', '2014-12-23 21:00:00', '2014-12-23 22:00:00', ''),
(34, NULL, 'reunion', 'llll', '', '2014-12-23 20:00:00', '2014-12-23 22:00:00', ''),
(35, NULL, 'reunion', 'dfdfdfdf', '', '2014-12-08 19:00:00', '2014-12-08 20:00:00', ''),
(52, NULL, 'reunion', 'Reunion Prueba', 'UC', '2014-12-27 09:00:00', '2014-12-27 10:00:00', 'Reunion de Tesis');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Un componente de TI pertenece a uno o mÃ¡s inventarios' AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `inventario_componente_ti`
--

INSERT INTO `inventario_componente_ti` (`inventario_componente_ti_id`, `inventario_ti_id`, `componente_ti_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Lleva el control de los elementos de tecnologÃ­a de informaciÃ³n que posea la organizaciÃ³n.' AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `inventario_ti`
--

INSERT INTO `inventario_ti` (`inventario_ti_id`, `departamento_id`, `fecha_creacion`, `borrado`) VALUES
(1, 1, '2014-05-20 13:10:10', 0),
(2, 2, '2014-05-20 13:10:24', 0),
(3, 1, '2014-08-31 20:43:05', 0),
(4, 1, '2014-08-31 21:17:20', 0),
(5, 1, '2014-08-31 21:20:01', 0),
(6, 3, '2014-12-10 21:32:23', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `codigo_empleado`, `id_departamento`, `nombre`, `cedula`, `email_personal`, `email_corporativo`, `tlfn_personal`, `tlfn_corporativo`, `cargo`, `fechaingreso_empresa`, `fecha_creacion`, `fecha_modificacion`) VALUES
(1, 'LOG-001', 1, 'Fernando Pinto', 'V-19524910', 'f6rnando@gmail.com', 'f6rnando@sigitec.com', '0424-0000101', '0412-7439763', 'Gerente de departamento', '2014-01-06 00:00:00', '2014-07-21 11:53:15', '2014-07-23 21:14:12'),
(2, 'LOG-002', 1, 'Fernando Colmenares', 'V-19000698', 'fernandocolmenares19@gmail.com', 'fernandocolmenares@sigitec.com', '0242-0012547', '0424-8741014', 'Desarrollador Web', '2014-10-07 00:00:00', '2014-07-21 12:41:02', '2014-12-11 01:11:44'),
(3, 'LOG-003', 2, 'Kelwin Gamez', 'V-20123456', 'kelwin@gmail.com', 'kelwingamez@sigitec.com', '0416-0102030', '0424-0708090', 'Gerente Investigador', '1969-12-31 20:00:00', '2014-07-23 12:16:10', '2014-07-23 21:16:10'),
(4, 'LOG-004', 2, 'Jose Fernando', '19879963', 'esteesmiotrocorreo@hotmail.com', NULL, '04243015896', NULL, 'Gerente de TI', '2014-12-09 00:00:00', '2014-12-09 00:00:00', '2014-12-10 22:45:56'),
(5, 'LOG-005', 3, 'Fernandinho Pernanbucano', '80253698', 'fernandocolmenares19@yahoo.com ', NULL, '02489521453', NULL, 'Gerente de TI', '2014-12-07 00:00:00', '2014-12-07 00:00:00', '2014-12-11 02:04:48');

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
-- Estructura de tabla para la tabla `proceso_caida_historial`
--

CREATE TABLE IF NOT EXISTS `proceso_caida_historial` (
  `proceso_caida_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `proceso_id` bigint(20) NOT NULL,
  `inicio_caida` datetime NOT NULL,
  `fin_caida` datetime NOT NULL,
  `duracion_caida` time NOT NULL,
  PRIMARY KEY (`proceso_caida_id`),
  KEY `proceso_id` (`proceso_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `proceso_caida_historial`
--

INSERT INTO `proceso_caida_historial` (`proceso_caida_id`, `proceso_id`, `inicio_caida`, `fin_caida`, `duracion_caida`) VALUES
(7, 18, '2015-02-28 22:10:07', '2015-02-28 22:11:07', '00:01:00'),
(8, 16, '2015-02-28 22:11:02', '2015-02-28 22:12:03', '00:01:01'),
(9, 19, '2015-02-28 22:10:07', '2015-02-28 22:12:08', '00:02:01'),
(10, 17, '2015-02-28 22:12:03', '2015-02-28 22:13:04', '00:01:01'),
(11, 20, '2015-02-28 22:10:02', '2015-02-28 22:13:04', '00:03:02'),
(12, 16, '2015-02-28 22:13:04', '2015-02-28 22:14:04', '00:01:00'),
(13, 18, '2015-02-28 22:14:09', '2015-02-28 22:15:00', '00:00:51'),
(14, 16, '2015-03-16 06:30:00', '2015-03-16 07:00:00', '00:30:00'),
(15, 17, '2015-03-16 06:00:00', '2015-03-16 06:30:00', '00:30:00'),
(16, 20, '2015-03-16 15:30:00', '2015-03-16 16:00:00', '00:30:00'),
(17, 19, '2015-03-16 17:00:00', '2015-03-16 17:05:00', '00:05:00'),
(18, 16, '2015-03-18 10:00:00', '2015-03-18 10:08:00', '00:08:00'),
(19, 17, '2015-03-19 11:00:00', '2015-03-19 11:02:00', '00:02:00'),
(20, 20, '2015-03-19 11:00:00', '2015-03-19 11:02:00', '00:02:00'),
(21, 16, '2015-03-20 07:00:00', '2015-03-20 07:00:20', '00:00:20'),
(22, 19, '2015-03-18 13:00:00', '2015-03-18 13:03:00', '00:03:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso_historial`
--

CREATE TABLE IF NOT EXISTS `proceso_historial` (
  `proceso_historial_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria',
  `thread` varchar(6) NOT NULL,
  `comando_ejecutable` varchar(20) NOT NULL,
  `mac_dir` varchar(100) NOT NULL,
  `pagina_errores` int(11) NOT NULL,
  `tasa_ram` int(11) NOT NULL,
  `tasa_cpu` int(11) NOT NULL COMMENT 'La tasa de CPU se basa en el',
  `operaciones_lectura_dd` int(11) NOT NULL,
  `operaciones_escritura_dd` int(11) NOT NULL,
  `tasa_lectura_dd` int(11) NOT NULL,
  `tasa_escritura_dd` int(11) NOT NULL,
  `tasa_transferencia_dd` int(11) NOT NULL,
  `tiempo_online` int(11) NOT NULL,
  `estado_proceso` varchar(1) NOT NULL,
  `pid_lista` varchar(300) NOT NULL,
  `borrado` tinyint(1) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`proceso_historial_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Guarda la informaciÃ³n en detalle de cada uno de los procesos' AUTO_INCREMENT=151 ;

--
-- Volcado de datos para la tabla `proceso_historial`
--

INSERT INTO `proceso_historial` (`proceso_historial_id`, `thread`, `comando_ejecutable`, `mac_dir`, `pagina_errores`, `tasa_ram`, `tasa_cpu`, `operaciones_lectura_dd`, `operaciones_escritura_dd`, `tasa_lectura_dd`, `tasa_escritura_dd`, `tasa_transferencia_dd`, `tiempo_online`, `estado_proceso`, `pid_lista`, `borrado`, `timestamp`) VALUES
(1, 'P', 'chrome', '', 1855, 6, 41, 2315, 0, 0, 8, 8, 691, 'R', '15583-15595-15596-15602-15605-15625-15639-16850"\r\n"P', 0, '2015-03-01 02:40:02'),
(2, 'P', 'vlc', '', 0, 0, 0, 0, 0, 0, 0, 0, 200, 'R', '21022"\r\n"P', 0, '2015-03-01 02:40:02'),
(3, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:40:02'),
(4, 'P', 'mysql-workbench', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:40:07'),
(5, 'P', 'firefox', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:40:07'),
(6, 'P', 'chrome', '', 1803, 6, 41, 2258, 0, 0, 0, 0, 701, 'R', '15583-15595-15596-15602-15605-15625-15639-16850"\r\n"P', 0, '2015-03-01 02:40:12'),
(7, 'P', 'vlc', '', 0, 0, 0, 0, 0, 0, 0, 0, 210, 'R', '21022"\r\n"P', 0, '2015-03-01 02:40:12'),
(8, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:40:12'),
(9, 'P', 'mysql-workbench', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:40:17'),
(10, 'P', 'firefox', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:40:17'),
(11, 'P', 'chrome', '', 1708, 6, 41, 2150, 0, 0, 24, 24, 711, 'R', '15583-15595-15596-15602-15605-15625-15639-16850"\r\n"P', 0, '2015-03-01 02:40:22'),
(12, 'P', 'vlc', '', 0, 0, 0, 0, 0, 0, 0, 0, 220, 'R', '21022"\r\n"P', 0, '2015-03-01 02:40:22'),
(13, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:40:22'),
(14, 'P', 'mysql-workbench', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:40:27'),
(15, 'P', 'firefox', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:40:27'),
(16, 'P', 'chrome', '', 1854, 6, 41, 2405, 0, 0, 12, 12, 721, 'R', '15583-15595-15596-15602-15605-15625-15639-16850"\r\n"P', 0, '2015-03-01 02:40:32'),
(17, 'P', 'vlc', '', 0, 0, 0, 0, 0, 0, 0, 0, 230, 'R', '21022"\r\n"P', 0, '2015-03-01 02:40:32'),
(18, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:40:32'),
(19, 'P', 'mysql-workbench', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:40:37'),
(20, 'P', 'firefox', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:40:37'),
(21, 'P', 'chrome', '', 1162, 6, 41, 1817, 0, 0, 0, 0, 731, 'R', '15583-15595-15596-15602-15605-15625-15639-16850"\r\n"P', 0, '2015-03-01 02:40:42'),
(22, 'P', 'vlc', '', 0, 0, 0, 0, 0, 0, 0, 0, 241, 'R', '21022"\r\n"P', 0, '2015-03-01 02:40:42'),
(23, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:40:42'),
(24, 'P', 'mysql-workbench', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:40:47'),
(25, 'P', 'firefox', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:40:47'),
(26, 'P', 'chrome', '', 1017, 6, 41, 1921, 0, 4, 324, 328, 741, 'R', '15583-15595-15596-15602-15605-15625-15639-16850"\r\n"P', 0, '2015-03-01 02:40:52'),
(27, 'P', 'vlc', '', 0, 0, 0, 0, 0, 0, 0, 0, 251, 'R', '21022"\r\n"P', 0, '2015-03-01 02:40:52'),
(28, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:40:52'),
(29, 'P', 'mysql-workbench', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:40:57'),
(30, 'P', 'firefox', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:40:57'),
(31, 'P', 'chrome', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:41:02'),
(32, 'P', 'vlc', '', 0, 0, 0, 0, 0, 0, 0, 0, 261, 'R', '21022"\r\n"P', 0, '2015-03-01 02:41:02'),
(33, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:41:02'),
(34, 'P', 'mysql-workbench', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:41:07'),
(35, 'P', 'firefox', '', 3, 2, 26, 195, 0, 0, 0, 0, 8, 'R', '21979"\r\n"P', 0, '2015-03-01 02:41:07'),
(36, 'P', 'chrome', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:41:12'),
(37, 'P', 'vlc', '', 0, 0, 0, 0, 0, 0, 0, 0, 271, 'R', '21022"\r\n"P', 0, '2015-03-01 02:41:12'),
(38, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:41:12'),
(39, 'P', 'mysql-workbench', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:41:17'),
(40, 'P', 'firefox', '', 6, 2, 19, 114, 0, 0, 0, 0, 18, 'R', '21979"\r\n"P', 0, '2015-03-01 02:41:17'),
(41, 'P', 'chrome', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:41:22'),
(42, 'P', 'vlc', '', 0, 0, 0, 0, 0, 0, 0, 0, 281, 'R', '21022"\r\n"P', 0, '2015-03-01 02:41:22'),
(43, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:41:22'),
(44, 'P', 'mysql-workbench', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:41:27'),
(45, 'P', 'firefox', '', 0, 2, 15, 110, 0, 0, 0, 0, 28, 'R', '21979"\r\n"P', 0, '2015-03-01 02:41:27'),
(46, 'P', 'chrome', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:41:33'),
(47, 'P', 'vlc', '', 0, 0, 0, 0, 0, 0, 0, 0, 291, 'R', '21022"\r\n"P', 0, '2015-03-01 02:41:33'),
(48, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:41:33'),
(49, 'P', 'mysql-workbench', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:41:38'),
(50, 'P', 'firefox', '', 4, 2, 12, 107, 0, 0, 0, 0, 38, 'R', '21979"\r\n"P', 0, '2015-03-01 02:41:38'),
(51, 'P', 'chrome', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:41:43'),
(52, 'P', 'vlc', '', 0, 0, 0, 32, 0, 0, 0, 0, 301, 'R', '21022"\r\n"P', 0, '2015-03-01 02:41:43'),
(53, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:41:43'),
(54, 'P', 'mysql-workbench', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:41:48'),
(55, 'P', 'firefox', '', 0, 2, 10, 4, 0, 0, 0, 0, 48, 'R', '21979"\r\n"P', 0, '2015-03-01 02:41:48'),
(56, 'P', 'chrome', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:41:53'),
(57, 'P', 'vlc', '', 0, 0, 0, 0, 0, 0, 0, 0, 311, 'R', '21022"\r\n"P', 0, '2015-03-01 02:41:53'),
(58, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:41:53'),
(59, 'P', 'mysql-workbench', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:41:58'),
(60, 'P', 'firefox', '', 26, 2, 8, 8, 0, 0, 0, 0, 58, 'R', '21979"\r\n"P', 0, '2015-03-01 02:41:58'),
(61, 'P', 'chrome', '', 21489, 3, 82, 2652, 0, 8, 236, 244, 2, 'R', '22387-22399-22400-22406-22409-22429-22441-22452"\r\n"P', 0, '2015-03-01 02:42:03'),
(62, 'P', 'vlc', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:42:03'),
(63, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:42:03'),
(64, 'P', 'mysql-workbench', '', 0, 1, 7, 2, 0, 0, 0, 0, 6, 'R', '22550-22554"\r\n"P', 0, '2015-03-01 02:42:08'),
(65, 'P', 'firefox', '', 0, 2, 8, 5, 0, 0, 0, 0, 68, 'R', '21979"\r\n"P', 0, '2015-03-01 02:42:08'),
(66, 'P', 'chrome', '', 0, 3, 17, 6, 0, 0, 4, 4, 12, 'R', '22387-22399-22400-22406-22409-22429-22441-22452"\r\n"P', 0, '2015-03-01 02:42:13'),
(67, 'P', 'vlc', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:42:13'),
(68, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:42:13'),
(69, 'P', 'mysql-workbench', '', 0, 1, 3, 0, 0, 0, 0, 0, 16, 'R', '22550-22554"\r\n"P', 0, '2015-03-01 02:42:18'),
(70, 'P', 'firefox', '', 0, 2, 7, 8, 0, 0, 0, 0, 78, 'R', '21979"\r\n"P', 0, '2015-03-01 02:42:18'),
(71, 'P', 'chrome', '', 93, 3, 9, 4, 0, 0, 132, 132, 22, 'R', '22387-22399-22400-22406-22409-22429-22441-22452"\r\n"P', 0, '2015-03-01 02:42:23'),
(72, 'P', 'vlc', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:42:23'),
(73, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:42:23'),
(74, 'P', 'mysql-workbench', '', 0, 1, 2, 15, 0, 0, 0, 0, 26, 'R', '22550-22554"\r\n"P', 0, '2015-03-01 02:42:28'),
(75, 'P', 'firefox', '', 0, 2, 6, 4, 0, 0, 0, 0, 88, 'R', '21979"\r\n"P', 0, '2015-03-01 02:42:28'),
(76, 'P', 'chrome', '', 644, 3, 7, 288, 0, 4, 16, 20, 32, 'R', '22387-22399-22400-22406-22409-22429-22441-22452"\r\n"P', 0, '2015-03-01 02:42:33'),
(77, 'P', 'vlc', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:42:33'),
(78, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:42:33'),
(79, 'P', 'mysql-workbench', '', 0, 1, 1, 0, 0, 0, 0, 0, 36, 'R', '22550-22554"\r\n"P', 0, '2015-03-01 02:42:38'),
(80, 'P', 'firefox', '', 0, 2, 5, 7, 0, 0, 0, 0, 99, 'R', '21979"\r\n"P', 0, '2015-03-01 02:42:38'),
(81, 'P', 'chrome', '', 176, 3, 7, 96, 0, 0, 72, 72, 42, 'R', '22387-22399-22400-22406-22409-22429-22441-22452"\r\n"P', 0, '2015-03-01 02:42:43'),
(82, 'P', 'vlc', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:42:43'),
(83, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:42:43'),
(84, 'P', 'mysql-workbench', '', 0, 1, 1, 0, 0, 0, 0, 0, 47, 'R', '22550-22554"\r\n"P', 0, '2015-03-01 02:42:48'),
(85, 'P', 'firefox', '', 0, 2, 5, 4, 0, 0, 0, 0, 109, 'R', '21979"\r\n"P', 0, '2015-03-01 02:42:48'),
(86, 'P', 'chrome', '', 54, 3, 6, 48, 0, 0, 0, 0, 52, 'R', '22387-22399-22400-22406-22409-22429-22441-22452"\r\n"P', 0, '2015-03-01 02:42:53'),
(87, 'P', 'vlc', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:42:53'),
(88, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:42:53'),
(89, 'P', 'mysql-workbench', '', 0, 1, 1, 0, 0, 0, 0, 0, 57, 'R', '22550-22554"\r\n"P', 0, '2015-03-01 02:42:58'),
(90, 'P', 'firefox', '', 0, 2, 4, 6, 0, 0, 0, 0, 119, 'R', '21979"\r\n"P', 0, '2015-03-01 02:42:58'),
(91, 'P', 'chrome', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:43:04'),
(92, 'P', 'vlc', '', 3, 0, 10, 42, 0, 0, 0, 0, 3, 'R', '23286"\r\n"P', 0, '2015-03-01 02:43:04'),
(93, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 2, 'R', '23371"\r\n"P', 0, '2015-03-01 02:43:04'),
(94, 'P', 'mysql-workbench', '', 0, 1, 1, 0, 0, 0, 0, 0, 67, 'R', '22550-22554"\r\n"P', 0, '2015-03-01 02:43:09'),
(95, 'P', 'firefox', '', 0, 2, 4, 4, 0, 0, 0, 0, 129, 'R', '21979"\r\n"P', 0, '2015-03-01 02:43:09'),
(96, 'P', 'chrome', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:43:14'),
(97, 'P', 'vlc', '', 0, 0, 2, 0, 0, 0, 0, 0, 13, 'R', '23286"\r\n"P', 0, '2015-03-01 02:43:14'),
(98, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 12, 'R', '23371"\r\n"P', 0, '2015-03-01 02:43:14'),
(99, 'P', 'mysql-workbench', '', 0, 1, 1, 0, 0, 0, 0, 0, 77, 'R', '22550-22554"\r\n"P', 0, '2015-03-01 02:43:19'),
(100, 'P', 'firefox', '', 0, 2, 4, 4, 0, 0, 0, 0, 139, 'R', '21979"\r\n"P', 0, '2015-03-01 02:43:19'),
(101, 'P', 'chrome', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:43:24'),
(102, 'P', 'vlc', '', 0, 0, 1, 0, 0, 0, 0, 0, 23, 'R', '23286"\r\n"P', 0, '2015-03-01 02:43:24'),
(103, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 22, 'R', '23371"\r\n"P', 0, '2015-03-01 02:43:24'),
(104, 'P', 'mysql-workbench', '', 0, 1, 1, 0, 0, 0, 0, 0, 87, 'R', '22550-22554"\r\n"P', 0, '2015-03-01 02:43:29'),
(105, 'P', 'firefox', '', 1, 2, 4, 581, 0, 0, 0, 0, 149, 'R', '21979"\r\n"P', 0, '2015-03-01 02:43:29'),
(106, 'P', 'chrome', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:43:34'),
(107, 'P', 'vlc', '', 0, 0, 1, 0, 0, 0, 0, 0, 33, 'R', '23286"\r\n"P', 0, '2015-03-01 02:43:34'),
(108, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 32, 'R', '23371"\r\n"P', 0, '2015-03-01 02:43:34'),
(109, 'P', 'mysql-workbench', '', 0, 1, 1, 1, 0, 0, 0, 0, 97, 'R', '22550-22554"\r\n"P', 0, '2015-03-01 02:43:39'),
(110, 'P', 'firefox', '', 0, 2, 4, 10, 0, 0, 0, 0, 159, 'R', '21979"\r\n"P', 0, '2015-03-01 02:43:39'),
(111, 'P', 'chrome', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:43:44'),
(112, 'P', 'vlc', '', 0, 0, 1, 1, 0, 0, 0, 0, 43, 'R', '23286"\r\n"P', 0, '2015-03-01 02:43:44'),
(113, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 42, 'R', '23371"\r\n"P', 0, '2015-03-01 02:43:44'),
(114, 'P', 'mysql-workbench', '', 0, 1, 1, 1, 0, 0, 0, 0, 107, 'R', '22550-22554"\r\n"P', 0, '2015-03-01 02:43:49'),
(115, 'P', 'firefox', '', 0, 2, 3, 6, 0, 0, 0, 0, 169, 'R', '21979"\r\n"P', 0, '2015-03-01 02:43:49'),
(116, 'P', 'chrome', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:43:54'),
(117, 'P', 'vlc', '', 0, 0, 1, 1, 0, 0, 0, 0, 53, 'R', '23286"\r\n"P', 0, '2015-03-01 02:43:54'),
(118, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 53, 'R', '23371"\r\n"P', 0, '2015-03-01 02:43:54'),
(119, 'P', 'mysql-workbench', '', 0, 1, 1, 1, 0, 0, 0, 0, 117, 'R', '22550-22554"\r\n"P', 0, '2015-03-01 02:43:59'),
(120, 'P', 'firefox', '', 0, 2, 3, 9, 0, 0, 0, 0, 179, 'R', '21979"\r\n"P', 0, '2015-03-01 02:43:59'),
(121, 'P', 'chrome', '', 1079, 3, 54, 537, 0, 4, 256, 260, 3, 'R', '23940-23952-23953-23959-23962-23982-23994-24005"\r\n"P', 0, '2015-03-01 02:44:04'),
(122, 'P', 'vlc', '', 0, 0, 0, 2, 0, 0, 0, 0, 63, 'R', '23286"\r\n"P', 0, '2015-03-01 02:44:04'),
(123, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 63, 'R', '23371"\r\n"P', 0, '2015-03-01 02:44:04'),
(124, 'P', 'mysql-workbench', '', 0, 1, 0, 1, 0, 0, 0, 0, 127, 'R', '22550-22554"\r\n"P', 0, '2015-03-01 02:44:09'),
(125, 'P', 'firefox', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:44:09'),
(126, 'P', 'chrome', '', 35664, 4, 50, 3357, 0, 40, 192, 232, 13, 'R', '23940-23952-23953-23959-23962-23982-23994-24155"\r\n"P', 0, '2015-03-01 02:44:14'),
(127, 'P', 'vlc', '', 0, 0, 0, 1, 0, 0, 0, 0, 73, 'R', '23286"\r\n"P', 0, '2015-03-01 02:44:14'),
(128, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 73, 'R', '23371"\r\n"P', 0, '2015-03-01 02:44:14'),
(129, 'P', 'mysql-workbench', '', 0, 1, 0, 1, 0, 0, 0, 0, 138, 'R', '22550-22554"\r\n"P', 0, '2015-03-01 02:44:19'),
(130, 'P', 'firefox', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:44:19'),
(131, 'P', 'chrome', '', 230, 4, 40, 325, 0, 0, 64, 64, 23, 'R', '23940-23952-23953-23959-23962-23982-23994-24155-24301"\r\n"P', 0, '2015-03-01 02:44:24'),
(132, 'P', 'vlc', '', 0, 0, 0, 1, 0, 0, 0, 0, 84, 'R', '23286"\r\n"P', 0, '2015-03-01 02:44:24'),
(133, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 83, 'R', '23371"\r\n"P', 0, '2015-03-01 02:44:24'),
(134, 'P', 'mysql-workbench', '', 0, 1, 0, 1, 0, 0, 0, 0, 148, 'R', '22550-22554"\r\n"P', 0, '2015-03-01 02:44:29'),
(135, 'P', 'firefox', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:44:29'),
(136, 'P', 'chrome', '', 548, 5, 48, 1930, 0, 0, 240, 240, 34, 'R', '23940-23952-23953-23959-23962-23982-23994-24155-24301"\r\n"P', 0, '2015-03-01 02:44:35'),
(137, 'P', 'vlc', '', 0, 0, 0, 1, 0, 0, 0, 0, 94, 'R', '23286"\r\n"P', 0, '2015-03-01 02:44:35'),
(138, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 93, 'R', '23371"\r\n"P', 0, '2015-03-01 02:44:35'),
(139, 'P', 'mysql-workbench', '', 0, 1, 0, 1, 0, 0, 0, 0, 158, 'R', '22550-22554"\r\n"P', 0, '2015-03-01 02:44:40'),
(140, 'P', 'firefox', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:44:40'),
(141, 'P', 'chrome', '', 492, 5, 44, 1840, 0, 0, 0, 0, 44, 'R', '23940-23952-23953-23959-23962-23982-23994-24155-24301"\r\n"P', 0, '2015-03-01 02:44:45'),
(142, 'P', 'vlc', '', 0, 0, 0, 1, 0, 0, 0, 0, 104, 'R', '23286"\r\n"P', 0, '2015-03-01 02:44:45'),
(143, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 103, 'R', '23371"\r\n"P', 0, '2015-03-01 02:44:45'),
(144, 'P', 'mysql-workbench', '', 0, 1, 0, 1, 0, 0, 0, 0, 168, 'R', '22550-22554"\r\n"P', 0, '2015-03-01 02:44:50'),
(145, 'P', 'firefox', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:44:50'),
(146, 'P', 'chrome', '', 466, 5, 42, 1804, 0, 0, 0, 0, 54, 'R', '23940-23952-23953-23959-23962-23982-23994-24155"\r\n"P', 0, '2015-03-01 02:44:55'),
(147, 'P', 'vlc', '', 0, 0, 0, 1, 0, 0, 0, 0, 114, 'R', '23286"\r\n"P', 0, '2015-03-01 02:44:55'),
(148, 'P', 'smartgit', '', 0, 0, 0, 0, 0, 0, 0, 0, 113, 'R', '23371"\r\n"P', 0, '2015-03-01 02:44:55'),
(149, 'P', 'mysql-workbench', '', 0, 1, 0, 1, 0, 0, 0, 0, 178, 'R', '22550-22554"\r\n"P', 0, '2015-03-01 02:45:00'),
(150, 'P', 'firefox', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 'C', '"\r\n"P', 0, '2015-03-01 02:45:00');

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
  PRIMARY KEY (`servicio_id`,`proceso_id`),
  KEY `servicio_id` (`servicio_id`),
  KEY `servicio_id_2` (`servicio_id`)
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
(16, 1),
(17, 1),
(17, 2),
(18, 3),
(18, 4),
(19, 1),
(19, 2),
(19, 3),
(20, 1),
(20, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisito_nivel_servicio`
--

CREATE TABLE IF NOT EXISTS `requisito_nivel_servicio` (
  `requisito_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_servicio` bigint(20) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cliente` varchar(500) NOT NULL,
  `fecha_creacion_requisito` datetime NOT NULL,
  `fecha_modificacion_requisito` datetime DEFAULT NULL,
  `porcentaje_disp` int(4) NOT NULL,
  `complemento_disponibilidad` text,
  `lunes_disp_ini` time DEFAULT NULL,
  `lunes_disp_fin` time DEFAULT NULL,
  `martes_disp_ini` time DEFAULT NULL,
  `martes_disp_fin` time DEFAULT NULL,
  `miercoles_disp_ini` time DEFAULT NULL,
  `miercoles_disp_fin` time DEFAULT NULL,
  `jueves_disp_ini` time DEFAULT NULL,
  `jueves_disp_fin` time DEFAULT NULL,
  `viernes_disp_ini` time DEFAULT NULL,
  `viernes_disp_fin` time DEFAULT NULL,
  `sabado_disp_ini` time DEFAULT NULL,
  `sabado_disp_fin` time DEFAULT NULL,
  `domingo_disp_ini` time DEFAULT NULL,
  `domingo_disp_fin` time DEFAULT NULL,
  `lunes_mant_ini` time DEFAULT NULL,
  `lunes_mant_fin` time DEFAULT NULL,
  `martes_mant_ini` time DEFAULT NULL,
  `martes_mant_fin` time DEFAULT NULL,
  `miercoles_mant_ini` time DEFAULT NULL,
  `miercoles_mant_fin` time DEFAULT NULL,
  `jueves_mant_ini` time DEFAULT NULL,
  `jueves_mant_fin` time DEFAULT NULL,
  `viernes_mant_ini` time DEFAULT NULL,
  `viernes_mant_fin` time DEFAULT NULL,
  `sabado_mant_ini` time DEFAULT NULL,
  `sabado_mant_fin` time DEFAULT NULL,
  `domingo_mant_ini` time DEFAULT NULL,
  `domingo_mant_fin` time DEFAULT NULL,
  `pregunta_mant` varchar(5) NOT NULL,
  `modalidad_mantenimiento` int(2) NOT NULL,
  `unidad_num_caidas` varchar(10) NOT NULL,
  `minimo_num_caidas` int(10) NOT NULL,
  `maximo_num_caidas` int(10) NOT NULL,
  `unidad_duracion_caidas` varchar(11) NOT NULL,
  `minimo_duracion_caidas` int(11) NOT NULL,
  `maximo_duracion_caidas` int(11) NOT NULL,
  `unidad_tiempo_respuesta` varchar(10) NOT NULL,
  `minimo_tiempo_respuesta` int(15) NOT NULL,
  `maximo_tiempo_respuesta` int(15) NOT NULL,
  `unidad_tiempo_restauracion` varchar(10) NOT NULL,
  `minimo_tiempo_restauracion` int(10) NOT NULL,
  `maximo_tiempo_restauracion` int(10) NOT NULL,
  `tiempo_respuesta_critico` int(10) NOT NULL,
  `unidad_respuesta_critico` varchar(10) NOT NULL,
  `tiempo_respuesta_severo` int(10) NOT NULL,
  `unidad_respuesta_severo` varchar(10) NOT NULL,
  `tiempo_respuesta_medio` int(10) NOT NULL,
  `unidad_respuesta_medio` varchar(10) NOT NULL,
  `tiempo_respuesta_menor` int(10) NOT NULL,
  `unidad_respuesta_menor` varchar(10) NOT NULL,
  `tiempo_resolucion_critico` int(10) NOT NULL,
  `unidad_resolucion_critico` varchar(10) NOT NULL,
  `tiempo_resolucion_severo` int(10) NOT NULL,
  `unidad_resolucion_severo` varchar(10) NOT NULL,
  `tiempo_resolucion_medio` int(10) NOT NULL,
  `unidad_resolucion_medio` varchar(10) NOT NULL,
  `tiempo_resolucion_menor` int(10) NOT NULL,
  `unidad_resolucion_menor` varchar(10) NOT NULL,
  `minutos_disp_semanal` bigint(20) DEFAULT NULL,
  `minutos_disp_mensual` bigint(20) DEFAULT NULL,
  `minutos_disp_anual` bigint(20) DEFAULT NULL,
  `minutos_mant_semanal` bigint(20) DEFAULT NULL,
  `minutos_mant_mensual` bigint(20) DEFAULT NULL,
  `minutos_mant_anual` bigint(20) DEFAULT NULL,
  `soporte_tecnico` text NOT NULL,
  `ruta_pdf` varchar(535) DEFAULT NULL,
  PRIMARY KEY (`requisito_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `requisito_nivel_servicio`
--

INSERT INTO `requisito_nivel_servicio` (`requisito_id`, `id_servicio`, `nombre`, `cliente`, `fecha_creacion_requisito`, `fecha_modificacion_requisito`, `porcentaje_disp`, `complemento_disponibilidad`, `lunes_disp_ini`, `lunes_disp_fin`, `martes_disp_ini`, `martes_disp_fin`, `miercoles_disp_ini`, `miercoles_disp_fin`, `jueves_disp_ini`, `jueves_disp_fin`, `viernes_disp_ini`, `viernes_disp_fin`, `sabado_disp_ini`, `sabado_disp_fin`, `domingo_disp_ini`, `domingo_disp_fin`, `lunes_mant_ini`, `lunes_mant_fin`, `martes_mant_ini`, `martes_mant_fin`, `miercoles_mant_ini`, `miercoles_mant_fin`, `jueves_mant_ini`, `jueves_mant_fin`, `viernes_mant_ini`, `viernes_mant_fin`, `sabado_mant_ini`, `sabado_mant_fin`, `domingo_mant_ini`, `domingo_mant_fin`, `pregunta_mant`, `modalidad_mantenimiento`, `unidad_num_caidas`, `minimo_num_caidas`, `maximo_num_caidas`, `unidad_duracion_caidas`, `minimo_duracion_caidas`, `maximo_duracion_caidas`, `unidad_tiempo_respuesta`, `minimo_tiempo_respuesta`, `maximo_tiempo_respuesta`, `unidad_tiempo_restauracion`, `minimo_tiempo_restauracion`, `maximo_tiempo_restauracion`, `tiempo_respuesta_critico`, `unidad_respuesta_critico`, `tiempo_respuesta_severo`, `unidad_respuesta_severo`, `tiempo_respuesta_medio`, `unidad_respuesta_medio`, `tiempo_respuesta_menor`, `unidad_respuesta_menor`, `tiempo_resolucion_critico`, `unidad_resolucion_critico`, `tiempo_resolucion_severo`, `unidad_resolucion_severo`, `tiempo_resolucion_medio`, `unidad_resolucion_medio`, `tiempo_resolucion_menor`, `unidad_resolucion_menor`, `minutos_disp_semanal`, `minutos_disp_mensual`, `minutos_disp_anual`, `minutos_mant_semanal`, `minutos_mant_mensual`, `minutos_mant_anual`, `soporte_tecnico`, `ruta_pdf`) VALUES
(1, 1, 'Requisito 1', '<p>cliente 1</p>', '2014-11-11 04:57:54', '2014-11-23 11:04:51', 98, '<p>Requisito Actualizado</p>', '04:54:00', '08:54:00', '04:54:00', '08:54:00', '04:54:00', '08:54:00', '04:54:00', '08:54:00', '04:54:00', '08:54:00', '04:54:00', '08:54:00', '04:54:00', '08:54:00', '12:55:00', '15:55:00', '12:55:00', '15:55:00', '12:55:00', '15:55:00', '12:55:00', '15:55:00', '12:55:00', '15:55:00', NULL, NULL, NULL, NULL, 'no', 4, 'dia', 1, 2, 'segundos', 2, 3, 'segundos', 2, 3, 'segundos', 2, 3, 1, 'segundos', 2, 'minutos', 3, 'segundos', 4, 'segundos', 5, 'minutos', 6, 'minutos', 7, 'minutos', 8, 'horas', 1680, 6720, 80640, 900, 3600, 43200, '<p>fdtftf</p>', './assets/documentacion_GNS/RNS/1.pdf'),
(2, 3, 'Requisito2', '<p>Cliente 2</p>', '2014-11-12 00:20:15', '2014-11-12 06:06:35', 97, '<p>Requisito Actualizado</p>', '00:19:00', '01:19:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '00:19:00', '02:19:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 4, 'mes', 1, 2, 'segundos', 4, 5, 'segundos', 1, 3, 'segundos', 4, 6, 3, 'segundos', 4, 'minutos', 5, 'horas', 6, 'minutos', 4, 'minutos', 6, 'horas', 6, 'segundos', 7, 'minutos', 60, 240, 2880, 120, 480, 5760, '<p>1rreferferferfferf</p>', './assets/documentacion_GNS/RNS/2.pdf'),
(3, 1, 'Requisito3', '<p>cliente 1</p>', '2014-11-11 04:57:54', '2014-11-12 06:07:06', 98, NULL, '04:54:00', '08:54:00', '04:54:00', '08:54:00', '04:54:00', '08:54:00', '04:54:00', '08:54:00', '04:54:00', '08:54:00', '04:54:00', '08:54:00', '04:54:00', '08:54:00', '12:55:00', '15:55:00', '12:55:00', '15:55:00', '12:55:00', '15:55:00', '12:55:00', '15:55:00', '12:55:00', '15:55:00', NULL, NULL, NULL, NULL, 'no', 4, 'mes', 1, 2, 'segundos', 2, 3, 'segundos', 2, 3, 'segundos', 2, 3, 1, 'segundos', 2, 'minutos', 3, 'segundos', 4, 'segundos', 5, 'minutos', 6, 'minutos', 7, 'minutos', 8, 'horas', 1680, 6720, 80640, 900, 3600, 43200, '<p>2fdtftf</p>', './assets/documentacion_GNS/RNS/3.pdf'),
(4, 3, 'Requisito4', '<p>Cliente 2</p>', '2014-11-12 00:20:15', '2014-11-12 06:07:16', 97, NULL, '00:19:00', '01:19:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '00:19:00', '02:19:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 4, 'mes', 1, 2, 'segundos', 4, 5, 'segundos', 1, 3, 'segundos', 4, 6, 3, 'segundos', 4, 'minutos', 5, 'horas', 6, 'minutos', 4, 'minutos', 6, 'horas', 6, 'segundos', 7, 'minutos', 60, 240, 2880, 120, 480, 5760, '<p>3rreferferferfferf</p>', './assets/documentacion_GNS/RNS/4.pdf'),
(9, 1, 'Requisito5', '<p>cliente 1</p>', '2014-11-11 04:57:54', '2014-11-12 06:08:47', 98, NULL, '04:54:00', '08:54:00', '04:54:00', '08:54:00', '04:54:00', '08:54:00', '04:54:00', '08:54:00', '04:54:00', '08:54:00', '04:54:00', '08:54:00', '04:54:00', '08:54:00', '12:55:00', '15:55:00', '12:55:00', '15:55:00', '12:55:00', '15:55:00', '12:55:00', '15:55:00', '12:55:00', '15:55:00', NULL, NULL, NULL, NULL, 'no', 4, 'mes', 1, 2, 'segundos', 2, 3, 'segundos', 2, 3, 'segundos', 2, 3, 1, 'segundos', 2, 'minutos', 3, 'segundos', 4, 'segundos', 5, 'minutos', 6, 'minutos', 7, 'minutos', 8, 'horas', 1680, 6720, 80640, 900, 3600, 43200, '<p>4fdtftf</p>', './assets/documentacion_GNS/RNS/9.pdf'),
(10, 3, 'Requisito6', '<p>Cliente 2</p>', '2014-11-12 00:20:15', '2014-11-23 11:13:06', 97, '', '00:19:00', '01:19:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '00:19:00', '02:19:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 4, 'mes', 1, 2, 'segundos', 4, 5, 'segundos', 1, 3, 'segundos', 4, 6, 3, 'segundos', 4, 'minutos', 5, 'horas', 6, 'minutos', 4, 'minutos', 6, 'horas', 6, 'segundos', 7, 'minutos', 60, 240, 2880, 120, 480, 5760, '<p>5rreferferferfferf</p>', './assets/documentacion_GNS/RNS/10.pdf'),
(13, 2, 'ferferferf', '<p>d34d34d34d</p>', '2014-11-13 03:52:22', NULL, 96, NULL, '03:50:00', '04:50:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '03:50:00', '04:50:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', 2, 'dia', 1, 2, 'segundos', 5, 6, 'minutos', 7, 9, 'segundos', 5, 7, 1, 'minutos', 2, 'minutos', 4, 'horas', 5, 'minutos', 6, 'segundos', 7, 'minutos', 7, 'horas', 8, 'horas', 60, 240, 2880, 60, 120, 1440, '<p>34r34r34r</p>', './assets/documentacion_GNS/RNS/13.pdf'),
(14, 3, 'wedwedwd', '<p>Cliente 1</p>', '2014-11-23 11:11:57', '2014-11-23 11:17:29', 93, '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', '11:09:00', '15:09:00', '11:09:00', '15:09:00', '11:09:00', '15:09:00', '11:09:00', '15:09:00', '11:09:00', '15:09:00', '11:09:00', '15:09:00', '11:09:00', '15:09:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '19:10:00', '23:10:00', '19:10:00', '23:10:00', '19:10:00', '23:10:00', 'no', 4, 'dia', 1, 5, 'segundos', 1, 2, 'minutos', 3, 6, 'horas', 1, 3, 1, 'minutos', 2, 'minutos', 3, 'segundos', 4, 'minutos', 5, 'minutos', 6, 'minutos', 7, 'dias', 8, 'minutos', 1680, 6720, 80640, 720, 2880, 34560, '<p>wedwedw</p>', './assets/documentacion_GNS/RNS/14.pdf');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Representa el catÃ¡logo de servicios de la infaestructura de' AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`servicio_id`, `nombre`, `descripcion`, `caracteristicas`, `fecha_creacion`, `categoria_servicio`, `tipo_servicio`, `propietario_servicio`, `proveedor_servicio`, `fecha_modificado`, `prioridad_servicio`, `impacto`, `procedimiento_solicitud`, `contacto`, `estatus`, `ruta_imagen`, `degradacion_cpu`, `degradacion_red`, `degradacion_memoria`, `degradacion_disco`, `fallo_cpu`, `fallo_red`, `fallo_memoria`, `fallo_disco`, `genera_ingresos`, `cantidad_ingresos`, `borrado`) VALUES
(1, 'Servicio 1', '<p>actualizado Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', '2014-09-23 08:01:11', 'Servicio de Bases de Datos', 'Servicio Orientado al Cliente', 3, 5, '2015-03-03 05:41:30', 'Baja', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/database-add-icon.png', 96, 98, 97, 95, 96, 99, 97, 95, NULL, NULL, 0),
(2, 'Servicio 2', '<p>Segundo Servicio </p>', '<p>Otras Caracteristicas (modificado)</p>', '2014-08-31 19:19:14', 'Servicio de Infraestructura', 'Servicio de Soporte', 1, 5, '2014-09-24 01:49:31', 'Media', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/database-arrow-down-icon.png', 3, 7, 5, 1, 4, 8, 6, 2, NULL, NULL, 0),
(3, 'Servicio 3', '<p> Servicio 3</p>', '<p> Servicio 3</p>', '2014-09-09 17:31:17', 'Servicio de Negocio', 'Servicio Orientado al Cliente', 2, 5, '2014-09-24 01:54:21', 'Baja', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/Cash-register-icon.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(4, 'Servicio 4', '<p>Servicio 4</p>', '<p>Servicio 3</p>', '2014-09-09 17:31:39', 'Servicio de Infraestructura', 'Servicio de Soporte', 2, 5, '2014-09-24 01:58:35', 'Alta', NULL, NULL, NULL, 'Activo', 'assets/imagenes/servicio/Categories-preferences-other-icon_(1).png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_caida_historial`
--

CREATE TABLE IF NOT EXISTS `servicio_caida_historial` (
  `servicio_caida_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `servicio_id` bigint(20) NOT NULL,
  `inicio_caida` datetime NOT NULL,
  `fin_caida` datetime NOT NULL,
  `duracion_caida` time NOT NULL,
  `duracion_caida_seg` int(7) NOT NULL,
  PRIMARY KEY (`servicio_caida_id`),
  KEY `servicio_id` (`servicio_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Volcado de datos para la tabla `servicio_caida_historial`
--

INSERT INTO `servicio_caida_historial` (`servicio_caida_id`, `servicio_id`, `inicio_caida`, `fin_caida`, `duracion_caida`, `duracion_caida_seg`) VALUES
(31, 4, '2015-02-28 22:10:07', '2015-02-28 22:11:07', '00:01:00', 60),
(32, 3, '2015-02-28 22:10:07', '2015-02-28 22:12:08', '00:02:00', 120),
(33, 2, '2015-02-28 22:10:07', '2015-02-28 22:13:04', '00:03:00', 180),
(34, 1, '2015-02-28 22:10:07', '2015-02-28 22:14:04', '00:04:00', 240),
(35, 3, '2015-02-28 22:14:09', '2015-02-28 22:15:00', '00:00:50', 50),
(36, 4, '2015-02-28 22:14:09', '2015-02-28 22:15:00', '00:00:50', 50),
(42, 1, '2015-03-16 06:00:00', '2015-03-16 07:00:00', '01:00:00', 3600),
(43, 1, '2015-03-16 15:30:00', '2015-03-16 16:00:00', '00:30:00', 1800),
(44, 1, '2015-03-16 17:00:00', '2015-03-16 17:05:00', '00:05:00', 300),
(45, 1, '2015-03-18 10:00:00', '2015-03-18 10:08:00', '00:08:00', 480),
(46, 1, '2015-03-18 13:00:00', '2015-03-18 13:03:00', '00:03:00', 180),
(47, 1, '2015-03-19 11:00:00', '2015-03-19 11:02:00', '00:02:00', 120),
(48, 1, '2015-03-20 07:00:00', '2015-03-20 07:00:20', '00:00:20', 20),
(53, 2, '2015-02-24 10:00:00', '2015-02-24 10:05:00', '00:05:00', 300),
(58, 2, '2015-02-24 09:06:00', '2015-02-24 09:06:15', '00:00:15', 15),
(59, 2, '2015-02-24 10:20:00', '2015-02-24 10:30:00', '00:10:00', 600);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Tabla para almacenar los nombres de las Categorías de Servicios' AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `servicio_categoria`
--

INSERT INTO `servicio_categoria` (`categoria_id`, `nombre`, `descripcion`, `ruta_imagen`) VALUES
(1, 'Servicio de Bases de Datos', '<p>Los servicios de soporte a las bases de datos se han diseñado para proveer ayuda cualificada en la configuración y gestión diaria de diversos y populares paquetes de bases de datos. Los servicios incluyen instalación y configuración de software de bases de datos, además de resolución de problemas, actualización e instalación de parches, cambios de configuración, rotación de ficheros de registro, depuraciones, archivado y ajuste del rendimiento para ayudarle a optimizar el rendimiento de su sitio Web y la satisfacción del usuario final.</p>', 'assets/imagenes/servicio/Misc-Database-3-icon.png'),
(2, 'Servicio de Almacenamiento', '<p>El servicio de almacenamiento proporciona una sólida combinación de hardware y software para la gestión de las necesidades de almacenamiento fiable de datos e información del cliente</p>', 'assets/imagenes/servicio/System-hd-icon.png'),
(3, 'Servicio de Negocio', '<p>Servicio de TI que sustenta directamente un Proceso de Negocio, en contraposición a un Servicio de Infraestructura que es usado internamente por el Proveedor de Servicios de TI y normalmente no tiene visibilidad hacía el Negocio. El término Servicio de Negocio también se usa para definir un Servicio que se provee a Clientes de Negocio a través de Unidades de Negocio. Por ejemplo la provisión de servicios financieros a Clientes de un banco, o la provisión de bienes a Clientes en una tienda de venta al por menor. La provisión exitosa de Servicios de Negocio a menudo depende de uno o más Servicios de TI.</p>', 'assets/imagenes/servicio/Actions-office-chart-bar-icon.png'),
(4, 'Servicio de Infraestructura', '<p>Un Servicio de TI que no es usado directamente por el Negocio, pero que es requerido por el Proveedor de Servicio de TI de modo que pueda proporcionar otros Servicios de TI. Por ejemplo Servicios de Directorio, servicios de nombrado o servicios de comunicación.</p>', 'assets/imagenes/servicio/Home-Server-icon.png'),
(5, 'Análisis del Sitema', '<p>ccvdfdvvd</p>', 'assets/imagenes/servicio/Apps-utilities-system-monitor-icon.png'),
(6, 'Aplicaciones', '<p>ffvdfbfgfbfgb</p>', 'assets/imagenes/servicio/System-Display-2-icon.png'),
(7, 'Categoria Nueva', '<p>cscdccsdcsdcsdc</p>', 'assets/imagenes/servicio/default.jpg'),
(8, 'Redes y Comunicaciones', '<p>xewedwed</p>', 'assets/imagenes/servicio/Apps-preferences-system-network-sharing-icon.png');

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
(16, 'chrome', 'Critico', NULL),
(17, 'vlc', 'Critico', NULL),
(18, 'firefox', 'Critico', NULL),
(19, 'mysql-workbench', 'Critico', NULL),
(20, 'smartgit', 'Critico', NULL);

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
(5, 6),
(5, 7),
(6, 3),
(6, 5),
(7, 1),
(7, 2),
(7, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_alerts`
--

CREATE TABLE IF NOT EXISTS `system_alerts` (
  `alerta_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_module` bigint(20) NOT NULL,
  `prioridad` varchar(20) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `href` varchar(200) DEFAULT NULL,
  `activa` tinyint(4) NOT NULL DEFAULT '0',
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`alerta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
-- Estructura de tabla para la tabla `tipoequipos_pcn`
--

CREATE TABLE IF NOT EXISTS `tipoequipos_pcn` (
  `id_tipo` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo_equipo` varchar(20) NOT NULL,
  `denominacion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo`),
  UNIQUE KEY `equipo` (`tipo_equipo`,`denominacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tipoequipos_pcn`
--

INSERT INTO `tipoequipos_pcn` (`id_tipo`, `tipo_equipo`, `denominacion`) VALUES
(1, 'crisis', 'ComitÃ© de crisis'),
(3, 'logistica', 'Equipo de logÃ­stica'),
(5, 'pruebas', 'Equipo de pruebas y apoyo'),
(2, 'recuperacion', 'Equipo de recuperaciÃ³n'),
(4, 'rrpp', 'Equipo de relaciones pÃºblicas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_estrategiasrecuperacion`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tipo_estrategiasrecuperacion`
--

INSERT INTO `tipo_estrategiasrecuperacion` (`id_tipoestrategia`, `denominacion`, `parentesis`, `descripcion`, `costo`, `hardware`, `telecom`, `tiempo`) VALUES
(1, 'Sitio en frÃ­o', 'Cold site', 'En esta opciÃ³n, generalmente sÃ³lo se tiene aire acondicionado, potencia,enlaces de telecomunicaciones, y otros.', 'Bajo', 'No', 'No', 'Largo'),
(2, 'Sitio semi-preparado', 'Warm site', 'En esta opciÃ³n no se incluyen servidores especÃ­ficos de alta capacidad.', 'Medio', 'Parcial', 'Parcial', 'Medio'),
(3, 'Sitio preparado', 'Hot site', 'Normalmente esta configurado con todo el hardware y el software requerido para iniciar la recuperaciÃ³n a la mayor brevedad.', 'Alto', 'Completo', 'Parcial', 'Corto'),
(4, 'Acuerdo recÃ­proco', 'Otras organizaciones', 'Cuenta con Hardware, telecomunicaciones y tiempo variable. Depende del acuerdo al que se haya llegado con la otra organizaciÃ³n.', 'Bajo', 'Parcial', 'Parcial', 'Medio'),
(5, 'Sitio espejo', 'Mirror site', 'Se procesa cada transacciÃ³n en paralelo con el sitio principal', 'Muy Alto', 'Completo', 'Completo', 'MÃ­nimo'),
(6, 'Sitios mÃ³viles', NULL, 'Cuenta con Hardware, telecomunicaciones y tiempo variable. Depende del contrato estipulado.', 'Alto', 'Variable', 'Variable', 'Variable'),
(7, 'ReutilizaciÃ³n', 'Espacios y personal propios', 'Se asignan tareas crÃ­ticas a personal de la organizaciÃ³n que atienen tareas menos crÃ­ticas o de otros departamentos. Se reutiliza cualquier componente de la organizaciÃ³n, necesario para la recuperaciÃ³n.', 'Bajo', 'Parcial', 'Incierto', 'Necesario');

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
-- Filtros para la tabla `acuerdo_nivel_servicio`
--
ALTER TABLE `acuerdo_nivel_servicio`
  ADD CONSTRAINT `acuerdo_nivel_servicio_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`servicio_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `arrendamiento`
--
ALTER TABLE `arrendamiento`
  ADD CONSTRAINT `fk_arrendamiento_1_ma_motivo` FOREIGN KEY (`ma_motivo_id`) REFERENCES `ma_motivo` (`ma_motivo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asistente_evento`
--
ALTER TABLE `asistente_evento`
  ADD CONSTRAINT `asistente_evento_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `evento_gns` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `equipo_pcn`
--
ALTER TABLE `equipo_pcn`
  ADD CONSTRAINT `equipo_pcn_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipoequipos_pcn` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estrategias_recuperacion`
--
ALTER TABLE `estrategias_recuperacion`
  ADD CONSTRAINT `estrategias_recuperacion_ibfk_1` FOREIGN KEY (`id_tipoestrategia`) REFERENCES `tipo_estrategiasrecuperacion` (`id_tipoestrategia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estructura_costo_item`
--
ALTER TABLE `estructura_costo_item`
  ADD CONSTRAINT `fk_estructura_costo_item_1_estructura_costo` FOREIGN KEY (`estructura_costo_id`) REFERENCES `estructura_costo` (`estructura_costo_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_estructura_costo_item_2_ma_categoria` FOREIGN KEY (`ma_categoria_id`) REFERENCES `ma_categoria` (`ma_categoria_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evento_ans`
--
ALTER TABLE `evento_ans`
  ADD CONSTRAINT `borrar` FOREIGN KEY (`acuerdo_nivel_id`) REFERENCES `acuerdo_nivel_servicio` (`acuerdo_nivel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evento_gns`
--
ALTER TABLE `evento_gns`
  ADD CONSTRAINT `borrar evento` FOREIGN KEY (`acuerdo_nivel_id`) REFERENCES `acuerdo_nivel_servicio` (`acuerdo_nivel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `proceso_caida_historial`
--
ALTER TABLE `proceso_caida_historial`
  ADD CONSTRAINT `proceso_caida_historial_ibfk_1` FOREIGN KEY (`proceso_id`) REFERENCES `servicio_proceso` (`servicio_proceso_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proceso_soporta_servicio`
--
ALTER TABLE `proceso_soporta_servicio`
  ADD CONSTRAINT `proceso_soporta_servicio_ibfk_1` FOREIGN KEY (`servicio_proceso_id`) REFERENCES `servicio_proceso` (`servicio_proceso_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `riesgos_amenazas`
--
ALTER TABLE `riesgos_amenazas`
  ADD CONSTRAINT `riesgos_amenazas_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_riesgos` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio_caida_historial`
--
ALTER TABLE `servicio_caida_historial`
  ADD CONSTRAINT `servicio_caida_historial_ibfk_1` FOREIGN KEY (`servicio_id`) REFERENCES `servicio` (`servicio_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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

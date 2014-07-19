-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-06-2014 a las 20:54:30
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

--
-- Volcado de datos para la tabla `arrendamiento`
--

INSERT INTO `arrendamiento` (`arrendamiento_id`, `nombre`, `costo`, `fecha_inicial_vigencia`, `esquema_tiempo`, `ma_motivo_id`, `borrado`) VALUES
(1, 'Nombre cambiado', 200, '2014-05-08 00:00:00', 'mensual', 8, 0),
(2, 'Nuevo arrendamiento', 552, '2014-06-25 00:00:00', 'trimestral', 9, 0),
(3, 'Monitor', 256, '2010-06-01 00:00:00', 'mensual', 9, 0),
(4, 'sdasd', 2, '2012-12-31 00:00:00', 'semestral', 8, 0);

--
-- Volcado de datos para la tabla `componente_ti`
--

INSERT INTO `componente_ti` (`componente_ti_id`, `ma_unidad_medida_id`, `fecha_compra`, `fecha_elaboracion`, `fecha_creacion`, `tiempo_vida`, `unidad_tiempo_vida`, `fecha_hasta`, `precio`, `capacidad`, `nombre`, `descripcion`, `cantidad`, `cantidad_disponible`, `tipo_asignacion`, `activa`, `borrado`) VALUES
(1, 10, '2014-05-15 00:00:00', '2010-05-15 18:47:11', '2010-05-15 18:47:19', 3, 'MM', '2010-05-18 18:47:19', 23.2, 324, 'Comp redes 1', 'ddws', 1, 1, 'MULT', 'ON', 0),
(2, 15, '2014-06-24 00:00:00', '2014-06-25 00:00:00', '2012-05-24 16:36:48', 25, 'MM', '2012-06-01 16:36:48', 25, 25, 'Disco', 'fdsf', 1, 1, 'UNI', 'ON', 0),
(3, 14, '2014-06-25 00:00:00', '2014-06-25 00:00:00', '2014-06-24 16:37:36', 23, 'MM', '2016-05-24 16:37:36', 324, 332, 'Cinta magnetica', 'wdsq', 3, 3, 'UNI', 'ON', 0),
(4, 10, '2014-06-24 00:00:00', '2014-06-24 00:00:00', '2014-06-24 16:38:16', 2, 'MM', '2014-08-24 16:38:16', 22, 212, 'Router', '25', 1, 1, 'UNI', 'ON', 0),
(5, 2, '2014-06-05 00:00:00', '2014-06-12 00:00:00', '2014-06-24 16:39:30', 43, 'DD', '2014-08-06 16:39:30', 34, 2048, 'Procesador', 'dfgfdgdfg', 1, 1, 'UNI', 'ON', 0),
(6, 17, '2014-06-21 00:00:00', '2014-06-25 00:00:00', '2014-06-24 16:40:04', 3223, 'DD', '2023-04-21 16:40:04', 23, 0, 'licencia WInd', 'fsdfsdafsda', 23, 23, 'UNI', 'ON', 0),
(7, 15, '2014-06-26 00:00:00', '2014-06-26 00:00:00', '2014-06-26 11:57:01', 5, 'MM', '2014-11-26 11:57:01', 89, 320, 'disco', 'wsds', 2, 2, 'UNI', 'ON', 0),
(8, 3, '2014-06-26 00:00:00', '2014-06-27 00:00:00', '2014-06-26 12:09:59', 3, 'AA', '2017-06-26 12:09:59', 233, 1, 'proces', 'dsf', 2, 2, 'UNI', 'ON', 0),
(9, 11, '2014-02-04 00:00:00', '2014-02-04 00:00:00', '2014-02-28 14:30:06', 2, 'AA', '2016-06-28 14:30:06', 89, 21, 'comp1', 'sds', 2, 2, 'UNI', 'ON', 0),
(10, 7, '2014-02-04 00:00:00', '2014-02-04 00:00:00', '2014-02-28 14:30:42', 8, 'MM', '2015-02-28 14:30:42', 8922, 2, 'memo', 'wswe', 3, 3, 'UNI', 'ON', 0),
(11, 3, '2014-06-29 00:00:00', '2014-06-30 00:00:00', '2014-06-29 14:50:07', 5, 'DD', '2014-07-04 14:50:07', 23, 23, 'Comp vence una semana', 'dsfdf', 3, 3, 'UNI', 'ON', 0),
(12, 7, '2014-06-27 00:00:00', '2014-06-26 00:00:00', '2014-06-29 14:51:00', 2, 'DD', '2014-07-01 14:51:00', 22, 12, 'Com casi vencido', 'erf', 1, 1, 'UNI', 'ON', 0),
(13, 12, '2014-06-28 00:00:00', '2014-07-04 00:00:00', '2014-06-29 14:51:48', 6, 'DD', '2014-07-05 14:51:48', 43, 3, 'Casi vencido redes', 'fdsfdsf', 2, 2, 'UNI', 'ON', 0);

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`departamento_id`, `nombre`, `icono_fa`, `descripcion`, `borrado`) VALUES
(1, 'dpto1', 'fa-cog', 'es un dpto', 0),
(2, 'dpto2 ', 'fa-laptop', 'prueba de dpto 2', 0);

--
-- Volcado de datos para la tabla `estructura_costo`
--

INSERT INTO `estructura_costo` (`estructura_costo_id`, `mes`, `anio`, `fecha_creacion`) VALUES
(554, 2, 2014, '2014-06-29 20:26:37'),
(555, 3, 2014, '2014-06-29 20:26:37'),
(556, 4, 2014, '2014-06-29 20:26:37'),
(557, 5, 2014, '2014-06-29 20:26:37'),
(558, 6, 2014, '2014-06-29 20:26:37'),
(559, 7, 2014, '2014-06-29 20:26:37'),
(560, 8, 2014, '2014-06-29 20:26:38'),
(561, 9, 2014, '2014-06-29 20:26:38'),
(562, 10, 2014, '2014-06-29 20:26:38'),
(563, 11, 2014, '2014-06-29 20:26:38'),
(564, 12, 2014, '2014-06-29 20:26:38'),
(565, 1, 2015, '2014-06-29 20:27:22'),
(566, 2, 2015, '2014-06-29 20:27:23'),
(567, 3, 2015, '2014-06-29 20:27:23'),
(568, 4, 2015, '2014-06-29 20:27:23'),
(569, 5, 2015, '2014-06-29 20:27:23'),
(570, 6, 2015, '2014-06-29 20:27:23'),
(571, 7, 2015, '2014-06-29 20:27:23'),
(572, 8, 2015, '2014-06-29 20:27:24'),
(573, 9, 2015, '2014-06-29 20:27:24'),
(574, 10, 2015, '2014-06-29 20:27:24'),
(575, 11, 2015, '2014-06-29 20:27:24'),
(576, 12, 2015, '2014-06-29 20:27:24');

--
-- Volcado de datos para la tabla `estructura_costo_item`
--

INSERT INTO `estructura_costo_item` (`estructura_costo_item_id`, `estructura_costo_id`, `ma_categoria_id`, `total_capacidad`, `total_monetario`, `total_monetario_cost_ind`, `cantidad_items`) VALUES
(1755, 554, 3, 42000000000, 178, 128.16666666667, 1),
(1756, 554, 2, 6442450944, 26766, 128.16666666667, 1),
(1757, 555, 3, 42000000000, 178, 128.16666666667, 1),
(1758, 555, 2, 6442450944, 26766, 128.16666666667, 1),
(1759, 556, 3, 42000000000, 178, 128.16666666667, 1),
(1760, 556, 2, 6442450944, 26766, 128.16666666667, 1),
(1761, 557, 3, 42000000000, 178, 10137.666666667, 1),
(1762, 557, 2, 6442450944, 26766, 9780.6666666667, 1),
(1763, 558, 4, 688239149056, 1150, 1771.8666666667, 2),
(1764, 558, 3, 6042212000000, 286, 2390.8, 3),
(1765, 558, 1, 78383153152, 569, 2402.8, 3),
(1766, 558, 2, 19327352832, 26788, 1593.8666666667, 2),
(1767, 559, 4, 688239149056, 1150, 3374.2666666667, 2),
(1768, 559, 3, 6042212000000, 286, 5061.4, 3),
(1769, 559, 1, 78383153152, 569, 5061.4, 3),
(1770, 559, 2, 19327352832, 26788, 3374.2666666667, 2),
(1771, 560, 4, 688239149056, 1150, 2276.9523809524, 2),
(1772, 560, 3, 42212000000, 200, 2276.9523809524, 2),
(1773, 560, 1, 4294967296, 500, 2276.9523809524, 2),
(1774, 560, 2, 6442450944, 26766, 1138.4761904762, 1),
(1775, 561, 4, 688239149056, 1150, 3187.7333333333, 2),
(1776, 561, 1, 2147483648, 466, 1593.8666666667, 1),
(1777, 561, 3, 42000000000, 178, 1593.8666666667, 1),
(1778, 561, 2, 6442450944, 26766, 1593.8666666667, 1),
(1779, 562, 4, 688239149056, 1150, 3187.7333333333, 2),
(1780, 562, 1, 2147483648, 466, 1593.8666666667, 1),
(1781, 562, 3, 42000000000, 178, 1593.8666666667, 1),
(1782, 562, 2, 6442450944, 26766, 1593.8666666667, 1),
(1783, 563, 4, 688239149056, 1150, 3187.7333333333, 2),
(1784, 563, 1, 2147483648, 466, 1593.8666666667, 1),
(1785, 563, 3, 42000000000, 178, 1593.8666666667, 1),
(1786, 563, 2, 6442450944, 26766, 1593.8666666667, 1),
(1787, 564, 4, 1044381696, 972, 1992.3333333333, 1),
(1788, 564, 1, 2147483648, 466, 1992.3333333333, 1),
(1789, 564, 3, 42000000000, 178, 1992.3333333333, 1),
(1790, 564, 2, 6442450944, 26766, 1992.3333333333, 1),
(1791, 565, 4, 1044381696, 972, 1992.3333333333, 1),
(1792, 565, 1, 2147483648, 466, 1992.3333333333, 1),
(1793, 565, 3, 42000000000, 178, 1992.3333333333, 1),
(1794, 565, 2, 6442450944, 26766, 1992.3333333333, 1),
(1795, 566, 4, 1044381696, 972, 1992.3333333333, 1),
(1796, 566, 1, 2147483648, 466, 1992.3333333333, 1),
(1797, 566, 3, 42000000000, 178, 1992.3333333333, 1),
(1798, 566, 2, 6442450944, 26766, 1992.3333333333, 1),
(1799, 567, 4, 1044381696, 972, 2656.4444444444, 1),
(1800, 567, 1, 2147483648, 466, 2656.4444444444, 1),
(1801, 567, 3, 42000000000, 178, 2656.4444444444, 1),
(1802, 568, 4, 1044381696, 972, 2656.4444444444, 1),
(1803, 568, 1, 2147483648, 466, 2656.4444444444, 1),
(1804, 568, 3, 42000000000, 178, 2656.4444444444, 1),
(1805, 569, 4, 1044381696, 972, 2656.4444444444, 1),
(1806, 569, 1, 2147483648, 466, 2656.4444444444, 1),
(1807, 569, 3, 42000000000, 178, 2656.4444444444, 1),
(1808, 570, 4, 1044381696, 972, 2656.4444444444, 1),
(1809, 570, 1, 2147483648, 466, 2656.4444444444, 1),
(1810, 570, 3, 42000000000, 178, 2656.4444444444, 1),
(1811, 571, 4, 1044381696, 972, 2656.4444444444, 1),
(1812, 571, 1, 2147483648, 466, 2656.4444444444, 1),
(1813, 571, 3, 42000000000, 178, 2656.4444444444, 1),
(1814, 572, 4, 1044381696, 972, 2656.4444444444, 1),
(1815, 572, 1, 2147483648, 466, 2656.4444444444, 1),
(1816, 572, 3, 42000000000, 178, 2656.4444444444, 1),
(1817, 573, 4, 1044381696, 972, 2656.4444444444, 1),
(1818, 573, 1, 2147483648, 466, 2656.4444444444, 1),
(1819, 573, 3, 42000000000, 178, 2656.4444444444, 1),
(1820, 574, 4, 1044381696, 972, 2656.4444444444, 1),
(1821, 574, 1, 2147483648, 466, 2656.4444444444, 1),
(1822, 574, 3, 42000000000, 178, 2656.4444444444, 1),
(1823, 575, 4, 1044381696, 972, 2656.4444444444, 1),
(1824, 575, 1, 2147483648, 466, 2656.4444444444, 1),
(1825, 575, 3, 42000000000, 178, 2656.4444444444, 1),
(1826, 576, 4, 1044381696, 972, 2656.4444444444, 1),
(1827, 576, 1, 2147483648, 466, 2656.4444444444, 1),
(1828, 576, 3, 42000000000, 178, 2656.4444444444, 1);

--
-- Volcado de datos para la tabla `formacion`
--

INSERT INTO `formacion` (`formacion_id`, `descripcion_breve`, `costo`, `fecha`, `formacion_tipo_id`, `borrado`) VALUES
(3, 'Uso de Open ERP', 6500, '2013-05-21 00:00:00', 3, 0),
(4, 'ssssss', 2, '2014-05-15 00:00:00', 2, 1),
(5, 'Open ERP', 2, '2014-05-21 00:00:00', 4, 0),
(6, 'Java 6', 6000, '2014-05-21 00:00:00', 2, 0),
(7, 'Java Oracle', 6000, '2014-05-21 00:00:00', 2, 0);

--
-- Volcado de datos para la tabla `formacion_tipo`
--

INSERT INTO `formacion_tipo` (`formacion_tipo_id`, `nombre`) VALUES
(1, 'Certificaciones'),
(2, 'Cursos'),
(3, 'Capacitación de usuario final'),
(4, 'Consultorías externas');

--
-- Volcado de datos para la tabla `honorario`
--

INSERT INTO `honorario` (`honorario_id`, `nombre`, `costo`, `numero_profesionales`, `fecha_desde`, `fecha_hasta`, `borrado`) VALUES
(1, 'Gestor de Proyecto', 6800, 1, '2014-05-28 00:00:00', '2016-05-19 00:00:00', 0),
(2, 'Gerente de TI', 4, 22, '2011-05-15 00:00:00', '2012-08-15 00:00:00', 0),
(3, 'Carpeinte', 8902, 1, '2014-07-16 00:00:00', '2014-07-22 00:00:00', 0);

--
-- Volcado de datos para la tabla `inventario_componente_ti`
--

INSERT INTO `inventario_componente_ti` (`inventario_componente_ti_id`, `inventario_ti_id`, `componente_ti_id`) VALUES
(1, 1, 1),
(2, 2, 1);

--
-- Volcado de datos para la tabla `inventario_ti`
--

INSERT INTO `inventario_ti` (`inventario_ti_id`, `departamento_id`, `fecha_creacion`, `borrado`) VALUES
(1, 1, '2014-05-15 18:47:48', 0),
(2, 2, '2014-05-15 18:48:12', 0);

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`mantenimiento_id`, `tipo_operacion`, `ma_motivo_id`, `costo`, `fecha`, `departamento_id`, `ma_categoria_id`, `nombre`, `apellido`, `email`, `telefono`, `borrado`, `nombre_mantenimiento`) VALUES
(1, 'mantenimiento', 16, 3, '2014-05-15 00:00:00', 1, 1, '423', '423', '423@ggdfg.cm', '324', 1, ''),
(2, 'mantenimiento', 19, 345, '2014-05-22 00:00:00', 2, 3, '453', '534', '345@trt', '3f4g44', 0, 'Nombre cambiado de mante'),
(3, 'mantenimiento', 20, 2, '2014-05-16 00:00:00', 2, 3, 'Pepe', 'Colmenarez', 'pepe@cc.com', '0412193659', 1, ''),
(4, 'mantenimiento', 20, 12, '2014-05-01 00:00:00', 2, 3, 'pedro', 'perez', 'pp@ee', '0412566625', 0, 'Mantenimiento de los equipos'),
(5, 'instalación', 18, 232, '2010-07-13 00:00:00', 1, 1, '3wew', 'wqe', 'eqwew@mfaf.com', '2323123', 0, 'sdssssss'),
(6, 'mantenimiento', 16, 12, '2014-06-26 00:00:00', 1, 1, 'dfd', 'fsd', 'pepe@ppe.com', 'ddf', 0, 'm1'),
(7, 'instalación', 16, 78, '2014-06-27 00:00:00', 1, 4, '22', '22', 'pepe@ppe.com', '2312123', 0, 'm2'),
(8, 'mantenimiento', 16, 100, '2014-06-30 00:00:00', 1, 4, 'ee', 'eee', 'pepe@ppe.com', '3242343', 0, 'ewww');

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

--
-- Volcado de datos para la tabla `ma_motivo`
--

INSERT INTO `ma_motivo` (`ma_motivo_id`, `nombre`, `seccion`) VALUES
(6, 'Servicio de Luz', 'arrendamiento'),
(7, 'Servicio de IPS', 'arrendamiento'),
(8, 'Llamadas telefónicas', 'arrendamiento'),
(9, 'Alquiler de equipos de TI', 'arrendamiento'),
(10, 'Otros', 'arrendamiento'),
(16, 'Instalación y configuración de los equipos de red', 'mantenimiento'),
(17, 'Soporte de Sistema Operativo', 'mantenimiento'),
(18, 'Afinación del desempeño y entonación del sistema', 'mantenimiento'),
(19, 'Investigación y planeación de sistemas', 'mantenimiento'),
(20, 'Evaluación y compra', 'mantenimiento'),
(21, 'Eliminación de Hardware', 'mantenimiento'),
(22, 'Respaldos y recuperación', 'mantenimiento'),
(23, 'Planeación de fallas', 'mantenimiento'),
(24, 'Soporte en general', 'mantenimiento'),
(25, 'Otros', 'mantenimiento');

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

--
-- Volcado de datos para la tabla `organizacion`
--

INSERT INTO `organizacion` (`organizacion_id`, `nombre`, `descripcion`, `moneda`, `abrev_moneda`, `borrado`) VALUES
(1, 'Mi organizacion', 'Alguna descripción', 'Bolívar', 'Bs', 0);

--
-- Volcado de datos para la tabla `utileria`
--

INSERT INTO `utileria` (`utileria_id`, `nombre`, `costo`, `fecha`, `descripcion`, `borrado`) VALUES
(1, 'fsd', 3, '2014-05-16 00:00:00', '3r', 0),
(2, 'Impresora Epson', 300, '2014-05-17 00:00:00', 'dasdw', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

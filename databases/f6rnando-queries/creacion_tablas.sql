--
-- Estructura de tabla para la tabla `categorias_riesgos`
--

CREATE TABLE IF NOT EXISTS `categorias_riesgos` (
  `id_categoria` bigint(20) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

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
(10, 2, 'Errores de operación', 'Media-Alta', 'Alta'),
(11, 3, 'Actos de vandalismo', 'Media-Baja', 'Alto'),
(12, 3, 'Manipulación de datos/software', 'Media-Baja', 'Alto'),
(13, 3, 'Manipulación de hardware', 'Media', 'Alto'),
(14, 4, 'Explosivos', 'Media-Alta', 'Media-Alta'),
(15, 4, 'Accesos no autorizados al recinto', 'Baja', 'Alto'),
(16, 4, 'Robo', 'Media', 'Alto'),
(17, 5, 'Introducción de virus', 'Baja', 'Medio-Alto'),
(18, 5, 'Error en mantenimiento', 'Media-Baja', 'Medio'),
(19, 6, 'Daños a la propiedad privada', 'Baja', 'Medio');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `riesgos_amenazas`
--
ALTER TABLE `riesgos_amenazas`
  ADD CONSTRAINT `riesgos_amenazas_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_riesgos` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;
  
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

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`departamento_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

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

--
-- RELACIONES PARA LA TABLA `plan_continuidad`:
--   `id_estado`
--       `usuarios_estado` -> `id_estado`
--   `id_riesgo`
--       `riesgos_amenazas` -> `id_riesgo`
--   `id_departamento`
--       `departamento` -> `departamento_id`
--   `id_empleado`
--       `personal` -> `id_personal`
--

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `plan_continuidad`
--
ALTER TABLE `plan_continuidad`
  ADD CONSTRAINT `plan_continuidad_ibfk_4` FOREIGN KEY (`id_estado`) REFERENCES `usuarios_estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_continuidad_ibfk_1` FOREIGN KEY (`id_riesgo`) REFERENCES `riesgos_amenazas` (`id_riesgo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_continuidad_ibfk_2` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`departamento_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_continuidad_ibfk_3` FOREIGN KEY (`id_empleado`) REFERENCES `personal` (`id_personal`) ON DELETE NO ACTION ON UPDATE CASCADE;



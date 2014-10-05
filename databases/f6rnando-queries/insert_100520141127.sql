--
-- Volcado de datos para la tabla `categorias_riesgos`
--

INSERT INTO `categorias_riesgos` (`id_categoria`, `categoria`, `descripcion`) VALUES
(1, 'Desastres naturales', 'Eventos o fenómenos de factor climático o de la naturaleza que ocurren de forma al azar y representan un riesgo o amenaza para la organización.'),
(2, 'Daños accidentales', 'Eventos de ocurren de forma fortuita, sin intención alguna pero que de igual forma representan un riesgo o amenaza para la organización.'),
(3, 'Humano intencionado interno', 'Amenaza o riesgo efectuado de manera intencional por personal interno de la organización '),
(4, 'Humano intencionado externo', 'Amenaza o riesgo efectuado de manera intencional por personal externo a la organización '),
(6, 'Humano no intencionado externo', 'Amenaza o riesgo efectuado de manera no intencional por personal externo de la organización'),
(9, 'Humano no intencionado interno', 'Amenaza o riesgo efectuado de manera no intencional por personal interno de la organización');

--
-- Volcado de datos para la tabla `equipo_pcn`
--

INSERT INTO `equipo_pcn` (`id_equipo`, `id_tipo`, `nombre_equipo`, `equipo`, `fecha_modificacion`, `fecha_creacion`) VALUES
(1, 1, 'crisis1', '1,3,4', '2014-08-06 17:47:38', '2014-08-06 13:17:38'),
(2, 1, 'crisis2', '7,6,5', '2014-08-06 17:47:49', '2014-08-06 13:17:49'),
(3, 2, 'recuperacion1', '7,3,5', '2014-08-07 16:22:19', '2014-08-07 11:52:19'),
(4, 2, 'recuperacion2', '6,7', '2014-08-07 16:22:30', '2014-08-07 11:52:30'),
(5, 3, 'logistica1', '1', '2014-08-07 16:33:54', '2014-08-07 12:03:54'),
(6, 3, 'logistica2', '3,4', '2014-08-07 16:34:08', '2014-08-07 12:04:08'),
(7, 4, 'rrpp1', '5,1', '2014-08-07 16:34:25', '2014-08-07 12:04:25'),
(8, 4, 'rrpp2', '7,6', '2014-08-07 16:34:37', '2014-08-07 12:04:37'),
(9, 5, 'pruebas1', '7,6,3', '2014-08-07 16:35:08', '2014-08-07 12:05:08'),
(10, 5, 'pruebas2', '7,6,5', '2014-08-07 16:35:26', '2014-08-07 12:05:26'),
(12, 1, 'crisis3', '6,5', '2014-09-28 18:42:59', '2014-09-28 14:12:59');

--
-- Volcado de datos para la tabla `estrategias_recuperacion`
--

INSERT INTO `estrategias_recuperacion` (`id_estrategia`, `id_tipoestrategia`, `denominacion`, `costo`, `hardware`, `telecom`, `fecha_inicio`, `fecha_fin`, `localizacion`, `acotaciones`, `fecha_creacion`, `fecha_modificacion`) VALUES
(2, 1, 'Recuperación en frio', '25000', 'Llevar los servidores y monitores propios de f6rnando inc', 'Llevar modems, routers y cables propios', '2014-09-01', '2015-09-01', 'Planta baja del edificio de la compañía, local 231-5', '', '0000-00-00 00:00:00', '2014-09-29 19:07:29'),
(3, 1, 'Recuperación en frio externo', '35000', 'Llevar los servidores y monitores propios de f6rnando inc', 'Llevar modems, routers y cables propios', '2014-08-01', '2014-10-31', 'Edificio B de la compañía, planta baja, local 125-84', 'Moverse rápido', '0000-00-00 00:00:00', '2014-09-29 19:08:41'),
(4, 2, 'Recuperación warm oficina superior', '10000', 'Llevar los servidores y monitores propios de f6rnando inc', 'Llevar modems, routers y cables propios', '2014-09-17', '2014-09-30', 'Edificio A de la compañía, piso 3, oficina 21', '', '0000-00-00 00:00:00', '2014-09-29 19:10:23');

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `codigo_empleado`, `id_departamento`, `nombre`, `cedula`, `email_personal`, `email_corporativo`, `tlfn_personal`, `tlfn_corporativo`, `cargo`, `fechaingreso_empresa`, `fecha_creacion`, `fecha_modificacion`) VALUES
(1, 'LOG-001', 1, 'Fernando Pinto', 'V-19524910', 'f6rnando@gmail.com', 'f6rnando@sigitec.com', '0424-0000101', '0412-7439763', 'Gerente de departamento', '2014-01-06 00:00:00', '2014-07-21 11:53:15', '2014-07-23 16:44:12'),
(3, 'LOG-003', 2, 'Kelwin Gamez', 'V-20123456', 'kelwin@gmail.com', 'kelwingamez@sigitec.com', '0416-0102030', '0424-0708090', 'Gerente Investigador', '1969-12-31 20:00:00', '2014-07-23 12:16:10', '2014-07-23 16:46:10'),
(4, 'LOG-002', 1, 'Fernando Colmenares', 'V-19000698', 'fer_elsabrosom@gmail.com', 'fernandocolmenares@sigitec.com', '0424-7854125', '0424-0708090', 'Desarrollador Web', '2014-01-07 00:00:00', '2014-07-26 10:02:52', '2014-07-26 20:12:52'),
(5, 'LOG-004', 1, 'Gustavo Martínez', 'V-20147852', 'gustavito_elpro@gmail.com', 'gustavomartinez@sigitec.com', '0424-0100101', '0412-0505050', 'Gerente creativo', '1969-12-31 20:00:00', '2014-07-26 10:14:14', '2014-07-26 14:44:14'),
(6, 'LOG-005', 2, 'Harold Araujo', 'V-17458745', 'haroldo@gmail.com', 'haroldaraujo@sigitec.com', '0412-0022336', '0424-0909090', 'Desarrollador Web', '1969-12-31 20:00:00', '2014-07-26 10:15:47', '2014-07-26 14:45:47'),
(7, 'LOG-006', 2, 'Elier Cuicas', 'V-18877887', 'elier@gmail.com', 'eliercuicas@sigitec.com', '0424-1231231', '0416-1231231', 'Desarrollador Web', '2014-01-07 00:00:00', '2014-07-26 10:17:12', '2014-07-26 14:47:12');

--
-- Volcado de datos para la tabla `plan_continuidad`
--

INSERT INTO `plan_continuidad` (`id_continuidad`, `codigo`, `denominacion`, `id_riesgo`, `id_departamento`, `id_empleado`, `id_estado`, `id_estrategia`, `tipo_plan`, `id_crisis`, `desc_crisis`, `id_recuperacion`, `desc_recuperacion`, `id_logistica`, `desc_logistica`, `id_rrpp`, `desc_rrpp`, `id_pruebas`, `desc_pruebas`, `consideraciones`, `pdf`, `fecha_creacion`, `fecha_modificacion`) VALUES
(4, 'PCN002', 'Reacción contra fuego inminente', 4, 1, 5, 2, 2, 'reactivo', 1, '$view[''valoracion''] = $valoracion;\n		$view[''crisis''] = $this->riesgos->get_allteams(array(''e.id_tipo''=>1));\n		$view[''recuperacion''] = $this->riesgos->get_allteams(array(''e.id_tipo''=>2));', 3, '$view[''valoracion''] = $valoracion;\n		$view[''crisis''] = $this->riesgos->get_allteams(array(''e.id_tipo''=>1));\n		$view[''recuperacion''] = $this->riesgos->get_allteams(array(''e.id_tipo''=>2));', 5, '$view[''valoracion''] = $valoracion;\n		$view[''crisis''] = $this->riesgos->get_allteams(array(''e.id_tipo''=>1));\n		$view[''recuperacion''] = $this->riesgos->get_allteams(array(''e.id_tipo''=>2));', 7, '$view[''valoracion''] = $valoracion;\n		$view[''crisis''] = $this->riesgos->get_allteams(array(''e.id_tipo''=>1));\n		$view[''recuperacion''] = $this->riesgos->get_allteams(array(''e.id_tipo''=>2));', 9, '$view[''valoracion''] = $valoracion;\n		$view[''crisis''] = $this->riesgos->get_allteams(array(''e.id_tipo''=>1));\n		$view[''recuperacion''] = $this->riesgos->get_allteams(array(''e.id_tipo''=>2));', 'Recordar reemplazar o rellenar los extintores', NULL, '2014-09-23 17:37:01', '2014-09-29 19:27:33'),
(5, 'PCN003', 'Error de calculo del sistema', 10, 2, 6, 2, 3, 'proactivo', 12, 'aaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaa', 4, 'bbbbbbbbbbbbbbbbbbbbb  bbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbbbbbbbbbb bbbbbbbbbbbbbb', 5, 'cccccccccccccccccccccccccccc ccccccccccccccccccccc cccccccccccccccccc ccccccccccccccc cccccccccccccccc', 7, 'dddddddddddddd ddddddddddddddd dddddddddddddd dddddddddddddddd', 9, 'eeeeeeeeee eeeeeeeeeee eeeeeeeeee eeeeeeeeeee eeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'fffffffffffff ffffffffffffffffffff fffffffffffffffffffffffff fffffffffff fffffffffffff ffffffffffffffffffff fffffffffffffffffffffffff fffffffffff fffffffffffff ffffffffffffffffffff fffffffffffffffffffffffff fffffffffff fffffffffffff ffffffffffffffffffff fffffffffffffffffffffffff fffffffffff fffffffffffff ffffffffffffffffffff fffffffffffffffffffffffff fffffffffff fffffffffffff ffffffffffffffffffff fffffffffffffffffffffffff fffffffffff ', '/var/www/html/tesis/assets/back/continuidad_uploads/error_de_calculo_del_sistema.pdf', '2014-09-28 19:57:41', '2014-09-29 19:27:36');

--
-- Volcado de datos para la tabla `respaldo_db`
--

INSERT INTO `respaldo_db` (`id_respaldo`, `descripcion`, `ruta`, `fecha_creacion`) VALUES
(1, 'Cierre de mes', '/var/www/html/tesis/assets/back/continuidad_uploads/dump_db/backup_20140930094418.sql', '2014-09-30 09:44:18');

--
-- Volcado de datos para la tabla `riesgos_amenazas`
--

INSERT INTO `riesgos_amenazas` (`id_riesgo`, `id_categoria`, `denominacion`, `probabilidad`, `impacto`, `valoracion`) VALUES
(1, 1, 'Huracán', 'Baja', 'Medio', 'Media-Baja'),
(2, 1, 'Inundación', 'Media', 'Medio-Alto', 'Media-Alta'),
(3, 1, 'Incendio', 'Media-Baja', 'Alto', 'Media-Alta'),
(4, 2, 'Fuego fortuito', 'Media', 'Alto', 'Media-Alta'),
(5, 2, 'Fallo del aire acondicionado', 'Media-Baja', 'Medio', 'Media-Baja'),
(6, 2, 'Exceso de humedad', 'Baja', 'Bajo', 'Baja'),
(7, 2, 'Humo y/o Gases tóxicos', 'Baja', 'Medio-Alto', 'Media-Baja'),
(8, 2, 'Fallo del UPS', 'Media', 'Medio-Alto', 'Media-Alta'),
(9, 2, 'Accidentes de personal', 'Media', 'Medio', 'Media'),
(10, 2, 'Errores de operación', 'Media-Alta', 'Alto', 'Alta'),
(11, 3, 'Actos de vandalismo', 'Media-Baja', 'Alto', 'Media-Alta'),
(12, 3, 'Manipulación de datos/software', 'Media-Baja', 'Alto', 'Media-Alta'),
(13, 3, 'Manipulación de hardware', 'Media', 'Alto', 'Media-Alta'),
(14, 4, 'Explosivos', 'Media-Alta', 'Medio-Alto', 'Media-Alta'),
(15, 4, 'Accesos no autorizados al recinto', 'Media-Baja', 'Alto', 'Media-Alta'),
(19, 6, 'Daños a la propiedad privada', 'Baja', 'Medio', 'Media-Baja'),
(21, 4, 'Robo', 'Media-Alta', 'Medio-Alto', 'Media-Alta'),
(22, 9, 'Extravío de copias de seguridad', 'Baja', 'Alto', 'Media');

--
-- Volcado de datos para la tabla `tipoequipos_pcn`
--

INSERT INTO `tipoequipos_pcn` (`id_tipo`, `tipo_equipo`, `denominacion`) VALUES
(1, 'crisis', 'Comité de crisis'),
(3, 'logistica', 'Equipo de logística'),
(5, 'pruebas', 'Equipo de pruebas y apoyo'),
(2, 'recuperacion', 'Equipo de recuperación'),
(4, 'rrpp', 'Equipo de relaciones públicas');

--
-- Volcado de datos para la tabla `tipo_estrategiasrecuperacion`
--

INSERT INTO `tipo_estrategiasrecuperacion` (`id_tipoestrategia`, `denominacion`, `parentesis`, `descripcion`, `costo`, `hardware`, `telecom`, `tiempo`) VALUES
(1, 'Sitio en frío', 'Cold site', 'En esta opción, generalmente sólo se tiene aire acondicionado, potencia,enlaces de telecomunicaciones, y otros.', 'Bajo', 'No', 'No', 'Largo'),
(2, 'Sitio semi-preparado', 'Warm site', 'En esta opción no se incluyen servidores específicos de alta capacidad.', 'Medio', 'Parcial', 'Parcial', 'Medio'),
(3, 'Sitio preparado', 'Hot site', 'Normalmente esta configurado con todo el hardware y el software requerido para iniciar la recuperación a la mayor brevedad.', 'Alto', 'Completo', 'Parcial', 'Corto'),
(4, 'Acuerdo recíproco', 'Otras organizaciones', 'Cuenta con Hardware, telecomunicaciones y tiempo variable. Depende del acuerdo al que se haya llegado con la otra organización.', 'Bajo', 'Parcial', 'Parcial', 'Medio'),
(5, 'Sitio espejo', 'Mirror site', 'Se procesa cada transacción en paralelo con el sitio principal', 'Muy Alto', 'Completo', 'Completo', 'Mínimo'),
(6, 'Sitios móviles', NULL, 'Cuenta con Hardware, telecomunicaciones y tiempo variable. Depende del contrato estipulado.', 'Alto', 'Variable', 'Variable', 'Variable');

--
-- Restricciones para tablas volcadas
--

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
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`departamento_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `plan_continuidad`
--
ALTER TABLE `plan_continuidad`
  ADD CONSTRAINT `plan_continuidad_ibfk_1` FOREIGN KEY (`id_riesgo`) REFERENCES `riesgos_amenazas` (`id_riesgo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_continuidad_ibfk_10` FOREIGN KEY (`id_estrategia`) REFERENCES `estrategias_recuperacion` (`id_estrategia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_continuidad_ibfk_2` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`departamento_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_continuidad_ibfk_3` FOREIGN KEY (`id_empleado`) REFERENCES `personal` (`id_personal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_continuidad_ibfk_4` FOREIGN KEY (`id_estado`) REFERENCES `usuarios_estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_continuidad_ibfk_5` FOREIGN KEY (`id_crisis`) REFERENCES `equipo_pcn` (`id_equipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_continuidad_ibfk_6` FOREIGN KEY (`id_recuperacion`) REFERENCES `equipo_pcn` (`id_equipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_continuidad_ibfk_7` FOREIGN KEY (`id_logistica`) REFERENCES `equipo_pcn` (`id_equipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_continuidad_ibfk_8` FOREIGN KEY (`id_rrpp`) REFERENCES `equipo_pcn` (`id_equipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_continuidad_ibfk_9` FOREIGN KEY (`id_pruebas`) REFERENCES `equipo_pcn` (`id_equipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `riesgos_amenazas`
--
ALTER TABLE `riesgos_amenazas`
  ADD CONSTRAINT `riesgos_amenazas_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_riesgos` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

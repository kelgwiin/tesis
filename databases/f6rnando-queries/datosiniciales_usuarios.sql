-- Creacion del usuario Master 
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
(20, 4, 'continuidad_eliminarriesgos'),
(21, 4, 'continuidad_crearpcn'),
(22, 4, 'continuidad_modificarpcn'),
(23, 4, 'continuidad_eliminarpcn'),
(24, 4, 'continuidad_listadobackup'),
(25, 4, 'continuidad_crearbackup'),
(26, 4, 'continuidad_listarequipos'),
(27, 4, 'continuidad_crearequipos'),
(28, 4, 'continuidad_eliminarequipo'),
(29, 4, 'continuidad_listarestrategias'),
(30, 4, 'continuidad_crearestrategia'),
(31, 4, 'continuidad_modificarestrategia'),
(32, 4, 'continuidad_eliminarestrategia');

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'administrador'),
(2, 'gerente de tecnologías de información');

INSERT INTO `usuarios_estado` (`id_estado`, `estado`) VALUES
(1, 'activo'),
(2, 'inactivo'),
(3, 'bloqueado');

INSERT INTO `usuarios` (`id_usuario`, `id_rol`, `id_estado`, `permisologia`, `nombre`, `email`, `password`, `recuperacion`, `creacion`, `ultima_modificacion`) VALUES
(1, 1, 1, 'all', 'Admin Administrador', 'admin@admin.com', '9dbf7c1488382487931d10235fc84a74bff5d2f4', NULL, '2013-12-09 14:43:47', '2013-12-09 23:44:07'),
(2, 2, 1, '1,3,10,11,12,13,14,15,16,17,18,19,20,6', 'Fernando Pinto', 'f6rnando@gmail.com', 'ec3e661d7bc7bfbf5334e7dfad309f947dace5f7', NULL, '2014-07-26 09:53:41', '2014-07-26 14:23:41');



-- Creacion del usuario Master 
INSERT INTO `modulo_padre` (`id_modulo_padre`, `modulo_padre`) VALUES
(1, 'usuario'),
(2, 'pcn');
INSERT INTO `modulo_hijo` (`id_modulo_hijo`, `id_modulo_padre`, `modulo_hijo`) VALUES
(1, 1, 'ver_usuario'),
(2, 1, 'crear_usuario'),
(3, 1, 'buscar_usuario'),
(4, 1, 'eliminar_usuario'),
(5, 1, 'editar_usuario'),
(6, 2, 'ver_pcn'),
(7, 2, 'crear_pcn'),
(8, 2, 'buscar_pcn'),
(9, 2, 'eliminar_pcn'),
(10, 2, 'editar_pcn');
INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'administrador'),
(2, 'general');
insert into usuarios_estado(id_estado, estado) value (1, 'activo') , (2,'inactivo'), (3,'bloqueado');

INSERT INTO `usuarios` (`id_usuario`,`id_rol`,`id_estado`,`permisologia`,`nombre`,`email`,`password`,`recuperacion`,`creacion`,`ultima_modificacion`)
VALUES (1,1,1,'all','Admin Administrador','admin@admin.com','9dbf7c1488382487931d10235fc84a74bff5d2f4',NULL,'2013-12-09 14:43:47','2013-12-09 19:14:07');
UPDATE usuarios set password=sha1('admin') where id_usuario=1;



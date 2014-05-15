#Categorias
insert into ma_categoria (nombre, icono_fa,valor_base) values
('Procesador','fa-cogs',1024),
('Memoria','fa-eraser',1024),
('Redes','fa-globe',1000),
('Almacenamiento','fa-hdd-o',1024),
('Licencia','fa-file-text-o',-1),
('Otros','fa-suitcase',-1);

#Insertando las Unidades de Medidas según la Categoría
insert into ma_unidad_medida(ma_categoria_id,nombre, abrev_nombre, valor_nivel) values
	#de Procesador
	(1,'Kiloherzs','KH', 1),
	(1,'Megaherzs','MH', 2),
	(1,'Gigaherz','GH', 3),
	(1,'Teraherz','TH', 4),
	
	#de Memoria
	(2,'Kilobytes','KB', 1),
	(2,'Megabytes','MB', 2),
	(2,'Gigabytes','GB', 3),
	(2,'Terabytes','TB', 4),
	
	#de redes
	(3,'Kilobits','Kb',1),
	(3,'Megabits','Mb',2),
	(3,'Kilobits','Kb',3),
	(3,'Terabits','Tb',4),

	#de almacenamiento
	(4,'Kilobytes','KB', 1),
	(4,'Megabytes','MB', 2),
	(4,'Gigabytes','GB', 3),
	(4,'Terabytes','TB', 4),

	#los de licencia y otros no aplica. Pero se 
	# se colocarán datos fictisios con fines del logo
	(5,'NA Licencia','NA',-1),
	(6,'NA Otros','NA',-1);
	
#Motivos de Arrendamiento
insert into ma_motivo (seccion, nombre) values 
	('arrendamiento','Servicio de Luz'),
	('arrendamiento','Servicio de IPS'),
	('arrendamiento','Llamadas telefónicas'),
	('arrendamiento','Alquiler de equipos de TI'),
	('arrendamiento','Otros');





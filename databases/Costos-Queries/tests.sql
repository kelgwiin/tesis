select * from organizacion;
-- delete from organizacion where organizacion_id > 0;

update componente_ti set cantidad_disponible = cantidad;

select * from ma_categoria;
select * from ma_unidad_medida;

select * from componente_ti;


-- delete from componente_ti where componente_ti_id > 0;

insert into rol(rol, fecha_) values ('dsd',now());
select * from rol; 

update rol set rol = 'null'
where id_rol = 2;

-- DPTO 
select * from inventario_ti;
-- delete from inventario_ti where inventario_ti_id >0;

select * from inventario_componente_ti;

select * from departamento;
-- delete from departamento where departamento_id >=17;

-- update componente_ti set cantidad_disponible = cantidad;




-- SERVICIO
select * from servicio;
-- where servicio_id = 9;

-- delete from servicio where servicio_id > 0; 

select * from tarea
where servicio_id =  9 ;

select * from tarea_detalle
where tarea_id = 11 ;

select * from umbral;

select * from servicio_proceso;

select * from usuarios;

select ma_motivo_id, nombre
from ma_motivo
where seccion = 'arrendamiento';

select * from ma_motivo;


-- delete from arrendamiento where arrendamiento_id >0;



select nombre, departamento_id as id
from departamento;

select * from formacion_tipo;

-- Costos indirectos
select * from arrendamiento;
select * from formacion;
select * from mantenimiento;
select * from honorario;
select * from utileria;

select * from ma_categoria;
select * from ma_unidad_medida;
select * from componente_ti;

select * from estructura_costo;
select * from estructura_costo_item;

delete from estructura_costo where estructura_costo_id > 0;

select estructura_costo_id, mes
from estructura_costo
where anio = '2014'
order by mes asc;

select * from usuarios;
select * from modulo_padre;
select * from modulo_hijo;
select * from roles;


-- DATA DE PRUEBA: SERVICIOS para compararlos generar los costos respectivos

-- servicios
insert into servicio (servicio_id, nombre, descripcion, fecha_creacion, tipo,genera_ingresos) values 
('1','servicio 1 ', 'Descripcion ', '2014-07-20','USR',false),
('2','servicio 2 ', 'Descripcion ', '2014-07-20','USR',false),
('3','servicio 3 ', 'Descripcion ', '2014-07-20','USR',false),
('4','servicio 4 ', 'Descripcion ', '2014-07-20','USR',false),
('5','servicio 5 ', 'Descripcion ', '2014-07-20','SYS',false),
('6','servicio 6 ', 'Descripcion ', '2014-07-20','USR',false),
('7','servicio 7 ', 'Descripcion ', '2014-07-20','USR',false),
('8','servicio 8 ', 'Descripcion ', '2014-07-20','SYS',false),
('9','servicio 9 ', 'Descripcion ', '2014-07-20','USR',false);

select * from servicio;

-- servicio costo
insert into servicio_costo (servicio_costo_id, servicio_id, costo, fecha_creacion, mes, anio) values
 -- Enero
('1', '1','250', '2014-07-20','1','2014'),
('2', '2', '8000','2014-07-20','1','2014'),
('3', '3', '70000','2014-07-20','1','2014'),
('4', '4', '80089', '2014-07-20','1','2014'),
('5', '5', '12589', '2014-07-20','1','2014'),
('6', '6', '20001', '2014-07-20','1','2014'),
('7', '7', '2001', '2014-07-20','1','2014'),
('8', '8', '300000', '2014-07-20','1','2014'),
('9', '9', '100000', '2014-07-20','1','2014'),
  
-- Febrero
('10', '1','2589', '2014-07-20','2','2014'),
('11', '2', '8056','2014-07-20','2','2014'),
('12', '3', '70001','2014-07-20','2','2014'),
('13', '4', '81089', '2014-07-20','2','2014'),
('14', '5', '12519', '2014-07-20','2','2014'),
('15', '6', '20002', '2014-07-20','2','2014'),
('16', '7', '2010', '2014-07-20','2','2014'),
('17', '8', '300099', '2014-07-20','2','2014'),
('18', '9', '100088', '2014-07-20','2','2014')

;

select s.nombre, c.costo, c.fecha_creacion, nivel_criticidad, mes
from servicio_costo as c join servicio as s ON (c.servicio_id = s.servicio_id)
where c.borrado = false and anio = '2016' and mes = '1';


-- --------------------------------


-- EVOLUCIÓN DEL MODELO DE COSTOS
select s.nombre, c.costo, mes
from servicio_costo as c join servicio as s ON (c.servicio_id = s.servicio_id)
where c.borrado = false and anio = '2014';

select * from servicio;

-- DATOS DE PRUEBA DE CARACTERIZACIÓN (se asume la cantidad más baja que es bytes, bits, porcentaje uso cpu, respectivamente )
insert into caracterizacion (servicio_id,total_uso_redes, total_uso_cpu, 
total_uso_almacenamiento, total_uso_memoria, fecha) values

(1,'238','5','5896','89','2014-06-01'),
(2,'3213','8','23123','823','2014-06-01'),
(3,'2048','12','89635','22223','2014-06-01'),
(4,'2','89','10','10','2014-06-01')
;

select * from servicio_costo;
select * from estructura_costo where mes = 6 and anio = 2014;

select servicio_id, total_uso_redes, total_uso_cpu,
total_uso_almacenamiento, total_uso_memoria,
year(fecha) anio , month(fecha) mes, ec.estructura_costo_id, ec.fecha_creacion as fecha_ec
from caracterizacion as c
join estructura_costo ec on year(c.fecha) = ec.anio and month(c.fecha) = ec.mes

;
-- Procesador, Memoria, Redes, Almacenamiento

select * from caracterizacion;

-- obtención de los precios
select  eci.*, c.nombre as categoria
from estructura_costo_item eci
join ma_categoria c on c.ma_categoria_id = eci.ma_categoria_id
where estructura_costo_id = 558;

select * from ma_categoria;

select * from servicio_costo_detalle;
select * from servicio_costo;

select * from servicio_proceso;



select * from proceso_historial;

SELECT  sp.nombre proceso, s.servicio_id
                FROM servicio s
                JOIN servicio_proceso sp on s.servicio_id = sp.servicio_id ;
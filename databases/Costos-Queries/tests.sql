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



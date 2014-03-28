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

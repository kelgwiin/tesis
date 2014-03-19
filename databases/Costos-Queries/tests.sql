select * from organizacion;
delete from organizacion where organizacion_id > 0;

select * from ma_categoria;
select * from ma_unidad_medida;

select * from componente_ti;
delete from componente_ti where componente_ti_id > 0;

insert into rol(rol, fecha_) values ('dsd',now());
select * from rol; 

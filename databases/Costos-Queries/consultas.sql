-- Dados un conjunto de ID's de la unidad de medida obtener su categoría
select ma_unidad_medida_id, ma_categoria_id, abrev_nombre
from ma_unidad_medida
where ma_unidad_medida_id in (13,10,5);

-- Dados un conjuntos de ids de categoria obtener la info
select ma_categoria_id, nombre, icono_fa
from ma_categoria
where ma_categoria_id in (2,4);

-- Consultar TODOS los componentes de ti que se encuentran
-- activos

select  comp.*,uni.abrev_nombre,categ.nombre as nomcateg , categ.icono_fa
from componente_ti as comp join (ma_categoria as categ, ma_unidad_medida as uni) 
on (comp.ma_unidad_medida_id = uni.ma_unidad_medida_id and uni.ma_categoria_id = categ.ma_categoria_id)
where borrado = false and activa = 'ON'
order by comp.componente_ti_id;

-- Obtener los componentes de TI filtrados por nombre
select  comp.*,uni.abrev_nombre,categ.nombre as nomcateg , categ.icono_fa
from componente_ti as comp join (ma_categoria as categ, ma_unidad_medida as uni) 
on (comp.ma_unidad_medida_id = uni.ma_unidad_medida_id and uni.ma_categoria_id = categ.ma_categoria_id)
where borrado = false and activa = 'ON' and comp.nombre like '%prueba%'
order by comp.componente_ti_id;

-- Obtener los componentse de TI filtrados por categoria
select  comp.*,uni.abrev_nombre,categ.nombre as nomcateg , categ.icono_fa
from componente_ti as comp join ma_unidad_medida as uni on (comp.ma_unidad_medida_id = uni.ma_unidad_medida_id) inner join ma_categoria as categ on (uni.ma_categoria_id = categ.ma_categoria_id)
where categ.nombre like '%red%'and comp.borrado = false and comp.activa = 'ON';

	-- Otra forma (esta parece que va mas rápido USADA)
select  comp.*,uni.abrev_nombre,categ.nombre as nomcateg , categ.icono_fa
from componente_ti as comp join (ma_unidad_medida as uni,ma_categoria as categ) on (comp.ma_unidad_medida_id = uni.ma_unidad_medida_id and uni.ma_categoria_id = categ.ma_categoria_id) 
where categ.nombre like '%red%' and comp.borrado = false and comp.activa = 'ON'
order by comp.componente_ti_id;


-- -----------------------------
-- DEPARTAMENTOS
-- -------------------------------

-- IDs y nombres de Componentes de TI activos
select componente_ti_id as id,nombre
from componente_ti
where borrado = false and activa = 'ON' and (cantidad_disponible > 0
or tipo_asignacion = 'MULT');

	-- Lista los IDs & Nombres de los Componentes de TI  que no se encuentran en el dpto.
select comp.componente_ti_id as id,comp.nombre, comp.cantidad_disponible as cant_disp
from componente_ti as comp
where borrado = false and activa = 'ON' and (cantidad_disponible > 0
or tipo_asignacion = 'MULT')  and comp.componente_ti_id not in (
	select comp.componente_ti_id as id 
	from componente_ti as comp join (inventario_ti as iv, inventario_componente_ti as icti)
		on (iv.departamento_id = 26 and icti.inventario_ti_id = iv.inventario_ti_id and 
		comp.componente_ti_id = icti.componente_ti_id)
);

-- Componente de TI que se encuentran asociados a un DPTO (INV)
select comp.nombre, comp.componente_ti_id
from inventario_componente_ti as icti join componente_ti as comp on (icti.componente_ti_id = comp.componente_ti_id
and icti.inventario_ti_id = 26);

-- Listando los dptos
select * from departamento
where borrado = false and nombre like '%dpto%';

-- listando los inventarios asociados al dpto
select inventario_ti_id as id, fecha_creacion as fecha 
from inventario_ti
where departamento_id = 36
order by fecha_creacion desc;

-- ----------------------------------------------
-- SERVICIOS
-- ----------------------------------------------

-- Servicio
select *
from servicio
where borrado = false;
-- tarea
select *
from tarea
where servicio_id = 10;

-- tarea detalle
select tarea_detalle_id as id,comando, operacion
from tarea_detalle
where borrado = false and tarea_id = 12;

-- Umbrales
select umbral_id, descripcion, tiempo_acordado, medida, valor
from umbral 
where borrado = false and servicio_id = 10;

-- Procesos
select servicio_proceso_id, nombre, tipo, descripcion
from servicio_proceso
where borrado = false and servicio_id = 10;

-- Consulta los nombre de procesos repetidos que no coincidan con los ID's dados.
select nombre
from servicio_proceso
where servicio_proceso_id not in (14,3,16) and nombre in ('p1','cantinflas','Proceso-1');





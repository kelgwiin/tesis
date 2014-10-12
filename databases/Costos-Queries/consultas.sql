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

-- Obteniendo el nombre de formacion tipo
select nombre,costo, formacion_id as id
from formacion as f join formacion_tipo as ft on (f.formacion_tipo_id = ft.formacion_tipo_id);

-- Datos de MANTENIMIENTO
select tipo_operacion as tipo_de_operacion, mm.nombre as motivo, costo, fecha, d.nombre as departamento,
mc.nombre as categoria, m.nombre as nombre_encargado, apellido as apellido_encargado,
telefono as telefono_encargado

from mantenimiento as m join (departamento as d, ma_categoria as mc, ma_motivo as mm) 
on (m.departamento_id = d.departamento_id and m.ma_categoria_id = mc.ma_categoria_id and
m.ma_motivo_id = mm.ma_motivo_id)

where m.borrado = false and mantenimiento_id = 1;




-- Consultas pequeñas para: Totalizaciones de los COSTOS por Categorías

-- --componente_ti
select ma_unidad_medida_id,nombre, precio,cantidad, capacidad, fecha_creacion, fecha_hasta
from componente_ti
where activa = 'ON' and borrado = false and (
	('2014-02-01' between fecha_creacion and fecha_hasta ) or
	('2014-02-28' between fecha_creacion and fecha_hasta ) 
or
	(fecha_creacion between '2014-02-01' and '2014-02-28 23:59:59') or
	(fecha_hasta between '2014-02-01' and '2014-02-28') 
);

select * from componente_ti;

select str_to_date('2014,03,01 23:59:59','%Y,%m,%d %H:%i:%s') - interval 1 day ;

select ma_unidad_medida_id, ma_categoria_id, valor_nivel
from ma_unidad_medida;

-- --- arrendamiento
select arrendamiento_id, costo, fecha_inicial_vigencia, esquema_tiempo
from arrendamiento
where  borrado = false and 
( fecha_inicial_vigencia <=  STR_TO_DATE('2014,05,01','%Y,%m,%d')
	
 or 
  fecha_inicial_vigencia between STR_TO_DATE('2014,05,01','%Y,%m,%d') and (STR_TO_DATE('2014,06,01','%Y,%m,%d') - interval 1 day )

)
;

-- -- mantenimiento
select mantenimiento_id, costo, fecha, departamento_id, ma_categoria_id
from mantenimiento
where borrado = false;
-- --formacion
select formacion_id, costo, fecha
from formacion
where borrado = false and '2014-05-01' >= STR_TO_DATE();
-- --honoraios
select honorario_id, costo, numero_profesionales, fecha_desde, fecha_hasta
from honorario
where CURDATE() between fecha_desde and fecha_hasta and borrado = false;
-- -- utileria
select utileria_id, costo, fecha
from utileria
where borrado = false;

-- Agregando la vida util de un componente de ti
select fecha_creacion,tiempo_vida, fecha_creacion + INTERVAL tiempo_vida DAY as fecha_hasta
from componente_ti;

select * from mantenimiento;

-- Recomendaciones. Componentes de TI que están a punto de vencerse (desde fecha actual hasta una semana después)
select cti.nombre, cti.fecha_creacion, cti.fecha_hasta, cti.cantidad, categ.nombre as categoria
from componente_ti  as cti join (ma_unidad_medida as uni, ma_categoria as categ) 
on (cti.ma_unidad_medida_id = uni.ma_unidad_medida_id and uni.ma_categoria_id = categ.ma_categoria_id)
where  borrado = false and activa = 'ON'
and ((fecha_hasta between curdate() and curdate() + interval 7 day) or curdate() > fecha_hasta);

select * from componente_ti;

select *
from estructura_costo
where anio = '3000';


-- Obtención de precios y consumo de acuerdo al consumo almacenado en la tabla de caracterización
-- MODELO DE COSTOS
select * from estructura_costo where mes = 6 and anio = 2014;

select servicio_id, total_uso_redes, total_uso_cpu,
total_uso_almacenamiento, total_uso_memoria,
year(fecha) anio , month(fecha) mes, ec.estructura_costo_id, ec.fecha_creacion as fecha_ec
from caracterizacion as c
join estructura_costo ec on year(c.fecha) = ec.anio and month(c.fecha) = ec.mes
where  year(c.fecha) = 2014 and c.borrado = FALSE
;
-- Procesador, Memoria, Redes, Almacenamiento

select * from caracterizacion;

-- obtención de los precios y cantidades asociadas a la estructura de costos.
select  eci.*, c.nombre as nom_categ
from estructura_costo_item eci
join ma_categoria c on c.ma_categoria_id = eci.ma_categoria_id
where estructura_costo_id = 558;

select * from ma_categoria;


--  Lectura de Proceso Historial
select proceso_historial_id, tasa_cpu,tasa_ram,tasa_transferencia_dd, timestamp
from proceso_historial;

-- Procesos por servicio
SELECT distinct sp.nombre proceso
FROM servicio s
JOIN servicio_proceso sp on s.servicio_id = sp.servicio_id;

-- Número de transacciones asociados a un conjunto de procesos
select comando_ejecutable, count(*) num
from proceso_historial
group by comando_ejecutable;

select count(*)
from proceso_historial;


update caracterizacion
set total_uso_memoria = total_uso_memoria+1
where year(fecha) = year(curdate()) and month(fecha) = month(curdate())
and servicio_id = 1;

select count(*) from proceso_historial;

select distinct comando_ejecutable
from proceso_historial;


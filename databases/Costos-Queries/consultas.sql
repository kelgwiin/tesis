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
where categ.nombre like '%redes%'and comp.borrado = false and comp.activa = 'ON';

	-- Otra forma (esta parece que va mas rápido)
select  comp.*,uni.abrev_nombre,categ.nombre as nomcateg , categ.icono_fa
from componente_ti as comp join (ma_unidad_medida as uni,ma_categoria as categ) on (comp.ma_unidad_medida_id = uni.ma_unidad_medida_id and uni.ma_categoria_id = categ.ma_categoria_id) 
where categ.nombre like '%redes%' and comp.borrado = false and comp.activa = 'ON';
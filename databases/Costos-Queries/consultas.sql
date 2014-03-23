-- Consultar todos los componentes de ti que se encuentran
-- activos

select  *
from componente_ti
where borrado = false and activa = 'ON'
order by componente_ti_id ;

-- Dados un conjunto de ID's de la unidad de medida obtener su categoría
select ma_unidad_medida_id, ma_categoria_id, abrev_nombre
from ma_unidad_medida
where ma_unidad_medida_id in (13,14,5);

-- Dados un conjuntos de ids de categoria obtener la info
select ma_categoria_id, nombre, icono_fa
from ma_categoria
where ma_categoria_id in (2,4);
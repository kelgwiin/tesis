<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "home";
$route['404_override'] = '';

/* Rutas para el Modulo de Carga de Infraestructura de IT (cargar_data)*/
//Creado el 16-02-2014 por Kelwin Gamez
$route['cargar_datos'] = "cargar_data/cargar_data";
$route['cargar_datos/basico'] = "cargar_data/cargar_data/basico";
$route['cargar_datos/basico/(:any)'] = "cargar_data/cargar_data/basico/$1";
$route['cargar_datos/componentes_ti'] = "cargar_data/cargar_data/componentes_ti";
$route['cargar_datos/componentes_ti/(:any)'] = "cargar_data/cargar_data/componentes_ti/$1";
$route['cargar_datos/medidas_capacidad/(:any)'] = "cargar_data/cargar_data/medidas_capacidad_ajax/$1";
$route['cargar_datos/departamentos'] = "cargar_data/cargar_data/departamentos";
$route['cargar_datos/departamentos/(:any)'] = "cargar_data/cargar_data/departamentos/$1";
$route['cargar_datos/servicios'] = "cargar_data/cargar_data/servicios";
$route['cargar_datos/servicios/(:any)'] = "cargar_data/cargar_data/servicios/$1";
/*end of: Rutas para el Modulo de Carga de Infraestructura de IT (cargar data)*/


/* Rutas para el Módulo de Costos de Servicios de TI*/
//Creado el 20-04-2014 por Kelwin Gamez
$route['Costos/'] = "Costos/Costos";
$route['Costos/CargarCostosIndirectos'] = "Costos/Cargar/CostosIndirectos";
$route['Costos/CargarCostosIndirectos/Detalles'] = "Costos/Cargar/Detalles";
$route['Costos/CargarCostosIndirectos/DetallesAct'] = "Costos/Cargar/DetallesAct";
$route['Costos/CargarCostosIndirectos/(:any)/Guardar'] = "Costos/Cargar/Guardar/$1";
$route['Costos/CargarCostosIndirectos/(:any)/GuardarAct/(:num)'] = "Costos/Cargar/GuardarAct/$1/$2";
$route['Costos/CargarCostosIndirectos/Editar/(:any)/(:num)'] = "Costos/Cargar/Editar/$1/$2";
$route['Costos/CargarCostosIndirectos/Eliminar/(:any)/(:num)'] = "Costos/Cargar/Eliminar/$1/$2";
$route['Costos/CargarCostosIndirectos/(:any)'] = "Costos/Cargar/$1";
$route['Costos/Cargar/kmeans'] = "Costos/Cargar/testKmeans";

$route['Costos/testCostos'] = "Costos/Costos/testCostos";
$route['Costos/testCostos/(:any)'] = "Costos/Costos/testCostos/$1";
$route['Costos/testCostos/(:any)/(:num)'] = "Costos/Costos/testCostos/$1/$2";

$route['Costos/ModeloCostos'] = "Costos/Costos/ModeloCostos";
$route['Costos/Historicos'] = "Costos/Costos/Historicos";
$route['Costos/Historicos/(:any)'] = "Costos/Costos/Historicos/$1";
$route['Costos/Recomendaciones'] = "Costos/Costos/Recomendaciones";
$route['Costos/procesar_costeo'] = "Costos/Costos/procesar_costeo";
/* end of: Rutas para el Módulo de Costos de Servicios de TI*/



/* Rutas del Modulo de Operaciones*/
$route['operaciones'] = "operaciones/toolset";
$route['operaciones/'] = "operaciones/toolset";
/* Rutas Para el Modulo de Gestión de La capacidad */
$route['Capacidad/'] = "Capacidad/Capacidad";
/* Modulo Componentes IT */
$route['Capacidad/ComponentesIT'] = "Capacidad/Capacidad/ComponentesIT";
$route['Capacidad/ComponentesIT/Procesador'] = "Capacidad/Capacidad/ProcesadorComponentesIT";
$route['Capacidad/ComponentesIT/Memoria'] = "Capacidad/Capacidad/MemoriaComponentesIT";
$route['Capacidad/ComponentesIT/Almacenamiento'] = "Capacidad/Capacidad/AlmacenamientoComponentesIT";
$route['Capacidad/ComponentesIT/Redes'] = "Capacidad/Capacidad/RedesComponentesIT";
/* Modulo Servicios */
$route['Capacidad/Servicios'] = "Capacidad/Capacidad/Servicios";
$route['Capacidad/Servicios/(:any)'] = "Capacidad/Capacidad/Servicio";
$route['Capacidad/Servicio/(:any)/Procesador'] = "Capacidad/Capacidad/ProcesadorServicio";
$route['Capacidad/Servicio/(:any)/Memoria'] = "Capacidad/Capacidad/MemoriaServicio";
$route['Capacidad/Servicio/(:any)/Almacenamiento'] = "Capacidad/Capacidad/AlmacenamientoServicio";
$route['Capacidad/Servicio/(:any)/Redes'] = "Capacidad/Capacidad/RedesServicio";
/* Modulo Departamentos */
$route['Capacidad/Departamento'] = "Capacidad/Capacidad/Departamentos";
$route['Capacidad/Umbrales'] = "Capacidad/Capacidad/Umbrales";
/* Rutas Para el Modulo de Gestión de La capacidad */

// RUTAS DE LA GESTION DE CONTINUIDAD DEL NEGOCIO
// @author Fernando Pinto AKA f6rnando
$route['continuidad']														= "continuidad/continuidad";
$route['continuidad/descripcion']											= "continuidad/continuidad";
$route['continuidad/equipos_accion']										= "continuidad/continuidad/formar_equipos";
$route['continuidad/listado_pcn']											= "continuidad/continuidad/listado";
$route['continuidad/crear_pcn']												= "continuidad/continuidad/crear";
$route['continuidad/gestion_riesgos']										= "continuidad/gestion_riesgos";
// CATEGORIAS
$route['continuidad/gestion_riesgos/categorias']							= "continuidad/gestion_riesgos/categorias";
$route['continuidad/gestion_riesgos/categorias/crear']						= "continuidad/gestion_riesgos/crear_categoria";
$route['continuidad/gestion_riesgos/categorias/crear_categoria']			= "continuidad/gestion_riesgos/crear_categoria";
$route['continuidad/gestion_riesgos/categorias/modificar/(:num)']			= "continuidad/gestion_riesgos/modificar_categoria/$1";
$route['continuidad/gestion_riesgos/categorias/eliminar/(:num)']			= "continuidad/gestion_riesgos/eliminar_categoria/$1";
// RIESGOS
$route['continuidad/gestion_riesgos/riesgos']								= "continuidad/gestion_riesgos/listado_riesgos";
$route['continuidad/gestion_riesgos/riesgos/crear']							= "continuidad/gestion_riesgos/crear_riesgo";
$route['continuidad/gestion_riesgos/riesgos/crear_riesgo']					= "continuidad/gestion_riesgos/crear_riesgo";
$route['continuidad/gestion_riesgos/riesgos/modificar/(:num)']				= "continuidad/gestion_riesgos/modificar_riesgo/$1";
$route['continuidad/gestion_riesgos/riesgos/eliminar/(:num)']				= "#";


// RUTAS DE USUARIOS
//@author Fernando Pinto AKA f6rnando
$route['usuario']						= "usuario/usuario/ver_usuarios";
$route['usuarios']						= "usuario/usuario/ver_usuarios";
$route['usuarios/crear']				= "usuario/usuario/crear_usuarios";
$route['usuarios/buscar']				= "usuario/usuario/buscar_usuarios";
$route['usuarios/ver']					= "usuario/usuario/ver_usuarios";
$route['usuarios/ficha/(:num)']			= "usuario/usuario/ficha_usuario/$1";
$route['usuarios/eliminar/(:num)']		= "usuario/usuario/eliminar_usuario/$1";
$route['usuarios/iniciar-sesion']		= "usuario/usuario";
$route['usuarios/cerrar-sesion']		= "usuario/usuario/logout";
/* End of file routes.php */
/* Location: ./application/config/routes.php */

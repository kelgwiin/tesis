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
$route['cargar_datos/departamentos'] = "cargar_data/cargar_data/departamentos";
$route['cargar_datos/departamentos/(:any)'] = "cargar_data/cargar_data/departamentos/$1";
$route['cargar_datos/servicios'] = "cargar_data/cargar_data/servicios";
$route['cargar_datos/servicios/(:any)'] = "cargar_data/cargar_data/servicios/$1";
/*end of: Rutas para el Modulo de Carga de Infraestructura de IT (cargar data)*/

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
/* End of file routes.php */
/* Location: ./application/config/routes.php */

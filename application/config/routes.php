<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "home";
$route['404_override'] = '';


$route['cargar_data'] = "cargar_data/cargar_data";
$route['operaciones'] = "operaciones/toolset";
$route['operaciones/'] = "operaciones/toolset";
/* Rutas Para el Modulo de Gestión de La capacidad */
$route['Capacidad/'] = "Capacidad/Capacidad";
$route['Capacidad/ComponentesIT'] = "Capacidad/Capacidad/ComponentesIT";
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

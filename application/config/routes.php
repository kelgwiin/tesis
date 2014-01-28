<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "home";
$route['404_override'] = '';


$route['cargar_data'] = "cargar_data/cargar_data";
$route['operaciones'] = "operaciones/toolset";
$route['operaciones/'] = "operaciones/toolset";
/* Rutas Para el Modulo de Gestión de La capacidad */
$route['Capacidad/'] = "Capacidad/Capacidad";
$route['Capacidad/ComponentesIT'] = "Capacidad/Capacidad/ComponentesIT";
$route['Capacidad/Servicios'] = "Capacidad/Capacidad/Servicios";
$route['Capacidad/Departamento'] = "Capacidad/Capacidad/Departamentos";
$route['Capacidad/Umbrales'] = "Capacidad/Capacidad/Umbrales";
/* End of file routes.php */
/* Location: ./application/config/routes.php */

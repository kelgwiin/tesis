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

$route['cargar_datos/umbrales'] = "cargar_data/cargar_data/servicio_umbral";
$route['cargar_datos/umbrales/(:num)'] = "cargar_data/cargar_data/servicio_umbral/$1";
$route['cargar_datos/umbrales/crear/(:num)'] = "cargar_data/cargar_data/servicio_umbral_crear/$1";

$route['cargar_datos/servicios'] = "cargar_data/cargar_data/servicios";
$route['cargar_datos/servicios/crear'] = "cargar_data/cargar_data/nuevo_servicio";
$route['cargar_datos/servicios/ver/(:any)'] = "cargar_data/cargar_data/ver_servicio/$1";
$route['cargar_datos/servicios/modificar/(:any)'] = "cargar_data/cargar_data/modificar_servicio/$1";
$route['cargar_datos/servicios/eliminar'] = "cargar_data/cargar_data/eliminar_servicio";

$route['cargar_datos/procesos_de_negocio_soportados'] = "cargar_data/cargar_data/procesos_negocio_soporte";
$route['cargar_datos/procesos_de_negocio_soportados/(:num)'] = "cargar_data/cargar_data/procesos_negocio_soporte/$1";

$route['cargar_datos/servicio_soportados'] = "cargar_data/cargar_data/servicio_soportados";
$route['cargar_datos/servicio_soportados/(:num)'] = "cargar_data/cargar_data/servicio_soportados/$1";

$route['cargar_datos/servicio_infraestructura'] = "cargar_data/cargar_data/servicio_infraestructura";
$route['cargar_datos/servicio_infraestructura/(:num)'] = "cargar_data/cargar_data/servicio_infraestructura/$1";


$route['cargar_datos/servicio_procesos'] = "cargar_data/cargar_data/servicio_proceso";
$route['cargar_datos/servicio_procesos/crear'] = "cargar_data/cargar_data/nuevo_servicio_proceso";
$route['cargar_datos/servicio_procesos/ver/(:any)'] = "cargar_data/cargar_data/ver_servicio_proceso/$1";
$route['cargar_datos/servicio_procesos/modificar/(:any)'] = "cargar_data/cargar_data/modificar_servicio_proceso/$1";
$route['cargar_datos/servicio_procesos/eliminar'] = "cargar_data/cargar_data/eliminar_servicio_proceso";
$route['cargar_datos/servicio_procesos/procesos_por_servicio'] = "cargar_data/cargar_data/procesos_por_servicio";
$route['cargar_datos/servicio_procesos/procesos_por_servicio/(:num)'] = "cargar_data/cargar_data/procesos_por_servicio/$1";

$route['cargar_datos/servicio_categorias'] = "cargar_data/cargar_data/servicio_categorias";
$route['cargar_datos/servicio_categorias/crear'] = "cargar_data/cargar_data/nuevo_servicio_categoria";
$route['cargar_datos/servicio_categorias/ver/(:any)'] = "cargar_data/cargar_data/ver_servicio_categoria/$1";
$route['cargar_datos/servicio_categorias/modificar/(:any)'] = "cargar_data/cargar_data/modificar_servicio_categoria/$1";
$route['cargar_datos/servicio_categorias/eliminar'] = "cargar_data/cargar_data/eliminar_servicio_categoria";

$route['cargar_datos/servicio_tipos'] = "cargar_data/cargar_data/servicio_tipos";
$route['cargar_datos/servicio_tipos/crear'] = "cargar_data/cargar_data/nuevo_servicio_tipo";
$route['cargar_datos/servicio_tipos/ver/(:any)'] = "cargar_data/cargar_data/ver_servicio_tipo/$1";
$route['cargar_datos/servicio_tipos/modificar/(:any)'] = "cargar_data/cargar_data/modificar_servicio_tipo/$1";
$route['cargar_datos/servicio_tipos/eliminar'] = "cargar_data/cargar_data/eliminar_servicio_tipo";

$route['cargar_datos/servicio_proveedores'] = "cargar_data/cargar_data/servicio_proveedores";
$route['cargar_datos/servicio_proveedores/crear'] = "cargar_data/cargar_data/nuevo_servicio_proveedor";
$route['cargar_datos/servicio_proveedores/ver/(:any)'] = "cargar_data/cargar_data/ver_servicio_proveedor/$1";
$route['cargar_datos/servicio_proveedores/modificar/(:any)'] = "cargar_data/cargar_data/modificar_servicio_proveedor/$1";
$route['cargar_datos/servicio_proveedores/eliminar'] = "cargar_data/cargar_data/eliminar_servicio_proveedor";

$route['cargar_datos/procesos_de_negocio'] = "cargar_data/cargar_data/procesoNegocio";
$route['cargar_datos/procesos_de_negocio/crear'] = "cargar_data/cargar_data/nuevoProcesoNegocio";
$route['cargar_datos/procesos_de_negocio/ver/(:any)'] = "cargar_data/cargar_data/verProcesoNegocio/$1";
$route['cargar_datos/procesos_de_negocio/modificar/(:any)'] = "cargar_data/cargar_data/modificarProcesoNegocio/$1";
$route['cargar_datos/procesos_de_negocio/eliminar'] = "cargar_data/cargar_data/eliminarProcesoNegocio";

$route['cargar_datos/personal']												= "cargar_data/cargar_data/cargar_personal";
$route['cargar_datos/personal/(:num)']										= "cargar_data/cargar_data/cargar_personal/$1";
$route['cargar_datos/personal/modificar/(:num)']							= "cargar_data/cargar_data/editar_personal/$1/$2";
$route['cargar_datos/personal/eliminar/(:num)']								= "cargar_data/cargar_data/eliminar_personal/$1/$2";
$route['cargar_datos/personal/cargar_personal/(:num)']						= "cargar_data/cargar_data/agregar_personal/$1";
$route['cargar_datos/personal/crear_empleado/(:num)']						= "cargar_data/cargar_data/agregar_personal/$1";

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


/* Rutas del Modulo de Catalogo de Servicio*/
$route['catalogo'] = "catalogo/catalogo";
$route['catalogo/por_categorias'] = "catalogo/catalogo_categorias";
$route['catalogo/lista_servicios/(:any)'] = "catalogo/listado_servicios/$1";
$route['catalogo/vista_listado'] = "catalogo/lista_servicios";
$route['catalogo/vista_negocio/(:num)'] = "catalogo/vista_negocio/$1";
$route['catalogo/vista_tecnica/(:num)'] = "catalogo/vista_tecnica/$1";
$route['catalogo/vista_completa/(:num)'] = "catalogo/vista_completa/$1";
/* end of: Rutas para el Módulo de Catalogo de Servicio de TI*/

/* Rutas del Modulo de Gestion de Niveles de Servicio*/
$route['niveles_de_servicio'] = "niveles/niveles";

$route['niveles_de_servicio/gestion_ANS'] = "niveles/acuerdos_ns/acuerdos_de_NS";
$route['niveles_de_servicio/gestion_ANS/crear_ANS'] = "niveles/acuerdos_ns/crear_acuerdos_de_NS";
$route['niveles_de_servicio/gestion_ANS/ver_ANS/(:num)'] = "niveles/acuerdos_ns/ver_acuerdo_de_NS/$1";
$route['niveles_de_servicio/gestion_ANS/modificar_ANS/(:num)/(:any)'] = "niveles/acuerdos_ns/modificar_acuerdo_de_NS/$1/$2";
$route['niveles_de_servicio/gestion_ANS/Nuevo_ANS_base/(:num)/(:any)'] = "niveles/acuerdos_ns/modificar_acuerdo_de_NS/$1/$2";
$route['niveles_de_servicio/gestion_ANS/eliminar_ANS'] = "niveles/acuerdos_ns/eliminar_acuerdo";
$route['niveles_de_servicio/gestion_ANS/estructura_ANS/(:num)'] = "niveles/acuerdos_ns/estructura_acuerdo/$1";
$route['niveles_de_servicio/gestion_ANS/generar_pdf_ANS/(:num)'] = "niveles/acuerdos_ns/generar_pdf_acuerdo/$1";

$route['requisito_niveles_servicio/gestion_RNS'] = "niveles/requisitos/requisitos_de_NS";
$route['requisito_niveles_servicio/gestion_RNS/crear_RNS'] = "niveles/requisitos/crear_requisito_de_NS";
$route['requisito_niveles_servicio/gestion_RNS/ver_RNS/(:num)'] = "niveles/requisitos/ver_requisito_de_NS/$1";
$route['requisito_niveles_servicio/gestion_RNS/modificar_RNS/(:num)'] = "niveles/requisitos/modificar_requisito_de_NS/$1";
$route['requisito_niveles_servicio/gestion_RNS/eliminar_RNS'] = "niveles/requisitos/eliminar_requisito";
$route['requisito_niveles_servicio/gestion_RNS/generar_pdf_RNS/(:num)'] = "niveles/requisitos/generar_pdf_acuerdo/$1";


$route['niveles_de_servicio/gestion_Revisiones'] = "niveles/revisiones/revisiones";
$route['niveles_de_servicio/gestion_Revisiones/nuevo_evento'] = "niveles/revisiones/nuevo_evento";
$route['niveles_de_servicio/gestion_Revisiones/obtener_eventos'] = "niveles/revisiones/obtener_eventos";
$route['niveles_de_servicio/gestion_Revisiones/modificar_evento'] = "niveles/revisiones/modificar_evento";
$route['niveles_de_servicio/gestion_Revisiones/eliminar_evento'] = "niveles/revisiones/eliminar_evento";

$route['niveles_de_servicio/gestion_Reportes'] =  "niveles/reportes/historial_servicio";
$route['niveles_de_servicio/gestion_Reportes/procesar_data'] = "niveles/reportes/procesar_data";
$route['niveles_de_servicio/gestion_Reportes/historial_servicio'] = "niveles/reportes/reportes";

$route['niveles_de_servicio/gestion_Reportes/acuerdos_incumplidos'] = "niveles/reportes/acuerdos_incumplidos";
/* end of: Rutas para el Módulo de Niveles de Servicio de TI*/

/* Rutas del Modulo de Operaciones*/
$route['Operaciones'] = "Operaciones/Operaciones/toolset";
$route['Operaciones/extract_data'] = "Operaciones/Operaciones/extract_data";
$route['Operaciones/load_stats'] = "Operaciones/Operaciones/load_stats";
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
$route['continuidad/seleccionar_listado']									= "continuidad/continuidad/chart";
$route['continuidad/descargar_pdf/(.*)/(:num)']								= "continuidad/continuidad/descargar_pdf/$1/$2";
$route['continuidad/listado_pcn/modificar/(.*)/(:num)']						= "continuidad/continuidad/modificar_pcn/$1/$2";
$route['continuidad/listado_pcn/eliminar/(.*)/(:num)']						= "continuidad/continuidad/eliminar_pcn/$1/$2";
$route['continuidad/validar_pcn/(.*)']										= "continuidad/continuidad/validar_planes/$1";
$route['continuidad/listado_pcn/(.*)']										= "continuidad/continuidad/listado/$1";
$route['continuidad/crear_pcn/?(.*)']										= "continuidad/continuidad/crear/$1";
$route['continuidad/gestion_riesgos']										= "continuidad/gestion_riesgos";
$route['continuidad/crear_maqueta']											= "continuidad/maqueta";
// VULNERABILIDADES
$route['continuidad/gestion_riesgos/vulnerabilidades']						= "continuidad/gestion_riesgos/listado_vulnerabilidades";
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
$route['continuidad/gestion_riesgos/riesgos/eliminar/(:num)']				= "continuidad/gestion_riesgos/eliminar_riesgo/$1";
//EQUIPOS DE DESARROLLO
$route['continuidad/equipos']												= "continuidad/equipos/listado_equipos";
$route['continuidad/equipos/crear/(.*)']									= "continuidad/equipos/crear_equipo/$1";
$route['continuidad/equipos/eliminar/(:num)']								= "continuidad/equipos/eliminar_equipo/$1";
// ESTRATEGIAS DE RECUPERACION
$route['continuidad/estrategias']											= "continuidad/estrategias";
$route['continuidad/estrategias/crear']										= "continuidad/estrategias/crear_estrategia";
$route['continuidad/estrategias/modificar/(:num)']							= "continuidad/estrategias/modificar_estrategia/$1";
$route['continuidad/estrategias/eliminar/(:num)']							= "continuidad/estrategias/eliminar_estrategia/$1";
// RESPALDOS DE LA BASE DE DATOS
$route['continuidad/respaldar_basedatos']									= "continuidad/continuidad/backup_db";
$route['continuidad/respaldos']												= "continuidad/continuidad/listado_backup";
$route['continuidad/respaldos/crear']										= "continuidad/continuidad/crea_backup";
$route['continuidad/respaldos/descargar/(:num)']							= "continuidad/continuidad/download_backup/$1";


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

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Creado: 17-03-2014
 * Contiene un conjunto de Métodos útiles para otros módulos.
 * @author Kelwin Gamez <kelgwiin@gmail.com>
 */
class Utils extends MX_Controller
{
	/**
	 * Constructor principal. 
	 * @author Kelwin Gamez <kelgwiin@gmail.com>
	 */
	public function __construct(){
		parent::__construct();
	}

	/**
	 * Contiene la estructura básica de la página según una plantilla 
	 * ya preestablecida. La plantilla utiliza es la ubicada en "./cargar_data/template"
	 * @param  array de array  $list_sidebar Cada entrada del array contiene un ítem con la siguiente forma:
	 *    array(
	 *    	"chain" => "frase que aparecerá en el menú e.g. Inicio",
	 *     	"active" => TRUE|FALSE, // indicará si está activo o no
	 *      "href" => "name_path_controller e.g index.php/home",
	 *      "icon" => "cadena de ícono según fontawesome e.g. fa fa-clock"
	 *    ) ... 
	 *    
	 *    Si es de dos niveles  
	 *     array(
	 *    	"chain" => "frase que aparecerá en el menú e.g. Inicio",
	 *      "href" => "name_path_controller e.g index.php/home",
	 *      "list" => Array,// posee la misma estructura que el descrito anteriormente
	 *    ) ...
	 * 
	 * @param  string $path_main_content  Nombre de la ruta donde se encuentra el contenido
	 * principal, e.g "name_module/name_view" o "name_module/sub_path_inside_view.../.../name_view"
	 * @param string $module_name Nombre del Módulo
	 * @param string $title_name Nombre de la sección asociada al módulo que aparecerá en título
	 * de la página. Tendrá la forma "$title_name - $module_name", Si es la página de inicio
	 * de un módulo se debe dejar vacía.
	 * @param  array $params_mc	Parámetros del main_content si lo posee, sino se debe pasar una 
	 * cadena vacía.
	 * @param string $list_level_side_bar Por defecto es 'one_level' lo cual indica que solo
	 * tendrá un nivel, si es 'two_level' tendrá dos niveles las listas de los menues lo cual influirá en la 
	 * estructura de 'list_sidebar'.
	 * @return void -
	 */
	public function template($list_sidebar, $path_main_content, $params_mc,
		$module_name, $title_name,$list_level_side_bar = "one_level"){
		$data['main_content'] = $this->load->view($path_main_content,$params_mc,TRUE);

		//Sidebar content
		//--Creando los items del sidebar.
		$params['list'] = $list_sidebar;//lista del sidebar con el primer ítem activo
		$params['module_name'] = $module_name;//Nombre del módulo
		$params['list_level'] = $list_level_side_bar;
		$data['sidebar_content'] = $this->load->view('includes/header_sidebar',$params,TRUE);
		
		$data['title_name'] = (strlen($title_name) > 0?$title_name . ' - ' .$module_name:$module_name);//Título de la ventana

		$this->load->view('template',$data);//Cargando la plantilla con las configuraciones.
	}

	/**
	 * Genera la lista de ítems para colocarlos en el sidebar
	 * Esta es la genérica que despliega todos los menus de todos los módulos. Para el caso de 
	 * de los menues de cada módulo si varía.
	 * @return array
	 */	
	public function list_sidebar(){
		$l =  array();
		//Inicio
		$l[] = array(
			"chain" => "Inicio",
			"href" => site_url(''),
			"icon" => "fa fa-flag"
		);	
		//Gestion de Operaciones
		$l[] = array(
			"chain" => "Gestión de Operaciones",
			"href" => site_url('index.php/operaciones'),
			"icon" => "fa fa-bar-chart-o"
		);

		//Acuerdos de Niveles de Servicio
		$l[] = array(
			"chain" => "Acuerdos de Niveles de Servicio",
			"href" => site_url(''),
			"icon" => "fa fa-table"
		);

		//Gestión de Capacidad
		//Creando la sublista del menu
		$sublista = array(
			array(
				'chain'=>'Descripción',
				'href' => site_url('index.php/Capacidad')
			),

			array(
				'chain'=>'Componentes de TI',
				'href' => site_url('index.php/Capacidad/ComponentesIT')
			),

			array(
				'chain'=>'Servicios',
				'href' => site_url('index.php/Capacidad/Servicios')
			),

			array(
				'chain'=>'Departamentos',
				'href' => site_url('index.php/Capacidad/Departamentos')
			),

			array(
				'chain'=>'Umbrales',
				'href' => site_url('index.php/Capacidad/Umbrales')
			)			
		);

		$l[] = array(
			"chain" => "Gestión de Capacidad",
			"href" => site_url(''),
			"icon" => "fa fa-caret-square-o-down",
			"list"=> $sublista
		);

		// SUBLISTA DE LA GESTION DE CONTINUIDAD DEL NEGOCIO
		$sublista = array
		(
			array
			(
				'chain' => 'Principal',
				'href' => site_url('index.php/continuidad')
			),
			array
			(
				'chain' => 'Plan de continuidad del negocio',
				'href' => site_url('index.php/continuidad/listado_pcn')
			),
			array
			(
				'chain' => 'Gestión de riesgos y amenazas',
				'href' => site_url('index.php/continuidad/gestion_riesgos')
			)
		);
		// CONTINUIDAD DEL NEGOCIO
		$l[] = array(
			"chain" => "Gestión de Continuidad del Negocio",
			"href" => site_url(''),
			"icon" => "fa fa-retweet",
			'list' => $sublista
		);

		//Gestión de Costos
		$sublista = array(
			array(
				'chain'=>'Descripcion',
				'href' => site_url('index.php/Costos')
			),

			array(
				'chain'=>'Costos Indirectos',
				'href' => site_url('index.php/Costos/CargarCostosIndirectos')
			),

			array(
				'chain'=>'item 3',
				'href' => site_url('#')
			)
		);

		$l[] = array(
			"chain" => "Gestión de Costos",
			"href" => site_url(''),
			"icon" => "fa fa-clipboard",
			"list" => $sublista
		);

		//Gestión de Disponibilidad
		$sublista = array(
			array(
				'chain' => 'Descripción',
				'href' => site_url('index.php/Disponibilidad/')
			),
			
			array(
				'chain' => 'Registrar Incidencia',
				'href' => site_url('index.php/Disponibilidad/Registrarincidencia/')
			),
			
			array(
				'chain' => 'Reportes Incidencias',
				'href' => site_url('index.php/Disponibilidad/ReportesIncidencias/')
			),

			array(
				'chain' => 'Registrar Eventos Calendario',
				'href' => site_url('index.php/Disponibilidad/Calendario/')
			),

			array(
				'chain' => 'Monitoreo  de los Servicios',
				'href' => site_url('index.php/Disponibilidad/Monitoreo/')
			),	

			array(
				'chain' => 'Plan de Disponibilidad',
				'href' => site_url('index.php/Disponibilidad/Plan/')
			)
		);

		$l[] = array(
			"chain" => "Gestión de Disponibilidad",
			"href" => site_url('index.php/Disponibilidad'),
			"icon" => "fa fa-clock-o",
			"list" => $sublista
		);

		//Gestión de Usuarios
		$sublista = array(
			array(
				'chain'=>'Ver usuarios',
				'href' => site_url('index.php/usuarios')
			),

			array(
				'chain'=>'Crear usuarios',
				'href' => site_url('index.php/usuarios/crear')
			),

			array(
				'chain'=>'Buscar usuarios',
				'href' => site_url('index.php/usuarios/buscar')
			),


		);
		$l[] = array(
			"chain" => "Gestión de Usuarios",
			"href" => site_url(''),
			"icon" => "fa fa-user",
			"list" => $sublista
		);

		return $l;
	}

	/**
	 * Creado: 27-06-2014
	 * 
	 * Genera la lista de ítems para colocarlos en el menú izquierdo
	 * @return array
	 */
	public function list_sidebar_costos(){
		$l =  array();

		$l[] = array(
			"chain" => "Volver a Módulos Principales",
			"href" => site_url(''),
			"icon" => "fa fa-flag"
		);

		$l[] = array(
			"chain" => "Descripción",
			"href" => site_url('index.php/Costos'),
			"icon" => "fa fa-bar-chart-o"
		);

		//Costos Indirectos
		$sublista = array(
			array(
				'chain' => 'Listar',
				'href'=> site_url('index.php/Costos/CargarCostosIndirectos')
			),

			array(
				'chain' => 'Arrendamiento',
				'href'=> site_url('index.php/Costos/CargarCostosIndirectos/Arrendamiento')
			),

			array(
				'chain' => 'Mantenimiento',
				'href'=> site_url('index.php/Costos/CargarCostosIndirectos/Mantenimiento')
			),

			array(
				'chain' => 'Formación',
				'href'=> site_url('index.php/Costos/CargarCostosIndirectos/Formacion')
			),
			
			array(
				'chain' => 'Honorarios Prof.',
				'href'=> site_url('index.php/Costos/CargarCostosIndirectos/HonorariosProf')
			),	
			
			array(
				'chain' => 'Utilería',
				'href'=> site_url('index.php/Costos/CargarCostosIndirectos/Utileria')
			)
		);
		$l[] = array(
			"chain" => "Costos Indirectos",
			"href" => site_url('index.php/Costos/CargarCostosIndirectos'),
			"icon" => "fa fa-caret-square-o-down",
			"list" => $sublista
		);

		$l[] = array(
			"chain" => "Modelo de Costos",
			"href" => site_url('index.php/Costos/ModeloCostos'),
			"icon" => "fa fa-list"
		
		);

		$l[] = array(
			"chain" => "Históricos",
			"href" => site_url('index.php/Costos/Historicos'),
			"icon" => "fa fa-signal"
		
		);

		$l[] = array(
			"chain" => "Recomendaciones",
			"href" => site_url('index.php/Costos/Recomendaciones'),
			"icon" => "fa fa-file-text"
		
		);
		return $l;
	}//end of function: list_sidebar_costos
}
// Location: ./modules/utilities/controller/utils.php
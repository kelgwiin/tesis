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


}
// Location: ./modules/utilities/controller/utils.php
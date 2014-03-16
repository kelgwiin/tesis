<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Creado: 20-01-2014
 * @author Kelwin Gamez <kelgwiin@gmail.com>
 */
class Cargar_Data extends MX_Controller
{
	//Inicio: Variables Globales
	private $plantilla ;//Nombre de la plantilla principal de la interfaz

	//Fin: Variables Globales

	/**
	 * Constructor principal. 
	 * @author Kelwin Gamez <kelgwiin@gmail.com>
	 */
	public function __construct(){
		parent::__construct();
		$this->plantilla = 'cargar_data/template';

		//Cargando los Modelos
		$this->load->model('datos_basicos_model');
		$this->load->model('utilities/utilities_model');
	}

	public function index(){
		//Main content
		$data['main_content'] = $this->load->view('main','',TRUE);

		//Sidebar content
		//--Creando los items del sidebar.
		$params['list'] = $this->_list(0);//lista del sidebar con el primer ítem activo
		$data['sidebar_content'] = $this->load->view('includes/header_sidebar',$params,TRUE);
		
		$this->load->view('cargar_data/template',$data);
		
	}
	/**
	 * Carga el formulario básico de la carga de la infraestructura
	 * @param  string $action Es una cadena que representa si se creará el form,
	 * si es la acción de guardar o si entra por la opción es actualizar y el valor 
	 * será el ID asociado al la tabla organización.
	 * @return N/A
	 */
	public function basico($action="form"){
		switch ($action) {
			case 'form':
				//Obteniendo los datos básicos que ya fueron cargados
				$row = $this->utilities_model->first_row('organizacion','organizacion_id');
				$info['org'] = NULL;
				if($row !== NULL){
					$info['org'] = $row;
				}

				//Main content: básico
				$data['main_content'] = $this->load->view('basico',$info,TRUE);

				//Sidebar content
					//--Creando los items del sidebar.
				$params['list'] = $this->_list(1);//lista del sidebar con el segundo ítem activo
				$data['sidebar_content'] = $this->load->view('includes/header_sidebar',$params,TRUE);

				$this->load->view($this->plantilla,$data);//cargando la vista
				break;

			case 'guardar':
				$p = $this->input->post();

				if($this->utilities_model->add($p,'organizacion')){
					printf('{"estatus":"ok","organizacion_id":%d}',
						$this->utilities_model->last_insert_id());
				}else{
					echo '{"estatus":"fail"}';
				}
				break;
			
			default:
				//Actualizar y Recibe el id 
				$p = $this->input->post();
				$id_org = $action;
				//actualizando en la base de datos.
				if($this->utilities_model->update('organizacion',array('organizacion_id'=>$id_org),$p)){
					echo '{"estatus":"ok"}';
				}else{
					echo '{"estatus":"fail"}';
				}
				break;
		}
	}

	/**
	 * Dependiendo del parámetro que se le pase va a ser las siguientes acciones:
	 * 1.- Si es "list" (valor por defecto) Muestra la lista de 
	 * todos los componentes de TI.
	 * 2.- Si es "nuevo" Despliega el formulario para agregar un nuevo componente.
	 * 3.- Si es guardar despliega el mensaje de guardado y guarda el  nuevo componente.
	 * @param  string $action Dominio {list, nuevo, guardar}. 
	 */
	public function componentes_ti($action="list"){
		switch ($action) {
			case 'list':
				$this->_list_component_it();
				break;
			case 'nuevo':
				$this->_new_component_it();
				break;
			case 'guardar':
				$p = $this->input->post();
				//Procesar la data del post para no tomar los vacíos
				$p_procesado = array();
				foreach ($p as $key => $value) {//Quitando los campos que estén vacíos
					if(strlen($value) > 0){
						$p_procesado[$key] = $value;
					}
				}
				if($this->utilities_model->add('componente_ti',$p_procesado)){
					echo '"estatus":"ok"';
				}else{
					echo '"estatus":"fail"';
				}

				break;
		}
	}

	public function departamentos($action = "list"){

		switch ($action) {
			case 'list':
				$this->_list_dpto();
				break;
			
			case 'nuevo':
				$this->_new_dpto();
				break;
			
			case 'guardar':
				echo "Guardando y redireccionando a la lista de Dpto<br>";
				print_r($this->input->post('nombre'));
				print_r($_POST);
				break;
		}
	}

	public function servicios($action = "list"){
		switch ($action) {
			case 'list':
				$this->_list_service();
				break;
			
			case 'nuevo':
				$this->_new_service();
				break;
			
			case 'guardar':
				echo "Guardando y redireccionando a la lista de Servicios";
				break;
		}
	}

	private function _list_service(){
		//Main content: Servicios
		$data['main_content'] = $this->load->view('servicios','',TRUE);
		
		//Sidebar content
		//--Creando los items del sidebar.
		$params['list'] = $this->_list(4);//lista del sidebar con el quinto ítem activo
		$data['sidebar_content'] = $this->load->view('includes/header_sidebar',$params,TRUE);

		$this->load->view($this->plantilla,$data);//cargando la vista
	}

	private function _new_service(){
		//Main content: Formulario de Servicios
		$data['main_content'] = $this->load->view('nuevo_servicio_view','',TRUE);
		
		//Sidebar content
		//--Creando los items del sidebar.
		$params['list'] = $this->_list(4);//lista del sidebar con el quinto ítem activo
		$data['sidebar_content'] = $this->load->view('includes/header_sidebar',$params,TRUE);

		$this->load->view($this->plantilla,$data);//cargando la vista	
	}

	private function _list_dpto(){
		//Main content: Departamentos
		$data['main_content'] = $this->load->view('departamentos','',TRUE);
		
		//Sidebar content
		//--Creando los items del sidebar.
		$params['list'] = $this->_list(3);//lista del sidebar con el cuarto ítem activo
		$data['sidebar_content'] = $this->load->view('includes/header_sidebar',$params,TRUE);

		$this->load->view($this->plantilla,$data);//cargando la vista
	}

	private function _new_dpto(){
		//Main content: Formulario de Nuevo Departamento
		$data['main_content'] = $this->load->view('nuevo_departamento_view','',TRUE);
		
		//Sidebar content
		//--Creando los items del sidebar.
		$params['list'] = $this->_list(3);//lista del sidebar con el cuarto ítem activo
		$data['sidebar_content'] = $this->load->view('includes/header_sidebar',$params,TRUE);

		$this->load->view($this->plantilla,$data);//cargando la vista
	}

	/**
	 * Carga la lista de los componentes de TI
	 * @return [type] [description]
	 */
	private function _list_component_it(){
		//Main content: lista de componentes de ti
		$data['main_content'] = $this->load->view('componentes_ti_view','',TRUE);
		
		//Sidebar content
		//--Creando los items del sidebar.
		$params['list'] = $this->_list(2);//lista del sidebar con el tercer ítem activo
		$data['sidebar_content'] = $this->load->view('includes/header_sidebar',$params,TRUE);

		$this->load->view($this->plantilla,$data);//cargando la vista
	}

	/**
	 * Muestra el formulario para crear un nuevo componente de TI
	 * @return [type] [description]
	 */
	private function _new_component_it(){
		//Consultando el maestro de Categorias
		$info['categorias'] = $this->utilities_model->all('ma_categoria');
		
		$first_id_cat = $info['categorias'][0]['ma_categoria_id'];
		$info['unidades'] = $this->utilities_model->rows_by_id('ma_unidad_medida',
			'ma_categoria_id', $first_id_cat);

		//Main content: formulario de nuevo componente de ti
		$data['main_content'] = $this->load->view('nuevo_componente_ti_view',$info,TRUE);
		
		//Sidebar content
		//--Creando los items del sidebar.
		$params['list'] = $this->_list(2);//lista del sidebar con el segundo ítem activo
		$data['sidebar_content'] = $this->load->view('includes/header_sidebar',$params,TRUE);

		$this->load->view($this->plantilla,$data);//cargando la vista
	}
	/**
	 * Dada la categoría se obtiene una lista de las unidades de medida correspondientes
	 * @param  Integer $id_categoria ID del maestro de categoría
	 * @return 
	 */
	public function medidas_capacidad_ajax($id_categoria){
		$unidades = $this->datos_basicos_model->unidades_medida_capacidad($id_categoria);
		$cad_options = "";
		foreach ($unidades as $uni) {
			$cad_options .= '<option value = "'. $uni['ma_unidad_medida_id'] .'" data-nivel = "'. 
			$uni['valor_nivel'].'" >' . $uni['abrev_nombre'].'</option> ';
		}
		echo $cad_options;//Se envía a la función App
	}
	/**
	 * Genera la lista de ítems para colocarlos en el menú izquierdo
	 * @param $index_active Índice del ítem activo.
	 * @return array
	 */
	private function _list($index_active){
		$l =  array();

		$l[] = array(
			"chain" => "Descripción",
			"active" => false,
			"href" => "index.php/cargar_datos",
			"icon" => "fa fa-bar-chart-o"
		
		);
		$l[] = array(
			"chain" => "Básico",
			"active" => false,
			"href" => "index.php/cargar_datos/basico",
			"icon" => "fa fa-cog"
		
		);

		$l[] = array(
			"chain" => "Componentes de TI",
			"active" => false,
			"href" => "index.php/cargar_datos/componentes_ti",
			"icon" => "fa fa-cogs"
		
		);

		$l[] = array(
			"chain" => "Departamentos",
			"active" => false,
			"href" => "index.php/cargar_datos/departamentos",
			"icon" => "fa fa-sitemap"
		
		);

		$l[] = array(
			"chain" => "Servicios",
			"active" => false,
			"href" => "index.php/cargar_datos/servicios",
			"icon" => "fa fa-list"
		
		);

		$l[$index_active]["active"] = true; //Colocar el ítem activo
		return $l;
	}//end of function: _list
}//end of class: Cargar_Data

/* End of file cargar_data.php */
/* Location: ./application/modules/controllers/cargar_data.php */

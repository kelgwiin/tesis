<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cargar_Data extends MX_Controller
{
	/**
	 * Creado: 20-01-2014
	 * Constructor principal. 
	 * @author Kelwin Gamez <kelgwiin@gmail.com>
	 */
	public function __construct(){
	}

	public function index()
	{
		//Main content
		$data['main_content'] = $this->load->view('main','',TRUE);

		//Sidebar content
		//--Creando los items del sidebar.
		$params['list'] = $this->_list(0);//lista del sidebar con el primer ítem activo
		$data['sidebar_content'] = $this->load->view('includes/header_sidebar',$params,TRUE);
		
		$this->load->view('cargar_data/template',$data);
		
	}

	public function basico(){
		//Main content: básico
		$data['main_content'] = $this->load->view('basico','',TRUE);
		
		//Sidebar content
		//--Creando los items del sidebar.
		$params['list'] = $this->_list(1);//lista del sidebar con el segundo ítem activo
		$data['sidebar_content'] = $this->load->view('includes/header_sidebar',$params,TRUE);

		$this->load->view('cargar_data/template',$data);//cargando la vista
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
				echo "Guardando y redireccionando a la lista de ";
				break;
		}
	}

	public function departamentos(){
		//Main content: Departamentos
		$data['main_content'] = $this->load->view('departamentos','',TRUE);
		
		//Sidebar content
		//--Creando los items del sidebar.
		$params['list'] = $this->_list(3);//lista del sidebar con el cuarto ítem activo
		$data['sidebar_content'] = $this->load->view('includes/header_sidebar',$params,TRUE);

		$this->load->view('cargar_data/template',$data);//cargando la vista
	}

	public function servicios(){
		//Main content: Servicios
		$data['main_content'] = $this->load->view('servicios','',TRUE);
		
		//Sidebar content
		//--Creando los items del sidebar.
		$params['list'] = $this->_list(4);//lista del sidebar con el quinto ítem activo
		$data['sidebar_content'] = $this->load->view('includes/header_sidebar',$params,TRUE);

		$this->load->view('cargar_data/template',$data);//cargando la vista
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

		$this->load->view('cargar_data/template',$data);//cargando la vista
	}

	/**
	 * Muestra el formulario para crear un nuevo componente de TI
	 * @return [type] [description]
	 */
	private function _new_component_it(){
		//Main content: formulario de nuevo componente de ti
		$data['main_content'] = $this->load->view('nuevo_componente_ti_view','',TRUE);
		
		//Sidebar content
		//--Creando los items del sidebar.
		$params['list'] = $this->_list(2);//lista del sidebar con el segundo ítem activo
		$data['sidebar_content'] = $this->load->view('includes/header_sidebar',$params,TRUE);

		$this->load->view('cargar_data/template',$data);//cargando la vista
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
			"href" => "cargar_datos",
			"icon" => "fa fa-bar-chart-o"
		
		);
		$l[] = array(
			"chain" => "Básico",
			"active" => false,
			"href" => "cargar_datos/basico",
			"icon" => "fa fa-cog"
		
		);

		$l[] = array(
			"chain" => "Componentes de TI",
			"active" => false,
			"href" => "cargar_datos/componentes_ti",
			"icon" => "fa fa-cogs"
		
		);

		$l[] = array(
			"chain" => "Departamentos",
			"active" => false,
			"href" => "cargar_datos/departamentos",
			"icon" => "fa fa-sitemap"
		
		);

		$l[] = array(
			"chain" => "Servicios",
			"active" => false,
			"href" => "cargar_datos/servicios",
			"icon" => "fa fa-list"
		
		);

		$l[$index_active]["active"] = true; //Colocar el ítem activo
		return $l;
	}//end of function: _list
}//end of class: Cargar_Data

/* End of file cargar_data.php */
/* Location: ./application/modules/controllers/cargar_data.php */

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Creado: 27-04-2014
 * Permite cargar los Costos Indirectos del Sistema de Costos.
 * @author Kelwin Gamez <kelgwiin@gmail.com>
 */
class Cargar extends MX_Controller
{		
	/**
	 * Constructor principal. 
	 * @author Kelwin Gamez <kelgwiin@gmail.com>
	 */
	public function __construct(){
		parent::__construct();
		//Modelos
		$this->load->model('utilities/utilities_model');
		$this->load->model('cargar_costos_indirectos_model','cargar_ci_model');

		//Helpers
		$this->load->helper('date');
		$this->load->helper('bs3');
		$this->load->helper('url');

		//Modules
		//Cargando el módulo ./modules/utilities/utils.php
		$this->load->module('utilities/utils');

		//Cargando la información de la organización
		$this->org = $this->utilities_model->first_row('organizacion','organizacion_id');
	}
	/**
	 * Genera la lista de ítems para colocarlos en el menú izquierdo
	 * @param $index_active Índice del ítem activo.
	 * @return array
	 */
	private function _list(){
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
			"chain" => "Item2",
			"href" => "#",
			"icon" => "fa fa-caret-square-o-down"
		
		);

		$l[] = array(
			"chain" => "Item2",
			"href" => "#",
			"icon" => "fa fa-caret-square-o-down"
		
		);
		return $l;
	}//end of function: _list

	public function CostosIndirectos(){
		$this->utils->template($this->_list(),'Costos/fr_costos_indirectos','','Módulo de Gestión de Costos','Costos Indirectos',
			'two_level');
	}

	//Conjunto de Formularios de Costos Indirectos
	public function Arrendamiento(){
		$params['org'] = $this->org;
		$params['motivos'] =  $this->cargar_ci_model->motivos_by_seccion('arrendamiento');
		$this->utils->template($this->_list(),'Costos/forms/Arrendamiento',$params,'Módulo de Gestión de Costos','Costos Indirectos',
			'two_level');
	}

	public function Mantenimiento(){
		$this->utils->template($this->_list(),'Costos/forms/Mantenimiento','','Módulo de Gestión de Costos','Costos Indirectos',
			'two_level');
	}

	public function Formacion(){
		$this->utils->template($this->_list(),'Costos/forms/Formacion','','Módulo de Gestión de Costos','Costos Indirectos',
			'two_level');
	}

	public function HonorariosProf(){
		$this->utils->template($this->_list(),'Costos/forms/HonorariosProf','','Módulo de Gestión de Costos','Costos Indirectos',
			'two_level');
	}
	
	public function Utileria(){
		$this->utils->template($this->_list(),'Costos/forms/Utileria','','Módulo de Gestión de Costos','Costos Indirectos',
			'two_level');
	}

	public function Guardar($opcion){
		$table_name = "";
		$p = $this->input->post();
		
		switch ($opcion) {
			case 'Arrendamiento':
				$table_name = "arrendamiento";
				break;
			case 'Mantenimiento':
				$table_name = "mantenimiento";
				break;
			
		}
		//Guardando en la BD
		if($this->utilities_model->add_ar($p, $table_name)){
			echo "Ya guarde el " . $table_name;
			$params['guardado_exitoso'] = true;
			$this->utils->template($this->_list(),'Costos/fr_costos_indirectos',$params,'Módulo de Gestión de Costos','Costos Indirectos',
			'two_level');
			
		}
	}
}
/* End of file Cargar.php */
/* Location: ./application/modules/Costos/controllers/Cargar.php */
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
		$this->load->model('utilities/utilities_model');

		//Helpers
		$this->load->helper('date');
		$this->load->helper('bs3');
		$this->load->helper('url');

		//Modules
		//Cargando el módulo ./modules/utilities/utils.php
		$this->load->module('utilities/utils');
	}
	/**
	 * Genera la lista de ítems para colocarlos en el menú izquierdo
	 * @param $index_active Índice del ítem activo.
	 * @return array
	 */
	private function _list(){
		$l =  array();

		$l[] = array(
			"chain" => "Descripción",
			"href" => site_url('index.php/Costos'),
			"icon" => "fa fa-bar-chart-o"
		);

		//Costos Indirectos
		$sublista = array(
			array(
				'chain' => 'Arrendamiento',
				'href'=> site_url('index.php/Costos/CargarCostosIndirectos/Arrendamiento')
			),

			array(
				'chain' => 'Mantenimiento',
				'href'=> site_url('index.php/Costos/CargarCostosIndirectos/Mantenimiento')
			),

			array(
				'chain' => 'Formacion',
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
		$this->utils->template($this->_list(),'Costos/forms/Arrendamiento','','Módulo de Gestión de Costos','Costos Indirectos',
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
		$this->utils->template($this->_list(1),'Costos/forms/Utileria','','Módulo de Gestión de Costos','Costos Indirectos',
			'two_level');
	}
}
/* End of file Cargar.php */
/* Location: ./application/modules/Costos/controllers/Cargar.php */
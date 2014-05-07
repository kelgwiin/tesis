<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Creado: 20-04-2014
 * @author Kelwin Gamez <kelgwiin@gmail.com>
 */
class Costos extends MX_Controller
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

	public function index(){
		$this->utils->template($this->_list(),'Costos/main','','Módulo de Gestión de Costos','',
			'two_level');
	}
}
/* End of file Costos.php */
/* Location: ./application/modules/Costos/controllers/Costos.php */
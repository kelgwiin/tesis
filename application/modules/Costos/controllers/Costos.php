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
	private function _list($index_active){
		$l =  array();

		$l[] = array(
			"chain" => "Descripción",
			"active" => false,
			"href" => "index.php/Costos",
			"icon" => "fa fa-bar-chart-o"
		);

		$l[] = array(
			"chain" => "Item1",
			"active" => false,
			"href" => "#",
			"icon" => "fa fa-bar-chart-o"
		
		);

		$l[] = array(
			"chain" => "Item2",
			"active" => false,
			"href" => "#",
			"icon" => "fa fa-bar-chart-o"
		
		);

		$l[] = array(
			"chain" => "Item2",
			"active" => false,
			"href" => "#",
			"icon" => "fa fa-bar-chart-o"
		
		);
	
		$l[$index_active]["active"] = true; //Colocar el ítem activo
		return $l;
	}//end of function: _list

	public function index(){
		$this->utils->template($this->_list(0),'Costos/main','','Módulo de Gestión de Costos','');
	}
}
/* End of file Costos.php */
/* Location: ./application/modules/Costos/controllers/Costos.php */
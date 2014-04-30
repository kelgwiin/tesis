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
	private function _list($index_active){
		$l =  array();

		$l[] = array(
			"chain" => "Descripción",
			"active" => false,
			"href" => "index.php/Costos",
			"icon" => "fa fa-bar-chart-o"
		);

		$l[] = array(
			"chain" => "Costos Indirectos",
			"active" => false,
			"href" => "#",
			"icon" => "fa fa-caret-square-o-down"
		
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

	public function CostosIndirectos(){
		$this->utils->template($this->_list(1),'Costos/fr_costos_indirectos','','Módulo de Gestión de Costos','Costos Indirectos');
	}

	//Conjunto de Formularios de Costos Indirectos
	public function Arrendamiento(){
		$this->utils->template($this->_list(1),'Costos/forms/Arrendamiento','','Módulo de Gestión de Costos','Costos Indirectos');
	}

	public function Mantenimiento(){
		$this->utils->template($this->_list(1),'Costos/forms/Mantenimiento','','Módulo de Gestión de Costos','Costos Indirectos');
	}

	public function Formacion(){
		$this->utils->template($this->_list(1),'Costos/forms/Formacion','','Módulo de Gestión de Costos','Costos Indirectos');
	}

	public function HonorariosProf(){
		$this->utils->template($this->_list(1),'Costos/forms/HonorariosProf','','Módulo de Gestión de Costos','Costos Indirectos');
	}
	
	public function Utileria(){
		$this->utils->template($this->_list(1),'Costos/forms/Utileria','','Módulo de Gestión de Costos','Costos Indirectos');
	}
}
/* End of file Cargar.php */
/* Location: ./application/modules/Costos/controllers/Cargar.php */
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
		//Models
		$this->load->model('utilities/utilities_model');
		$this->load->model('costos_model');
		$this->load->model('historicos_model');

		//Helpers
		$this->load->helper('date');
		$this->load->helper('bs3');
		$this->load->helper('url');

		//Modules
		//Cargando el módulo ./modules/utilities/utils.php
		$this->load->module('utilities/utils');

		//Sidebar
		$this->list_sidebar = $this->utils->list_sidebar_costos();
	}
	

	public function index(){
		$this->utils->template($this->list_sidebar,'Costos/main','','Módulo de Gestión de Costos','',
			'two_level');
	}

	public function testCostos(){
		
		echo "Inicio de la prueba de Costos<br>";

		$this->costos_model->estructura_costos('2014','06');

		echo "Fin de la prueba de Costos<br>";
	}

	public function ModeloCostos(){
		$this->utils->template($this->list_sidebar,'Costos/ModeloCostos','','Módulo de Gestión de Costos','Modelo de Costos',
			'two_level');
	}	

	public function Historicos(){
		$params['data_comp_ti'] = $this->historicos_model->evol_comp_ti('2014');
		$this->utils->template($this->list_sidebar,'Costos/Historicos',$params,'Módulo de Gestión de Costos','Históricos',
			'two_level');
	}	
	
	public function Recomendaciones(){
		$this->utils->template($this->list_sidebar,'Costos/Recomendaciones','','Módulo de Gestión de Costos','Recomendaciones',
			'two_level');
	}


}
/* End of file Costos.php */
/* Location: ./application/modules/Costos/controllers/Costos.php */
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
		$this->load->model('recomendaciones_model');

		//Helpers
		$this->load->helper('date');
		$this->load->helper('bs3');
		$this->load->helper('url');

		//Modules
		//Cargando el módulo ./modules/utilities/utils.php
		$this->load->module('utilities/utils');

		//Sidebar
		$this->list_sidebar = $this->utils->list_sidebar_costos();

		//Cargando la información de la organización
		$this->org = $this->utilities_model->first_row('organizacion','organizacion_id');

		//Daemons
		/**
		 * 1.- El que calcule la estructura de costos de cada año 
		 * o por lo menos del año en curso. Esta data se usa para la gestión de los
		 * históricos. MODELO: 'costos_model'.estructura_costos_by_year_all($year)
		 * 
		 * 2.-
		 */
	}
	

	public function index(){
		$this->utils->template($this->list_sidebar,'Costos/main','','Módulo de Gestión de Costos','',
			'two_level');
	}

	public function testCostos(){
		
		echo "Inicio de la prueba de Costos<br>";

		$this->costos_model->estructura_costos('2014','5');

		echo "Fin de la prueba de Costos<br>";
	}

	public function ModeloCostos(){
		$this->utils->template($this->list_sidebar,'Costos/ModeloCostos','','Módulo de Gestión de Costos','Modelo de Costos',
			'two_level');
	}	

	public function Historicos($action = "index"){
		switch ($action) {
			case 'index':
				$params['org'] = $this->org;//Datos de la organización
				$this->utils->template($this->list_sidebar,'Costos/Historicos',$params,'Módulo de Gestión de Costos','Históricos',
					'two_level');
				break;

			//Ajax
			case 'evol_comp_ti':
				$year = $this->input->post('anio_comp_ti');

				//Se calculan los costos de un año, si estos fueron previamente
				//calculados no se vuelven a realizar los cálculos.
				$info = $this->historicos_model->evol_comp_ti($year);

				if($info){
					$data = array('data'=>$info, 'estatus'=>"ok");
				}else{
					$data = array('estatus'=>"fail");
				}
				echo json_encode($data);

				break;

			//Ajax
			case 'evol_modelo_costo':
				echo "hola modelo ";
				break;
		}
	}	
	
	public function Recomendaciones(){
		//Calculando y agregando la fecha de caducidad de los componentes de ti
		$this->costos_model->add_fecha_hasta_comp();

		$params['recomendaciones'] = $this->recomendaciones_model->get();
		$this->utils->template($this->list_sidebar,'Costos/Recomendaciones',$params,'Módulo de Gestión de Costos','Recomendaciones',
			'two_level');
	}


}
/* End of file Costos.php */
/* Location: ./application/modules/Costos/controllers/Costos.php */
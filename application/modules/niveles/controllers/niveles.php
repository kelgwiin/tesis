<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Niveles extends MX_Controller
{
	function __construct()
	{
        parent::__construct();

		$this->load->model('general/general_model','general');
		$this->load->model('niveles/niveles_model','niveles');
		$this->load->model('utilities/utilities_model');

		//Helpers
		$this->load->helper('date');
		$this->load->helper('bs3');
		$this->load->helper('url');

		//Modules
		//Cargando el módulo ./modules/utilities/utils.php
		$this->load->module('utilities/utils');
    }
	
	private $title = 'Niveles de Servicio';

	private function list_sidebar_niveles($index_active){
		$l =  array();

		$l[] = array(
			"chain" => "Inicio",
			"href" => site_url(''),
			"icon" => "fa fa-th"
		);

		$l[] = array(
			"chain" => "Principal GNS",
			"href" => site_url('index.php/niveles_de_servicio'),
			"icon" => "fa fa-th-list"
		);

		
		$l[] = array(
			"chain" => "Gestión de RNS",
			"href" => site_url('index.php/requisito_niveles_servicio/gestion_RNS'),
			"icon" => "fa fa-check-square-o"
		);

		$l[] = array(
			"chain" => "Gestión de ANS",
			"href" => site_url('index.php/niveles_de_servicio/gestion_ANS'),
			"icon" => "fa fa-file-text"
		);

		$l[] = array(
			"chain" => "Gestión de Revisiones",
			"href" => site_url('index.php/niveles_de_servicio/gestion_Revisiones'),
			"icon" => "fa fa-calendar"
		);

		$l[] = array(
			"chain" => "Gestión de Reportes",
			"href" => site_url('index.php/niveles_de_servicio/gestion_Reportes'),
			"icon" => "fa fa-bar-chart"
		);	


		return $l;
	}

	

	
	public function index()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');

		$fecha_actual = date('Y-m-j H:i:s');

		$date = date('Y-m-d');
		$newdate = strtotime ( '+8 day' , strtotime ( $date ) ) ;
		$fecha_proxima = date ( 'Y-m-d 23:59:00' , $newdate );

		$eventos_recientes = $this->niveles->obtener_revisiones_recientes($fecha_actual,$fecha_proxima);

		$data_view['eventos_recientes']	= $eventos_recientes;
		$data_view['inicio']	= $fecha_actual;
		$data_view['fin']	= $fecha_proxima;

		$this->utils->template($this->list_sidebar_niveles(1),'niveles/main_niveles',$data_view,'Niveles de Servicio','','two_level');
	}



}


?>
	
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Niveles extends MX_Controller
{
	function __construct()
	{
        parent::__construct();

		$this->load->model('general/general_model','general');
		$this->load->model('niveles_model','catalogo');
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
			"icon" => "fa fa-flag"
		);

		/*$l[] = array(
			"chain" => "Catalogo de Servicio",
			"href" => site_url('index.php/catalogo'),
			"icon" => "fa fa-book"
		);

		$l[] = array(
			"chain" => "Catalogo por Categorias",
			"href" => site_url('index.php/catalogo/por_categorias'),
			"icon" => "fa fa-folder-open-o"
		);

		$sublista = array(
			array(
				'chain' => 'Gesti&#243;n de Servicios',
				'href'=> site_url('index.php/cargar_datos/servicios')
			),

			array(
				'chain' => 'Gesti&#243;n de Categor&#237;as',
				'href'=> site_url('index.php/cargar_datos/servicio_categorias')
			),

			array(
				'chain' => 'Gesti&#243;n de Proveedores',
				'href'=> site_url('index.php/cargar_datos/servicio_proveedores')
			),

			array(
				'chain' => 'Gesti&#243;n de Tipos',
				'href'=> site_url('index.php/cargar_datos/servicio_tipos')
			),
			array(
				'chain' => 'Gesti&#243;n de Procesos de Negocio',
				'href'=> site_url('index.php/cargar_datos/procesos_de_negocio')
			),
			array(
				'chain' => 'Asignar Procesos Negocios a Servicios',
				'href'=> site_url('index.php/cargar_datos/procesos_de_negocio_soportados')
			),
			array(
				'chain' => 'Gesti&#243;n de Servicios de Apoyo',
				'href'=> site_url('index.php/cargar_datos/servicio_soportados')
			),
		);
		$l[] = array(
			"chain" => "Gesti&#243;n del Cat&#225;logo",
			"icon" => "fa fa-pencil-square-o",
			"href" => site_url('index.php/catalogo'),
			"list" => $sublista
		);*/


		return $l;
	}

	

	
	public function index()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');

		//$data_view 
		
		$this->utils->template($this->list_sidebar_niveles(1),'niveles/main_niveles','','Niveles de Servicio','','two_level');
	}

	public function acuerdos_de_NS()
	{
		$this->utils->template($this->list_sidebar_niveles(1),'niveles/acuerdos_de_NS','','Niveles de Servicio','','two_level');
	}

		public function crear_acuerdos_de_NS()
	{
		$this->utils->template($this->list_sidebar_niveles(1),'niveles/crear_acuerdo_de_NS','','Niveles de Servicio','','two_level');
	}


}


?>
	
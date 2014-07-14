<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gestion_riesgos extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->module('utilities/utils');
		$this->load->model('general/general_model','general');
		$this->load->helper('text');
	}
	
	// FUNCIONES Y VARIABLES PRIVADAS DEL CONTROLADOR
	private $title = 'Gestión de Continuidad del Negocio';
	private function _list1()
	{
		$l =  array();

		$l[] = array(
			"chain" => "Volver a Módulos Principales",
			"href" => site_url(''),
			"icon" => "fa fa-flag"
		);
		$l[] = array(
			"chain" => "Continuidad del Negocio",
			"href" => site_url('index.php/continuidad'),
			"icon" => "fa fa-retweet"
		);
		$sublista = array
		(
			array
			(
				'chain' => 'Categorías de riesgos y amenazas',
				'href'=> site_url('index.php/continuidad/gestion_riesgos/categorias')
			),
			array
			(
				'chain' => 'Listado de riesgos y amenazas',
				'href'=> site_url('index.php/continuidad/gestion_riesgos/riesgos')
			),
			array
			(
				'chain' => 'Vulnerabilidades',
				'href'=> site_url('index.php/continuidad/gestion_riesgos/vulnerabilidades')
			)
		);
		$l[] = array(
			"chain" => "Gestión de Riesgos y Amenazas",
			"href" => site_url('index.php/continuidad/gestion_riesgos'),
			"icon" => "fa fa-fire-extinguisher",
			"list" => $sublista
		);
		return $l;
	}
	private function _categorias()
	{
		$l =  array();

		$l[] = array(
			"chain" => "Volver a Módulos Principales",
			"href" => site_url(''),
			"icon" => "fa fa-flag"
		);
		$l[] = array(
			"chain" => "Continuidad del Negocio",
			"href" => site_url('index.php/continuidad'),
			"icon" => "fa fa-retweet"
		);
		$l[] = array(
			"chain" => "Gestión de Riesgos y Amenazas",
			"href" => site_url('index.php/continuidad/gestion_riesgos'),
			"icon" => "fa fa-fire-extinguisher"
		);
		$l[] = array(
			"chain" => "Categorías",
			"href" => site_url('index.php/continuidad/gestion_riesgos/categorias'),
			"icon" => "fa fa-fire"
		);
		return $l;
	}
	private function _riesgos()
	{
		$l =  array();

		$l[] = array(
			"chain" => "Volver a Módulos Principales",
			"href" => site_url(''),
			"icon" => "fa fa-flag"
		);
		$l[] = array(
			"chain" => "Continuidad del Negocio",
			"href" => site_url('index.php/continuidad'),
			"icon" => "fa fa-retweet"
		);
		$l[] = array(
			"chain" => "Gestión de Riesgos y Amenazas",
			"href" => site_url('index.php/continuidad/gestion_riesgos'),
			"icon" => "fa fa-fire-extinguisher"
		);
		$l[] = array(
			"chain" => "Listado de Riesgos y Amenazas",
			"href" => site_url('index.php/continuidad/gestion_riesgos/listado_riesgos'),
			"icon" => "fa fa-tasks"
		);
		return $l;
	}
	
	
	public function index()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		// $permiso = modules::run('general/have_permission', 1);
		// $vista = ($permiso) ? 'usuario_ver' : 'usuario_sinpermiso';
		// $view['nivel'] = 1;
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad' => 'Continuidad del Negocio',
			'#' => 'Gestión de riesgos'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$this->utils->template($this->_list1(),'continuidad/gestion_riesgos/menu_riesgos',$view,$this->title,'Gestión de riesgos','two_level');
	}
	
	public function categorias()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		// $permiso = modules::run('general/have_permission', 1);
		// $vista = ($permiso) ? 'usuario_ver' : 'usuario_sinpermiso';
		// $view['nivel'] = 1;
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad' => 'Continuidad del Negocio',
			base_url().'index.php/continuidad/gestion_riesgos' => 'Gestión de riesgos',
			'#' => 'Listado de categorías'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		
		$view['categorias'] = $this->general->get_table('categorias_riesgos');
		
		$this->utils->template($this->_categorias(),'continuidad/gestion_riesgos/listado_categorias',$view,$this->title,'Listado de categorías','two_level');
	}
	
	public function crear_categoria()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		// $permiso = modules::run('general/have_permission', 1);
		// $vista = ($permiso) ? 'usuario_ver' : 'usuario_sinpermiso';
		// $view['nivel'] = 1;
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad' => 'Continuidad del Negocio',
			base_url().'index.php/continuidad/gestion_riesgos' => 'Gestión de riesgos',
			base_url().'index.php/continuidad/gestion_riesgos/categorias' => 'Listado de categorías',
			'#' => 'Crear categoría'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		
		if($_POST)
		{
			// DELIMITADOR DE ERROR DEL FORM VALIDATION DEL LOGIN
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">',
			'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			
			// REGLAS DEL FORM VALIDATION
			$this->form_validation->set_rules('categoria','<strong>Tipo de amenaza</strong>','required|xss_clean');
			$this->form_validation->set_rules('descripcion','<strong>Descripción</strong>','required|min_length[40]|xss_clean');
			
			if($this->form_validation->run($this))
			{
				$_POST['categoria'] = ucfirst(strtolower($_POST['categoria']));
				$categoria = $this->general->insert('categorias_riesgos',$_POST);
				if($categoria != FALSE)
					$this->session->set_flashdata('alert_success','Categoría creada con éxito');
				else
					$this->session->set_flashdata('alert_error','Hubo un error creando la nueva categoría, por favor intente de nuevo o contacte a su administrador');
				
				redirect(site_url('index.php/continuidad/gestion_riesgos/categorias'));
			}
		}
		
		$this->utils->template($this->_categorias(),'continuidad/gestion_riesgos/crear_categoria',$view,$this->title,'Agregar nueva categoría','two_level');
	}
	
	public function listado_riesgos()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		// $permiso = modules::run('general/have_permission', 1);
		// $vista = ($permiso) ? 'usuario_ver' : 'usuario_sinpermiso';
		// $view['nivel'] = 1;
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad' => 'Continuidad del Negocio',
			base_url().'index.php/continuidad/gestion_riesgos' => 'Gestión de riesgos',
			'#' => 'Listado de riesgos'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$this->utils->template($this->_riesgos(),'continuidad/gestion_riesgos/listado_riesgos',$view,$this->title,'Listado de riesgos','two_level');
	}
	
	public function crear_riesgo()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		// $permiso = modules::run('general/have_permission', 1);
		// $vista = ($permiso) ? 'usuario_ver' : 'usuario_sinpermiso';
		// $view['nivel'] = 1;
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad' => 'Continuidad del Negocio',
			base_url().'index.php/continuidad/gestion_riesgos' => 'Gestión de riesgos',
			base_url().'index.php/continuidad/gestion_riesgos/riesgos' => 'Listado de riesgos',
			'#' => 'Nuevo riesgo'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$this->utils->template($this->_riesgos(),'continuidad/gestion_riesgos/crear_riesgo',$view,$this->title,'Agregar nuevo riesgo','two_level');
	}
}
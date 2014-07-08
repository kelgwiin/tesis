<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gestion_riesgos extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->module('utilities/utils');
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
				'href'=> site_url('index.php/continuidad/gestion_riesgos/listado')
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
		$sublista = array
		(
			array
			(
				'chain' => 'Listado de categorías',
				'href'=> site_url('index.php/continuidad/gestion_riesgos/categorias')
			),
			array
			(
				'chain' => 'Crear categoría',
				'href'=> site_url('index.php/continuidad/gestion_riesgos/categorias/crear')
			)
		);
		$l[] = array(
			"chain" => "Categorías",
			"href" => site_url('index.php/continuidad/gestion_riesgos/categorias'),
			"icon" => "fa fa-fire",
			"list" => $sublista
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
		$this->utils->template($this->_list1(),'continuidad/menu_riesgos',$view,$this->title,'Gestión de riesgos','two_level');
	}
	
	public function categorias($value='')
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
		$this->utils->template($this->_categorias(),'continuidad/listado_categorias',$view,$this->title,'Listado de categorías','two_level');
	}
	
	public function listado_riesgos($value='')
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
		$this->utils->template($this->_riesgos(),'continuidad/listado_riesgos',$view,$this->title,'Listado de riesgos','two_level');
	}
}
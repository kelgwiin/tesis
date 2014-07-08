<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Continuidad extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->module('utilities/utils');
	}
	
	// FUNCIONES Y VARIABLES PRIVADAS DEL CONTROLADOR
	private $title = 'Gestión de Continuidad del Negocio';
	private function _list()
	{
		$sublista = array
		(
			array
			(
				'chain' => 'Descripción',
				'href'=> site_url('index.php/continuidad/descripcion')
			),
			array
			(
				'chain' => 'Listado de PCN',
				'href'=> site_url('index.php/continuidad/listado_pcn')
			),
			array
			(
				'chain' => 'Crear PCN',
				'href'=> site_url('index.php/continuidad/crear_pcn')
			)
		);
		
		$l =  array();

		$l[] = array(
			"chain" => "Volver a Módulos Principales",
			"href" => site_url(''),
			"icon" => "fa fa-flag"
		);
		$l[] = array(
			"chain" => "Continuidad del Negocio",
			"href" => site_url('index.php/continuidad'),
			"icon" => "fa fa-retweet",
			"list" => $sublista
		);
		
		
		// $l[] = array(
			// "chain" => "Item 1",
			// "href" => site_url(''),
			// "icon" => "fa fa-caret-square-o-down",
			// "list" => $sublista
		// );
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
			'#' => 'Continuidad del Negocio'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$this->utils->template($this->_list(),'continuidad/descripcion',$view,$this->title,'','two_level');
	}
	
	public function formar_equipos()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		// $permiso = modules::run('general/have_permission', 1);
		// $vista = ($permiso) ? 'usuario_ver' : 'usuario_sinpermiso';
		// $view['nivel'] = 1;
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			'#' => 'Equipos de acción'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$this->utils->template($this->_list(),'continuidad/formar_equipos',$view,$this->title,'','two_level');
	}
	
	public function listado()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		// $permiso = modules::run('general/have_permission', 1);
		// $vista = ($permiso) ? 'usuario_ver' : 'usuario_sinpermiso';
		// $view['nivel'] = 1;
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad' => 'Continuidad del Negocio',
			'#' => 'Listado de PCN'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$this->utils->template($this->_list(),'continuidad/listado',$view,$this->title,'Listado de PCN','two_level');
	}
	
	public function amenazas()
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
		$this->utils->template($this->_list(),'continuidad/amenazas',$view,$this->title,'Gestión de riesgos','two_level');
	}
}
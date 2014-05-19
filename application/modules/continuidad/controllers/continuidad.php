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
		$l =  array();

		$l[] = array(
			"chain" => "Volver a Módulos Principales",
			"href" => site_url(''),
			"icon" => "fa fa-flag"
		);
		$l[] = array(
			"chain" => "Descripción",
			"href" => site_url('index.php/continuidad'),
			"icon" => "fa fa-retweet"
		);
		
		$sublista = array
		(
			array
			(
				'chain' => 'Listar',
				'href'=> site_url('')
			),
			array
			(
				'chain' => 'Arrendamiento',
				'href'=> site_url('')
			)
		);
		$l[] = array(
			"chain" => "Item 1",
			"href" => site_url(''),
			"icon" => "fa fa-caret-square-o-down",
			"list" => $sublista
		);
		return $l;
	}
	
	
	public function index()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		// $permiso = modules::run('general/have_permission', 1);
		// $vista = ($permiso) ? 'usuario_ver' : 'usuario_sinpermiso';
		// $view['nivel'] = 1;
		
		$this->utils->template($this->_list(),'continuidad/descripcion','',$this->title,'','two_level');
	}
}
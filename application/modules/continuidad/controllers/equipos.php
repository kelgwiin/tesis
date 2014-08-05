<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * PERMITE UNA GESTION PARA LA CREACION DE EQUIPOS DE ACCION PARA LOS PLANES DE CONTINUIDAD DEL NEGOCIO
 * @author Fernando Pinto <f6rnando@gmail.com>
*/

class Equipos extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->module('utilities/utils');
		$this->load->model('gestionriesgos_model','riesgos');
		$this->lang->load('admin');
	}
	
	private $title = 'Gestión de Continuidad del Negocio';
	// LISTAS PARA EL SIDEBAR DE LA APLICACION
	private function _list1()
	{
		$l =  array();

		$l[] = array(
			"chain" => "Volver a Módulos Principales",
			"href" => site_url(''),
			"icon" => "fa fa-flag"
		);
		// $sublista = array
		// (
			// array
			// (
				// 'chain' => 'Categorías de riesgos y amenazas',
				// 'href'=> site_url('index.php/continuidad/gestion_riesgos/categorias')
			// ),
			// array
			// (
				// 'chain' => 'Listado de riesgos y amenazas',
				// 'href'=> site_url('index.php/continuidad/gestion_riesgos/riesgos')
			// ),
			// array
			// (
				// 'chain' => 'Vulnerabilidades',
				// 'href'=> site_url('index.php/continuidad/gestion_riesgos/vulnerabilidades')
			// )
		// );
		$l[] = array(
			"chain" => "Gestión de Riesgos y Amenazas",
			"href" => site_url('index.php/continuidad/gestion_riesgos'),
			"icon" => "fa fa-fire-extinguisher",
			// "list" => $sublista
		);
		$l[] = array(
			"chain" => "Equipos de desarrollo",
			"href" => site_url('index.php/continuidad/equipos'),
			"icon" => "fa fa-user"
		);
		$l[] = array(
			"chain" => "Continuidad del Negocio",
			"href" => site_url('index.php/continuidad'),
			"icon" => "fa fa-retweet"
		);
		return $l;
	}
	
	public function index()
	{
		$this->listado_equipos();
	}
	
	public function listado_equipos()
	{
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			'#' => 'Equipos de desarrollo'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$this->utils->template($this->_list1(),'continuidad/equipos/equipos_listado',$view,$this->title,'Equipos de desarrollo','two_level');
	}
	
	public function crear_equipo($tipo_equipo)
	{
		if($_POST)
		{
			die_pre($_POST);
		}
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad/equipos' => 'Equipos de desarrollo',
			'#' => 'Crear equipo'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$view['tipo_equipo'] = $tipo_equipo;
		$view['personal'] = $this->riesgos->get_personal();
		$view['equipocrear_js'] = $this->load->view('continuidad/equipos/equipocrear_js','',TRUE);
		$this->utils->template($this->_list1(),'continuidad/equipos/equipos_crear',$view,$this->title,'Crear equipo','two_level');
	}
}
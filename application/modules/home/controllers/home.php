<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller
{
	public function __construct(){
		parent::__construct();
				
		//Modules
		//Cargando el módulo ./modules/utilities/utils.php
		$this->load->module('utilities/utils');
	}

	public function index()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$data['main_content'] = $this->load->view('home_view','',TRUE);
		/*$this->load->view('front/template',$data);*/

		$this->utils->template($this->_list(),'home/home_view','','Tesis Suprema xD',' Title tab',
			'two_level');
	}
	
	/**
	 * Genera la lista de ítems para colocarlos en el menú izquierdo
	 * @return array
	 */	
	private function _list(){
		$l =  array();
		//Inicio
		$l[] = array(
			"chain" => "Inicio",
			"href" => site_url(''),
			"icon" => "fa fa-flag"
		);	
		//Gestion de Operaciones
		$l[] = array(
			"chain" => "Gestión de Operaciones",
			"href" => site_url('index.php/operaciones'),
			"icon" => "fa fa-bar-chart-o"
		);

		//Acuerdos de Niveles de Servicio
		$l[] = array(
			"chain" => "Acuerdos de Niveles de Servicio",
			"href" => site_url(''),
			"icon" => "fa fa-table"
		);

		//Gestión de Capacidad
		//Creando la sublista del menu
		$sublista = array(
			array(
				'chain'=>'Descripción',
				'href' => site_url('index.php/Capacidad')
			),

			array(
				'chain'=>'Componentes de TI',
				'href' => site_url('index.php/Capacidad/ComponentesIT')
			),

			array(
				'chain'=>'Servicios',
				'href' => site_url('index.php/Capacidad/Servicios')
			),

			array(
				'chain'=>'Departamentos',
				'href' => site_url('index.php/Capacidad/Departamentos')
			),

			array(
				'chain'=>'Umbrales',
				'href' => site_url('index.php/Capacidad/Umbrales')
			)			
		);

		$l[] = array(
			"chain" => "Gestión de Capacidad",
			"href" => site_url(''),
			"icon" => "fa fa-caret-square-o-down",
			"list"=> $sublista
		);

		//Continuidad del Negocio
		$l[] = array(
			"chain" => "Gestión de Continuidad del Negocio",
			"href" => site_url(''),
			"icon" => "fa fa-retweet"
		);

		//Gestión de Costos
		$sublista = array(
			array(
				'chain'=>'Descripcion',
				'href' => site_url('index.php/Costos')
			),

			array(
				'chain'=>'Costos Indirectos',
				'href' => site_url('index.php/Costos/CargarCostosIndirectos')
			),

			array(
				'chain'=>'item 3',
				'href' => site_url('#')
			)
		);

		$l[] = array(
			"chain" => "Gestión de Costos",
			"href" => site_url(''),
			"icon" => "fa fa-clipboard",
			"list" => $sublista
		);

		//Gestión de Disponibilidad
		$sublista = array(
			array(
				'chain' => 'Descripción',
				'href' => site_url('index.php/Disponibilidad/')
			),
			
			array(
				'chain' => 'Registrar Incidencia',
				'href' => site_url('index.php/Disponibilidad/Registrarincidencia/')
			),
			
			array(
				'chain' => 'Reportes Incidencias',
				'href' => site_url('index.php/Disponibilidad/ReportesIncidencias/')
			),

			array(
				'chain' => 'Registrar Eventos Calendario',
				'href' => site_url('index.php/Disponibilidad/Calendario/')
			),

			array(
				'chain' => 'Monitoreo  de los Servicios',
				'href' => site_url('index.php/Disponibilidad/Monitoreo/')
			),	

			array(
				'chain' => 'Plan de Disponibilidad',
				'href' => site_url('index.php/Disponibilidad/Plan/')
			)
		);

		$l[] = array(
			"chain" => "Gestión de Disponibilidad",
			"href" => site_url('index.php/Disponibilidad'),
			"icon" => "fa fa-clock-o",
			"list" => $sublista
		);

		//Gestión de Usuarios
		$sublista = array(
			array(
				'chain'=>'Ver usuarios',
				'href' => site_url('index.php/usuarios')
			),

			array(
				'chain'=>'Crear usuarios',
				'href' => site_url('index.php/usuarios/crear')
			),

			array(
				'chain'=>'Buscar usuarios',
				'href' => site_url('index.php/usuarios/buscar')
			),


		);
		$l[] = array(
			"chain" => "Gestión de Usuarios",
			"href" => site_url(''),
			"icon" => "fa fa-user",
			"list" => $sublista
		);

		return $l;
	}
}

/* End of file home.php */
/* Location: ./application/modules/home/controllers/home.php */

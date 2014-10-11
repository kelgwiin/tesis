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
		$this->load->model('general/general_model','general');
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
		$sublista = array
		(
			array
			(
				'chain' => 'Gestión de riesgos y amenazas',
				'href'=> site_url('index.php/continuidad/gestion_riesgos')
			),
			array
			(
				'chain' => 'Equipos de desarrollo',
				'href'=> site_url('index.php/continuidad/equipos')
			),
			array
			(
				'chain' => 'Estrategias para la recuperación',
				'href'=> site_url('index.php/continuidad/estrategias')
			),
			array
			(
				'chain' => 'Planes de continuidad del negocio',
				'href'=> site_url('index.php/continuidad/seleccionar_listado')
			)
		);
		$l[] = array(
			"chain" => "Continuidad del Negocio",
			"href" => site_url('index.php/continuidad'),
			"icon" => "fa fa-retweet",
			"list" => $sublista
		);
		return $l;
	}
	
	public function index()
	{
		$this->listado_equipos();
	}
	
	public function listado_equipos()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 26);
		$vista = ($permiso) ? 'equipos_listado' : 'continuidad_sinpermiso';
		$view['nivel'] = 26;
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad' => 'Continuidad del Negocio',
			'#' => 'Equipos de desarrollo'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$view['crisis'] = $this->riesgos->get_allteams(array('e.id_tipo'=>1));
		$view['recuperacion'] = $this->riesgos->get_allteams(array('e.id_tipo'=>2));
		$view['logistica'] = $this->riesgos->get_allteams(array('e.id_tipo'=>3));
		$view['rrpp'] = $this->riesgos->get_allteams(array('e.id_tipo'=>4));
		$view['pruebas'] = $this->riesgos->get_allteams(array('e.id_tipo'=>5));
		$view['equiposlistado_js'] = $this->load->view('continuidad/equipos/equiposlistado_js','',TRUE);
		$this->utils->template($this->_list1(),'continuidad/equipos/'.$vista,$view,$this->title,'Equipos de desarrollo','two_level');
	}
	
	public function crear_equipo($tipo_equipo)
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 27);
		$vista = ($permiso) ? 'equipos_crear' : 'continuidad_sinpermiso';
		$view['nivel'] = 27;
		
		if($_POST)
		{
			// die_pre($_POST);
			$post['equipo'] = implode(',', $_POST['equipo']);
			$post['tipo_equipo'] = $_POST['tipo_equipo'];
			$equipo = $this->riesgos->set_equipo($post);
			if($equipo)
				$this->session->set_flashdata('alert_success','Equipo de '.ucfirst($tipo_equipo).' creado con éxito');
			else
				$this->session->set_flashdata('alert_error','Hubo un error creando el nuevo equipo, por favor intente de nuevo o contacte a su administrador');
			
			redirect(site_url('index.php/continuidad/equipos'));
		}
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad' => 'Continuidad del Negocio',
			base_url().'index.php/continuidad/equipos' => 'Equipos de desarrollo',
			'#' => 'Crear equipo'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$view['tipo_equipo'] = $tipo_equipo;
		$view['personal'] = $this->riesgos->get_personal();
		$view['equipocrear_js'] = $this->load->view('continuidad/equipos/equipocrear_js','',TRUE);
		$this->utils->template($this->_list1(),'continuidad/equipos/'.$vista,$view,$this->title,'Crear equipo','two_level');
	}

	public function eliminar_equipo($id_equipo)
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 28);
		$vista = ($permiso) ? 'eliminar' : 'continuidad_sinpermiso';
		$view['nivel'] = 28;
		
		$message = "El equipo que intenta eliminar no se encuentra almacenado en la base de datos";
		modules::run('general/exist_index', 'equipo_pcn', array('id_equipo'=>$id_equipo), 'index.php/continuidad/equipos', $message);
		$where = array('id_equipo' => $id_equipo);
		if($vista == 'eliminar')
		{
			if($this->general->delete('equipo_pcn',$where))
				$this->session->set_flashdata('alert_success','Equipo de eliminado exitósamente');
			else
				$this->session->set_flashdata('alert_error','Hubo un error eliminando el equipo, por favor intente de nuevo o contacte a su administrador');
				
			redirect(site_url('index.php/continuidad/equipos'));
		}
			$this->utils->template($this->_list1(),'continuidad/equipos/'.$vista,$view,$this->title,'Eliminar PCN','two_level');
	}
}
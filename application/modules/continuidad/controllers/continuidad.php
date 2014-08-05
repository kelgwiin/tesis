<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * PERMITE UNA GESTION PARA LA CONTINUIDAD DEL NEGOCIO DE LA ORGANIZACION
 * @author Fernando Pinto <f6rnando@gmail.com>
*/
 
class Continuidad extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->module('utilities/utils');
		$this->load->model('gestionriesgos_model','riesgos');
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
		return $l;
	}
	private function _list2()
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
				'chain' => 'Listado de PCN',
				'href'=> site_url('index.php/continuidad/listado_pcn')
			)
		);
		$l[] = array(
			"chain" => "Planes de Continuidad del Negocio",
			"href" => site_url('index.php/continuidad'),
			"icon" => "fa fa-tasks",
			"list" => $sublista
		);
		return $l;
	}
	
	
	public function index()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);
		$vista = ($permiso) ? 'descripcion' : 'continuidad_sinpermiso';
		$view['nivel'] = 10;
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			'#' => 'Continuidad del Negocio'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$this->utils->template($this->_list1(),'continuidad/'.$vista,$view,$this->title,'','two_level');
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
	
	public function chart()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 11);
		$vista = ($permiso) ? 'chart_select' : 'continuidad_sinpermiso';
		$view['nivel'] = 11;
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad' => 'Continuidad del Negocio',
			'#' => 'Seleccionar Listado'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$js['riesgos'] = $this->riesgos->get_allrisks();
		
		$baja = $mediabaja = $media = $mediaalta = $alta = 0;
		foreach($js['riesgos'] as $key => $riesgo)
		{
			switch ($riesgo->valoracion)
			{
				case 'Baja': $baja++; break;
				case 'Media-Baja': $mediabaja++; break;
				case 'Media': $media++; break;
				case 'Media-Alta': $mediaalta++; break;
				case 'Alta': $alta++; break;
			}
		}
		$count_risk = count($js['riesgos']);
		$js['percents'] = array
		(
			'Baja' => $this->percent($baja, $count_risk),
			'Media-Baja' => $this->percent($mediabaja, $count_risk),
			'Media' => $this->percent($media, $count_risk),
			'Media-Alta' => $this->percent($mediaalta, $count_risk),
			'Alta' => $this->percent($alta, $count_risk),
		);
		$view['piechart_js'] = $this->load->view('continuidad/continuidad/piechart_js',$js,TRUE);
		$this->utils->template($this->_list2(),'continuidad/continuidad/'.$vista,$view,$this->title,'Listado de PCN','two_level');
	}
	
	public function listado($tipo_listado = '')
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 11);
		$vista = ($permiso) ? 'listado' : 'continuidad_sinpermiso';
		$view['nivel'] = 11;
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad' => 'Continuidad del Negocio',
			base_url().'index.php/continuidad/seleccionar_listado' => 'Seleccionar Listado',
			'#' => 'Listado de PCN'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		
		
		// $riesgos = modules::run('continuidad/gestion_riesgos/get_risks');
		// if(!empty($tipo_listado))
		// {
			// foreach($riesgos as $key => $riesgo)
			// {
				// if($riesgo->valoracion != $tipo_listado)
					// unset($riesgos[$key]);
			// }
		// }
		// $view['riesgos'] = $riesgos;
		
		$view['planes_continuidad'] = (empty($tipo_listado)) ? $this->riesgos->get_allpcn() : $this->riesgos->get_allpcn(array('ra.valoracion' => $tipo_listado));
		$tipo_listado = str_replace('-', ' ', $tipo_listado);
		$tipo_listado = ucwords($tipo_listado);
		$tipo_listado = str_replace(' ', '-', $tipo_listado);
		$view['valoracion'] = $tipo_listado;
		$this->utils->template($this->_list2(),'continuidad/continuidad/'.$vista,$view,$this->title,'Listado de PCN','two_level');
	}
	
	public function crear($valoracion = '')
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		// $permiso = modules::run('general/have_permission', 1);
		// $vista = ($permiso) ? 'usuario_ver' : 'usuario_sinpermiso';
		// $view['nivel'] = 1;
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad' => 'Continuidad del Negocio',
			base_url().'index.php/continuidad/listado_pcn' => 'Listado de PCN',
			'#' => 'Crear PCN'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$view['riesgos'] = $this->riesgos->get_allrisks(array('riesgos_amenazas.valoracion'=>$valoracion));
		$view['departamentos'] = $this->general->get_table('departamento');
		$view['estados'] = $this->general->get_table('usuarios_estado');
		$view['crearpcn_js'] = $this->load->view('continuidad/continuidad/crearpcn_js','',TRUE);
		$this->utils->template($this->_list2(),'continuidad/continuidad/crear_pcn',$view,$this->title,'Crear nuevo PCN','two_level');
	}

	private function percent($item, $count)
	{
		return (float)($item * 100)/$count;
	}
}
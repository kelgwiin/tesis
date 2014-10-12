<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * PERMITE UNA GESTION PARA LA CONTINUIDAD DEL NEGOCIO DE LA ORGANIZACION
 * @author Fernando Pinto <f6rnando@gmail.com>
*/
 
class Estrategias extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->module('utilities/utils');
		$this->load->model('gestionriesgos_model','riesgos');
		$this->load->model('general/general_model','general');
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
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$this->load->helper('text');
		$permiso = modules::run('general/have_permission', 29);
		$vista = ($permiso) ? 'listado_estrategias' : 'continuidad_sinpermiso';
		$view['nivel'] = 29;
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad' => 'Continuidad del Negocio',
			'#' => 'Estrategias de Recuperación'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$view['estrategias'] = $this->riesgos->get_allestrategias();
		$this->utils->template($this->_list1(),'continuidad/estrategias/'.$vista,$view,$this->title,'','two_level');
	}
	
	public function crear_estrategia()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 30);
		$vista = ($permiso) ? 'crear_estrategia' : 'continuidad_sinpermiso';
		$view['nivel'] = 30;
		
		if($_POST)
		{
			// DELIMITADOR DE ERROR DEL FORM VALIDATION
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">',
			'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			
			// REGLAS DEL FORM VALIDATION
			if($_POST['id_estrategia']) $this->form_validation->set_rules('denominacion','<strong>Denominación</strong>','required|xss_clean');
			else
			{
				$this->form_validation->set_rules('denominacion','<strong>Denominación</strong>','required|xss_clean|is_unique[estrategias_recuperacion.denominacion]');
				$this->form_validation->set_message('is_unique', 'La %s que intenta crear ya se encuentra almacenada en la base de datos');
			}
			$this->form_validation->set_rules('costo','<strong>Costo</strong>','required|is_natural|xss_clean');
			$this->form_validation->set_rules('hardware','<strong>Hardware</strong>','required|xss_clean');
			$this->form_validation->set_rules('telecom','<strong>Telecomunicaciones</strong>','required|xss_clean');
			$this->form_validation->set_rules('fecha_inicio','<strong>Tiempo</strong>','required|xss_clean');
			$this->form_validation->set_rules('fecha_fin','<strong>Tiempo</strong>','required|xss_clean');
			$this->form_validation->set_rules('localizacion','<strong>Localización</strong>','required|xss_clean');
			
			if($this->form_validation->run($this))
			{
				$_POST['fecha_inicio'] = date('Y-m-d',strtotime($_POST['fecha_inicio']));
				$_POST['fecha_fin'] = date('Y-m-d',strtotime($_POST['fecha_fin']));
				if($_POST['id_estrategia'])
				{
					// SI EXISTE $_POST['id_estrategia'] QUIERE DECIR QUE YA LA ESTRATEGIA ESTA CREADA Y SE QUIERE ACTUALIZAR SU INFORMACION
					$where['id_estrategia'] = $_POST['id_estrategia'];
					unset($_POST['id_estrategia']);
					$riesgo = $this->general->update('estrategias_recuperacion',$_POST,$where);
					if($riesgo)
						$this->session->set_flashdata('alert_success','Estrategia de recuperación modificada con éxito');
					else
						$this->session->set_flashdata('alert_error','Hubo un error al intentar modificar la estrategia de recuperación, por favor intente de nuevo o contacte a su administrador');
				}else
				{
					$_POST['fecha_creacion'] = date('Y-m-d');
					$riesgo = $this->general->insert('estrategias_recuperacion',$_POST);
					if($riesgo != FALSE)
						$this->session->set_flashdata('alert_success','Nueva estrategia de recuperación creada con éxito');
					else
						$this->session->set_flashdata('alert_error','Hubo un error creando la estrategia de recuperación, por favor intente de nuevo o contacte a su administrador');
				}
				redirect(site_url('index.php/continuidad/estrategias'));
			}
		}
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad' => 'Continuidad del Negocio',
			base_url().'index.php/continuidad/estrategias' => 'Estrategias de Recuperación',
			'#' => 'Crear Estrategia'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$view['tipo_estrategias'] = $this->general->get_table('tipo_estrategiasrecuperacion');
		$this->utils->template($this->_list1(),'continuidad/estrategias/'.$vista,$view,$this->title,'','two_level');
	}

	// ESTA FUNCION LEVANTA LA VISTA crear_estrategia PERO CON LA INFORMACION DE LA estrategia SOLICITADA YA EN EL FORMULARIO A MANERA DE VER O ACTUALIZAR
	public function modificar_estrategia($id_estrategia = '')
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 31);
		$vista = ($permiso) ? 'crear_estrategia' : 'continuidad_sinpermiso';
		$view['nivel'] = 31;
		
		$where['id_estrategia'] = $id_estrategia;
		if($this->general->exist('estrategias_recuperacion',$where))
		{
			$view['estrategia'] = $this->general->get_row('estrategias_recuperacion',$where);
			$breadcrumbs = array
			(
				base_url() => 'Inicio',
				base_url().'index.php/continuidad' => 'Continuidad del Negocio',
				base_url().'index.php/continuidad/estrategias' => 'Estrategias de Recuperación',
				'#' => 'Modificar Estrategia'
			);
			$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
			$view['tipo_estrategias'] = $this->general->get_table('tipo_estrategiasrecuperacion');
			$this->utils->template($this->_list1(),'continuidad/estrategias/'.$vista,$view,$this->title,'Modificar estrategias','two_level');
		}else
		{
			$this->session->set_flashdata('alert_error','La estrategia que intenta modificar no se encuentra en la base de datos');
			redirect(site_url('index.php/continuidad/estrategias'));
		}
	}

	public function eliminar_estrategia($id_estrategia = '')
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 32);
		$vista = ($permiso) ? 'eliminar' : 'continuidad_sinpermiso';
		$view['nivel'] = 32;
		
		$where['id_estrategia'] = $id_estrategia;
		if(($vista == 'eliminar') && $this->general->exist('estrategias_recuperacion',$where))
		{
			if($this->general->delete('estrategias_recuperacion',$where))
				$this->session->set_flashdata('alert_success','La estrategia se ha eliminado con éxito');
			else
				$this->session->set_flashdata('alert_error','Hubo un error al intentar eliminar estrategia, por favor intente de nuevo o contacte a su administrador');
			
		}else
			$this->session->set_flashdata('alert_error','La estrategia que intenta eliminar no se encuentra en la base de datos');
			
		if($vista == 'continuidad_sinpermiso')
			$this->utils->template($this->_list1(),'continuidad/estrategias/'.$vista,$view,$this->title,'Eliminar estrategia','two_level');
			
		redirect(site_url('index.php/continuidad/estrategias'));
	}
}
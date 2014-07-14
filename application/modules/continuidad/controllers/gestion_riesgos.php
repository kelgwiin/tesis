<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * PERMITE UNA GESTION PARA LOS RIESGOS Y LAS VULNERABILIDADES
 * @author Fernando Pinto <f6rnando@gmail.com>
 */
 
class Gestion_riesgos extends MX_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->module('utilities/utils');
		$this->load->model('general/general_model','general');
		$this->load->helper('text');
	}
	
	//---------------- FUNCIONES Y VARIABLES PRIVADAS DEL CONTROLADOR
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
	
	// INICIO DE LAS FUNCIONES PROPIAS DEL CONTROLADOR DE gestion_riesgos
	// FUNCION QUE LLAMA AL MENU DE LA GESTION DE RIESGOS, DE AQUI SE PARTE PARA ESCOGER LA GESTION DE CATEGORIAS, RIESGOS O VULNERABILIDADES
	
/**********		INICIO DE FUNCIONES PERTINENTES A LA SECCION DE CATEGORIAS DE RIESGOS Y AMENAZAS 	**********/
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
	
	// LISTADO DE CATEGORIAS
	// SE LISTAN TODAS LAS CATEGORIAS QUE SE ENCUENTRAN EN BASE DE DATOS
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
	
	// SE CREAN CATEGORIAS NUEVAS PARA LOS RIESGOS Y AMENAZAS. 
	// UNA CATEGORIA ES SIMILAR A UN NODO PADRE PARA LOS RIESGOS Y AMENAZAS, ENGLOBAN UNA CANTIDAD DE RIESGOS SIMILARES e.g "Desastres Naturales"
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
		
		// EL ARREGLO $_POST PUEDE CONTENER INFORMACION NUEVA O INFORMACION PARA ACTUALIZAR UNA CATEGORIA YA CREADA
		if($_POST)
		{
			// DELIMITADOR DE ERROR DEL FORM VALIDATION
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">',
			'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			
			// REGLAS DEL FORM VALIDATION
			$this->form_validation->set_rules('categoria','<strong>Tipo de amenaza</strong>','required|xss_clean');
			$this->form_validation->set_rules('descripcion','<strong>Descripción</strong>','required|min_length[40]|xss_clean');
			
			if($this->form_validation->run($this))
			{
				$_POST['categoria'] = ucfirst(strtolower($_POST['categoria']));
				if($_POST['id_categoria'])
				{
					// SI EXISTE $_POST['id_categoria'] QUIERE DECIR QUE YA LA CATEGORIA ESTA CREADA Y SE QUIERE ACTUALIZAR SU INFORMACION
					$where['id_categoria'] = $_POST['id_categoria'];
					unset($_POST['id_categoria']);
					$categoria = $this->general->update('categorias_riesgos',$_POST,$where);
					if($categoria)
						$this->session->set_flashdata('alert_success','Categoría modificada con éxito');
					else
						$this->session->set_flashdata('alert_error','Hubo un error al intentar modificar categoría, por favor intente de nuevo o contacte a su administrador');
				}else
				{
					// SINO, ES INFORMACION NUEVA POR LO QUE SIGNIFICA LA CREACION DE UNA NUEVA CATEGORIA
					$categoria = $this->general->insert('categorias_riesgos',$_POST);
					if($categoria != FALSE)
						$this->session->set_flashdata('alert_success','Categoría creada con éxito');
					else
						$this->session->set_flashdata('alert_error','Hubo un error creando la nueva categoría, por favor intente de nuevo o contacte a su administrador');
				}
				redirect(site_url('index.php/continuidad/gestion_riesgos/categorias'));
			}
		}
		
		$this->utils->template($this->_categorias(),'continuidad/gestion_riesgos/crear_categoria',$view,$this->title,'Agregar nueva categoría','two_level');
	}
	
	// ESTA FUNCION LEVANTA LA VISTA crear_categoria PERO CON LA INFORMACION DE LA CATEGORIA SOLICITADA YA EN EL FORMULARIO A MANERA DE VER O ACTUALIZAR
	public function modificar_categoria($id_categoria = '')
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		// $permiso = modules::run('general/have_permission', 1);
		// $vista = ($permiso) ? 'usuario_ver' : 'usuario_sinpermiso';
		// $view['nivel'] = 1;
		
		$where['id_categoria'] = $id_categoria;
		if($this->general->exist('categorias_riesgos',$where))
		{
			$view['categoria'] = $this->general->get_row('categorias_riesgos',$where);
			$breadcrumbs = array
			(
				base_url() => 'Inicio',
				base_url().'index.php/continuidad' => 'Continuidad del Negocio',
				base_url().'index.php/continuidad/gestion_riesgos' => 'Gestión de riesgos',
				base_url().'index.php/continuidad/gestion_riesgos/categorias' => 'Listado de categorías',
				'#' => 'Modificar categoría'
			);
			$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
			$this->utils->template($this->_categorias(),'continuidad/gestion_riesgos/crear_categoria',$view,$this->title,'Modificar categoría','two_level');
		}else
		{
			$this->session->set_flashdata('alert_error','La categoría que intenta modificar no se encuentra en la base de datos');
			redirect(site_url('index.php/continuidad/gestion_riesgos/categorias'));
		}
	}
	
	
	public function eliminar_categoria($id_categoria = '')
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		// $permiso = modules::run('general/have_permission', 1);
		// $vista = ($permiso) ? 'usuario_ver' : 'usuario_sinpermiso';
		// $view['nivel'] = 1;
		
		$where['id_categoria'] = $id_categoria;
		if($this->general->exist('categorias_riesgos',$where))
		{
			if($this->general->delete('categorias_riesgos',$where))
				$this->session->set_flashdata('alert_success','La categoría se ha eliminado con éxito');
			else
				$this->session->set_flashdata('alert_error','Hubo un error al intentar eliminar categoría, por favor intente de nuevo o contacte a su administrador');
			
		}else
			$this->session->set_flashdata('alert_error','La categoría que intenta eliminar no se encuentra en la base de datos');
			
		redirect(site_url('index.php/continuidad/gestion_riesgos/categorias'));
	}
/**********		FIN DE FUNCIONES PERTINENTES A LA SECCION DE CATEGORIAS RIESGOS Y AMENAZAS 	**********/


/**********		INICIO DE FUNCIONES PERTINENTES A LA SECCION DE RIESGOS Y AMENAZAS 	**********/
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
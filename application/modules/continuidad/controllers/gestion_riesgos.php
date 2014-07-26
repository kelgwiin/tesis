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
			"href" => site_url('index.php/continuidad/gestion_riesgos/riesgos'),
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
		$permiso = modules::run('general/have_permission', 12);
		$vista = ($permiso) ? 'menu_riesgos' : 'continuidad_sinpermiso';
		$view['nivel'] = 12;
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad' => 'Continuidad del Negocio',
			'#' => 'Gestión de riesgos'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$this->utils->template($this->_list1(),'continuidad/gestion_riesgos/'.$vista,$view,$this->title,'Gestión de riesgos','two_level');
	}
	
	// LISTADO DE CATEGORIAS
	// SE LISTAN TODAS LAS CATEGORIAS QUE SE ENCUENTRAN EN BASE DE DATOS
	public function categorias()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 13);
		$vista = ($permiso) ? 'listado_categorias' : 'continuidad_sinpermiso';
		$view['nivel'] = 13;
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad' => 'Continuidad del Negocio',
			base_url().'index.php/continuidad/gestion_riesgos' => 'Gestión de riesgos',
			'#' => 'Listado de categorías'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		
		$view['categorias'] = $this->general->get_table('categorias_riesgos');
		
		$this->utils->template($this->_categorias(),'continuidad/gestion_riesgos/'.$vista,$view,$this->title,'Listado de categorías','two_level');
	}
	
	// SE CREAN CATEGORIAS NUEVAS PARA LOS RIESGOS Y AMENAZAS. 
	// UNA CATEGORIA ES SIMILAR A UN NODO PADRE PARA LOS RIESGOS Y AMENAZAS, ENGLOBAN UNA CANTIDAD DE RIESGOS SIMILARES e.g "Desastres Naturales"
	public function crear_categoria()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 14);
		$vista = ($permiso) ? 'crear_categoria' : 'continuidad_sinpermiso';
		$view['nivel'] = 14;
		
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
			$this->form_validation->set_rules('categoria','<strong>Tipo de amenaza</strong>','required|xss_clean|is_unique[categorias_riesgos.categoria]');
			$this->form_validation->set_rules('descripcion','<strong>Descripción</strong>','required|min_length[40]|xss_clean');
			$this->form_validation->set_message('is_unique', 'El %s que intenta crear ya se encuentra almacenado en la base de datos');
			
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
		
		$this->utils->template($this->_categorias(),'continuidad/gestion_riesgos/'.$vista,$view,$this->title,'Agregar nueva categoría','two_level');
	}
	
	// ESTA FUNCION LEVANTA LA VISTA crear_categoria PERO CON LA INFORMACION DE LA CATEGORIA SOLICITADA YA EN EL FORMULARIO A MANERA DE VER O ACTUALIZAR
	public function modificar_categoria($id_categoria = '')
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 15);
		$vista = ($permiso) ? 'crear_categoria' : 'continuidad_sinpermiso';
		$view['nivel'] = 15;
		
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
				'#' => $view['categoria']->categoria
			);
			$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
			$this->utils->template($this->_categorias(),'continuidad/gestion_riesgos/'.$vista,$view,$this->title,'Modificar categoría','two_level');
		}else
		{
			$this->session->set_flashdata('alert_error','La categoría que intenta modificar no se encuentra en la base de datos');
			redirect(site_url('index.php/continuidad/gestion_riesgos/categorias'));
		}
	}
	
	
	public function eliminar_categoria($id_categoria = '')
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 16);
		$vista = ($permiso) ? 'eliminar' : 'continuidad_sinpermiso';
		$view['nivel'] = 16;
		
		$where['id_categoria'] = $id_categoria;
		if(($vista == 'eliminar') && $this->general->exist('categorias_riesgos',$where))
		{
			if($this->general->delete('categorias_riesgos',$where))
				$this->session->set_flashdata('alert_success','La categoría se ha eliminado con éxito');
			else
				$this->session->set_flashdata('alert_error','Hubo un error al intentar eliminar categoría, por favor intente de nuevo o contacte a su administrador');
			
		}else
			$this->session->set_flashdata('alert_error','La categoría que intenta eliminar no se encuentra en la base de datos');
			
		if($vista == 'continuidad_sinpermiso')
			$this->utils->template($this->_categorias(),'continuidad/gestion_riesgos/'.$vista,$view,$this->title,'Eliminar categoría','two_level');
			
		redirect(site_url('index.php/continuidad/gestion_riesgos/categorias'));
	}
/**********		FIN DE FUNCIONES PERTINENTES A LA SECCION DE CATEGORIAS RIESGOS Y AMENAZAS 	**********/


/**********		INICIO DE FUNCIONES PERTINENTES A LA SECCION DE RIESGOS Y AMENAZAS 	**********/
	public function listado_riesgos()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 17);
		$vista = ($permiso) ? 'listado_riesgos' : 'continuidad_sinpermiso';
		$view['nivel'] = 17;
		$this->load->model('gestionriesgos_model','riesgos');
		
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad' => 'Continuidad del Negocio',
			base_url().'index.php/continuidad/gestion_riesgos' => 'Gestión de riesgos',
			'#' => 'Listado de riesgos'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$riesgos = $this->riesgos->get_allrisks();
		foreach($riesgos as $key => $riesgo)
			$riesgo->valoracion = $this->valoracion_riesgo($riesgo);
		
		$view['riesgos'] = $riesgos;
		$this->utils->template($this->_riesgos(),'continuidad/gestion_riesgos/'.$vista,$view,$this->title,'Listado de riesgos','two_level');
	}
	
	public function crear_riesgo()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 18);
		$vista = ($permiso) ? 'crear_riesgo' : 'continuidad_sinpermiso';
		$view['nivel'] = 18;
		
		if($_POST)
		{
			// DELIMITADOR DE ERROR DEL FORM VALIDATION
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">',
			'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div>');
			
			// REGLAS DEL FORM VALIDATION
			$this->form_validation->set_rules('denominacion','<strong>Denominación</strong>','required|xss_clean|is_unique[riesgos_amenazas.denominacion]');
			$this->form_validation->set_message('is_unique', 'La %s que intenta crear ya se encuentra almacenada en la base de datos');
			
			if($this->form_validation->run($this))
			{
				if($_POST['id_riesgo'])
				{
					// SI EXISTE $_POST['id_categoria'] QUIERE DECIR QUE YA LA CATEGORIA ESTA CREADA Y SE QUIERE ACTUALIZAR SU INFORMACION
					$where['id_riesgo'] = $_POST['id_riesgo'];
					unset($_POST['id_riesgo']);
					$riesgo = $this->general->update('riesgos_amenazas',$_POST,$where);
					if($riesgo)
						$this->session->set_flashdata('alert_success','Riesgo modificado con éxito');
					else
						$this->session->set_flashdata('alert_error','Hubo un error al intentar modificar el riesgo, por favor intente de nuevo o contacte a su administrador');
				}else
				{
					// SINO, ES INFORMACION NUEVA POR LO QUE SIGNIFICA LA CREACION DE UNA NUEVA CATEGORIA
					$riesgo = $this->general->insert('riesgos_amenazas',$_POST);
					if($riesgo != FALSE)
						$this->session->set_flashdata('alert_success','Nuevo riesgo creado con éxito');
					else
						$this->session->set_flashdata('alert_error','Hubo un error creando el nuevo riesgo, por favor intente de nuevo o contacte a su administrador');
				}
				redirect(site_url('index.php/continuidad/gestion_riesgos/riesgos'));
			}
		}
		$view['categorias'] = $this->general->get_table('categorias_riesgos');
		$breadcrumbs = array
		(
			base_url() => 'Inicio',
			base_url().'index.php/continuidad' => 'Continuidad del Negocio',
			base_url().'index.php/continuidad/gestion_riesgos' => 'Gestión de riesgos',
			base_url().'index.php/continuidad/gestion_riesgos/riesgos' => 'Listado de riesgos',
			'#' => 'Crear riesgo'
		);
		$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
		$this->utils->template($this->_riesgos(),'continuidad/gestion_riesgos/'.$vista,$view,$this->title,'Agregar nuevo riesgo','two_level');
	}

	// ESTA FUNCION LEVANTA LA VISTA crear_categoria PERO CON LA INFORMACION DE LA CATEGORIA SOLICITADA YA EN EL FORMULARIO A MANERA DE VER O ACTUALIZAR
	public function modificar_riesgo($id_riesgo = '')
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 19);
		$vista = ($permiso) ? 'crear_riesgo' : 'continuidad_sinpermiso';
		$view['nivel'] = 19;
		
		$where['id_riesgo'] = $id_riesgo;
		if($this->general->exist('riesgos_amenazas',$where))
		{
			$view['riesgo'] = $this->general->get_row('categorias_riesgos',$where);
			$breadcrumbs = array
			(
				base_url() => 'Inicio',
				base_url().'index.php/continuidad' => 'Continuidad del Negocio',
				base_url().'index.php/continuidad/gestion_riesgos' => 'Gestión de riesgos',
				base_url().'index.php/continuidad/gestion_riesgos/categorias' => 'Listado de categorías',
				'#' => $view['categoria']->categoria
			);
			$view['breadcrumbs'] = breadcrumbs($breadcrumbs);
			$this->utils->template($this->_categorias(),'continuidad/gestion_riesgos/'.$vista,$view,$this->title,'Modificar categoría','two_level');
		}else
		{
			$this->session->set_flashdata('alert_error','La categoría que intenta modificar no se encuentra en la base de datos');
			redirect(site_url('index.php/continuidad/gestion_riesgos/categorias'));
		}
	}
	
	
	// public function eliminar_categoria($id_categoria = '')
	// {
		// modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		// // $permiso = modules::run('general/have_permission', 20);
		// // $vista = ($permiso) ? 'usuario_ver' : 'continuidad_sinpermiso';
		// // $view['nivel'] = 20;
// 		
		// $where['id_categoria'] = $id_categoria;
		// if($this->general->exist('categorias_riesgos',$where))
		// {
			// if($this->general->delete('categorias_riesgos',$where))
				// $this->session->set_flashdata('alert_success','La categoría se ha eliminado con éxito');
			// else
				// $this->session->set_flashdata('alert_error','Hubo un error al intentar eliminar categoría, por favor intente de nuevo o contacte a su administrador');
// 			
		// }else
			// $this->session->set_flashdata('alert_error','La categoría que intenta eliminar no se encuentra en la base de datos');
// 			
		// redirect(site_url('index.php/continuidad/gestion_riesgos/categorias'));
	// }
	
	public function get_risks()
	{
		$this->load->model('gestionriesgos_model','riesgos');
		$riesgos = $this->riesgos->get_allrisks();
		foreach($riesgos as $key => $riesgo)
			$riesgo->valoracion = $this->valoracion_riesgo($riesgo);
		
		return $riesgos;
	}
	
	private function valoracion_riesgo($riesgo)
	{
		$probabilidad = array
		(
		 	'Baja' => 1, 'Media-Baja' => 2,
		 	'Media' => 3, 'Media-Alta' => 4,
		 	'Alta' => 5
		);
		$impacto = array
		(
		 	'Bajo' => 1, 'Medio-Bajo' => 2,
		 	'Medio' => 3, 'Medio-Alto' => 4,
		 	'Alto' => 5
		);
		$valoracion = array
		(
			'1' => 'Baja',
			'2' => 'Media-Baja',
			'3' => 'Media',
			'4' => 'Media-Alta',
			'5' => 'Alta',
			'1.5' => 'Baja',
			'2.5' => 'Media-Baja',
			'3.5' => 'Media-Alta',
			'4.5' => 'Alta'
		);
		$valor = ($probabilidad[$riesgo->probabilidad] + $impacto[$riesgo->impacto])/2;
		return $valoracion[(string)$valor];
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Niveles extends MX_Controller
{
	function __construct()
	{
        parent::__construct();

		$this->load->model('general/general_model','general');
		$this->load->model('niveles_model','catalogo');
		$this->load->model('utilities/utilities_model');

		//Helpers
		$this->load->helper('date');
		$this->load->helper('bs3');
		$this->load->helper('url');

		//Modules
		//Cargando el módulo ./modules/utilities/utils.php
		$this->load->module('utilities/utils');
    }
	
	private $title = 'Niveles de Servicio';

	private function list_sidebar_niveles($index_active){
		$l =  array();

		$l[] = array(
			"chain" => "Inicio",
			"href" => site_url(''),
			"icon" => "fa fa-flag"
		);

		/*$l[] = array(
			"chain" => "Catalogo de Servicio",
			"href" => site_url('index.php/catalogo'),
			"icon" => "fa fa-book"
		);

		$l[] = array(
			"chain" => "Catalogo por Categorias",
			"href" => site_url('index.php/catalogo/por_categorias'),
			"icon" => "fa fa-folder-open-o"
		);

		$sublista = array(
			array(
				'chain' => 'Gesti&#243;n de Servicios',
				'href'=> site_url('index.php/cargar_datos/servicios')
			),

			array(
				'chain' => 'Gesti&#243;n de Categor&#237;as',
				'href'=> site_url('index.php/cargar_datos/servicio_categorias')
			),

			array(
				'chain' => 'Gesti&#243;n de Proveedores',
				'href'=> site_url('index.php/cargar_datos/servicio_proveedores')
			),

			array(
				'chain' => 'Gesti&#243;n de Tipos',
				'href'=> site_url('index.php/cargar_datos/servicio_tipos')
			),
			array(
				'chain' => 'Gesti&#243;n de Procesos de Negocio',
				'href'=> site_url('index.php/cargar_datos/procesos_de_negocio')
			),
			array(
				'chain' => 'Asignar Procesos Negocios a Servicios',
				'href'=> site_url('index.php/cargar_datos/procesos_de_negocio_soportados')
			),
			array(
				'chain' => 'Gesti&#243;n de Servicios de Apoyo',
				'href'=> site_url('index.php/cargar_datos/servicio_soportados')
			),
		);
		$l[] = array(
			"chain" => "Gesti&#243;n del Cat&#225;logo",
			"icon" => "fa fa-pencil-square-o",
			"href" => site_url('index.php/catalogo'),
			"list" => $sublista
		);*/


		return $l;
	}

	

	
	public function index()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');

		//$data_view 
		
		$this->utils->template($this->list_sidebar_niveles(1),'niveles/main_niveles','','Niveles de Servicio','','two_level');
	}

	public function acuerdos_de_NS()
	{
		$this->utils->template($this->list_sidebar_niveles(1),'niveles/acuerdos_de_NS','','Niveles de Servicio','','two_level');
	}


	function dropdown_servicio()
	{
		if ($this->input->post('servicio') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_servicio', 'Por favor seleccione el Servicio');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}


	function dropdown_gestor()
	{
		if ($this->input->post('gestor') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_gestor', 'Por favor seleccione el Gestor de Niveles de Servicio');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	function dropdown_intervalo_revision()
	{
		if ($this->input->post('intervalo_revision') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_intervalo_revision', 'Por favor seleccione el Intervalo de Revisión del Servicio');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	function dropdown_intervalo_mantenimiento()
	{
		if ($this->input->post('intervalo_mantenimiento') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_intervalo_mantenimiento', 'Por favor seleccione el Intervalo de Mantenimiento del Servicio');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	function dropdown_unidad_medida()
	{
		if ($this->input->post('unidad_medida') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_unidad_medida', 'Por favor seleccione la Unidad de Medida');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}



	function dropdown_unidad_tiempo()
	{
		if ($this->input->post('unidad_tiempo1') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_unidad_tiempo', 'Por favor seleccione la Unidad de Tiempo');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	function dropdown_unidad_tiempo2()
	{
		if ($this->input->post('unidad_tiempo2') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_unidad_tiempo2', 'Por favor seleccione la Unidad de Tiempo');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	function dropdown_unidad_tiempo_restauracion()
	{
		if ($this->input->post('tiempo_restauracion1') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_unidad_tiempo_restauracion', 'Por favor seleccione la Unidad de Tiempo');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	function dropdown_respuesta_critico()
	{
		if ($this->input->post('unidad_respuesta_critico') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_respuesta_critico', 'Por favor haga una Selección');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

    function dropdown_respuesta_severo()
	{
		if ($this->input->post('unidad_respuesta_severo') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_respuesta_severo', 'Por favor haga una Selección');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	 function dropdown_respuesta_medio()
	{
		if ($this->input->post('unidad_respuesta_medio') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_respuesta_medio', 'Por favor haga una Selección');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	 function dropdown_respuesta_menor()
	{
		if ($this->input->post('unidad_respuesta_menor') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_respuesta_menor', 'Por favor haga una Selección');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

	function dropdown_resolucion_critico()
	{
		if ($this->input->post('unidad_resolucion_critico') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_resolucion_critico', 'Por favor haga una Selección');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

		function dropdown_resolucion_severo()
	{
		if ($this->input->post('unidad_resolucion_severo') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_resolucion_severo', 'Por favor haga una Selección');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

		function dropdown_resolucion_medio()
	{
		if ($this->input->post('unidad_resolucion_medio') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_resolucion_medio', 'Por favor haga una Selección');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}

		function dropdown_resolucion_menor()
	{
		if ($this->input->post('unidad_resolucion_menor') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_resolucion_menor', 'Por favor haga una Selección');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}




	public function crear_acuerdos_de_NS()
	{
		$data_view['servicios'] = $this->general->get_table('servicio');
		$data_view['personal'] = $this->general->get_table('personal');
		

		 $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));


         $this->form_validation->set_rules('servicio', 'Nombre del Servicio', 'callback_dropdown_servicio');
         $this->form_validation->set_rules('gestor', 'Gestor de Niveles del Servicio', 'callback_dropdown_gestor');
         $this->form_validation->set_rules('clientes', 'Cliente(s)', 'required|trim|max_length[500]');

         $this->form_validation->set_rules('fecha_inicio', 'Fecha de Inicio', 'required|trim');
         $this->form_validation->set_rules('fecha_culminacion', 'Fecha de Culminación', 'required|trim');
         $this->form_validation->set_rules('intervalo_revision', 'Intervalo de Revisión del Acuerdo', 'callback_dropdown_intervalo_revision');
         $this->form_validation->set_rules('objetivos_acuerdo', 'Objetivos del Acuerdo', 'required|trim|max_length[65535]');
         $this->form_validation->set_rules('alcance', 'Alcance y Exclusiones del Acuerdo', 'required|trim|max_length[65535]');
         $this->form_validation->set_rules('condiciones_terminacion', 'Condiciones de Terminación del Acuerdo', 'max_length[65535]');
         $this->form_validation->set_rules('modificacion', 'Procedimientos para Actualizar/Modificar el Acuerdo', 'max_length[65535]');

         

         $this->form_validation->set_rules('options_dias', '', 'trim');
         $this->form_validation->set_rules('options_horas', '', 'trim');
         $this->form_validation->set_rules('options_dias_mantenimiento', '', 'trim');

         $this->form_validation->set_rules('checkbox_lunes', '', 'trim');
         $this->form_validation->set_rules('inicio_lunes', 'Inicio Lunes', 'trim');
         $this->form_validation->set_rules('fin_lunes', 'Fin Martes', 'trim');

         $this->form_validation->set_rules('checkbox_martes', '', 'trim');
          $this->form_validation->set_rules('inicio_martes', '', 'trim');
         $this->form_validation->set_rules('fin_martes', '', 'trim');

         $this->form_validation->set_rules('checkbox_miercoles', '', 'trim');
          $this->form_validation->set_rules('inicio_miercoles', '', 'trim');
         $this->form_validation->set_rules('fin_miercoles', '', 'trim');

         $this->form_validation->set_rules('checkbox_jueves', '', 'trim');
          $this->form_validation->set_rules('inicio_jueves', '', 'trim');
         $this->form_validation->set_rules('fin_jueves', '', 'trim');

         $this->form_validation->set_rules('checkbox_sabado', '', 'trim');
          $this->form_validation->set_rules('inicio_sabado', '', 'trim');
         $this->form_validation->set_rules('fin_sabado', '', 'trim');

         $this->form_validation->set_rules('checkbox_viernes', '', 'trim');
          $this->form_validation->set_rules('inicio_viernes', '', 'trim');
         $this->form_validation->set_rules('fin_viernes', '', 'trim');

         $this->form_validation->set_rules('checkbox_domingo', '', 'trim');
          $this->form_validation->set_rules('inicio_domingo', '', 'trim');
         $this->form_validation->set_rules('fin_domingo', '', 'trim');

         $this->form_validation->set_rules('inicio_trabajo', '', 'trim');
         $this->form_validation->set_rules('fin_trabajo', '', 'trim');

         $this->form_validation->set_rules('porcentaje_disponibilidad', 'Porcentaje de Disponibilidad', 'required|numeric');


         $this->form_validation->set_rules('checkbox_lunes_mantenimiento', '', 'trim');
         $this->form_validation->set_rules('inicio_lunes_mantenimiento', 'Inicio Lunes', 'trim');
         $this->form_validation->set_rules('fin_lunes_mantenimiento', 'Fin Martes', 'trim');

         $this->form_validation->set_rules('checkbox_martes_mantenimiento', '', 'trim');
          $this->form_validation->set_rules('inicio_martes_mantenimiento', '', 'trim');
         $this->form_validation->set_rules('fin_martes_mantenimiento', '', 'trim');

         $this->form_validation->set_rules('checkbox_miercoles_mantenimiento', '', 'trim');
          $this->form_validation->set_rules('inicio_miercoles_mantenimiento', '', 'trim');
         $this->form_validation->set_rules('fin_miercoles_mantenimiento', '', 'trim');

         $this->form_validation->set_rules('checkbox_jueves_mantenimiento', '', 'trim');
          $this->form_validation->set_rules('inicio_jueves_mantenimiento', '', 'trim');
         $this->form_validation->set_rules('fin_jueves_mantenimiento', '', 'trim');

         $this->form_validation->set_rules('checkbox_sabado_mantenimiento', '', 'trim');
          $this->form_validation->set_rules('inicio_sabado_mantenimiento', '', 'trim');
         $this->form_validation->set_rules('fin_sabado_mantenimiento', '', 'trim');

         $this->form_validation->set_rules('checkbox_viernes_mantenimiento', '', 'trim');
          $this->form_validation->set_rules('inicio_viernes_mantenimiento', '', 'trim');
         $this->form_validation->set_rules('fin_viernes_mantenimiento', '', 'trim');

         $this->form_validation->set_rules('checkbox_domingo_mantenimiento', '', 'trim');
          $this->form_validation->set_rules('inicio_domingo_mantenimiento', '', 'trim');
         $this->form_validation->set_rules('fin_domingo_mantenimiento', '', 'trim');

         $this->form_validation->set_rules('inicio_mantenimiento', '', 'trim');
         $this->form_validation->set_rules('fin_mantenimiento', '', 'trim');

         $this->form_validation->set_rules('intervalo_mantenimiento', 'Intervalo de Mantenimiento del Acuerdo', 'callback_dropdown_intervalo_mantenimiento');

         $this->form_validation->set_rules('unidad_medida', 'Unidad de Medida', 'callback_dropdown_unidad_medida');

         $this->form_validation->set_rules('minimo_caida', 'Mínimo de Caídas', 'required|trim|integer');
         $this->form_validation->set_rules('maximo_caida', 'Máximo de Caídas', 'required|trim|integer');


         $this->form_validation->set_rules('unidad_tiempo1', 'Unidad de Tiempo', 'callback_dropdown_unidad_tiempo');
         $this->form_validation->set_rules('minimo_duracion_caida', 'Duración Mínima de Caídas', 'required|trim|integer');
         $this->form_validation->set_rules('maximo_duracion_caida', 'Duración Máxima de Caídas', 'required|trim|integer');

         $this->form_validation->set_rules('unidad_tiempo2', 'Unidad de Tiempo', 'callback_dropdown_unidad_tiempo2');
         $this->form_validation->set_rules('minimo_duracion_respuesta', 'Tiempo Mínimo de Respuesta', 'required|trim|integer');
         $this->form_validation->set_rules('maximo_duracion_respuesta', 'Tiempo Máximo de Respuesta', 'required|trim|integer');

         $this->form_validation->set_rules('minutos_confiabilidad', 'Minutos de Confiabilidad', 'required|trim|numeric');
         $this->form_validation->set_rules('minutos_fiabilidad', 'Minutos de Fiabilidad', 'required|trim|numeric');


         $this->form_validation->set_rules('tiempo_restauracion1', 'Unidad de Medida', 'callback_dropdown_unidad_tiempo_restauracion');
         $this->form_validation->set_rules('minimo_duracion_restauracion', 'Tiempo Mínimo de Restauración', 'required|trim|integer');
         $this->form_validation->set_rules('maximo_duracion_restauracion', 'Tiempo Máximo de Restauración', 'required|trim|integer');

         $this->form_validation->set_rules('soporte', 'Atención al Cliente', 'required|trim|max_length[65535]');

         $this->form_validation->set_rules('unidad_respuesta_critico', ' ', 'callback_dropdown_respuesta_critico');
         $this->form_validation->set_rules('unidad_respuesta_severo', ' ', 'callback_dropdown_respuesta_severo');
         $this->form_validation->set_rules('unidad_respuesta_medio', ' ', 'callback_dropdown_respuesta_medio');
         $this->form_validation->set_rules('unidad_respuesta_menor', ' ', 'callback_dropdown_respuesta_menor');
         $this->form_validation->set_rules('unidad_resolucion_critico', ' ', 'callback_dropdown_resolucion_critico');
         $this->form_validation->set_rules('unidad_resolucion_severo', ' ', 'callback_dropdown_resolucion_severo');
         $this->form_validation->set_rules('unidad_resolucion_medio', ' ', 'callback_dropdown_resolucion_medio');
         $this->form_validation->set_rules('unidad_resolucion_menor', ' ', 'callback_dropdown_resolucion_menor');

         $this->form_validation->set_rules('tiempo_respuesta_critico', ' ', 'required|trim|integer');
         $this->form_validation->set_rules('tiempo_respuesta_severo', ' ', 'required|trim|integer');
         $this->form_validation->set_rules('tiempo_respuesta_medio', ' ', 'required|trim|integer');
         $this->form_validation->set_rules('tiempo_respuesta_menor', ' ', 'required|trim|integer');
         $this->form_validation->set_rules('tiempo_resolucion_critico', ' ', 'required|trim|integer');
         $this->form_validation->set_rules('tiempo_resolucion_severo', ' ', 'required|trim|integer');
         $this->form_validation->set_rules('tiempo_resolucion_medio', ' ', 'required|trim|integer');
         $this->form_validation->set_rules('tiempo_resolucion_menor', ' ', 'required|trim|integer');

         $this->form_validation->set_rules('responsabilidades', 'Responsabilidades', 'required|trim|max_length[65535]');
         $this->form_validation->set_rules('contactos', 'Información de Contacto', 'required|trim|max_length[65535]');
         $this->form_validation->set_rules('costos', 'Costos y Penalidades', 'max_length[65535]');
         $this->form_validation->set_rules('glosario', 'Glosario', 'max_length[65535]');

         $this->form_validation->set_message('required', 'Campo Requerido');
         $this->form_validation->set_message('integer', 'Solo Números Enteros Permitidos');


		if ($this->form_validation->run($this) == FALSE)
            {

                $this->utils->template($this->list_sidebar_niveles(1),'niveles/ans/crear_acuerdo_de_NS',$data_view,'Niveles de Servicio','','two_level');
            }
  		else
            {
		        /*if( $this->input->post('condiciones_terminacion'))
		            	{
		            		$condiciones_terminacion = $this->input->post('condiciones_terminacion');
		            	}
		            	else
		            	{
		            		$condiciones_terminacion = NULL;
		            	}

		         if( $this->input->post('modificacion'))
		            	{
		            		$modificacion = $this->input->post('modificacion');
		            	}
		            	else
		            	{
		            		$modificacion = NULL;
		            	}
		        

            	
                $servicio = array(
                                'id_servicio' => $this->input->post('servicio'),
                                'gestor_servicio' => $this->input->post('gestor'),
                                'cliente' => $this->input->post('clientes'),

                                'fecha_inicio' => $this->input->post('fecha_inicio'),
                                'fecha_final' => $this->input->post('fecha_culminacion'),
                                'modo_revision' => $this->input->post('intervalo_revision'),

                                'objetivos_acuerdo' => $this->input->post('objetivos_acuerdo'), 
                                'alcance' =>  $this->input->post('alcance'), 
                                
                                'condiciones_terminacion' => $condiciones_terminacion,
                                'procedimiento_actualizacion' => $modificacion,

                                'procedimiento_solicitud' => $procedimiento,
                                'contacto' => $contacto,

                                'fecha_creacion_acuerdo' => date('Y-m-d H:i:s'),

                                );

            	
			       	$id_servicio = $this->general->insert('servicio',$servicio,'');

	            	if($id_servicio)
		            	{
		            		$this->session->set_flashdata('Success', 'El Nuevo Servicio ha sido Creado con Éxito');
		            		redirect(site_url('index.php/cargar_datos/servicios'));
		            	}
		            else
		            	{
		            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Crear el Nuevo Servicio');
		            		redirect(site_url('index.php/cargar_datos/servicios'));
		            	}

		       */

            }
	}


}


?>
	
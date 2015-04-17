<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acuerdos_ns extends MX_Controller
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
	
	private $title = 'Niveles de Servicio | Acuerdos de Niveles de Servicio';

	private function list_sidebar_niveles($index_active){
		$l =  array();



		$l[] = array(
			"chain" => "Inicio",
			"href" => site_url(''),
			"icon" => "fa fa-th"
		);

		$l[] = array(
			"chain" => "Principal GNS",
			"href" => site_url('index.php/niveles_de_servicio'),
			"icon" => "fa fa-th-list"
		);

		$l[] = array(
			"chain" => "Gestión de RNS",
			"href" => site_url('index.php/requisito_niveles_servicio/gestion_RNS'),
			"icon" => "fa fa-check-square-o"
		);

		$l[] = array(
			"chain" => "Gestión de ANS",
			"href" => site_url('index.php/niveles_de_servicio/gestion_ANS'),
			"icon" => "fa fa-file-text"
		);

		$l[] = array(
			"chain" => "Gestión de Revisiones",
			"href" => site_url('index.php/niveles_de_servicio/gestion_Revisiones'),
			"icon" => "fa fa-calendar"
		);

		$l[] = array(
			"chain" => "Gestión de Reportes",
			"href" => site_url('index.php/niveles_de_servicio/gestion_Reportes'),
			"icon" => "fa fa-bar-chart"
		);		

		return $l;
	}

	public function acuerdos_de_NS()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$data_view['servicios'] = $this->general->get_table('servicio');
		$data_view['acuerdos'] = $this->general->get_table('acuerdo_nivel_servicio');		
		$data_view['empleados'] = $this->general->get_table('personal');
		$this->utils->template($this->list_sidebar_niveles(1),'niveles/ans/acuerdos_de_NS',$data_view,'Niveles de Servicio | Acuerdos de Niveles de Servicio','','two_level');
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


		function dropdown_representante_cliente()
	{
		if ($this->input->post('representante_cliente') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_representante_cliente', 'Por favor seleccione al Representante del Cliente');
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

	function acuerdo_check()
	{
		if (($this->general->exist('acuerdo_nivel_servicio',array('nombre_acuerdo' => $this->input->post('nombre_acuerdo')))))
		{
			$this->form_validation->set_message('acuerdo_check', 'Este Nombre de Acuerdo ya existe en el Sistema');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}


	function numero_caidas_check()
	{
		if ($this->input->post('minimo_caida') && $this->input->post('maximo_caida'))
		{
			if ($this->input->post('minimo_caida') >= $this->input->post('maximo_caida'))
			{
				$this->form_validation->set_message('numero_caidas_check', 'El numero de Caídas Máximas No puede ser Menor o Igual al de Caídas Mínimas');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
	}


	function tiempo_respuesta_check()
	{
		if ($this->input->post('minimo_duracion_respuesta') && $this->input->post('maximo_duracion_respuesta'))
		{
			if ($this->input->post('minimo_duracion_respuesta') >= $this->input->post('maximo_duracion_respuesta'))
			{
				$this->form_validation->set_message('tiempo_respuesta_check', 'El numero de Tiempo Máximo No puede ser Menor o Igual al del Tiempo Mínimo');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
	}


	function duracion_caidas_check()
	{
		if ($this->input->post('minimo_duracion_caida') && $this->input->post('maximo_duracion_caida'))
		{
			if ($this->input->post('minimo_duracion_caida') >= $this->input->post('maximo_duracion_caida'))
			{
				$this->form_validation->set_message('duracion_caidas_check', 'El numero de Tiempo Máximo No puede ser Menor o Igual al del Tiempo Mínimo');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
	}


	function tiempo_restauracion_check()
	{
		if ($this->input->post('minimo_duracion_restauracion') && $this->input->post('maximo_duracion_restauracion'))
		{
			if ($this->input->post('minimo_duracion_restauracion') >= $this->input->post('maximo_duracion_restauracion'))
			{
				$this->form_validation->set_message('tiempo_restauracion_check', 'El numero de Tiempo Máximo No puede ser Menor o Igual al del Tiempo Mínimo');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
		}
	}

	function intervalos_revision_check()
	{
		if ($this->input->post('fecha_inicio') && $this->input->post('fecha_culminacion'))
		{

		     $fecha_inicio = $this->input->post('fecha_inicio'); 
		     $inicio = date_create($fecha_inicio);
		     $fecha_inicio = date_format($inicio,"Y-m-d");

		     $fecha_culminacion = $this->input->post('fecha_culminacion'); 
		      $fin = date_create($fecha_culminacion);
		     $fecha_culminacion = date_format($fin,"Y-m-d"); 


		     $fecha1 = new DateTime($fecha_inicio);
			 $fecha2 = new DateTime($fecha_culminacion);
			 $fecha = $fecha1->diff($fecha2);


			if ( ($this->input->post('intervalo_revision') == 'Mensual') && ((int)$fecha->m < 1) && ($fecha->y < 1) )
			{
				$this->form_validation->set_message('intervalos_revision_check', 'La duración del Acuerdo es Menor a Un Mes. Por Favor modifique la Duración del Acuerdo.');
				return FALSE;
			}


			else if ( ($this->input->post('intervalo_revision') == 'Trimestral') && ($fecha->m < 3) && ($fecha->y < 1) )
			{
				$this->form_validation->set_message('intervalos_revision_check', 'La duración del Acuerdo es Menor a Tres Meses. Por Favor modifique la Duración del Acuerdo o Elija un Intervalo de Revisión Menor.');
				return FALSE;
			}

			else if ( ($this->input->post('intervalo_revision') == 'Semestral') && ($fecha->m < 6) && ($fecha->y < 1) )
			{
				$this->form_validation->set_message('intervalos_revision_check', 'La duración del Acuerdo es Menor a Seis Meses. Por Favor modifique la Duración del Acuerdo o Elija un Intervalo de Revisión Menor.');
				return FALSE;
			}

			else if ( ($this->input->post('intervalo_revision') == 'Anual') && ($fecha->y < 1) )
			{
				$this->form_validation->set_message('intervalos_revision_check', 'La duración del Acuerdo es Menor a Un Año. Por Favor modifique la Duración del Acuerdo o Elija un Intervalo de Revisión Menor.');
				return FALSE;
			}

			else
			{
				return TRUE;
			}
		}
		else
			{
				return TRUE;
			}
	}




	/*
	* Comienzo de la Creacion de Acuerdos de Niveles de Servicio.
    */

	public function crear_acuerdos_de_NS()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$data_view['servicios'] = $this->general->get_table('servicio');
		$data_view['personal'] = $this->general->get_table('personal');
		$data_view['requisitos'] = $this->general->get_table('requisito_nivel_servicio');

	
		 $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));

		 $this->form_validation->set_rules('nombre_acuerdo', 'Nombre del Acuerdo', 'required|trim|max_length[255]|callback_acuerdo_check');
         $this->form_validation->set_rules('servicio', 'Nombre del Servicio', 'callback_dropdown_servicio');
         $this->form_validation->set_rules('gestor', 'Gestor de Niveles del Servicio', 'callback_dropdown_gestor');
         $this->form_validation->set_rules('clientes', 'Cliente(s)', 'required|trim|max_length[500]');
         $this->form_validation->set_rules('representante_cliente', 'Representante del Cliente', 'callback_dropdown_representante_cliente');

         

         $this->form_validation->set_rules('fecha_inicio', 'Fecha de Inicio', 'required|trim');
         $this->form_validation->set_rules('fecha_culminacion', 'Fecha de Culminación', 'required|trim');
         $this->form_validation->set_rules('intervalo_revision', 'Intervalo de Revisión del Acuerdo', 'callback_dropdown_intervalo_revision|callback_intervalos_revision_check');
         $this->form_validation->set_rules('objetivos_acuerdo', 'Objetivos del Acuerdo', 'required|trim|max_length[65535]');
         $this->form_validation->set_rules('alcance', 'Alcance y Exclusiones del Acuerdo', 'required|trim|max_length[65535]');
         $this->form_validation->set_rules('condiciones_terminacion', 'Condiciones de Terminación del Acuerdo', 'max_length[65535]');
         $this->form_validation->set_rules('modificacion', 'Procedimientos para Actualizar/Modificar el Acuerdo', 'max_length[65535]');

         
         $this->form_validation->set_rules('options_pregunta', '', 'trim');
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

         $this->form_validation->set_rules('porcentaje_disponibilidad', 'Porcentaje de Disponibilidad', 'required|numeric|greater_than[0]|less_than[101]');


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

          $this->form_validation->set_rules('complemento_disponibilidad', 'Complemento de Disponibilidad', 'max_length[65535]');

         $this->form_validation->set_rules('unidad_medida', 'Unidad de Medida', 'callback_dropdown_unidad_medida');

         $this->form_validation->set_rules('minimo_caida', 'Mínimo de Caídas', 'required|trim|integer');
         $this->form_validation->set_rules('maximo_caida', 'Máximo de Caídas', 'required|trim|integer|callback_numero_caidas_check');


         $this->form_validation->set_rules('unidad_tiempo1', 'Unidad de Tiempo', 'callback_dropdown_unidad_tiempo');
         $this->form_validation->set_rules('minimo_duracion_caida', 'Duración Mínima de Caídas', 'required|trim|integer');
         $this->form_validation->set_rules('maximo_duracion_caida', 'Duración Máxima de Caídas', 'required|trim|integer|callback_duracion_caidas_check');

         $this->form_validation->set_rules('unidad_tiempo2', 'Unidad de Tiempo', 'callback_dropdown_unidad_tiempo2');
         $this->form_validation->set_rules('minimo_duracion_respuesta', 'Tiempo Mínimo de Respuesta', 'required|trim|integer');
         $this->form_validation->set_rules('maximo_duracion_respuesta', 'Tiempo Máximo de Respuesta', 'required|trim|integer|callback_tiempo_respuesta_check');


         $this->form_validation->set_rules('tiempo_restauracion1', 'Unidad de Medida', 'callback_dropdown_unidad_tiempo_restauracion');
         $this->form_validation->set_rules('minimo_duracion_restauracion', 'Tiempo Mínimo de Restauración', 'required|trim|integer');
         $this->form_validation->set_rules('maximo_duracion_restauracion', 'Tiempo Máximo de Restauración', 'required|trim|integer|callback_tiempo_restauracion_check');

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

         $this->form_validation->set_message('less_than', 'El porcentaje debe ser Menor o Igual a Cien');
         $this->form_validation->set_message('greater_than', 'El porcentaje debe ser Mayor a Cero');

         $this->form_validation->set_message('required', 'Campo Requerido');
         $this->form_validation->set_message('integer', 'Solo Números Enteros Permitidos');


		if ($this->form_validation->run($this) == FALSE)
            {

                $this->utils->template($this->list_sidebar_niveles(1),'niveles/ans/crear_acuerdo_de_NS',$data_view,'Niveles de Servicio | Acuerdos de Niveles de Servicio','','two_level');
            }
  		else
            {
		        if( $this->input->post('condiciones_terminacion'))
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


		         $fecha_inicio = strtotime($this->input->post('fecha_inicio')); 
		         $fecha_inicio = date("Y-m-d", $fecha_inicio); 

		         $fecha_culminacion = strtotime($this->input->post('fecha_culminacion'));
		         $fecha_culminacion = date("Y-m-d", $fecha_culminacion); 


		        // Establecer fecha de revisión de acuerdo

		           if( $this->input->post('intervalo_revision') == 'Mensual' )
		            	{
		            		$date = $fecha_inicio;
							$newdate = strtotime ( '+1 month' , strtotime ( $date ) ) ;
							$fecha_revision = date ( 'Y-m-j' , $newdate );
		            		
		            	}

		           if( $this->input->post('intervalo_revision') == 'Trimestral' )
		            	{
		            		$date = $fecha_inicio;
							$newdate = strtotime ( '+3 month' , strtotime ( $date ) ) ;
							$fecha_revision = date ( 'Y-m-j' , $newdate );
		            		
		            	}

		           if( $this->input->post('intervalo_revision') == 'Semestral' )
		            	{
		            			$date = $fecha_inicio;
								$newdate = strtotime ( '+6 month' , strtotime ( $date ) ) ;
								$fecha_revision = date ( 'Y-m-j' , $newdate );
		            		
		            	}

		           if( $this->input->post('intervalo_revision') == 'Anual' )
		            	{
		            		$date = $fecha_inicio;
							$newdate = strtotime ( '+1 year' , strtotime ( $date ) ) ;
							$fecha_revision = date ( 'Y-m-j' , $newdate );	            		
		            	}	        
		       


		       //Calculo de minutos de disponibilidad 

		        if( $this->input->post('inicio_lunes') &&  $this->input->post('fin_lunes') )
		            	{
		            		
		            		$inicio_lunes = $this->input->post('inicio_lunes');
						    $inicio_lunes = strtotime($inicio_lunes);

							$inicio_lunes_horas = date("H", $inicio_lunes);
							$inicio_lunes_minutos = date("i", $inicio_lunes);
							$inicio_lunes_total = $inicio_lunes_horas*60;
							$inicio_lunes_total = $inicio_lunes_total + $inicio_lunes_minutos;

							$fin_lunes = $this->input->post('fin_lunes');
							$fin_lunes = strtotime($fin_lunes);

							$fin_lunes_horas = date("H", $fin_lunes);
							$fin_lunes_minutos = date("i", $fin_lunes);
							$fin_lunes_total = $fin_lunes_horas*60;
							$fin_lunes_total = $fin_lunes_total + $fin_lunes_minutos;

							$intervalo_lunes = $fin_lunes_total - $inicio_lunes_total;

							if( $this->input->post('inicio_lunes') == $this->input->post('fin_lunes'))
							{
								$intervalo_lunes = 1440;
							}
		            	}

		        if( $this->input->post('inicio_martes') &&  $this->input->post('fin_martes') )
		            	{
		            		
		            		$inicio_martes = $this->input->post('inicio_martes');
						    $inicio_martes = strtotime($inicio_martes);

							$inicio_martes_horas = date("H", $inicio_martes);
							$inicio_martes_minutos = date("i", $inicio_martes);
							$inicio_martes_total = $inicio_martes_horas*60;
							$inicio_martes_total = $inicio_martes_total + $inicio_martes_minutos;

							$fin_martes = $this->input->post('fin_martes');
							$fin_martes = strtotime($fin_martes);

							$fin_martes_horas = date("H", $fin_martes);
							$fin_martes_minutos = date("i", $fin_martes);
							$fin_martes_total = $fin_martes_horas*60;
							$fin_martes_total = $fin_martes_total + $fin_martes_minutos;

							$intervalo_martes = $fin_martes_total - $inicio_martes_total;

							if( $this->input->post('inicio_martes') == $this->input->post('fin_martes'))
							{
								$intervalo_martes = 1440;
							}
		            	}

		        if( $this->input->post('inicio_miercoles') &&  $this->input->post('fin_miercoles') )
		            	{
		            		
		            		$inicio_miercoles = $this->input->post('inicio_miercoles');
						    $inicio_miercoles = strtotime($inicio_miercoles);

							$inicio_miercoles_horas = date("H", $inicio_miercoles);
							$inicio_miercoles_minutos = date("i", $inicio_miercoles);
							$inicio_miercoles_total = $inicio_miercoles_horas*60;
							$inicio_miercoles_total = $inicio_miercoles_total + $inicio_miercoles_minutos;

							$fin_miercoles = $this->input->post('fin_miercoles');
							$fin_miercoles = strtotime($fin_miercoles);

							$fin_miercoles_horas = date("H", $fin_miercoles);
							$fin_miercoles_minutos = date("i", $fin_miercoles);
							$fin_miercoles_total = $fin_miercoles_horas*60;
							$fin_miercoles_total = $fin_miercoles_total + $fin_miercoles_minutos;

							$intervalo_miercoles = $fin_miercoles_total - $inicio_miercoles_total;

							if( $this->input->post('inicio_miercoles') == $this->input->post('fin_miercoles'))
							{
								$intervalo_miercoles = 1440;
							}
		            	}


		        if( $this->input->post('inicio_jueves') &&  $this->input->post('fin_jueves') )
		            	{
		            		
		            		$inicio_jueves = $this->input->post('inicio_jueves');
						    $inicio_jueves = strtotime($inicio_jueves);

							$inicio_jueves_horas = date("H", $inicio_jueves);
							$inicio_jueves_minutos = date("i", $inicio_jueves);
							$inicio_jueves_total = $inicio_jueves_horas*60;
							$inicio_jueves_total = $inicio_jueves_total + $inicio_jueves_minutos;

							$fin_jueves = $this->input->post('fin_jueves');
							$fin_jueves = strtotime($fin_jueves);

							$fin_jueves_horas = date("H", $fin_jueves);
							$fin_jueves_minutos = date("i", $fin_jueves);
							$fin_jueves_total = $fin_jueves_horas*60;
							$fin_jueves_total = $fin_jueves_total + $fin_jueves_minutos;

							$intervalo_jueves = $fin_jueves_total - $inicio_jueves_total;

							if( $this->input->post('inicio_jueves') == $this->input->post('fin_jueves'))
							{
								$intervalo_jueves = 1440;
							}
		            	}

		        if( $this->input->post('inicio_viernes') &&  $this->input->post('fin_viernes') )
		            	{
		            		
		            		$inicio_viernes = $this->input->post('inicio_viernes');
						    $inicio_viernes = strtotime($inicio_viernes);

							$inicio_viernes_horas = date("H", $inicio_viernes);
							$inicio_viernes_minutos = date("i", $inicio_viernes);
							$inicio_viernes_total = $inicio_viernes_horas*60;
							$inicio_viernes_total = $inicio_viernes_total + $inicio_viernes_minutos;

							$fin_viernes = $this->input->post('fin_viernes');
							$fin_viernes = strtotime($fin_viernes);

							$fin_viernes_horas = date("H", $fin_viernes);
							$fin_viernes_minutos = date("i", $fin_viernes);
							$fin_viernes_total = $fin_viernes_horas*60;
							$fin_viernes_total = $fin_viernes_total + $fin_viernes_minutos;

							$intervalo_viernes = $fin_viernes_total - $inicio_viernes_total;

							if( $this->input->post('inicio_viernes') == $this->input->post('fin_viernes'))
							{
								$intervalo_viernes = 1440;
							}
		            	}


		        if( $this->input->post('inicio_sabado') &&  $this->input->post('fin_sabado') )
		            	{
		            		
		            		$inicio_sabado = $this->input->post('inicio_sabado');
						    $inicio_sabado = strtotime($inicio_sabado);

							$inicio_sabado_horas = date("H", $inicio_sabado);
							$inicio_sabado_minutos = date("i", $inicio_sabado);
							$inicio_sabado_total = $inicio_sabado_horas*60;
							$inicio_sabado_total = $inicio_sabado_total + $inicio_sabado_minutos;

							$fin_sabado = $this->input->post('fin_sabado');
							$fin_sabado = strtotime($fin_sabado);

							$fin_sabado_horas = date("H", $fin_sabado);
							$fin_sabado_minutos = date("i", $fin_sabado);
							$fin_sabado_total = $fin_sabado_horas*60;
							$fin_sabado_total = $fin_sabado_total + $fin_sabado_minutos;

							$intervalo_sabado = $fin_sabado_total - $inicio_sabado_total;

							if( $this->input->post('inicio_sabado') == $this->input->post('fin_sabado'))
							{
								$intervalo_sabado = 1440;
							}
		            	}

		        if( $this->input->post('inicio_domingo') &&  $this->input->post('fin_domingo') )
		            	{
		            		
		            		$inicio_domingo = $this->input->post('inicio_domingo');
						    $inicio_domingo = strtotime($inicio_domingo);

							$inicio_domingo_horas = date("H", $inicio_domingo);
							$inicio_domingo_minutos = date("i", $inicio_domingo);
							$inicio_domingo_total = $inicio_domingo_horas*60;
							$inicio_domingo_total = $inicio_domingo_total + $inicio_domingo_minutos;

							$fin_domingo = $this->input->post('fin_domingo');
							$fin_domingo = strtotime($fin_domingo);

							$fin_domingo_horas = date("H", $fin_domingo);
							$fin_domingo_minutos = date("i", $fin_domingo);
							$fin_domingo_total = $fin_domingo_horas*60;
							$fin_domingo_total = $fin_domingo_total + $fin_domingo_minutos;

							$intervalo_domingo = $fin_domingo_total - $inicio_domingo_total;

							if( $this->input->post('inicio_domingo') == $this->input->post('fin_domingo'))
							{
								$intervalo_domingo = 1440;
							}
		            	}

		         
		         // Suma de todos los minutos de disponibilidad diario para obtener los minutos de disponibilidad semanal
		        
		         $minutos_disp_semanal = ($intervalo_lunes+$intervalo_martes+$intervalo_miercoles+$intervalo_jueves+$intervalo_viernes+$intervalo_sabado+$intervalo_domingo);

		         $minutos_disp_mensual  = $minutos_disp_semanal*4; 

		         $minutos_disp_anual  = $minutos_disp_mensual*12; 

		       //FIN de calculo de minutos de disponibilidad

		       // HORARIO DE DISPONIBILIDAD
		        if( $this->input->post('inicio_lunes'))
		            	{
		            		$inicio_lunes = $this->input->post('inicio_lunes');
		            		$inicio_lunes = strtotime($inicio_lunes);
							$inicio_lunes = date("H:i", $inicio_lunes);
		            	}
		            	else
		            	{
		            		$inicio_lunes = NULL;
		            	}

		        if( $this->input->post('fin_lunes'))
		            	{
		            		$fin_lunes = $this->input->post('fin_lunes');
		            		$fin_lunes = strtotime($fin_lunes);
							$fin_lunes = date("H:i", $fin_lunes);
		            	}
		            	else
		            	{
		            		$fin_lunes = NULL;
		            	}

		        
		        if( $this->input->post('inicio_martes'))
		            	{
		            		$inicio_martes = $this->input->post('inicio_martes');
		            		$inicio_martes = strtotime($inicio_martes);
							$inicio_martes = date("H:i", $inicio_martes);
		            	}
		            	else
		            	{
		            		$inicio_martes = NULL;
		            	}

		        if( $this->input->post('fin_martes'))
		            	{
		            		$fin_martes = $this->input->post('fin_martes');
		            		$fin_martes = strtotime($fin_martes);
							$fin_martes = date("H:i", $fin_martes);
		            	}
		            	else
		            	{
		            		$fin_martes = NULL;
		            	}



		        if( $this->input->post('inicio_miercoles'))
		            	{
		            		$inicio_miercoles = $this->input->post('inicio_miercoles');
		            		$inicio_miercoles = strtotime($inicio_miercoles);
							$inicio_miercoles = date("H:i", $inicio_miercoles);
		            	}
		            	else
		            	{
		            		$inicio_miercoles = NULL;
		            	}

		        if( $this->input->post('fin_miercoles'))
		            	{
		            		$fin_miercoles = $this->input->post('fin_miercoles');
		            		$fin_miercoles = strtotime($fin_miercoles);
							$fin_miercoles = date("H:i", $fin_miercoles);
		            	}
		            	else
		            	{
		            		$fin_miercoles = NULL;
		            	}

		         if( $this->input->post('inicio_jueves'))
		            	{
		            		$inicio_jueves = $this->input->post('inicio_jueves');
		            		$inicio_jueves = strtotime($inicio_jueves);
							$inicio_jueves = date("H:i", $inicio_jueves);
		            	}
		            	else
		            	{
		            		$inicio_jueves = NULL;
		            	}

		        if( $this->input->post('fin_jueves'))
		            	{
		            		$fin_jueves = $this->input->post('fin_jueves');
		            		$fin_jueves = strtotime($fin_jueves);
							$fin_jueves = date("H:i", $fin_jueves);
		            	}
		            	else
		            	{
		            		$fin_jueves = NULL;
		            	}
		        if( $this->input->post('inicio_viernes'))
		            	{
		            		$inicio_viernes = $this->input->post('inicio_viernes');
		            		$inicio_viernes = strtotime($inicio_viernes);
							$inicio_viernes = date("H:i", $inicio_viernes);
		            	}
		            	else
		            	{
		            		$inicio_viernes = NULL;
		            	}

		        if( $this->input->post('fin_viernes'))
		            	{
		            		$fin_viernes = $this->input->post('fin_viernes');
		            		$fin_viernes = strtotime($fin_viernes);
							$fin_viernes = date("H:i", $fin_viernes);
		            	}
		            	else
		            	{
		            		$fin_viernes = NULL;
		            	}
		         if( $this->input->post('inicio_sabado'))
		            	{
		            		$inicio_sabado = $this->input->post('inicio_sabado');
		            		$inicio_sabado = strtotime($inicio_sabado);
							$inicio_sabado = date("H:i", $inicio_sabado);
		            	}
		            	else
		            	{
		            		$inicio_sabado = NULL;
		            	}

		        if( $this->input->post('fin_sabado'))
		            	{
		            		$fin_sabado = $this->input->post('fin_sabado');
		            		$fin_sabado = strtotime($fin_sabado);
							$fin_sabado = date("H:i", $fin_sabado);
		            	}
		            	else
		            	{
		            		$fin_sabado = NULL;
		            	}
		         if( $this->input->post('inicio_domingo'))
		            	{
		            		$inicio_domingo = $this->input->post('inicio_domingo');
		            		$inicio_domingo = strtotime($inicio_domingo);
							$inicio_domingo = date("H:i", $inicio_domingo);
		            	}
		            	else
		            	{
		            		$inicio_domingo = NULL;
		            	}

		        if( $this->input->post('fin_domingo'))
		            	{
		            		$fin_domingo = $this->input->post('fin_domingo');
		            		$fin_domingo = strtotime($fin_domingo);
							$fin_domingo = date("H:i", $fin_domingo);
		            	}
		            	else
		            	{
		            		$fin_domingo = NULL;
		            	}
		        // FIN HORARIO DE DISPONIBILIDAD

		    


		        //Calculo de minutos de disponibilidad 

		        if( $this->input->post('inicio_lunes_mantenimiento') &&  $this->input->post('fin_lunes_mantenimiento') )
		            	{
		            		
		            		$inicio_lunes_mantenimiento = $this->input->post('inicio_lunes_mantenimiento');
						    $inicio_lunes_mantenimiento = strtotime($inicio_lunes_mantenimiento);

							$inicio_lunes_mantenimiento_horas = date("H", $inicio_lunes_mantenimiento);
							$inicio_lunes_mantenimiento_minutos = date("i", $inicio_lunes_mantenimiento);
							$inicio_lunes_mantenimiento_total = $inicio_lunes_mantenimiento_horas*60;
							$inicio_lunes_mantenimiento_total = $inicio_lunes_mantenimiento_total + $inicio_lunes_mantenimiento_minutos;

							$fin_lunes_mantenimiento = $this->input->post('fin_lunes_mantenimiento');
							$fin_lunes_mantenimiento = strtotime($fin_lunes_mantenimiento);

							$fin_lunes_mantenimiento_horas = date("H", $fin_lunes_mantenimiento);
							$fin_lunes_mantenimiento_minutos = date("i", $fin_lunes_mantenimiento);
							$fin_lunes_mantenimiento_total = $fin_lunes_mantenimiento_horas*60;
							$fin_lunes_mantenimiento_total = $fin_lunes_mantenimiento_total + $fin_lunes_mantenimiento_minutos;

							$intervalo_lunes_mantenimiento = $fin_lunes_mantenimiento_total - $inicio_lunes_mantenimiento_total;

							if( $this->input->post('inicio_lunes_mantenimiento') == $this->input->post('fin_lunes_mantenimiento'))
							{
								$intervalo_lunes_mantenimiento = 1440;
							}
		            	}

		        if( $this->input->post('inicio_martes_mantenimiento') &&  $this->input->post('fin_martes_mantenimiento') )
		            	{
		            		
		            		$inicio_martes_mantenimiento = $this->input->post('inicio_martes_mantenimiento');
						    $inicio_martes_mantenimiento = strtotime($inicio_martes_mantenimiento);

							$inicio_martes_mantenimiento_horas = date("H", $inicio_martes_mantenimiento);
							$inicio_martes_mantenimiento_minutos = date("i", $inicio_martes_mantenimiento);
							$inicio_martes_mantenimiento_total = $inicio_martes_mantenimiento_horas*60;
							$inicio_martes_mantenimiento_total = $inicio_martes_mantenimiento_total + $inicio_martes_mantenimiento_minutos;

							$fin_martes_mantenimiento = $this->input->post('fin_martes_mantenimiento');
							$fin_martes_mantenimiento = strtotime($fin_martes_mantenimiento);

							$fin_martes_mantenimiento_horas = date("H", $fin_martes_mantenimiento);
							$fin_martes_mantenimiento_minutos = date("i", $fin_martes_mantenimiento);
							$fin_martes_mantenimiento_total = $fin_martes_mantenimiento_horas*60;
							$fin_martes_mantenimiento_total = $fin_martes_mantenimiento_total + $fin_martes_mantenimiento_minutos;

							$intervalo_martes_mantenimiento = $fin_martes_mantenimiento_total - $inicio_martes_mantenimiento_total;

							if( $this->input->post('inicio_martes_mantenimiento') == $this->input->post('fin_martes_mantenimiento'))
							{
								$intervalo_martes_mantenimiento = 1440;
							}
		            	}

		        if( $this->input->post('inicio_miercoles_mantenimiento') &&  $this->input->post('fin_miercoles_mantenimiento') )
		            	{
		            		
		            		$inicio_miercoles_mantenimiento = $this->input->post('inicio_miercoles_mantenimiento');
						    $inicio_miercoles_mantenimiento = strtotime($inicio_miercoles_mantenimiento);

							$inicio_miercoles_mantenimiento_horas = date("H", $inicio_miercoles_mantenimiento);
							$inicio_miercoles_mantenimiento_minutos = date("i", $inicio_miercoles_mantenimiento);
							$inicio_miercoles_mantenimiento_total = $inicio_miercoles_mantenimiento_horas*60;
							$inicio_miercoles_mantenimiento_total = $inicio_miercoles_mantenimiento_total + $inicio_miercoles_mantenimiento_minutos;

							$fin_miercoles_mantenimiento = $this->input->post('fin_miercoles_mantenimiento');
							$fin_miercoles_mantenimiento = strtotime($fin_miercoles_mantenimiento);

							$fin_miercoles_mantenimiento_horas = date("H", $fin_miercoles_mantenimiento);
							$fin_miercoles_mantenimiento_minutos = date("i", $fin_miercoles_mantenimiento);
							$fin_miercoles_mantenimiento_total = $fin_miercoles_mantenimiento_horas*60;
							$fin_miercoles_mantenimiento_total = $fin_miercoles_mantenimiento_total + $fin_miercoles_mantenimiento_minutos;

							$intervalo_miercoles_mantenimiento = $fin_miercoles_mantenimiento_total - $inicio_miercoles_mantenimiento_total;

							if( $this->input->post('inicio_miercoles_mantenimiento') == $this->input->post('fin_miercoles_mantenimiento'))
							{
								$intervalo_miercoles_mantenimiento = 1440;
							}
		            	}


		        if( $this->input->post('inicio_jueves_mantenimiento') &&  $this->input->post('fin_jueves_mantenimiento') )
		            	{
		            		
		            		$inicio_jueves_mantenimiento = $this->input->post('inicio_jueves_mantenimiento');
						    $inicio_jueves_mantenimiento = strtotime($inicio_jueves_mantenimiento);

							$inicio_jueves_mantenimiento_horas = date("H", $inicio_jueves_mantenimiento);
							$inicio_jueves_mantenimiento_minutos = date("i", $inicio_jueves_mantenimiento);
							$inicio_jueves_mantenimiento_total = $inicio_jueves_mantenimiento_horas*60;
							$inicio_jueves_mantenimiento_total = $inicio_jueves_mantenimiento_total + $inicio_jueves_mantenimiento_minutos;

							$fin_jueves_mantenimiento = $this->input->post('fin_jueves_mantenimiento');
							$fin_jueves_mantenimiento = strtotime($fin_jueves_mantenimiento);

							$fin_jueves_mantenimiento_horas = date("H", $fin_jueves_mantenimiento);
							$fin_jueves_mantenimiento_minutos = date("i", $fin_jueves_mantenimiento);
							$fin_jueves_mantenimiento_total = $fin_jueves_mantenimiento_horas*60;
							$fin_jueves_mantenimiento_total = $fin_jueves_mantenimiento_total + $fin_jueves_mantenimiento_minutos;

							$intervalo_jueves_mantenimiento = $fin_jueves_mantenimiento_total - $inicio_jueves_mantenimiento_total;

							if( $this->input->post('inicio_jueves_mantenimiento') == $this->input->post('fin_jueves_mantenimiento'))
							{
								$intervalo_jueves_mantenimiento = 1440;
							}
		            	}

		        if( $this->input->post('inicio_viernes_mantenimiento') &&  $this->input->post('fin_viernes_mantenimiento') )
		            	{
		            		
		            		$inicio_viernes_mantenimiento = $this->input->post('inicio_viernes_mantenimiento');
						    $inicio_viernes_mantenimiento = strtotime($inicio_viernes_mantenimiento);

							$inicio_viernes_mantenimiento_horas = date("H", $inicio_viernes_mantenimiento);
							$inicio_viernes_mantenimiento_minutos = date("i", $inicio_viernes_mantenimiento);
							$inicio_viernes_mantenimiento_total = $inicio_viernes_mantenimiento_horas*60;
							$inicio_viernes_mantenimiento_total = $inicio_viernes_mantenimiento_total + $inicio_viernes_mantenimiento_minutos;

							$fin_viernes_mantenimiento = $this->input->post('fin_viernes_mantenimiento');
							$fin_viernes_mantenimiento = strtotime($fin_viernes_mantenimiento);

							$fin_viernes_mantenimiento_horas = date("H", $fin_viernes_mantenimiento);
							$fin_viernes_mantenimiento_minutos = date("i", $fin_viernes_mantenimiento);
							$fin_viernes_mantenimiento_total = $fin_viernes_mantenimiento_horas*60;
							$fin_viernes_mantenimiento_total = $fin_viernes_mantenimiento_total + $fin_viernes_mantenimiento_minutos;

							$intervalo_viernes_mantenimiento = $fin_viernes_mantenimiento_total - $inicio_viernes_mantenimiento_total;

							if( $this->input->post('inicio_viernes_mantenimiento') == $this->input->post('fin_viernes_mantenimiento'))
							{
								$intervalo_viernes_mantenimiento = 1440;
							}
		            	}


		        if( $this->input->post('inicio_sabado_mantenimiento') &&  $this->input->post('fin_sabado_mantenimiento') )
		            	{
		            		
		            		$inicio_sabado_mantenimiento = $this->input->post('inicio_sabado_mantenimiento');
						    $inicio_sabado_mantenimiento = strtotime($inicio_sabado_mantenimiento);

							$inicio_sabado_mantenimiento_horas = date("H", $inicio_sabado_mantenimiento);
							$inicio_sabado_mantenimiento_minutos = date("i", $inicio_sabado_mantenimiento);
							$inicio_sabado_mantenimiento_total = $inicio_sabado_mantenimiento_horas*60;
							$inicio_sabado_mantenimiento_total = $inicio_sabado_mantenimiento_total + $inicio_sabado_mantenimiento_minutos;

							$fin_sabado_mantenimiento = $this->input->post('fin_sabado_mantenimiento');
							$fin_sabado_mantenimiento = strtotime($fin_sabado_mantenimiento);

							$fin_sabado_mantenimiento_horas = date("H", $fin_sabado_mantenimiento);
							$fin_sabado_mantenimiento_minutos = date("i", $fin_sabado_mantenimiento);
							$fin_sabado_mantenimiento_total = $fin_sabado_mantenimiento_horas*60;
							$fin_sabado_mantenimiento_total = $fin_sabado_mantenimiento_total + $fin_sabado_mantenimiento_minutos;

							$intervalo_sabado_mantenimiento = $fin_sabado_mantenimiento_total - $inicio_sabado_mantenimiento_total;

							if( $this->input->post('inicio_sabado_mantenimiento') == $this->input->post('fin_sabado_mantenimiento'))
							{
								$intervalo_sabado_mantenimiento = 1440;
							}
		            	}

		        if( $this->input->post('inicio_domingo_mantenimiento') &&  $this->input->post('fin_domingo_mantenimiento') )
		            	{
		            		
		            		$inicio_domingo_mantenimiento = $this->input->post('inicio_domingo_mantenimiento');
						    $inicio_domingo_mantenimiento = strtotime($inicio_domingo_mantenimiento);

							$inicio_domingo_mantenimiento_horas = date("H", $inicio_domingo_mantenimiento);
							$inicio_domingo_mantenimiento_minutos = date("i", $inicio_domingo_mantenimiento);
							$inicio_domingo_mantenimiento_total = $inicio_domingo_mantenimiento_horas*60;
							$inicio_domingo_mantenimiento_total = $inicio_domingo_mantenimiento_total + $inicio_domingo_mantenimiento_minutos;

							$fin_domingo_mantenimiento = $this->input->post('fin_domingo_mantenimiento');
							$fin_domingo_mantenimiento = strtotime($fin_domingo_mantenimiento);

							$fin_domingo_mantenimiento_horas = date("H", $fin_domingo_mantenimiento);
							$fin_domingo_mantenimiento_minutos = date("i", $fin_domingo_mantenimiento);
							$fin_domingo_mantenimiento_total = $fin_domingo_mantenimiento_horas*60;
							$fin_domingo_mantenimiento_total = $fin_domingo_mantenimiento_total + $fin_domingo_mantenimiento_minutos;

							$intervalo_domingo_mantenimiento = $fin_domingo_mantenimiento_total - $inicio_domingo_mantenimiento_total;

							if( $this->input->post('inicio_domingo_mantenimiento') == $this->input->post('fin_domingo_mantenimiento'))
							{
								$intervalo_domingo_mantenimiento = 1440;
							}
		            	}

		         
		         // Suma de todos los minutos de disponibilidad diario para obtener los minutos de disponibilidad semanal
		        
		         $minutos_mant_semanal = ($intervalo_lunes_mantenimiento+$intervalo_martes_mantenimiento+$intervalo_miercoles_mantenimiento+$intervalo_jueves_mantenimiento+$intervalo_viernes_mantenimiento+$intervalo_sabado_mantenimiento+$intervalo_domingo_mantenimiento);

		         $minutos_mant_mensual  = $minutos_mant_semanal*$this->input->post('intervalo_mantenimiento'); 

		         $minutos_mant_anual  = $minutos_mant_mensual*12; 

		       //FIN de calculo de minutos de disponibilidad


		       // HORARIO DE MANTENIMIENTO 
		        if( $this->input->post('inicio_lunes_mantenimiento'))
		            	{
		            		$inicio_lunes_mantenimiento = $this->input->post('inicio_lunes_mantenimiento');
		            		$inicio_lunes_mantenimiento = strtotime($inicio_lunes_mantenimiento);
							$inicio_lunes_mantenimiento = date("H:i", $inicio_lunes_mantenimiento);
		            	}
		            	else
		            	{
		            		$inicio_lunes_mantenimiento = NULL;
		            	}

		        if( $this->input->post('fin_lunes_mantenimiento'))
		            	{
		            		$fin_lunes_mantenimiento = $this->input->post('fin_lunes_mantenimiento');
		            		$fin_lunes_mantenimiento = strtotime($fin_lunes_mantenimiento);
							$fin_lunes_mantenimiento = date("H:i", $fin_lunes_mantenimiento);
		            	}
		            	else
		            	{
		            		$fin_lunes_mantenimiento = NULL;
		            	}

		        if( $this->input->post('inicio_martes_mantenimiento'))
		            	{
		            		$inicio_martes_mantenimiento = $this->input->post('inicio_martes_mantenimiento');
		            		$inicio_martes_mantenimiento = strtotime($inicio_martes_mantenimiento);
							$inicio_martes_mantenimiento = date("H:i", $inicio_martes_mantenimiento);
		            	}
		            	else
		            	{
		            		$inicio_martes_mantenimiento = NULL;
		            	}

		        if( $this->input->post('fin_martes_mantenimiento'))
		            	{
		            		$fin_martes_mantenimiento = $this->input->post('fin_martes_mantenimiento');
		            		$fin_martes_mantenimiento = strtotime($fin_martes_mantenimiento);
							$fin_martes_mantenimiento = date("H:i", $fin_martes_mantenimiento);
		            	}
		            	else
		            	{
		            		$fin_martes_mantenimiento = NULL;
		            	}
		        if( $this->input->post('inicio_miercoles_mantenimiento'))
		            	{
		            		$inicio_miercoles_mantenimiento = $this->input->post('inicio_miercoles_mantenimiento');
		            		$inicio_miercoles_mantenimiento = strtotime($inicio_miercoles_mantenimiento);
							$inicio_miercoles_mantenimiento = date("H:i", $inicio_miercoles_mantenimiento);
		            	}
		            	else
		            	{
		            		$inicio_miercoles_mantenimiento = NULL;
		            	}

		        if( $this->input->post('fin_miercoles_mantenimiento'))
		            	{
		            		$fin_miercoles_mantenimiento = $this->input->post('fin_miercoles_mantenimiento');
		            		$fin_miercoles_mantenimiento = strtotime($fin_miercoles_mantenimiento);
							$fin_miercoles_mantenimiento = date("H:i", $fin_miercoles_mantenimiento);
		            	}
		            	else
		            	{
		            		$fin_miercoles_mantenimiento = NULL;
		            	}

		         if( $this->input->post('inicio_jueves_mantenimiento'))
		            	{
		            		$inicio_jueves_mantenimiento = $this->input->post('inicio_jueves_mantenimiento');
		            		$inicio_jueves_mantenimiento = strtotime($inicio_jueves_mantenimiento);
							$inicio_jueves_mantenimiento = date("H:i", $inicio_jueves_mantenimiento);
		            	}
		            	else
		            	{
		            		$inicio_jueves_mantenimiento = NULL;
		            	}

		        if( $this->input->post('fin_jueves_mantenimiento'))
		            	{
		            		$fin_jueves_mantenimiento = $this->input->post('fin_jueves_mantenimiento');
		            		$fin_jueves_mantenimiento = strtotime($fin_jueves_mantenimiento);
							$fin_jueves_mantenimiento = date("H:i", $fin_jueves_mantenimiento);
		            	}
		            	else
		            	{
		            		$fin_jueves_mantenimiento = NULL;
		            	}
		        if( $this->input->post('inicio_viernes_mantenimiento'))
		            	{
		            		$inicio_viernes_mantenimiento = $this->input->post('inicio_viernes_mantenimiento');
		            		$inicio_viernes_mantenimiento = strtotime($inicio_viernes_mantenimiento);
							$inicio_viernes_mantenimiento = date("H:i", $inicio_viernes_mantenimiento);
		            	}
		            	else
		            	{
		            		$inicio_viernes_mantenimiento = NULL;
		            	}

		        if( $this->input->post('fin_viernes_mantenimiento'))
		            	{
		            		$fin_viernes_mantenimiento = $this->input->post('fin_viernes_mantenimiento');
		            		$fin_viernes_mantenimiento = strtotime($fin_viernes_mantenimiento);
							$fin_viernes_mantenimiento = date("H:i", $fin_viernes_mantenimiento);
		            	}
		            	else
		            	{
		            		$fin_viernes_mantenimiento = NULL;
		            	}
		         if( $this->input->post('inicio_sabado_mantenimiento'))
		            	{
		            		$inicio_sabado_mantenimiento = $this->input->post('inicio_sabado_mantenimiento');
		            		$inicio_sabado_mantenimiento = strtotime($inicio_sabado_mantenimiento);
							$inicio_sabado_mantenimiento = date("H:i", $inicio_sabado_mantenimiento);
		            	}
		            	else
		            	{
		            		$inicio_sabado_mantenimiento = NULL;
		            	}

		        if( $this->input->post('fin_sabado_mantenimiento'))
		            	{
		            		$fin_sabado_mantenimiento = $this->input->post('fin_sabado_mantenimiento');
		            		$fin_sabado_mantenimiento = strtotime($fin_sabado_mantenimiento);
							$fin_sabado_mantenimiento = date("H:i", $fin_sabado_mantenimiento);
		            	}
		            	else
		            	{
		            		$fin_sabado_mantenimiento = NULL;
		            	}
		         if( $this->input->post('inicio_domingo_mantenimiento'))
		            	{
		            		$inicio_domingo_mantenimiento = $this->input->post('inicio_domingo_mantenimiento');
		            		$inicio_domingo_mantenimiento = strtotime($inicio_domingo_mantenimiento);
							$inicio_domingo_mantenimiento = date("H:i", $inicio_domingo_mantenimiento);
		            	}
		            	else
		            	{
		            		$inicio_domingo_mantenimiento = NULL;
		            	}

		        if( $this->input->post('fin_domingo_mantenimiento'))
		            	{
		            		$fin_domingo_mantenimiento = $this->input->post('fin_domingo_mantenimiento');
		            		$fin_domingo_mantenimiento = strtotime($fin_domingo_mantenimiento);
							$fin_domingo_mantenimiento = date("H:i", $fin_domingo_mantenimiento);
		            	}
		            	else
		            	{
		            		$fin_domingo_mantenimiento = NULL;
		            	}
		        // FIN HORARIO DE MANTENIMIENTO 




		        if( $this->input->post('costos'))
		            	{
		            		$costos = $this->input->post('costos');
		            	}
		            	else
		            	{
		            		$costos = NULL;
		            	}

		         if( $this->input->post('glosario'))
		            	{
		            		$glosario = $this->input->post('glosario');
		            	}
		            	else
		            	{
		            		$glosario = NULL;
		            	}

		      
            	
                $acuerdo = array(
                				'nombre_acuerdo'=>$this->input->post('nombre_acuerdo'),
                                'id_servicio' => $this->input->post('servicio'),
                                'gestor_servicio' => $this->input->post('gestor'),
                                'cliente' => $this->input->post('clientes'),
                                'representante_cliente' => $this->input->post('representante_cliente'),

                                'fecha_inicio' =>  $fecha_inicio,
                                'fecha_final' =>  $fecha_culminacion,
                                'modo_revision' => $this->input->post('intervalo_revision'),

                                'objetivos_acuerdo' => $this->input->post('objetivos_acuerdo'), 
                                'alcance' =>  $this->input->post('alcance'), 
                                
                                'condiciones_terminacion' => $condiciones_terminacion,
                                'procedimiento_actualizacion' => $modificacion,

                              

                                'fecha_creacion_acuerdo' => date('Y-m-d H:i:s'),

                                'fecha_revision' => $fecha_revision,

                                'lunes_disp_ini' => $inicio_lunes,
								'lunes_disp_fin' => $fin_lunes ,
								'martes_disp_ini' => $inicio_martes,
								'martes_disp_fin' => $fin_martes ,
								'miercoles_disp_ini' => $inicio_miercoles,
								'miercoles_disp_fin' => $fin_miercoles ,
								'jueves_disp_ini' => $inicio_jueves,
								'jueves_disp_fin' => $fin_jueves ,
								'viernes_disp_ini' => $inicio_viernes,
								'viernes_disp_fin' => $fin_viernes ,
								'sabado_disp_ini' => $inicio_sabado,
								'sabado_disp_fin' => $fin_sabado ,
								'domingo_disp_ini' => $inicio_domingo,
								'domingo_disp_fin' => $fin_domingo ,

								'minutos_disp_semanal' => $minutos_disp_semanal,
								'minutos_disp_mensual' => $minutos_disp_mensual,
								'minutos_disp_anual' => $minutos_disp_anual,

								'porcentaje_disp' => $this->input->post('porcentaje_disponibilidad'),

								'lunes_mant_ini' => $inicio_lunes_mantenimiento,
								'lunes_mant_fin' => $fin_lunes_mantenimiento ,
								'martes_mant_ini' => $inicio_martes_mantenimiento,
								'martes_mant_fin' => $fin_martes_mantenimiento ,
								'miercoles_mant_ini' => $inicio_miercoles_mantenimiento,
								'miercoles_mant_fin' => $fin_miercoles_mantenimiento ,
								'jueves_mant_ini' => $inicio_jueves_mantenimiento,
								'jueves_mant_fin' => $fin_jueves_mantenimiento ,
								'viernes_mant_ini' => $inicio_viernes_mantenimiento,
								'viernes_mant_fin' => $fin_viernes_mantenimiento ,
								'sabado_mant_ini' => $inicio_sabado_mantenimiento,
								'sabado_mant_fin' => $fin_sabado_mantenimiento ,
								'domingo_mant_ini' => $inicio_domingo_mantenimiento,
								'domingo_mant_fin' => $fin_domingo_mantenimiento ,

								'minutos_mant_semanal' => $minutos_mant_semanal,
								'minutos_mant_mensual' => $minutos_mant_mensual,
								'minutos_mant_anual' => $minutos_mant_anual,

								'pregunta_mant' => $this->input->post('options_pregunta'),
								'modalidad_mantenimiento' => $this->input->post('intervalo_mantenimiento'),

								'complemento_disponibilidad' => $this->input->post('complemento_disponibilidad'),

								'unidad_num_caidas' => $this->input->post('unidad_medida'),
								'minimo_num_caidas' => $this->input->post('minimo_caida'),
								'maximo_num_caidas' => $this->input->post('maximo_caida'),

								'unidad_duracion_caidas' => $this->input->post('unidad_tiempo1'),
								'minimo_duracion_caidas' => $this->input->post('minimo_duracion_caida'),
								'maximo_duracion_caidas' => $this->input->post('maximo_duracion_caida'),

								'unidad_tiempo_respuesta' => $this->input->post('unidad_tiempo2'),
								'minimo_tiempo_respuesta' => $this->input->post('minimo_duracion_respuesta'),
								'maximo_tiempo_respuesta' => $this->input->post('maximo_duracion_respuesta'),

								'unidad_tiempo_restauracion' => $this->input->post('tiempo_restauracion1'),
								'minimo_tiempo_restauracion' => $this->input->post('minimo_duracion_restauracion'),
								'maximo_tiempo_restauracion' => $this->input->post('maximo_duracion_restauracion'),


								'soporte_tecnico' => $this->input->post('soporte'),

								'tiempo_respuesta_critico' => $this->input->post('tiempo_respuesta_critico'),
								'unidad_respuesta_critico' => $this->input->post('unidad_respuesta_critico'),
								'tiempo_respuesta_severo' => $this->input->post('tiempo_respuesta_severo'),
								'unidad_respuesta_severo' => $this->input->post('unidad_respuesta_severo'),
								'tiempo_respuesta_medio' => $this->input->post('tiempo_respuesta_medio'),
								'unidad_respuesta_medio' => $this->input->post('unidad_respuesta_medio'),
								'tiempo_respuesta_menor' => $this->input->post('tiempo_respuesta_menor'),
								'unidad_respuesta_menor' => $this->input->post('unidad_respuesta_menor'),

								'tiempo_resolucion_critico' => $this->input->post('tiempo_resolucion_critico'),
								'unidad_resolucion_critico' => $this->input->post('unidad_resolucion_critico'),
								'tiempo_resolucion_severo' => $this->input->post('tiempo_resolucion_severo'),
								'unidad_resolucion_severo' => $this->input->post('unidad_resolucion_severo'),
								'tiempo_resolucion_medio' => $this->input->post('tiempo_resolucion_medio'),
								'unidad_resolucion_medio' => $this->input->post('unidad_resolucion_medio'),
								'tiempo_resolucion_menor' => $this->input->post('tiempo_resolucion_menor'),
								'unidad_resolucion_menor' => $this->input->post('unidad_resolucion_menor'),

								'responsabilidades' => $this->input->post('responsabilidades'),
								'contactos' => $this->input->post('contactos'),
								'cobros' => $cobros,
								'glosario' => $glosario,

                                );

            	
			       	$id_acuerdo = $this->general->insert('acuerdo_nivel_servicio',$acuerdo,'');

	            	if($id_acuerdo)
		            	{


		            		//Crear pdf
		            		//$ruta = $this->generar_pdf_acuerdo($id_acuerdo);

								$acuerdo = array(
                                'ruta_pdf' => $ruta,

                                );
                                $this->general->update2('acuerdo_nivel_servicio',$acuerdo,array('acuerdo_nivel_id'=>$id_acuerdo));



                            //Crear eventos

                                //Eventos de Revision

                                if( $this->input->post('intervalo_revision') == 'Mensual' )
								   	{
								   		$operacion_fecha = '+1 month';		            		
								    }

								if( $this->input->post('intervalo_revision') == 'Trimestral' )
								    {
								        $operacion_fecha = '+3 month';			            		
								    }

								if( $this->input->post('intervalo_revision') == 'Semestral' )
								    {
								        $operacion_fecha = '+6 month';				            		
								    }

								if( $this->input->post('intervalo_revision') == 'Anual' )
								    {
								        $operacion_fecha = '+1 year';	           		
								    }

								 $fecha_inicio2 = strtotime($this->input->post('fecha_inicio')); 
						         $fecha_inicio2 = date("Y-m-d 00:00:00", $fecha_inicio2); 

						         $fecha_fin2 = strtotime($this->input->post('fecha_culminacion'));
						         $fecha_fin2 = date("Y-m-d 00:00:00", $fecha_fin2); 
				
							     $date = $fecha_inicio2;
								 $newdate = strtotime ( $operacion_fecha, strtotime ( $date ) ) ;
								 $fecha_revision = date ( 'Y-m-d' , $newdate );

								 $dia = date ( 'N' , $newdate );

								 while ($fecha_revision <= $fecha_fin2)
										{

											  $fecha_anterior = $fecha_revision;

											  // Si no es viernes resta días hasta llegar al próximo viernes
											  while ($dia != '5')
											  {
											  	$newdate = strtotime ( '-1 day' , strtotime ( $fecha_revision ) ) ;
											  	$fecha_revision = date ( 'Y-m-d' , $newdate );
											  	$dia = date ( 'N' , $newdate );
											  }

											  // Creando el Evento 
											  $evento = array(

							            					'nombre_evento' => 'Revision del ANS: '.$this->input->post('nombre_acuerdo'),
							            					'tipo_evento' => 'revision_ANS',
							            					'lugar_evento' => '',
							            					'inicio' => $fecha_revision,
							            					'fin' => $fecha_revision,
							            					'descripcion_evento' => 'Revision del ANS: '.$this->input->post('nombre_acuerdo'),
							                               );

										       $id_evento = $this->general->insert('evento_gns',$evento,''); 

										       //Relacionando Evento con el Acuerdo
										            			
										        $evento_ANS = array(
											                'id_evento' => $id_evento,
											                'acuerdo_nivel_id' => $id_acuerdo,  
											                 );

												$id_evento_ANS = $this->general->insert('evento_ans',$evento_ANS,'');


												//Agregar asistentes a evento: Representate de Clientes y Gestor de Niveles de Servicio
												$asistentes = array(
									                                'id_evento' => $id_evento,
									                                'id_personal' => $this->input->post('representante_cliente'),  
									                                );

									            $this->general->insert('asistente_evento',$asistentes,'');

									            $asistentes = array(
									                                'id_evento' => $id_evento,
									                                'id_personal' => $this->input->post('gestor'),  
									                                );

									            $this->general->insert('asistente_evento',$asistentes,'');


												//Nueva fecha de Revision
												$newdate = strtotime ( $operacion_fecha , strtotime ( $fecha_anterior ) ) ;
												$fecha_revision = date ( 'Y-m-d' , $newdate );

												$dia = date ( 'N' , $newdate );

										}

	  								//FIN Eventos de Revision


								// Evento de Vencimiento

											// Creando el Evento 
											  $evento = array(

							            					'nombre_evento' => 'Vencimiento del ANS: '.$this->input->post('nombre_acuerdo'),
							            					'tipo_evento' => 'vencimiento_ANS',
							            					'lugar_evento' => '',
							            					'inicio' => $fecha_fin2,
							            					'fin' => $fecha_fin2,
							            					'descripcion_evento' => 'Vencimiento: '.$this->input->post('nombre_acuerdo'),
							                               );

										       $id_evento = $this->general->insert('evento_gns',$evento,''); 

										       //Relacionando Evento con el Acuerdo
										            			
										        $evento_ANS = array(
											                'id_evento' => $id_evento,
											                'acuerdo_nivel_id' => $id_acuerdo,  
											                 );

												$id_evento_ANS = $this->general->insert('evento_ans',$evento_ANS,'');


												//Agregar asistentes a evento: Representate de Clientes y Gestor de Niveles de Servicio
												$asistentes = array(
									                                'id_evento' => $id_evento,
									                                'id_personal' => $this->input->post('representante_cliente'),  
									                                );

									            $this->general->insert('asistente_evento',$asistentes,'');

									            $asistentes = array(
									                                'id_evento' => $id_evento,
									                                'id_personal' => $this->input->post('gestor'),  
									                                );

									            $this->general->insert('asistente_evento',$asistentes,'');

							    // FIN Evento de Vencimiento



								$date = $fecha_fin2;
								$newdate = strtotime ( '-15 day', strtotime ( $date ) ) ;
								$fecha_recordatorio = date ( 'Y-m-d 00:00:00' , $newdate );

								$dia = date ( 'N' , $newdate );

								while ($dia != '1')
											  {
											  	$newdate = strtotime ( '-1 day' , strtotime ( $fecha_recordatorio ) ) ;
											  	$fecha_recordatorio = date ( 'Y-m-d 00:00:00' , $newdate );
											  	$dia = date ( 'N' , $newdate );
											  }




								// Evento de Alerta de Vencimiento y Renovacion

													// Creando el Evento 
													  $evento = array(

									            					'nombre_evento' => 'Recordatorio de Vencimiento y Renovación del ANS: '.$this->input->post('nombre_acuerdo'),
									            					'tipo_evento' => 'recordatorio_ANS',
									            					'lugar_evento' => '',
									            					'inicio' => $fecha_recordatorio,
									            					'fin' => $fecha_recordatorio,
									            					'descripcion_evento' => 'Recordatorio de Vencimiento y Renovación del ANS: '.$this->input->post('nombre_acuerdo'),
									                               );

												       $id_evento = $this->general->insert('evento_gns',$evento,''); 

												       //Relacionando Evento con el Acuerdo
												            			
												        $evento_ANS = array(
													                'id_evento' => $id_evento,
													                'acuerdo_nivel_id' => $id_acuerdo,  
													                 );

														$id_evento_ANS = $this->general->insert('evento_ans',$evento_ANS,'');


														//Agregar asistentes a evento: Representate de Clientes y Gestor de Niveles de Servicio
														$asistentes = array(
											                                'id_evento' => $id_evento,
											                                'id_personal' => $this->input->post('representante_cliente'),  
											                                );

											            $this->general->insert('asistente_evento',$asistentes,'');

											            $asistentes = array(
											                                'id_evento' => $id_evento,
											                                'id_personal' => $this->input->post('gestor'),  
											                                );

											            $this->general->insert('asistente_evento',$asistentes,'');

									    // FIN Evento de Alerta de Vencimiento y Renovacion




                            //Fin de Crear Eventos

		            		$this->session->set_flashdata('Success', 'El Nuevo Acuerdo de Niveles de Servicio ha sido Creado con Éxito');
		            		redirect(site_url('index.php/niveles_de_servicio/gestion_ANS'));
		            	}
		            else
		            	{
		            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Crear el Nuevo Acuerdo de Niveles de Servicio');
		            		redirect(site_url('index.php/niveles_de_servicio/gestion_ANS'));
		            	}

		       

            }
	}

	/*
	* FIN de la Creacion de Acuerdos de Niveles de Servicio.
    */


 	/*
	* Inicio: Mostrar Acuerdos de Niveles de Servicio.
    */
    public function ver_acuerdo_de_NS($id_acuerdo = '')
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$acuerdo = $this->general->get_row('acuerdo_nivel_servicio',array('acuerdo_nivel_id'=>$id_acuerdo));

		$data_view['acuerdo'] = $acuerdo;
		
		$data_view['servicio'] =  $this->general->get_row('servicio',array('servicio_id'=>$acuerdo->id_servicio));		
		$data_view['gestor'] =  $this->general->get_row('personal',array('id_personal'=>$acuerdo->gestor_servicio));
		$data_view['representante'] =  $this->general->get_row('personal',array('id_personal'=>$acuerdo->representante_cliente));
		
		$this->utils->template($this->list_sidebar_niveles(1),'niveles/ans/ver_acuerdo_de_NS',$data_view,'Niveles de Servicio | Acuerdos de Niveles de Servicio','','two_level');
	}
	/*
	* FIN: Mostrar Acuerdos de Niveles de Servicio.
    */



	/*
	* Inicio: Modificar Acuerdos de Niveles de Servicio.
    */




	 public function modificar_acuerdo_de_NS($id_acuerdo = '', $operacion = '')
	{


		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$this->load->model('general/general_model','general');	

		$data_view['operacion'] = $operacion;

		$data_view['acuerdo_id'] = $id_acuerdo;
		$acuerdo = $this->general->get_row('acuerdo_nivel_servicio',array('acuerdo_nivel_id'=>$id_acuerdo));

		$data_view['acuerdo'] = $acuerdo;

		$data_view['servicios'] = $this->general->get_table('servicio');
		$data_view['personal'] = $this->general->get_table('personal');
		
		$data_view['requisitos'] = $this->general->get_table('requisito_nivel_servicio');

	
		 $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));


		 if($operacion == 'actualizar')
			 {
				 if(($this->input->post('nombre_acuerdo')) != ($acuerdo->nombre_acuerdo))
				 	{
		         		$this->form_validation->set_rules('nombre_acuerdo', 'Nombre del Acuerdo', 'required|trim|max_length[255]|callback_acuerdo_check');
				 	}
				 else
				 	{
				 		$this->form_validation->set_rules('nombre_acuerdo', 'Nombre del Acuerdo', 'required|trim|max_length[255]');
				 	}
				 $this->form_validation->set_rules('fecha_inicio', 'Fecha de Inicio', 'trim');
				         $this->form_validation->set_rules('fecha_culminacion', 'Fecha de Culminación', 'trim');
				         $this->form_validation->set_rules('intervalo_revision', 'Intervalo de Revisión del Acuerdo', '');
			 }
		  else
		  	{
		  		$this->form_validation->set_rules('nombre_acuerdo', 'Nombre del Acuerdo', 'required|trim|max_length[255]|callback_acuerdo_check');
		  		$this->form_validation->set_rules('fecha_inicio', 'Fecha de Inicio', 'required|trim');
				         $this->form_validation->set_rules('fecha_culminacion', 'Fecha de Culminación', 'required|trim');
				         $this->form_validation->set_rules('intervalo_revision', 'Intervalo de Revisión del Acuerdo', 'callback_dropdown_intervalo_revision|callback_intervalos_revision_check');
		  	}
         
         $this->form_validation->set_rules('servicio', 'Nombre del Servicio', 'callback_dropdown_servicio');
         $this->form_validation->set_rules('gestor', 'Gestor de Niveles del Servicio', 'callback_dropdown_gestor');
         $this->form_validation->set_rules('clientes', 'Cliente(s)', 'required|trim|max_length[500]');
         $this->form_validation->set_rules('representante_cliente', 'Representante del Cliente', 'callback_dropdown_representante_cliente');

         
         $this->form_validation->set_rules('objetivos_acuerdo', 'Objetivos del Acuerdo', 'required|trim|max_length[65535]');
         $this->form_validation->set_rules('alcance', 'Alcance y Exclusiones del Acuerdo', 'required|trim|max_length[65535]');
         $this->form_validation->set_rules('condiciones_terminacion', 'Condiciones de Terminación del Acuerdo', 'max_length[65535]');
         $this->form_validation->set_rules('modificacion', 'Procedimientos para Actualizar/Modificar el Acuerdo', 'max_length[65535]');

         
         $this->form_validation->set_rules('options_pregunta', '', 'trim');
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

         $this->form_validation->set_rules('porcentaje_disponibilidad', 'Porcentaje de Disponibilidad', 'required|numeric|greater_than[0]|less_than[101]');


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


         $this->form_validation->set_rules('complemento_disponibilidad', 'Complemento de Disponibilidad', 'max_length[65535]');

         $this->form_validation->set_rules('unidad_medida', 'Unidad de Medida', 'callback_dropdown_unidad_medida');

         $this->form_validation->set_rules('minimo_caida', 'Mínimo de Caídas', 'required|trim|integer');
         $this->form_validation->set_rules('maximo_caida', 'Máximo de Caídas', 'required|trim|integer|callback_numero_caidas_check');


         $this->form_validation->set_rules('unidad_tiempo1', 'Unidad de Tiempo', 'callback_dropdown_unidad_tiempo');
         $this->form_validation->set_rules('minimo_duracion_caida', 'Duración Mínima de Caídas', 'required|trim|integer');
         $this->form_validation->set_rules('maximo_duracion_caida', 'Duración Máxima de Caídas', 'required|trim|integer|callback_duracion_caidas_check');

         $this->form_validation->set_rules('unidad_tiempo2', 'Unidad de Tiempo', 'callback_dropdown_unidad_tiempo2');
         $this->form_validation->set_rules('minimo_duracion_respuesta', 'Tiempo Mínimo de Respuesta', 'required|trim|integer');
         $this->form_validation->set_rules('maximo_duracion_respuesta', 'Tiempo Máximo de Respuesta', 'required|trim|integer|callback_tiempo_respuesta_check');


         $this->form_validation->set_rules('tiempo_restauracion1', 'Unidad de Medida', 'callback_dropdown_unidad_tiempo_restauracion');
         $this->form_validation->set_rules('minimo_duracion_restauracion', 'Tiempo Mínimo de Restauración', 'required|trim|integer');
         $this->form_validation->set_rules('maximo_duracion_restauracion', 'Tiempo Máximo de Restauración', 'required|trim|integer|callback_tiempo_restauracion_check');


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

         $this->form_validation->set_message('less_than', 'El porcentaje debe ser Menor o Igual a Cien');
         $this->form_validation->set_message('greater_than', 'El porcentaje debe ser Mayor a Cero');

         $this->form_validation->set_message('required', 'Campo Requerido');
         $this->form_validation->set_message('integer', 'Solo Números Enteros Permitidos');


		if ($this->form_validation->run($this) == FALSE)
            {

                $this->utils->template($this->list_sidebar_niveles(1),'niveles/ans/modificar/modificar_acuerdo_de_NS',$data_view,'Niveles de Servicio | Acuerdos de Niveles de Servicio','','two_level');
            }
  		else
            {
		        if( $this->input->post('condiciones_terminacion'))
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



		        $fecha_inicio = strtotime($this->input->post('fecha_inicio')); 
		         $fecha_inicio = date("Y-m-d", $fecha_inicio); 

		         $fecha_culminacion = strtotime($this->input->post('fecha_culminacion'));
		          $fecha_culminacion = date("Y-m-d", $fecha_culminacion); 


		        // Establecer fecha de revisión de acuerdo

		           if( $this->input->post('intervalo_revision') == 'Mensual' )
		            	{
		            		$date = $fecha_inicio;
							$newdate = strtotime ( '+1 month' , strtotime ( $date ) ) ;
							$fecha_revision = date ( 'Y-m-j' , $newdate );
		            		
		            	}

		           if( $this->input->post('intervalo_revision') == 'Trimestral' )
		            	{
		            		$date = $fecha_inicio;
							$newdate = strtotime ( '+3 month' , strtotime ( $date ) ) ;
							$fecha_revision = date ( 'Y-m-j' , $newdate );
		            		
		            	}

		           if( $this->input->post('intervalo_revision') == 'Semestral' )
		            	{
		            			$date = $fecha_inicio;
								$newdate = strtotime ( '+6 month' , strtotime ( $date ) ) ;
								$fecha_revision = date ( 'Y-m-j' , $newdate );
		            		
		            	}

		           if( $this->input->post('intervalo_revision') == 'Anual' )
		            	{
		            		$date = $fecha_inicio;
							$newdate = strtotime ( '+1 year' , strtotime ( $date ) ) ;
							$fecha_revision = date ( 'Y-m-j' , $newdate );	            		
		            	}	        
		       


		       //Calculo de minutos de disponibilidad 

		        if( $this->input->post('inicio_lunes') &&  $this->input->post('fin_lunes') )
		            	{
		            		
		            		$inicio_lunes = $this->input->post('inicio_lunes');
						    $inicio_lunes = strtotime($inicio_lunes);

							$inicio_lunes_horas = date("H", $inicio_lunes);
							$inicio_lunes_minutos = date("i", $inicio_lunes);
							$inicio_lunes_total = $inicio_lunes_horas*60;
							$inicio_lunes_total = $inicio_lunes_total + $inicio_lunes_minutos;

							$fin_lunes = $this->input->post('fin_lunes');
							$fin_lunes = strtotime($fin_lunes);

							$fin_lunes_horas = date("H", $fin_lunes);
							$fin_lunes_minutos = date("i", $fin_lunes);
							$fin_lunes_total = $fin_lunes_horas*60;
							$fin_lunes_total = $fin_lunes_total + $fin_lunes_minutos;

							$intervalo_lunes = $fin_lunes_total - $inicio_lunes_total;

							if( $this->input->post('inicio_lunes') == $this->input->post('fin_lunes'))
							{
								$intervalo_lunes = 1440;
							}
		            	}

		        if( $this->input->post('inicio_martes') &&  $this->input->post('fin_martes') )
		            	{
		            		
		            		$inicio_martes = $this->input->post('inicio_martes');
						    $inicio_martes = strtotime($inicio_martes);

							$inicio_martes_horas = date("H", $inicio_martes);
							$inicio_martes_minutos = date("i", $inicio_martes);
							$inicio_martes_total = $inicio_martes_horas*60;
							$inicio_martes_total = $inicio_martes_total + $inicio_martes_minutos;

							$fin_martes = $this->input->post('fin_martes');
							$fin_martes = strtotime($fin_martes);

							$fin_martes_horas = date("H", $fin_martes);
							$fin_martes_minutos = date("i", $fin_martes);
							$fin_martes_total = $fin_martes_horas*60;
							$fin_martes_total = $fin_martes_total + $fin_martes_minutos;

							$intervalo_martes = $fin_martes_total - $inicio_martes_total;

							if( $this->input->post('inicio_martes') == $this->input->post('fin_martes'))
							{
								$intervalo_martes = 1440;
							}
		            	}

		        if( $this->input->post('inicio_miercoles') &&  $this->input->post('fin_miercoles') )
		            	{
		            		
		            		$inicio_miercoles = $this->input->post('inicio_miercoles');
						    $inicio_miercoles = strtotime($inicio_miercoles);

							$inicio_miercoles_horas = date("H", $inicio_miercoles);
							$inicio_miercoles_minutos = date("i", $inicio_miercoles);
							$inicio_miercoles_total = $inicio_miercoles_horas*60;
							$inicio_miercoles_total = $inicio_miercoles_total + $inicio_miercoles_minutos;

							$fin_miercoles = $this->input->post('fin_miercoles');
							$fin_miercoles = strtotime($fin_miercoles);

							$fin_miercoles_horas = date("H", $fin_miercoles);
							$fin_miercoles_minutos = date("i", $fin_miercoles);
							$fin_miercoles_total = $fin_miercoles_horas*60;
							$fin_miercoles_total = $fin_miercoles_total + $fin_miercoles_minutos;

							$intervalo_miercoles = $fin_miercoles_total - $inicio_miercoles_total;

							if( $this->input->post('inicio_miercoles') == $this->input->post('fin_miercoles'))
							{
								$intervalo_miercoles = 1440;
							}
		            	}


		        if( $this->input->post('inicio_jueves') &&  $this->input->post('fin_jueves') )
		            	{
		            		
		            		$inicio_jueves = $this->input->post('inicio_jueves');
						    $inicio_jueves = strtotime($inicio_jueves);

							$inicio_jueves_horas = date("H", $inicio_jueves);
							$inicio_jueves_minutos = date("i", $inicio_jueves);
							$inicio_jueves_total = $inicio_jueves_horas*60;
							$inicio_jueves_total = $inicio_jueves_total + $inicio_jueves_minutos;

							$fin_jueves = $this->input->post('fin_jueves');
							$fin_jueves = strtotime($fin_jueves);

							$fin_jueves_horas = date("H", $fin_jueves);
							$fin_jueves_minutos = date("i", $fin_jueves);
							$fin_jueves_total = $fin_jueves_horas*60;
							$fin_jueves_total = $fin_jueves_total + $fin_jueves_minutos;

							$intervalo_jueves = $fin_jueves_total - $inicio_jueves_total;

							if( $this->input->post('inicio_jueves') == $this->input->post('fin_jueves'))
							{
								$intervalo_jueves = 1440;
							}
		            	}

		        if( $this->input->post('inicio_viernes') &&  $this->input->post('fin_viernes') )
		            	{
		            		
		            		$inicio_viernes = $this->input->post('inicio_viernes');
						    $inicio_viernes = strtotime($inicio_viernes);

							$inicio_viernes_horas = date("H", $inicio_viernes);
							$inicio_viernes_minutos = date("i", $inicio_viernes);
							$inicio_viernes_total = $inicio_viernes_horas*60;
							$inicio_viernes_total = $inicio_viernes_total + $inicio_viernes_minutos;

							$fin_viernes = $this->input->post('fin_viernes');
							$fin_viernes = strtotime($fin_viernes);

							$fin_viernes_horas = date("H", $fin_viernes);
							$fin_viernes_minutos = date("i", $fin_viernes);
							$fin_viernes_total = $fin_viernes_horas*60;
							$fin_viernes_total = $fin_viernes_total + $fin_viernes_minutos;

							$intervalo_viernes = $fin_viernes_total - $inicio_viernes_total;

							if( $this->input->post('inicio_viernes') == $this->input->post('fin_viernes'))
							{
								$intervalo_viernes = 1440;
							}
		            	}


		        if( $this->input->post('inicio_sabado') &&  $this->input->post('fin_sabado') )
		            	{
		            		
		            		$inicio_sabado = $this->input->post('inicio_sabado');
						    $inicio_sabado = strtotime($inicio_sabado);

							$inicio_sabado_horas = date("H", $inicio_sabado);
							$inicio_sabado_minutos = date("i", $inicio_sabado);
							$inicio_sabado_total = $inicio_sabado_horas*60;
							$inicio_sabado_total = $inicio_sabado_total + $inicio_sabado_minutos;

							$fin_sabado = $this->input->post('fin_sabado');
							$fin_sabado = strtotime($fin_sabado);

							$fin_sabado_horas = date("H", $fin_sabado);
							$fin_sabado_minutos = date("i", $fin_sabado);
							$fin_sabado_total = $fin_sabado_horas*60;
							$fin_sabado_total = $fin_sabado_total + $fin_sabado_minutos;

							$intervalo_sabado = $fin_sabado_total - $inicio_sabado_total;

							if( $this->input->post('inicio_sabado') == $this->input->post('fin_sabado'))
							{
								$intervalo_sabado = 1440;
							}
		            	}

		        if( $this->input->post('inicio_domingo') &&  $this->input->post('fin_domingo') )
		            	{
		            		
		            		$inicio_domingo = $this->input->post('inicio_domingo');
						    $inicio_domingo = strtotime($inicio_domingo);

							$inicio_domingo_horas = date("H", $inicio_domingo);
							$inicio_domingo_minutos = date("i", $inicio_domingo);
							$inicio_domingo_total = $inicio_domingo_horas*60;
							$inicio_domingo_total = $inicio_domingo_total + $inicio_domingo_minutos;

							$fin_domingo = $this->input->post('fin_domingo');
							$fin_domingo = strtotime($fin_domingo);

							$fin_domingo_horas = date("H", $fin_domingo);
							$fin_domingo_minutos = date("i", $fin_domingo);
							$fin_domingo_total = $fin_domingo_horas*60;
							$fin_domingo_total = $fin_domingo_total + $fin_domingo_minutos;

							$intervalo_domingo = $fin_domingo_total - $inicio_domingo_total;

							if( $this->input->post('inicio_domingo') == $this->input->post('fin_domingo'))
							{
								$intervalo_domingo = 1440;
							}
		            	}

		         
		         // Suma de todos los minutos de disponibilidad diario para obtener los minutos de disponibilidad semanal
		        
		         $minutos_disp_semanal = ($intervalo_lunes+$intervalo_martes+$intervalo_miercoles+$intervalo_jueves+$intervalo_viernes+$intervalo_sabado+$intervalo_domingo);

		         $minutos_disp_mensual  = $minutos_disp_semanal*4; 

		         $minutos_disp_anual  = $minutos_disp_mensual*12; 

		       //FIN de calculo de minutos de disponibilidad

		       // HORARIO DE DISPONIBILIDAD
		        if( $this->input->post('inicio_lunes'))
		            	{
		            		$inicio_lunes = $this->input->post('inicio_lunes');
		            		$inicio_lunes = strtotime($inicio_lunes);
							$inicio_lunes = date("H:i", $inicio_lunes);
		            	}
		            	else
		            	{
		            		$inicio_lunes = NULL;
		            	}

		        if( $this->input->post('fin_lunes'))
		            	{
		            		$fin_lunes = $this->input->post('fin_lunes');
		            		$fin_lunes = strtotime($fin_lunes);
							$fin_lunes = date("H:i", $fin_lunes);
		            	}
		            	else
		            	{
		            		$fin_lunes = NULL;
		            	}

		        
		        if( $this->input->post('inicio_martes'))
		            	{
		            		$inicio_martes = $this->input->post('inicio_martes');
		            		$inicio_martes = strtotime($inicio_martes);
							$inicio_martes = date("H:i", $inicio_martes);
		            	}
		            	else
		            	{
		            		$inicio_martes = NULL;
		            	}

		        if( $this->input->post('fin_martes'))
		            	{
		            		$fin_martes = $this->input->post('fin_martes');
		            		$fin_martes = strtotime($fin_martes);
							$fin_martes = date("H:i", $fin_martes);
		            	}
		            	else
		            	{
		            		$fin_martes = NULL;
		            	}



		        if( $this->input->post('inicio_miercoles'))
		            	{
		            		$inicio_miercoles = $this->input->post('inicio_miercoles');
		            		$inicio_miercoles = strtotime($inicio_miercoles);
							$inicio_miercoles = date("H:i", $inicio_miercoles);
		            	}
		            	else
		            	{
		            		$inicio_miercoles = NULL;
		            	}

		        if( $this->input->post('fin_miercoles'))
		            	{
		            		$fin_miercoles = $this->input->post('fin_miercoles');
		            		$fin_miercoles = strtotime($fin_miercoles);
							$fin_miercoles = date("H:i", $fin_miercoles);
		            	}
		            	else
		            	{
		            		$fin_miercoles = NULL;
		            	}

		         if( $this->input->post('inicio_jueves'))
		            	{
		            		$inicio_jueves = $this->input->post('inicio_jueves');
		            		$inicio_jueves = strtotime($inicio_jueves);
							$inicio_jueves = date("H:i", $inicio_jueves);
		            	}
		            	else
		            	{
		            		$inicio_jueves = NULL;
		            	}

		        if( $this->input->post('fin_jueves'))
		            	{
		            		$fin_jueves = $this->input->post('fin_jueves');
		            		$fin_jueves = strtotime($fin_jueves);
							$fin_jueves = date("H:i", $fin_jueves);
		            	}
		            	else
		            	{
		            		$fin_jueves = NULL;
		            	}
		        if( $this->input->post('inicio_viernes'))
		            	{
		            		$inicio_viernes = $this->input->post('inicio_viernes');
		            		$inicio_viernes = strtotime($inicio_viernes);
							$inicio_viernes = date("H:i", $inicio_viernes);
		            	}
		            	else
		            	{
		            		$inicio_viernes = NULL;
		            	}

		        if( $this->input->post('fin_viernes'))
		            	{
		            		$fin_viernes = $this->input->post('fin_viernes');
		            		$fin_viernes = strtotime($fin_viernes);
							$fin_viernes = date("H:i", $fin_viernes);
		            	}
		            	else
		            	{
		            		$fin_viernes = NULL;
		            	}
		         if( $this->input->post('inicio_sabado'))
		            	{
		            		$inicio_sabado = $this->input->post('inicio_sabado');
		            		$inicio_sabado = strtotime($inicio_sabado);
							$inicio_sabado = date("H:i", $inicio_sabado);
		            	}
		            	else
		            	{
		            		$inicio_sabado = NULL;
		            	}

		        if( $this->input->post('fin_sabado'))
		            	{
		            		$fin_sabado = $this->input->post('fin_sabado');
		            		$fin_sabado = strtotime($fin_sabado);
							$fin_sabado = date("H:i", $fin_sabado);
		            	}
		            	else
		            	{
		            		$fin_sabado = NULL;
		            	}
		         if( $this->input->post('inicio_domingo'))
		            	{
		            		$inicio_domingo = $this->input->post('inicio_domingo');
		            		$inicio_domingo = strtotime($inicio_domingo);
							$inicio_domingo = date("H:i", $inicio_domingo);
		            	}
		            	else
		            	{
		            		$inicio_domingo = NULL;
		            	}

		        if( $this->input->post('fin_domingo'))
		            	{
		            		$fin_domingo = $this->input->post('fin_domingo');
		            		$fin_domingo = strtotime($fin_domingo);
							$fin_domingo = date("H:i", $fin_domingo);
		            	}
		            	else
		            	{
		            		$fin_domingo = NULL;
		            	}
		        // FIN HORARIO DE DISPONIBILIDAD

		    


		        //Calculo de minutos de disponibilidad 

		        if( $this->input->post('inicio_lunes_mantenimiento') &&  $this->input->post('fin_lunes_mantenimiento') )
		            	{
		            		
		            		$inicio_lunes_mantenimiento = $this->input->post('inicio_lunes_mantenimiento');
						    $inicio_lunes_mantenimiento = strtotime($inicio_lunes_mantenimiento);

							$inicio_lunes_mantenimiento_horas = date("H", $inicio_lunes_mantenimiento);
							$inicio_lunes_mantenimiento_minutos = date("i", $inicio_lunes_mantenimiento);
							$inicio_lunes_mantenimiento_total = $inicio_lunes_mantenimiento_horas*60;
							$inicio_lunes_mantenimiento_total = $inicio_lunes_mantenimiento_total + $inicio_lunes_mantenimiento_minutos;

							$fin_lunes_mantenimiento = $this->input->post('fin_lunes_mantenimiento');
							$fin_lunes_mantenimiento = strtotime($fin_lunes_mantenimiento);

							$fin_lunes_mantenimiento_horas = date("H", $fin_lunes_mantenimiento);
							$fin_lunes_mantenimiento_minutos = date("i", $fin_lunes_mantenimiento);
							$fin_lunes_mantenimiento_total = $fin_lunes_mantenimiento_horas*60;
							$fin_lunes_mantenimiento_total = $fin_lunes_mantenimiento_total + $fin_lunes_mantenimiento_minutos;

							$intervalo_lunes_mantenimiento = $fin_lunes_mantenimiento_total - $inicio_lunes_mantenimiento_total;

							if( $this->input->post('inicio_lunes_mantenimiento') == $this->input->post('fin_lunes_mantenimiento'))
							{
								$intervalo_lunes_mantenimiento = 1440;
							}
		            	}

		        if( $this->input->post('inicio_martes_mantenimiento') &&  $this->input->post('fin_martes_mantenimiento') )
		            	{
		            		
		            		$inicio_martes_mantenimiento = $this->input->post('inicio_martes_mantenimiento');
						    $inicio_martes_mantenimiento = strtotime($inicio_martes_mantenimiento);

							$inicio_martes_mantenimiento_horas = date("H", $inicio_martes_mantenimiento);
							$inicio_martes_mantenimiento_minutos = date("i", $inicio_martes_mantenimiento);
							$inicio_martes_mantenimiento_total = $inicio_martes_mantenimiento_horas*60;
							$inicio_martes_mantenimiento_total = $inicio_martes_mantenimiento_total + $inicio_martes_mantenimiento_minutos;

							$fin_martes_mantenimiento = $this->input->post('fin_martes_mantenimiento');
							$fin_martes_mantenimiento = strtotime($fin_martes_mantenimiento);

							$fin_martes_mantenimiento_horas = date("H", $fin_martes_mantenimiento);
							$fin_martes_mantenimiento_minutos = date("i", $fin_martes_mantenimiento);
							$fin_martes_mantenimiento_total = $fin_martes_mantenimiento_horas*60;
							$fin_martes_mantenimiento_total = $fin_martes_mantenimiento_total + $fin_martes_mantenimiento_minutos;

							$intervalo_martes_mantenimiento = $fin_martes_mantenimiento_total - $inicio_martes_mantenimiento_total;

							if( $this->input->post('inicio_martes_mantenimiento') == $this->input->post('fin_martes_mantenimiento'))
							{
								$intervalo_martes_mantenimiento = 1440;
							}
		            	}

		        if( $this->input->post('inicio_miercoles_mantenimiento') &&  $this->input->post('fin_miercoles_mantenimiento') )
		            	{
		            		
		            		$inicio_miercoles_mantenimiento = $this->input->post('inicio_miercoles_mantenimiento');
						    $inicio_miercoles_mantenimiento = strtotime($inicio_miercoles_mantenimiento);

							$inicio_miercoles_mantenimiento_horas = date("H", $inicio_miercoles_mantenimiento);
							$inicio_miercoles_mantenimiento_minutos = date("i", $inicio_miercoles_mantenimiento);
							$inicio_miercoles_mantenimiento_total = $inicio_miercoles_mantenimiento_horas*60;
							$inicio_miercoles_mantenimiento_total = $inicio_miercoles_mantenimiento_total + $inicio_miercoles_mantenimiento_minutos;

							$fin_miercoles_mantenimiento = $this->input->post('fin_miercoles_mantenimiento');
							$fin_miercoles_mantenimiento = strtotime($fin_miercoles_mantenimiento);

							$fin_miercoles_mantenimiento_horas = date("H", $fin_miercoles_mantenimiento);
							$fin_miercoles_mantenimiento_minutos = date("i", $fin_miercoles_mantenimiento);
							$fin_miercoles_mantenimiento_total = $fin_miercoles_mantenimiento_horas*60;
							$fin_miercoles_mantenimiento_total = $fin_miercoles_mantenimiento_total + $fin_miercoles_mantenimiento_minutos;

							$intervalo_miercoles_mantenimiento = $fin_miercoles_mantenimiento_total - $inicio_miercoles_mantenimiento_total;

							if( $this->input->post('inicio_miercoles_mantenimiento') == $this->input->post('fin_miercoles_mantenimiento'))
							{
								$intervalo_miercoles_mantenimiento = 1440;
							}
		            	}


		        if( $this->input->post('inicio_jueves_mantenimiento') &&  $this->input->post('fin_jueves_mantenimiento') )
		            	{
		            		
		            		$inicio_jueves_mantenimiento = $this->input->post('inicio_jueves_mantenimiento');
						    $inicio_jueves_mantenimiento = strtotime($inicio_jueves_mantenimiento);

							$inicio_jueves_mantenimiento_horas = date("H", $inicio_jueves_mantenimiento);
							$inicio_jueves_mantenimiento_minutos = date("i", $inicio_jueves_mantenimiento);
							$inicio_jueves_mantenimiento_total = $inicio_jueves_mantenimiento_horas*60;
							$inicio_jueves_mantenimiento_total = $inicio_jueves_mantenimiento_total + $inicio_jueves_mantenimiento_minutos;

							$fin_jueves_mantenimiento = $this->input->post('fin_jueves_mantenimiento');
							$fin_jueves_mantenimiento = strtotime($fin_jueves_mantenimiento);

							$fin_jueves_mantenimiento_horas = date("H", $fin_jueves_mantenimiento);
							$fin_jueves_mantenimiento_minutos = date("i", $fin_jueves_mantenimiento);
							$fin_jueves_mantenimiento_total = $fin_jueves_mantenimiento_horas*60;
							$fin_jueves_mantenimiento_total = $fin_jueves_mantenimiento_total + $fin_jueves_mantenimiento_minutos;

							$intervalo_jueves_mantenimiento = $fin_jueves_mantenimiento_total - $inicio_jueves_mantenimiento_total;

							if( $this->input->post('inicio_jueves_mantenimiento') == $this->input->post('fin_jueves_mantenimiento'))
							{
								$intervalo_jueves_mantenimiento = 1440;
							}
		            	}

		        if( $this->input->post('inicio_viernes_mantenimiento') &&  $this->input->post('fin_viernes_mantenimiento') )
		            	{
		            		
		            		$inicio_viernes_mantenimiento = $this->input->post('inicio_viernes_mantenimiento');
						    $inicio_viernes_mantenimiento = strtotime($inicio_viernes_mantenimiento);

							$inicio_viernes_mantenimiento_horas = date("H", $inicio_viernes_mantenimiento);
							$inicio_viernes_mantenimiento_minutos = date("i", $inicio_viernes_mantenimiento);
							$inicio_viernes_mantenimiento_total = $inicio_viernes_mantenimiento_horas*60;
							$inicio_viernes_mantenimiento_total = $inicio_viernes_mantenimiento_total + $inicio_viernes_mantenimiento_minutos;

							$fin_viernes_mantenimiento = $this->input->post('fin_viernes_mantenimiento');
							$fin_viernes_mantenimiento = strtotime($fin_viernes_mantenimiento);

							$fin_viernes_mantenimiento_horas = date("H", $fin_viernes_mantenimiento);
							$fin_viernes_mantenimiento_minutos = date("i", $fin_viernes_mantenimiento);
							$fin_viernes_mantenimiento_total = $fin_viernes_mantenimiento_horas*60;
							$fin_viernes_mantenimiento_total = $fin_viernes_mantenimiento_total + $fin_viernes_mantenimiento_minutos;

							$intervalo_viernes_mantenimiento = $fin_viernes_mantenimiento_total - $inicio_viernes_mantenimiento_total;

							if( $this->input->post('inicio_viernes_mantenimiento') == $this->input->post('fin_viernes_mantenimiento'))
							{
								$intervalo_viernes_mantenimiento = 1440;
							}
		            	}


		        if( $this->input->post('inicio_sabado_mantenimiento') &&  $this->input->post('fin_sabado_mantenimiento') )
		            	{
		            		
		            		$inicio_sabado_mantenimiento = $this->input->post('inicio_sabado_mantenimiento');
						    $inicio_sabado_mantenimiento = strtotime($inicio_sabado_mantenimiento);

							$inicio_sabado_mantenimiento_horas = date("H", $inicio_sabado_mantenimiento);
							$inicio_sabado_mantenimiento_minutos = date("i", $inicio_sabado_mantenimiento);
							$inicio_sabado_mantenimiento_total = $inicio_sabado_mantenimiento_horas*60;
							$inicio_sabado_mantenimiento_total = $inicio_sabado_mantenimiento_total + $inicio_sabado_mantenimiento_minutos;

							$fin_sabado_mantenimiento = $this->input->post('fin_sabado_mantenimiento');
							$fin_sabado_mantenimiento = strtotime($fin_sabado_mantenimiento);

							$fin_sabado_mantenimiento_horas = date("H", $fin_sabado_mantenimiento);
							$fin_sabado_mantenimiento_minutos = date("i", $fin_sabado_mantenimiento);
							$fin_sabado_mantenimiento_total = $fin_sabado_mantenimiento_horas*60;
							$fin_sabado_mantenimiento_total = $fin_sabado_mantenimiento_total + $fin_sabado_mantenimiento_minutos;

							$intervalo_sabado_mantenimiento = $fin_sabado_mantenimiento_total - $inicio_sabado_mantenimiento_total;

							if( $this->input->post('inicio_sabado_mantenimiento') == $this->input->post('fin_sabado_mantenimiento'))
							{
								$intervalo_sabado_mantenimiento = 1440;
							}
		            	}

		        if( $this->input->post('inicio_domingo_mantenimiento') &&  $this->input->post('fin_domingo_mantenimiento') )
		            	{
		            		
		            		$inicio_domingo_mantenimiento = $this->input->post('inicio_domingo_mantenimiento');
						    $inicio_domingo_mantenimiento = strtotime($inicio_domingo_mantenimiento);

							$inicio_domingo_mantenimiento_horas = date("H", $inicio_domingo_mantenimiento);
							$inicio_domingo_mantenimiento_minutos = date("i", $inicio_domingo_mantenimiento);
							$inicio_domingo_mantenimiento_total = $inicio_domingo_mantenimiento_horas*60;
							$inicio_domingo_mantenimiento_total = $inicio_domingo_mantenimiento_total + $inicio_domingo_mantenimiento_minutos;

							$fin_domingo_mantenimiento = $this->input->post('fin_domingo_mantenimiento');
							$fin_domingo_mantenimiento = strtotime($fin_domingo_mantenimiento);

							$fin_domingo_mantenimiento_horas = date("H", $fin_domingo_mantenimiento);
							$fin_domingo_mantenimiento_minutos = date("i", $fin_domingo_mantenimiento);
							$fin_domingo_mantenimiento_total = $fin_domingo_mantenimiento_horas*60;
							$fin_domingo_mantenimiento_total = $fin_domingo_mantenimiento_total + $fin_domingo_mantenimiento_minutos;

							$intervalo_domingo_mantenimiento = $fin_domingo_mantenimiento_total - $inicio_domingo_mantenimiento_total;

							if( $this->input->post('inicio_domingo_mantenimiento') == $this->input->post('fin_domingo_mantenimiento'))
							{
								$intervalo_domingo_mantenimiento = 1440;
							}
		            	}

		         
		         // Suma de todos los minutos de disponibilidad diario para obtener los minutos de disponibilidad semanal
		        
		         $minutos_mant_semanal = ($intervalo_lunes_mantenimiento+$intervalo_martes_mantenimiento+$intervalo_miercoles_mantenimiento+$intervalo_jueves_mantenimiento+$intervalo_viernes_mantenimiento+$intervalo_sabado_mantenimiento+$intervalo_domingo_mantenimiento);

		         $minutos_mant_mensual  = $minutos_mant_semanal*$this->input->post('intervalo_mantenimiento'); 

		         $minutos_mant_anual  = $minutos_mant_mensual*12; 

		       //FIN de calculo de minutos de disponibilidad


		       // HORARIO DE MANTENIMIENTO 
		        if( $this->input->post('inicio_lunes_mantenimiento'))
		            	{
		            		$inicio_lunes_mantenimiento = $this->input->post('inicio_lunes_mantenimiento');
		            		$inicio_lunes_mantenimiento = strtotime($inicio_lunes_mantenimiento);
							$inicio_lunes_mantenimiento = date("H:i", $inicio_lunes_mantenimiento);
		            	}
		            	else
		            	{
		            		$inicio_lunes_mantenimiento = NULL;
		            	}

		        if( $this->input->post('fin_lunes_mantenimiento'))
		            	{
		            		$fin_lunes_mantenimiento = $this->input->post('fin_lunes_mantenimiento');
		            		$fin_lunes_mantenimiento = strtotime($fin_lunes_mantenimiento);
							$fin_lunes_mantenimiento = date("H:i", $fin_lunes_mantenimiento);
		            	}
		            	else
		            	{
		            		$fin_lunes_mantenimiento = NULL;
		            	}

		        if( $this->input->post('inicio_martes_mantenimiento'))
		            	{
		            		$inicio_martes_mantenimiento = $this->input->post('inicio_martes_mantenimiento');
		            		$inicio_martes_mantenimiento = strtotime($inicio_martes_mantenimiento);
							$inicio_martes_mantenimiento = date("H:i", $inicio_martes_mantenimiento);
		            	}
		            	else
		            	{
		            		$inicio_martes_mantenimiento = NULL;
		            	}

		        if( $this->input->post('fin_martes_mantenimiento'))
		            	{
		            		$fin_martes_mantenimiento = $this->input->post('fin_martes_mantenimiento');
		            		$fin_martes_mantenimiento = strtotime($fin_martes_mantenimiento);
							$fin_martes_mantenimiento = date("H:i", $fin_martes_mantenimiento);
		            	}
		            	else
		            	{
		            		$fin_martes_mantenimiento = NULL;
		            	}
		        if( $this->input->post('inicio_miercoles_mantenimiento'))
		            	{
		            		$inicio_miercoles_mantenimiento = $this->input->post('inicio_miercoles_mantenimiento');
		            		$inicio_miercoles_mantenimiento = strtotime($inicio_miercoles_mantenimiento);
							$inicio_miercoles_mantenimiento = date("H:i", $inicio_miercoles_mantenimiento);
		            	}
		            	else
		            	{
		            		$inicio_miercoles_mantenimiento = NULL;
		            	}

		        if( $this->input->post('fin_miercoles_mantenimiento'))
		            	{
		            		$fin_miercoles_mantenimiento = $this->input->post('fin_miercoles_mantenimiento');
		            		$fin_miercoles_mantenimiento = strtotime($fin_miercoles_mantenimiento);
							$fin_miercoles_mantenimiento = date("H:i", $fin_miercoles_mantenimiento);
		            	}
		            	else
		            	{
		            		$fin_miercoles_mantenimiento = NULL;
		            	}

		         if( $this->input->post('inicio_jueves_mantenimiento'))
		            	{
		            		$inicio_jueves_mantenimiento = $this->input->post('inicio_jueves_mantenimiento');
		            		$inicio_jueves_mantenimiento = strtotime($inicio_jueves_mantenimiento);
							$inicio_jueves_mantenimiento = date("H:i", $inicio_jueves_mantenimiento);
		            	}
		            	else
		            	{
		            		$inicio_jueves_mantenimiento = NULL;
		            	}

		        if( $this->input->post('fin_jueves_mantenimiento'))
		            	{
		            		$fin_jueves_mantenimiento = $this->input->post('fin_jueves_mantenimiento');
		            		$fin_jueves_mantenimiento = strtotime($fin_jueves_mantenimiento);
							$fin_jueves_mantenimiento = date("H:i", $fin_jueves_mantenimiento);
		            	}
		            	else
		            	{
		            		$fin_jueves_mantenimiento = NULL;
		            	}
		        if( $this->input->post('inicio_viernes_mantenimiento'))
		            	{
		            		$inicio_viernes_mantenimiento = $this->input->post('inicio_viernes_mantenimiento');
		            		$inicio_viernes_mantenimiento = strtotime($inicio_viernes_mantenimiento);
							$inicio_viernes_mantenimiento = date("H:i", $inicio_viernes_mantenimiento);
		            	}
		            	else
		            	{
		            		$inicio_viernes_mantenimiento = NULL;
		            	}

		        if( $this->input->post('fin_viernes_mantenimiento'))
		            	{
		            		$fin_viernes_mantenimiento = $this->input->post('fin_viernes_mantenimiento');
		            		$fin_viernes_mantenimiento = strtotime($fin_viernes_mantenimiento);
							$fin_viernes_mantenimiento = date("H:i", $fin_viernes_mantenimiento);
		            	}
		            	else
		            	{
		            		$fin_viernes_mantenimiento = NULL;
		            	}
		         if( $this->input->post('inicio_sabado_mantenimiento'))
		            	{
		            		$inicio_sabado_mantenimiento = $this->input->post('inicio_sabado_mantenimiento');
		            		$inicio_sabado_mantenimiento = strtotime($inicio_sabado_mantenimiento);
							$inicio_sabado_mantenimiento = date("H:i", $inicio_sabado_mantenimiento);
		            	}
		            	else
		            	{
		            		$inicio_sabado_mantenimiento = NULL;
		            	}

		        if( $this->input->post('fin_sabado_mantenimiento'))
		            	{
		            		$fin_sabado_mantenimiento = $this->input->post('fin_sabado_mantenimiento');
		            		$fin_sabado_mantenimiento = strtotime($fin_sabado_mantenimiento);
							$fin_sabado_mantenimiento = date("H:i", $fin_sabado_mantenimiento);
		            	}
		            	else
		            	{
		            		$fin_sabado_mantenimiento = NULL;
		            	}
		         if( $this->input->post('inicio_domingo_mantenimiento'))
		            	{
		            		$inicio_domingo_mantenimiento = $this->input->post('inicio_domingo_mantenimiento');
		            		$inicio_domingo_mantenimiento = strtotime($inicio_domingo_mantenimiento);
							$inicio_domingo_mantenimiento = date("H:i", $inicio_domingo_mantenimiento);
		            	}
		            	else
		            	{
		            		$inicio_domingo_mantenimiento = NULL;
		            	}

		        if( $this->input->post('fin_domingo_mantenimiento'))
		            	{
		            		$fin_domingo_mantenimiento = $this->input->post('fin_domingo_mantenimiento');
		            		$fin_domingo_mantenimiento = strtotime($fin_domingo_mantenimiento);
							$fin_domingo_mantenimiento = date("H:i", $fin_domingo_mantenimiento);
		            	}
		            	else
		            	{
		            		$fin_domingo_mantenimiento = NULL;
		            	}
		        // FIN HORARIO DE MANTENIMIENTO 




		        if( $this->input->post('costos'))
		            	{
		            		$costos = $this->input->post('costos');
		            	}
		            	else
		            	{
		            		$costos = NULL;
		            	}

		         if( $this->input->post('glosario'))
		            	{
		            		$glosario = $this->input->post('glosario');
		            	}
		            	else
		            	{
		            		$glosario = NULL;
		            	}

		         


		          if($operacion == 'actualizar')
						{
							$fecha_creacion_acuerdo = $acuerdo->fecha_creacion_acuerdo ;
								 
						 }
				   else
				   		{
				   			$fecha_creacion_acuerdo = date('Y-m-d H:i:s');
				  		 }


            	
                $acuerdo = array(
                				'nombre_acuerdo'=>$this->input->post('nombre_acuerdo'),
                                'id_servicio' => $this->input->post('servicio'),
                                'gestor_servicio' => $this->input->post('gestor'),
                                'cliente' => $this->input->post('clientes'),

                                'representante_cliente' => $this->input->post('representante_cliente'),

                                'fecha_inicio' =>  $fecha_inicio,
                                'fecha_final' =>  $fecha_culminacion,
                                'modo_revision' => $this->input->post('intervalo_revision'),

                                'objetivos_acuerdo' => $this->input->post('objetivos_acuerdo'), 
                                'alcance' =>  $this->input->post('alcance'), 
                                
                                'condiciones_terminacion' => $condiciones_terminacion,
                                'procedimiento_actualizacion' => $modificacion,



                              
		
                                'fecha_creacion_acuerdo' => $fecha_creacion_acuerdo,
                              

                                'fecha_modificacion_acuerdo' => date('Y-m-d H:i:s'),

                                'fecha_revision' => $fecha_revision,

                                'lunes_disp_ini' => $inicio_lunes,
								'lunes_disp_fin' => $fin_lunes ,
								'martes_disp_ini' => $inicio_martes,
								'martes_disp_fin' => $fin_martes ,
								'miercoles_disp_ini' => $inicio_miercoles,
								'miercoles_disp_fin' => $fin_miercoles ,
								'jueves_disp_ini' => $inicio_jueves,
								'jueves_disp_fin' => $fin_jueves ,
								'viernes_disp_ini' => $inicio_viernes,
								'viernes_disp_fin' => $fin_viernes ,
								'sabado_disp_ini' => $inicio_sabado,
								'sabado_disp_fin' => $fin_sabado ,
								'domingo_disp_ini' => $inicio_domingo,
								'domingo_disp_fin' => $fin_domingo ,

								'minutos_disp_semanal' => $minutos_disp_semanal,
								'minutos_disp_mensual' => $minutos_disp_mensual,
								'minutos_disp_anual' => $minutos_disp_anual,

								'porcentaje_disp' => $this->input->post('porcentaje_disponibilidad'),

								'lunes_mant_ini' => $inicio_lunes_mantenimiento,
								'lunes_mant_fin' => $fin_lunes_mantenimiento ,
								'martes_mant_ini' => $inicio_martes_mantenimiento,
								'martes_mant_fin' => $fin_martes_mantenimiento ,
								'miercoles_mant_ini' => $inicio_miercoles_mantenimiento,
								'miercoles_mant_fin' => $fin_miercoles_mantenimiento ,
								'jueves_mant_ini' => $inicio_jueves_mantenimiento,
								'jueves_mant_fin' => $fin_jueves_mantenimiento ,
								'viernes_mant_ini' => $inicio_viernes_mantenimiento,
								'viernes_mant_fin' => $fin_viernes_mantenimiento ,
								'sabado_mant_ini' => $inicio_sabado_mantenimiento,
								'sabado_mant_fin' => $fin_sabado_mantenimiento ,
								'domingo_mant_ini' => $inicio_domingo_mantenimiento,
								'domingo_mant_fin' => $fin_domingo_mantenimiento ,

								'minutos_mant_semanal' => $minutos_mant_semanal,
								'minutos_mant_mensual' => $minutos_mant_mensual,
								'minutos_mant_anual' => $minutos_mant_anual,

								'pregunta_mant' => $this->input->post('options_pregunta'),
								'modalidad_mantenimiento' => $this->input->post('intervalo_mantenimiento'),


								'complemento_disponibilidad' => $this->input->post('complemento_disponibilidad'),

								'unidad_num_caidas' => $this->input->post('unidad_medida'),
								'minimo_num_caidas' => $this->input->post('minimo_caida'),
								'maximo_num_caidas' => $this->input->post('maximo_caida'),

								'unidad_duracion_caidas' => $this->input->post('unidad_tiempo1'),
								'minimo_duracion_caidas' => $this->input->post('minimo_duracion_caida'),
								'maximo_duracion_caidas' => $this->input->post('maximo_duracion_caida'),

								'unidad_tiempo_respuesta' => $this->input->post('unidad_tiempo2'),
								'minimo_tiempo_respuesta' => $this->input->post('minimo_duracion_respuesta'),
								'maximo_tiempo_respuesta' => $this->input->post('maximo_duracion_respuesta'),

								'unidad_tiempo_restauracion' => $this->input->post('tiempo_restauracion1'),
								'minimo_tiempo_restauracion' => $this->input->post('minimo_duracion_restauracion'),
								'maximo_tiempo_restauracion' => $this->input->post('maximo_duracion_restauracion'),


								'soporte_tecnico' => $this->input->post('soporte'),

								'tiempo_respuesta_critico' => $this->input->post('tiempo_respuesta_critico'),
								'unidad_respuesta_critico' => $this->input->post('unidad_respuesta_critico'),
								'tiempo_respuesta_severo' => $this->input->post('tiempo_respuesta_severo'),
								'unidad_respuesta_severo' => $this->input->post('unidad_respuesta_severo'),
								'tiempo_respuesta_medio' => $this->input->post('tiempo_respuesta_medio'),
								'unidad_respuesta_medio' => $this->input->post('unidad_respuesta_medio'),
								'tiempo_respuesta_menor' => $this->input->post('tiempo_respuesta_menor'),
								'unidad_respuesta_menor' => $this->input->post('unidad_respuesta_menor'),

								'tiempo_resolucion_critico' => $this->input->post('tiempo_resolucion_critico'),
								'unidad_resolucion_critico' => $this->input->post('unidad_resolucion_critico'),
								'tiempo_resolucion_severo' => $this->input->post('tiempo_resolucion_severo'),
								'unidad_resolucion_severo' => $this->input->post('unidad_resolucion_severo'),
								'tiempo_resolucion_medio' => $this->input->post('tiempo_resolucion_medio'),
								'unidad_resolucion_medio' => $this->input->post('unidad_resolucion_medio'),
								'tiempo_resolucion_menor' => $this->input->post('tiempo_resolucion_menor'),
								'unidad_resolucion_menor' => $this->input->post('unidad_resolucion_menor'),

								'responsabilidades' => $this->input->post('responsabilidades'),
								'contactos' => $this->input->post('contactos'),
								'cobros' => $cobros,
								'glosario' => $glosario,

                                );

            	if($operacion == 'actualizar')
					 {
				       	$resultado_acuerdo = $this->general->update2('acuerdo_nivel_servicio',$acuerdo,array('acuerdo_nivel_id'=>$id_acuerdo));

		            	if($resultado_acuerdo)
			            	{
			            		//Crear PDF
			            		//$ruta = $this->generar_pdf_acuerdo($id_acuerdo);

								$acuerdo = array(
                                'ruta_pdf' => $ruta,

                                );
                                $this->general->update2('acuerdo_nivel_servicio',$acuerdo,array('acuerdo_nivel_id'=>$id_acuerdo));

			            		$this->session->set_flashdata('Success', 'El Acuerdo de Niveles de Servicio ha sido Actualizado con Éxito');
			            		redirect(site_url('index.php/niveles_de_servicio/gestion_ANS'));
			            	}
			            else
			            	{
			            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Actualizar el Acuerdo de Niveles de Servicio');
			            		redirect(site_url('index.php/niveles_de_servicio/gestion_ANS'));
			            	}
			          }
			     else
			     	{

			     		$resultado_acuerdo = $this->general->insert('acuerdo_nivel_servicio',$acuerdo,'');

		            	if($resultado_acuerdo)
			            	{
			            		//Crear PDF
			            		//$ruta = $this->generar_pdf_acuerdo($resultado_acuerdo);

								$acuerdo = array(
                                'ruta_pdf' => $ruta,

                                );
                                $this->general->update2('acuerdo_nivel_servicio',$acuerdo,array('acuerdo_nivel_id'=>$resultado_acuerdo));


                                 //Crear eventos

                                //Eventos de Revision

                                if( $this->input->post('intervalo_revision') == 'Mensual' )
								   	{
								   		$operacion_fecha = '+1 month';		            		
								    }

								if( $this->input->post('intervalo_revision') == 'Trimestral' )
								    {
								        $operacion_fecha = '+3 month';			            		
								    }

								if( $this->input->post('intervalo_revision') == 'Semestral' )
								    {
								        $operacion_fecha = '+6 month';				            		
								    }

								if( $this->input->post('intervalo_revision') == 'Anual' )
								    {
								        $operacion_fecha = '+1 year';	           		
								    }

								 $fecha_inicio2 = strtotime($this->input->post('fecha_inicio')); 
						         $fecha_inicio2 = date("Y-m-d 00:00:00", $fecha_inicio2); 

						         $fecha_fin2 = strtotime($this->input->post('fecha_culminacion'));
						         $fecha_fin2 = date("Y-m-d 00:00:00", $fecha_fin2); 
				
							     $date = $fecha_inicio2;
								 $newdate = strtotime ( $operacion_fecha, strtotime ( $date ) ) ;
								 $fecha_revision = date ( 'Y-m-d' , $newdate );

								 $dia = date ( 'N' , $newdate );

								 while ($fecha_revision <= $fecha_fin2)
										{

											  $fecha_anterior = $fecha_revision;

											  // Si no es viernes resta días hasta llegar al próximo viernes
											  while ($dia != '5')
											  {
											  	$newdate = strtotime ( '-1 day' , strtotime ( $fecha_revision ) ) ;
											  	$fecha_revision = date ( 'Y-m-d' , $newdate );
											  	$dia = date ( 'N' , $newdate );
											  }

											  // Creando el Evento 
											  $evento = array(

							            					'nombre_evento' => 'Revision del ANS: '.$this->input->post('nombre_acuerdo'),
							            					'tipo_evento' => 'revision_ANS',
							            					'lugar_evento' => '',
							            					'inicio' => $fecha_revision,
							            					'fin' => $fecha_revision,
							            					'descripcion_evento' => 'Revision del ANS: '.$this->input->post('nombre_acuerdo'),
							                               );

										       $id_evento = $this->general->insert('evento_gns',$evento,''); 

										       //Relacionando Evento con el Acuerdo
										            			
										        $evento_ANS = array(
											                'id_evento' => $id_evento,
											                'acuerdo_nivel_id' => $resultado_acuerdo,  
											                 );

												$id_evento_ANS = $this->general->insert('evento_ans',$evento_ANS,'');


												//Agregar asistentes a evento: Representate de Clientes y Gestor de Niveles de Servicio
												$asistentes = array(
									                                'id_evento' => $id_evento,
									                                'id_personal' => $this->input->post('representante_cliente'),  
									                                );

									            $this->general->insert('asistente_evento',$asistentes,'');

									            $asistentes = array(
									                                'id_evento' => $id_evento,
									                                'id_personal' => $this->input->post('gestor'),  
									                                );

									            $this->general->insert('asistente_evento',$asistentes,'');


												//Nueva fecha de Revision
												$newdate = strtotime ( $operacion_fecha , strtotime ( $fecha_anterior ) ) ;
												$fecha_revision = date ( 'Y-m-d' , $newdate );

												$dia = date ( 'N' , $newdate );

										}

	  								//FIN Eventos de Revision


								// Evento de Vencimiento

											// Creando el Evento 
											  $evento = array(

							            					'nombre_evento' => 'Vencimiento del ANS: '.$this->input->post('nombre_acuerdo'),
							            					'tipo_evento' => 'vencimiento_ANS',
							            					'lugar_evento' => '',
							            					'inicio' => $fecha_fin2,
							            					'fin' => $fecha_fin2,
							            					'descripcion_evento' => 'Vencimiento: '.$this->input->post('nombre_acuerdo'),
							                               );

										       $id_evento = $this->general->insert('evento_gns',$evento,''); 

										       //Relacionando Evento con el Acuerdo
										            			
										        $evento_ANS = array(
											                'id_evento' => $id_evento,
											                'acuerdo_nivel_id' => $resultado_acuerdo,  
											                 );

												$id_evento_ANS = $this->general->insert('evento_ans',$evento_ANS,'');


												//Agregar asistentes a evento: Representate de Clientes y Gestor de Niveles de Servicio
												$asistentes = array(
									                                'id_evento' => $id_evento,
									                                'id_personal' => $this->input->post('representante_cliente'),  
									                                );

									            $this->general->insert('asistente_evento',$asistentes,'');

									            $asistentes = array(
									                                'id_evento' => $id_evento,
									                                'id_personal' => $this->input->post('gestor'),  
									                                );

									            $this->general->insert('asistente_evento',$asistentes,'');

							    // FIN Evento de Vencimiento



								$date = $fecha_fin2;
								$newdate = strtotime ( '-15 day', strtotime ( $date ) ) ;
								$fecha_recordatorio = date ( 'Y-m-d 00:00:00' , $newdate );

								$dia = date ( 'N' , $newdate );

								while ($dia != '1')
											  {
											  	$newdate = strtotime ( '-1 day' , strtotime ( $fecha_recordatorio ) ) ;
											  	$fecha_recordatorio = date ( 'Y-m-d 00:00:00' , $newdate );
											  	$dia = date ( 'N' , $newdate );
											  }




								// Evento de Alerta de Vencimiento y Renovacion

													// Creando el Evento 
													  $evento = array(

									            					'nombre_evento' => 'Recordatorio de Vencimiento y Renovación del ANS: '.$this->input->post('nombre_acuerdo'),
									            					'tipo_evento' => 'recordatorio_ANS',
									            					'lugar_evento' => '',
									            					'inicio' => $fecha_recordatorio,
									            					'fin' => $fecha_recordatorio,
									            					'descripcion_evento' => 'Recordatorio de Vencimiento y Renovación del ANS: '.$this->input->post('nombre_acuerdo'),
									                               );

												       $id_evento = $this->general->insert('evento_gns',$evento,''); 

												       //Relacionando Evento con el Acuerdo
												            			
												        $evento_ANS = array(
													                'id_evento' => $id_evento,
													                'acuerdo_nivel_id' => $resultado_acuerdo,  
													                 );

														$id_evento_ANS = $this->general->insert('evento_ans',$evento_ANS,'');


														//Agregar asistentes a evento: Representate de Clientes y Gestor de Niveles de Servicio
														$asistentes = array(
											                                'id_evento' => $id_evento,
											                                'id_personal' => $this->input->post('representante_cliente'),  
											                                );

											            $this->general->insert('asistente_evento',$asistentes,'');

											            $asistentes = array(
											                                'id_evento' => $id_evento,
											                                'id_personal' => $this->input->post('gestor'),  
											                                );

											            $this->general->insert('asistente_evento',$asistentes,'');

									    // FIN Evento de Alerta de Vencimiento y Renovacion




                            //Fin de Crear Eventos

			            		$this->session->set_flashdata('Success', 'El Acuerdo de Niveles de Servicio ha sido Creado con Éxito en base al ANS seleccionado');
			            		redirect(site_url('index.php/niveles_de_servicio/gestion_ANS'));
			            	}
			            else
			            	{
			            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Crear el Acuerdo de Niveles de Servicio en base al ANS seleccionado');
			            		redirect(site_url('index.php/niveles_de_servicio/gestion_ANS'));
			            	}


			     	}

		       

            }

	}



	/*
	* FIN: Modificar Acuerdos de Niveles de Servicio.
    */ 




	public function eliminar_acuerdo(){

		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$this->load->model('general/general_model','general');
		$id_acuerdo = $this->input->post('acuerdo_id');
		$delete = $this->general->delete('acuerdo_nivel_servicio',array('acuerdo_nivel_id'=>$id_acuerdo));
		if($delete)
	        {
				$this->session->set_flashdata('Success', 'El Acuerdo de Niveles de Servicio ha sido Eliminado con Éxito');
			}
		else
			{
				$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Eliminar el Acuerdo de Niveles de Servicio');
			}
		if($this->input->post('delete_ver'))
			{
				redirect(site_url('index.php/niveles_de_servicio/gestion_ANS'));
			}	
	}


	public function eliminar_acuerdos(){

		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$this->load->model('general/general_model','general');
		$acuerdos_id = $this->input->post('acuerdo_id');
		foreach ($acuerdos_id as $acuerdo) {		    
			    
			 $delete = $this->general->delete('acuerdo_nivel_servicio',array('acuerdo_nivel_id'=>$acuerdo));
			}
		if($delete)
	        {
				$this->session->set_flashdata('Success', 'Los Acuerdos de Niveles de Servicio han sido Eliminados con Éxito');
			}
		else
			{
				$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Eliminar Los Acuerdos de Niveles de Servicio Seleccionados');
			}

			
	}


	public function estructura_acuerdo($id_acuerdo = ''){

		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$acuerdo = $this->general->get_row('acuerdo_nivel_servicio',array('acuerdo_nivel_id'=>$id_acuerdo));

		$data_view['acuerdo'] = $acuerdo;

		$data_view['servicio'] =  $this->general->get_row('servicio',array('servicio_id'=>$acuerdo->id_servicio));		
		$data_view['gestor'] =  $this->general->get_row('personal',array('id_personal'=>$acuerdo->gestor_servicio));
		$data_view['representante'] =  $this->general->get_row('personal',array('id_personal'=>$acuerdo->representante_cliente));

		$posiciones = array();     

		$posiciones[$acuerdo->posicion_terminacion] = 'terminacion';
		$posiciones[$acuerdo->posicion_modificacion] = 'modificacion';
		$posiciones[$acuerdo->posicion_niveles] = 'niveles';
		$posiciones[$acuerdo->posicion_soporte] = 'soporte';
		$posiciones[$acuerdo->posicion_responsabilidades] = 'responsabilidades' ;
		$posiciones[$acuerdo->posicion_contacto] = 'contacto' ;
		$posiciones[$acuerdo->posicion_costos] = 'costos';
		$posiciones[$acuerdo->posicion_glosario] = 'glosario';
		ksort($posiciones);

		$data_view['posiciones'] = $posiciones ;

		$this->utils->template($this->list_sidebar_niveles(1),'niveles/ans/estructura_ans',$data_view,'Niveles de Servicio | Acuerdos de Niveles de Servicio','','two_level');
			
	}

	public function modificar_estructura_acuerdo(){

		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$id_acuerdo = $this->input->post('id_acuerdo');
		$posiciones = $this->input->post('posiciones_estructura');

		for ($i=0; $i <= 7 ; $i++) { 
			
 						if($posiciones[$i] == 'terminacion')
                            {
                                $posicion_terminacion = ($i+1);
                            }
                        if($posiciones[$i] == 'modificacion')
                            {
                               $posicion_modificacion = ($i+1);
                            }
                        if($posiciones[$i] == 'niveles')
                            {
                                $posicion_niveles = ($i+1);
                            }
                        if($posiciones[$i] == 'soporte')
                            {
                                $posicion_soporte = ($i+1);
                            }
                        if($posiciones[$i] == 'responsabilidades')
                            {
                                $posicion_responsabilidades = ($i+1);
                            }
                        if($posiciones[$i] == 'contacto')
                            {
                                $posicion_contacto = ($i+1);
                            }
                        if($posiciones[$i] == 'costos')
                            {
                                $posicion_costos = ($i+1);
                            }
                        if($posiciones[$i] == 'glosario')
                            {
                               $posicion_glosario = ($i+1);
                          }
		}



		$acuerdo = array(
                				'posicion_terminacion'=>$posicion_terminacion,
                                'posicion_modificacion' => $posicion_modificacion,
                                'posicion_niveles' => $posicion_niveles,
                                'posicion_soporte' => $posicion_soporte,
                                'posicion_responsabilidades' => $posicion_responsabilidades,
                                'posicion_contacto' => $posicion_contacto,
                                'posicion_costos' => $posicion_costos,
                                'posicion_glosario' => $posicion_glosario,
                                );


		$resultado_acuerdo = $this->general->update2('acuerdo_nivel_servicio',$acuerdo,array('acuerdo_nivel_id'=>$id_acuerdo));

		            	if($resultado_acuerdo)
			            	{
			            		$ruta = $this->generar_pdf_acuerdo($id_acuerdo);

								$acuerdo = array(
                                'ruta_pdf' => $ruta,

                                );
                                $this->general->update2('acuerdo_nivel_servicio',$acuerdo,array('acuerdo_nivel_id'=>$id_acuerdo));

			            		$this->session->set_flashdata('Success', 'Los cambios en la Estructura del Acuerdo de Niveles de Servicio han sido almacenados con Éxito');
			            		//redirect(site_url('index.php/niveles_de_servicio/gestion_ANS/estructura_ANS/'.$id_acuerdo));
			            	}
			            else
			            	{
			            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al almacenar los cambios de la Estructura del Acuerdo de Niveles de Servicio');
			            		//redirect(site_url('index.php/niveles_de_servicio/gestion_ANS/estructura_ANS/'.$id_acuerdo));
			            	}

	     
			
	}


	public function estructura_predeterminada(){

		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$id_acuerdo = $this->input->post('id_acuerdo');

		$acuerdo = array(
                				'posicion_terminacion'=>1,
                                'posicion_modificacion' => 2,
                                'posicion_niveles' => 3,
                                'posicion_soporte' => 4,
                                'posicion_responsabilidades' =>5,
                                'posicion_contacto' => 6,
                                'posicion_costos' => 7,
                                'posicion_glosario' => 8,
                                );


		$resultado_acuerdo = $this->general->update2('acuerdo_nivel_servicio',$acuerdo,array('acuerdo_nivel_id'=>$id_acuerdo));

		            	if($resultado_acuerdo)
			            	{
			            		$ruta = $this->generar_pdf_acuerdo($id_acuerdo);

								$acuerdo = array(
                                'ruta_pdf' => $ruta,

                                );
                                $this->general->update2('acuerdo_nivel_servicio',$acuerdo,array('acuerdo_nivel_id'=>$id_acuerdo));

			            		$this->session->set_flashdata('Success', 'Los cambios en la Estructura del Acuerdo de Niveles de Servicio han sido almacenados con Éxito');
			            		//redirect(site_url('index.php/niveles_de_servicio/gestion_ANS/estructura_ANS/'.$id_acuerdo));
			            	}
			            else
			            	{
			            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al almacenar los cambios de la Estructura del Acuerdo de Niveles de Servicio');
			            		//redirect(site_url('index.php/niveles_de_servicio/gestion_ANS/estructura_ANS/'.$id_acuerdo));
			            	}

	     
			
	}


  public function generar_pdf_acuerdo($id_acuerdo = ''){

  		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');

  		$acuerdo = $this->general->get_row('acuerdo_nivel_servicio',array('acuerdo_nivel_id'=>$id_acuerdo));


  		$data_view['servicio'] =  $this->general->get_row('servicio',array('servicio_id'=>$acuerdo->id_servicio));		
		$data_view['gestor'] =  $this->general->get_row('personal',array('id_personal'=>$acuerdo->gestor_servicio));
		$data_view['representante'] =  $this->general->get_row('personal',array('id_personal'=>$acuerdo->representante_cliente));

		$servicio =  $this->general->get_row('servicio',array('servicio_id'=>$acuerdo->id_servicio));
		$data_view['proveedor'] =$this->general->get_row('servicio_proveedor',array('proveedor_id'=>$servicio->proveedor_servicio));

		$data_view['acuerdo'] = $acuerdo;


		$posiciones = array();     

		$posiciones[$acuerdo->posicion_terminacion] = 'terminacion';
		$posiciones[$acuerdo->posicion_modificacion] = 'modificacion';
		$posiciones[$acuerdo->posicion_niveles] = 'niveles';
		$posiciones[$acuerdo->posicion_soporte] = 'soporte';
		$posiciones[$acuerdo->posicion_responsabilidades] = 'responsabilidades' ;
		$posiciones[$acuerdo->posicion_contacto] = 'contacto' ;
		$posiciones[$acuerdo->posicion_costos] = 'costos';
		$posiciones[$acuerdo->posicion_glosario] = 'glosario';
		ksort($posiciones);

		$data_view['posiciones'] = $posiciones ;

  	
		$this->load->library('mpdf');
		$pdf = $this->load->view('niveles/ans/plantilla_ans.php',$data_view,TRUE);

		$mpdf = new mPDF();
		$mpdf->WriteHTML($pdf);
		$name = $id_acuerdo;

		
		/***** FUNCIONA EN  Linux ****/
		$ruta = $_SERVER['DOCUMENT_ROOT'].'/assets/documentacion_GNS/ANS/'.$name.'.pdf';

		
		/***** FUNCIONA EN  WINDOWS ****/
		//$ruta = './assets/documentacion_GNS/ANS/'.$name.'.pdf';

		if(file_exists($ruta)) 
		{unlink($ruta);}
		$mpdf->Output($ruta,'F');
		//$mpdf->Output($ruta,'I');


		return $ruta;


		//$this->utils->template($this->list_sidebar_niveles(1),'niveles/ans/plantilla_ans',$data_view,'Niveles de Servicio | Acuerdos de Niveles de Servicio','','two_level');
  }


   public function datos_requisitos(){


     	$id_requisito = $this->input->post('requisito_id');

   	    $requisito = $this->general->get_row('requisito_nivel_servicio',array('requisito_id'=>$id_requisito));

	
   	    //Conversión de formato de horas de disponibilidad 
		if($requisito->lunes_disp_ini != NULL) 
			{
			   $requisito->lunes_disp_ini = date("g:i A",strtotime($requisito->lunes_disp_ini));
			   $requisito->lunes_disp_fin = date("g:i A",strtotime($requisito->lunes_disp_fin));
			}

		if($requisito->martes_disp_ini != NULL) 
			{
			   $requisito->martes_disp_ini = date("g:i A",strtotime($requisito->martes_disp_ini));
			   $requisito->martes_disp_fin = date("g:i A",strtotime($requisito->martes_disp_fin));
			}

		if($requisito->miercoles_disp_ini != NULL) 
			{
			   $requisito->miercoles_disp_ini = date("g:i A",strtotime($requisito->miercoles_disp_ini));
			   $requisito->miercoles_disp_fin = date("g:i A",strtotime($requisito->miercoles_disp_fin));
			}
	    if($requisito->jueves_disp_ini != NULL) 
			{
			   $requisito->jueves_disp_ini = date("g:i A",strtotime($requisito->jueves_disp_ini));
			   $requisito->jueves_disp_fin = date("g:i A",strtotime($requisito->jueves_disp_fin));
			}
	  if($requisito->viernes_disp_ini != NULL) 
			{
			   $requisito->viernes_disp_ini = date("g:i A",strtotime($requisito->viernes_disp_ini));
			   $requisito->viernes_disp_fin = date("g:i A",strtotime($requisito->viernes_disp_fin));
			}
	   if($requisito->sabado_disp_ini != NULL) 
			{
			   $requisito->sabado_disp_ini = date("g:i A",strtotime($requisito->sabado_disp_ini));
			   $requisito->sabado_disp_fin = date("g:i A",strtotime($requisito->sabado_disp_fin));
			}
		if($requisito->domingo_disp_ini != NULL) 
			{
			   $requisito->domingo_disp_ini = date("g:i A",strtotime($requisito->domingo_disp_ini));
			   $requisito->domingo_disp_fin = date("g:i A",strtotime($requisito->domingo_disp_fin));
			}

		//Conversión de formato de horas de mantenimiento
		if($requisito->lunes_mant_ini != NULL) 
			{
			   $requisito->lunes_mant_ini = date("g:i A",strtotime($requisito->lunes_mant_ini));
			   $requisito->lunes_mant_fin = date("g:i A",strtotime($requisito->lunes_mant_fin));
			}

		if($requisito->martes_mant_ini != NULL) 
			{
			   $requisito->martes_mant_ini = date("g:i A",strtotime($requisito->martes_mant_ini));
			   $requisito->martes_mant_fin = date("g:i A",strtotime($requisito->martes_mant_fin));
			}

		if($requisito->miercoles_mant_ini != NULL) 
			{
			   $requisito->miercoles_mant_ini = date("g:i A",strtotime($requisito->miercoles_mant_ini));
			   $requisito->miercoles_mant_fin = date("g:i A",strtotime($requisito->miercoles_mant_fin));
			}
	    if($requisito->jueves_mant_ini != NULL) 
			{
			   $requisito->jueves_mant_ini = date("g:i A",strtotime($requisito->jueves_mant_ini));
			   $requisito->jueves_mant_fin = date("g:i A",strtotime($requisito->jueves_mant_fin));
			}
	  if($requisito->viernes_mant_ini != NULL) 
			{
			   $requisito->viernes_mant_ini = date("g:i A",strtotime($requisito->viernes_mant_ini));
			   $requisito->viernes_mant_fin = date("g:i A",strtotime($requisito->viernes_mant_fin));
			}
	   if($requisito->sabado_mant_ini != NULL) 
			{
			   $requisito->sabado_mant_ini = date("g:i A",strtotime($requisito->sabado_mant_ini));
			   $requisito->sabado_mant_fin = date("g:i A",strtotime($requisito->sabado_mant_fin));
			}
		if($requisito->domingo_mant_ini != NULL) 
			{
			   $requisito->domingo_mant_ini = date("g:i A",strtotime($requisito->domingo_mant_ini));
			   $requisito->domingo_mant_fin = date("g:i A",strtotime($requisito->domingo_mant_fin));
			}

		echo json_encode($requisito);


   }








}


?>
	
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Requisitos extends MX_Controller
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
	
	private $title = 'Requisitos de Niveles de Servicio';

	private function list_sidebar_niveles($index_active){
		$l =  array();

		$l[] = array(
			"chain" => "Inicio",
			"href" => site_url(''),
			"icon" => "fa fa-flag"
		);

		$l[] = array(
			"chain" => "Gestión de RNS",
			"href" => site_url('index.php/requisito_niveles_servicio/gestion_RNS'),
			"icon" => "fa fa-file-text"
		);


		$l[] = array(
			"chain" => "Gestión de ANS",
			"href" => site_url('index.php/niveles_de_servicio/gestion_ANS'),
			"icon" => "fa fa-suitcase"
		);

		/*$l[] = array(
			"chain" => "Gestión de ANS",
			"href" => site_url('index.php/niveles_de_servicio/gestion_ANS'),
			"icon" => "fa fa-suitcase"
		);

		$sublista = array(
			array(
				'chain' => 'Principal',
				'href'=> site_url('index.php/niveles_de_servicio/gestion_ANS')
			),

			array(
				'chain' => 'Crear ANS',
				'href'=> site_url('index.php/cargar_datos/servicio_categorias')
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

	public function requisitos_de_NS()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$data_view['servicios'] = $this->general->get_table('servicio');	
		$data_view['requisitos'] = $this->general->get_table('requisito_nivel_servicio');
		$this->utils->template($this->list_sidebar_niveles(1),'niveles/rns/requisitos_de_NS',$data_view,'Niveles de Servicio','','two_level');
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

		function requisito_check()
	{
		if (($this->general->exist('requisito_nivel_servicio',array('nombre' => $this->input->post('nombre_requisito')))))
		{
			$this->form_validation->set_message('requisito_check', 'Este Nombre de Documento de Requisitos ya existe en el Sistema');
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



	/*
	* Comienzo de la Creacion de Acuerdos de Niveles de Servicio.
    */

	public function crear_requisito_de_NS()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$data_view['servicios'] = $this->general->get_table('servicio');
		$data_view['personal'] = $this->general->get_table('personal');

	
		 $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));

		 $this->form_validation->set_rules('nombre_requisito', 'Nombre del Documento de Requisitos', 'required|trim|max_length[255]|callback_requisito_check');
         $this->form_validation->set_rules('servicio', 'Nombre del Servicio', 'callback_dropdown_servicio');
         $this->form_validation->set_rules('clientes', 'Cliente(s)', 'required|trim|max_length[500]');
         
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

      
         $this->form_validation->set_message('less_than', 'El porcentaje debe ser Menor o Igual a Cien');
         $this->form_validation->set_message('greater_than', 'El porcentaje debe ser Mayor a Cero');

         $this->form_validation->set_message('required', 'Campo Requerido');
         $this->form_validation->set_message('integer', 'Solo Números Enteros Permitidos');


		if ($this->form_validation->run($this) == FALSE)
            {

                $this->utils->template($this->list_sidebar_niveles(1),'niveles/rns/crear_requisito_de_NS',$data_view,'Requisitos de Niveles de Servicio','','two_level');
            }
  		else
            {
		       

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



		         $fecha_inicio = strtotime($this->input->post('fecha_inicio')); 
		         $fecha_inicio = date("Y-m-d", $fecha_inicio); 

		         $fecha_culminacion = strtotime($this->input->post('fecha_culminacion'));
		          $fecha_culminacion = date("Y-m-d", $fecha_culminacion); 
            	
                $requisito = array(
                				
                				'nombre'=>$this->input->post('nombre_requisito'),
                                'id_servicio' => $this->input->post('servicio'),
                                'cliente' => $this->input->post('clientes'),

                             
                                'fecha_creacion_requisito' => date('Y-m-d H:i:s'),

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

						
                                );

            	
			       	$id_requisito = $this->general->insert('requisito_nivel_servicio',$requisito,'');

	            	if($id_requisito)
		            	{
		            		$ruta = $this->generar_pdf_acuerdo($id_requisito);

								$requisito = array(
                                'ruta_pdf' => $ruta,

                                );
                               $this->general->update2('requisito_nivel_servicio',$requisito,array('requisito_id'=>$id_requisito));

		            		$this->session->set_flashdata('Success', 'El Nuevo Requisito de Niveles de Servicio ha sido Creado con Éxito');
		            		redirect(site_url('index.php/requisito_niveles_servicio/gestion_RNS'));
		            	}
		            else
		            	{
		            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Crear el Nuevo Requisito de Niveles de Servicio');
		            		redirect(site_url('index.php/requisito_niveles_servicio/gestion_RNS'));
		            	}

		       

            }
	}

	/*
	* FIN de la Creacion de Acuerdos de Niveles de Servicio.
    */


 	/*
	* Inicio: Mostrar Acuerdos de Niveles de Servicio.
    */
    public function ver_requisito_de_NS($id_requisito = '')
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$requisito = $this->general->get_row('requisito_nivel_servicio',array('requisito_id'=>$id_requisito));

		$data_view['requisito'] = $requisito;
		
		$data_view['servicio'] =  $this->general->get_row('servicio',array('servicio_id'=>$requisito->id_servicio));	
		
		$this->utils->template($this->list_sidebar_niveles(1),'niveles/rns/ver_requisito_de_NS',$data_view,'Requisitos de Niveles de Servicio','','two_level');
	}
	/*
	* FIN: Mostrar Acuerdos de Niveles de Servicio.
    */



	/*
	* Inicio: Modificar Acuerdos de Niveles de Servicio.
    */

	

	 public function modificar_requisito_de_NS($id_requisito = '')
	{


		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$this->load->model('general/general_model','general');	

		$data_view['requisito_id'] = $id_requisito;
		$requisito = $this->general->get_row('requisito_nivel_servicio',array('requisito_id'=>$id_requisito));

		$data_view['requisito'] = $requisito;

		$data_view['servicios'] = $this->general->get_table('servicio');

	
		 $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));



				 if(($this->input->post('nombre_requisito')) != ($requisito->nombre))
				 	{
		         		 $this->form_validation->set_rules('nombre_requisito', 'Nombre del Documento de Requisitos', 'required|trim|max_length[255]|callback_requisito_check');
				 	}
				 else
				 	{
				 		 $this->form_validation->set_rules('nombre_requisito', 'Nombre del Documento de Requisitos', 'required|trim|max_length[255]');
				 	}
         
         $this->form_validation->set_rules('servicio', 'Nombre del Servicio', 'callback_dropdown_servicio');
         $this->form_validation->set_rules('clientes', 'Cliente(s)', 'required|trim|max_length[500]');

               
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

       
         $this->form_validation->set_message('less_than', 'El porcentaje debe ser Menor o Igual a Cien');
         $this->form_validation->set_message('greater_than', 'El porcentaje debe ser Mayor a Cero');

         $this->form_validation->set_message('required', 'Campo Requerido');
         $this->form_validation->set_message('integer', 'Solo Números Enteros Permitidos');


		if ($this->form_validation->run($this) == FALSE)
            {

                $this->utils->template($this->list_sidebar_niveles(1),'niveles/rns/modificar/modificar_requisito_de_NS',$data_view,'Requisitos de Niveles de Servicio','','two_level');
            }
  		else
            {

		       

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




		       
           	
                $requisito = array(

                				'nombre'=>$this->input->post('nombre_requisito'),
                                'id_servicio' => $this->input->post('servicio'),
                                'cliente' => $this->input->post('clientes'),

                             
                                'fecha_modificacion_requisito' => date('Y-m-d H:i:s'),

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


                                );
            	
				       	$resultado_requisito = $this->general->update2('requisito_nivel_servicio',$requisito,array('requisito_id'=>$id_requisito));

		            	if($resultado_requisito)
			            	{
			            		$ruta = $this->generar_pdf_acuerdo($id_requisito);

								$requisito = array(
                                'ruta_pdf' => $ruta,

                                );
                               $this->general->update2('requisito_nivel_servicio',$requisito,array('requisito_id'=>$id_requisito));

			            		$this->session->set_flashdata('Success', 'El Requisito de Niveles de Servicio ha sido Actualizado con Éxito');
			            		redirect(site_url('index.php/requisito_niveles_servicio/gestion_RNS'));
			            	}
			            else
			            	{
			            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Actualizar el Requisito de Niveles de Servicio');
			            		redirect(site_url('index.php/requisito_niveles_servicio/gestion_RNS'));
			            	}
			          
			       

            }

	}



	/*
	* FIN: Modificar Acuerdos de Niveles de Servicio.
    */ 




	public function eliminar_requisito(){

		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$this->load->model('general/general_model','general');
		
		$id_requisito = $this->input->post('requisito_id');
		$delete = $this->general->delete('requisito_nivel_servicio',array('requisito_id'=>$id_requisito));
		
		if($delete)
	        {
				$this->session->set_flashdata('Success', 'El Requisito de Niveles de Servicio ha sido Eliminado con Éxito');
			}
		else
			{
				$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Eliminar el Requisito de Niveles de Servicio');
			}
		if($this->input->post('delete_ver'))
			{
				redirect(site_url('index.php/requisito_niveles_servicio/gestion_RNS'));
			}	
	}


	public function eliminar_requisitos(){

		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$this->load->model('general/general_model','general');

		$requisitos_id = $this->input->post('requisito_id');
		
		foreach ($requisitos_id as $requisito) {		    
			    
			 $delete = $this->general->delete('requisito_nivel_servicio',array('requisito_id'=>$requisito));
			}
		
		if($delete)
	        {
				$this->session->set_flashdata('Success', 'Los Requisitos de Niveles de Servicio han sido Eliminados con Éxito');
			}
		else
			{
				$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Eliminar Los Requisitos de Niveles de Servicio Seleccionados');
			}

			
	}



  public function generar_pdf_acuerdo($id_requisito = ''){

  		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');

  		$requisito = $this->general->get_row('requisito_nivel_servicio',array('requisito_id'=>$id_requisito));

		$data_view['requisito'] = $requisito;


  		$data_view['servicio'] =  $this->general->get_row('servicio',array('servicio_id'=>$requisito->id_servicio));		

		  	
		$this->load->library('mpdf');
		$pdf = $this->load->view('niveles/rns/plantilla_rns.php',$data_view,TRUE);

		$mpdf = new mPDF();
		$mpdf->WriteHTML($pdf);
		$name = $id_requisito;
		$ruta = './assets/documentacion_GNS/RNS/'.$name.'.pdf';
		if(file_exists($ruta)) 
		{unlink($ruta);}
		$mpdf->Output($ruta,'F');
		//$mpdf->Output($ruta,'I');


		return $ruta;


		//$this->utils->template($this->list_sidebar_niveles(1),'niveles/rns/plantilla_rns',$data_view,'Niveles de Servicio','','two_level');
  }










}


?>
	
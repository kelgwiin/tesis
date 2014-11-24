<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Revisiones extends MX_Controller
{
	function __construct()
	{
        parent::__construct();

		$this->load->model('general/general_model','general');
		$this->load->model('niveles/niveles_model','niveles');
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

		$l[] = array(
			"chain" => "Gestión de ANS",
			"href" => site_url('index.php/niveles_de_servicio/gestion_ANS'),
			"icon" => "fa fa-suitcase"
		);

		$l[] = array(
			"chain" => "Gestión de Revisiones",
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

	

	
	public function index()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');

		$fecha_actual = date('Y-m-j H:i:s');

		$date = date('Y-m-d');
		$newdate = strtotime ( '+8 day' , strtotime ( $date ) ) ;
		$fecha_proxima = date ( 'Y-m-d 23:59:00' , $newdate );

		$eventos_recientes = $this->niveles->obtener_revisiones_recientes($fecha_actual,$fecha_proxima);

		$data_view['eventos_recientes']	= $eventos_recientes;
		$data_view['inicio']	= $fecha_actual;
		$data_view['fin']	= $fecha_proxima;

		$this->utils->template($this->list_sidebar_niveles(1),'niveles/revisiones/revisiones',$data_view,'Reuniones y Revisiones','','two_level');
	}



	function fechas_check()
	{
		if ($this->input->post('evento_fin'))
		{
			if ($this->input->post('evento_fin') == $this->input->post('evento_inicio'))
			{
				$this->form_validation->set_message('fechas_check', 'La Fecha y Hora de Inicio y Fin del Evento no pueden ser Iguales');
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

	function dropdown_tipo_evento()
	{
		if ($this->input->post('tipo_evento') === 'seleccione')
		{
			$this->form_validation->set_message('dropdown_tipo_evento', 'Por favor seleccione un Tipo de Evento');
			return FALSE;
		}
		else
		{
			return TRUE;
		}	
	}


	public function nuevo_evento()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');

		

		 $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));
		 $this->form_validation->set_rules('tipo_evento', 'Tipo de Evento', 'callback_dropdown_tipo_evento');
         $this->form_validation->set_rules('nombre_evento', 'Nombre del Evento', 'required|min_length[3]|max_length[250]|trim|callback_categoria_name_check');
         $this->form_validation->set_rules('lugar_evento', 'Lugar del Evento', 'trim|max_length[500]');
         $this->form_validation->set_rules('descripcion_evento', 'Descripción del Evento', 'trim|max_length[500]');
         $this->form_validation->set_rules('evento_inicio', 'Inicio del Evento', 'required|trim');
         $this->form_validation->set_rules('evento_fin', 'Fin del Evento', 'required|trim|callback_fechas_check');

         $this->form_validation->set_message('required', 'Campo Requerido');
         $this->form_validation->set_message('integer', 'Solo Números Enteros Permitidos');

         $data_view['mensaje'] = '';
         
         if ($this->form_validation->run($this) == FALSE)
            {
            		$fecha_actual = date('Y-m-j H:i:s');

					$date = date('Y-m-d');
					$newdate = strtotime ( '+8 day' , strtotime ( $date ) ) ;
					$fecha_proxima = date ( 'Y-m-d 23:59:00' , $newdate );

					$eventos_recientes = $this->niveles->obtener_revisiones_recientes($fecha_actual,$fecha_proxima);

					$data_view['eventos_recientes']	= $eventos_recientes;
					$data_view['inicio']	= $fecha_actual;
					$data_view['fin']	= $fecha_proxima;

               $this->utils->template($this->list_sidebar_niveles(1),'niveles/revisiones/revisiones',$data_view,'Reuniones y Revisiones','','two_level');
            }
            else
            {


            	 $fecha_inicio = strtotime($this->input->post('evento_inicio')); 
		         $fecha_inicio = date("Y-m-d H:i:s", $fecha_inicio); 

		         $fecha_fin = strtotime($this->input->post('evento_fin')); 
		         $fecha_fin = date("Y-m-d H:i:s", $fecha_fin); 


            	  $evento = array(

            					'nombre_evento' => $this->input->post('nombre_evento'),
            					'lugar_evento' => $this->input->post('lugar_evento'),
            					'inicio' => $fecha_inicio,
            					'fin' => $fecha_fin,
            					'descripcion_evento' => $this->input->post('descripcion_evento'),
                               );

			       $id_evento = $this->general->insert('evento_gns',$evento,'');

	            	if($id_evento)
		            	{
		            		$this->session->set_flashdata('Success', 'Evento Creado con Éxito');
		            		redirect(site_url('index.php/niveles/revisiones/revisiones'));
		            	}
		            else
		            	{
		            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Crear el Evento');
		            		redirect(site_url('index.php/niveles/revisiones/revisiones'));
		            	}

		       
                
            }
	}



	public function obtener_eventos()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$eventos = $this->general->get_table('evento_gns');	

		$i = 0;
		foreach ($eventos as $evento) {
			
			$eventos_calendario[$i]['id'] = $evento->id_evento;
			$eventos_calendario[$i]['title'] = $evento->nombre_evento;

			$eventos_calendario[$i]['descripcion'] = $evento->descripcion_evento;
			$eventos_calendario[$i]['lugar'] = $evento->lugar_evento;

			$eventos_calendario[$i]['tipo'] = $evento->tipo_evento;

			$inicio=str_replace(" ", "T", $evento->inicio);
			$eventos_calendario[$i]['start'] = $inicio;

			$fin=str_replace(" ", "T", $evento->fin);
			$eventos_calendario[$i]['end'] = $fin;


			$inicio = date_create($evento->inicio);
			$eventos_calendario[$i]['inicio'] =  date_format($inicio,'d/m/Y h:i a');

			$fin = date_create($evento->fin);
			$eventos_calendario[$i]['fin'] =  date_format($fin,'d/m/Y h:i a');

			if($evento->tipo_evento == "revision_ANS")
				{
					$eventos_calendario[$i]['color'] = '#42A321';
				}

			if($evento->tipo_evento == "renovacion_ANS")
				{
					$eventos_calendario[$i]['color'] = '#FF7519';
				}

			if($evento->tipo_evento == "vencimiento_ANS")
				{
					$eventos_calendario[$i]['color'] = '#E64545';	
					$eventos_calendario[$i]['allDay'] = true;
				}

			if($evento->tipo_evento == "reunion")
				{
					$eventos_calendario[$i]['color'] = '#3366FF';
				}

			if($evento->tipo_evento == "otro")
				{
					$eventos_calendario[$i]['color'] = '#8E8E86';
				}

			$i++;
		}

		echo json_encode($eventos_calendario);

	}




}


?>
	
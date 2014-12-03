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


		$this->load->model('continuidad/gestionriesgos_model','riesgos');


		$fecha_actual = date('Y-m-j H:i:s');

		$date = date('Y-m-d');
		$newdate = strtotime ( '+8 day' , strtotime ( $date ) ) ;
		$fecha_proxima = date ( 'Y-m-d 23:59:00' , $newdate );

		$eventos_recientes = $this->niveles->obtener_revisiones_recientes($fecha_actual,$fecha_proxima);

		$data_view['eventos_recientes']	= $eventos_recientes;
		$data_view['inicio']	= $fecha_actual;
		$data_view['fin']	= $fecha_proxima;

		$data_view['nuevo'] = true;

		$data_view['modificacion'] = true;

		$data_view['personal'] = $this->riesgos->get_personal();

		$data_view['asistentes_evento'] = array();

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

         // $this->form_validation->set_rules('asistentes_evento[]', 'asistentes', 'trim');
         //  $this->form_validation->set_rules('personal[]', 'personal', 'trim');

         $this->form_validation->set_message('required', 'Campo Requerido');
         $this->form_validation->set_message('integer', 'Solo Números Enteros Permitidos');

         $data_view['mensaje'] = '';

         $this->load->model('continuidad/gestionriesgos_model','riesgos');

		 $data_view['personal'] = $this->riesgos->get_personal();


		 if($this->input->post('asistentes_evento'))
		 {
		 	$data_view['asistentes_evento'] = $this->input->post('asistentes_evento');

		 	 foreach ($this->input->post('asistentes_evento') as $valor) {
			
			$persona = $this->general->get_row('personal',array('id_personal'=>$valor));

			$asistentes_evento[$valor]['id_personal'] = $persona->id_personal;
			$asistentes_evento[$valor]['nombre'] = $persona->nombre;
			$asistentes_evento[$valor]['codigo_empleado'] = $persona->codigo_empleado;

			$departamento = $this->general->get_row('departamento',array('departamento_id'=>$persona->id_departamento));

			$asistentes_evento[$valor]['departamento'] = $departamento->nombre;
			}

			


			$data_view['asistentes'] = $asistentes_evento;

		 }



		 

		



         
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
					
					$data_view['nuevo'] = true;

					$data_view['modificacion'] = false;

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




	public function modificar_evento()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');

		

		 $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));
		 $this->form_validation->set_rules('tipo_evento_modificar', 'Tipo de Evento', 'callback_dropdown_tipo_evento');
         $this->form_validation->set_rules('nombre_evento_modificar', 'Nombre del Evento', 'required|min_length[3]|max_length[250]|trim|callback_categoria_name_check');
         $this->form_validation->set_rules('lugar_evento_modificar', 'Lugar del Evento', 'trim|max_length[500]');
         $this->form_validation->set_rules('descripcion_evento_modificar', 'Descripción del Evento', 'trim|max_length[500]');
         $this->form_validation->set_rules('evento_inicio_modificar', 'Inicio del Evento', 'required|trim');
         $this->form_validation->set_rules('evento_fin_modificar', 'Fin del Evento', 'required|trim|callback_fechas_check');

         $this->form_validation->set_rules('id_evento_modificar', 'ID del Evento', 'trim');

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
					$data_view['modificacion'] = true;
					$data_view['nuevo'] = false;

               $this->utils->template($this->list_sidebar_niveles(1),'niveles/revisiones/revisiones',$data_view,'Reuniones y Revisiones','','two_level');
            }
            else
            {


            	 $fecha_inicio = strtotime($this->input->post('evento_inicio_modificar')); 
		         $fecha_inicio = date("Y-m-d H:i:s", $fecha_inicio); 

		         $fecha_fin = strtotime($this->input->post('evento_fin_modificar')); 
		         $fecha_fin = date("Y-m-d H:i:s", $fecha_fin); 


            	  $evento = array(

            					'nombre_evento' => $this->input->post('nombre_evento_modificar'),
            					'lugar_evento' => $this->input->post('lugar_evento_modificar'),
            					'inicio' => $fecha_inicio,
            					'fin' => $fecha_fin,
            					'descripcion_evento' => $this->input->post('descripcion_evento_modificar'),
                               );

			       $id_evento = $this->general->update2('evento_gns',$evento,array('id_evento'=> $this->input->post('id_evento_modificar')));

	            	if($id_evento)
		            	{
		            		$this->session->set_flashdata('Success', 'Evento Modificado con Éxito');
		            		redirect(site_url('index.php/niveles/revisiones/revisiones'));
		            	}
		            else
		            	{
		            		$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Modificar el Evento');
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


	public function obtener_evento()
	{

		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');

		$id_evento = $this->input->post('evento_id');


		$evento = $this->general->get_row('evento_gns',array('id_evento'=>$id_evento));

		$evento_calendario['id'] = $evento->id_evento;
		$evento_calendario['title'] = $evento->nombre_evento;

		$evento_calendario['descripcion'] = $evento->descripcion_evento;
		$evento_calendario['lugar'] = $evento->lugar_evento;

		$evento_calendario['tipo'] = $evento->tipo_evento;

		$inicio = date_create($evento->inicio);
		$evento_calendario['inicio'] =  date_format($inicio,'d/m/Y h:i A');

		$fin = date_create($evento->fin);
		$evento_calendario['fin'] =  date_format($fin,'d/m/Y h:i A');

		echo json_encode($evento_calendario);

	}


	public function eliminar_evento($evento_id = '')
	{

		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');

		$id_evento = $this->input->post('evento_id');

		
		$delete = $this->general->delete('evento_gns',array('id_evento'=>$id_evento));
		if($delete)
	        {
				$this->session->set_flashdata('Success', 'El Evento ha sido Eliminado con Éxito');
			}
		else
			{
				$this->session->set_flashdata('Error', 'Ha ocurrido un problema al Eliminar el Evento');
			}	

	}




}


?>
	
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

	

	
	public function index()
	{
		//modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');


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

		$data_view['asistentes'] = array();

		$data_view['acuerdos'] = $this->general->get_table('acuerdo_nivel_servicio');

		$this->utils->template($this->list_sidebar_niveles(1),'niveles/revisiones/revisiones',$data_view,'Niveles de Servicio | Reuniones y Revisiones de Niveles de Servicio','','two_level');
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


	function fechas_check2()
	{
		if ($this->input->post('evento_fin') && $this->input->post('evento_inicio'))
		{
			 $fecha_inicio = strtotime($this->input->post('evento_inicio')); 
		     $fecha_inicio = date("Y-m-d H:i:s", $fecha_inicio); 

		      $fecha_fin = strtotime($this->input->post('evento_fin')); 
		      $fecha_fin = date("Y-m-d H:i:s", $fecha_fin); 

			if ($fecha_inicio > $fecha_fin)
			{
				$this->form_validation->set_message('fechas_check2', 'La Fecha y Hora de Inicio del Evento no pueden ser Mayor a la de Culminación');
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



		function fechas_check_modificar()
	{
		if ($this->input->post('fin_evento_modificar'))
		{
			if ($this->input->post('fin_evento_modificar') == $this->input->post('inicio_evento_modificar'))
			{
				$this->form_validation->set_message('fechas_check_modificar', 'La Fecha y Hora de Inicio y Fin del Evento no pueden ser Iguales');
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


	function fechas_check2_modificar()
	{
		if ($this->input->post('fin_evento_modificar') && $this->input->post('inicio_evento_modificar'))
		{
			 $fecha_inicio = strtotime($this->input->post('inicio_evento_modificar')); 
		     $fecha_inicio = date("Y-m-d H:i:s", $fecha_inicio); 

		      $fecha_fin = strtotime($this->input->post('fin_evento_modificar')); 
		      $fecha_fin = date("Y-m-d H:i:s", $fecha_fin); 

			if ($fecha_inicio > $fecha_fin)
			{
				$this->form_validation->set_message('fechas_check2_modificar', 'La Fecha y Hora de Inicio del Evento no pueden ser Mayor a la de Culminación');
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

	function dropdown_acuerdos()
	{
		if ( ($this->input->post('tipo_evento') == 'revision_ANS')||($this->input->post('tipo_evento') =='renovacion_ANS') )
		{
			if($this->input->post('acuerdos') == 'seleccione'){
			$this->form_validation->set_message('dropdown_acuerdos', 'Por favor seleccione un Acuerdo de Niveles Servicio');
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

	function dropdown_acuerdos_modificar()
	{
		if ( ($this->input->post('tipo_evento_modificar') == 'revision_ANS')||($this->input->post('tipo_evento_modificar') =='renovacion_ANS') )
		{
			if($this->input->post('acuerdos_modificar') == 'seleccione'){
			$this->form_validation->set_message('dropdown_acuerdos_modificar', 'Por favor seleccione un Acuerdo de Niveles Servicio');
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


	public function nuevo_evento()
	{
		//modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');

		

		 $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));
		 $this->form_validation->set_rules('tipo_evento', 'Tipo de Evento', 'callback_dropdown_tipo_evento');
         $this->form_validation->set_rules('nombre_evento', 'Nombre del Evento', 'required|min_length[3]|max_length[250]|trim|callback_categoria_name_check');
         $this->form_validation->set_rules('lugar_evento', 'Lugar del Evento', 'trim|max_length[500]');
         $this->form_validation->set_rules('descripcion_evento', 'Descripción del Evento', 'trim|max_length[500]');
         $this->form_validation->set_rules('evento_inicio', 'Inicio del Evento', 'required|trim');
         $this->form_validation->set_rules('evento_fin', 'Fin del Evento', 'required|trim|callback_fechas_check|callback_fechas_check2');
         $this->form_validation->set_rules('acuerdos', 'Acuerdos', 'callback_dropdown_acuerdos');

         // $this->form_validation->set_rules('asistentes_evento[]', 'asistentes', 'trim');
         //  $this->form_validation->set_rules('personal[]', 'personal', 'trim');

         $this->form_validation->set_message('required', 'Campo Requerido');
         $this->form_validation->set_message('integer', 'Solo Números Enteros Permitidos');

         $data_view['mensaje'] = '';


		$data_view['acuerdos'] = $this->general->get_table('acuerdo_nivel_servicio');

         $this->load->model('continuidad/gestionriesgos_model','riesgos');

		 $data_view['personal'] = $this->riesgos->get_personal();
 

		$data_view['asistentes_evento'] = array();

		$data_view['asistentes'] = array();
		
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





               $this->utils->template($this->list_sidebar_niveles(1),'niveles/revisiones/revisiones',$data_view,'Niveles de Servicio | Reuniones y Revisiones de Niveles de Servicio','','two_level');
            }
            else
            {


            	 $fecha_inicio = strtotime($this->input->post('evento_inicio')); 
		         $fecha_inicio = date("Y-m-d H:i:s", $fecha_inicio); 

		         $fecha_fin = strtotime($this->input->post('evento_fin')); 
		         $fecha_fin = date("Y-m-d H:i:s", $fecha_fin); 


            	  $evento = array(

            					'nombre_evento' => $this->input->post('nombre_evento'),
            					'tipo_evento' => $this->input->post('tipo_evento'),
            					'lugar_evento' => $this->input->post('lugar_evento'),
            					'inicio' => $fecha_inicio,
            					'fin' => $fecha_fin,
            					'descripcion_evento' => $this->input->post('descripcion_evento'),
                               );

			       $id_evento = $this->general->insert('evento_gns',$evento,'');

            

	            	if($id_evento)
		            	{

		            		//Relacion de ANS con el Evento
		            		if(($this->input->post('tipo_evento') == 'revision_ANS')||($this->input->post('tipo_evento') =='renovacion_ANS'))
		            		{
			            		if($this->input->post('acuerdos'))
			            		{
			            			$id_acuerdo = $this->input->post('acuerdos');


			            			$evento_ANS = array(
				                                'id_evento' => $id_evento,
				                                'acuerdo_nivel_id' => $id_acuerdo,  
				                                );



			            			$id_evento_ANS = $this->general->insert('evento_ans',$evento_ANS,'');



			            		}
		            		}



		            		// Inserta los asistentes al evento
		            		if($this->input->post('asistentes_evento'))
			            			{
					            		foreach ($this->input->post('asistentes_evento') as $key => $asistente_evento)
									       	{
									       		$asistencia = false;

									       		if( !($this->general->exist('asistente_evento',array('id_personal'=> $asistente_evento,'id_evento'=> $id_evento))) )
									       		{
									       		  $asistentes = array(
									                                'id_evento' => $id_evento,
									                                'id_personal' => $asistente_evento,  
									                                );

									            	$this->general->insert('asistente_evento',$asistentes,'');
									            }

									             if(($this->general->exist('asistente_evento',array('id_personal'=> $asistente_evento,'id_evento'=> $id_evento))) )
									       		{
									       			$asistencia = true;
									       		}
									       	}

									       	if($asistencia)
									       	{
							            		$this->session->set_flashdata('Success', 'Evento Creado con Éxito');
							            		redirect(site_url('index.php/niveles/revisiones/revisiones'));
						            		}
							            	else
							            	{
							            		$this->session->set_flashdata('Error', 'El Evento fue Creado, Pero ha ocurrido un problema al Agregar los Asistentes del Evento'.count($this->input->post('asistentes_evento')) );
							            		redirect(site_url('index.php/niveles/revisiones/revisiones'));
							            	}
						           }

								  else
									  {

									  	$this->session->set_flashdata('Success', 'Evento Creado con Éxito');
						            	redirect(site_url('index.php/niveles/revisiones/revisiones'));
									  }
							     //Fin de inserta asistentes al evento


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
		//modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');

		

		 $this->load->library('form_validation');
		 $this->load->helper(array('form', 'url'));
		 $this->form_validation->set_rules('tipo_evento_modificar', 'Tipo de Evento', 'callback_dropdown_tipo_evento');
		 
         $this->form_validation->set_rules('nombre_evento_modificar', 'Nombre del Evento', 'required|min_length[3]|max_length[250]|trim|callback_categoria_name_check');
         $this->form_validation->set_rules('lugar_evento_modificar', 'Lugar del Evento', 'trim|max_length[500]');
         $this->form_validation->set_rules('descripcion_evento_modificar', 'Descripción del Evento', 'trim|max_length[500]');
         $this->form_validation->set_rules('inicio_evento_modificar', 'Inicio del Evento', 'required|trim');
         $this->form_validation->set_rules('fin_evento_modificar', 'Fin del Evento', 'required|trim|callback_fechas_check_modificar|callback_fechas_check2_modificar');

         $this->form_validation->set_rules('id_evento_modificar', 'ID del Evento', 'trim');

         $this->form_validation->set_rules('acuerdos_modificar', 'Acuerdos', 'callback_dropdown_acuerdos_modificar');

         $this->form_validation->set_message('required', 'Campo Requerido');
         $this->form_validation->set_message('integer', 'Solo Números Enteros Permitidos');

         $data_view['mensaje'] = '';

         $data_view['acuerdos'] = $this->general->get_table('acuerdo_nivel_servicio');



        $this->load->model('continuidad/gestionriesgos_model','riesgos');

		$data_view['personal'] = $this->riesgos->get_personal();
 

		$data_view['asistentes_evento'] = array();

		$data_view['asistentes'] = array();
		
		 if($this->input->post('asistentes_evento_modificar'))
					 {
					 	$data_view['asistentes_evento'] = $this->input->post('asistentes_evento_modificar');

					 	 foreach ($this->input->post('asistentes_evento_modificar') as $valor) {
						
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
					//$data_view['inicio']	= $fecha_actual;
					//$data_view['fin']	= $fecha_proxima;
					$data_view['modificacion'] = true;
					$data_view['nuevo'] = false;

               $this->utils->template($this->list_sidebar_niveles(1),'niveles/revisiones/revisiones',$data_view,'Niveles de Servicio | Reuniones y Revisiones de Niveles de Servicio','','two_level');
            }
            else
            {

            		 // Comienzo de modificacion de la relacion entre un ANS y un Evento
            	     $delete_bandera = true;

					 $update_bandera = true;

					 $insert_bandera = true;


					 $evento = $this->general->get_row('evento_gns',array('id_evento'=>$this->input->post('id_evento_modificar')));

					 $evento_ans = $this->general->get_row('evento_ans',array('id_evento'=>$this->input->post('id_evento_modificar')));

					 $id_ans_evento = $evento_ans->acuerdo_nivel_id ;


					 if( ($evento->tipo_evento == 'revision_ANS')||( $evento->tipo_evento =='renovacion_ANS') )
						{
							 if ( ($this->input->post('tipo_evento_modificar') != 'revision_ANS') && ( $this->input->post('tipo_evento_modificar') !='renovacion_ANS') )
								{ 

									if( ($this->general->exist('evento_ans',array('id_evento'=> $this->input->post('id_evento_modificar'),'acuerdo_nivel_id'=> $id_ans_evento))))
							       		{
							      
							            	$delete_bandera = $this->general->delete('evento_ans',array('id_evento'=> $this->input->post('id_evento_modificar'),'acuerdo_nivel_id'=> $id_ans_evento));
							            }

								}
							 else{							

									 	 $ans_evento = $this->general->get_row('evento_ans',array('id_evento'=>$this->input->post('id_evento_modificar')));

									 	 $ans_evento = $ans_evento->acuerdo_nivel_id;

									 	 if($ans_evento != $this->input->post('acuerdos_modificar'))
									 	 	{
									 	 		$evento_ANS = array(
						                                'acuerdo_nivel_id' => $this->input->post('acuerdos_modificar'),  
						                                );
									 	 		$update_bandera = $evento_ans_modificado = $this->general->update2('evento_ans',$evento_ANS,array('id_evento'=> $this->input->post('id_evento_modificar'),'acuerdo_nivel_id'=> $ans_evento));

									 	 	}							 	 

							 }							

						}
					else{

							if ( ($this->input->post('tipo_evento_modificar') == 'revision_ANS') || ( $this->input->post('tipo_evento_modificar') =='renovacion_ANS') )
								{

									$id_acuerdo = $this->input->post('acuerdos_modificar');


				            			$evento_ANS = array(
					                                'id_evento' => $this->input->post('id_evento_modificar'),
					                                'acuerdo_nivel_id' => $id_acuerdo,  
					                                );



				            			 $this->general->insert('evento_ans',$evento_ANS,'');

				            			 $insert_bandera = $this->general->exist('evento_ans',array('id_evento'=> $this->input->post('id_evento_modificar'),'acuerdo_nivel_id'=> $id_acuerdo));

								}

						}

				// Fin de modificacion de la relacion entre un ANS y un Evento


				// Comienzo modificacion de evento
            	 $fecha_inicio = strtotime($this->input->post('inicio_evento_modificar')); 
		         $fecha_inicio = date("Y-m-d H:i:s", $fecha_inicio);


		         $fecha_fin = strtotime($this->input->post('fin_evento_modificar')); 
		         $fecha_fin = date("Y-m-d H:i:s", $fecha_fin); 


            	  $evento = array(

            					'nombre_evento' => $this->input->post('nombre_evento_modificar'),
            					'tipo_evento' => $this->input->post('tipo_evento_modificar'),
            					'lugar_evento' => $this->input->post('lugar_evento_modificar'),
            					'inicio' => $fecha_inicio,
            					'fin' => $fecha_fin,
            					'descripcion_evento' => $this->input->post('descripcion_evento_modificar'),
                               );

			       $id_evento = $this->general->update2('evento_gns',$evento,array('id_evento'=> $this->input->post('id_evento_modificar')));

			       // Fin modificacion de evento


			       // Comienzo modificacion de Asistentes al Evento
			       $asistentes_bandera = true;
			       $personal_bandera = true;

			       if($this->input->post('asistentes_evento_modificar'))
					 {

					 	foreach ($this->input->post('asistentes_evento_modificar') as $asistente) {
					 	
					 		$asistentes_bandera = false;
				       		if( !($this->general->exist('asistente_evento',array('id_personal'=> $asistente,'id_evento'=> $this->input->post('id_evento_modificar')))) )
				       		{
				       		  $persona_asistente = array(
				                                'id_evento' => $this->input->post('id_evento_modificar'),
				                                'id_personal' => $asistente,  
				                                );

				            	$this->general->insert('asistente_evento',$persona_asistente,'');
				            }
				             if(($this->general->exist('asistente_evento',array('id_personal'=> $asistente,'id_evento'=> $this->input->post('id_evento_modificar')))) )
				       		{
				       			$asistentes_bandera = true;
				       		}

					 	}

					 }

				   if($this->input->post('personal_modificar'))
					 {

					 	foreach ($this->input->post('personal_modificar') as $asistente) {
					 	
					 		$personal_bandera = false;
				       		if( ($this->general->exist('asistente_evento',array('id_personal'=> $asistente,'id_evento'=> $this->input->post('id_evento_modificar')))) )
				       		{
				            	$this->general->delete('asistente_evento',array('id_personal'=> $asistente,'id_evento'=> $this->input->post('id_evento_modificar')));
				            }
				             if(!($this->general->exist('asistente_evento',array('id_personal'=> $asistente,'id_evento'=> $this->input->post('id_evento_modificar')))) )
				       		{
				       			$personal_bandera = true;
				       		}

					 	}

					 }
					  // Fin modificacion de Asistentes al Evento
					 


	            	if($id_evento && $asistentes_bandera && $personal_bandera && $delete_bandera && $update_bandera && $insert_bandera)
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
		//modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$eventos = $this->general->get_table('evento_gns');	

		$i = 0;
		foreach ($eventos as $evento) {
			
			$eventos_calendario[$i]['id'] = $evento->id_evento;
			$eventos_calendario[$i]['title'] = $evento->nombre_evento;

			$eventos_calendario[$i]['descripcion'] = $evento->descripcion_evento;
			$eventos_calendario[$i]['lugar'] = $evento->lugar_evento;

			$eventos_calendario[$i]['tipo'] = $evento->tipo_evento;

			if (( $evento->tipo_evento == 'revision_ANS') || ($evento->tipo_evento =='renovacion_ANS') )
			{
				$acuerdo = $this->general->get_row('evento_ans',array('id_evento'=> $evento->id_evento));

				$acuerdo_info = $this->general->get_row('acuerdo_nivel_servicio',array('acuerdo_nivel_id'=> $acuerdo->acuerdo_nivel_id));

				$eventos_calendario[$i]['acuerdo'] =  $acuerdo->acuerdo_nivel_id;

				$eventos_calendario[$i]['acuerdo_nombre'] =  $acuerdo_info->nombre_acuerdo;
			}

			$inicio=str_replace(" ", "T", $evento->inicio);
			$eventos_calendario[$i]['start'] = $inicio;

			$fin=str_replace(" ", "T", $evento->fin);
			$eventos_calendario[$i]['end'] = $fin;


			$inicio = date_create($evento->inicio);
			$eventos_calendario[$i]['inicio'] =  date_format($inicio,'m/d/Y h:i a');
			$eventos_calendario[$i]['fecha_inicio'] =  date_format($inicio,'d/m/Y h:i a');

			$fin = date_create($evento->fin);
			$eventos_calendario[$i]['fin'] =  date_format($fin,'m/d/Y h:i a');
			$eventos_calendario[$i]['fecha_fin'] =  date_format($fin,'d/m/Y h:i a');

			if($evento->tipo_evento == "revision_ANS")
				{
					$eventos_calendario[$i]['color'] = '#42A321';
				}

			if($evento->tipo_evento == "renovacion_ANS")
				{
					$eventos_calendario[$i]['color'] = '#7A5C99';
				}


			if($evento->tipo_evento == "recordatorio_ANS")
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

			if($evento->inicio == $evento->fin)
			{
				$eventos_calendario[$i]['allDay'] = true;
			}

				//$evento_calendario['asistentes'] = $this->general->get_result('asistente_evento',array('id_evento'=> $id_evento)); 

				$asistentes = $this->general->get_result('asistente_evento',array('id_evento'=> $evento->id_evento)); 

				$j = 0;

				$asistentes_evento = array();

				foreach ($asistentes as $asistente) {				

					$asistentes_evento[$j] = $this->general->get_row('personal',array('id_personal'=>$asistente->id_personal));

					$departamento = $this->general->get_row('departamento',array('departamento_id'=>$asistentes_evento[$j]->id_departamento));

					$asistentes_evento[$j]->departamento = $departamento->nombre;

					$j++;
				}

				$eventos_calendario[$i]['asistentes'] = $asistentes_evento;

			$i++;
		}

		echo json_encode($eventos_calendario);

	}


	public function obtener_evento()
	{

		//modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');

		$id_evento = $this->input->post('evento_id');


		$evento = $this->general->get_row('evento_gns',array('id_evento'=>$id_evento));

		$evento_calendario['id'] = $evento->id_evento;
		$evento_calendario['title'] = $evento->nombre_evento;

		$evento_calendario['descripcion'] = $evento->descripcion_evento;
		$evento_calendario['lugar'] = $evento->lugar_evento;

		$evento_calendario['tipo'] = $evento->tipo_evento;

		$inicio = date_create($evento->inicio);
		$evento_calendario['inicio'] =  date_format($inicio,'m/d/Y h:i A');

		$fin = date_create($evento->fin);
		$evento_calendario['fin'] =  date_format($fin,'m/d/Y h:i A');


		$asistentes = $this->general->get_result('asistente_evento',array('id_evento'=> $evento->id_evento));

		$evento_calendario['acuerdo'] = -1;

		if (( $evento->tipo_evento == 'revision_ANS')|| ($evento->tipo_evento =='renovacion_ANS') )
		{
			$acuerdo = $this->general->get_row('evento_ans',array('id_evento'=> $evento->id_evento));

			$evento_calendario['acuerdo'] =  $acuerdo->acuerdo_nivel_id;
		}


		if(count($asistentes) > 0)
			{

				//$evento_calendario['lista_asistentes'] = $asistentes; 

						$j = 0;

						$asistentes_evento = array();

						foreach ($asistentes as $asistente) {				

							$asistentes_evento[$j] = $this->general->get_row('personal',array('id_personal'=>$asistente->id_personal));

							$departamento = $this->general->get_row('departamento',array('departamento_id'=>$asistentes_evento[$j]->id_departamento));

							$asistentes_evento[$j]->departamento = $departamento->nombre;

							$asistentes_arreglo[$j] =  $asistente->id_personal;

							$j++;
						}

				
				$evento_calendario['asistentes'] = $asistentes_evento;
				$evento_calendario['asistentes_arreglo'] = $asistentes_arreglo;
		    }

		else
			{
				$evento_calendario['asistentes'] = array();
				$evento_calendario['asistentes_arreglo'] = array();

			}

		$this->load->model('continuidad/gestionriesgos_model','riesgos');
		$evento_calendario['empleados'] = $this->riesgos->get_personal();

		echo json_encode($evento_calendario);

	}


	public function eliminar_evento($evento_id = '')
	{

		//modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');

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



	public function notificar_evento($evento_id = '')
	{

		$id_evento = $this->input->post('evento_id');

		$asistentes =   $this->input->post('asistentes');

		$evento = $this->general->get_row('evento_gns',array('id_evento'=>$id_evento));

		$acuerdo = $this->general->get_row('evento_ans',array('id_evento'=> $evento->id_evento));

	    $acuerdo_info = $this->general->get_row('acuerdo_nivel_servicio',array('acuerdo_nivel_id'=> $acuerdo->acuerdo_nivel_id));


		$j = 0;

		$involucrados = array();

		foreach ($asistentes as $asistente) {				
				$involucrados[$j] = $this->general->get_row('personal',array('id_personal'=>$asistente));
				$j++;
		}
		   

		$inicio = date_create($evento->inicio);
		$inicio =  date_format($inicio,'m/d/Y h:i A');

		$fin = date_create($evento->fin);
		$fin =  date_format($fin,'m/d/Y h:i A');



				$mensaje = '<b>Evento:</b> '.$evento->nombre_evento.'<br />';
				$mensaje = $mensaje.'<b>ANS:</b> '.$acuerdo_info->nombre_acuerdo.' <br />';

				
				if($evento->lugar_evento == '')
		        {$mensaje = $mensaje.'<b>Lugar:</b> <i>No Establecido</i> <br />';}
		        else
		        {$mensaje = $mensaje.'<b>Lugar:</b> '.$evento->lugar_evento.' <br />';}


				$mensaje = $mensaje.'<b>Inicio:</b> '.$inicio.' <br />';
				$mensaje = $mensaje.'<b>Fin:</b> '.$fin.' <br />';

				if($evento->descripcion_evento == '')
		        {$mensaje = $mensaje.'<b>Descripción:</b> <i>No Posee</i> <br />';}
		        else
		        {$mensaje = $mensaje.'<b>Descripción:</b> '.$evento->descripcion_evento.' <br />';}
						


		if($evento->tipo_evento == 'revision_ANS')
			{
				$asunto = 'Notificación de Revisión de Acuerdo de Niveles de Servicio';

			}

	    if($evento->tipo_evento == 'renovacion_ANS')
			{
				$asunto = 'Notificación de Renovación de Acuerdo de Niveles de Servicio';
				
			}

	    if($evento->tipo_evento == 'recordatorio_ANS')
			{
				$asunto ='Recordatorio de Vencimiento Próximo de Acuerdo de Niveles de Servicio';	
				
			}

		if($evento->tipo_evento == 'vencimiento_ANS')
			{
				$asunto = 'Notificación de Vencimiento de Acuerdo de Niveles de Servicio';
			}


		$config['protocol']		= "smtp";
		$config['smtp_host']	= "ssl://smtp.googlemail.com";
        $config['smtp_port']	= 465;
		$config['smtp_user']	= "sigitec.facyt@gmail.com";
        $config['smtp_pass']	= 'trabajo.grado.sigitec';
        $config['mailtype']		= "html";
        $config['charset']		='utf-8';
        $config['newline']		="\r\n";
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('sigitec.facyt@gmail.com','SIGITEC | Gestión de Niveles de Servicio');
        $this->email->subject($asunto);
		$this->email->message($mensaje);

		/*if(isset($email->pdf_path) && !empty($email->pdf_path) && file_exists($email->pdf_path))
			$this->email->attach($email->pdf_path);*/
			
		
		foreach($involucrados as $key => $people)
		{
			$emails_tosend[] = $people->email_personal;
		}
		$emails_str = implode(', ', $emails_tosend);
		$this->email->to($emails_str);
		$this->email->send();

		return true;

		// die_pre($this->email->print_debugger());
		
	}




}


?>
	
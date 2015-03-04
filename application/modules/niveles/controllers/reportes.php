<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes extends MX_Controller
{
	function __construct()
	{
        		parent::__construct();

		$this->load->model('general/general_model','general');
		$this->load->model('niveles/reportes_model','reportes');
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



    	function index()
    		{

		     $this->utils->template($this->list_sidebar_niveles(1),'niveles/reportes/main_reporte','','Reportes','','two_level');

    		}

    	function  procesar_data()
    		{   		    
    		    

    		    // Creacion de array con la informacion de cuales servicios son soportados por cada proceso.
    		    /*$procesos =  $this->reportes->obtener_procesos();
    		    foreach ($procesos as  $proceso) {
    		    	
    		    	$proceso_info = $this->general->get_row('servicio_proceso',array('nombre'=>$proceso->comando_ejecutable));
    		    	$proceso_id = $proceso_info->servicio_proceso_id;

    		    	$servicios = $this->general->get_result('proceso_soporta_servicio',array('servicio_proceso_id'=>$proceso_id));

    		    	$i = 1;

    		    	foreach ($servicios as  $servicio) {

    		    		$servicio_info = $this->general->get_row('servicio',array('servicio_id'=>$servicio->servicio_id));

    		    		$procesos_servicios[$proceso->comando_ejecutable][$i] = $servicio_info;

    		    		$i++;

    		    	}
    		    }
    		    $data_view['procesos_servicios'] =  $procesos_servicios;*/
    		    // Fin de la Creacion del array


    		    //Inicializar array de informacion de caida encontrada por proceso
    		    $procesos =  $this->reportes->obtener_procesos();
    		    $cantidad_procesos = count($procesos);

    		    foreach ($procesos as  $proceso) {
    		    	$procesos_caida[$proceso->comando_ejecutable][1] = (object) array('inicio_caida' => '0', 'fin_caida' => '0', 'estado'=>'activo');
    		    	$procesos_caida_aux[$proceso->comando_ejecutable][1] = (object) array('inicio_caida' => '0', 'fin_caida' => '0', 'estado'=>'activo', 'timestamp' => '0');

    		    	$nombre_proceso = $proceso->comando_ejecutable;
    		    }

    		    // Creacion del array con la informacion de cuales procesos soportan cada servicio
    		    $servicios = $this->general->get_table('servicio');

    		    foreach ($servicios as  $servicio) {


    		    	$procesos = $this->general->get_result('proceso_soporta_servicio',array('servicio_id'=>$servicio->servicio_id));

    		    	$i = 1;

    		    	foreach ($procesos as  $proceso) {

    		    		$proceso_info = $this->general->get_row('servicio_proceso',array('servicio_proceso_id'=>$proceso->servicio_proceso_id));
    		    		$servicios_procesos[$servicio->nombre][$i] = $proceso_info;
    		    		$i++;

    		    	}

    		    	//Inicializar array de informacion de caida encontrada por servicio
    		    	$servicios_caida[$servicio->nombre][1] = (object) array('inicio_caida' => '0', 'fin_caida' => '0', 'estado'=>'activo', 'duracion' => 0);  		    		

    		    }
    		    $data_view['servicios_procesos'] = $servicios_procesos;
    		    // Fin de la Creacion del array


    		    //Calculo de la duracion entre intervalos de medicion del script poller.csv

    		    $tiempos = $this->general->get_result('proceso_historial',array('comando_ejecutable'=>$nombre_proceso));
		    $tiempo_inicio =$tiempos[1]->timestamp;
		    $inicio = date_create($tiempo_inicio);
		    $tiempo_inicio = date_format($inicio,"H:i:s");

		    $tiempo_culminacion = $tiempos[2]->timestamp;
		    $fin = date_create($tiempo_culminacion);
		    $tiempo_culminacion = date_format($fin,"H:i:s"); 


		     $tiempo1 = new DateTime($tiempo_inicio);
		     $tiempo2 = new DateTime($tiempo_culminacion);
		     $resta = $tiempo1->diff($tiempo2);

		     $intervalo_medicion = $resta->s;

    		    
 		    $i=1; $j=1;
 		    $historial = $this->reportes->obtener_historial();
 		    $numero_registros = count($historial);
 		    $insertar_caida = false;

    		    foreach($historial as $registro){ 

		 	if ($i <=  $cantidad_procesos) {

		 		$procesos_caida_aux[$registro->comando_ejecutable][1]->timestamp = $registro->timestamp;

		 		if ($registro->tiempo_online == 0) {
		 			if ($procesos_caida[$registro->comando_ejecutable][1]->estado == 'activo') {


		 				$procesos_caida[$registro->comando_ejecutable][1]->inicio_caida = $registro->timestamp;
		 				$procesos_caida[$registro->comando_ejecutable][1]->estado = 'caido';

		 				// Llenado de la estructura de datos auxiliar para calcular las caidas por servicio
		 				$procesos_caida_aux[$registro->comando_ejecutable][1]->inicio_caida = $registro->timestamp;
		 				$procesos_caida_aux[$registro->comando_ejecutable][1]->estado = 'caido';
		 			}
		 			else
		 			{
		 				if($j == $numero_registros)
		 				{
		 					$procesos_caida[$registro->comando_ejecutable][1]->fin_caida = $registro->timestamp;
		 					$insertar_caida = true;

		 					// Llenado de la estructura de datos auxiliar para calcular las caidas por servicio
		 					$procesos_caida_aux[$registro->comando_ejecutable][1]->fin_caida = $registro->timestamp;
		 				}
		 			}

		 		}
		 		else{
		 			if ($procesos_caida[$registro->comando_ejecutable][1]->estado == 'caido') {

		 				$procesos_caida[$registro->comando_ejecutable][1]->fin_caida = $registro->timestamp;
		 				$insertar_caida = true;	

		 				// Llenado de la estructura de datos auxiliar para calcular las caidas por servicio
		 				$procesos_caida_aux[$registro->comando_ejecutable][1]->fin_caida = $registro->timestamp;	 				
		 			}
		 		}

		 		if($insertar_caida == true )
		 		{
		 				$proceso_info = $this->general->get_row('servicio_proceso',array('nombre'=>$registro->comando_ejecutable));
    		    				$proceso_id = $proceso_info->servicio_proceso_id;

    		    				$tiempo_inicio =$procesos_caida[$registro->comando_ejecutable][1]->inicio_caida; 
					     	$inicio = date_create($tiempo_inicio);
					     	$tiempo_inicio = date_format($inicio,"H:i:s");

					     	$tiempo_culminacion = $procesos_caida[$registro->comando_ejecutable][1]->fin_caida; 
					     	$fin = date_create($tiempo_culminacion);
					     	$tiempo_culminacion = date_format($fin,"H:i:s"); 


					     	$tiempo1 = new DateTime($tiempo_inicio);
						$tiempo2 = new DateTime($tiempo_culminacion);
						$resta = $tiempo1->diff($tiempo2);
						$duracion = $resta->h.":".$resta->i.":".$resta->s;

		 				$proceso_caida = array(
	                					        'proceso_id'=>$proceso_id,
					                                'inicio_caida' => $procesos_caida[$registro->comando_ejecutable][1]->inicio_caida,
					                                'fin_caida' => $procesos_caida[$registro->comando_ejecutable][1]->fin_caida,
					                                'duracion_caida' => $duracion,
				                                );

		 				//$this->general->insert('proceso_caida_historial',$proceso_caida,'');

		 				$procesos_caida[$registro->comando_ejecutable][1] = (object) array('inicio_caida' => '0', 'fin_caida' => '0', 'estado'=>'activo');

		 				$insertar_caida = false;
		 		}
		 	}

		 	// Se revisa el estado de cada proceso criticos por servicios para determinar su existe una caida del servicio.
		 	if ($i == $cantidad_procesos) {	 		

		 		// Se recorre cada servicio
		 		foreach ($servicios as  $servicio) {

		 			$proceso_caido = false;
		 			$inicio_caida_aux = 0;
		 			$fin_caida_aux = 0;
		 			// Se recorre cada proceso que soporta al servicio
			 		for ($j=1; $j <= count($servicios_procesos[$servicio->nombre]) ; $j++) { 
				 		
				 		$proceso_nombre = $servicios_procesos[$servicio->nombre][$j]->nombre; // Nombre del Proceso al cual se le revisa su estado (activo o  caido)

				 		// Si el proceso esta caido y es critico
				 		if ( ($procesos_caida[$proceso_nombre][1]->estado == 'caido') && ($servicios_procesos[$servicio->nombre][$j]->tipo == 'Critico') ) {			 			

				 			$proceso_caido = true;

				 			// Si no hay inicio de caida registrada para el servicio
				 			if ( $inicio_caida_aux == 0) {
				 				$inicio_caida_aux = $procesos_caida_aux[$proceso_nombre][1]->inicio_caida;
				 				//$servicios_caida[$servicio->nombre][1]->inicio_caida = $procesos_caida_aux[$proceso_nombre][1]->inicio_caida;
				 				//$servicios_caida[$servicio->nombre][1]->estado = 'caido';
				 			}
				 			// Si extiste una hora de caida registrada
				 			else{
				 				//Si la hora de caida de otro proceso es menor se actualiza la hora de caida del servicio. Esto se debe a que un servicio puede ser soportado por varios procesos y varios de ellos pueden tener el mismo estado de caidos al momento en que se realiza el monitoreo cada intervalo de tiempo.
				 				if ( ($procesos_caida_aux[$proceso_nombre][1]->inicio_caida) < $inicio_caida_aux ) {
				 					
				 					$inicio_caida_aux = $procesos_caida_aux[$proceso_nombre][1]->inicio_caida;				
				 				}
				 			}

				 			//Se suma el intervalo de medicion del poller csv a la duracion de la caida del proceso

				 			/****$servicios_caida[$servicio->nombre][1]->duracion = $servicios_caida[$servicio->nombre][1]->duracion + $intervalo_medicion;*/

				 		}

				 		// Si el proceso esta activo y es critico
				 		if  (($procesos_caida[$proceso_nombre][1]->estado == 'activo') && ($servicios_procesos[$servicio->nombre][$j]->tipo == 'Critico') ) {
				 				
				 				// Si no hay fin de caida registrada para el servicio
				 				if ($fin_caida_aux == 0) {
				 					//$fin_caida_aux = ;
				 				}
				 			}	

				 	}

			 	}



		 		$i=1;
		 	}
		 	else{
		 		$i++;
		 	}

		 	$j++;
		   }


    		   /* foreach ($servicios as  $servicio) {

    		    	$proceso_caido = false;
    		    	$duracion_caida = 0;
    		    	$inicio_caida = 0;
    		    	$fin_caida = 0;
    		    }*/




    		    $data_view['historial'] =  $this->reportes->obtener_historial();
    		    $data_view['procesos']  =  $this->reportes->obtener_procesos();
    		    $data_view['servicios']= $this->general->get_table('servicio');
    		    //$data_view['tiempos'] = $this->general->get_result('proceso_historial',array('comando_ejecutable'=>$nombre_proceso));


		     $this->utils->template($this->list_sidebar_niveles(1),'niveles/reportes/procesar_data',$data_view,'Reportes','','two_level');

    		}


}


?>
	
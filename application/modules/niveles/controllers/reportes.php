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


	function  transformarSegundos($segundos){

		$horas = floor($segundos / 3600);
		$mins = floor(($segundos - ($horas*3600)) / 60);
		$segs = floor($segundos % 60);

		if(strlen((string)$horas) == 1){
			$horas = '0'.$horas;
		}

		if(strlen((string)$mins) == 1){
			$mins = '0'.$mins;
		}

		if(strlen((string)$segs) == 1){
			$segs = '0'.$segs;
		}

		$duracion = $horas.":".$mins.":".$segs;

		return (string)$duracion;
	} 

	function  tiempoSegundos($tiempo){

		$tiempo = explode(":",$tiempo);

		$horas = (int)$tiempo[0];
		$mins = (int)$tiempo[1];
		$segs = (int)$tiempo[2];

		$segundos = ($horas*3600)+($mins*60)+($segs);

		return $segundos;
	} 



	function obtener_ans_servicio(){
		$servicio_id = $this->input->post('servicio_id');		

		$info_acuerdos['acuerdos'] = $this->general->get_result('acuerdo_nivel_servicio',array('id_servicio'=>$servicio_id, 'DATE(fecha_final) >=' => date('Y-m-d') ));

		echo json_encode($info_acuerdos);
	}

	function obtener_dias_disponibles(){
		$acuerdo_id = $this->input->post('acuerdo_id'); // Acuerdo ID
		$acuerdo = $this->general->get_row('acuerdo_nivel_servicio',array('acuerdo_nivel_id'=>$acuerdo_id));  //Información de ANS

		$dias=  array();

		if($acuerdo->lunes_disp_ini == NULL){
		       array_push($dias, 0);
		}
		if($acuerdo->martes_disp_ini == NULL){
		       array_push($dias, 1);
		}
		if($acuerdo->miercoles_disp_ini == NULL){
		       array_push($dias, 2);
		}
		if($acuerdo->jueves_disp_ini == NULL){
		       array_push($dias, 3);
		}
		if($acuerdo->viernes_disp_ini == NULL){
		       array_push($dias, 4);
		}
		if($acuerdo->sabado_disp_ini == NULL){
		       array_push($dias, 5);
		}
		if($acuerdo->domingo_disp_ini == NULL){
		       array_push($dias, 6);
		}

		$resultado['dias'] = $dias;

		echo  json_encode($resultado);
	}


    	function index(){

		     $this->utils->template($this->list_sidebar_niveles(1),'niveles/reportes/main_reporte','','Reportes','','two_level');

    	}


	function historial_servicio(){
    		$data_view['servicios']= $this->general->get_table('servicio');
		$this->utils->template($this->list_sidebar_niveles(1),'niveles/reportes/historial_servicio/historial_servicio',$data_view,'Reportes','','two_level');
	}



	function obtener_historial_servicio_dia(){


		//Obteniendo datos mediante post:

		$servicio_id = $this->input->post('servicio_id'); //Servicio ID

		$fecha_dia = $this->input->post('dia'); 
		$inicio = date_create($fecha_dia);
		$fecha_dia = date_format($inicio,"Y-m-d"); // Dia seleccionado para el reporte diario.

		// Calculando que dia de la semana es. (lunes, martes, etc)
		$dia_semana = (int)date('N', strtotime($fecha_dia));		
		//$historial_servicio['dia'] = $dia_semana;

		$acuerdo_id = $this->input->post('acuerdo_id'); // Acuerdo ID

		$acuerdo = $this->general->get_row('acuerdo_nivel_servicio',array('acuerdo_nivel_id'=>$acuerdo_id));  //Información de ANS

		//Obteniendo los datos del ANS correspondientes al día ingresado
		if($dis_semana == 1){ // Si es igual a Lunes
			$horario_inicio = $acuerdo->lunes_disp_ini;
			$horario_fin = $acuerdo->lunes_disp_fin;
		}
		if($dis_semana == 2){ // Si es igual a Martes 
			$horario_inicio = $acuerdo->martes_disp_ini;
			$horario_fin = $acuerdo->martes_disp_fin;
		}
		if($dis_semana == 3){ // Si es igual a Miércoles
			$horario_inicio = $acuerdo->miercoles_disp_ini;
			$horario_fin = $acuerdo->miercoles_disp_fin;
		}
		if($dis_semana == 4){ // Si es igual a Jueves
			$horario_inicio = $acuerdo->jueves_disp_ini;
			$horario_fin = $acuerdo->jueves_disp_fin;
		}
		if($dis_semana == 5){ // Si es igual a Viernes
			$horario_inicio = $acuerdo->viernes_disp_ini;
			$horario_fin = $acuerdo->viernes_disp_fin;
		}
		if($dis_semana == 6){ // Si es igual a Sábado
			$horario_inicio = $acuerdo->sabado_disp_ini;
			$horario_fin = $acuerdo->sabado_disp_fin;
		}
		if($dis_semana == 7){ // Si es igual a Domingo
			$horario_inicio = $acuerdo->domingo_disp_ini;
			$horario_fin = $acuerdo->domingo_disp_fin;
		}



		//Obteniendo caídas registradas para el Servicio
		$historial_servicio['caidas_servicio'] = $this->general->get_result('servicio_caida_historial',array('servicio_id'=>$servicio_id, 'DATE(inicio_caida)' => $fecha_dia));

		$historial = $historial_servicio['caidas_servicio'];

		// Transformar formato datetime a solo tiempo y Obtener tiempo de caída total por Servicio
		$i = 0;
		$tiempo_caida = 0;
		$caida_mayor = 0;
		$caida_menor = 0;
		foreach ($historial as  $registro) {
			$inicio = date_create($historial_servicio['caidas_servicio'][$i]->inicio_caida);
			$historial_servicio['caidas_servicio'][$i]->inicio_caida =  date_format($inicio,'d/m/Y h:i:s a');

			$fin = date_create($historial_servicio['caidas_servicio'][$i]->fin_caida);
			$historial_servicio['caidas_servicio'][$i]->fin_caida =  date_format($fin,'d/m/Y h:i:s a');

			$tiempo_caida = $tiempo_caida + $registro->duracion_caida_seg;

			if($registro->duracion_caida_seg > $caida_mayor){
				$caida_mayor = $registro->duracion_caida_seg;
			}

			if($caida_menor  == 0){
				$caida_menor = $registro->duracion_caida_seg;
			} 
			if( ($caida_menor  != 0) && ($registro->duracion_caida_seg < $caida_menor) ){
				$caida_menor =$registro->duracion_caida_seg;
			}

			$i++;
		}

		$segundos = $tiempo_caida;

		//Disponibilidad
		$historial_servicio['disponibilidad'] = round( ((100)-((100*$segundos)/86400)) , 2);

		//Numero de caídas
		$historial_servicio['numero_caidas'] = count($historial);

		//Duración de caída
		$historial_servicio['tiempo_caido'] = $this->transformarSegundos($segundos);

		//Tiempo en linea
		$tiempo_online = 86400 - $segundos;		
		$historial_servicio['tiempo_online'] = $this->transformarSegundos($tiempo_online);

		//Mayor Caída
		$historial_servicio['mayor_caida'] = $this->transformarSegundos($caida_mayor);

		//Mayor Caída
		$historial_servicio['menor_caida'] = $this->transformarSegundos($caida_menor);


		//Información de Procesos por Servicio
		$procesos_id = $this->general->get_result('proceso_soporta_servicio',array('servicio_id'=>$servicio_id));
		$historial_servicio['servicio_procesos'] = $procesos_id;	


		/****************************************************************************************************************/
		//Almacenar información de caída de procesos
		$historial_servicio['caidas_procesos'] = array();

		foreach ($procesos_id as $proceso) {
			$caidas_proceso = $this->general->get_result('proceso_caida_historial',array('proceso_id'=>$proceso->servicio_proceso_id));

			$proceso_info[$proceso->servicio_proceso_id] = $this->general->get_row('servicio_proceso',array('servicio_proceso_id'=>$proceso->servicio_proceso_id));
			$historial_servicio['procesos_info'] = $proceso_info;

			$nombre_proceso = $proceso_info[$proceso->servicio_proceso_id]->nombre;

			$tiempo_caido = 0;
			foreach ($caidas_proceso as $caida) {
				$inicio = date_create($caida->inicio_caida);
				$caida->inicio_caida =  date_format($inicio,'d/m/Y h:i:s a');

				$fin = date_create($caida->fin_caida);
				$caida->fin_caida =  date_format($fin,'d/m/Y h:i:s a');	

				$tiempo_caida = $this->tiempoSegundos($caida->duracion_caida);

				$tiempo_caido = $tiempo_caido + $tiempo_caida;			
			}

			$disponibilidad_proceso = round( ((100)-((100*$tiempo_caido)/86400)) , 2);
			$tiempo_disponible_proceso = 86400 - $tiempo_caido;
			$tiempo_disponible_proceso = $this->transformarSegundos($tiempo_disponible_proceso);
			$numero_caidas = count($caidas_proceso);

			$tiempo_segundos = $tiempo_caido;

			$tiempo_caido = $this->transformarSegundos($tiempo_caido);

			$historial_servicio['historial_procesos'][$nombre_proceso] = (object) array('disponibilidad' => $disponibilidad_proceso, 'tiempo_disponible' => $tiempo_disponible_proceso, 'caidas'=>$numero_caidas, 'tiempo_caido' => $tiempo_caido, 'segundos' => $tiempo_segundos);


			//Almacena todas las caídas por proceso
			$historial_servicio['caidas_procesos'] = array_merge($historial_servicio['caidas_procesos'], $caidas_proceso);

			
		}
			
			


		echo json_encode($historial_servicio);
	}



	function obtener_historial_servicio_semana(){

		$servicio_id = $this->input->post('servicio_id');

		$lunes = $this->input->post('dia'); 
		$inicio = date_create($lunes);
		$lunes = date_format($inicio,"Y-m-d");

		$domingo = strtotime ( '+6 day' , strtotime ($lunes));
		$domingo = date ( 'Y-m-d' , $domingo );

		$historial_semanal['caidas_servicio_semanal'] = $this->general->get_result('servicio_caida_historial',array('servicio_id'=>$servicio_id, 'DATE(inicio_caida) >=' => $lunes, 'DATE(inicio_caida) <=' => $domingo));

		$caidas_semanal = $historial_semanal['caidas_servicio_semanal'] ;



		//$historial_semanal['domingo'] = $domingo;

		echo json_encode($historial_semanal);



	}



    	function  procesar_data(){   		    
    		    

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
		 			//$inicio_caida_aux = 0;
		 			$fin_caida_aux = 0;
		 			// Se recorre cada proceso que soporta al servicio
			 		for ($a=1; $a <= count($servicios_procesos[$servicio->nombre]) ; $a++) { 
				 		
				 		$proceso_nombre = $servicios_procesos[$servicio->nombre][$a]->nombre; // Nombre del Proceso al cual se le revisa su estado (activo o  caido)

				 		// Si el proceso esta caido y es critico
				 		if ( ($procesos_caida[$proceso_nombre][1]->estado == 'caido') && ($servicios_procesos[$servicio->nombre][$a]->tipo == 'Critico') ) {			 			

				 			$proceso_caido = true;

				 			if($servicios_caida[$servicio->nombre][1]->estado == 'activo') {
				 				$servicios_caida[$servicio->nombre][1]->estado = 'caido';
				 			}
				 			

				 			// Si no hay inicio de caida registrada para el servicio
				 			if ( $servicios_caida[$servicio->nombre][1]->inicio_caida == 0) {
				 				$servicios_caida[$servicio->nombre][1]->inicio_caida = $procesos_caida_aux[$proceso_nombre][1]->inicio_caida;
				 				
				 			}
				 		}

				 		// Si el proceso esta activo y es critico
				 		if  (($procesos_caida[$proceso_nombre][1]->estado == 'activo') && ($servicios_procesos[$servicio->nombre][$a]->tipo == 'Critico') ) {

				 				$fin_caida_aux = $procesos_caida_aux[$proceso_nombre][1]->timestamp;
				 			}

				 	}

				 	if (($proceso_caido == true) && ($servicios_caida[$servicio->nombre][1]->estado == 'caido') ) {
				 		$servicios_caida[$servicio->nombre][1]->duracion = $servicios_caida[$servicio->nombre][1]->duracion + $intervalo_medicion;	
				 	}

				 	if (($proceso_caido == false) && ($servicios_caida[$servicio->nombre][1]->estado == 'caido') ) {
				 		
				 		$servicios_caida[$servicio->nombre][1]->fin_caida =  $fin_caida_aux;

				 		$segundos = $servicios_caida[$servicio->nombre][1]->duracion;
				 		
				 		$horas = floor($segundos / 3600);
						$mins = floor(($segundos - ($horas*3600)) / 60);
						$segs = floor($segundos % 60);

						$duracion = $horas.":".$mins.":".$segs;

				 		$servicio_caida = array(
	                					        'servicio_id'=>$servicio->servicio_id,
					                                'inicio_caida' => $servicios_caida[$servicio->nombre][1]->inicio_caida,
					                                'fin_caida' => $servicios_caida[$servicio->nombre][1]->fin_caida,
					                                'duracion_caida' => $duracion,
					                                'duracion_caida_seg'=> $servicios_caida[$servicio->nombre][1]->duracion,
				                                );

		 				$this->general->insert('servicio_caida_historial',$servicio_caida,'');

		 				$servicios_caida[$servicio->nombre][1] = (object) array('inicio_caida' => '0', 'fin_caida' => '0', 'estado'=>'activo', 'duracion' => 0); 



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
	
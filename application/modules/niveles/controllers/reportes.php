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




    	function index(){

		$this->utils->template($this->list_sidebar_niveles(1),'niveles/reportes/main_reporte','','Niveles de Servicio | Reportes de Niveles de Servicio','','two_level');

    	}


    	function segundosToCadena($segs){
	$cadena = "";

	if($segs >= 86400) {
	$dias = floor($segs/86400);
	$segs = $segs%86400;
	$cadena = $dias.' <b>día</b>';
	if($dias != 1) $cadena .= '<b>s</b>';
	if($segs >= 0) $cadena .= '<br>';
	}

	if($segs>=3600){
	$horas = floor($segs/3600);
	$segs = $segs%3600;
	$cadena .= $horas.' <b>hora</b>';
	if($horas != 1) $cadena .= '<b>s</b>';
	if($segs >= 0) $cadena .= '<br>';
	}

	if($segs>=60){
	$minutes = floor($segs/60);
	$segs = $segs%60;
	$cadena .= $minutes.' <b>minuto</b>';
	if($minutes != 1) $cadena .= '<b>s</b>';
	if($segs >= 0) $cadena .= '<br>';
	}

	if($segs != 0){
	$cadena .= $segs.' <b>segundo</b>';
	if($segs != 1) $cadena .= '<b>s</b>';}

	return $cadena;

	}


	//Transforma segundos al formato hh:mm:ss
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



	// Transforma el tiempo en formato hh:mm:ss  a Segundos
	function  tiempoSegundos($tiempo){

		$tiempo = explode(":",$tiempo);

		$horas = (int)$tiempo[0];
		$mins = (int)$tiempo[1];
		$segs = (int)$tiempo[2];

		$segundos = ($horas*3600)+($mins*60)+($segs);

		return $segundos;
	} 


	// Devuelve los ANS fijados para un Servicio
	function obtener_ans_servicio(){
		$servicio_id = $this->input->post('servicio_id');		

		$info_acuerdos['acuerdos'] = $this->general->get_result('acuerdo_nivel_servicio',array('id_servicio'=>$servicio_id, 'DATE(fecha_final) >=' => date('Y-m-d') ));

		echo json_encode($info_acuerdos);
	}

	// Devuelve los días NO disponibles en el horario fijado en el ANS
	//Formato para el datetimepicker [0,1,2,3,4,5,6]
	function obtener_dias_disponibles(){

		$acuerdo_id = $this->input->post('acuerdo_id'); // Acuerdo ID
		$acuerdo = $this->general->get_row('acuerdo_nivel_servicio',array('acuerdo_nivel_id'=>$acuerdo_id));  //Información de ANS
		

		$dias=  array();

		if($acuerdo->lunes_disp_ini == NULL){
		       array_push($dias, 1);
		}
		if($acuerdo->martes_disp_ini == NULL){
		       array_push($dias, 2);
		}
		if($acuerdo->miercoles_disp_ini == NULL){
		       array_push($dias, 3);
		}
		if($acuerdo->jueves_disp_ini == NULL){
		       array_push($dias, 4);
		}
		if($acuerdo->viernes_disp_ini == NULL){
		       array_push($dias, 5);
		}
		if($acuerdo->sabado_disp_ini == NULL){
		       array_push($dias, 6);
		}
		if($acuerdo->domingo_disp_ini == NULL){
		       array_push($dias, 0);
		}

		$resultado['dias'] = $dias;

		echo  json_encode($resultado);
	}

	// Devuelve los días disponibles en el horario fijado en el ANS
	// Formato para los días de la semana tipo datetime [1,2,3,4,5,6,7]
	function obtener_dias_disponibles2($acuerdo){

		$dias=  array();

		if( is_null($acuerdo->lunes_disp_ini) == false ){
		       array_push($dias, 1);
		}
		if( is_null($acuerdo->martes_disp_ini) == false){
		       array_push($dias, 2);
		}
		if( is_null($acuerdo->miercoles_disp_ini) == false){
		       array_push($dias, 3);
		}
		if( is_null($acuerdo->jueves_disp_ini) == false){
		       array_push($dias, 4);
		}
		if( is_null($acuerdo->viernes_disp_ini) == false){
		       array_push($dias, 5);
		}
		if( is_null($acuerdo->sabado_disp_ini) == false ){
		       array_push($dias, 6);
		}
		if( is_null($acuerdo->domingo_disp_ini) == false){
		       array_push($dias, 7);
		}

		$resultado = $dias;

		return $resultado;
	}

	// Devuelve el horario de disponibilidad establecido para el ANS que se pasa como parámetro. 
	function obtener_horario_disponibilidad($acuerdo){

		$horario_disponibilidad[1] = (object) array('horario_inicio' => $acuerdo->lunes_disp_ini, 'horario_fin' => $acuerdo->lunes_disp_fin, 'disponibilidad_segundos' =>'0', 'disponibilidad_tiempo' => '0');
		$horario_disponibilidad[2] = (object) array('horario_inicio' => $acuerdo->martes_disp_ini, 'horario_fin' => $acuerdo->martes_disp_fin, 'disponibilidad_segundos' =>'0', 'disponibilidad_tiempo' => '0');
		$horario_disponibilidad[3] = (object) array('horario_inicio' => $acuerdo->miercoles_disp_ini, 'horario_fin' => $acuerdo->miercoles_disp_fin, 'disponibilidad_segundos' =>'0', 'disponibilidad_tiempo' => '0');
		$horario_disponibilidad[4] = (object) array('horario_inicio' => $acuerdo->jueves_disp_ini, 'horario_fin' => $acuerdo->jueves_disp_fin, 'disponibilidad_segundos' =>'0', 'disponibilidad_tiempo' => '0');
		$horario_disponibilidad[5] = (object) array('horario_inicio' => $acuerdo->viernes_disp_ini, 'horario_fin' => $acuerdo->viernes_disp_fin, 'disponibilidad_segundos' =>'0', 'disponibilidad_tiempo' => '0');
		$horario_disponibilidad[6] = (object) array('horario_inicio' => $acuerdo->sabado_disp_ini, 'horario_fin' => $acuerdo->sabado_disp_fin, 'disponibilidad_segundos' =>'0', 'disponibilidad_tiempo' => '0');
		$horario_disponibilidad[7] = (object) array('horario_inicio' => $acuerdo->domingo_disp_ini, 'horario_fin' => $acuerdo->domingo_disp_fin, 'disponibilidad_segundos' =>'0', 'disponibilidad_tiempo' => '0');

		for ($i=1; $i <= 7 ; $i++) { 

			if($horario_disponibilidad[$i]->horario_inicio != NULL){
				if($horario_disponibilidad[$i]->horario_inicio != $horario_disponibilidad[$i]->horario_fin){
					$horario_inicio = $horario_disponibilidad[$i]->horario_inicio;
					$horario_fin = $horario_disponibilidad[$i]->horario_fin;

					$horario_inicio = $this->tiempoSegundos($horario_inicio);
					$horario_fin = $this->tiempoSegundos($horario_fin);

					$disponibilidad_segundos = $horario_fin - $horario_inicio;
					$disponibilidad_tiempo = $this->transformarSegundos($disponibilidad_segundos);

					$horario_disponibilidad[$i]->disponibilidad_segundos = $disponibilidad_segundos;
					$horario_disponibilidad[$i]->disponibilidad_tiempo = $disponibilidad_tiempo;
				}
				else{
					$horario_disponibilidad[$i]->horario_fin = "23:59:59";
					$horario_disponibilidad[$i]->disponibilidad_segundos = 86400;
					$horario_disponibilidad[$i]->disponibilidad_tiempo = "24:00:00";
				}
			}
		}

		return $horario_disponibilidad;
	}


	// Iguala las caídas que hayan comenzando antes o terminado después del intervalo de disponibilidad diario del Servicio.
	function normalizar_caidas($caidas,$fecha_dia,$horario_inicio,$horario_fin){

		$horario_inicio = date((string)$fecha_dia." ".(string)$horario_inicio);
		$horario_fin = date((string)$fecha_dia." ".(string)$horario_fin);

		$i = 0;
		foreach ($caidas as $caida) {
			$modificado = false;
			if($caida->inicio_caida == $horario_inicio  &&  $caida->fin_caida > $horario_fin){
			        $caidas[$i]->fin_caida = $horario_fin;
			        $modificado = true;
			}
			else if($caida->inicio_caida < $horario_inicio  &&  $caida->fin_caida == $horario_fin){
			        $caidas[$i]->inicio_caida = $horario_inicio;
			        $modificado = true;
			}
			else if($caida->inicio_caida < $horario_inicio  &&  $caida->fin_caida > $horario_fin){
			        $caidas[$i]->inicio_caida = $horario_inicio;
			        $caidas[$i]->fin_caida = $horario_fin;
			        $modificado = true;
			}

			else if($caida->inicio_caida < $horario_inicio  &&  ($caida->fin_caida < $horario_fin && $caida->fin_caida > $horario_inicio) ){
			        $caidas[$i]->inicio_caida = $horario_inicio;
			        $modificado = true;
			}

			else if( ($caida->inicio_caida > $horario_inicio && $caida->inicio_caida < $horario_fin)  &&  $caida->fin_caida > $horario_fin){
			        $caidas[$i]->fin_caida = $horario_fin;
			        $modificado = true;
			}

			if($modificado == true){

				$tiempo_inicio = $caidas[$i]->inicio_caida; 
				$inicio = date_create($tiempo_inicio);
				$tiempo_inicio = date_format($inicio,"H:i:s");

				$tiempo_culminacion = $caidas[$i]->fin_caida; 
				$fin = date_create($tiempo_culminacion);
				$tiempo_culminacion = date_format($fin,"H:i:s"); 

			     	$tiempo1 = new DateTime($tiempo_inicio);
				$tiempo2 = new DateTime($tiempo_culminacion);
  				$resta = $tiempo1->diff($tiempo2);
				$duracion = $resta->h.":".$resta->i.":".$resta->s;				

				$caidas[$i]->duracion_caida_seg = $this->tiempoSegundos($duracion);

				$caidas[$i]->duracion_caida = $this->transformarSegundos($caidas[$i]->duracion_caida_seg);
			}

		           $i++;
		}
		
		return $caidas;
	}


	//Muestra la pagina principal de la Sección de Reportes
	function historial_servicio(){
    		$data_view['servicios']= $this->general->get_table('servicio');
		$this->utils->template($this->list_sidebar_niveles(1),'niveles/reportes/historial_servicio/historial_servicio',$data_view,'Niveles de Servicio | Reportes de Niveles de Servicio','','two_level');
	}


	// Función que calcula es historial de disponibilidad y caídas para un Servicio, según el día y ANS pasados por parámetros	
	function obtener_historial_diario($servicio_id, $fecha_dia, $horario_disponibilidad){

		//Dando formato "Ano-Mes-Día" a la fecha del día pasado por parámetro
		$inicio = date_create($fecha_dia);
		$fecha_dia = date_format($inicio,"Y-m-d"); // Dia seleccionado para el reporte diario.

		// Calculando que día de la semana es. (lunes, martes, etc)
		$dia_semana = (int)date('N', strtotime($fecha_dia));

		$dias_nombres = array('0',"Lunes","Martes","Miércoles","Jueves","Viernes","Sábado","Domingo");
		$nombre_dia = $dias_nombres[$dia_semana]; 

		$historial_servicio['nombre_dia'] = $nombre_dia; // Nombre del día de la semana al cual se le esta elaborando el historial
			
		$horario_inicio = $horario_disponibilidad[$dia_semana]->horario_inicio;
		$horario_fin = $horario_disponibilidad[$dia_semana]->horario_fin;

		$historial_servicio['tiempo_disponible'] = $horario_disponibilidad[$dia_semana]->disponibilidad_tiempo; //Tiempo que debe estar disponible el Servicio según el ANS

		//Obteniendo caídas registradas para el Servicio	
		$caidas = $this->reportes->obtener_historial_servicio($servicio_id, $fecha_dia, $horario_inicio, $horario_fin);

		//Normalizando las caídas para el intervalo de disponibilidad diario
		$historial_servicio['caidas_servicio'] = $this->normalizar_caidas($caidas,$fecha_dia, $horario_inicio,$horario_fin);		
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
		$historial_servicio['disponibilidad'] = round( ((100)-((100*$segundos)/$horario_disponibilidad[$dia_semana]->disponibilidad_segundos)) , 2);

		//Numero de caídas
		$historial_servicio['numero_caidas'] = count($historial);

		//Duración de caída
		$historial_servicio['tiempo_caido'] = $this->transformarSegundos($segundos);
		$historial_servicio['tiempo_caido_segundos'] =$segundos;

		//Tiempo en linea
		$tiempo_online = $horario_disponibilidad[$dia_semana]->disponibilidad_segundos - $segundos;		
		$historial_servicio['tiempo_online'] = $this->transformarSegundos($tiempo_online);
		

		//Mayor Caída
		$historial_servicio['mayor_caida'] = $this->transformarSegundos($caida_mayor);
		$historial_servicio['mayor_caida_segundos'] = $caida_mayor;

		//Mayor Caída
		$historial_servicio['menor_caida'] = $this->transformarSegundos($caida_menor);
		$historial_servicio['menor_caida_segundos'] = $caida_menor;


		//Información de Procesos por Servicio
		$procesos_id = $this->general->get_result('proceso_soporta_servicio',array('servicio_id'=>$servicio_id));
		$historial_servicio['servicio_procesos'] = $procesos_id;	


		/****************************************************************************************************************/
		//Almacenar información de caída de procesos
		$historial_servicio['caidas_procesos'] = array();

		$historial_servicio['prueba_caidas_procesos'] = array();

		foreach ($procesos_id as $proceso) {

			//Obtener caídas por proceso
			$caidas = $this->reportes->obtener_historial_proceso($proceso->servicio_proceso_id, $fecha_dia, $horario_inicio, $horario_fin);

			//Normalizar caídas por proceso
			$caidas_proceso = $this->normalizar_caidas($caidas,$fecha_dia, $horario_inicio,$horario_fin);

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

			$disponibilidad_proceso = round( ((100)-((100*$tiempo_caido)/$horario_disponibilidad[$dia_semana]->disponibilidad_segundos)) , 2);
			$tiempo_disponible_proceso = $horario_disponibilidad[$dia_semana]->disponibilidad_segundos - $tiempo_caido;
			$tiempo_disponible_proceso = $this->transformarSegundos($tiempo_disponible_proceso);
			$numero_caidas = count($caidas_proceso);

			$tiempo_segundos = $tiempo_caido;

			$tiempo_caido = $this->transformarSegundos($tiempo_caido);

			$historial_servicio['historial_procesos'][$nombre_proceso] = (object) array('disponibilidad' => $disponibilidad_proceso, 'tiempo_disponible' => $tiempo_disponible_proceso, 'caidas'=>$numero_caidas, 'tiempo_caido' => $tiempo_caido, 'segundos' => $tiempo_segundos);


			//Almacena todas las caídas por proceso
			$historial_servicio['caidas_procesos'] = array_merge($historial_servicio['caidas_procesos'], $caidas_proceso);
		}

		return $historial_servicio;
	}


	function obtener_historial_servicio_dia(){

		//Obteniendo datos mediante post:
		$servicio_id = $this->input->post('servicio_id'); //Servicio ID
		$fecha_dia = $this->input->post('dia');  //Día Seleccionado
		$acuerdo_id = $this->input->post('acuerdo_id'); // Acuerdo ID

		$acuerdo = $this->general->get_row('acuerdo_nivel_servicio',array('acuerdo_nivel_id'=>$acuerdo_id));  //Información de ANS

		$horario_disponibilidad = $this->obtener_horario_disponibilidad($acuerdo); //Información de Horario de disponibilidad del Servicio		

		// Calculando el Historial del Servicio en comparación a los Objetivos establecidos en el ANS
		$historial_servicio = $this->obtener_historial_diario($servicio_id,$fecha_dia,$horario_disponibilidad);	

		$historial_servicio['ans'] = $acuerdo;	

		echo json_encode($historial_servicio);
	}



	function obtener_historial_servicio_semana(){

		//Obteniendo datos mediante post:
		$servicio_id = $this->input->post('servicio_id'); //Servicio ID

		$lunes = $this->input->post('dia');  //Día Seleccionado
		$lunes_inicial = $lunes;	

		$acuerdo_id = $this->input->post('acuerdo_id'); // Acuerdo ID
		$acuerdo = $this->general->get_row('acuerdo_nivel_servicio',array('acuerdo_nivel_id'=>$acuerdo_id));  //Información de ANS

		$dias_disponibles = $this->obtener_dias_disponibles2($acuerdo); // Días de la semana en los que el servicio es utilizado según el ANS seleccionado

		$horario_disponibilidad = $this->obtener_horario_disponibilidad($acuerdo); //Información de Horario de disponibilidad del Servicio según el ANS seleccionado	

		$dias_nombres = array('0',"Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
		$dias = array();
		$historial_semanal['caidas_servicio']  =  array();
		$total_porcentaje_disponibilidad = 0;
		$total_tiempo_disponible = 0;
		$total_tiempo_horario  = 0;
		$total_numero_caidas = 0;
		$total_tiempo_caido = 0;
		$tiempos_caidas = array();
		$cantidad_dias = count($dias_disponibles);
		$historial_semanal['caidas_procesos']  = array();

		 $dia1  =  strtotime ('+6 day' , strtotime ($lunes_inicial));
		 $historial_semanal['domingo'] = date ( 'm/d/Y' , $dia1);

		 // Id's de todos los procesos que conforman el servicio
		$procesos_id = $this->general->get_result('proceso_soporta_servicio',array('servicio_id'=>$servicio_id));

		 // Por cada proceso se inicializa su información
		 foreach ($procesos_id as $proceso) {

			//Información de los procesos pertenecientes al servicio
			$proceso_info[$proceso->servicio_proceso_id] = $this->general->get_row('servicio_proceso',array('servicio_proceso_id'=>$proceso->servicio_proceso_id));
			$historial_semanal['procesos_info'] = $proceso_info;

			$nombre_proceso = $proceso_info[$proceso->servicio_proceso_id]->nombre;		           

		           $historial_semanal['historial_procesos'][$nombre_proceso] = (object) array('disponibilidad' => 0, 'tiempo_disponible' => '00:00:00', 'caidas'=> 0, 'tiempo_caido' => '00:00:00', 'segundos' => 0);
		}

		// Obtenemos el historial de servicio y procesos por cada día de la semana comenzando por el lunes. 
		for ($i=0; $i <= 6 ; $i++) {

			$dia =  strtotime ('+'.$i.' day' , strtotime ($lunes_inicial));
			$fecha_dia = date ( 'm/d/Y' , $dia);

			// Calculando que día de la semana es. (lunes, martes, etc)
			$dia_semana = (int)date('N', strtotime($fecha_dia));

			// Si el día de semana actual esta entre los días disponibles, se obtiene su historial de servicio.
			if (in_array($dia_semana, $dias_disponibles)) {				
				
				array_push($dias, $fecha_dia);
				
				$historial_servicio = $this->obtener_historial_diario($servicio_id,$fecha_dia,$horario_disponibilidad); //HISTORIAL DIARO DEL SERVICIO			
				$historial_semanal['historial_servicios'][$fecha_dia] = $historial_servicio; //Se almacena el historial completo de cada día. Base para elaborar gráficas

				// Sumatoria de los niveles de servicio por cada día de la semana
				$total_porcentaje_disponibilidad = $total_porcentaje_disponibilidad + $historial_servicio['disponibilidad'];  // Sumatoria de los porcentajes de disponibilidad
				$total_tiempo_disponible = $total_tiempo_disponible + $this->tiempoSegundos($historial_servicio['tiempo_online']); // Sumatoria del tiempo Online 
				$total_tiempo_horario = $total_tiempo_horario  +   $horario_disponibilidad[$dia_semana]->disponibilidad_segundos; // Sumatoria del tiempo que debe estar disponible el servicio por día.

				$total_numero_caidas = $total_numero_caidas + $historial_servicio['numero_caidas'] ; // Sumatoria de Numero de Caídas
				$total_tiempo_caido = $total_tiempo_caido + $historial_servicio['tiempo_caido_segundos'] ; // Sumatoria de Tiempo Caído

				if($historial_servicio['mayor_caida_segundos'] >= 0)
				{array_push($tiempos_caidas , $historial_servicio['mayor_caida_segundos']); }

				if($historial_servicio['menor_caida_segundos'] >=0)
				{array_push($tiempos_caidas , $historial_servicio['menor_caida_segundos']);}

				/** Información de Caídas de Servicio por día ***/
				$caidas_servicio = $historial_servicio['caidas_servicio'];				

				$nombre_dia = $dias_nombres[$dia_semana]; // Nombre del día de la semana al cual se le esta elaborando el historial
				// Se le agrega el nombre del día a la información de la hora de caída del Servicio:
				foreach ($caidas_servicio as $caida) {
					$caida->inicio_caida = $caida->inicio_caida." <b>".$nombre_dia."</b> ";
					$caida->fin_caida =     $caida->fin_caida." <b>".$nombre_dia."</b> ";
				}

				//Concatenando la información de las caídas de Servicio
				 $historial_semanal['caidas_servicio']  = array_merge( $caidas_servicio , $historial_semanal['caidas_servicio'] ); 

				 /*******************************************/


				 /** Información de Caídas de Procesos por día ***/

				 $caidas_procesos = $historial_servicio['caidas_procesos'];

				 // Se le agrega el nombre del día a la información de la hora de caída de los procesos:
				foreach ($caidas_procesos as $caida) {
					$caida->inicio_caida = $caida->inicio_caida." <b>".$nombre_dia."</b> ";
					$caida->fin_caida =     $caida->fin_caida." <b>".$nombre_dia."</b> ";
				}				 

				 // Id's de todos los procesos que conforman el servicio
				 $procesos_id = $historial_servicio['servicio_procesos'];	

				 // Por cada proceso se realiza la sumatoria
				 foreach ($procesos_id as $proceso) {
				 	
				 	// Información de los procesos pertenecientes al servicio
				 	$proceso_info = $this->general->get_row('servicio_proceso',array('servicio_proceso_id'=>$proceso->servicio_proceso_id));
		           			$nombre_proceso = $proceso_info->nombre;
				

					//Información obtenida del historial diario del proceso
					$disponibilidad_proceso = $historial_servicio['historial_procesos'][$nombre_proceso]->disponibilidad;

					$tiempo_disponible_proceso =  $historial_servicio['historial_procesos'][$nombre_proceso]->tiempo_disponible;
					$tiempo_disponible_proceso =  $this->tiempoSegundos($tiempo_disponible_proceso);

					$numero_caidas = $historial_servicio['historial_procesos'][$nombre_proceso]->caidas;
					$tiempo_segundos = $historial_servicio['historial_procesos'][$nombre_proceso]->segundos;

					$tiempo_caido =$historial_servicio['historial_procesos'][$nombre_proceso]->tiempo_caido;
					$tiempo_caido = $this->tiempoSegundos($tiempo_caido);


					// Sumatoria de niveles de servicio del proceso
					$historial_semanal['historial_procesos'][$nombre_proceso]->disponibilidad = $historial_semanal['historial_procesos'][$nombre_proceso]->disponibilidad + $disponibilidad_proceso;

					$tiempo_disponible_aux =  $historial_semanal['historial_procesos'][$nombre_proceso]->tiempo_disponible;
					$tiempo_disponible_aux =  $this->tiempoSegundos($tiempo_disponible_aux);

					$historial_semanal['historial_procesos'][$nombre_proceso]->tiempo_disponible = $tiempo_disponible_aux + $tiempo_disponible_proceso;
					$historial_semanal['historial_procesos'][$nombre_proceso]->tiempo_disponible = $this->transformarSegundos($historial_semanal['historial_procesos'][$nombre_proceso]->tiempo_disponible);

					$historial_semanal['historial_procesos'][$nombre_proceso]->caidas = $historial_semanal['historial_procesos'][$nombre_proceso]->caidas + $numero_caidas;

					$historial_semanal['historial_procesos'][$nombre_proceso]->segundos = $historial_semanal['historial_procesos'][$nombre_proceso]->segundos + $tiempo_segundos;


					$tiempo_caido_aux = $historial_semanal['historial_procesos'][$nombre_proceso]->tiempo_caido;
					$tiempo_caido_aux = $this->tiempoSegundos($tiempo_caido_aux);

					$historial_semanal['historial_procesos'][$nombre_proceso]->tiempo_caido = $tiempo_caido_aux + $tiempo_caido;
					$historial_semanal['historial_procesos'][$nombre_proceso]->tiempo_caido = $this->transformarSegundos($historial_semanal['historial_procesos'][$nombre_proceso]->tiempo_caido);
				 }


				 $historial_semanal['caidas_procesos']  = array_merge( $caidas_procesos , $historial_semanal['caidas_procesos'] ); 
				  /*******************************************/
			}
		}

		$historial_semanal['numero_dias'] = count($dias);

		/******** INFORMACION DE SERVICIO **********/
		/** Calculando el promedio SEMANAL de los Niveles de Servicio: **/

		//Disponibilidad
		$historial_semanal['disponibilidad'] = round($total_porcentaje_disponibilidad / $cantidad_dias , 2);  //Promedio del porcentaje de la disponibilidad semanal

		//Numero de caídas
		$historial_semanal['numero_caidas'] = $total_numero_caidas;

		//Duración de caída
		$historial_semanal['tiempo_caido'] = $this->transformarSegundos($total_tiempo_caido);
		$historial_semanal['tiempo_caido_segundos'] =$total_tiempo_caido;

		//Tiempo en linea		
		$historial_semanal['tiempo_online'] = $this->transformarSegundos($total_tiempo_disponible);
		$historial_semanal['tiempo_online2'] = $this->segundosToCadena($total_tiempo_disponible);

		// Total de Tiempo de horario según ANS
		$historial_semanal['tiempo_disponible'] =  $this->transformarSegundos($total_tiempo_horario);
		$historial_semanal['tiempo_disponible2'] =  $this->segundosToCadena($total_tiempo_horario);		

		//Mayor Caída
		$mayor_caida = max($tiempos_caidas);
		$historial_semanal['mayor_caida'] = $this->transformarSegundos($mayor_caida);
		$historial_semanal['mayor_caida_segundos'] = $mayor_caida;

		//Menor Caída		
		if($mayor_caida != "00:00:00"){

			$tiempos_caidas = array_unique($tiempos_caidas);
			$clave = array_search("00:00:00", $tiempos_caidas);
			unset($tiempos_caidas[$clave]);
		}
		$menor_caida = min($tiempos_caidas);		
		$historial_semanal['menor_caida'] = $this->transformarSegundos($menor_caida);
		$historial_semanal['menor_caida_segundos'] = $menor_caida;

		/******** FIN DE INFORMACION DE SERVICIO **********/
		$historial_semanal['servicio_procesos'] = $this->general->get_result('proceso_soporta_servicio',array('servicio_id'=>$servicio_id));


		/******** INFORMACION DE PROCESOS **********/
		$procesos_id = $this->general->get_result('proceso_soporta_servicio',array('servicio_id'=>$servicio_id));

		 // Por cada proceso se calcula el promedio de disponibilidad
		 foreach ($procesos_id as $proceso) {
			//Información de los procesos pertenecientes al servicio
			$proceso_info = $this->general->get_row('servicio_proceso',array('servicio_proceso_id'=>$proceso->servicio_proceso_id));
		           	$nombre_proceso = $proceso_info->nombre;	

		           	$historial_semanal['historial_procesos'][$nombre_proceso]->disponibilidad = round($historial_semanal['historial_procesos'][$nombre_proceso]->disponibilidad / $cantidad_dias, 2);   
		}
		
		/******** FIN INFORMACION DE PROCESOS **********/

		$historial_semanal['ans'] = $acuerdo;	

		$historial_semanal['dias'] =$dias;

		

		echo json_encode($historial_semanal);
	}




	function obtener_historial_servicio_mensual($servicio_id, $mes, $horario_disponibilidad,$dias_disponibles){


		$dias_nombres = array('0',"Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
		$meses_nombres = array('0',"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$dias = array();
		$dias_fecha = array();
		$historial_mensual['caidas_servicio']  =  array();
		$total_porcentaje_disponibilidad = 0;
		$total_tiempo_disponible = 0;
		$total_tiempo_horario  = 0;
		$total_numero_caidas = 0;
		$total_tiempo_caido = 0;
		$tiempos_caidas = array();		
		$historial_mensual['caidas_procesos']  = array();

		// Obtener cantidad de días que posee el mes
		$mes_aux = explode("/",$mes );
		$lunes_inicial = $mes_aux[0]."/01/".$mes_aux[1];		

		$num_dias_mes = (int)(date('t', strtotime($lunes_inicial)) - 1);

		// Nombre del mes
		$numero_mes = (int)date('n', strtotime($lunes_inicial));
		$nombre_mes = $meses_nombres[$numero_mes];
		$numero_ano = (int)date('Y', strtotime($lunes_inicial));

		$historial_mensual['mes']  = $nombre_mes." del ".$numero_ano;


		// Id's de todos los procesos que conforman el servicio
		$procesos_id = $this->general->get_result('proceso_soporta_servicio',array('servicio_id'=>$servicio_id));

		// Por cada proceso se inicializa su información
		 foreach ($procesos_id as $proceso) {

			//Información de los procesos pertenecientes al servicio
			$proceso_info[$proceso->servicio_proceso_id] = $this->general->get_row('servicio_proceso',array('servicio_proceso_id'=>$proceso->servicio_proceso_id));
			$historial_mensual['procesos_info'] = $proceso_info;

			$nombre_proceso = $proceso_info[$proceso->servicio_proceso_id]->nombre;		           

		           $historial_mensual['historial_procesos'][$nombre_proceso] = (object) array('disponibilidad' => 0, 'tiempo_disponible' => '00:00:00', 'caidas'=> 0, 'tiempo_caido' => '00:00:00', 'segundos' => 0);
		}

		// Obtenemos el historial de servicio y procesos por cada día de la semana comenzando por el lunes. 
		for ($i=0; $i <= $num_dias_mes ; $i++) {


			$dia =  strtotime ('+'.$i.' day' , strtotime ($lunes_inicial));
			$fecha_dia = date ( 'm/d/Y' , $dia);

			// Calculando que día de la semana es. (lunes, martes, etc)
			$dia_semana = (int)date('N', strtotime($fecha_dia));

			// Si el día de semana actual esta entre los días disponibles, se obtiene su historial de servicio.
			if (in_array($dia_semana, $dias_disponibles)) {				
				
				$historial_servicio = $this->obtener_historial_diario($servicio_id,$fecha_dia,$horario_disponibilidad); //HISTORIAL DIARO DEL SERVICIO	

				$fecha_dia = date ( 'd/m/Y' , $dia);
				array_push($dias, $fecha_dia);

				$historial_mensual['historial_servicios'][$fecha_dia] = $historial_servicio; //Se almacena el historial completo de cada día. Base para elaborar gráficas

				// Sumatoria de los niveles de servicio por cada día de la semana
				$total_porcentaje_disponibilidad = $total_porcentaje_disponibilidad + $historial_servicio['disponibilidad'];  // Sumatoria de los porcentajes de disponibilidad
				$total_tiempo_disponible = $total_tiempo_disponible + $this->tiempoSegundos($historial_servicio['tiempo_online']); // Sumatoria del tiempo Online 
				$total_tiempo_horario = $total_tiempo_horario  +   $horario_disponibilidad[$dia_semana]->disponibilidad_segundos; // Sumatoria del tiempo que debe estar disponible el servicio por día.

				$total_numero_caidas = $total_numero_caidas + $historial_servicio['numero_caidas'] ; // Sumatoria de Numero de Caídas
				$total_tiempo_caido = $total_tiempo_caido + $historial_servicio['tiempo_caido_segundos'] ; // Sumatoria de Tiempo Caído

				if($historial_servicio['mayor_caida_segundos'] >= 0)
				{array_push($tiempos_caidas , $historial_servicio['mayor_caida_segundos']); }

				if($historial_servicio['menor_caida_segundos'] >=0)
				{array_push($tiempos_caidas , $historial_servicio['menor_caida_segundos']);}

				/** Información de Caídas de Servicio por día ***/
				$caidas_servicio = $historial_servicio['caidas_servicio'];				

				$nombre_dia = $dias_nombres[$dia_semana]; // Nombre del día de la semana al cual se le esta elaborando el historial
				 //$nombre_dia = date ( 'm/d/Y' , $dia);

				// Se le agrega el nombre del día a la información de la hora de caída:
				foreach ($caidas_servicio as $caida) {
					$caida->inicio_caida = $caida->inicio_caida."<b> ".$nombre_dia."</b> ";
					$caida->fin_caida =     $caida->fin_caida."<b> ".$nombre_dia."</b>";
				}

				//Concatenando la información de las caídas de Servicio
				 $historial_mensual['caidas_servicio']  = array_merge( $caidas_servicio , $historial_mensual['caidas_servicio'] ); 

				 /*******************************************/


				 /** Información de Caídas de Procesos por día ***/

				 $caidas_procesos = $historial_servicio['caidas_procesos'];

				 // Se le agrega el nombre del día a la información de la hora de caída de los procesos:
				foreach ($caidas_procesos as $caida) {
					$caida->inicio_caida = $caida->inicio_caida." <b>".$nombre_dia."</b> ";
					$caida->fin_caida =     $caida->fin_caida." <b>".$nombre_dia."</b> ";
				}				 

				 // Id's de todos los procesos que conforman el servicio
				 $procesos_id = $historial_servicio['servicio_procesos'];	

				 // Por cada proceso se realiza la sumatoria
				 foreach ($procesos_id as $proceso) {
				 	
				 	// Información de los procesos pertenecientes al servicio
				 	$proceso_info = $this->general->get_row('servicio_proceso',array('servicio_proceso_id'=>$proceso->servicio_proceso_id));
		           			$nombre_proceso = $proceso_info->nombre;
				

					//Información obtenida del historial diario del proceso
					$disponibilidad_proceso = $historial_servicio['historial_procesos'][$nombre_proceso]->disponibilidad;

					$tiempo_disponible_proceso =  $historial_servicio['historial_procesos'][$nombre_proceso]->tiempo_disponible;
					$tiempo_disponible_proceso =  $this->tiempoSegundos($tiempo_disponible_proceso);

					$numero_caidas = $historial_servicio['historial_procesos'][$nombre_proceso]->caidas;
					$tiempo_segundos = $historial_servicio['historial_procesos'][$nombre_proceso]->segundos;

					$tiempo_caido =$historial_servicio['historial_procesos'][$nombre_proceso]->tiempo_caido;
					$tiempo_caido = $this->tiempoSegundos($tiempo_caido);


					// Sumatoria de niveles de servicio del proceso
					$historial_mensual['historial_procesos'][$nombre_proceso]->disponibilidad = $historial_mensual['historial_procesos'][$nombre_proceso]->disponibilidad + $disponibilidad_proceso;

					$tiempo_disponible_aux =  $historial_mensual['historial_procesos'][$nombre_proceso]->tiempo_disponible;
					$tiempo_disponible_aux =  $this->tiempoSegundos($tiempo_disponible_aux);

					$historial_mensual['historial_procesos'][$nombre_proceso]->tiempo_disponible = $tiempo_disponible_aux + $tiempo_disponible_proceso;
					$historial_mensual['historial_procesos'][$nombre_proceso]->tiempo_disponible = $this->transformarSegundos($historial_mensual['historial_procesos'][$nombre_proceso]->tiempo_disponible);

					$historial_mensual['historial_procesos'][$nombre_proceso]->caidas = $historial_mensual['historial_procesos'][$nombre_proceso]->caidas + $numero_caidas;

					$historial_mensual['historial_procesos'][$nombre_proceso]->segundos = $historial_mensual['historial_procesos'][$nombre_proceso]->segundos + $tiempo_segundos;


					$tiempo_caido_aux = $historial_mensual['historial_procesos'][$nombre_proceso]->tiempo_caido;
					$tiempo_caido_aux = $this->tiempoSegundos($tiempo_caido_aux);

					$historial_mensual['historial_procesos'][$nombre_proceso]->tiempo_caido = $tiempo_caido_aux + $tiempo_caido;
					$historial_mensual['historial_procesos'][$nombre_proceso]->tiempo_caido = $this->transformarSegundos($historial_mensual['historial_procesos'][$nombre_proceso]->tiempo_caido);
				 }


				 $historial_mensual['caidas_procesos']  = array_merge( $caidas_procesos , $historial_mensual['caidas_procesos'] ); 
				  /*******************************************/
			}
		}

		$historial_mensual['numero_dias'] = count($dias);

		$cantidad_dias =  count($dias);

		/******** INFORMACION DE SERVICIO **********/
		/** Calculando el promedio SEMANAL de los Niveles de Servicio: **/

		//Disponibilidad
		$historial_mensual['disponibilidad'] = round($total_porcentaje_disponibilidad / $cantidad_dias , 2);  //Promedio del porcentaje de la disponibilidad semanal

		//Numero de caídas
		$historial_mensual['numero_caidas'] = $total_numero_caidas;

		//Duración de caída
		$historial_mensual['tiempo_caido'] = $this->transformarSegundos($total_tiempo_caido);
		$historial_mensual['tiempo_caido_segundos'] =$total_tiempo_caido;

		//Tiempo en linea		
		$historial_mensual['tiempo_online'] = $this->transformarSegundos($total_tiempo_disponible);
		$historial_mensual['tiempo_online2'] = $this->segundosToCadena($total_tiempo_disponible);

		// Total de Tiempo de horario según ANS
		$historial_mensual['tiempo_disponible'] =  $this->transformarSegundos($total_tiempo_horario);
		$historial_mensual['tiempo_disponible2'] = $this->segundosToCadena($total_tiempo_horario);		

		//Mayor Caída
		$mayor_caida = max($tiempos_caidas);
		$historial_mensual['mayor_caida'] = $this->transformarSegundos($mayor_caida);
		$historial_mensual['mayor_caida_segundos'] = $mayor_caida;

		//Menor Caída		
		if($mayor_caida != "00:00:00"){

			$tiempos_caidas = array_unique($tiempos_caidas);
			$clave = array_search("00:00:00", $tiempos_caidas);
			unset($tiempos_caidas[$clave]);
		}
		$menor_caida = min($tiempos_caidas);		
		$historial_mensual['menor_caida'] = $this->transformarSegundos($menor_caida);
		$historial_mensual['menor_caida_segundos'] = $menor_caida;

		/******** FIN DE INFORMACION DE SERVICIO **********/
		

		$historial_mensual['servicio_procesos'] = $this->general->get_result('proceso_soporta_servicio',array('servicio_id'=>$servicio_id));
		/******** INFORMACION DE PROCESOS **********/
		$procesos_id = $this->general->get_result('proceso_soporta_servicio',array('servicio_id'=>$servicio_id));

		 // Por cada proceso se calcula el promedio de disponibilidad
		 foreach ($procesos_id as $proceso) {
			//Información de los procesos pertenecientes al servicio
			$proceso_info = $this->general->get_row('servicio_proceso',array('servicio_proceso_id'=>$proceso->servicio_proceso_id));
		           	$nombre_proceso = $proceso_info->nombre;	

		           	$historial_mensual['historial_procesos'][$nombre_proceso]->disponibilidad = round($historial_mensual['historial_procesos'][$nombre_proceso]->disponibilidad / $cantidad_dias, 2);   
		}
		
		/******** FIN INFORMACION DE PROCESOS **********/		

		$historial_mensual['dias'] =$dias;		

		return $historial_mensual;
	}


	function obtener_historial_servicio_mes(){


		//Obteniendo datos mediante post:
		$servicio_id = $this->input->post('servicio_id'); //Servicio ID

		$mes = $this->input->post('mes');  //Mes Seleccionado

		$acuerdo_id = $this->input->post('acuerdo_id'); // Acuerdo ID
		$acuerdo = $this->general->get_row('acuerdo_nivel_servicio',array('acuerdo_nivel_id'=>$acuerdo_id));  //Información de ANS

		$dias_disponibles = $this->obtener_dias_disponibles2($acuerdo); // Días de la semana en los que el servicio es utilizado según el ANS seleccionado

		$horario_disponibilidad = $this->obtener_horario_disponibilidad($acuerdo); //Información de Horario de disponibilidad del Servicio según el ANS seleccionado	

		// Calculando el Historial del Servicio en comparación a los Objetivos establecidos en el ANS
		$historial_servicio = $this->obtener_historial_servicio_mensual($servicio_id, $mes, $horario_disponibilidad,$dias_disponibles);	

		$historial_servicio['ans'] = $acuerdo;	

		echo json_encode($historial_servicio);		
 	}


 	function obtener_historial_servicio_ano(){


		//Obteniendo datos mediante post:
		$servicio_id = $this->input->post('servicio_id'); //Servicio ID

		$ano = $this->input->post('ano');  //Mes Seleccionado

		$acuerdo_id = $this->input->post('acuerdo_id'); // Acuerdo ID
		$acuerdo = $this->general->get_row('acuerdo_nivel_servicio',array('acuerdo_nivel_id'=>$acuerdo_id));  //Información de ANS

		$dias_disponibles = $this->obtener_dias_disponibles2($acuerdo); // Días de la semana en los que el servicio es utilizado según el ANS seleccionado

		$horario_disponibilidad = $this->obtener_horario_disponibilidad($acuerdo); //Información de Horario de disponibilidad del Servicio según el ANS seleccionado	

		$meses_nombres = array('0',"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$historial_anual['caidas_servicio']  =  array();
		$total_porcentaje_disponibilidad = 0;
		$total_tiempo_disponible = 0;
		$total_tiempo_horario  = 0;
		$total_numero_caidas = 0;
		$total_tiempo_caido = 0;
		$tiempos_caidas = array();		
		$historial_anual['caidas_procesos']  = array();


		// Id's de todos los procesos que conforman el servicio
		$procesos_id = $this->general->get_result('proceso_soporta_servicio',array('servicio_id'=>$servicio_id));

		// Por cada proceso se inicializa su información
		 foreach ($procesos_id as $proceso) {

			//Información de los procesos pertenecientes al servicio
			$proceso_info[$proceso->servicio_proceso_id] = $this->general->get_row('servicio_proceso',array('servicio_proceso_id'=>$proceso->servicio_proceso_id));
			$historial_anual['procesos_info'] = $proceso_info;

			$nombre_proceso = $proceso_info[$proceso->servicio_proceso_id]->nombre;		           

		           $historial_anual['historial_procesos'][$nombre_proceso] = (object) array('disponibilidad' => 0, 'tiempo_disponible' => '00:00:00', 'caidas'=> 0, 'tiempo_caido' => '00:00:00', 'segundos' => 0);
		}

		// Calculando el Historial del Servicio en comparación a los Objetivos establecidos en el ANS por casa mes del Ano
		for ($i=1; $i <= 12 ; $i++) { 

				$mes = "0".$i."/".$ano;

				$historial_servicio = $this->obtener_historial_servicio_mensual($servicio_id, $mes, $horario_disponibilidad,$dias_disponibles);

				$nombre_mes = $meses_nombres[$i];  // Nombre del mes del ano al cual se le esta elaborando el historial				

				$historial_anual['historial_servicios'][$nombre_mes] = $historial_servicio; //Se almacena el historial completo de cada día. Base para elaborar gráficas		

				// Sumatoria de los niveles de servicio por cada día de la semana
				$total_porcentaje_disponibilidad = $total_porcentaje_disponibilidad + $historial_servicio['disponibilidad'];  // Sumatoria de los porcentajes de disponibilidad
				$total_tiempo_disponible = $total_tiempo_disponible + $this->tiempoSegundos($historial_servicio['tiempo_online']); // Sumatoria del tiempo Online 
				
				$total_tiempo_horario = $total_tiempo_horario  + $this->tiempoSegundos($historial_servicio['tiempo_disponible']); // Sumatoria del tiempo que debe estar disponible el servicio por día.

				$total_numero_caidas = $total_numero_caidas + $historial_servicio['numero_caidas'] ; // Sumatoria de Numero de Caídas
				$total_tiempo_caido = $total_tiempo_caido + $historial_servicio['tiempo_caido_segundos'] ; // Sumatoria de Tiempo Caído

				if($historial_servicio['mayor_caida_segundos'] >= 0)
				{array_push($tiempos_caidas , $historial_servicio['mayor_caida_segundos']); }

				if($historial_servicio['menor_caida_segundos'] >=0)
				{array_push($tiempos_caidas , $historial_servicio['menor_caida_segundos']);}

				/** Información de Caídas de Servicio por día ***/
				$caidas_servicio = $historial_servicio['caidas_servicio'];		

				// Se le agrega el nombre del día a la información de la hora de caída:
				foreach ($caidas_servicio as $caida) {
					$caida->inicio_caida = $caida->inicio_caida."/<b> ".$nombre_mes."</b> ";
					$caida->fin_caida =     $caida->fin_caida." /<b> ".$nombre_mes."</b>";
				}

				//Concatenando la información de las caídas de Servicio
				 $historial_anual['caidas_servicio']  = array_merge( $caidas_servicio , $historial_anual['caidas_servicio'] ); 

				 /*******************************************/


				 /** Información de Caídas de Procesos por día ***/

				 $caidas_procesos = $historial_servicio['caidas_procesos'];

				 // Se le agrega el nombre del día a la información de la hora de caída de los procesos:
				foreach ($caidas_procesos as $caida) {
					$caida->inicio_caida = $caida->inicio_caida."/ <b>".$nombre_mes."</b> ";
					$caida->fin_caida =     $caida->fin_caida." / <b>".$nombre_mes."</b> ";
				}				 

				 // Id's de todos los procesos que conforman el servicio
				 $procesos_id = $historial_servicio['servicio_procesos'];	

				 // Por cada proceso se realiza la sumatoria
				 foreach ($procesos_id as $proceso) {
				 	
				 	// Información de los procesos pertenecientes al servicio
				 	$proceso_info = $this->general->get_row('servicio_proceso',array('servicio_proceso_id'=>$proceso->servicio_proceso_id));
		           			$nombre_proceso = $proceso_info->nombre;
				

					//Información obtenida del historial diario del proceso
					$disponibilidad_proceso = $historial_servicio['historial_procesos'][$nombre_proceso]->disponibilidad;

					$tiempo_disponible_proceso =  $historial_servicio['historial_procesos'][$nombre_proceso]->tiempo_disponible;
					$tiempo_disponible_proceso =  $this->tiempoSegundos($tiempo_disponible_proceso);

					$numero_caidas = $historial_servicio['historial_procesos'][$nombre_proceso]->caidas;
					$tiempo_segundos = $historial_servicio['historial_procesos'][$nombre_proceso]->segundos;

					$tiempo_caido =$historial_servicio['historial_procesos'][$nombre_proceso]->tiempo_caido;
					$tiempo_caido = $this->tiempoSegundos($tiempo_caido);


					// Sumatoria de niveles de servicio del proceso
					$historial_anual['historial_procesos'][$nombre_proceso]->disponibilidad = $historial_anual['historial_procesos'][$nombre_proceso]->disponibilidad + $disponibilidad_proceso;

					$tiempo_disponible_aux =  $historial_anual['historial_procesos'][$nombre_proceso]->tiempo_disponible;
					$tiempo_disponible_aux =  $this->tiempoSegundos($tiempo_disponible_aux);

					$historial_anual['historial_procesos'][$nombre_proceso]->tiempo_disponible = $tiempo_disponible_aux + $tiempo_disponible_proceso;
					$historial_anual['historial_procesos'][$nombre_proceso]->tiempo_disponible = $this->transformarSegundos($historial_anual['historial_procesos'][$nombre_proceso]->tiempo_disponible);

					$historial_anual['historial_procesos'][$nombre_proceso]->caidas = $historial_anual['historial_procesos'][$nombre_proceso]->caidas + $numero_caidas;

					$historial_anual['historial_procesos'][$nombre_proceso]->segundos = $historial_anual['historial_procesos'][$nombre_proceso]->segundos + $tiempo_segundos;


					$tiempo_caido_aux = $historial_anual['historial_procesos'][$nombre_proceso]->tiempo_caido;
					$tiempo_caido_aux = $this->tiempoSegundos($tiempo_caido_aux);

					$historial_anual['historial_procesos'][$nombre_proceso]->tiempo_caido = $tiempo_caido_aux + $tiempo_caido;
					$historial_anual['historial_procesos'][$nombre_proceso]->tiempo_caido = $this->transformarSegundos($historial_anual['historial_procesos'][$nombre_proceso]->tiempo_caido);
				 }  


				 $historial_anual['caidas_procesos']  = array_merge( $caidas_procesos , $historial_anual['caidas_procesos'] ); 
				  /*******************************************/

		}

		// Obtener cantidad de mese que posee el ano		
		
		$historial_anual['numero_dias'] = 12;
		$cantidad_meses = 12;


		/******** INFORMACION DE SERVICIO **********/
		/** Calculando el promedio SEMANAL de los Niveles de Servicio: **/

		//Disponibilidad
		$historial_anual['disponibilidad'] = round($total_porcentaje_disponibilidad / $cantidad_meses , 2);  //Promedio del porcentaje de la disponibilidad semanal

		//Numero de caídas
		$historial_anual['numero_caidas'] = $total_numero_caidas;

		//Duración de caída
		$historial_anual['tiempo_caido'] = $this->transformarSegundos($total_tiempo_caido);
		$historial_anual['tiempo_caido_segundos'] =$total_tiempo_caido;

		//Tiempo en linea		
		//$historial_anual['tiempo_online'] = $this->transformarSegundos($total_tiempo_disponible);
		$historial_anual['tiempo_online'] = $this->segundosToCadena($total_tiempo_disponible);

		// Total de Tiempo de horario según ANS
		//$historial_anual['tiempo_disponible'] =  $this->transformarSegundos($total_tiempo_horario);	
		$historial_anual['tiempo_disponible'] = $this->segundosToCadena($total_tiempo_horario);	

		//Mayor Caída
		$mayor_caida = max($tiempos_caidas);
		$historial_anual['mayor_caida'] = $this->transformarSegundos($mayor_caida);
		$historial_anual['mayor_caida_segundos'] = $mayor_caida;

		//Menor Caída		
		if($mayor_caida != "00:00:00"){

			$tiempos_caidas = array_unique($tiempos_caidas);
			$clave = array_search("00:00:00", $tiempos_caidas);
			unset($tiempos_caidas[$clave]);
		}
		$menor_caida = min($tiempos_caidas);		
		$historial_anual['menor_caida'] = $this->transformarSegundos($menor_caida);
		$historial_anual['menor_caida_segundos'] = $menor_caida;

		/******** FIN DE INFORMACION DE SERVICIO **********/
		

		$historial_anual['servicio_procesos'] = $this->general->get_result('proceso_soporta_servicio',array('servicio_id'=>$servicio_id));
		/******** INFORMACION DE PROCESOS **********/
		$procesos_id = $this->general->get_result('proceso_soporta_servicio',array('servicio_id'=>$servicio_id));

		 // Por cada proceso se calcula el promedio de disponibilidad
		 foreach ($procesos_id as $proceso) {
			//Información de los procesos pertenecientes al servicio
			$proceso_info = $this->general->get_row('servicio_proceso',array('servicio_proceso_id'=>$proceso->servicio_proceso_id));
		           	$nombre_proceso = $proceso_info->nombre;	

		           	$historial_anual['historial_procesos'][$nombre_proceso]->disponibilidad = round($historial_anual['historial_procesos'][$nombre_proceso]->disponibilidad / $cantidad_meses, 2);   
		}
		
		/******** FIN INFORMACION DE PROCESOS **********/		


		$historial_anual['nombre_meses'] = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		$historial_anual['ano'] = $ano;
		$historial_anual['ans'] = $acuerdo;	

		echo json_encode($historial_anual);		
 	}


 	function  acuerdos_incumplidos(){  

		
		$hoy = date('m/d/Y');
		$ayer = strtotime ( '-1 day' , strtotime($hoy ));

		$fecha_dia = date('m/d/Y',$ayer);

		$dia_semana = (int)date('N', strtotime($fecha_dia));

		$acuerdos = $this->general->get_result('acuerdo_nivel_servicio',array('DATE(fecha_final) >=' => date('Y-m-d',$ayer) )); // Todos los acuerdos

		/**** DATOS DE PRUBA****/
		$data_view['cantidad_ans'] = count($acuerdos);
 		$data_view['ayer'] = $fecha_dia;
 		/****************************/		

 		$i = 0;

		foreach ($acuerdos as $acuerdo) {

			$servicio_id= $acuerdo->id_servicio; //Servicio ID
			$acuerdo_id =$acuerdo->acuerdo_nivel_id; // Acuerdo ID

			$horario_disponibilidad = $this->obtener_horario_disponibilidad($acuerdo); //Información de Horario de disponibilidad del Servicio

			// Si el dia es un dia disponible segun el ANS, se procede
			if($horario_disponibilidad[$dia_semana]->horario_inicio != NULL){

				$historial_servicio = $this->obtener_historial_diario($servicio_id,$fecha_dia,$horario_disponibilidad);

				// Calculando el Historial del Servicio en comparación a los Objetivos establecidos en el ANS

				$disponibilidad_reporte = $historial_servicio['disponibilidad'];
				$numero_caidas_reporte = $historial_servicio['numero_caidas'];
				

				$acuerdo_comprometido = false; 
				$acuerdo_violado = false; 

				$estado_acuerdo = "ok"; 
			            $estado_disp = "ok"; 
			            $estado_numero_caidas = "ok"; 
			            $estado_tiempo_total = "ok"; 
			            $estado_tiempo_mayor = "ok"; 
			            $estado_tiempo_menor = "ok"; 			

				// Verificando Disponibilidad
				if($disponibilidad_reporte < $acuerdo->porcentaje_disp){
					$acuerdo_violado = true;	
					$estado_disp = "violado"; 			
				}

				// Verificando Numero de caídas
				if( $numero_caidas_reporte >= $acuerdo->minimo_num_caidas){
					$acuerdo_comprometido = true;
					$estado_numero_caidas = "alerta"; 
					if($numero_caidas_reporte >= $acuerdo->maximo_num_caidas){
						$acuerdo_violado = true;
						$estado_numero_caidas = "violado"; 
					}				
				}

				// Preparando datos de tiempos de caídas
				$tiempo_caido_reporte = $historial_servicio['tiempo_caido_segundos'];
				$mayor_caida_reporte = $historial_servicio['mayor_caida_segundos'];
				$menor_caida_reporte = $historial_servicio['menor_caida_segundos'];

				$tiempo_caido_reporte_aux = $historial_servicio['tiempo_caido_segundos'];
				$mayor_caida_reporte_aux = $historial_servicio['mayor_caida_segundos'];
				$menor_caida_reporte_aux = $historial_servicio['menor_caida_segundos'];
	                                  
	                                   if($acuerdo->unidad_duracion_caidas == "minutos"){
	                                          $tiempo_caido_reporte =   $tiempo_caido_reporte / 60;
	                                          $mayor_caida_reporte =  $mayor_caida_reporte / 60;
	                                          $menor_caida_reporte =  $menor_caida_reporte / 60;
	                                   }

	                                   if($acuerdo->unidad_duracion_caidas == "horas"){
	                                           $tiempo_caido_reporte =   $tiempo_caido_reporte / 3600;
	                                           $mayor_caida_reporte =  $mayor_caida_reporte / 3600;
	                                           $menor_caida_reporte =  $menor_caida_reporte / 3600;
	                                    }


			           if( is_int($tiempo_caido_reporte) == false){                                        
	                                          $tiempo_caido_reporte = round($tiempo_caido_reporte, 2);
	                                    }

	                                    if( is_int($mayor_caida_reporte) == false){                                        
	                                          $mayor_caida_reporte = round($mayor_caida_reporte, 2);
	                                    }

	                                    if( is_int($menor_caida_reporte) == false){                                        
	                                          $menor_caida_reporte = round($menor_caida_reporte, 2);
	                                    }


				// Verificando Tiempo total de caídas
				if( $tiempo_caido_reporte >= $acuerdo->minimo_duracion_caidas){
					$acuerdo_comprometido = true;
					$estado_tiempo_total = "alerta"; 
					if( $tiempo_caido_reporte >= $acuerdo->maximo_duracion_caidas){
						$acuerdo_violado = true;
						$estado_tiempo_total = "violado"; 				
					}				
				}

				// Verificando Tiempo de Mayor caídas
				if( $mayor_caida_reporte >= $acuerdo->minimo_duracion_caidas){
					$acuerdo_comprometido = true;
					$estado_tiempo_mayor= "alerta"; 
					if( $mayor_caida_reporte >= $acuerdo->maximo_duracion_caidas){
						$acuerdo_violado = true;	
						$estado_tiempo_mayor= "violado"; 			
					}				
				}

				// Verificando Tiempo de Menor caídas
				if( $menor_caida_reporte >= $acuerdo->minimo_duracion_caidas){
					$acuerdo_comprometido = true;
					$estado_tiempo_menor= "alerta"; 
					if( $menor_caida_reporte >= $acuerdo->maximo_duracion_caidas){
						$acuerdo_violado = true;
						$estado_tiempo_menor= "violado"; 				
					}				
				}

				
				if($acuerdo_comprometido == true){
					$estado_acuerdo = "alerta"; 
					if($acuerdo_violado == true){
					        $estado_acuerdo = "violado"; 
					}
				}


				if($acuerdo_comprometido != false || $acuerdo_violado != false ){

			            	    $ans_violado = array(

						'acuerdo_nivel_id' => $acuerdo_id,

						'fecha' => date('Y-m-d',$ayer),

			            		'porcentaje_disp' => $disponibilidad_reporte,
			            		'numero_caidas' =>$numero_caidas_reporte,
			            		'tiempo_caido' => $this->segundosToCadena($tiempo_caido_reporte_aux),
			            		'mayor_caida' => $this->segundosToCadena($mayor_caida_reporte_aux),
			            		'menor_caida' => $this->segundosToCadena($menor_caida_reporte_aux),

			            		'estado_acuerdo' => $estado_acuerdo ,
			            		'estado_disp' => $estado_disp,
			            		'estado_numero_caidas' => $estado_numero_caidas,
			            		'estado_tiempo_total' =>  $estado_tiempo_total,
			            		'estado_tiempo_mayor' => $estado_tiempo_mayor,
			            		'estado_tiempo_menor' => $estado_tiempo_menor ,
			                               );

					     $this->general->insert('historial_acuerdo_violado',$ans_violado,'');
				 }

				$data_view['acuerdos_nivel'][$i]['comprometido'] = $acuerdo_comprometido;
				$data_view['acuerdos_nivel'][$i]['violado'] = $acuerdo_violado;


			}			

			$i++;
		}	


 		$this->utils->template($this->list_sidebar_niveles(1),'niveles/reportes/ans_incumplidos',$data_view,'Niveles de Servicio | Reportes de Niveles de Servicio','','two_level');

 	}

    	function  procesar_data(){   	 		    

    		    //Inicializar array de información de caída encontrada por proceso
    		    $procesos =  $this->reportes->obtener_procesos();
    		    $cantidad_procesos = count($procesos);

    		    foreach ($procesos as  $proceso) {
    		    	$procesos_caida[$proceso->comando_ejecutable][1] = (object) array('inicio_caida' => '0', 'fin_caida' => '0', 'estado'=>'activo');
    		    	$procesos_caida_aux[$proceso->comando_ejecutable][1] = (object) array('inicio_caida' => '0', 'fin_caida' => '0', 'estado'=>'activo', 'timestamp' => '0');

    		    	$nombre_proceso = $proceso->comando_ejecutable;
    		    }

    		    // Creacion del array con la información de cuales procesos soportan cada servicio
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

		 				$this->general->insert('proceso_caida_historial',$proceso_caida,'');

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


    		    $data_view['historial'] =  $this->reportes->obtener_historial();
    		    $data_view['procesos']  =  $this->reportes->obtener_procesos();
    		    $data_view['servicios']= $this->general->get_table('servicio');
    		    //$data_view['tiempos'] = $this->general->get_result('proceso_historial',array('comando_ejecutable'=>$nombre_proceso));


		     $this->utils->template($this->list_sidebar_niveles(1),'niveles/reportes/procesar_data',$data_view,'Niveles de Servicio | Reportes de Niveles de Servicio','','two_level');

    		}


}




?>
	
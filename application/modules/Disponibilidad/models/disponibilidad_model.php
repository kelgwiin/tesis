<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class disponibilidad_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
		
	function crearIncidencia($data){
		$this->db->insert('incidencia', array('codigo'=>$data['codigo'], 'descripcion'=>$data['descripcion'], 'servicio_id'=>$data['servicio_id'], 'tiempo_caido'=>$data['tiempo_caido'], 'pro_crit_afect'=>$data['pro_crit_afect'], 'tiempo_retraso'=>$data['tiempo_retraso'], 'usuarios_afectados'=>$data['usuarios_afectados'], 'confiabilidad_informacion'=>$data['confiabilidad_informacion'], 'personal_recuperacion'=>$data['personal_recuperacion']));
	}
	
	function crearOpciones($data){
		$this->db->insert('opciones_mejoras', array('servicio_id'=>$data['servicio_id'], 'impacto_mejoras'=>$data['impacto_mejoras'], 'descripcion_mejoras'=>$data['descripcion_mejoras'], 'beneficio_mejoras'=>$data['beneficio_mejoras'], 'costo_mejoras'=>$data['costo_mejoras']));
	}
	
	function crearLogros($data){
		$this->db->insert('logros_rendimiento', array('servicio_id'=>$data['servicio_id'], 'impacto_logros'=>$data['impacto_logros'], 'descripcion_logros'=>$data['descripcion_logros'], 'beneficio_logros'=>$data['beneficio_logros'], 'costo_logros'=>$data['costo_logros']));
	}
	
	function crearOportunidad($data){
		$this->db->insert('oportunidades_tecnologicas', array('descripcion'=>$data['descripcion'], 'area'=>$data['area'], 'potencial_beneficio'=>$data['potencial_beneficio'], 'recursos_requeridos'=>$data['recursos_requeridos']));
	}
	
	function obtenerlongitudServicios(){		
		$query = $this->db->query("SELECT * FROM servicio");
		return $query->num_rows();
	}
	
	function obtenernombreServicios(){		
		$query = $this->db->query("SELECT nombre FROM servicio");
		if ($query->num_rows() > 0)
		{
			$vector=array(); 	
   			foreach ($query->result() as $row)
   			{
   				 $indice=count($vector)+1;		
				 $vector[$indice] = $row->nombre;				 
   			}
			return $vector;			
		}
		else {
			return false;
		}
	}
	
	function obteneridServicios(){		
		$query = $this->db->query("SELECT servicio_id FROM servicio");
		if ($query->num_rows() > 0)
		{
			$vector=array(); 	
   			foreach ($query->result() as $row)
   			{
   				 $indice=count($vector)+1;		
				 $vector[$indice] = $row->servicio_id;				 
   			}
			return $vector;			
		}
		else {
			return false;
		}
	}
	
	function obtenerfechacreacionServicios(){		
		$query = $this->db->query("SELECT fecha_creacion FROM servicio");
		if ($query->num_rows() > 0)
		{
			$vector=array(); 	
   			foreach ($query->result() as $row)
   			{
   				 $indice=count($vector)+1;		
				 $vector[$indice] = $row->fecha_creacion;				 
   			}
			return $vector;			
		}
		else {
			return false;
		}
	}
	
	function obtenercantidadingresosServicios(){		
		$query = $this->db->query("SELECT cantidad_ingresos FROM servicio");
		if ($query->num_rows() > 0)
		{
			$vector=array(); 	
   			foreach ($query->result() as $row)
   			{
   				 $indice=count($vector)+1;		
				 $vector[$indice] = $row->cantidad_ingresos;				 
   			}
			return $vector;			
		}
		else {
			return false;
		}
	}
	
	//Porcentaje Disponibilidad en los Acuerdos de Niveles de Servicios
	function obtenerPorcentajeDisponibilidadAcordado(){
		$query = $this->db->query("SELECT porcentaje_disponibilidad FROM acuerdos_servicios");
		if ($query->num_rows() > 0)
		{
			$vector=array(); 	
   			foreach ($query->result() as $row)
   			{
   				 $indice=count($vector)+1;		
				 $vector[$indice] = $row->porcentaje_disponibilidad;				 
   			}
			return $vector;			
		}
		else {
			return false;
		}
	}
		
	//Porcentaje Disponibilidad Real
	function obtenerPorcentajeDisponibilidadReal(){
		$query = $this->db->query("SELECT calculo_disponibilidad FROM disponibilidad");
		if ($query->num_rows() > 0)
		{
			$vector=array(); 	
   			foreach ($query->result() as $row)
   			{
   				 $indice=count($vector)+1;		
				 $vector[$indice] = $row->calculo_disponibilidad;				 
   			}
			return $vector;			
		}
		else {
			return false;
		}
	}
	
	//Horas de Fiabilidad en los Acuerdos de Niveles de Servicios
	function obtenerHoraFiabilidadAcordado(){
		$query = $this->db->query("SELECT horas_fiabilidad FROM acuerdos_servicios");
		if ($query->num_rows() > 0)
		{
			$vector=array(); 	
   			foreach ($query->result() as $row)
   			{
   				 $indice=count($vector)+1;		
				 $vector[$indice] = $row->horas_fiabilidad;				 
   			}
			return $vector;			
		}
		else {
			return false;
		}
	}
		
	//Horas de Fiabilidad Real
	function obtenerHoraFiabilidadReal(){
		$query = $this->db->query("SELECT calculo_fiabilidad FROM disponibilidad");
		if ($query->num_rows() > 0)
		{
			$vector=array(); 	
   			foreach ($query->result() as $row)
   			{
   				 $indice=count($vector)+1;		
				 $vector[$indice] = $row->calculo_fiabilidad;				 
   			}
			return $vector;			
		}
		else {
			return false;
		}
	}
	
	//Horas de Confiabilidad en los Acuerdos de Niveles de Servicios
	function obtenerHoraConfiabilidadAcordado(){
		$query = $this->db->query("SELECT horas_confiabilidad FROM acuerdos_servicios");
		if ($query->num_rows() > 0)
		{
			$vector=array(); 	
   			foreach ($query->result() as $row)
   			{
   				 $indice=count($vector)+1;		
				 $vector[$indice] = $row->horas_confiabilidad;				 
   			}
			return $vector;			
		}
		else {
			return false;
		}
	}
		
	//Horas de Confiabilidad Real
	function obtenerHoraConfiabilidadReal(){
		$query = $this->db->query("SELECT calculo_confiabilidad FROM disponibilidad");
		if ($query->num_rows() > 0)
		{
			$vector=array(); 	
   			foreach ($query->result() as $row)
   			{
   				 $indice=count($vector)+1;		
				 $vector[$indice] = $row->calculo_confiabilidad;				 
   			}
			return $vector;			
		}
		else {
			return false;
		}
	}
	//Devuelve el Nombre del Servicio Actual
	function obtenerNombre($datos){
		$id=$datos['ids'];		
		$query = $this->db->query("SELECT nombre FROM servicio where servicio_id=$id");
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $row)
   			{   					
				 $valor = $row->nombre;				 
   			}
			return $valor;			
		}
		else {
			return false;
		}
	}
	
	function obtenerlongitudFechasServiciosHistorial($datos){
		$id=$datos['ids'];							
		$query = $this->db->query("SELECT fecha_creacion FROM servicio_historial where servicio_id=$id");
		if ($query->num_rows() > 0)
		{
			$cantidad= $query->num_rows();
			if($cantidad > 7){
				return 7;
			}	
			return $cantidad;
		}
		else {
			return false;
		}
	}
		
	function obtenerFechas($datos){
		$id=$datos['ids'];		
		$query = $this->db->query("SELECT fecha_creacion FROM servicio_historial where servicio_id=$id");
		$long=$query->num_rows();
		
		if ($long > 7)
		{
			$vector_aux=array();
			$vector=array();
			$var=$long-6;
			foreach ($query->result() as $row)
   			{
   				 $indice=count($vector_aux)+1;		
				 $vector_aux[$indice] = $row->fecha_creacion;				 
   			}
			$i=1;
			 while($i<=7){
			 	echo $i;
				 echo $var;
			 	 $vector[$i] = $vector_aux[$var];
				 $i++;
				 $var=$var+1;
			 }
			 
			 return $vector;	
			 	 
		}
		if ($long > 0)
		{
			$vector=array(); 	
   			foreach ($query->result() as $row)
   			{
   				 $indice=count($vector)+1;		
				 $vector[$indice] = $row->fecha_creacion;				 
   			}
			return $vector;			
		}
		else {
			return false;
		}
		
	}
		
	function obtenerMonitoreoActivo($datos){
		$id=$datos['ids'];	
		//Para obtener el tiempo_ejecucion_total del servicio historial
		$query = $this->db->query("SELECT tiempo_ejecucion_total FROM servicio_historial where servicio_id=$id");
		$long=$query->num_rows();
		
		if ($long > 7)
		{
			$vector_aux=array();
			$vector=array();
			$var=$long-6;
			foreach ($query->result() as $row)
   			{
   				 $indice=count($vector_aux)+1;		
				 $vector_aux[$indice] = $row->tiempo_ejecucion_total;				 
   			}
			$i=1;
			 while($i<=7){			 	
			 	 $vector[$i] = $vector_aux[$var];
				 $i++;
				 $var=$var+1;
			 }
			 
			 return $vector;	
			 	 
		}
				
		if ($long > 0)
		{
			$vector_activos=array(); 
   			foreach ($query->result() as $row)
   			{
   				 $indice=count($vector_activos)+1;		
     			 $vector_activos[$indice] = $row->tiempo_ejecucion_total;		 
   			}
			return $vector_activos;			
		}
		else {
			return false;
		}
	}
	
	function obtenerMonitoreoInactivo($datos){
		//Para obtener el id del servicio que se selecciono
		$id=$datos['ids'];		
		//Para obtener el tiempo_inactividad del servicio historial
		
		$query = $this->db->query("SELECT tiempo_inactividad FROM servicio_historial where servicio_id=$id");
		$long=$query->num_rows();
		
		if ($long > 7)
		{
			$vector_aux=array();
			$vector=array();
			$var=$long-6;
			foreach ($query->result() as $row)
   			{
   				 $indice=count($vector_aux)+1;		
				 $vector_aux[$indice] = $row->tiempo_inactividad;				 
   			}
			$i=1;
			 while($i<=7){
			 	 $vector[$i] = $vector_aux[$var];
				 $i++;
				 $var=$var+1;
			 }
			 
			 return $vector;	
			 	 
		}
				
		if ($long > 0)
		{
			$vector_inactivos=array(); 	
   			foreach ($query->result() as $row)
   			{
   				 $indice=count($vector_inactivos)+1;		
				 $vector_inactivos[$indice] = $row->tiempo_inactividad;				 
   			}
			return $vector_inactivos;			
		}
		else {
			return false;
		}
	}
	
	//Tabla opciones de mejoras para el plan de disponibilidad
    function obtenerOpcionesMejoras()
    {
        $this->load->database();
        $datos = $this->db->get('opciones_mejoras');
        return $datos->result();
    }
	
	//Tabla logros_rendimiento para el plan de disponibilidad
    function obtenerLogrosRendimiento()
    {
        $this->load->database();
        $datos = $this->db->get('logros_rendimiento');
        return $datos->result();
    }
	//Tabla oportunidades_tecnologicas para el plan de disponibilidad
    function obtenerOportunidadesTecnologicas()
    {
        $this->load->database();
        $datos = $this->db->get('oportunidades_tecnologicas');
        return $datos->result();
    }
	
	//Tabla de los Acuerdos de Niveles de Servicios
    function obtenerNivelesServicios()
    {
        $this->load->database();
        $datos = $this->db->get('acuerdos_servicios');
        return $datos->result();
    }
	
	//Tabla de los Niveles Reales de Disponibilidad
    function obtenerDisponibilidad()
    {
        $this->load->database();
        $datos = $this->db->get('disponibilidad');
        return $datos->result();
    }
	
	//Tabla de Incidencia
    function obtenerIncidencia($id)
    {
    	$query = $this->db->query("SELECT * FROM incidencia where servicio_id=$id");
		$long=$query->num_rows();
		if ($long > 0)
		{		
		return $query->result();
		}
		else {
			return false;
		}		
    }
	
	
	//Obtiene el nombre del servicio dado un id
	function obtenerNombreServicioporID($id)
    {
      	$query = $this->db->query("SELECT nombre FROM servicio where servicio_id=$id");
		$long=$query->num_rows();
		if ($long > 0)
		{
		foreach ($query->result() as $row)
   			{
   				 $resultado = $row->nombre;				 
   			}
		return $resultado;
		}
		else {
			return false;
		}
    }
	//Para la lista desplegable de servicio
	function obtenerNameService()
    {
    	    	
      	$query = $this->db->query("SELECT nombre FROM servicio");
		$long=$query->num_rows();
		$vector_aux=array();
		if ($long > 0)
		{
		foreach ($query->result() as $row)
   			{
   				 $indice=count($vector_aux)+1;		
   				 $vector_aux[$indice]= $row->nombre;				 
   			}
		return $vector_aux;
		}
		else {
			return false;
		}
		
		
    }
    
    //Metodos del Calendario
	public function jsonEvents()
	{		  
	    $events = $this->db->get('eventos')->result();		
	    $jsonevents = array();
	    foreach ($events as $entry)
	    {
	    	if($entry->borrado==0){//Si no ha sido eliminado anteriormente
	        $jsonevents[] = array(
	            'id' 		=> $entry->id,
	            'title' 	=> $entry->title,
	            'start' 	=> $entry->start,
	            'allDay' 	=> ($entry->allDay=='true') ? true : false,
	            'end' 		=> $entry->end,
	        );
			 }
	    }
	    return json_encode($jsonevents);
	}
	
	public function drop_event($data)
	{
		extract($data);
		$new_event = array(
			'start'	=>	$daystart,
			'end'	=>	$dayend,
		); 
		
		$this->db->where('id',$event);
		$this->db->update('eventos',$new_event);
		return $this->db->last_query();
	}
	
	public function resize($data)
	{
		extract($data);
		$new_event = array(
			'start'	=>	$daystart,
			'end'	=>	$dayend,
		); 
		
		$this->db->where('id',$event);
		$this->db->update('eventos',$new_event);
		return $this->db->last_query();
	}
	
	public function delete($id)
	{
		$data = array(
               'id' => $id,
               'borrado' => 1,
            );
		$this->db->where('id', $id);
		$this->db->update('eventos', $data); 
		return $this->db->last_query();
	}
	//Fin de metodos del calendario
	public function guardar_disponibilidad($data){
		
		 //$this->debug = true;
        $date = modules::run('Disponibilidad/dateLastMonth',0,1);

        //Recopilando nombre de los procesos que se encuentran asociados a los Servicios
        $nom_procesos = $this->nom_proc_historial();
        $data = array();
        
        //Obteniendo la data asociada a los procesos recopilados
        foreach ($nom_procesos as $nom) {
            unset($data_tmp);
            
           
            $data_tmp = $this->proc_hist_por_hora_mensual($date,$nom,3);
            if(isset($data_tmp) && $data_tmp !== false){
                $data[$nom] = $data_tmp;
            }
        }
        
        //numero de registros por comando
        $reg_por_com = $this->num_procesos();
        
        
        $resultados = array();
        foreach ($data as $key => &$val) {
            $val[2] *= $reg_por_com[$key]*60*24;//repeticiones * minutos * horas
            $resultados[$key] = $val;
        }
        
        $servicios_proc = $this->procesos_servicio();
        $sum_por_serv = array();
        
        foreach ($servicios_proc as $row) {
            if(isset($sum_por_serv[$row['servicio_id']]) ){
                for ($i=0; $i < 3; $i++) { 
                    //Se verifica que exista data de rendimiento
                    //para el proceso asociado al servicio
                    if(isset($resultados[$row['p']])){
                        $sum_por_serv[$row['servicio_id']][$i] += $resultados[$row['p']][$i];
                    }
                }
            }else{
                for ($i=0; $i < 3; $i++) {
                    if(isset($resultados[$row['p']])){
                        $sum_por_serv[$row['servicio_id']][$i] = $resultados[$row['p']][$i];
                    }else{
                        $sum_por_serv[$row['servicio_id']][$i] = 0;
                    }
                    
                }
            }
            
        }
        
       
		
		
		//Calculo Porcentaje de disponibilidad 
             $sql = "SELECT porcentaje_disponibilidad, horas_fiabilidad, horas_confiabilidad, horas_disponibilidad
                        FROM acuerdos_servicios 
                        WHERE  ".$whereAux.";";
                
                $q = $this->db->query($sql);
                $rs = array();
                if($q->num_rows() > 0)
                {
                    foreach ($q->result_array() as $row) 
                    {
                        $rs[] = array($row['porcentaje_disponibilidad'], $row['horas_fiabilidad'],  $row['horas_confiabilidad'], $row['horas_disponibilidad']);
						
                    }
                    $date=$hoursPerDayArray[$arrayIndex][0];
                    $date = substr($date, 0, -9);

                    $tmp_prom = $this->procesar_caso($rs,6,3);
                    
                    for ($i=0; $i < $num_params; $i++) { 
                        $acums[$i] += $tmp_prom[$i];
                        $counter++;
                    }


                    $byHour++;
                }
                
                $sql = "SELECT tiempo_online
                        FROM proceso_historial 
                        WHERE  ".$whereAux.";";
                
                $q = $this->db->query($sql);
                $rs = array();
                if($q->num_rows() > 0)
                {
                    foreach ($q->result_array() as $row) 
                    {
                    	//Se transforma a horas
                        $rs2[] = array($row['tiempo_online'] / 3600);
						
                    }
                    $date=$hoursPerDayArray[$arrayIndex][0];
                    $date = substr($date, 0, -9);

                    $tmp_prom = $this->procesar_caso($rs,6,3);
                    
                    for ($i=0; $i < $num_params; $i++) { 
                        $acums[$i] += $tmp_prom[$i];
                        $counter++;
                    }


                    $byHour++;
                }
                
				$sql = "SELECT tiempo_ejecucion_total, tiempo_inactividad, num_caidas
                        FROM servicio_historial 
                        WHERE  ".$whereAux.";";
                
                $q = $this->db->query($sql);
                $rs = array();
                if($q->num_rows() > 0)
                {
                    foreach ($q->result_array() as $row) 
                    {
                    	//Se transforma a horas
                        $rs3[] = array($row['tiempo_ejecucion_total'] / 3600);
						$rs3[] = array($row['tiempo_inactividad'] / 3600);
						$rs3[] = array($row['num_caidas']);
                    }
                    $date=$hoursPerDayArray[$arrayIndex][0];
                    $date = substr($date, 0, -9);

                    $tmp_prom = $this->procesar_caso($rs,6,3);
                    
                    for ($i=0; $i < $num_params; $i++) { 
                        $acums[$i] += $tmp_prom[$i];
                        $counter++;
                    }


                    $byHour++;
                }
				
				
              //Guardando resutaldos  
			$porcentaje_dispo=(($rs['horas_disponibilidad'] - $rs2['tiempo_online']) / $rs['horas_disponibilidad'] ) * 100;
			$fiabilidad = $rs['horas_disponibilidad'] / $rs3['num_caidas'];
			$confiabilidad = (($rs['horas_disponibilidad'] - $rs3['tiempo_inactividad']) / $rs3['num_caidas']);
			
		
		
		
		//Se guarda el calculo en disponibilidad
        $sql_update = "UPDATE disponibilidad
						SET borrado = 1
						WHERE YEAR(fecha) = YEAR(CURDATE()) AND MONTH(fecha) = MONTH(CURDATE())
						AND servicio_id = ? ";

        foreach ($data as $key => $row) {
            //Marcar como borrado el valor si ya estaba previamente calculado
        	$this->db->query($sql_update, array($key));

            $f = date('Y-m-d H:i:s',now());
            $info = array(
                'disponibilidad_id'=>$key,
                'servicio_id'=>$key,
                'servicio_historial_id'=>$key,
                'descripcion'=>$row[0],
                'tiempo_medio_fallos'=>$row[1],
                'calculo_disponibilidad'=>$porcentaje_dispo,
                'calculo_fiabilidad'=> $fiabilidad, //wired
                'calculo_confiabilidad'=> $confiabilidad
            );
            $this->db->insert('disponibilidad',$info);
        }
    }
	
	
	
}
?>
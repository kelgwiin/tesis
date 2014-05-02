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
}
?>
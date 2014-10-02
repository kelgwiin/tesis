<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Creado: 10-07-2014
 * @author Gustavo Martínez <gustavomartinez1990@gmail.com>
 */
class Capacity_planning_model extends CI_Model
{
	public function __construct(){
	    parent::__construct();
	    $this->load->database();
	    $this->load->model('utilities/utilities_model');
	}
	/*
	 * Permite calcular la tasa de uso de CPU 
	 * 
	 * Se visualiza lo ocurrido en el rango de fecha que se pase por $dateIndex.
	 * Cuando es usado por un servicio podemos pedir los nombres de los porcesos 
	 * que componen al servicio $processName
	 * @return array
	 * - Array (
	 * 		contiene los parametros que se soliciten por $dbIndex
	 * )
	 */

	public function cpuUse($dateIndex, $dbIndex, $processName = FALSE )
	{
		//Se calcula la estructura del año para cada mes del año.
		$where = "timestamp BETWEEN '".$dateIndex['fecha_mes_pasado']."' AND '".$dateIndex['fecha_dia_anterior']."' ";
		if($processName!== FALSE)
		{
			$where=$where." AND ".$processName;
		}
		$arreglo = FALSE;
		$arreglo = $this->db->select("{$dbIndex}")
	                    ->where("{$where}")
	                    ->from('proceso_historial')
	                    ->get()
						->result_array();
	    
		return $arreglo;
	}//end of function: ramUse
	/*
	 * Permite calcular la tasa de uso de la memoria RAM 
	 * 
	 * Se visualiza lo ocurrido en el rango de fecha que se pase por $dateIndex.
	 * Cuando es usado por un servicio podemos pedir los nombres de los porcesos 
	 * que componen al servicio $processName
	 * @return array
	 * - Array (
	 * 		contiene los parametros que se soliciten por $dbIndex
	 * )
	 */

	public function ramUse($dateIndex, $dbIndex, $processName = FALSE )
	{
		//Se calcula la estructura del año para cada mes del año.
		$where = "timestamp BETWEEN '".$dateIndex['fecha_mes_pasado']."' AND '".$dateIndex['fecha_dia_anterior']."' ";
		if($processName!== FALSE)
		{
			$where=$where." AND ".$processName;
		}
		$arreglo = FALSE;
		$arreglo = $this->db->select("{$dbIndex}")
	                    ->where("{$where}")
	                    ->from('proceso_historial')
	                    ->get()
						->result_array();
	    
		return $arreglo;
	}//end of function: cpuUse
	/*
	 * Permite calcular la tasa de uso de todos los recursos de los
	 * componentes de it
	 * 
	 * Se visualiza lo ocurrido en el último mes.
	 * 
	 * @return array
	 * - Array (
	 * 		"month" => Integer,
	 *   	"monto" => Double
	 * )
	 */
	public function resourceUse($dateIndex, $dbIndex, $processName = FALSE )
	{
		//Se calcula la estructura del año para cada mes del año.
		$where = "timestamp BETWEEN '".$dateIndex['fecha_mes_pasado']."' AND '".$dateIndex['fecha_dia_anterior']."' ";
		if($processName!== FALSE)
		{
			$where=$where." AND ".$processName;
		}
		$arreglo = FALSE;
		$arreglo = $this->db->select("{$dbIndex}")
	                    ->where("{$where}")
	                    ->from('proceso_historial')
	                    ->get()
						->result_array();
	    
		return $arreglo;
	}//end of function: resourceUse

	/**
	 * Permite obtener la información relacionada con la Evolución del Modelo de Costos
	 * de cada servicio.
	 * @param  integer $year Año
	 * @return array 
	 */
	public function evol_modelo_c($year){
		$sql = "SELECT c.servicio_id, s.nombre, c.costo, mes
				FROM servicio_costo AS c JOIN servicio AS s ON (c.servicio_id = s.servicio_id)
				WHERE c.borrado = false AND anio = '".$year." AND borrado = false '
				ORDER BY c.servicio_id;";
		$q = $this->db->query($sql);

		if($q->num_rows() <= 0){return false;}

		$data = array();
		$idx_months = array();
		foreach ($q->result_array() as $row) {
			$data[$row['servicio_id']]['name'] = $row['nombre'];
			$data[$row['servicio_id']]['servicio_id'] = $row['servicio_id'];
			
			//Para verificar lo de los índices de los meses
			if(!isset($idx_months[$row['servicio_id']])){
				$idx_months[$row['servicio_id']] = 0;
			}else{
				$idx_months[$row['servicio_id']] += 1;
			}
			$idx_m = $idx_months[$row['servicio_id']];

			$data[$row['servicio_id']]['months'][$idx_m]['cost'] = $row['costo'];
			$data[$row['servicio_id']]['months'][$idx_m]['month'] = $row['mes'];
		}
		$data_final = array();
		foreach ($data as $value) {
			$data_final[] = $value;
		}
		return $data_final;


	}
}

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Creado: 10-07-2014
 * @author Gustavo Martínez <gustavomartinez1990@gmail.com>
 */
class Capacity_planning_model extends CI_Model
{
	public function __construct()
	{
	    parent::__construct();
	    $this->load->database();
	    $this->load->model('utilities/utilities_model');
	}
	/*
	 * Genera un rango de fecha en formato Y-m-j H-i-s
	 * 
	 * $days es el parametro de los dias a restar
	 * $month es el parametro de los meses a restar
	 * @return array
	 * - Array (
	 * 		fecha_mes_pasado => 
	 * 		fecha_dia_anterior => 
	 * )
	 */
    public function percentUsage($resourceUse)
	{
		foreach ($resourceUse as $resourceUseObject)
		{
			
		}
		return TRUE;
	}//end of function: percentUsage
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
	public function resourceUseByComponent($dateIndex, $dbIndex, $processName = FALSE )
	{
		//Se calcula la estructura del año para cada mes del año.
		$where = "timestamp BETWEEN '".$dateIndex['fecha_mes_pasado']."' AND '".$dateIndex['fecha_dia_anterior']."' ";
		if($processName!== FALSE)
		{
			$where=$where." AND ".$processName;
		}
		$names = FALSE;
		$names = $this->db->select("comando_ejecutable")
	                    ->where("{$where}")
	                    ->from('proceso_historial')
						->distinct()
	                    ->get()
						->result_array();
		$arreglo = FALSE;
		$flushWhere = $where;
		foreach ($names as $comando_ejecutable)
		{
			$where = $flushWhere." AND comando_ejecutable = '".$comando_ejecutable['comando_ejecutable']."'";
			$arreglo[$comando_ejecutable['comando_ejecutable']] = $this->db->select("{$dbIndex}")
                ->where("{$where}")
                ->from('proceso_historial')
                ->get()
				->result_array();
		}
		return $arreglo;
	}//end of function: resourceUseByComponent
	/*
	 * Permite calcular la tasa de uso de los recucros de IT 
	 * 
	 * Se visualiza lo ocurrido en el rango de fecha que se pase por $dateIndex.
	 * Cuando es usado por un servicio podemos pedir los nombres de los porcesos 
	 * que componen al servicio $processName
	 * @return array
	 * - Array (
	 * 		contiene los parametros que se soliciten por $dbIndex
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
}
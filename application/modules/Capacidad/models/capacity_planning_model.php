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
	    //Libraries 
		$this->load->library('Kmeans');
	}
	/*
	 * Genera un rango de fecha en formato Y-m-j H-i-s
	 * 
	 * $month es el parametro de los meses a restar
	 * calcula todos los días pasados de este mes
	 * y luego las horas en bloques de 2 en 2 horas
	 * @return array
	 * - Array (
	 * 		
	 * )
	 */
	public function hoursPerMonth($month = FALSE)
	{
		date_default_timezone_set("America/Caracas" );
        $fecha_actual = date("Y-m-d",time());
        $newDate = date("Y-m-d",time());
        $fecha_dia_anterior = $fecha_actual;
        $lastMonthDate = strtotime ( '-'.$month.'month' , strtotime ( $fecha_actual ) ) ;
        $daysLeft = $fecha_actual[8].$fecha_actual[9];
        $daysLeft = (int)$daysLeft-1;
        $band = 1;
        while ($band<=$daysLeft)
        {
        	$band2=$band-1;//Cambiar
        	unset($temporalDay);
			$temporalDay = strtotime ( '-'.$band2.' day' , strtotime ( $newDate ) ) ;
			$temporalDay = date ( 'Y-m-j', $temporalDay );
			$temporalDay = new DateTime($temporalDay);
			$hours = 0;
			$hoursIndex = 0;
			while($hours<24)
			{
				unset($dayAux);
				$dayAux = $temporalDay;
				$dayAux->setTime($hours, 00);
				$dateArrayPerHour[$band-1][$hoursIndex] = date_format($dayAux, 'Y-m-d H:i:s');
				$hours=$hours+2;
				$hoursIndex = $hoursIndex+1;
			}
        	$band ++;
        }
        return $dateArrayPerHour;
	}//end of function: hoursPerMonth
	public function nom_proc_historial()
	{
        $sql = "SELECT distinct sp.nombre p
                FROM servicio s
                JOIN servicio_proceso sp on s.servicio_id = sp.servicio_id;";
        $q = $this->db->query($sql);
        $nombres = array();
        foreach ($q->result_array() as $row)
        {
            $nombres[] = $row['p'];
        }
        return $nombres;
    }

    public function procesos_servicio()
    {
        $sql = "SELECT  sp.nombre p, s.servicio_id
                FROM servicio s
                JOIN servicio_proceso sp on s.servicio_id = sp.servicio_id ;";
        $q = $this->db->query($sql);
        return $q->result_array();
    }
     public function processByService()
    {
        $sql = "SELECT  sp.nombre p, s.servicio_id, s.nombre n
                FROM servicio s
                JOIN servicio_proceso sp on s.servicio_id = sp.servicio_id 
                ORDER BY s.servicio_id ASC;";
        $q = $this->db->query($sql);
        
        $serviceAux = 0;
        $lastService = -1;
        foreach ($q->result_array() as $row) 
        {
        	if($lastService==-1)
        	{
        		$lastService=$row['servicio_id'];
        	}
        	else
        	{
				if($lastService!=$row['servicio_id'])
	        	{
	        		$lastService=$row['servicio_id'];
	        		$serviceAux=0;
	        	}   	
        	}    	
        	$rs[$row['servicio_id']-1]['nombre'] = $row['n'];
        	$rs[$row['servicio_id']-1]['servicio_id'] = $row['servicio_id'];
        	$rs[$row['servicio_id']-1][$serviceAux] = $row['p'];
        	$serviceAux++;
        }
        return $rs;
    }
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
		$where = "timestamp BETWEEN '2014-09-12 00-00-00' AND '2014-10-12 23-00-00'" ; //Quitar
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
	/*
	 * Permite calcular la tasa de uso de cuaqluier componente 
	 * 
	 * Se visualiza lo ocurrido en el rango de fecha que se pase por $dateIndex.
	 * Cuando es usado por un servicio podemos pedir los nombres de los porcesos 
	 * que componen al servicio $processName
	 * @return array
	 * - Array (
	 * 		contiene los parametros que se soliciten por $dbIndex
	 * )
	 */
	public function resourceUseByComponentPerHour($dateIndex, $dbIndex, $processName = FALSE )
	{
		$hoursPerDayArray = $this->hoursPerMonth(0);
		//Se calcula la estructura del año para cada mes del año.
		$where = "timestamp BETWEEN '".$dateIndex['fecha_mes_pasado']."' AND '".$dateIndex['fecha_dia_anterior']."' ";

		$where = "timestamp BETWEEN '2014-09-12 00-00-00' AND '2014-10-12 23-00-00'" ; //Quitar
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


		foreach ($names as $comando_ejecutable)
		{
			$arrayIndex = 0;
			$cleanArrayIndex = 0;
			$band = false;
			while ($arrayIndex < sizeof($hoursPerDayArray))
			{
				$innerArrayIndex = 0;
				$byHour = 0;
				while($innerArrayIndex < 11)
				{
					unset($whereAux);
					$whereAux = "timestamp BETWEEN '".$hoursPerDayArray[$arrayIndex][$innerArrayIndex]."' AND '".$hoursPerDayArray[$arrayIndex][$innerArrayIndex+1]."' ";
					
					$sql = "SELECT {$dbIndex}
           			FROM proceso_historial 
            		WHERE  comando_ejecutable ='".$comando_ejecutable['comando_ejecutable']."' AND ".$whereAux.";";
			        $q = $this->db->query($sql);
			        //Formateando los resultados
			        $rs = array();
					if($q->num_rows() > 0)
				    {
				       	foreach ($q->result_array() as $row) 
				        {
				            $rs[] = array($row['r']);
				        }
				        $date=$hoursPerDayArray[$arrayIndex][0];
			        	$date = substr($date, 0, -9);
			        	$band=true;
				        $dataPerHour[$comando_ejecutable['comando_ejecutable']][$cleanArrayIndex]['comando_ejecutable'] = $comando_ejecutable['comando_ejecutable'];
				        $dataPerHour[$comando_ejecutable['comando_ejecutable']][$cleanArrayIndex][$byHour] = $this->makeKmeans($rs,3,1);
				        $dataPerHour[$comando_ejecutable['comando_ejecutable']][$cleanArrayIndex][$byHour]['fecha'] = $date;
				        $dataPerHour[$comando_ejecutable['comando_ejecutable']][$cleanArrayIndex][$byHour]['hora']=$hoursPerDayArray[$arrayIndex][$innerArrayIndex];
				        $byHour++;
					}
					$innerArrayIndex++;
				}
				if($band==true)
				{
					$cleanArrayIndex++;
				}
				$arrayIndex ++;
			}
		}
		return $dataPerHour;
	}//end of function: resourceUseByComponentPerHour
	/*
	 * Permite calcular la tasa de uso de cuaqluier componente 
	 * 
	 * Se visualiza lo ocurrido en el rango de fecha que se pase por $dateIndex.
	 * Cuando es usado por un servicio podemos pedir los nombres de los porcesos 
	 * que componen al servicio $processName
	 * @return array
	 * - Array (
	 * 		contiene los parametros que se soliciten por $dbIndex
	 * )
	 */
	public function generalResourceUseByComponentPerHour($dateIndex, $dbIndex, $processName = FALSE )
	{
		$hoursPerDayArray = $this->hoursPerMonth(0);
		//Se calcula la estructura del año para cada mes del año.
		$where = "timestamp BETWEEN '".$dateIndex['fecha_mes_pasado']."' AND '".$dateIndex['fecha_dia_anterior']."' ";

		$where = "timestamp BETWEEN '2014-09-12 00-00-00' AND '2014-10-12 23-00-00'" ; //Quitar
		$arrayIndex = 0;
		while ($arrayIndex < sizeof($hoursPerDayArray))
		{
			$innerArrayIndex = 0;
			$byHour = 0;
			while($innerArrayIndex < 11)
			{
				unset($whereAux);
				$whereAux = "timestamp BETWEEN '".$hoursPerDayArray[$arrayIndex][$innerArrayIndex]."' AND '".$hoursPerDayArray[$arrayIndex][$innerArrayIndex+1]."' ";
				
				$sql = "SELECT tasa_cpu,tasa_ram,tasa_escritura_dd
       			FROM proceso_historial 
        		WHERE  ".$whereAux.";";
		        $q = $this->db->query($sql);
		        //Formateando los resultados
		        $rs = array();
				if($q->num_rows() > 0)
			    {
			       	foreach ($q->result_array() as $row) 
			        {
			            $rs[] = array($row['tasa_cpu'], $row['tasa_ram'], $row['tasa_escritura_dd']);
			        }
			        $date=$hoursPerDayArray[$arrayIndex][0];
			        $date = substr($date, 0, -9);
					$dataPerHour[$date]['fecha'] = $date;
					$dataPerHour[$date][$byHour] = $this->makeKmeans($rs,6,3);
			        $dataPerHour[$date][$byHour]['hora']=$hoursPerDayArray[$arrayIndex][$innerArrayIndex];
			        $byHour++;
				}
				$innerArrayIndex++;
			}
			$arrayIndex = $arrayIndex+1;
		}
		return $dataPerHour;
	}//end of function: generalResourceUseByComponentPerHour
	public function findArray($dataArray, $find)
	{

		foreach ($dataArray as $data)
		{
			if($data[0]['comando_ejecutable']==$find)
			{
				return $data[0];
			}
		}
	}
	/*
	 * Permite calcular la tasa de uso de cuaqluier componente 
	 * 
	 * Se visualiza lo ocurrido en el rango de fecha que se pase por $dateIndex.
	 * Cuando es usado por un servicio podemos pedir los nombres de los porcesos 
	 * que componen al servicio $processName
	 * @return array
	 * - Array (
	 * 		contiene los parametros que se soliciten por $dbIndex
	 * )
	 */
	public function generalServiceUseByComponentPerHour($dateIndex)
	{
		$hoursPerDayArray = $this->hoursPerMonth(0);
		//Se calcula la estructura del año para cada mes del año.
		$where = "timestamp BETWEEN '".$dateIndex['fecha_mes_pasado']."' AND '".$dateIndex['fecha_dia_anterior']."' ";

		$where = "timestamp BETWEEN '2014-09-12 00-00-00' AND '2014-10-12 23-00-00'" ; //Quitar
		$arrayIndex = 0;
		
		$processByService = $this->nom_proc_historial();
		foreach ($processByService as $comando_ejecutable)
		{
			$arrayIndex = 0;
			$cleanArrayIndex = 0;
			$band = false;
			while ($arrayIndex < sizeof($hoursPerDayArray))
			{
				$innerArrayIndex = 0;
				$byHour = 0;
				while($innerArrayIndex < 11)
				{
					unset($whereAux);
					$whereAux = "timestamp BETWEEN '".$hoursPerDayArray[$arrayIndex][$innerArrayIndex]."' AND '".$hoursPerDayArray[$arrayIndex][$innerArrayIndex+1]."' ";
					
					$sql = "SELECT tasa_cpu,tasa_ram,tasa_transferencia_dd
           			FROM proceso_historial 
            		WHERE  comando_ejecutable ='".$comando_ejecutable."' AND ".$whereAux.";";
			        $q = $this->db->query($sql);
			        //Formateando los resultados
			        $rs = array();
					if($q->num_rows() > 0)
				    {
				       	foreach ($q->result_array() as $row) 
				        {
				            $rs[] = array($row['tasa_cpu'], $row['tasa_ram'], $row['tasa_transferencia_dd']);
				        }
				        $date=$hoursPerDayArray[$arrayIndex][0];
			        	$date = substr($date, 0, -9);
			        	$band=true;
				        $dataPerHour[$comando_ejecutable][$cleanArrayIndex]['comando_ejecutable'] = $comando_ejecutable;
				        $dataPerHour[$comando_ejecutable][$cleanArrayIndex][$byHour] = $this->makeKmeans($rs,3,3);
				        $dataPerHour[$comando_ejecutable][$cleanArrayIndex][$byHour]['fecha'] = $date;
				        $dataPerHour[$comando_ejecutable][$cleanArrayIndex][$byHour]['hora']=$hoursPerDayArray[$arrayIndex][$innerArrayIndex];
				        $byHour++;
					}
					$innerArrayIndex++;
				}
				if($band==true)
				{
					$cleanArrayIndex++;
				}
				$arrayIndex ++;
			}
		}
		// Ahora se prepara el arreglo con los procesos por servicio.
		unset($processByService);
		$services = $this->processByService();
		$seviceIndex = 0;
		foreach ($services as $service)
		{
			$processIndex = 0;
			$dataPerService[$seviceIndex]['servicio_id'] = $service['servicio_id'];
			while(sizeof($service)-2 > $processIndex) 
			{
				$dataPerService[$seviceIndex][$processIndex] = $this->findArray($dataPerHour,$service[$processIndex]);
				$processIndex++;
			}
			$seviceIndex++;
		}
		return $dataPerService;
	}//end of function: generalServiceByComponentPerHour
	public function generalServiceByComponentPerHour($dateIndex)
	{
		$hoursPerDayArray = $this->hoursPerMonth(0);
		//Se calcula la estructura del año para cada mes del año.
		$where = "timestamp BETWEEN '".$dateIndex['fecha_mes_pasado']."' AND '".$dateIndex['fecha_dia_anterior']."' ";

		$where = "timestamp BETWEEN '2014-09-12 00-00-00' AND '2014-10-12 23-00-00'" ; //Quitar
		$arrayIndex = 0;
		
		$processByService = $this->nom_proc_historial();
		foreach ($processByService as $comando_ejecutable)
		{
			$arrayIndex = 0;
			$cleanArrayIndex = 0;
			$band = false;
			while ($arrayIndex < sizeof($hoursPerDayArray))
			{
				$innerArrayIndex = 0;
				$byHour = 0;
				while($innerArrayIndex < 11)
				{
					unset($whereAux);
					$whereAux = "timestamp BETWEEN '".$hoursPerDayArray[$arrayIndex][$innerArrayIndex]."' AND '".$hoursPerDayArray[$arrayIndex][$innerArrayIndex+1]."' ";
					
					$sql = "SELECT tasa_cpu,tasa_ram,tasa_transferencia_dd
           			FROM proceso_historial 
            		WHERE  comando_ejecutable ='".$comando_ejecutable."' AND ".$whereAux.";";
			        $q = $this->db->query($sql);
			        //Formateando los resultados
			        $rs = array();
					if($q->num_rows() > 0)
				    {
				       	foreach ($q->result_array() as $row) 
				        {
				            $rs[] = array($row['tasa_cpu'], $row['tasa_ram'], $row['tasa_transferencia_dd']);
				        }
				        $date=$hoursPerDayArray[$arrayIndex][0];
			        	$date = substr($date, 0, -9);
			        	$band=true;
				        $dataPerHour[$comando_ejecutable][$cleanArrayIndex]['comando_ejecutable'] = $comando_ejecutable;
				        $dataPerHour[$comando_ejecutable][$cleanArrayIndex][$byHour] = $this->makeKmeans($rs,3,3);
				        $dataPerHour[$comando_ejecutable][$cleanArrayIndex][$byHour]['fecha'] = $date;
				        $dataPerHour[$comando_ejecutable][$cleanArrayIndex][$byHour]['hora']=$hoursPerDayArray[$arrayIndex][$innerArrayIndex];
				        $byHour++;
					}
					$innerArrayIndex++;
				}
				if($band==true)
				{
					$cleanArrayIndex++;
				}
				$arrayIndex ++;
			}
		}
		// Ahora se prepara el arreglo con los procesos por servicio.
		unset($processByService);
		$dataResultArray['servicios'] = $this->processByService();
		$dataResultArray['resourceUse'] = $dataPerHour;
		return $dataResultArray;
	}//end of function: generalResourceUseByComponentPerHour


	public function makeKmeans($data,$num_clusters, $num_params)
	{
		$resultado = $this->kmeans->kmeans($data,$num_clusters);
		$rep = array();
		$prom = array();//para guardar los promedios de cada uno de los grupos generados
		for ($i=0; $i < $num_params; $i++) 
		{ 
			$prom[$i] = 0;
		}
		$counter = 0;
		foreach ($resultado['clusters'] as $cluster)
		{
			$temp = $cluster[0]['coordenadas'];
			$rep[] = $temp;
			//sumando cada ítem de la categoría
			for ($i=0; $i < $num_params; $i++)
			{ 
				$prom[$i] += $temp[$i];
			}
			$counter+=1;
		}
		//promedio
		for ($i=0; $i < $num_params; $i++)
		{
			if($counter!=0)
			{
				$prom[$i] /= $counter;
			}
		}
		return $prom;
	}

}
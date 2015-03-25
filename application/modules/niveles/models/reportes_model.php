<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes_model extends CI_Model  
{
	
	public function obtener_historial()
	{
		//$this->db->group_by('comando_ejecutable');
		$this->db->order_by('timestamp', 'asc');
		//$this->db->order_by('comando_ejecutable', 'asc');
		$query = $this->db->get('proceso_historial'); 
		return $query->result();
	}

	public function obtener_procesos()
	{
		$this->db->group_by('comando_ejecutable');
		$query = $this->db->get('proceso_historial'); 
		return $query->result();
	}


	public function obtener_historial_servicio($servicio_id, $fecha_dia, $horario_inicio, $horario_fin)
	{
		

		$where = "servicio_id = '$servicio_id' AND DATE(inicio_caida) = '$fecha_dia' AND  ( (TIME(inicio_caida) < '$horario_inicio' AND TIME(fin_caida) > '$horario_fin') OR 
												    (TIME(inicio_caida) = '$horario_inicio' AND TIME(fin_caida) = '$horario_fin') OR
												    (TIME(inicio_caida) < '$horario_inicio' AND TIME(fin_caida) = '$horario_fin') OR
												    (TIME(inicio_caida) = '$horario_inicio' AND TIME(fin_caida) > '$horario_fin') OR
												    (TIME(inicio_caida) > '$horario_inicio' AND TIME(fin_caida) < '$horario_fin') OR 
												    (TIME(inicio_caida) < '$horario_inicio' AND (TIME(fin_caida) < '$horario_fin' AND TIME(fin_caida) > '$horario_inicio' )) OR
												    (TIME(inicio_caida) = '$horario_inicio' AND (TIME(fin_caida) < '$horario_fin' AND TIME(fin_caida) > '$horario_inicio' )) OR
												    ( (TIME(inicio_caida) > '$horario_inicio' AND TIME(inicio_caida) < '$horario_fin') AND TIME(fin_caida) = '$horario_fin') OR
												     ( (TIME(inicio_caida) > '$horario_inicio' AND TIME(inicio_caida) < '$horario_fin') AND TIME(fin_caida) > '$horario_fin'))";
		
		$this->db->where($where);
		$query = $this->db->get('servicio_caida_historial');
		return $query->result();
	}


	public function obtener_historial_proceso($proceso_id, $fecha_dia, $horario_inicio, $horario_fin)
	{
		

		$where = "proceso_id = '$proceso_id' AND DATE(inicio_caida) = '$fecha_dia' AND  ( (TIME(inicio_caida) < '$horario_inicio' AND TIME(fin_caida) > '$horario_fin') OR 
												    (TIME(inicio_caida) = '$horario_inicio' AND TIME(fin_caida) = '$horario_fin') OR
												    (TIME(inicio_caida) < '$horario_inicio' AND TIME(fin_caida) = '$horario_fin') OR
												    (TIME(inicio_caida) = '$horario_inicio' AND TIME(fin_caida) > '$horario_fin') OR
												    (TIME(inicio_caida) > '$horario_inicio' AND TIME(fin_caida) < '$horario_fin') OR 
												    (TIME(inicio_caida) < '$horario_inicio' AND (TIME(fin_caida) < '$horario_fin' AND TIME(fin_caida) > '$horario_inicio' )) OR
												    (TIME(inicio_caida) = '$horario_inicio' AND (TIME(fin_caida) < '$horario_fin' AND TIME(fin_caida) > '$horario_inicio' )) OR
												    ( (TIME(inicio_caida) > '$horario_inicio' AND TIME(inicio_caida) < '$horario_fin') AND TIME(fin_caida) = '$horario_fin') OR
												     ( (TIME(inicio_caida) > '$horario_inicio' AND TIME(inicio_caida) < '$horario_fin') AND TIME(fin_caida) > '$horario_fin'))";
		
		$this->db->where($where);
		$query = $this->db->get('proceso_caida_historial');
		return $query->result();
	}

}

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

}

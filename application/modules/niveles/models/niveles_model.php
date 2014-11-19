<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Niveles_model extends CI_Model
{
	
	public function obtener_revisiones_recientes($fecha_actual,$fecha_proxima)
	{
		$this->db->where('inicio >=', $fecha_actual);
		$this->db->where('inicio <=', $fecha_proxima); 
		$this->db->order_by('inicio', 'asc');
		$query = $this->db->get('evento_gns'); 
		return $query->result();
	}

}

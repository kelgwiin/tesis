<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
	public function get_modulos()
	{
		$this->db->join('modulo_padre mp','mp.id_modulo_padre = mh.id_modulo_padre');
		$this->db->order_by('mh.id_modulo_hijo','asc');
		$query = $this->db->get('modulo_hijo mh');
		$query =  $query->result();
		
		foreach($query as $key => $q)
		{
			$obj = new stdClass();
			$obj->id_modulo_hijo = $q->id_modulo_hijo;
			$obj->modulo_hijo = $q->modulo_hijo;
			$mod[$q->id_modulo_padre][] = $obj;	
		}

		return $mod;
	}
	
	public function search_users($param)
	{
		foreach($param as $key => $value)
			$this->db->like($key,$value);
		
		$query = $this->db->get('usuarios');
		return $query->result();
	}
}

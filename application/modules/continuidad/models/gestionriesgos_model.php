<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gestionriesgos_model extends CI_Model
{
	public function get_allrisks($where = array())
	{
		$this->db->select('riesgos_amenazas.*, categorias_riesgos.categoria');
		if(!empty($where)) $this->db->where($where);
		$this->db->join('categorias_riesgos','categorias_riesgos.id_categoria = riesgos_amenazas.id_categoria');
		$query = $this->db->get('riesgos_amenazas')->result();
		
		return $query;
	}
	
	public function get_allpcn($where = array())
	{
		$this->db->select('pc.*, ue.estado,
							cr.categoria, ra.denominacion as riesgos_denominacion, ra.probabilidad, ra.impacto,
							d.nombre, d.icono_fa,
							p.codigo_empleado, p.nombre as nombre_empleado');
		if(!empty($where)) $this->db->where($where);
		$this->db->join('riesgos_amenazas ra','ra.id_riesgo = pc.id_riesgo');
		$this->db->join('categorias_riesgos cr','cr.id_categoria = ra.id_categoria');
		$this->db->join('departamento d','d.departamento_id = pc.id_departamento');
		$this->db->join('personal p','p.id_personal = pc.id_empleado AND p.id_departamento = pc.id_departamento');
		$this->db->join('usuarios_estado ue','ue.id_estado = pc.id_estado');
		$query = $this->db->get('plan_continuidad pc')->result();
		
		return $query;
	}
	
	public function get_personal($where = array())
	{
		$this->db->select('per.*, dp.nombre as nombre_dpto');
		if(!empty($where)) $this->db->where($where);
		$this->db->join('departamento dp','dp.departamento_id = per.id_departamento');
		$this->db->order_by('per.nombre');
		$this->db->order_by('per.id_departamento');
		$query = $this->db->get('personal per')->result();
		
		foreach($query as $key => $q)
			$new[$q->nombre_dpto][] = $q;

		return $new;
	}

	// private function valoracion_riesgo($riesgo)
	// {
		// $probabilidad = array
		// (
		 	// 'Baja' => 1, 'Media-Baja' => 2,
		 	// 'Media' => 3, 'Media-Alta' => 4,
		 	// 'Alta' => 5
		// );
		// $impacto = array
		// (
		 	// 'Bajo' => 1, 'Medio-Bajo' => 2,
		 	// 'Medio' => 3, 'Medio-Alto' => 4,
		 	// 'Alto' => 5
		// );
		// $valoracion = array
		// (
			// '1' => 'Baja',
			// '2' => 'Media-Baja',
			// '3' => 'Media',
			// '4' => 'Media-Alta',
			// '5' => 'Alta',
			// '1.5' => 'Baja',
			// '2.5' => 'Media-Baja',
			// '3.5' => 'Media-Alta',
			// '4.5' => 'Alta'
		// );
		// $valor = ($probabilidad[$riesgo->probabilidad] + $impacto[$riesgo->impacto])/2;
		// return $valoracion[(string)$valor];
	// }
}
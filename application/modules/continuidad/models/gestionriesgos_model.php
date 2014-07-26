<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gestionriesgos_model extends CI_Model
{
	public function get_allrisks()
	{
		$this->db->select('riesgos_amenazas.*, categorias_riesgos.categoria');
		$this->db->join('categorias_riesgos','categorias_riesgos.id_categoria = riesgos_amenazas.id_categoria');
		$query = $this->db->get('riesgos_amenazas')->result();
		return $query;
	}
	
	public function get_allpcn()
	{
		$this->db->select('pc.*, ue.estado,
							cr.categoria, ra.denominacion as riesgos_denominacion, ra.probabilidad, ra.impacto,
							d.nombre, d.icono_fa,
							p.codigo_empleado, p.nombre as nombre_empleado');
		$this->db->join('riesgos_amenazas ra','ra.id_riesgo = pc.id_riesgo');
		$this->db->join('categorias_riesgos cr','cr.id_categoria = ra.id_categoria');
		$this->db->join('departamento d','d.departamento_id = pc.id_departamento');
		$this->db->join('personal p','p.id_personal = pc.id_empleado AND p.id_departamento = pc.id_departamento');
		$this->db->join('usuarios_estado ue','ue.id_estado = pc.id_estado');
		$query = $this->db->get('plan_continuidad pc')->result();
		return $query;
	}
}
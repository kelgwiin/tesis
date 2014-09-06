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
							d.nombre as dpto_nombre, d.icono_fa,
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
	
	public function get_allteams($where = array())
	{
		$this->db->select('e.*, te.tipo_equipo, te.denominacion');
		if(!empty($where)) $this->db->where($where);
		$this->db->join('tipoequipos_pcn te','te.id_tipo = e.id_tipo');
		$query = $this->db->get('equipo_pcn e')->result();
		// die_pre($this->db->last_query());
		foreach($query as $key => $q)
		{
			$empleado = array();
			$equipo = explode(',', $q->equipo);
			$q->equipo = '';
			foreach ($equipo as $key => $team)
				$empleado[] = $this->db->get_where('personal',array('id_personal'=>$team))->row();
			$q->equipo = $empleado;
		}
		return $query;
	}

	public function set_equipo($data)
	{
		if(!empty($data))
		{
			$id_tipo = $this->db->get_where('tipoequipos_pcn',array('tipo_equipo' => $data['tipo_equipo']))->row()->id_tipo;
			$data['id_tipo'] = $id_tipo;
			$this->db->select('equipo_pcn.nombre_equipo');
			$nombres_equipos = $this->db->get_where('equipo_pcn',array('id_tipo'=>$id_tipo))->result();
			
			foreach ($nombres_equipos as $key => $nombres)
				$teams[] = $nombres->nombre_equipo;
			
			$nombre_equipo = $data['tipo_equipo'];
			unset($data['tipo_equipo']);
			$query = $this->db->get_where('equipo_pcn',$data);
			if($query->num_rows() == 0)
			{
				$data['fecha_creacion'] = date('Y-m-d H:i:s');
				$this->db->insert('equipo_pcn',$data);
				$id_equipo = $this->db->insert_id();
				$num = count($teams) + 1;
				$new_name = $nombre_equipo.$num;
				$count = $num;
				while(in_array($new_name, $nombres_equipos))
				{
					$count++;
					$new_name = $new_name.$count;
				}
				$this->db->update('equipo_pcn',array('nombre_equipo'=>$new_name),array('id_equipo'=>$id_equipo));
				return $id_equipo;
			}
		}
		return FALSE;
	}
}
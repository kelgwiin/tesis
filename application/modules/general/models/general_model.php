<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General_model extends CI_Model
{
	// FUNCION PARA PREGUNTAR SI EXISTE UN CONTENIDO EN LA BASE DE DATOS
	// RECIBE EL NOMBRE DE LA TABLA -$table-, Y UN ARREGLO DE CONDICIONES -$where-
	// SI NO EXISTE UNA FILA, RETORNA -FALSE-, SINO, RETORNA -TRUE-
	// @author f6rnando - FERNANDO PINTO
	public function exist($table,$where)
	{
		$query = $this->db->get_where($table,$where);
		if($query->num_rows() > 0)
			return TRUE;

		return FALSE;
	}
	
	// FUNCION QUE RETORNA UNA FILA DE UNA TABLA
	// RECIBE EL NOMBRE DE LA TABLA -$table-, Y UN ARREGLO DE CONDICIONES -$where-
	// @author f6rnando - FERNANDO PINTO
	public function get_row($table,$where,$select='')
	{
		if(!empty($select))
		{
			foreach($select as $key => $value)
				$this->db->select($value);
		}
		$query = $this->db->get_where($table,$where);
		return $query->row();
	}
	
	// FUNCION QUE RETORNA TODOS LOS RESULTADOS DE UNA TABLA
	// RECIBE EL NOMBRE DE LA TABLA -$table-, Y UN ARREGLO DE CONDICIONES -$where-
	// @author f6rnando - FERNANDO PINTO
	public function get_result($table,$where)
	{
		$query = $this->db->get_where($table,$where);
		return $query->result();
	}
	
	// FUNCION QUE RETORNA UNA FILA DE UNA TABLA
	// RECIBE EL NOMBRE DE LA TABLA -$table-, Y UN ARREGLO DE CONDICIONES -$where-
	// @author f6rnando - FERNANDO PINTO
	public function get_table($table)
	{
		$query = $this->db->get($table);
		return $query->result();
	}
	
	// FUNCION PARA INSERTAR CONTENIDO EN LA BASE DE DATOS
	// RECIBE EL NOMBRE DE LA TABLA -$table-, UN ARREGLO DE CONDICIONES -$where-, Y LOS DATOS A INSERTAR -$data-
	// SI YA EXISTE UNA FILA O HUBO UN PROBLEMA EN LA INSERSION, RETORNA -FALSE-, SINO, RETORNA EL ID
	// @author f6rnando - FERNANDO PINTO
	public function insert($table,$data,$where = '')
	{
		if(!empty($where))
		{
			$query = $this->db->get_where($table,$where);
			if($query->num_rows() == 0)
			{
				if($this->db->insert($table,$data))
					return $this->db->insert_id();
			}
			return FALSE;
		}else
		{
			if($this->db->insert($table,$data)) return $this->db->insert_id();
			else return FALSE;
		}
		
	}
	
	// FUNCION PARA ELIMINAR CONTENIDO EN LA BASE DE DATOS
	// RECIBE EL NOMBRE DE LA TABLA -$table-, Y UN ARREGLO DE CONDICIONES -$where-
	// SI NO EXISTE UNA FILA O HUBO UN PROBLEMA EN LA ACTUALIZACION, RETORNA -FALSE-, SINO, RETORNA -TRUE-
	// @author f6rnando - FERNANDO PINTO
	public function delete($table,$where)
	{
		$query = $this->db->get_where($table,$where);
		if($query->num_rows() > 0)
		{
			if($this->db->delete($table,$where))
				return TRUE;
		}
		return FALSE;
	}
	
	// FUNCION PARA ACTUALIZAR CONTENIDO EN LA BASE DE DATOS
	// RECIBE EL NOMBRE DE LA TABLA -$table-, LOS DATOS A ACTUALIZAR -$data-, Y UN ARREGLO DE CONDICIONES -$where-
	// @author f6rnando - FERNANDO PINTO
	public function update($table,$data,$where)
	{
		$new_data = '';
		$query = $this->db->get_where($table,$where);
		if($query->num_rows() != 0)
		{
			$query = (array)$query->row();
			foreach($data as $key => $value)
			{
				if($query[$key] != $value)
					$new_data[$key] = $value;
			}
			$this->db->update($table,$new_data,$where);
			return TRUE;
		}
		return FALSE;
	}
	
	public function fija($table,$where)
	{
		$query = $this->db->get_where($table,$where);
		if($query->num_rows() > 0)
		{
			$query = $query->row();
			if($query->fija)
				return TRUE;
		}
		return FALSE;
	}
	
	public function set_alert($data,$where=array())
	{
		$query = $this->db->get_where('system_alerts',$where);
		if($query->num_rows() > 0)
		{
			$this->update2('system_alerts', $data, $where);
		}else
		{
			$data['timestamp'] = date('Y-m-d H:i:s');
			$id_alert = $this->insert('system_alerts', $data);
		}
	}


	public function update2($table,$data,$where)
	{
		$query = $this->db->get_where($table,$where);
		if($query->num_rows() != 0)
		{
			$this->db->update($table,$data,$where);
			return TRUE;
		}
		return FALSE;
	}
}

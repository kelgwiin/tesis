<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Creado: 21-07-2014
 * @author Kelwin Gamez <kelgwiin@gmail.com>
 */
class Modelo_costos_model extends CI_Model{
	public function __construct(){
	    parent::__construct();
	    $this->load->database();
	    $this->load->model('utilities/utilities_model');
	}

	/**
	 * Obtiene los costos por servicio
	 * @param  array $data Data
	 * @return array
	 */
	public function costos_by_servicio($data){
		
		if($data['esquema_tiempo'] == "AA"){//by year
			$sql = "SELECT s.nombre, c.costo, c.fecha_creacion, nivel_criticidad, mes
					FROM servicio_costo as c join servicio as s ON (c.servicio_id = s.servicio_id)
					WHERE c.borrado = FALSE AND anio = '".$data['anio']."';";
		}else{//by year
			$sql = "SELECT s.nombre, c.costo, c.fecha_creacion, nivel_criticidad, mes
					FROM servicio_costo as c join servicio as s ON (c.servicio_id = s.servicio_id)
					WHERE c.borrado = FALSE AND anio = '".$data['anio']."' AND mes = '".$data['mes']."';";

		}
		$q = $this->db->query($sql);

		if($q->num_rows() > 0 ){
			return $q->result_array();
		}else{
			return null;
		}

	}

}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Creado: 29-06-2014
 * @author Kelwin Gamez <kelgwiin@gmail.com>
 */
class Recomendaciones_model extends CI_Model{
	public function __construct(){
	    parent::__construct();
	    $this->load->database();
	    $this->load->model('utilities/utilities_model');
	    $this->load->model('costos_model');
	}

	/**
	 * Obtiene los Componentes de TI que están a punto de vencerse.
	 * Desde fecha actual hasta una semana después.
	 * @return array data
	 */
	public function get(){
		$sql = "SELECT cti.nombre, cti.fecha_creacion, cti.fecha_hasta, cti.cantidad, categ.nombre AS categoria
				FROM componente_ti  AS cti JOIN (ma_unidad_medida AS uni, ma_categoria AS categ) 
					ON (cti.ma_unidad_medida_id = uni.ma_unidad_medida_id AND uni.ma_categoria_id = categ.ma_categoria_id)
				WHERE borrado = false AND activa = 'ON'
					AND fecha_hasta BETWEEN curdate() AND curdate() + INTERVAL 7 DAY;";
		$q = $this->db->query($sql);
		if($q->num_rows() > 0){
			return $q->result_array();
		}else{
			return false;
		}
	}
}


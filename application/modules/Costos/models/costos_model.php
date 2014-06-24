<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Costos_model extends CI_Model{
	public function __construct(){
	    parent::__construct();
	    $this->load->database();
	    $this->load->model('utilities/utilities_model');
	}

	/**
	 * Permite calcular la estructura de costos por categoría
	 * @return boolean Indica si fueron o no realizados con éxito
	 * los calculos.
	 */
	public function estructura_costos(){
		//Componentes de TI
		$sql_cti = "SELECT ma_unidad_medida_id,nombre, precio,cantidad, capacidad, fecha_creacion
				FROM componente_ti
				WHERE activa = 'ON' AND borrado = false;";
		$q_cti = $this->db->query($sql_cti);
		$r_cti = $q_cti->result_array();

		//ma_categoria
		$sql_categ = "SELECT ma_categoria_id, valor_base
					  FROM ma_categoria;";
		$q_categ = $this->db->query($sql_categ);
		
		$r_categ = array();
		foreach ($q_categ->result_array() as $row) {
			$r_categ[$row['ma_categoria_id']] = $row['valor_base'];
		}

		//ma_unidad_medida
		$sql_uni = "SELECT ma_unidad_medida_id, ma_categoria_id, valor_nivel
					FROM ma_unidad_medida;";
		$q_uni = $this->db->query($sql_uni);
		$r_uni = array();
		foreach ($q_uni->result_array() as $row) {
			$r_uni[$row['ma_unidad_medida_id']] = array('ma_categoria_id'=>$row['ma_categoria_id'],
				'valor_nivel'=>$row['valor_nivel']);
		}

		//-- Obteniendo todos los Costos Indirectos
		//arrendamiento
		$sql_arren = "SELECT arrendamiento_id, costo, fecha_inicial_vigencia, tiempo, esquema_tiempo
					FROM arrendamiento
					WHERE borrado = false;";
		$q = $this->db->query($sql_arren);
		$r_arren = $q->result_array();

		//mantenimiento 
		$sql_mant = "SELECT mantenimiento_id, costo, fecha, departamento_id, ma_categoria_id
					FROM mantenimiento
					WHERE borrado = false;";
		$q = $this->db->query($sql_mant);
		$r_mant = $q->result_array();

		//formacion
		$sql_for = "SELECT formacion_id, costo, fecha
					FROM formacion
					WHERE borrado = false;";
		
		$q = $this->db->query($sql_for);
		$r_for = $q->result_array();

		//honoraios profesionales
		$sql_hon = "SELECT honorario_id, costo, numero_profesionales, fecha_desde, fecha_hasta
					FROM honorario
					WHERE borrado = false;";
		$q = $this->db->query($sql_hon);
		$r_hon = $q->result_array();

		//utileria
		$sql_util = "SELECT utileria_id, costo, fecha
					FROM utileria
					WHERE borrado = false;";
		$q = $this->db->query($sql_util);
		$r_util = $q->result_array();


		echo_pre($r_util);

	}

}
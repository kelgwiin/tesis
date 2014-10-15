<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Creado: 27-06-2014
 * @author Kelwin Gamez <kelgwiin@gmail.com>
 */
class Historicos_model extends CI_Model{
	public function __construct(){
	    parent::__construct();
	    $this->load->database();
	    $this->load->model('utilities/utilities_model');
	    $this->load->model('costos_model');
	}
	/**
	 * Permite calcular la evolución histórica de las inversiones hechas en componenentes
	 * de ti.
	 * 
	 * Se visualiza lo ocurrido en un año escogido.
	 * @param $year Año
	 * @param $recalcular Indica si se recalcula o no la estructura de costos,
	 * cuando se agrega un componente de ti o algún item de Costos Indirectos 
	 * es ideal seleccionar la opción de recalcular la estructura de costos.
	 * 
	 * @return array
	 * - Array (
	 * 		"month" => Integer,
	 *   	"monto" => Double
	 * )
	 */
	public function evol_comp_ti($year,$recalcular = false){
		if ($recalcular) {
			//Se calcula la estructura del año para cada mes del año. Si ya fue
			//calculado no se recalcula
			$this->costos_model->estructura_costos_by_year($year);	
		}else{
			//Se recalcula todo para el presente año
			$this->costos_model->estructura_costos_by_year_all($year);	
		}

		$sql = "SELECT estructura_costo_id, mes
				FROM estructura_costo
				WHERE anio = '".$year."'
				ORDER BY mes ASC;";
		$q = $this->db->query($sql);
		if($q->num_rows() <= 0 ){ return false;}

		$result = array();
		foreach ($q->result_array() as $row) {
			$items = $this->utilities_model->rows_by_id("estructura_costo_item",
				"estructura_costo_id",$row['estructura_costo_id']);
			$total_costo = 0;
			foreach ($items as $e) {
				$total_costo += $e['total_monetario'] + $e['total_monetario_cost_ind'];
			}
			$result[] = array('month'=> $row['mes'], 'monto'=>$total_costo);
		}

		return $result;
	}//end of function: evol_comp_ti

	/**
	 * Permite obtener la información relacionada con la Evolución del Modelo de Costos
	 * de cada servicio.
	 * @param  integer $year Año
	 * @return array 
	 */
	public function evol_modelo_c($year){
		$sql = "SELECT c.servicio_id, s.nombre, c.costo, mes
				FROM servicio_costo AS c JOIN servicio AS s ON (c.servicio_id = s.servicio_id)
				WHERE c.borrado = false AND anio = $year
				ORDER BY c.servicio_id ;";
		$q = $this->db->query($sql);

		if($q->num_rows() <= 0){return false;}

		$data = array();
		$idx_months = array();
		foreach ($q->result_array() as $row) {
			$data[$row['servicio_id']]['name'] = $row['nombre'];
			$data[$row['servicio_id']]['servicio_id'] = $row['servicio_id'];
			
			//Para verificar lo de los índices de los meses
			if(!isset($idx_months[$row['servicio_id']])){
				$idx_months[$row['servicio_id']] = 0;
			}else{
				$idx_months[$row['servicio_id']] += 1;
			}
			$idx_m = $idx_months[$row['servicio_id']];

			$data[$row['servicio_id']]['months'][$idx_m]['cost'] = $row['costo'];
			$data[$row['servicio_id']]['months'][$idx_m]['month'] = $row['mes'];
		}
		$data_final = array();
		foreach ($data as $value) {
			$data_final[] = $value;
		}
		return $data_final;


	}
}

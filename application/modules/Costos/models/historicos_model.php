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
	}
	/**
	 * Permite calcular la evolución histórica de las inversiones hechas en componenentes
	 * de ti.
	 * 
	 * Se visualiza lo ocurrido en un año escogido.
	 * 
	 * @return array
	 * - Array (
	 * 		"month" => Integer,
	 *   	"monto" => Double
	 * )
	 */
	public function evol_comp_ti($year){
		$sql = "SELECT estructura_costo_id, mes
				FROM estructura_costo
				WHERE anio = '".$year."'
				ORDER BY mes ASC;";
		$q = $this->db->query($sql);
		if($q->num_rows() <= 0 ){return false;}

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

}

<?php

class Datos_basicos_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('utilities/utilities_model');
    }

    public function unidades_medida_capacidad($id_categoria){
    	$sql = 'SELECT ma_unidad_medida_id,abrev_nombre, valor_nivel '.
    	 		' FROM ma_unidad_medida ' .
    	 		' WHERE ma_categoria_id = ?; ';

        $q = $this->db->query($sql, array($id_categoria));
        if($q->num_rows() > 0){
            $rows = $q->result_array();    
        }else{
            $rows = NULL;
        }
    	return $rows;
    }

} // /class Datos_basicos_model.php
//Location: ./modules/cargar_data/datos_basicos_model.php
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

     /**
     * Obtiene todos los componentes de ti que no hayan sido borrados
     * y que estén en activos (en estado 'ON').
     * 
     * @return Array Un array con tres campos:
     * ['list_comp_ti'] 
     * Un array de filas del tipo (clave,valor), donde clave el nombre de
     * asociado a cada una de las columnas.
     * 
     * ['list_unidad_medida']
     * Un array que contiene el conjunto de filas de las unidades de
     * medidas.
     * 
     * ['list_categ']
     * Un array que contiene el conjunto de filas de las categorias.
     */
    public function all_componentes_ti(){
        //Lista de Componentes de TI
        $sql_comp_ti = "SELECT * FROM componente_ti ".
                "WHERE borrado = false AND activa = 'ON' ".
                'ORDER BY componente_ti_id ; ';
        $q = $this->db->query($sql_comp_ti);
        $list_comp_ti = $q->result_array();

        //Lista de Unidades de medida
        $num_IDs_unidad=0;
        $IDs_unidad = array();
        foreach ($list_comp_ti as $value) {
            $item = $value['ma_unidad_medida_id'];
            $num_IDs_unidad = !isset($IDs_unidad[$item]) ? ($num_IDs_unidad+1) : $num_IDs_unidad ;
            $IDs_unidad[$item] = $item;
        }
        $sql_unidad =  "SELECT ma_unidad_medida_id, ma_categoria_id, abrev_nombre
                        FROM ma_unidad_medida
                        WHERE ma_unidad_medida_id IN (";
        $question_marks ="";
        
        for ($i=0; $i < $num_IDs_unidad; $i++) { 
            $question_marks .= "?,";
        }
        
        $size = strlen($question_marks);
        $question_marks[$size-1] = ')';//quitando la ultima coma adicional
        $sql_unidad.= $question_marks.";"; 
        $q_unidad = $this->db->query($sql_unidad,$IDs_unidad);
        
        $prelist_unidad = $q_unidad->result_array();
        $list_unidad = array();
        $IDs_categ = array();
        $num_IDs_categ = 0;
        foreach ($prelist_unidad as $row) {//Procesando para indexarlo por id
            $id = $row['ma_unidad_medida_id'];
            $list_unidad[$id] = array('abrev_nombre' => $row['abrev_nombre'],
                                    'ma_categoria_id' =>$row['ma_categoria_id']);
            //Obteniendo los ids de las categorías
            $id_categ = $row['ma_categoria_id'];
            $num_IDs_categ = !isset($IDs_categ[$id_categ])? ($num_IDs_categ+1):$num_IDs_categ;
            $IDs_categ[$id_categ] = $id_categ;
        }
        //Lista de Categorias
        $sql_categ =   "SELECT ma_categoria_id, nombre, icono_fa
                        FROM ma_categoria
                        WHERE ma_categoria_id in ( ";
        $question_marks_categ = "";
        for ($i=0; $i < $num_IDs_categ; $i++) { 
            $question_marks_categ .= "?,";
        }
        $size_categ = strlen($question_marks_categ);
        $question_marks_categ[$size_categ-1] = ')';
        $sql_categ.= $question_marks_categ . ";";
        $q_categ = $this->db->query($sql_categ,$IDs_categ);
        
        $prelist_categ = $q_categ->result_array();
        $list_categ = array();
        foreach ($prelist_categ as $row) {
            $id_categ = $row['ma_categoria_id'];
            $list_categ[$id_categ] = array (
                    'nombre' => $row['nombre'],
                    'icono_fa' =>$row['icono_fa']
                );
        }

        $resp  = array(
            'list_comp_ti' => $list_comp_ti,
            'list_unidad_medida' => $list_unidad,
            'list_categ' => $list_categ
        );
        return $resp;
    }

 


} // /class Datos_basicos_model.php
//Location: ./modules/cargar_data/datos_basicos_model.php
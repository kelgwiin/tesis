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
     * 
     * @param String $target Una cadena que indica si se aplicará un filtro
     * en la consulta. Dominio {all,nombre,categoria}
     * @param String $data_target Dato de comparación del nombre o categoria.
     * Si es all este campo se deja vacío.
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
    public function all_componentes_ti($target, $data_target = null){
        //Lista de Componentes de TI
        //NOTA: Podría optimizarce obteniendo la información sólo a
        //través de join como se hace en la consulta de categoría.
        $sql_comp_ti = "";

        switch ($target) {
            case 'all':
                $sql_comp_ti = "SELECT  comp.*,uni.abrev_nombre,categ.nombre as nomcateg , categ.icono_fa
                                FROM componente_ti as comp join (ma_categoria as categ, ma_unidad_medida as uni) 
                                ON (comp.ma_unidad_medida_id = uni.ma_unidad_medida_id and uni.ma_categoria_id = categ.ma_categoria_id)
                                WHERE borrado = false and activa = 'ON'
                                ORDER BY comp.componente_ti_id;";
                                
                break;
            case 'nombre':
                $sql_comp_ti = "SELECT  comp.*,uni.abrev_nombre,categ.nombre as nomcateg , categ.icono_fa
                                FROM componente_ti as comp join (ma_categoria as categ, ma_unidad_medida as uni) 
                                ON (comp.ma_unidad_medida_id = uni.ma_unidad_medida_id and uni.ma_categoria_id = categ.ma_categoria_id)
                                WHERE borrado = false and activa = 'ON' AND comp.nombre LIKE '%".$data_target."%'
                                ORDER BY comp.componente_ti_id;";
                break;
            case 'categoria':
                $sql_comp_ti = "SELECT  comp.*,uni.abrev_nombre,categ.nombre as nomcateg , categ.icono_fa 
                                FROM componente_ti as comp join (ma_unidad_medida as uni,ma_categoria as categ)
                                ON (comp.ma_unidad_medida_id = uni.ma_unidad_medida_id AND uni.ma_categoria_id = categ.ma_categoria_id) 
                                WHERE categ.nombre like '%".$data_target."%' 
                                ORDER BY comp.componente_ti_id;";
                break;
        }
        
        $q = $this->db->query($sql_comp_ti);
        $list_comp_ti = $q->result_array();
        $num_comp_ti = $q->num_rows();//Número de filas

        $resp  = array(
            'list_comp_ti' => $list_comp_ti,
            'num_rows_comp_ti'=>$num_comp_ti
        );
        return $resp;
    }

 


} // /class Datos_basicos_model.php
//Location: ./modules/cargar_data/datos_basicos_model.php
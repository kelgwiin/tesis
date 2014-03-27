<?php

class Datos_basicos_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('utilities/utilities_model');
    }
    /**
     * Del maestro de unidad de medida obtiene la info que coincida con 
     * la categoría dada.
     * @param  Integer $id_categoria ID de la categoría asociado
     * @return Array  De forma: 
     * array('ma_unidad_medida_id' => Integer,
     *       'abrev_nombre' => String,
     *       'valor_nivel' => Integer 
     * )
     */
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
    /**
     * Permite obtener la información de la categoría y la
     * unidad de medida a partir de el ID de unidad de medida
     * @param  Integer $id_unidad_medida ID de la unidad de medida
     * @return Array Contiene la info de la categoria y la unidad de medida
     * con el siguiente formato:
     * array(
     *     'nomcateg' => String
     *     'abrev_unidad' =>String
     *     'id' => Integer // ID de la categoría    
     *     'basecateg' => Integer // Valor de base de la categoría.
     * )
     */
    public function info_categoria($id_unidad_medida){
        $sql = "SELECT abrev_nombre, ma_categoria_id  
                FROM ma_unidad_medida 
                WHERE ma_unidad_medida_id = '".$id_unidad_medida."';";

        $q = $this->db->query($sql);
        $rs = $q->first_row('array');

        $abrev_unidad = $rs['abrev_nombre'];
        $id_categ = $rs['ma_categoria_id'];

        $sql = "SELECT nombre, valor_base as base  
                FROM ma_categoria
                WHERE ma_categoria_id = '".$id_categ."';";
        $q = $this->db->query($sql);
        $rs = $q->first_row('array');
        $nomcateg = $rs['nombre'];
        $base = $rs['base'];

        return array('nomcateg' => $nomcateg, 'abrev_unidad'=>$abrev_unidad,
            'id' =>$id_categ, 'basecateg' => $base);
    }
    /**
     * Obtiene todos los ids y nombres de los componentes de ti 
     * que se encuentran activos
     * @return Array Una array asociativo del tipo:
     * array(
     *     'id' => Integer,
     *     'nombre'=>String
     * )
     */
    public function ids_nombres_comp_ti(){
        $sql = "SELECT componente_ti_id as id,nombre
                FROM componente_ti
                WHERE borrado = false and activa = 'ON';";
        $q = $this->db->query($sql);
        return $q->result_array(); 
    }
 


} // /class Datos_basicos_model.php
//Location: ./modules/cargar_data/datos_basicos_model.php
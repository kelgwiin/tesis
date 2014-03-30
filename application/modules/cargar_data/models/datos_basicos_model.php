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
     *     'nombre'=>String,
     *     'cant_disp'=>Integer
     * )
     */
    public function ids_nombres_comp_ti(){
        $sql = "SELECT componente_ti_id as id,nombre, cantidad_disponible as cant_disp
                FROM componente_ti
                WHERE borrado = false AND activa = 'ON' AND (cantidad_disponible > 0  OR tipo_asignacion = 'MULT');";
        $q = $this->db->query($sql);
        return $q->result_array(); 
    }

    /**
     * Agrega el dpto en conjunto con los componentes asociados
     * @param Array $data Tiene la siguiente forma:
     * array(  'nombre' => String,
     *         'descripcion' => String,
     *         'icono_fa' => String,
     *         'list_comp_ti' => array (ids de comp ti)
     * )
     */
    public function add_dpto_comp_ti($data){
        $st_dpto = false;
        $st_inv = false;
        $st_inv_comp = false;

        //Agregando el dpto
        $data_dpto = array('nombre' => $data['nombre'], 
                'descripcion' => $data['descripcion'],
                'icono_fa'=>$data['icono_fa']);
        $st_dpto= $this->utilities_model->add($data_dpto,'departamento');
        
        //Agregando el inventario
        $date = date('Y-m-d H:i:s',now());
        $id_dpto = $this->db->insert_id();//id del dpto insertado
        $data_inv = array('departamento_id' => $id_dpto, 'fecha_creacion' => $date);
        $st_inv = $this->utilities_model->add($data_inv,'inventario_ti');

        //Agregando los Componentes de TI & Actualizando cant. disponible (interrelación)
        $id_inv = $this->db->insert_id();//id del inv. insertado
        foreach ($data['list_comp_ti'] as $r) {
            $data_comp = array('inventario_ti_id'=>$id_inv, 'componente_ti_id'=>$r['id']);
            $this->utilities_model->add($data_comp,'inventario_componente_ti');

            //actualizando la cantidad disponible
            $sql_cant_disp =   "UPDATE componente_ti 
                                SET cantidad_disponible = ".($r['cant_disp']-1)."
                                WHERE tipo_asignacion='UNI' AND componente_ti_id = '".$r['id']."';";
            $st_inv_comp = $this->db->query($sql_cant_disp);
        }
        return $st_dpto && $st_inv && $st_inv_comp;
    }
    /**
     * Retorna el conjunto de departamento con los componentes de ti asociados
     * @param String $filter_by_name Filtra por nombre los dptos pero por defecto 
     * está en vacío.
     * @return Array array ('data' => array de array *,
     *         'total_rows' => Integer)
     * 
     * Es una array de dos campos [data, total rows]. El campo de "data"
     * contien una clave de tipo entero y en cada uno posee dos array como se 
     * describen abajo.
     * 
     *        [*] array('dpto' => array de dpto **
     *               'list_comp_ti' => array de comp de ti ***)
     * [**]Array(
     *   'departamento_id' => Integer
     *   'nombre' => String
     *   'icono_fa' => String
     *   'descripcion'=> String
     *   'borrado' =>boolean)
     * 
     *  [***] Array(
     *  'nombre' => String
     *  'id' => Integer
     * )
     */
    public function all_dpto($filter_by_name=NULL){
        //Departamentos
        if(!isset($filter_by_name)){
            $sql_dpto = "SELECT departamento_id, nombre, icono_fa, descripcion 
                        FROM departamento 
                        WHERE borrado = false ; ";
        }else{
            $sql_dpto = "SELECT departamento_id, nombre, icono_fa, descripcion 
                        FROM departamento 
                        WHERE borrado = false AND nombre LIKE '%".$filter_by_name."%' ; ";
        }
        
        $q = $this->db->query($sql_dpto);
        $list_dpto = $q->result_array();

        //Inventario - Inventario_Comp_TI
        //se obtienen los componente a partir del id de la interrelación
        $resp = array();
        $total_rows = $q->num_rows();
        $i = 0;
        foreach ($list_dpto as $row) {
            $id_dpto = $row['departamento_id'];

            //NOTA: para que sólo tome el inventario más reciente
            //ya que un dpto puede tener más de un inventario
            $sql_inv = "SELECT inventario_ti_id AS id, fecha_creacion as f
                        FROM inventario_ti
                        WHERE departamento_id = '".$id_dpto."'
                        ORDER BY fecha_creacion DESC;";
            $q = $this->db->query($sql_inv);
            $inv = $q->first_row('array');

            //Consultando los componentes
            $sql_icti = "SELECT comp.nombre, comp.componente_ti_id as id
                        FROM inventario_componente_ti AS icti join 
                        componente_ti AS comp 
                        ON (icti.componente_ti_id = comp.componente_ti_id AND 
                            icti.inventario_ti_id = '".$inv['id']."');";
            $q_cti = $this->db->query($sql_icti);

            $row['fecha_creacion'] = $inv['f'];//Fecha de creación del último inventario
            $resp[$i]['dpto'] = $row;            
            $resp[$i]['list_comp_ti'] = $q_cti->result_array();
            $i+=1;       
        }

        return array('data' => $resp, 'total_rows'=>$total_rows);
    }//end-of: function all_dpto

} // /class Datos_basicos_model.php
//Location: ./modules/cargar_data/datos_basicos_model.php
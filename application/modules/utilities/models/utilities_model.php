<?php

/**
 * Creado: 11-03-2014
 * @author Kelwin Gamez <kelgwiin@gmail.com>
 */
class Utilities_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    /**
     * PRE-CONDITION: Cada elemento pasado debe contener un valor, si en el
     * formulario está vacío, omitir la inclusión dentro del array ya que ello
     * afecta en la construcción de la sentencia para insertar.
     * 
     * Genera de manera genérica el insertar en una tabla. Siguiendo el esquema
     * estricto de (clave,valor).
     * 
     * @param Array $data Contendrá los datos para agregar un usuario,
     * para cada par de valores tendran la forma: (CLAVE de la tabla, VALOR). La
     * clave de la tabla es estrictamente necesaria, el orden no importa, si
     * un campo es nulo no es necesaria agregar la entrada en el array.
     * 
     * @param String $name Nombre de la tabla.
     * 
     * @return Boolean True/False Ello depende si lo agregó o no a la base de datos.
     */
    public function add($data,$name){
        $sql = "INSERT INTO " . $name . "( ";
        
        $claves = array_keys($data);
        $vals = array_values($data);
        
        $values = "VALUES (";
        foreach ($claves as $item) {
            $sql.=  $item . ',';
            $values .= "?,";
        }
        $tama = strlen($sql);
        $sql[$tama-1] = ')';
        
        $tama_values = strlen($values);
        $values[$tama_values-1] = ')';
        
        $sql.= " " . $values . ";";
        //print_r ($sql);
        return $this->db->query($sql,$vals);
    }

    /**
     * Agrega a la base de datos
     * @param Array $data Contiene todos los datos
     * @param String $table_name Nombre de la tabla a guardar
     */
    public function add_ar($data, $table_name){
        return $this->db->insert($table_name,$data);
    }

    /**
     * Genera la consulta para eliminar data de una tabla, dados su(s) 
     * clave(s) con su(s) respectivo(s) valor(es).
     * @param String $nombre_tabla
     * @param Array $claves_vals e.g. array('nom_clave1' => valor_clave1, ... ,
     * 'nom_claveN=>valor_claveN')
     * 
     * @return Boolean True/False dependiendo si tiene éxito o no.
     */
    public function del($nombre_tabla, $claves_vals){
        $sql = "DELETE FROM " . $nombre_tabla . " ".
                "WHERE ";
        $where = "";
        
        $claves =  array_keys($claves_vals);
        $vals = array_values($claves_vals);
        $num_vals = count($claves_vals);
    
        for ($i=0; $i < $num_vals; $i++){
            $where .= $claves[$i] . " = ? ";
           
            if($i !== $num_vals-1 ){
                $where .= " AND ";
            }
        }
        
        $sql .= $where . " ;";
        return $this->db->query($sql, $vals);
    }

    public function del_ar($nombre_tabla, $claves_vals){
        return $this->db->delete($nombre_tabla, $claves_vals);
    }

    /**
     * Obtiene toda la data dado el nombre de una tabla.
     * @param String $table_name Nombre de la tabla.
     * 
     * @return Array Un array de filas del tipo (clave,valor), donde clave el nombre de
     * asociado a cada una de las columnas.
     */
    public function all($table_name){
        $sql = "SELECT * FROM ". $table_name . " ;";
        $q = $this->db->query($sql);
        return $q->result_array();
    }

    /**
     * Obtiene toda la data dado el nombre de una tabla ordenado por id
     * @param String $table_name Nombre de la tabla.
     * @param  String $nom_col_id   Nombre de la columna que es clave
     *  
     * @return Array Un array de filas del tipo (clave,valor), donde clave el nombre de
     * asociado a cada una de las columnas.
     */
    public function all_ordered_by_id($table_name,$nom_col_id){
        $sql = "SELECT * FROM ". $table_name .
                ' ORDER BY '.$nom_col_id . ' ;';
        $q = $this->db->query($sql);
        return $q->result_array();
    }

     /**
     * Actualiza una una fila de la tabla dado el nombre, las claves y la
     * data a actualizar.
     * @param String $table_name Nombre de la tabla 
     * @param Array $claves_vals Pares de (clave,valor), donde clave es el 
     * nombre asociado a la columna de la tabla.
     * @param Array $nomcols_data Pares de (clave,valor), donde clave es el 
     * nombre de la(s) columna(s) a modificar.
     * 
     * @return Boolean True/False, Depende si se logro o no actualizar.
     */
    public function update($table_name, $claves_vals,$nomcols_data){
        $sql = "UPDATE ". $table_name . " ";
        
        //Preparando el SET
        $set = "SET ";
        foreach ($nomcols_data as $k=>$v){
            $set .= $k . " = '".$v."' ,";
        }
        //eliminando la coma sobrante del final, cambiándola por un espacio
        $long_set = strlen($set);
        $set[$long_set-1] = " ";
        
        //Preparando el WHERE
        $claves =  array_keys($claves_vals);
        $vals = array_values($claves_vals);
        $num_vals = count($claves_vals);
        
        $where = " WHERE ";
        for ($i=0; $i < $num_vals; $i++){
            $where .= $claves[$i] . " = ? ";
           
            if($i !== $num_vals-1 ){
                $where .= " AND ";
            }
        }
        //terminando de armar la sentencia
        $sql .= $set . $where. ";";
        
        return $this->db->query($sql,$vals);
    }
    /**
     * Update
     * @param  String $table_name 
     * @param  Array $data       
     * @param  Array $ids
     * @return Booelan
     */
    public function update_ar($table_name, $data, $ids){
        return $this->db->update($table_name, $data, $ids);
    }

    /**
     * Retorna una fila dado el nombre de la tabla y su respectivo 
     * id. 
     * @param  String $nom_table    Nombre de la tabla
     * @param  String $nom_col_id   Nombre de la columna que es clave
     * @param  Integer $id          Id de la tabla
     * @return Array                Es un array asociativo de pares (Nombre col, data col).
     * Sino existe retorna NULL.
     */
    public function row_by_id($nom_table, $nom_col_id, $id){
        $sql = 'SELECT * FROM ' . $nom_table .
                ' WHERE '.$nom_col_id.' = ? ;';

        $q = $this->db->query($sql, array($id));
        if($q->num_rows() > 0){
            $row = $q->first_row('array');    
        }else{
            $row = NULL;
        }
        
        return $row;
    } 

     /**
     * Retorna un conjunto de  filas dado el nombre de la tabla y su respectivo 
     * id. 
     * @param  String $nom_table    Nombre de la tabla
     * @param  String $nom_col_id   Nombre de la columna que es clave
     * @param  Integer $id          Id de la tabla
     * @return Array de Array       Es un array asociativo de pares (Nombre col, data col).
     * Sino existe retorna NULL.
     */
    public function rows_by_id($nom_table, $nom_col_id, $id){
        $sql = 'SELECT * FROM ' . $nom_table .
                ' WHERE '.$nom_col_id.' = ? ;';

        $q = $this->db->query($sql, array($id));
        if($q->num_rows() > 0){
            $rows = $q->result_array();
        }else{
            $rows = NULL;
        }
        
        return $rows;
    }
    /**
     * @param  String $nom_table Nombre de la tabla
     * @param  String $nom_col_id   Nombre de la columna que es clave
     * @return Array(String,?)      Un array asociativo (Nombre col, data col) de la
     * primera fila de la tabla. Si la tabla está vacía retorna NULL
     */
    public function first_row($nom_table,$nom_col_id){
        $sql = 'SELECT * FROM '.$nom_table.
                ' ORDER BY '.$nom_col_id . ' LIMIT 1; ';
        $q = $this->db->query($sql); 
        if($q->num_rows() > 0){
            return $q->row_array(1);
        }else{
            return NULL;
        }
    }

    public function last_insert_id(){
        return $this->db->insert_id();
    }

    public function count_all($table_name){
        return $this->db->count_all($table_name);
    }

    //Queries for Characterization
    public function proceso_historial(){
        $sql = "SELECT tasa_cpu,tasa_ram,tasa_transferencia_dd
                FROM proceso_historial ;";
        $q = $this->db->query($sql);

        //Formateando los resultados
        $rs = array();
        foreach ($q->result_array() as $row) {
            $rs[] = array($row['tasa_cpu'], $row['tasa_ram'], $row['tasa_transferencia_dd']);
        }
        return $rs;
    } 


} // /class Utilities_model.php
//Location: ./modules/utilities/models/utilities_model.php
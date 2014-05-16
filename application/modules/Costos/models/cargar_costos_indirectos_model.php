<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cargar_costos_indirectos_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('utilities/utilities_model');
    }

    /**
     * Obtiene una lista de movitos por sección
     * @param string $nombre Nombre de la sección
     * @return Array Lista con todos los motivos asociados.
     */
    public function motivos_by_seccion($nombre){
        $sql = "SELECT ma_motivo_id, nombre
        FROM ma_motivo
        WHERE seccion = '".$nombre."';";
        
        $query = $this->db->query($sql);
        
        if($query->num_rows() > 0 ){
            return $query->result_array();
        }else{
            return NULL;
        }
    }
    /**
     * Obtiene los nombres e ids de los departamentos que se encuentren cargados
     * @return Array Es un result_array de CI de la tabla departamento. Ver consulta
     */
    public function nombres_ids_dpto(){
        $sql = "SELECT nombre, departamento_id AS id
        FROM departamento;";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0 ){
            return $query->result_array();
        }else{
            return NULL;
        }
    }

    /**
     * Obtiene los nombres e ids de los departamentos que se encuentren cargados
     * @return Array Es un result_array de CI de la tabla departamento. Ver consulta
     */
    public function nombres_ids_ma_categoria(){
        $sql = "SELECT nombre, ma_categoria_id AS id
        FROM ma_categoria;";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0 ){
            return $query->result_array();
        }else{
            return NULL;
        }
    } 
    /**
     * Retorna los nombre e ids de los tipos de formación
     * @return Array
     */
    public function nombres_ids_formacion_tipo(){
        $sql = "SELECT nombre, formacion_tipo_id AS id
                FROM formacion_tipo;";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0 ){
            return $query->result_array();
        }else{
            return NULL;
        }
    }



}
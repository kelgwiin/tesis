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

    /**
     * Obtiene todos los costos indirectos basándose en la información de las tablas:
     * - arrendamiento
     * - mantenimiento
     * - formacion
     * - honorario
     * - utileria
     * @return Array Un array con dos campos la cantidad y otro array que posee la siguiente forma:
     *        Array('nombre' => String,
     *                'grupo' => String,
     *                'target' => String, //nombre del grupo pero corto
     *                'costo' => Integer,
     *                'id'    => Integer    
     * )
     */
    public function all_costos_indirectos(){
        $result = array();
        //Arrendamiento
        $sql = "SELECT nombre, costo, arrendamiento_id AS id
                FROM arrendamiento
                WHERE borrado = false ;";
        $query = $this->db->query($sql);
        $idx = 0;
        if($query->num_rows() > 0 ){
            foreach ($query->result_array() as $row) {
                $result[$idx]['nombre'] = $row['nombre'];
                $result[$idx]['grupo'] = 'Arrendamiento';
                $result[$idx]['target'] = 'arrendamiento';
                $result[$idx]['costo'] = $row['costo'];
                $result[$idx]['id'] = $row['id'];
                $idx += 1;
            }
        }

        //Mantenimiento
        $sql = "SELECT nombre, costo, mantenimiento_id AS id
                FROM mantenimiento
                WHERE borrado = false ;";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0 ){
            foreach ($query->result_array() as $row) {
                $result[$idx]['nombre'] = $row['nombre'];
                $result[$idx]['grupo'] = 'Mantenimiento/Instalación';
                $result[$idx]['target'] = 'mantenimiento';
                $result[$idx]['costo'] = $row['costo'];
                $result[$idx]['id'] = $row['id'];
                $idx += 1;
            }
        }

        //Formación
        $sql = "SELECT nombre,costo, formacion_id AS id
                FROM formacion AS f join formacion_tipo AS ft ON (f.formacion_tipo_id = ft.formacion_tipo_id);";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0 ){
            foreach ($query->result_array() as $row) {
                $result[$idx]['nombre'] = $row['nombre'];
                $result[$idx]['grupo'] = 'Formación de Personal';
                $result[$idx]['target'] = 'formacion';
                $result[$idx]['costo'] = $row['costo'];
                $result[$idx]['id'] = $row['id'];
                $idx += 1;
            }
        }

        //Honorarios
        $sql = "SELECT nombre, costo, honorario_id AS id
                FROM honorario
                WHERE borrado = false ;";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0 ){
            foreach ($query->result_array() as $row) {
                $result[$idx]['nombre'] = $row['nombre'];
                $result[$idx]['grupo'] = 'Honorarios';
                $result[$idx]['target'] = 'honorario';
                $result[$idx]['costo'] = $row['costo'];
                $result[$idx]['id'] = $row['id'];
                $idx += 1;
            }
        }
        //Utilería
        $sql = "SELECT nombre, costo, utileria_id AS id
                FROM utileria
                WHERE borrado = false ;";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0 ){
            foreach ($query->result_array() as $row) {
                $result[$idx]['nombre'] = $row['nombre'];
                $result[$idx]['grupo'] = 'Utilería';
                $result[$idx]['target'] = 'utileria';
                $result[$idx]['costo'] = $row['costo'];
                $result[$idx]['id'] = $row['id'];
                $idx += 1;
            }
        }
        shuffle($result);
        return array('list' => $result, 'num_rows'=> $idx);
    }



}
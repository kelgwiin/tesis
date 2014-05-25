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
        $sql = "SELECT nombre_mantenimiento as nombre, costo, mantenimiento_id AS id
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
        $sql = "SELECT f.descripcion_breve as nombre,costo, formacion_id AS id
                FROM formacion AS f JOIN formacion_tipo AS ft ON (f.formacion_tipo_id = ft.formacion_tipo_id)
                WHERE borrado = false
                ;";
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
    /**
     * Obtiene toda la información de la fila dado el nombre y el id.
     * Este es usado cuando se obtiene la información de la lista de costos indirectos.
     * 
     * @param  String $table_name Nombre de la tabla
     * @param  Integer $id   Id de la tabla
     * @return Array  Campos de alguna de las siguientes tablas:
     * - arrendamiento
     * - mantenimiento
     * - formacion
     * - honorario
     * - utileria
     */
    public function detalles_ci($table_name, $id){
        switch ($table_name) {
            case 'arrendamiento':
                $sql = "SELECT a.nombre, costo, fecha_inicial_vigencia AS fecha, tiempo, esquema_tiempo as esquema_de_tiempo, mm.nombre AS motivo
                        FROM arrendamiento AS a JOIN ma_motivo mm ON (a.ma_motivo_id = mm.ma_motivo_id) 
                        WHERE borrado = false AND arrendamiento_id = ".$id.";";
                break;
            case 'mantenimiento':
                $sql = "SELECT m.nombre_mantenimiento as nombre, tipo_operacion AS tipo_de_operación, mm.nombre AS motivo, costo, fecha, d.nombre AS departamento,
                        mc.nombre AS categoría, m.nombre AS nombre_de_encargado, apellido AS apellido_de_encargado,
                        telefono AS teléfono_de_encargado

                        FROM mantenimiento AS m JOIN (departamento AS d, ma_categoria AS mc, ma_motivo AS mm) 
                        on (m.departamento_id = d.departamento_id and m.ma_categoria_id = mc.ma_categoria_id and
                        m.ma_motivo_id = mm.ma_motivo_id)

                        WHERE m.borrado = false and mantenimiento_id = ".$id.";";
                break;
            case 'formacion':
                $sql = "SELECT descripcion_breve AS descripción_breve, nombre AS tipo, costo, fecha
                        FROM formacion AS f JOIN formacion_tipo AS ft ON (f.formacion_tipo_id = ft.formacion_tipo_id)
                        WHERE borrado = false and formacion_id = ".$id.";";

                break;
            case 'honorario':
                $sql = "SELECT nombre, costo, numero_profesionales AS número_de_profesionales, 
                        fecha_desde AS inicio_de_fecha_de_vigencia, fecha_hasta AS fin_de_fecha_de_vigencia 
                        FROM honorario
                        WHERE borrado = false and honorario_id = ".$id."; ";
                 
                break;
            case 'utileria':
                $sql = "SELECT nombre, costo, fecha, descripcion AS descripción
                        FROM utileria
                        WHERE borrado = false and utileria_id = ".$id.";";
                break;
        }

        //Obteniendo la información de la organización para obtener la Abreviatura de la Moneda
        $sql_mon = "SELECT abrev_moneda from organizacion; ";
        $q = $this->db->query($sql_mon);
        $org = $q->first_row('array');

        //Procesando al formato 'nombre' => 'info'
        $q = $this->db->query($sql);
        $resp = array();
        $i = 0;
        $r = $q->result_array();
        foreach ($r[0] as $key => $value) {
            $key = ucfirst(str_replace("_", " ", $key));//elimina '_' y pone el primer caracter mayusc
            $resp[$i]['nombre'] = $key;

            if($key != "Costo"){
                $resp[$i]['info'] = $value;
            }else{
                $resp[$i]['info'] = $value . " " . $org['abrev_moneda'];
            }
            $i += 1;
        }
        return $resp;
    }

    /**
     * Elimina lógicamente el ítem de costos indirectos
     * @param  String $table_name Nombre de la tabla
     * @param  Integer $id id de tabla
     * @return Boolean
     */
    public function eliminar_costos_ind_item($table_name, $id){
        return $this->utilities_model->update_ar($table_name, array('borrado'=> TRUE), array($table_name.'_id'=>$id));
    }



}
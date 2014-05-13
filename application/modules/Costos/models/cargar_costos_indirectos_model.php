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

}
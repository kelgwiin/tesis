<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Creado: 27-06-2014
 * @author Kelwin Gamez <kelgwiin@gmail.com>
 */
class Caracterizacion_model extends CI_Model{
	public function __construct(){
	    parent::__construct();
	    $this->load->database();
	    $this->load->model('utilities/utilities_model');
	}

    public function proceso_historial($name){
        $sql = "SELECT tasa_cpu,tasa_ram,tasa_escritura_dd
                FROM proceso_historial 
                WHERE comando_ejecutable = '$name';";
        $q = $this->db->query($sql);

        //Formateando los resultados
        $rs = array();
        foreach ($q->result_array() as $row) {
            $rs[] = array($row['tasa_cpu'], $row['tasa_ram'], $row['tasa_escritura_dd']);
        }
        return $rs;
    }

    public function nom_proc_historial(){
        $sql = "SELECT distinct sp.nombre p
                FROM servicio s
                JOIN servicio_proceso sp on s.servicio_id = sp.servicio_id;";
        $q = $this->db->query($sql);
        $nombres = array();
        foreach ($q->result_array() as $row) {
            $nombres[] = $row['p'];
        }
        return $nombres;
    }

    public function procesos_servicio(){
        $sql = "SELECT  sp.nombre p, s.servicio_id
                FROM servicio s
                JOIN servicio_proceso sp on s.servicio_id = sp.servicio_id ;";
        $q = $this->db->query($sql);
        return $q->result_array();
    }

    /**
     * Número de procesos por comando ejecutable
     */
    public function num_procesos(){
        $sql = "SELECT comando_ejecutable, COUNT(*) num
                FROM proceso_historial
                GROUP BY comando_ejecutable;";
        $q = $this->db->query($sql);
        $r = array();
        foreach ($q->result_array() as $row) {
            $r[$row['comando_ejecutable']] = $row['num'];
        }
        return $r;
    }

    /**
     * Guarda la información de caracterización por cada categoría 
     * asociada a los servicios.
     * @param  Array $data Información Caracterizada
     */
    public function guardar_caracterizacion($data){
        //Para borrar el valor si ya estaba previamente calculado
        /*$sql = 
        foreach ($data as $key => $row) {
            $f = date('Y-m-d H:i:s',now());
            $info = array(
                'servicio_id'=>$key,
                'total_uso_cpu'=>$row[0],
                'total_uso_memoria'=>$row[1],
                'total_uso_almacenamiento'=>$row[2],
                'total_uso_redes'=> 0, //wired
                'fecha'=>$f
            );
            $this->db->insert('caracterizacion',$data);
        }*/
    }
}
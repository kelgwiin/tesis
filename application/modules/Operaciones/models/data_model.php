<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Data_model extends MY_Model
{
    protected $_table = 'proceso_historial';
    protected $_id = 'proceso_historial_id';
    public $before_create = array();
    public $after_create = array();
    public $before_update = array();
    public $after_update = array();
    public $validate = array();
    
    function __construct()
    {// Call the Model constructor
        parent::__construct();
        date_default_timezone_set("America/Caracas" );
    } 
    function readCSV_poller($csvFile){
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle) ) { $line_of_text[] = fgetcsv($file_handle, 1024); }
        fclose($file_handle);        
        return $line_of_text;
    }
    function insertar_csv($archivo)
    {
        //preparar datos obtenidos de csv para posterior inserción en BD
        $data = $this->parse_output($array);
        $this->my_insert($data);
    }
    function parse_output($array)
    {
        foreach ($array as $line)
        {
            
            $data[] = array("thread" => $line[0],
                            "comando_ejecutable" => $line[1],
                            "tasa_cpu" => $line[2],
                            "tasa_memoria" => $line[3],
                            "operaciones_lectura_dd" =>$line[4],
                            "operaciones_escritura_dd" =>$line[5],
                            "tasa_dd_lectura" =>$line[6],
                            "tasa_dd_escritura" =>$line[7],
                            "tasa_transferencia_dd" =>$line[8],
                            "pagina_errores" =>$line[9],
                            "tiempo_online" =>$line[10],
                            "estado_proceso" =>$line[11]/*,
                            "usuario" => $line[12],
                            "timestamp" => $line[13] */);
        }
        return $data;
    }
}
?>
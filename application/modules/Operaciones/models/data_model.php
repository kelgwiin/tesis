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
    function temporaryCSV_poller($data){
        $fd = fopen('php://temp/maxmemory:1048576', 'w');
        if($fd === FALSE) { die('Failed to open temporary file'); }
        fwrite($fd, $data);
        rewind($fd);
        while (!feof($fd) ) { $csv[] = fgetcsv($fd, 1024); }
        fclose($fd);
        return $csv;
    }
    function server_poller($commands){
        $cmd = "/var/www/tesis/assets/poller_csv/poller_csv.py -c {$commands} -p -o -s";
        ob_start();
        passthru("sudo /usr/bin/python {$cmd}");
        return ob_get_clean();
    }
    function insertar_csv($archivo)
    {
        //preparar datos obtenidos de csv para posterior inserción en BD
        $data = $this->parse_data($array);
        $this->my_insert($data);
    }
    function parse_data($array)
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
                            "estado_proceso" =>$line[11],
                            "timestamp" => $line[12],
                            "pid_lista" => $line[13]);
        }
        return $data;
    }
    function parse_toplot($array)
    {
        $time = "0";
        $command = "";
        $plot_lines = array();
        foreach($array as $line)
        {
            $command = $line['comando_ejecutable'];
            if($line['thread'] === "P")
            {
                $time = $line['timestamp'];
                $proceso = array("tasa_cpu" => $line['tasa_cpu']+0.0,
                                 "tasa_memoria" => $line["tasa_memoria"]+0.0,
                                 "operaciones_lectura_dd" => $line["operaciones_lectura_dd"]+0,
                                 "operaciones_escritura_dd" => $line["operaciones_escritura_dd"]+0,
                                 "tasa_dd_lectura" => $line["tasa_dd_lectura"]+0.0,
                                 "tasa_dd_escritura" => $line["tasa_dd_escritura"]+0.0,
                                 "tasa_transferencia_dd" => $line["tasa_transferencia_dd"]+0.0,
                                 "pagina_errores" => $line["pagina_errores"]+0,
                                 "tiempo_online" => $line["tiempo_online"]+0,
                                 "estado_proceso" => $line["estado_proceso"],
                                 "pid_lista" => $line["pid_lista"]);
                $plot_lines[$command][$time]= $proceso; 
            }
            else
            {
                if($line['timestamp'] !== $time) 
                {
                    if($time !== "0")
                    {
                        $plot_lines[$command][$time][]= 
                                                array("tasa_cpu" => $cpu,
                                                      "tasa_memoria" => $mem,
                                                      "operaciones_lectura_dd" => $opread,
                                                      "operaciones_escritura_dd" => $opwrite,
                                                      "tasa_dd_lectura" => $pread,
                                                      "tasa_dd_escritura" => $pwrite,
                                                      "tasa_transferencia_dd" => $pwrrate,
                                                      "pagina_errores" => $err,
                                                      "tiempo_online" => $online,
                                                      "estado_proceso" => $st,
                                                      "pid_lista" => $list);
                    }                                                  
                    $cpu = $mem = $opread = $opwrite = $pread = $pwrite = $pwrrate = $err = $online = 0;
                    $st = $list = "0";
                    $time = $line['timestamp'];                    
                }
                else 
                {
                   $cpu += $line['tasa_cpu']; 
                   $mem += $line["tasa_memoria"];
                   $opread += $line["operaciones_lectura_dd"]; 
                   $opwrite += $line["operaciones_escritura_dd"];
                   $pread += $line["tasa_dd_lectura"]; 
                   $pwrite += $line["tasa_dd_escritura"];
                   $pwrrate += $line["tasa_transferencia_dd"]; 
                   $err += $line["pagina_errores"];
                   if ($line["tiempo_online"] > $online) $online = $line["tiempo_online"];
                   $st[] = $line["estado_proceso"]; 
                   $pid_lista[] = $line["thread"];
                }
                            
            }            
        }
        return $plot_lines;
    }
}
?>
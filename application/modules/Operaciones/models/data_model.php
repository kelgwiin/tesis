<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//require_once 'assets/poller_csv/MacAddress.php';
//use BlakeGardner\MacAddress;
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
    function read_csv($csvFile){
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle) ) { $line_of_text[] = fgetcsv($file_handle, 1024); }
        fclose($file_handle);        
        return $line_of_text;
    }
    function find_local_mac($interface='eth0')
    {
        ob_start();
        passthru("sudo ifconfig {$interface} | grep 'HWaddr'");
        $output = explode("     ",ob_get_clean()); $mac = explode(" ", $output[1]);
        $index = array_search('HWaddr', $mac) + 1;
        return $mac[$index];
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
    function list_stats($full_path = 1){
        $cmd = "ls /home/poller_csv/stats/*.csv";
        ob_start();
        passthru($cmd);
        $output = explode("\n",ob_get_clean());
        array_pop($output);
        if(!$full_path)
        {            
            foreach($output as $key => $filename)
            {
                $output[$key] = array_pop(explode("/",$filename));
            }
        }
        return $output;
    }
    function insert_arrayfiles_db($array_files)
    {
        $this->db->query('SET @@global.local_infile=ON;');
        foreach($array_files as $file)
        {
            $time_start = microtime(true);
            $response[]["status"] = $this->model->insert_csv_db("{$file}");
            $time_end = microtime(true);
            $response[]["elapsed"] = $time_start - $time_end;
        }
        $this->db->query('SET @@global.local_infile=OFF;');
        //Captura de eventos
        //$num_eventos = 0;
        //foreach($array_files as $file)
        //{
            //$time_start = microtime(true);
            //$response[]["status_events"] = $this->model->insert_events_db("{$file}");
            //$time_end = microtime(true);
            //$response[]["elapsed_events"] = $time_start - $time_end;
        //}
        return $response;
    }
    function insert_csv_db($filename, $infile_method=true)
    {
        if($infile_method)
        {
            $sql="LOAD DATA LOCAL INFILE '".$filename."' INTO TABLE proceso_historial
                FIELDS TERMINATED BY ',' ENCLOSED BY '\"' LINES TERMINATED BY '\\n'
                (`thread`,`comando_ejecutable`,`tasa_cpu`,`tasa_ram`,
                `operaciones_lectura_dd`,`operaciones_lectura_dd`,`tasa_lectura_dd`,`tasa_escritura_dd`,
                `tasa_transferencia_dd`,`pagina_errores`,`tiempo_online`,`estado_proceso`,`timestamp`,`pid_lista`,`mac_dir`)";
            return $this->db->query($sql);
        }
        else
        {        
            $array = $this->model->read_csv($filename);
            $data = $this->parse_data($array);
            return $this->my_insert($data,FALSE,FALSE,FALSE,TRUE);
        }        
    }
    function insert_events_db($filename)
    {
        $data = $this->read_csv($filename);
        $data = $this->parse_data($data);
        $datos["mac_dir"] = $this->find_local_mac("eth0");
        //TODO:OBTENER NIVELES DE SERVICIO POR PROCESO
        $last = $intc = 0;
        foreach($data as $linea)
        {
            if($last !== $linea["tiempo_online"])
            {
                $last = $linea["tiempo_online"];
                $datos["timestamp"] = $linea["timestamp"];
                $datos["prioridad"] = "info";
                $datos["categoria"] = "status";
                if($linea["tiempo_online"] > 0) 
                    $data["info"] = "{$linea["comando"]}-started({$linea["estado_proceso"]})";                    
                else $data["info"] = "{$linea["comando"]}-closed";
                $stchange[] = $datos;
            }                      
        }
        $this->_table = 'eventos_historial';
        $this->_id= 'evento_historial_id';
        $this->my_insert($stchange,FALSE,FALSE,FALSE,TRUE);
        $this->_table = 'proceso_historial';
        $this->_id= 'proceso_historial_id';
    }
    function parse_data($array)
    {
        array_pop($array);
        foreach ($array as $line)
        {
            $temp = array("thread" => $line[0],
                            "comando_ejecutable" => $line[1],
                            "tasa_cpu" => round($line[2],5),
                            "tasa_ram" => round($line[3],5),
                            "operaciones_lectura_dd" => round($line[4],0),
                            "operaciones_escritura_dd" => round($line[5],0),
                            "tasa_lectura_dd" => round($line[6],5),
                            "tasa_escritura_dd" => round($line[7],5),
                            "tasa_transferencia_dd" => round($line[8],5),
                            "pagina_errores" => round($line[9],0),
                            "tiempo_online" => $line[10],
                            "estado_proceso" => $line[11],
                            "timestamp" => $line[12],
                            "pid_lista" => $line[13],
                            "mac_dir" => $line[14]);
            $data[] = $temp;
        }
        return $data;
    }
    function parse_toplot($array,$plot=TRUE)
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
        //foreach($plot_lines as $comando){ ksort($comando); }
        return $plot_lines;
    }
    function parse_filename($name)
    {
        $date = explode(".",$name); $data = $data[0]; $date = explode('_',$date); $date = $date[1];
        $array = explode('-',$date);
        return array( 'filename' => $name, 'year' => $array[0], 'month' => $array[1], 'day' => $array[2]);
    }
}
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Creado: 27-06-2014
 * @author Kelwin Gamez <kelgwiin@gmail.com>
 */
class Caracterizacion_model extends CI_Model{
	private $debug;
    private $day_left;
    public function __construct(){
	    parent::__construct();
	    $this->load->database();
        //Models
        $this->load->model('utilities/utilities_model');

        //Libraries 
        $this->load->library('Kmeans');
        $this->debug = false;

	}

    public function proceso_historial($name){
        $sql = "SELECT tasa_cpu,tasa_ram,tasa_escritura_dd
                FROM proceso_historial 
                WHERE comando_ejecutable = '$name';";
        $q = $this->db->query($sql);
        if($q->num_rows() <= 0){
            return false;
        }
        
        //Formateando los resultados
        $rs = array();
        foreach ($q->result_array() as $row) {
            $rs[] = array($row['tasa_cpu'], $row['tasa_ram'], $row['tasa_escritura_dd']);
        }
        return $rs;
    }

    public function nom_proc_historial(){
        $sql = "SELECT DISTINCT sp.nombre AS p
                FROM servicio s
                JOIN proceso_soporta_servicio psp ON s.servicio_id = psp.servicio_id
                JOIN servicio_proceso sp ON psp.servicio_proceso_id = sp.servicio_proceso_id ;";
        $q = $this->db->query($sql);
        $nombres = array();
        foreach ($q->result_array() as $row) {
            $nombres[] = $row['p'];
        }
        return $nombres;
    }

    public function procesos_servicio(){
        $sql = "SELECT sp.nombre as p, s.servicio_id
                FROM servicio s
                JOIN proceso_soporta_servicio psp ON s.servicio_id = psp.servicio_id
                JOIN servicio_proceso sp ON psp.servicio_proceso_id = sp.servicio_proceso_id ;";
                
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
        $sql_update = "UPDATE caracterizacion
						SET borrado = 1
						WHERE YEAR(fecha) = YEAR(CURDATE()) AND MONTH(fecha) = MONTH(CURDATE())
						AND servicio_id = ? ";

        foreach ($data as $key => $row) {
            //Marcar como borrado el valor si ya estaba previamente calculado
        	$this->db->query($sql_update, array($key));

            $f = date('Y-m-d H:i:s',now());
            $info = array(
                'servicio_id'=>$key,
                'total_uso_cpu'=>$row[0],
                'total_uso_memoria'=>$row[1],
                'total_uso_almacenamiento'=>$row[2],
                'total_uso_redes'=> 0, //wired
                'fecha'=>$f
            );
            $this->db->insert('caracterizacion',$info);
        }
    }

    public function reset_proc_hist(){
        $sql_1 = "DELETE FROM servicio_proceso where servicio_proceso_id >= 10 ;";
        $this->db->query($sql_1);

        $sql = "DELETE 
                FROM proceso_historial ;";
        $this->db->query($sql);
    }

    /**
     * Esto se llama cuando se prueba un caso temporal, del resto no
     * se usa
     */
    public function config_servicio_proc_c4(){
        $sql_1 = "DELETE FROM servicio_proceso where servicio_proceso_id >= 10 ;";
        $this->db->query($sql_1);

        $sql = "INSERT INTO `servicio_proceso` (`servicio_proceso_id`, `servicio_id`, `nombre`, `tipo`, `descripcion`, `borrado`) VALUES
                (10, 5, 'java', NULL, NULL, 0),
                (11, 5, 'chrome', NULL, NULL, 0),
                (12, 5, 'firefox-bin', NULL, NULL, 0),
                (13, 5, 'sublime_text', NULL, NULL, 0),
                (14, 6, 'gnome-terminal', NULL, NULL, 0),
                (15, 6, 'vlc', NULL, NULL, 0),
                (16, 6, 'apache2', NULL, NULL, 0);";
        $this->db->query($sql);
    }

    public function dateLastMonth($days = FALSE,$month = FALSE)
    {
        date_default_timezone_set("America/Caracas" );
        $fecha_actual = date("Y-m-d",time());
        $fecha_dia_anterior = $fecha_actual;
        $fecha_mes_pasado = strtotime ( '-'.$month.'month' , strtotime ( $fecha_actual ) ) ;        
        $dateArray['fecha_mes_pasado']  = date ( 'Y-m-j H-i-s', $fecha_mes_pasado );
        $fecha_dia_anterior = strtotime ( '-'.$days.' day' , strtotime ( $fecha_dia_anterior ) ) ;
        $dateArray['fecha_dia_anterior'] = date ( 'Y-m-j H-i-s', $fecha_dia_anterior );
        return $dateArray;
    }//end of function: dateLastMonth

    /**-----------------------------------------------------
     * Métodos principales de la Caracterización de la data
     *------------------------------------------------------*/

   /**
    * Aplica la caracterización a toda la data guardada en la BD en la 
    * tabla proceso_historial
    */
    public function caracterizar(){
        $this->debug = false;
        $date = $this->dateLastMonth();

        //Recopilando nombre de los procesos que se encuentran asociados a los Servicios
        $nom_procesos = $this->nom_proc_historial();
        $data = array();
        //Obteniendo la data asociada a los procesos recopilados
        foreach ($nom_procesos as $nom) {
            unset($data_tmp);
            
            //aplicando el kmeans a todos los registros con ese nombre
            $data_tmp = $this->proc_hist_por_hora_mensual($date,$nom,3);
            if(isset($data_tmp) && $data_tmp !== false){
                $data[$nom] = $data_tmp;
            }
        }
        //numero de registros por comando
        $reg_por_com = $this->num_procesos();
        
        
        $resultados = array();
        foreach ($data as $key => &$val) {
            $val[2] *= $reg_por_com[$key]*60*24;//repeticiones * minutos * horas
            $resultados[$key] = $val;
        }
        
        $servicios_proc = $this->procesos_servicio();
        $sum_por_serv = array();
        
        foreach ($servicios_proc as $row) {
            if(isset($sum_por_serv[$row['servicio_id']]) ){
                for ($i=0; $i < 3; $i++) { 
                    //Se verifica que exista data de rendimiento
                    //para el proceso asociado al servicio
                    if(isset($resultados[$row['p']])){
                        $sum_por_serv[$row['servicio_id']][$i] += $resultados[$row['p']][$i];
                    }
                }
            }else{
                for ($i=0; $i < 3; $i++) {
                    if(isset($resultados[$row['p']])){
                        $sum_por_serv[$row['servicio_id']][$i] = $resultados[$row['p']][$i];
                    }else{
                        $sum_por_serv[$row['servicio_id']][$i] = 0;
                    }
                    
                }
            }
            
        }
        //Guardando en la BD
        $this->guardar_caracterizacion($sum_por_serv);
        if($this->debug){
            echo "<code>Sumatoria con id's servicio <br></code>";
            echo_pre($sum_por_serv);
            echo "<code>Resultados en crudo <br></code>";
            echo_pre($resultados);
        }

    }


    /**
     * Procesa el caso aplicando el kmeans para un proceso determinado
     * @param  array $data         Información leída de proceso historial
     * @param  integer $num_clusters Número de clusters iniciales
     * @param  integer $num_params   Número de parámetros a medir
     * @return array  Promedios de uso de cada parametro estudiado.               
     */
    public function procesar_caso($data,$num_clusters, $num_params){
        $resultado = $this->kmeans->kmeans($data,$num_clusters);
        if($this->debug){
            echo_pre($resultado);
        }

        $rep = array();
        $prom = array();//para guardar los promedios de cada uno de los grupos generados
        for ($i=0; $i < $num_params; $i++) { 
            $prom[$i] = 0;
        }
        $counter = 0;
        foreach ($resultado['clusters'] as $cluster) {
            $temp = $cluster[0]['coordenadas'];
            $rep[] = $temp;

            //sumando cada ítem de la categoría
            for ($i=0; $i < $num_params; $i++) { 
                $prom[$i] += $temp[$i];
            }
            $counter+=1;
        }
        if($this->debug){
            echo_pre($rep);
        }
        //promedio
        for ($i=0; $i < $num_params; $i++) { 
            if($counter != 0){
                $prom[$i] /= $counter;
            }
        }
        return $prom;
    }


    /**
     * Obtiene el historial de procesos filtrado por cada dos horas y por nombre de proceso y
     * aplica el kmens
     * @param  [type]  $dateIndex   Inicio y fin de fecha
     * @param  String $processName [description]
     * @return [type]               [description]
     */
    public function proc_hist_por_hora_mensual($dateIndex, $processName, $num_params )
    {
        $hoursPerDayArray = $this->hoursPerMonth(0);
        //Se calcula la estructura del año para cada mes del año.
        //Temporalmente la sentencia de esta línea no se usa ya que tiene alto
        //costo computacional traerse toda la información de una vez.
        $where = "timestamp BETWEEN '".$dateIndex['fecha_mes_pasado']."' AND '".$dateIndex['fecha_dia_anterior']."' ";


        $acums = array();//acumulados
        for ($i=0; $i < $num_params; $i++) { 
            $acums[$i] = 0;
        }
        $counter=0;


        $arrayIndex = 0;
        while ($arrayIndex < sizeof($hoursPerDayArray))
        {
            $innerArrayIndex = 0;
            $byHour = 0;
            while($innerArrayIndex < 11)
            {
                unset($whereAux);
                $whereAux = "timestamp BETWEEN '".$hoursPerDayArray[$arrayIndex][$innerArrayIndex]."' AND '".$hoursPerDayArray[$arrayIndex][$innerArrayIndex+1]."' 
                AND comando_ejecutable = '$processName' ";
                
                $sql = "SELECT tasa_cpu,tasa_ram,tasa_escritura_dd
                        FROM proceso_historial 
                        WHERE  ".$whereAux.";";
                
                $q = $this->db->query($sql);
                //Formateando los resultados
                $rs = array();
                if($q->num_rows() > 0)
                {
                    foreach ($q->result_array() as $row) 
                    {
                        $rs[] = array($row['tasa_cpu'], $row['tasa_ram'], $row['tasa_escritura_dd']);
                    }
                    $date=$hoursPerDayArray[$arrayIndex][0];
                    $date = substr($date, 0, -9);
                    //$dataPerHour[$date][$byHour] = $this->procesar_caso($rs,6,3);

                    $tmp_prom = $this->procesar_caso($rs,6,3);
                    
                    //acumulando promedios
                    for ($i=0; $i < $num_params; $i++) { 
                        $acums[$i] += $tmp_prom[$i];
                        $counter++;
                    }


                    $byHour++;
                }
                $innerArrayIndex++;
            }
            $arrayIndex = $arrayIndex+1;
        }

        //sacando el promedio general
        for ($i=0; $i < $num_params; $i++) { 
            if($counter > 0){
             $acums[$i] /= $counter;
            }
        }

        return $counter>0?$acums:NULL;
    }//end of function

    /*
     * Genera un rango de fecha en formato Y-m-j H-i-s
     * 
     * $month es el parametro de los meses a restar
     * calcula todos los días pasados de este mes
     * y luego las horas en bloques de 2 en 2 horas
     * @author Gustavo
     * @return array
     * - Array (
     *      
     * )
     */
    public function hoursPerMonth($month = FALSE)
    {
        date_default_timezone_set("America/Caracas" );
        $fecha_actual = date("Y-m-d",time());
        $newDate = date("Y-m-d",time());
        $fecha_dia_anterior = $fecha_actual;
        $lastMonthDate = strtotime ( '-'.$month.'month' , strtotime ( $fecha_actual ) ) ;
        $daysLeft = $fecha_actual[8].$fecha_actual[9];
        $daysLeft = (int)$daysLeft;
        $this->day_left = $daysLeft;// for global uses
        $band = 1;
        while ($band<=$daysLeft)
        {
            $band2=$band-1;//Cambiar
            unset($temporalDay);
            $temporalDay = strtotime ( '-'.$band2.' day' , strtotime ( $newDate ) ) ;
            $temporalDay = date ( 'Y-m-j', $temporalDay );
            $temporalDay = new DateTime($temporalDay);
            $hours = 0;
            $hoursIndex = 0;
            while($hours<24)
            {
                unset($dayAux);
                $dayAux = $temporalDay;
                $dayAux->setTime($hours, 00);
                $dateArrayPerHour[$band-1][$hoursIndex] = date_format($dayAux, 'Y-m-d H:i:s');
                $hours=$hours+2;
                $hoursIndex = $hoursIndex+1;
            }
            $band ++;
        }

        return $dateArrayPerHour;
    }//end of function: hoursPerMonth

    public function test(){
        $date = modules::run('Capacidad/dateLastMonth',0,1);
        $nom_procesos = $this->nom_proc_historial();
        echo_pre($nom_procesos);
        echo $nom_procesos[4] . "<br>";

       $r =  $this->proc_hist_por_hora_mensual($date,$nom_procesos[5],3);
       echo_pre($r);
    }
    
}
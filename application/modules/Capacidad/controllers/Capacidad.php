<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Capacidad extends MX_Controller
{
	function __construct()
    {
        parent::__construct();
        $this->load->module('utilities/utils');
        $this->load->model('Capacity_planning_model','capacity');
		//Libraries 
		$this->load->library('Kmeans');
    }
    private $title = 'Módulo de Gestión de Capacidad';
    private function sideBarList()
	{
		$l =  array();

		$l[] = array(
			"chain" => "Volver a Módulos Principales",
			"href" => site_url(''),
			"icon" => "fa fa-flag"
		);
		$l[] = array(
			"chain" => "Descripción",
			"href" => site_url('index.php/Capacidad'),
			"icon" => "fa fa-bar-chart-o"
		);
		$sublista = array
		(
			array
			(
				'chain' => 'General',
				'href'=> site_url('index.php/Capacidad/ComponentesIT')
			),
			array
			(
				'chain' => 'Procesador',
				'href'=> site_url('index.php/Capacidad/ComponentesIT/Procesador')
			),
			array
			(
				'chain' => 'Memoria',
				'href'=> site_url('index.php/Capacidad/ComponentesIT/Memoria')
			),
			array
			(
				'chain' => 'Almacenamiento',
				'href'=> site_url('index.php/Capacidad/ComponentesIT/Almacenamiento')
			)
		);
		$l[] = array(
			"chain" => "Componentes IT",
			"href" => site_url('index.php/Capacidad'),
			"icon" => "fa fa-caret-square-o-down",
			"list" => $sublista
		);
		$sublista = array
		(
			array
			(
				'chain' => 'General',
				'href'=> site_url('index.php/Capacidad/Servicios')
			),
			array
			(
				'chain' => 'Procesador',
				'href'=> site_url('index.php/Capacidad/Servicio/Servicio1/Procesador')
			),
			array
			(
				'chain' => 'Memoria',
				'href'=> site_url('index.php/Capacidad/Servicios/Servicio1/Memoria')
			),
			array
			(
				'chain' => 'Almacenamiento',
				'href'=> site_url('index.php/Capacidad/Servicios/Servicio1/Almacenamiento')
			)
		);
		$l[] = array(
			"chain" => "Servicios",
			"href" => site_url('index.php/Capacidad'),
			"icon" => "fa fa-caret-square-o-down",
			"list" => $sublista
		);
		$sublista = array
		(
			array
			(
				'chain' => 'General',
				'href'=> site_url('index.php/Capacidad/Umbrales')
			),
			array
			(
				'chain' => 'Procesador',
				'href'=> site_url('index.php/Capacidad/Umbrales')
			),
			array
			(
				'chain' => 'Memoria',
				'href'=> site_url('index.php/Capacidad/Umbrales')
			),
			array
			(
				'chain' => 'Almacenamiento',
				'href'=> site_url('index.php/Capacidad/Umbrales')
			)
		);
		$l[] = array(
			"chain" => "Umbrales",
			"href" => site_url('index.php/Capacidad'),
			"icon" => "fa fa-caret-square-o-down",
			"list" => $sublista
		);
		return $l;
	}
    /*
	 * Genera un rango de fecha en formato Y-m-j H-i-s
	 * 
	 * $days es el parametro de los dias a restar
	 * $month es el parametro de los meses a restar
	 * @return array
	 * - Array (
	 * 		fecha_mes_pasado => 
	 * 		fecha_dia_anterior => 
	 * )
	 */	
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
	public function index()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);
		$vista = ($permiso) ? 'Main' : 'capacidadSinPermiso';
		$view['nivel'] = 10;
		$this->utils->template($this->sideBarList(),'Capacidad/'.$vista,$view,$this->title,'Capacidad','two_level');
	}
	/* Inicio Módulo Componentes */
	public function ComponentesIT()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);
		$vista = ($permiso) ? 'ComponentesIT/ComponentesITGeneral' : 'capacidadSinPermiso';
		$view['nivel'] = 10;
		$dateArray = $this->dateLastMonth(0,1);
		$view['resourceUse'] = $this->capacity->generalResourceUseByComponentPerHour($dateArray,"tasa_cpu,tasa_ram,tasa_transferencia_dd,timestamp",FALSE);
		$this->utils->template($this->sideBarList(),'Capacidad/'.$vista,$view,$this->title,'Capacidad','two_level');
	}
	public function ProcesadorComponentesIT()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);
		$dateArray = $this->dateLastMonth(1,1);
		$vista = ($permiso) ? 'ComponentesIT/ProcesosComponentesIT' : 'capacidadSinPermiso';
		$view['resourceUse'] = $this->capacity->resourceUseByComponentPerHour($dateArray,"tasa_cpu r, timestamp",FALSE);
		$this->utils->template($this->sideBarList(),'Capacidad/'.$vista,$view,$this->title,'Capacidad','two_level');
	}
	public function MemoriaComponentesIT()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);
		$dateArray = $this->dateLastMonth(1,1);
		$vista = ($permiso) ? 'ComponentesIT/MemoriaComponentesIT' : 'capacidadSinPermiso';
		$view['resourceUse'] = $this->capacity->resourceUseByComponentPerHour($dateArray,"tasa_ram r, timestamp",FALSE);
		$this->utils->template($this->sideBarList(),'Capacidad/'.$vista,$view,$this->title,'Capacidad','two_level');
	}
	public function AlmacenamientoComponentesIT()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);
		$dateArray = $this->dateLastMonth(1,1);
		$vista = ($permiso) ? 'ComponentesIT/AlmacenamientoComponentesIT' : 'capacidadSinPermiso';
		$view['resourceUse'] = $this->capacity->resourceUseByComponentPerHour($dateArray,"tasa_transferencia_dd r, timestamp",FALSE);
		//$view['ddUse'] = $this->capacity->resourceUseByComponent($dateArray,"proceso_historial_id,tasa_lectura_dd,tasa_escritura_dd,comando_ejecutable,timestamp",FALSE);
		$this->utils->template($this->sideBarList(),'Capacidad/'.$vista,$view,$this->title,'Capacidad','two_level');
	}
	/* Inicio Módulo Servicios */
	public function Servicios()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);

		$data['main_content'] = $this->load->view('Servicios/ListadoServicios','',TRUE);
		$this->load->view('Capacidad/template',$data);
	}
	public function Servicio()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);

		$datos['nombre_servicio'] = $this->uri->segment(3);
		$data['main_content'] = $this->load->view('Servicios/Servicio',$datos,TRUE);
		$this->load->view('Capacidad/template',$data);
	}
	public function ProcesadorServicio()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);

		$datos['nombre_servicio'] = $this->uri->segment(3);
		$data['main_content'] = $this->load->view('Servicios/ProcesosServicio',$datos,TRUE);
		$this->load->view('Capacidad/template',$data);
	}
	public function MemoriaServicio()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);

		$datos['nombre_servicio'] = $this->uri->segment(3);
		$data['main_content'] = $this->load->view('Servicios/MemoriaServicio',$datos,TRUE);
		$this->load->view('Capacidad/template',$data);
	}
	public function AlmacenamientoServicio()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);

		$datos['nombre_servicio'] = $this->uri->segment(3);
		$data['main_content'] = $this->load->view('Servicios/AlmacenamientoServicio',$datos,TRUE);
		$this->load->view('Capacidad/template',$data);
	}
	/* Módulo Umbrales */
	public function Umbrales()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);
		$vista = ($permiso) ? 'Umbrales/UmbralesGeneral' : 'capacidadSinPermiso';
		$view['nivel'] = 10;
		$dateArray = $this->dateLastMonth(0,1);
		$view['resourceUse'] = $this->capacity->generalResourceUseByComponentPerHour($dateArray,"tasa_cpu,tasa_ram,tasa_transferencia_dd,timestamp",FALSE);
		$this->utils->template($this->sideBarList(),'Capacidad/'.$vista,$view,$this->title,'Capacidad','two_level');
	}
	public function testKmeans()
	{
		echo 'Inicio de kmeans<br>';
		//1.- Obtencion de la data Solo Procesador
		$dateArray = $this->dateLastMonth(0,1);
		$dataBeforeKmeans = $this->capacity->resourceUseByComponent($dateArray,"tasa_cpu,comando_ejecutable,timestamp",FALSE);
		$num_clusters = 6;
		foreach ($dataBeforeKmeans as $beforekmeans) 
		{
			$kmeansArrayCounter=0;
			foreach ($beforekmeans as $key => $kmeans) 
			{
				$beforekmeans[$kmeansArrayCounter][0]=$kmeans['tasa_cpu'];
				$beforekmeans[$kmeansArrayCounter][1]=$kmeans['comando_ejecutable'];
				$beforekmeans[$kmeansArrayCounter][2]=$kmeans['timestamp'];
				unset($beforekmeans[$kmeansArrayCounter]['tasa_cpu']);
				unset($beforekmeans[$kmeansArrayCounter]['comando_ejecutable']);
				unset($beforekmeans[$kmeansArrayCounter]['timestamp']);	
				$kmeansArrayCounter++;

			}
			//2.- Correr el kmeans
			$resultado = $this->kmeans->kmeans($beforekmeans,$num_clusters);
			echo_pre($beforekmeans);
			//echo_pre($resultado);// muestra todos los grupos y sus centroides
			//pero se puede escoger un representadnte de cada grupo
		}
		//3.- Montrando los resultados definitivos escogiendo un representante de cada grupo
		$rep = array();
		foreach ($resultado['clusters'] as $cluster) {
			$rep[] = $cluster[0]['coordenadas'];
		}
		//echo_pre($rep);

		//4.- Con estos resultados se puede promediar.
		echo 'Fin de kmeans<br>';		

	}
}
/*
public function modelo_costos($year, $month="NA"){
		$debug = false;
		//Calculando la estructura de costos para el año seleccionado
		//Internamente se agregan las fechas de caducidad a cada uno de los componentes de TI.
		$this->costos_model->estructura_costos_by_year_all($year);

		$sql = "SELECT servicio_id, total_uso_redes, total_uso_cpu,
				total_uso_almacenamiento, total_uso_memoria,
				YEAR(fecha) anio , MONTH(fecha) mes, ec.estructura_costo_id, ec.fecha_creacion as fecha_ec
				FROM caracterizacion AS c
				JOIN estructura_costo ec ON year(c.fecha) = ec.anio and month(c.fecha) = ec.mes
				WHERE YEAR(c.fecha) = $year AND c.borrado = false
		";
		//Condición agregada el 04-Oct-2014
		if($month != "NA"){//se agrega la condición para un mes en específico
			$sql .= " AND MONTH(c.fecha) = $month ";
		}
		
		$query = $this->db->query($sql);

		if($query->num_rows() > 0 ){
			$rs = $query->result_array();
			//Buscando los costos asociados a cada categoría y si ya fueron obtenidos
			//no se buscan de nuevo
			$ec = array();// estructura de costos
			$sql_eci = "SELECT  eci.*, c.nombre AS nom_categ
						FROM estructura_costo_item eci
						JOIN ma_categoria c ON c.ma_categoria_id = eci.ma_categoria_id
						WHERE estructura_costo_id = ? ";

			/**
			 * Permite guardar los costos por servicio
			 * que posteriormente serán almacenados en la tabla de
			 * 'servicio_costo'.
			 * 
			 * @var array
			 */
			$costos_by_servicio = array();

			//info de caracterización
			foreach ($rs as $row) {
				$ec_id = $row['estructura_costo_id'];
				if($debug){
					echo " ec_id $ec_id <br>";
				}
				if( !isset($ec[$ec_id]) ){
					$q_eci = $this->db->query($sql_eci, array($ec_id) );
					
					//info de la estructura de costos
					$tmp_costos  = array();
					$rs_eci = $q_eci->result_array();
					foreach ($rs_eci as $row_ci) {
						$total_dinero = $row_ci['total_monetario'] + $row_ci['total_monetario_cost_ind'];
						$dinero_por_unidad = $total_dinero/$row_ci['total_capacidad'];//Monto de dinero por unidad
						$tmp_costos[$row_ci['nom_categ']]['dinero_por_uni'] = $dinero_por_unidad;
						$tmp_costos[$row_ci['nom_categ']]['total_capacidad_porc'] = $row_ci['total_capacidad']/100;
					}//end of: foreach inner
					$ec[$ec_id] = $tmp_costos;
				}

				$rs_eci = $ec[$ec_id];//info de costos por unidad
				$alm = $row['total_uso_almacenamiento'] * $rs_eci['Almacenamiento']['dinero_por_uni'];//está en bytes
				$mem = ($row['total_uso_memoria'] * $rs_eci['Memoria']['total_capacidad_porc']) * $rs_eci['Memoria']['dinero_por_uni'];//está en %
				
				//Temporalmente no se toma en cuenta el campo de redes
				if(isset($rs_eci['Redes'])){
					$red = $row['total_uso_redes'] * $rs_eci['Redes']['dinero_por_uni'];// NA
				}else{
					$red = 0;
				}
				//Fin de campo de redes
				
				$proc = ($row['total_uso_cpu'] * $rs_eci['Procesador']['total_capacidad_porc']) * $rs_eci['Procesador']['dinero_por_uni'];//está en %
				
				$costos_by_servicio[$row['servicio_id']] = array(
					'almacenamiento'=>$alm,
					'memoria'=>$mem,
					'redes'=>$red,
					'procesador'=>$proc,
					'mes' =>$row['mes'],
					'anio'=>$row['anio']
				);
				
			}//end of: foreach outter
			if($debug){
				echo_pre($costos_by_servicio);	//prueba
			}

			//Inserción en la BD.
			foreach ($costos_by_servicio as $servicio_id => $row) {
				//Si ya existe un costo calculado para un mes y año se marca como
				//borrado y se calcula de nuevo
				$this->utilities_model->update_ar(
					"servicio_costo",
					array('borrado'=>TRUE),
					array('mes'=>$row['mes'], 'anio'=>$row['anio'], 'servicio_id'=>$servicio_id)
				);

				//insertando fila en "servicio_costo"
				$f = date('Y-m-d H:i:s',now());//fecha formato datetime
				$total_costo = $row["almacenamiento"]+$row["memoria"]+$row["redes"]
				+$row["procesador"];

				$this->utilities_model->add_ar(
					array(
						"servicio_id"=>$servicio_id,
						"costo"=>$total_costo,
						"fecha_creacion"=>$f,
						"mes"=>$row["mes"],
						"anio"=>$row["anio"]
					),
					"servicio_costo"
				);

				$last_id_serv_cos = $this->utilities_model->last_insert_id();

				//insertando servicio costo detalle
				$f = date('Y-m-d H:i:s',now());//fecha formato datetime
				$this->utilities_model->add_ar(
					array(
						"servicio_costo_id"=>$last_id_serv_cos,
						"c_almacenamiento"=>$row["almacenamiento"],
						"c_memoria"=>$row["memoria"],
						"c_redes"=>$row["redes"],
						"c_procesador"=>$row["procesador"]
					),
					"servicio_costo_detalle"

				);
			}

		}// end of: if
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
*/

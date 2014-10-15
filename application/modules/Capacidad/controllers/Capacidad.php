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
		
		$l[] = array(
			"chain" => "Servicios",
			"href" => site_url('index.php/Capacidad/Servicios'),
			"icon" => "fa fa-flag",
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
		$this->utils->template($this->sideBarList(),'Capacidad/'.$vista,$view,$this->title,'Capacidad','two_level');
	}
	/* Inicio Módulo Servicios */
	public function Servicios()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);
		$vista = ($permiso) ? 'Servicios/ListadoServicios' : 'capacidadSinPermiso';
		$dateArray = $this->dateLastMonth(1,1);
		$view['resourceUse'] = $this->capacity->generalServiceByComponentPerHour($dateArray);
		$this->utils->template($this->sideBarList(),'Capacidad/'.$vista,$view,$this->title,'Capacidad','two_level');
	}
	public function Servicio()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);

		$datos['nombre_servicio'] = $this->uri->segment(3);
		$data['main_content'] = $this->load->view('Servicios/Servicio',$datos,TRUE);
		////$this->load->view('Capacidad/template',$data);
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
		$view['resourceUse'] = $this->capacity->generalServiceByComponentPerHour($dateArray);
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


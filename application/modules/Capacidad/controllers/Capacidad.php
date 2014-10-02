<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Capacidad extends MX_Controller
{
	function __construct()
    {
        parent::__construct();
        $this->load->module('utilities/utils');
        $this->load->model('Capacity_planning_model','capacity');
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
		$data['main_content'] = $this->load->view('Main','',TRUE);
		$this->load->view('Capacidad/template',$data);
	}
	/* Inicio Módulo Componentes */
	public function ComponentesIT()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);
		$dateArray = $this->dateLastMonth(1,1);
		$data['resourceUse'] = $this->capacity->resourceUse($dateArray,"proceso_historial_id,tasa_ram,tasa_cpu,comando_ejecutable,tasa_lectura_dd,tasa_escritura_dd,timestamp",FALSE);
		$data['main_content'] = $this->load->view('ComponentesIT/ComponentesITGeneral',$data,TRUE);
		$this->load->view('Capacidad/template',$data);
	}
	public function ProcesadorComponentesIT()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);
		$dateArray = $this->dateLastMonth(1,1);
		$data['cpuUse'] = $this->capacity->resourceUseByComponent($dateArray,"proceso_historial_id,tasa_cpu,comando_ejecutable,timestamp",FALSE);
		$data['main_content'] = $this->load->view('ComponentesIT/ProcesosComponentesIT',$data,TRUE);
		$this->load->view('Capacidad/template',$data);
	}
	public function MemoriaComponentesIT()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);
		$dateArray = $this->dateLastMonth(1,1);
		$data['ramUse'] = $this->capacity->resourceUseByComponent($dateArray,"proceso_historial_id,tasa_ram,comando_ejecutable,timestamp",FALSE);
		$data['main_content'] = $this->load->view('ComponentesIT/MemoriaComponentesIT',$data,TRUE);
		$this->load->view('Capacidad/template',$data);
	}
	public function AlmacenamientoComponentesIT()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);
		$dateArray = $this->dateLastMonth(1,1);
		$data['ddUse'] = $this->capacity->resourceUseByComponent($dateArray,"proceso_historial_id,tasa_lectura_dd,tasa_escritura_dd,comando_ejecutable,timestamp",FALSE);
		$data['main_content'] = $this->load->view('ComponentesIT/AlmacenamientoComponentesIT',$data,TRUE);
		$this->load->view('Capacidad/template',$data);
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
	/* Fin Módulo Servicios */
	public function Departamentos()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);

		$data['main_content'] = $this->load->view('Departamentos','',TRUE);
		$this->load->view('Capacidad/template',$data);
	}
	/* Módulo Umbrales */
	public function Umbrales()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);

		$data['main_content'] = $this->load->view('Umbrales','',TRUE);
		$this->load->view('Capacidad/template',$data);
	}
}

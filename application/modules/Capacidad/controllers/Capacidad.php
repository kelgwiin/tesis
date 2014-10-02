<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Capacidad extends MX_Controller
{
	function __construct()
    {
        parent::__construct();
        $this->load->module('utilities/utils');
    }

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

		$data['main_content'] = $this->load->view('ComponentesIT/ComponentesITGeneral','',TRUE);
		$this->load->view('Capacidad/template',$data);
	}
	public function ProcesadorComponentesIT()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);

		$data['main_content'] = $this->load->view('ComponentesIT/ProcesosComponentesIT','',TRUE);
		$this->load->view('Capacidad/template',$data);
	}
	public function MemoriaComponentesIT()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);

		$data['main_content'] = $this->load->view('ComponentesIT/MemoriaComponentesIT','',TRUE);
		$this->load->view('Capacidad/template',$data);
	}
	public function AlmacenamientoComponentesIT()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);

		$data['main_content'] = $this->load->view('ComponentesIT/AlmacenamientoComponentesIT','',TRUE);
		$this->load->view('Capacidad/template',$data);
	}
	public function RedesComponentesIT()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);

		$data['main_content'] = $this->load->view('ComponentesIT/RedesComponentesIT','',TRUE);
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
	public function RedesServicio()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);

		$datos['nombre_servicio'] = $this->uri->segment(3);
		$data['main_content'] = $this->load->view('Servicios/RedesServicio',$datos,TRUE);
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
	
	public function Umbrales()
	{
		modules::run('general/is_logged', base_url().'index.php/usuarios/iniciar-sesion');
		$permiso = modules::run('general/have_permission', 10);

		$data['main_content'] = $this->load->view('Umbrales','',TRUE);
		$this->load->view('Capacidad/template',$data);
	}
}
